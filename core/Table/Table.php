<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 26/07/17
 * Time: 18:49
 */

namespace core\Table;


use core\Database;

class Table
{
    protected $table;
    protected $db;

    public function __construct(Database\Database $db)
    {
        //var_dump((get_class($this)));
        $this->db=$db;
        if(is_null($this->table)){
            $part = explode('\\',get_class($this));
           // $class_name = end($part);
            //$this->table= $table = str_replace('Table','',$class_name).'s';
        }

    }

    public function all()
    {
       return $this->query('SELECT * FROM '.$this->table);
    }

    public function lastId()
    {
        return $this->query('SELECT id FROM {$this->table} ORDER BY id DESC LIMIT 1');
    }

    public function query($stat,$attr=null,$one=false)
    {
        if($attr)
        {
           return $this->db->prepare($stat,$attr,str_replace('Table','Entity',get_class($this)),$one);
        }else
        {
            return $this->db->query($stat,str_replace('Table','Entity',get_class($this)),$one);
        }
    }

    public function find($id)
    {
        return $this->query("SELECT * from $this->table where id = ? ",[$id],true);

    }

    public function create($fields){
        $sql_parts = [];
        $attributes = [];

        foreach ($fields as $k => $v){
            $sql_parts[] = "$k = ?";
            $attributes[] = $v;
        }

        $sql_parts = implode(',', $sql_parts);
        $this->query("INSERT INTO $this->table SET $sql_parts", $attributes, true);
    }

    public function update($id, $fields){
        $sql_parts = [];
        $attributes = [];

        foreach ($fields as $k => $v){
            $sql_parts[] = "$k = ?";
            $attributes[] = $v;
        }
        $attributes[] = $id;

        $sql_parts = implode(',', $sql_parts);
        $this->query("UPDATE $this->table SET $sql_parts WHERE id = ?", $attributes, true);
    }

    public function list($key,$value)
    {
        $records = $this->all();
        $return = [];
        foreach ($records as  $v ){
            $return[$v->$key] = $v->$value;
        }
        return $return;
    }

}