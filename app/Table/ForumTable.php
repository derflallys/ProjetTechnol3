<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 08/03/18
 * Time: 23:59
 */

namespace app\Table;


use core\Table\Table;

class ForumTable extends Table
{
    protected $table = 'forum';

    public function all()
    {
        return $this->query("SELECT * FROM  {$this->table}  ORDER BY date_creation DESC");
    }

    public function find($id)
    {
        return $this->query("SELECT * from $this->table where id_forum = ? ORDER BY date_creation DESC",[$id],true);

    }

    public function delete($id)
    {
        return $this->query("DELETE FROM {$this->table} WHERE id_forum= ?",[$id],true);
    }

    public function alerter($idforum)
    {
        return $this->query("UPDATE {$this->table} SET alert = alert + 1 WHERE id_forum = ? ",[$idforum],true);
    }

    public function selectAbus()
    {
        return $this->query("Select * FROM forum WHERE forum.alert>0");
    }



}