<?php

namespace fw\core;


class Db
{
    use TSingleton;

    protected $pdo;
    public static $countSql = 0;
    public static $queries = [];

    protected function __construct()
    {
        $db = require ROOT . '/config/config_db.php';
        $options = [
            \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
            \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
        ];
        $this->pdo = new \PDO($db['dsn'], $db['user'], $db['pass'], $options);
    }

    public function execute($sql, $params = []){
        self::$countSql++;
        self::$queries[] = $sql;
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute($params);
    }

    public function query($sql, $params = [], $findOne = false){
        self::$countSql++;
        self::$queries[] = $sql;
        $stmt = $this->pdo->prepare($sql);
        $res =  $stmt->execute($params);
        if ($res !== false) {
            if ($findOne)
                return $stmt->fetch(\PDO::FETCH_OBJ);
            return $stmt->fetchAll(\PDO::FETCH_OBJ);
        }
        return [];
    }
}