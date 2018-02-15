<?php
namespace core;
/**
 * Created by PhpStorm.
 * User: ABOUBACAR
 * Date: 15/01/2017
 * Time: 19:18
 */

class Autoloader
{

    /**
     * @param $class
     */
    static function autoload ($class) {
        if(strpos($class,__NAMESPACE__.'\\')===0)
        {
            $class=str_replace(__NAMESPACE__.'\\','',$class);
            $class=str_replace('\\','/',$class);
            //print_r($class);
            require __DIR__. '/' .$class.'.php';
        }

    }

    /**
     *
     */
    static function register()
    {
        spl_autoload_register(array(__CLASS__,"autoload"));
    }
}