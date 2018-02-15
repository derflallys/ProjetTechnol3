<?php
/**
 * Created by PhpStorm.
 * User: hadji
 * Date: 01/08/2017
 * Time: 01:41
 */

namespace app\Controller;

use core\Auth\DBAuth;
use core\Controller\Controller;
use \app;
use core\HTML\BootstrapForm;

class AppController extends Controller{
    protected $template = 'default';
    private $auth;
    public $form ;

    public function __construct()
    {
        $app = App::getInstance();
        $this->auth=new DBAuth($app->getDb());
        $this->viewPath = ROOT.'/app/Views/';
        $this->form = new BootstrapForm();

    }

    protected function loadModel($model_name)
    {
        $this->$model_name =  App::getInstance()->getTable($model_name);
    }
}