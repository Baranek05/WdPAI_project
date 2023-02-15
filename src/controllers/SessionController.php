<?php

require_once 'AppController.php';

class SessionController extends AppController
{

    // private $userRepository;

    public function __construct()
    {
        parent::__construct();
        // $this->userRepository = new UserRepository();
    }

    public function session()
    {
        if (!$this->isPost()) {
            return $this->render('session');
        }
    }
}