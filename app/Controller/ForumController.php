<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 08/03/18
 * Time: 23:16
 */

namespace app\Controller;


use core\HTML\BootstrapForm;

class ForumController extends AppController
{
    public function __construct()
    {
        parent::__construct();
        $this->loadModel('Forum');
        $this->loadModel('Users');
    }

    public function index()
    {

        $this->render('forum.index');
    }

    public function add()
    {
        $form = new BootstrapForm();
        if(isset($_SESSION['auth'])){
            if(!empty($_POST)) {

                $this->postTosession($_POST);
                header("HTTP/1.1 303 See Other");
                header("Location: " . $_SERVER['REQUEST_URI']);
                die();
            }
            else
            {
                if (isset($_SESSION['post'])) {
                    $addforum=false;
                    $user = $this->Users->find($_SESSION['auth']);
                    $result = $this->Forum->create([
                        'titre' => $_SESSION['post']['titre'],
                        'id_user' => $user->id_user,
                        'contenu' => nl2br(trim($_SESSION['post']['contenu'])),
                        'date_creation' => date("Y-m-d H:i:s")
                    ]);

                    $form->resetForm('titre');
                    $form->resetForm('contenu');
                    $_POST = array();
                    if (!$result) {
                        $addforum = true;
                    }
                    unset($_SESSION['post']);
                    $this->render('forum.index',compact('form','addforum'));
                }
            }
        }
        else
        {
            $connect = false;
            return $this->render('forum.index',compact('form','connect'));
        }

        $this->render('forum.editforum',compact('form'));
    }
}