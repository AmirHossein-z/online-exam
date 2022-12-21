<?php

class App
{
    public function __construct()
    {
        $url_array = $this->explode($_GET['url']);
        $controller = $url_array[0];
        unset($url_array[0]);
        $action = $url_array[1];
        unset($url_array[1]);

        // if not found -> warning
        $file_name = 'app/controllers/' . $controller . 'Controller.php';

        // check if file exists
        if (!file_exists($file_name)) {
            echo "404 - Controller not found: " . $file_name;
            exit();
        }
        require $file_name;

        $controller .= "Controller";

        $object = new $controller();
        if (!method_exists($object, $action)) {
            echo "404 - action not found: " . $action;
            exit();
        }
        call_user_func_array([$object, $action], array_values($url_array));
    }

    public function explode($url)
    {
        return explode('/', rtrim($url, characters: '/'));
    }
}