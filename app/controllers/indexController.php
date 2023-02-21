<?php

class indexController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function show_main_page()
    {
        $this->header('header');
        $this->view('mainView');
        $this->header('footer');
    }

    public function four_four()
    {
        $this->header('header');
        $this->view('dashboard/four_fourView');
        $this->footer('footer');
        exit();
    }
}