<?php

class Router
{
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
                'middleware' => ['personPolicy:is_login:dashboard/index'],
            ],
            'loggedIn' => [
                'type' => 'POST',
                'pattern_url' => '/^\/auth\/login_user$/',
                'controller' => 'authController',
                'action' => 'login_user',
                'middleware' => ['personPolicy:is_login:dashboard/index'],
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
                'action' => 'register',
                'middleware' => ['personPolicy:is_login:dashboard/index'],
            ],
            'registered' => [
                'type' => "POST",
                'pattern_url' => '/^\/auth\/register_user$/',
                'controller' => 'authController',
                'action' => 'register_user',
                'middleware' => ['personPolicy:is_login:dashboard/index'],
            ],
            'dashboard' => [
                'type' => "GET",
                'pattern_url' => '/^\/dashboard\/index$/',
                'controller' => 'dashboardController',
                'action' => 'index',
                'middleware' => ['personPolicy:is_login:auth/login'],
            ],
            'list_questions' => [
                'type' => "GET",
                'pattern_url' => '/^\/dashboard\/questions$/',
                'controller' => 'questionController',
                'action' => 'show_questions',
                'middleware' => ['personPolicy:is_login:auth/login', 'personPolicy:is_master:dashboard/index'],
            ],
            'add_question' => [
                'type' => "GET",
                'pattern_url' => '/^\/dashboard\/add_question$/',
                'controller' => 'questionController',
                'action' => 'add_question',
                'middleware' => ['personPolicy:is_login:auth/login', 'personPolicy:is_master:dashboard/index'],
            ],
            'add_one_question' => [
                'type' => "POST",
                'pattern_url' => '/^\/dashboard\/add_one_question$/',
                'controller' => 'questionController',
                'action' => 'add_one_question',
                'middleware' => ['personPolicy:is_login:auth/login', 'personPolicy:is_master:dashboard/index'],
            ],
            'edit_question' => [
                'type' => "GET",
                'pattern_url' => '/^\/dashboard\/edit_question\/\d{1,10}$/',
                'controller' => 'questionController',
                'action' => 'edit_question',
                'middleware' => ['personPolicy:is_login:auth/login', 'personPolicy:is_master:dashboard/index'],
            ],
            'edit_one_question' => [
                'type' => "POST",
                'pattern_url' => '/^\/dashboard\/edit_one_question\/\d{1,10}$/',
                'controller' => 'questionController',
                'action' => 'edit_one_question',
                'middleware' => ['personPolicy:is_login:auth/login', 'personPolicy:is_master:dashboard/index'],
            ],
            'delete_question' => [
                'type' => "GET",
                'pattern_url' => '/^\/dashboard\/delete_question\/\d{1,10}$/',
                'controller' => 'questionController',
                'action' => 'delete_question',
                'middleware' => ['personPolicy:is_login:auth/login', 'personPolicy:is_master:dashboard/index'],
            ],
            // exam Routing
            'index_exam' => [
                'type' => 'GET',
                'pattern_url' => '/^\/dashboard\/exam\/index$/',
                'controller' => 'examController',
                'action' => 'index',
                'middleware' => ['personPolicy:is_login:auth/login', 'personPolicy:is_master:dashboard/index']
            ],
            'create_exam' => [
                'type' => 'GET',
                'pattern_url' => '/^\/dashboard\/exam\/create$/',
                'controller' => 'examController',
                'action' => 'create',
                'middleware' => ['personPolicy:is_login:auth/login', 'personPolicy:is_master:dashboard/index']
            ],
            'store_exam' => [
                'type' => 'POST',
                'pattern_url' => '/^\/dashboard\/exam\/store$/',
                'controller' => 'examController',
                'action' => 'store',
                'middleware' => ['personPolicy:is_login:auth/login', 'personPolicy:is_master:dashboard/index']
            ],
            'list_exams' => [
                'type' => 'GET',
                'pattern_url' => '/^\/dashboard\/list_exams$/',
                'controller' => 'examController',
                'action' => 'list_exams',
                'middleware' => ['personPolicy:is_login:auth/login', 'personPolicy:is_student:dashboard/index']
            ],
            'test' => [
                'type' => 'GET',
                'pattern_url' => '/^\/dashboard\/participate\/\d{1,10}$/',
                'controller' => 'questionController',
                'action' => 'questions_exam',
                'middleware' => ['personPolicy:is_login:auth/login', 'personPolicy:is_student:dashboard/index']
            ],
            'test_action' => [
                'type' => 'POST',
                'pattern_url' => '/^\/dashboard\/test_action$/',
                'controller' => 'questionController',
                'action' => 'test_action',
                'middleware' => ['personPolicy:is_login:auth/login', 'personPolicy:is_student:dashboard/index']
            ],
            'list_students' => [
                'type' => 'GET',
                'pattern_url' => '/^\/dashboard\/list_students$/',
                'controller' => 'masterController',
                'action' => 'list_students',
                'middleware' => ['personPolicy:is_login:auth/login', 'personPolicy:is_master:dashboard/index']
            ],
            'enable_student' => [
                'type' => 'POST',
                'pattern_url' => '/^\/dashboard\/enable_student\/\d{1,10}$/',
                'controller' => 'masterController',
                'action' => 'enable_student',
                'middleware' => ['personPolicy:is_login:auth/login', 'personPolicy:is_master:dashboard/index']
            ],
            'list_masters' => [
                'type' => 'GET',
                'pattern_url' => '/^\/dashboard\/list_masters$/',
                'controller' => 'studentController',
                'action' => 'list_masters',
                'middleware' => ['personPolicy:is_login:auth/login', 'personPolicy:is_student:dashboard/index']
            ],
            'add_master' => [
                'type' => 'POST',
                'pattern_url' => '/^\/dashboard\/add_master\/\d{1,10}$/',
                'controller' => 'studentController',
                'action' => 'add_master',
                'middleware' => ['personPolicy:is_login:auth/login', 'personPolicy:is_student:dashboard/index']
            ],
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
                        $result = explode(':', $middleware);
                        $middleware_class = $result[0];
                        $middleware_action = $result[1];
                        $param = (array) $result[2];

                        require_once 'app/middleware/' . $middleware_class . '.php';
                        $object = new $middleware_class();
                        call_user_func_array([$object, $middleware_action], $param);
                    }
                }

                $params = (array) explode('/', $matches[0])[3];
                require 'app/controllers/' . $route['controller'] . '.php';
                $object = new $route['controller']();
                call_user_func_array([$object, $route['action']], $params);
                $page_found = false;
            }
        }


        if ($_GET['url'] === null) {
            require 'app/controllers/indexController.php';
            $object = new indexController();
            $object->show_main_page();
        }

        // echo '404 Location ' . $url . ' Not found!'; 
        // header('Location: '. '/online-exam/dashboard/four_four');
        // exit();
    }
}