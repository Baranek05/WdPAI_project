<?php

require_once 'AppController.php';

class MenuController extends AppController
{


    public function __construct()
    {
        parent::__construct();
    }

    public function menu()
    {
        return $this->render('menu');
    }
}