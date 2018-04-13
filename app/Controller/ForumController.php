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
    public function indexAdmin()
    {
        if(!$this->auth->logged())
        {
            $user = $this->Users->find($_SESSION['auth']);
            if(strcmp($user->role,'admin')!=0)
            {
                $this->forbidden();
            }
        }
        $forums = $this->Forum->all();
        $this->render('forum.admin.index',compact('forums'));
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
                    $forums = $this->Forum->all();
                   return $this->render('forum.index',compact('form','addforum','forums'));
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

    public function show($id=null)
    {
        $form = new BootstrapForm();
        if($id)
            $forum = $this->Forum->find($id);
        else
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
            return $this->render('forum.index',compact('form','connect','forum'));
        }
        if($id)
            $comments = $this->Commentaire_forum->findByForum($id);
        else
            $comments = $this->Commentaire_forum->findByForum($_GET['id']);
        $user = $this->Users->find($forum->id_user);
        $ObjetUser = $this->Users;
        $ObjetComment = $this->Commentaire_forum;


        $this->render('forum.show',compact('forum','comments','user','ObjetUser','commentforum','form','ObjetComment'));
    }

    public function delete()
    {
        if(!empty($_POST))
        {
            $comments = $this->Commentaire_forum->findByForum($_POST['id_forum']);
            foreach ($comments as $comment)
            {
                $this->Commentaire_forum->delete($comment->id_commentForum);
            }
            $this->Forum->delete($_POST['id_forum']);

            $_POST = array();
            return $this->indexAdmin();
        }
    }

    public function deleteComment()
    {
        if(!empty($_POST))
        {
            $forum = $this->Commentaire_forum->find($_POST['id_commentForum']);
            $comments = $this->Commentaire_forum->findAnswer($_POST['id_commentForum']);
            foreach ($comments as $comment)
            {
                $this->Commentaire_forum->delete($comment->id_commentForum);
            }
            $this->Commentaire_forum->delete($_POST['id_commentForum']);

            $_POST = array();

           return $this->showAdmin($forum->id_forum);
        }
    }

    public function showAdmin($id=null)
    {

        $form = new BootstrapForm();
        if($id)
            $forum = $this->Forum->find($id);
        else
            $forum = $this->Forum->find($_GET['id']);

        if(isset($_SESSION['auth'])) {
            $user = $this->Users->find($_SESSION['auth']);
            if(strcmp($user->role,'admin')!=0)
            {
                $this->forbidden();
            }
            if (!empty($_POST)) {

                $this->postTosession($_POST);
                header("HTTP/1.1 303 See Other");
                header("Location: " . $_SERVER['REQUEST_URI']);
                die();
            } else {
                if (isset($_SESSION['post'])) {

                    $commentforum = false;

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
            return $this->render('forum.admin.index',compact('form','connect','forum'));
        }
        if($id)
            $comments = $this->Commentaire_forum->findByForum($id);
        else
            $comments = $this->Commentaire_forum->findByForum($_GET['id']);
        $user = $this->Users->find($forum->id_user);
        $ObjetUser = $this->Users;
        $ObjetComment = $this->Commentaire_forum;


        $this->render('forum.admin.show',compact('forum','comments','user','ObjetUser','commentforum','form','ObjetComment'));
    }

    public function alertForum()
    {
        if(isset($_POST['id_forum'])){
            if(isset($_SESSION['auth'])) {

                $this->Forum->alerter($_POST['id_forum']);
            }
            $id= $_POST['id_forum'];
            $_POST = array();
          return  $this->show($id);

        }

    }

    public function alertComment()
    {
        if(isset($_POST['id_commentForum']))
        {
            if(isset($_SESSION['auth'])) {
                $this->Commentaire_forum->alerter($_POST['id_commentForum']);
            }
            $forum = $this->Commentaire_forum->find($_POST['id_commentForum']);
            $_POST = array();
          return  $this->show($forum->id_forum);


        }

    }

    public function showAlert()
    {
        $form = new BootstrapForm();

        if(isset($_SESSION['auth'])) {
            $user = $this->Users->find($_SESSION['auth']);
            if (strcmp($user->role, 'admin') != 0) {
                $this->forbidden();
            }
            $forums = $this->Forum->selectAbus();
            $comments = $this->Commentaire_forum->selectAbus();
            $ObjetUser = $this->Users;
            $ObjetComment = $this->Commentaire_forum;
            $this->render('forum.admin.alerts',compact('forums','comments','user','ObjetUser','form','ObjetComment'));

        }
        else
        {
            $this->forbidden();
        }
    }




}