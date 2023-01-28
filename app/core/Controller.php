<?php

class Controller
{
    public function __construct()
    {

    }

    /**
     * redirect to desired path
     * @param string $relative_path
     * @return void
     */
    public function redirect(string $relative_path): void
    {
        header('Location: ' . URL . $relative_path);
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
            // alert should be shown to user only once
            $_SESSION['alert'] = null;
        }
        return $data;
    }

    /**
     * require desired view
     * @param string $view_path
     * @param array $data
     * @return void
     */
    public function view(string $view_path, array $data = []): void
    {
        require 'views/' . $view_path . '.php';
    }

    /**
     * require desired header
     * @param string $header_path
     * @return void
     */
    public function header(string $header_path): void
    {
        require "views/layout/" . $header_path . ".php";
    }

    /**
     * require desired footer
     * @param string $footer_path
     * @return void
     */
    public function footer(string $footer_path): void
    {
        require "views/layout/" . $footer_path . ".php";
    }

    /**
     * require desired navbar
     * @param string $nav_path
     * @return void
     */
    public function navbar(string $nav_path): void
    {
        require 'views/layout/' . $nav_path . '.php';
    }
    
    /**
     * required desired DB model
     * @param string $model_name
     * @return object
     */
    public function model(string $model_name):object
    {
        $filename = $model_name . 'Model';
        require_once 'app/models/' . $filename . '.php';
        return new $filename;
    }
}