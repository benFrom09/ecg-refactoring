<?php
namespace Ecogolf\models;

use PDO;
use Ben09\Database\DBManager;


class GprixManager extends DBManager
{
    protected $table = "gprix";

    public function save():bool {
        $query = $this->prepare("INSERT INTO {$this->table}(content) VALUES(?)");
        return $query->execute([
            $this->entity->getContent(),
        ]);
    }

    public function update():bool {
        $query = $this->prepare("UPDATE {$this->table} SET content = ?, date = ?, title = ?, nb_max_player = ? WHERE id = ?");
        return $query->execute([
            $this->entity->getContent(),
            $this->entity->getDate(),
            $this->entity->getTitle(),
            $this->entity->getNbMaxPlayer(),
            $this->entity->getId()
        ]);
    }

    public function find(int $id):?Gprix {
        $query = $this->prepare("SELECT * FROM {$this->table} WHERE {$this->primary_key} = ?");
        $query->setFetchMode(PDO::FETCH_ASSOC);
        $query->execute([$id]);
        $data = $query->fetch();
        if($data === false) {
            return null;
        }
        $this->hydrate(New Gprix(),$data);
        return $this->entity;
    }

    public function lastId():int {
        $query = $this->query("SELECT * FROM {$this->table}");
        $query->setFetchMode(PDO::FETCH_ASSOC);
        return count($data = $query->fetchAll());
    }

}