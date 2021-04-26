<?php
namespace Ecogolf\models;

use PDO;
use Ben09\Database\DBManager;


class ArticleManager extends DBManager
{
    protected $table = "articles";

    public function save():bool {
        $query = $this->prepare("INSERT INTO {$this->table}(title,content,author,date,image) VALUES(?,?,?,?,?)");
        return $query->execute([
            $this->entity->getTitle(),
            $this->entity->getContent(),
            $this->entity->getAuthor(),
            $this->entity->getDate()->format('Y-m-d H:i:s'),
            $this->entity->getImage()
        ]);
    }

    public function update():bool {
        $query = $this->prepare("UPDATE {$this->table} SET title = ? ,content = ?,author = ?,date = ?,image = ? WHERE id = ?");
        return $query->execute([
            $this->entity->getTitle(),
            $this->entity->getContent(),
            $this->entity->getAuthor(),
            $this->entity->getDate()->format('Y-m-d H:i:s'),
            $this->entity->getImage(),
            $this->entity->getId()
        ]);
    }

    public function sortByDate(string $desc = "DESC") {
        return $this->query("SELECT * FROM {$this->table} ORDER BY date {$desc}");
    }


    public function getSlice($offset,$length) {
        $statement = $this->prepare("SELECT * FROM {$this->table} ORDER BY id DESC LIMIT :offset,:length");
        $statement->bindParam("offset",$offset,PDO::PARAM_INT);
        $statement->bindParam("length",$length,PDO::PARAM_INT);
        $statement->execute();
        $result = $statement->fetchAll();
        return $result;
    }

    public function find(int $id):?Article {
        $query = $this->prepare("SELECT * FROM {$this->table} WHERE {$this->primary_key} = ?");
        $query->setFetchMode(PDO::FETCH_ASSOC);
        $query->execute([$id]);
        $data = $query->fetch();
        if($data === false) {
            return null;
        }
        $this->hydrate(New Article(),$data);
        return $this->entity;
    }

    public function getSamples($articles,$length){
        $entities = [];
        foreach ($articles as $article) {
            $entity = [
                "id"=>$article->id,
                "author"=>$article->author,
                "date"=>$article->date,
                "sample"=>substr($article->content,0,$length),
                "image"=>$article->image,
                "title"=>$article->title
            ];
            $entities[]=$entity;
        }
        return $entities;
    }

    public function lastInsertId(): string
    {
        return $this->pdo->lastInsertId($this->table);
    }

    


}