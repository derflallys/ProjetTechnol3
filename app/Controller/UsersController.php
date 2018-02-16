<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 20/10/17
 * Time: 15:24
 */

namespace app\Controller;


use core\Fonctions;
use core\HTML\BootstrapForm;

class UsersController extends AppController
{
    public function __construct()
    {
        parent::__construct();
        $this->loadModel('Users');
    }



    public function add()
    {
        $form = new BootstrapForm();
        if(!empty($_POST)) {

            $this->postTosession($_POST);
            header("HTTP/1.1 303 See Other");
            header("Location: " . $_SERVER['REQUEST_URI']);
            die();
        }else {

            if (isset($_SESSION['post'])) {

                $signup = false;
                $hashmail = sha1($_SESSION['post']['password'] . $_SESSION['post']['nom']);
                $u = $this->Users->findBymail($_SESSION['post']['login']);


                if(empty($u))
                {

                $result = $this->Users->create([
                    'nom' => $_SESSION['post']['nom'],
                    'prenom' => $_SESSION['post']['prenom'],
                    'codepostale' => $_SESSION['post']['codepostale'],
                    'login' => $_SESSION['post']['login'],
                    'password' => sha1($_SESSION['post']['password']),
                    'hashmail' => $hashmail
                ]);
                }
                else
                {

                    $result=false;
                    return $this->render('signup', compact('form','result'));
                }
                $fonction = new Fonctions();
                $mail = $fonction->sendmailconfim($_SESSION['post']['nom'],$_SESSION['post']['prenom'],$_SESSION['post']['login'], $hashmail);
                $form->resetForm('nom');
                $form->resetForm('prenom');
                $form->resetForm('codepostale');
                $form->resetForm('login');
                $form->resetForm('password');
                $_POST = array();

                if (!$result) {
                    $signup = true;
                }
                unset($_SESSION['post']);

               return $this->render('home', compact('signup', 'mail'));


            }

        }


        $this->render('signup',compact('form'));
    }

    public function liste()
    {
        $users = $this->Users->allVerified();

       return $this->render('users',compact('users'));
    }

    public function delete()
    {
        if(!empty($_POST))
        {
            $this->Users->delete($_POST['id_user']);
            return $this->liste();
        }
    }

    public function edit()
    {
        if(!empty($_POST))
        {
            $result=  $this->Users->update($_GET['id'],[
                'nom'=>$_POST['nom'],
                'prenom'=>$_POST['prenom'],
                'login '=>$_POST['login'],
                'password' =>sha1($_POST['password'])
            ]);
            if($result)
            {
                return $this->liste();
            }

        }
        $users = $this->Users->find($_GET['id']);


        $form = new BootstrapForm($users);
        $this->render('admin.editAdmin',compact('users','form'));
    }

    public function confirmeMail($hashmail)
    {
        $user = $this->Users->findByHashmail($hashmail);
        $verified = $user->verified ==1 ? true : false;
        if (!empty($user) && count($user)==1 && $user->verified==0)
        {
            $result=  $this->Users->update($user->id_user,[
                'nom'=>$user->nom,
                'prenom'=>$user->prenom,
                'login '=>$user->login,
                'codepostale'=>$user->codepostale,
                'password' =>$user->password,
                'verified' =>1,
                'hashmail' =>$user->hashmail
            ]);
        }
        $this->render('home',compact('form','verified'));




    }

    public function passwordForget()
    {
        $form = new BootstrapForm();
        if(!empty($_POST)){
            $u = $this->Users->findBymail($_POST['login']);
            if(!empty($u))
            {
                $fonction = new Fonctions();
                $fonction->sendmailpassword($_POST['login'], $u->hashmail);
                $forgot=true;
               return $this->render('home',compact('form','forgot'));

            }
            else
            {
                $forgot=false;
             return   $this->render('formforgot',compact('form','forgot'));
            }
        }

        $this->render('formforgot',compact('form'));
    }

    public function updatepassword($hashmail)
    {
        $u = $this->Users->findByHashmail($hashmail);

        if (!empty($u) )
        {
            $form = new BootstrapForm();
            if(!empty($_POST)) {

                $this->postTosession($_POST);
                header("HTTP/1.1 303 See Other");
                header("Location: " . $_SERVER['REQUEST_URI']);
                die();
            }else {

                if (isset($_SESSION['post'])) {

                    if (strcmp($_SESSION['post']['password'], $_SESSION['post']['confirmpassword']) == 0) {
                        $result = $this->Users->update($u->id_user, [
                            'nom' => $u->nom,
                            'prenom' => $u->prenom,
                            'login ' => $u->login,
                            'codepostale' => $u->codepostale,
                            'password' => sha1($_SESSION['post']['password']),
                            'verified' => $u->verified,
                            'hashmail' => $u->hashmail
                        ]);

                        $form->resetForm('password');
                        $form->resetForm('confirmpassword');
                        $updatemdp =true;
                        unset($_SESSION['post']);
                        $_POST = array();
                       return $this->render('home',compact('form','updatemdp'));

                    }
                    else
                    {
                        $form->resetForm('password');
                        $form->resetForm('confirmpassword');
                        $updatemdp=false;
                        unset($_SESSION['post']);
                        $_POST = array();
                      return  $this->render('updatepassword',compact('form','updatemdp'));
                    }
                }
            }
            $this->render('updatepassword',compact('form'));
        }
    }

    public function resendmailconfirmation()
    {
            if (isset($_SESSION['confirmail']))
            {
                $u = $this->Users->findBymail($_SESSION['confirmail']);
                if(!empty($u))
                {
                    $fonction = new Fonctions();
                    $fonction->sendmailconfim($u->nom,$u->prenom,$u->login, $u->hashmail);
                    unset($_SESSION['confirmail']);
                    $signup =true;
                    $this->render('home',compact('signup'));
                }
            }
    }
}