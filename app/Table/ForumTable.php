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

    public function find($id)
    {
        return $this->query("SELECT * from $this->table where id_forum = ? ",[$id],true);

    }

    public function delete($id)
    {
        return $this->query("DELETE FROM {$this->table} WHERE id_forum= ?",[$id],true);
    }



}