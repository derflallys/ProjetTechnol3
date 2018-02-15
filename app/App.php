<?php
/**
 * Created by PhpStorm.
 * User: ABOUBACAR
 * Date: 17/01/2017
 * Time: 19:19
 */


use core\Config;
use core\Database\MysqlDatabase;


class App
{
    //On peut dire que c'est une methode Factory
    private static $_instance;
    public static $title="Projet Tech";
    private static $db_instance;

    public static function getInstance()
    {
        if (self::$_instance==null)
        {
            self::$_instance=new App();
        }
        return self::$_instance;
    }

    public  function getTable($name)
    {
        $class_name = '\\app\\Table\\'.ucfirst($name).'Table';
        return new $class_name($this->getDb());
    }

    public function getDb()
    {
        $config = Config::getInstance(ROOT.'/Config/config.php');

        if(is_null(self::$db_instance))
        {
            self::$db_instance = new MysqlDatabase($config->get('dbname'),$config->get('db_name'),$config->get('db_user'),$config->get('db_pass'),$config->get('db_host'));
        }
        return self::$db_instance;
    }

    public static function load()
    {
        session_start();

        require  ROOT.'/core/Autoloader.php';
        core\Autoloader::register();

        require ROOT.'/app/Autoloader.php';
        app\Autoloader::register();



    }

    public function notFound()
    {
        
    }

    public function getLastInsertId(){
        return $this->getDb()->lastInsertId();
    }
    public  static function getTitle(){
        return self::$title;
    }
}