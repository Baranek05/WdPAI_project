<?php


require_once 'AppController.php';
require_once __DIR__ . '/../repository/UserRepository.php';

class AccountController extends AppController
{

    private $userRepository;

    public function __construct()
    {
        parent::__construct();
        $this->userRepository = new UserRepository();
    }

    public function account()
    {
        if (!$this->isPost()) {
            return $this->render('account');
        }
    }

    public function accountInfo($username)
    {
        $user = $this->userRepository->getUserData($username);
        header('Content-type: application/json');
        http_response_code(200);

        echo json_encode($user);
    }
}