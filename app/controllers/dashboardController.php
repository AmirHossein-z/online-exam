<?php

class dashboardController extends Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->header('header');
        $this->view('dashboard/dashboardView');
    }
}