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

    if(isset($_GET['task']))
    {
        $task=$_GET['task'];
    }
    else {
        if (isset($_GET['hashmail'])) {
            $controllerU = new \app\Controller\UsersController();
            $controllerU->confirmeMail($_GET['hashmail']);
            unset($_GET['hashmail']);
        } else {
            if (isset($_GET['forgotmdp'])) {
                $controllerU = new \app\Controller\UsersController();
                $controllerU->updatepassword($_GET['forgotmdp']);
                unset($_GET['forgotmdp']);
            }
            else{
                $task = 'home';
            }

        }
    }



if(isset($task)) {

    if ($task === 'home') {
        $controllerin = new \app\Controller\HomeController();
        $controllerin->index();

    } elseif ($task === 'users') {
        $controller = new \app\Controller\UsersController();
        $controller->liste();
    } elseif ($task === 'signin') {
        $controller = new \app\Controller\SigninController();
        $controller->login();
    } elseif ($task === 'signup') {
        $controller = new \app\Controller\UsersController();
        $controller->add();
    } elseif ($task === 'delete') {
        $controller = new \app\Controller\UsersController();
        $controller->delete();
    } elseif ($task === 'disconnect') {
        $controller = new \app\Controller\SigninController();
        $controller->disconnect();
    } elseif ($task === 'forget') {
        $controller = new \app\Controller\UsersController();
        $controller->passwordForget();
    } elseif ($task === 'resendmail') {
        $controller = new \app\Controller\UsersController();
        $controller->resendmailconfirmation();
    } elseif ($task === 'forum') {
        $controller = new \app\Controller\ForumController();
        $controller->index();
    } elseif ($task === 'addforum') {
        $controller = new \app\Controller\ForumController();
        $controller->add();
    }
    elseif ($task === 'updtateaccount') {
        $controller = new \app\Controller\UsersController();
        $controller->edit();
    }
    elseif ($task === 'forum.show') {
        $controller = new \app\Controller\ForumController();
        $controller->show();
    }elseif ($task === 'forum.admin.show') {
        $controller = new \app\Controller\ForumController();
        $controller->showAdmin();
    }elseif ($task === 'forum.admin.index') {
        $controller = new \app\Controller\ForumController();
        $controller->indexAdmin();
    }
    elseif ($task === 'admin.deleteForum') {
            $controller = new \app\Controller\ForumController();
            $controller->delete();
        }
    elseif ($task === 'admin.deleteComment') {
                $controller = new \app\Controller\ForumController();
                $controller->deleteComment();
            }
    elseif ($task === 'admin.alertComment') {
                    $controller = new \app\Controller\ForumController();
                    $controller->alertComment();
    }
    elseif ($task === 'admin.alertForum') {
                    $controller = new \app\Controller\ForumController();
                    $controller->alertForum();
    }
    elseif ($task === 'admin.alerts') {
                        $controller = new \app\Controller\ForumController();
                        $controller->showAlert();
        }



}


