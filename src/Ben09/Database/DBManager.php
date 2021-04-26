<?php
declare(strict_types=1);

namespace Ben09\Database;

use Ben09\Database\Generic\Delete;
use Ben09\Database\Generic\Insert;
use Ben09\Database\Generic\Select;
use Ben09\Database\Entities\Entity;

class DBManager
{
    use Select;
    use Insert;
    use Delete;
    /**
     * Instance of PDO
     *
     * @var PDO
     */
    protected $pdo;

    /**
     * Database table name
     *
     * @var string $table database table name
     */
    protected $table;

    protected $primary_key = "id";
 


    public function __construct() {
        if($this->pdo === null) {
            $conn = new DBConnection();
            $this->pdo = $conn->getConnection();
        } 
    }

    /**
     * PDO query request
     *
     * @param string $sql sql query string
     * @return PDOStatement|null
     */
    public function query($sql) {
        return $this->pdo->query($sql);
    }

    /**
     * PDO prepared request
     *
     * @param string $sql sql query string
     * @return PDOStatement|false
     */
    public function prepare($sql) {
        return $this->pdo->prepare($sql);
    }

    /**
     * Truncate database table
     *
     * @param string $table database table name
     * @return PDOStatement|false
     */
    public function purge(string $table = null) {
        if(!is_null($table)) {
            $this->table = $table;
        }
         $statement = $this->prepare("TRUNCATE TABLE {$this->table}");
         return $statement;
    }

    /**
     * set the database table to query on
     *
     * @param string|null $table database table name
     * @return self
     */
    public function table(?string $table = null):self {
        if(!is_null($table)) {
            $this->table = $table;
        }  
        return $this;
    }

    public function lastInsertId():string {
        return $this->pdo->lastInsertId();
    }

    public function hydrate(Entity $entity,array $data) {
        if(count($data) > 0) {
            $entity = new $entity();
            foreach($data as $key => $value) {
                $method = $this->formatSetterForEntity($key);
                //d($method);
                //$method = 'set' . ucfirst($key);
                if(method_exists($entity,$method)) {
                    $entity->$method($value);
                }
            }
            $this->entity = $entity;
            return $this;
        }
        return null;
    }

    /**
     * set the table column name prefixed with underscore to the right setter function name
     * ex nb_max_player => setNbMaxPlayer
     * @param string $string
     * @return string
     */
    private function formatSetterForEntity(string $string) {
        $array = str_split($string);
        $newArray = [];
        for ($i = 0; $i < count($array); $i++) {

            if ($array[$i] == '_') {

                $array[$i + 1] = strtoupper($array[$i + 1]);
                $array[$i] = '';
            }
            $newArray[] = $array[$i];
        }

        return 'set' . ucfirst(implode($newArray));
    }

      

    
}