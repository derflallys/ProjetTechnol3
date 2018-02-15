<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 27/10/17
 * Time: 14:32
 */

namespace app\Table;


use core\Table\Table;

class UsersTable extends Table
{
    protected $table = 'users';
    public function update($id,$fields)
    {
        $sql_parts = [];
        $attributes = [];
        foreach ($fields as $k => $v)
        {
            $sql_parts [] ="$k = ?";
            $attributes []= $v;
        }

        $sql_part = implode(',',$sql_parts);
        $attributes [] =$id;

        return $this->query("UPDATE  {$this->table} SET {$sql_part} where id_user = ?",$attributes,true);

    }
    public function delete($id)
    {
        return $this->query("DELETE FROM  {$this->table} WHERE id_user= ? ",[$id],true);
    }


    public function findByHashmail($hashmail)
    {
        return $this->query("SELECT * from $this->table where hashmail = ? ",[$hashmail],true);

    }

    public function allVerified()
    {
        $v = 1;
        return $this->query("SELECT * from $this->table where verified = ? ",[$v]);
    }

    public function findBymail($mail)
    {
        return $this->query("SELECT * from $this->table where login = ? ",[$mail],true);

    }

}