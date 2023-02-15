<?php

require_once 'AppController.php';

class SessionController extends AppController
{


    public function __construct()
    {
        parent::__construct();
    }

    public function session()
    {
        if (!$this->isPost()) {
            return $this->render('session');
        }
    }
}