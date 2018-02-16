<?php
/**
 * Created by PhpStorm.
 * User: hadji
 * Date: 01/08/2017
 * Time: 01:10
 */

namespace core\Controller;


class Controller
{
    protected $viewPath;
    protected $template;

    public function render($view,$variable=[]){
        ob_start();
        extract($variable);
       // require $this->viewPath.''.$view.'.php';
        require ($this->viewPath. str_replace('.','/',$view).'.php');

        $content = ob_get_clean();

        require ($this->viewPath.'templates/'.$this->template.'.php');
    }

    protected function notFound()
    {
        header('HTTP/1.0 404 Not Found');
        die('Introuvable');
    }

    protected function forbidden()
    {
        header('HTTP/1.0 403 Forbidden');
        die('Acces Denied');
    }

    public function postTosession($post)
    {
        foreach ($post as $key => $value)
        {
            $_SESSION['post'][$key]=$value;
        }
    }


}