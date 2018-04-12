<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 30/03/18
 * Time: 02:09
 */

namespace app\Table;


use core\Table\Table;

class Commentaire_forumTable extends Table
{
    protected $table = 'commentaire_forum';

    public function findByForum($idforum)
    {
        return $this->query("SELECT * from $this->table where id_forum = ? ORDER BY date_com DESC ",[$idforum],false);

    }
    public function find($id)
    {
        return $this->query("SELECT * from $this->table where id_commentForum = ? ORDER BY date_com DESC ",[$id],true);

    }

    public function findAnswer($idcomment)
    {
        return $this->query("SELECT * from $this->table where id_parent = ? ORDER BY date_com DESC ",[$idcomment],false);

    }


    public function delete($id)
    {
        return $this->query("DELETE FROM {$this->table} WHERE id_commentForum= ?",[$id],true);
    }


}