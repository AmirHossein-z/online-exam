<?php

class dashboardController extends Controller
{

    public function __construct()
    {
        parent::__construct();
        if (!isset($_SESSION['name'])) {
            header('Location: ' . URL . 'auth/login');
        }
    }

    public function index()
    {
        $this->header('header');
        $this->view('dashboard/dashboardView');
    }
}