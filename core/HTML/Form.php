<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 04/08/17
 * Time: 21:33
 */

namespace core\HTML;


class Form
{
    /**
     * @var array
     */
    protected $data ;
    /**
     * @var string Tag utilisé pour entourer les champs .
     */
    public $surround='p';

    /**
     * form constructor.
     * @param array $data
     */
    public function __construct($data=array())
    {
        $this->data=$data;
    }

    /**
     * @param $html
     * @return string
     */
    protected function surround ($html)
    {
        return "<{$this->surround}>{$html}</{$this->surround}>";
    }

    /**
     * @param $index
     * @return mixed|null permet de verifier si le nom exist dans le formular
     */
    protected function getValue($index)
    {
        if(is_object($this->data))
        {
            return $this->data->$index;
        }else
            return isset($this->data[$index])? $this->data[$index]:null;
    }

    /**
     * @param $name
     * @return string
     */
    public function input($name,$label,$option = [] )
    {
        $type = isset($option['type']) ? $option['type'] : 'text';
        return $this->surround('<input type="text" name='.$name.' value='.$this->getValue($name).'>');
    }


    /**
     * @return string retourne une balise bouton en HTML
     */
    public function submit ()
    {
        return $this->surround('<button type="submit">Envoyer</button>');
    }

    public function resetForm($index)
    {
        if(is_object($this->data))
        {
            return $this->data->$index = null;
        }else
            return isset($this->data[$index])? $this->data[$index]=null:null;
    }

}