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
}