<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 24/11/17
 * Time: 14:29
 */

namespace app\Controller;


use App;
use core\Auth\DBAuth;
use core\HTML\BootstrapForm;

class SigninController extends AppController
{
    public function __construct()
    {
        parent::__construct();
        $this->loadModel('Users');

    }



    public function login()
    {
        $form = new BootstrapForm($_POST);
        if(!empty($_POST))
        {
            $errors = false;
            $auth = new DBAuth(App::getInstance()->getDb());

            if($auth->login($_POST['login'],$_POST['password']))
            {
                $form->resetForm('login');
                $form->resetForm('password');
                unset($_POST);
                $user = $this->Users->find($_SESSION['auth']);

                return  $this->render('usershome',compact('errors','user'));
            }
            else
            {
                $_SESSION['confirmail'] = $_POST['login'];
                $form->resetForm('login');
                $form->resetForm('password');
                unset($_POST);


                $errors=true;


                return  $this->render('signin',compact('errors','form'));
            }
        }

        $this->render('signin',compact('form'));
    }

    public function checkConnection(){
        $auth = new DBAuth(App::getInstance()->getDb());
        if($auth->logged()){
            echo true;
        }else{
            echo false;
        }
    }
    public function disconnect()
    {
        $app = App::getInstance();
        $auth = new DBAuth($app->getDb());
        $auth->disconnect();
        return $this->render('home');
    }
}