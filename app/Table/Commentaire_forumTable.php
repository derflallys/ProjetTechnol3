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
        return $this->query("SELECT * from $this->table where id_forum = ? ",[$idforum],false);

    }
}