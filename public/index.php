<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 20/10/17
 * Time: 14:28
 */

require dirname(__DIR__).'/public/init_index.php';
require ROOT.'/app/App.php';
App::load();
    $task='home';
    if(isset($_GET['task']))
    {
        $task=$_GET['task'];
    }

    if(isset($_GET['hashmail']))
    {
        $controllerU = new \app\Controller\UsersController();
        $controllerU->confirmeMail($_GET['hashmail']);
    }



    if($task === 'home')
    {
        $controllerin = new \app\Controller\HomeController();
        $controllerin->index();

    }
    elseif ($task === 'users')
    {
        $controller = new \app\Controller\UsersController();
        $controller->liste();
    }
    elseif ($task === 'signin')
    {
        $controller = new \app\Controller\SigninController();
        $controller->login();
    }elseif ($task === 'signup')
    {
        $controller = new \app\Controller\UsersController();
        $controller->add();
    }elseif ($task === 'delete')
    {
        $controller = new \app\Controller\UsersController();
        $controller->delete();
    }elseif ($task === 'disconnect')
    {
        $controller = new \app\Controller\SigninController();
        $controller->disconnect();
    }elseif ($task === 'forget' )
    {
        $controller = new \app\Controller\UsersController();
        $controller->passwordForget();
    }


