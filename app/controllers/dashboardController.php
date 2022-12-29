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
            'type' => $_SESSION['type']
        ];
        $this->header('header');
        // $this->navbar('navbar', $data);
        // $this->view('dashboard/dashboardView', $data);
        $this->view('layout/navbar', $data);

        $this->footer('footer');
    }

    public function four_four()
    {
        $this->view('dashboard/four_fourView');
        exit();
    }
}