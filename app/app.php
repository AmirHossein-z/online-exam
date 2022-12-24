<?php

class App
{
    public function __construct()
    {
        $request_type = $_SERVER['REQUEST_METHOD'];

        $url = '/' . $_GET['url'];
        $routes = [
            'login' => [
                'type' => "GET",
                'pattern_url' => '/^\/auth\/login$/',
                'controller' => 'authController',
                'action' => 'login',
            ],
            'loggedIn' => [
                'type' => 'POST',
                'pattern_url' => '/^\/auth\/login_user$/',
                'controller' => 'authController',
                'action' => 'login_user',
            ],
            'register' => [
                'type' => "GET",
                'pattern_url' => '/^\/auth\/register$/',
                'controller' => 'authController',
                'action' => 'register'
            ],
            'registered' => [
                'type' => "POST",
                'pattern_url' => '/^\/auth\/register_user$/',
                'controller' => 'authController',
                'action' => 'register_user'
            ],
            'dashboard' => [
                'type' => "GET",
                'pattern_url' => '/^\/dashboard\/index$/',
                'controller' => 'dashboardController',
                'action' => 'index'
            ],
            'not_Found' => [
                'type' => "GET",
                'pattern_url' => '/^\/auth\/register_user$/',
                'controller' => 'notFoundController',
                'action' => 'show'
            ]
        ];

        $page_not_found = true;
        foreach ($routes as $route) {
            if (
                preg_match(
                    $route['pattern_url'],
                    $url,
                    $matches
                ) && $request_type == $route['type']
            ) {

                unset($matches[0]);
                require 'app/controllers/' . $route['controller'] . '.php';
                $object = new $route['controller']();
                call_user_func_array([$object, $route['action']], array_keys($matches));
                $page_found = false;
            }
        }
        // if not found return 404 page here
    }

}