<?php


require_once 'AppController.php';

class DefaultController extends AppController
{

    public function index()
    {
        if (isset($_COOKIE['user'])) {
            $this->render('menu');
        } else {
            $this->render('login');
        }
    }
}
