<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 20/10/17
 * Time: 14:32
 */

namespace app\Controller;


use core\HTML\BootstrapForm;

class HomeController extends AppController
{
    public function index()
    {
        $form = $this->form;
        $this->render('home',compact('form'));

    }
}