<?php

require_once 'Core/Controller.php';

class UserController extends Controller
{
    private $view;

    public function __construct()
    {
        parent::__construct();
        $this->User = parent::loadModel("User");
    }

    public function index($param)
    {
        $user = "Mateus";
        // echo 'a: ' . $this->view;
        // echo $param;
        // var_dump($this->User);
        $users = $this->User->select();

        require_once parent::loadView('User', $this->view);
    }

    public function setView($a)
    {
        $this->view = $a;
    }
}
