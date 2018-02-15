<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 04/08/17
 * Time: 01:00
 */

namespace core\Entity;


class Entity
{
    public function __get($key)
    {
        $method= 'get'.ucfirst($key);
        $this->$key = $this->$method();
        return $this->$key;
    }
}