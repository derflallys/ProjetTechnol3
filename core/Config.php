<?php
/**
 * Created by PhpStorm.
 * User: ABOUBACAR
 * Date: 21/01/2017
 * Time: 20:41
 */

namespace core;


/**
 * Class Config
 * @package core
 */
class Config
{
    /**
     * @var array|mixed
     */
    private $settings = [];
    /**
     * @var
     */
    private static $_instance;

    /**
     * Config constructor.
     * @param $file
     */
    private function __construct($file)
    {
        $this->settings= require($file) ;
    }

    /**
     * @param $file
     * @return Config
     */
    public static function getInstance($file)
    {
        if (self::$_instance==null)
        {
            self::$_instance=new Config($file);
        }
        return self::$_instance;
    }

    /**
     * @param $key
     * @return mixed|null
     */
    public function get($key)
    {
        if (isset($this->settings['$key']))
            return $this->settings['$key'];
        return null;

    }
}