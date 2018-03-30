<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 08/03/18
 * Time: 23:58
 */

namespace app\Entity;


use core\Entity\Entity;

class ForumEntity extends Entity
{
    public function getUrl(){
        return RACINE."public/index.php?task=forum.show&id=".$this->id_forum;
    }

    public function getAnswerUrl(){
        return RACINE.'public/index.php/?task=forum.answer&id='.$this->id_forum;
    }
}