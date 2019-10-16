<?php

namespace fw\core\base;

use fw\core\Db;
use Valitron\Validator;

abstract class Model
{

    protected $pdo;
    protected $table;
    protected $pk = 'id';
    public $attributes = [];
    public $errors = [];
    public $rules = [];

    public function __construct()
    {
        $this->pdo = Db::instance();
    }

    public function load($data)
    {
        foreach ($this->attributes as $name => $value) {
            if (isset($data[$name])) {
                $this->attributes[$name] = $data[$name];
            }
        }
    }

    public function validation($data)
    {
        Validator::lang('ru');
        $v = new Validator($data);
        $v->rules($this->rules);
        if ($v->validate())
            return true;
        $this->errors = $v->errors();
        return false;
    }

    public function getErrors()
    {
        $errors = '<ul>';
        foreach ($this->errors as $error) {
            foreach ($error as $itme) {
                $errors .= "<li>$itme</li>";
            }
        }
        $errors .= '</ul>';
        $_SESSION['error'] = $errors;
    }

    public function query($sql){
        return $this->pdo->execute($sql);
    }

    public function finadAll(){
        $sql = "SELECT * FROM {$this->table}";
        return $this->pdo->query($sql);
    }

    public function count(){
        $sql = "SELECT COUNT(*) AS count FROM {$this->table}";
        return $this->pdo->query($sql, [], true)->count;
    }

    public function finadAllUnique($field = 'id') {
        $sql = "SELECT {$field}, {$this->table}.* FROM {$this->table}";
        return $this->pdo->query($sql, [], \PDO::FETCH_UNIQUE);
    }

    public function findOne($id, $field = ''){
        $field = $field ?: $this->pk;
        $sql = "SELECT * FROM {$this->table} WHERE $field = ? LIMIT 1";
        return $this->pdo->query($sql, [$id], true);
    }

    public function findBySql($sql, $params = []){
        return $this->pdo->query($sql, $params);
    }

    public function findLike($str, $field, $table = ''){
        $table = $table ?: $this->table;
        $sql = "SELECT * FROM $table WHERE $field LIKE ?";
        return $this->pdo->query($sql, ['%' .$str. '%']);
    }

    public function save()
    {
        $params = [];
        foreach ($this->attributes as $key => $val) {
            $params[":{$key}"] = $val;
        }
        $fields = implode(', ', array_keys($this->attributes));
        $values = implode(', ', array_keys($params));
        $sql = "INSERT INTO $this->table ($fields) VALUES ($values)";
        return $this->pdo->execute($sql, $params);
    }

}