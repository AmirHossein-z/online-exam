<?php

class Router{
    public function __construct()
    {
        $request_type = $_SERVER['REQUEST_METHOD'];

        $url = '/' . $_GET['url'];
        $routes = [
            '404' => [
                'type' => "GET",
                'pattern_url' => '/^\/dashboard\/four_four$/',
                'controller' => 'dashboardController',
                'action' => 'four_four',
            ],
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
            'logout' => [
                'type' => 'GET',
                'pattern_url' => '/^\/auth\/logout$/',
                'controller' => 'authController',
                'action' => 'logout',
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
                'action' => 'index',
                'middleware' => ['personPolicy:is_login'],
            ],
            'list_questions' => [
                'type' => "GET",
                'pattern_url' => '/^\/dashboard\/questions$/',
                'controller' => 'questionController',
                'action' => 'show_questions',
                'middleware' => ['personPolicy:is_login', 'personPolicy:is_master'],
            ],
            'add_question' => [
                'type' => "GET",
                'pattern_url' => '/^\/dashboard\/add_question$/',
                'controller' => 'questionController',
                'action' => 'add_question',
                'middleware' => ['personPolicy:is_login', 'personPolicy:is_master'],
            ],
            'add_one_question' => [
                'type' => "POST",
                'pattern_url' => '/^\/dashboard\/add_one_question$/',
                'controller' => 'questionController',
                'action' => 'add_one_question',
                'middleware' => ['personPolicy:is_login', 'personPolicy:is_master'],
            ],
            // exam Routing
            'create_exam' => [
                'type' => 'GET',
                'pattern_url' => '/^\/dashboard\/exam\/create$/',
                'controller' => 'examController',
                'action' => 'create',
                'middleware' => ['personPolicy:is_login', 'personPolicy:is_master']
            ],
            'store_exam' => [
                'type' => 'POST',
                'pattern_url' => '/^\/dashboard\/exam\/store$/',
                'controller' => 'examController',
                'action' => 'store',
                'middleware' => ['personPolicy:is_login', 'personPolicy:is_master']
            ]
        ];

        foreach ($routes as $route) {
            if (
                preg_match(
                    $route['pattern_url'],
                    $url,
                    $matches
                ) && $request_type == $route['type']
            ) {

                //middleware check
                if (isset($route['middleware']) && $route['middleware'] != '') {
                    foreach ($route['middleware'] as $middleware) {
                        $middleware_class = explode(':', $middleware)[0];
                        $middleware_action = explode(':', $middleware)[1];

                        require_once 'app/middleware/' . $middleware_class . '.php';
                        $new_middleware = new $middleware_class();
                        $new_middleware->$middleware_action();
                    }
                }

                // services check
                // if (isset($route['services']) && $route['services'] != '') {
                //     foreach ($route['services'] as $service) {
                //         $service_class = explode(':', $service)[0];
                //         $service_action = explode(':', $service)[1];
                //         require_once 'app/services/' . $service_class . '.php';
                //         $new_service = new $service_class();
                //         $new_service->$service_action($_POST['csrf_token']);
                //     }
                // }

                unset($matches[0]);
                require 'app/controllers/' . $route['controller'] . '.php';
                $object = new $route['controller']();
                call_user_func_array([$object, $route['action']], array_keys($matches));
                $page_found = false;
            }
        }
        echo '404 Location ' . $url . ' Not found!'; 
        // header('Location: '. '/online-exam/dashboard/four_four');
        // exit();
    }
}