<?php

class Controller
{
    public static $MASTER = 'master';
    public static $STUDENT = 'student';
    public function __construct()
    {

    }
    public function view($view_path, $data = []): void
    {
        require 'views/' . $view_path . '.php';
    }

    public function header($header_path): void
    {
        require "views/layout/" . $header_path . ".php";
    }

    public function footer($footer_path): void
    {
        require "views/layout/" . $footer_path . ".php";
    }

    public function navbar($nav_path): void
    {
        require 'views/layout/' . $nav_path . '.php';
    }
    public function model($model_name)
    {
        $filename = $model_name . 'Model';
        require 'app/models/' . $filename . '.php';
        return new $filename;

        // return new $model_name . 'Model';
    }
}