<?php

require_once 'AppController.php';

class MenuController extends AppController
{

    // private $userRepository;

    public function __construct()
    {
        parent::__construct();
        // $this->userRepository = new UserRepository();
    }

    public function menu()
    {
        return $this->render('menu');
    }
}