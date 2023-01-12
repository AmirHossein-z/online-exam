<?php

class Controller
{
    public function __construct()
    {

    }

    /**
     * set alert info in session
     * @param string $title
     * @param string $message
     * @param string $type
     * @return void
     */
    public function set_alert_info(string $title, string $message, string $type)
    {
        $_SESSION['alert']['title'] = $title;
        $_SESSION['alert']['message'] = $message;
        $_SESSION['alert']['type'] = $type;
        return;
    }

    /**
     * set alert_info in data for showing to user
     * @param array $data
     * @return array
     */
    public function set_alert_for_show(array $data = []): array
    {
        if (isset($_SESSION['alert'])) {
            $alert = ['type' => $_SESSION['alert']['type'], 'title' => $_SESSION['alert']['title'], 'message' => $_SESSION['alert']['message']];
            $data['alert'] = $alert;
            $_SESSION['alert'] = null;
        }
        return $data;
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
        require_once 'app/models/' . $filename . '.php';
        return new $filename;

        // return new $model_name . 'Model';
    }
}