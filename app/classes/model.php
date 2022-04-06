<?php


class Model extends database
{
    private $sql;
    public function select($table){
        $sql = 'SELECT * FROM ' . $table;
        $this->sql=$sql;
        return $this;
    }
    public  function where($column, $value){
        $sql = $this->sql . ' WHERE ' . $column . ' = ' . '"'.$value.'"';
        $this->sql=$sql;
        return $this;
    }
    public  function all(){
        $sql = $this->sql;
        return $this->db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }
}