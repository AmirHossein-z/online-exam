<?php

class dashboardController extends Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $data = [
            'name' => $_SESSION['name'],
            'type' => $_SESSION['type'],
            'id' => $_SESSION['id']
        ];
        $this->header('header');
        $this->view('layout/navbar', $data);
        $this->footer('footer');
    }
}