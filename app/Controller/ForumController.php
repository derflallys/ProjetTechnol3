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
        $this->loadModel('Commentaire_forum');
    }

    public function index()
    {
        $forums = $this->Forum->all();
        $this->render('forum.index',compact('forums'));
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

    public function show()
    {
        $form = new BootstrapForm();
        $forum = $this->Forum->find($_GET['id']);

        if(isset($_SESSION['auth'])) {
            if (!empty($_POST)) {

                $this->postTosession($_POST);
                header("HTTP/1.1 303 See Other");
                header("Location: " . $_SERVER['REQUEST_URI']);
                die();
            } else {
                if (isset($_SESSION['post'])) {

                    $commentforum = false;
                    $user = $this->Users->find($_SESSION['auth']);
                    if($_SESSION['post']['id_parent']==="")
                    {

                        $result = $this->Commentaire_forum->create([
                            'id_user' => $user->id_user,
                            'contenu_com' => $_SESSION['post']['contenu_com'],
                            'date_com' => date("Y-m-d H:i:s"),
                            'id_forum' => $forum->id_forum,
                        ]);
                    }
                    else
                    {
                        $result = $this->Commentaire_forum->create([
                            'id_user' => $user->id_user,
                            'contenu_com' => $_SESSION['post']['contenu_com'],
                            'date_com' => date("Y-m-d H:i:s"),
                            'id_forum' => $forum->id_forum,
                            'id_parent' => $_SESSION['post']['id_parent']
                        ]);

                    }

                    $form->resetForm('contenu_com');
                    $form->resetForm('id_parent');
                    $_POST = array();
                    if (!$result) {
                        $commentforum = true;
                    }
                    unset($_SESSION['post']);

                }
            }
        }
        else
        {
            $connect = false;
            return $this->render('forum.index',compact('form','connect'));
        }
        $comments = $this->Commentaire_forum->findByForum($_GET['id']);
        $user = $this->Users->find($forum->id_user);
        $ObjetUser = $this->Users;
        $ObjetComment = $this->Commentaire_forum;


        $this->render('forum.show',compact('forum','comments','user','ObjetUser','commentforum','form','ObjetComment'));
    }
}