<?php

class App
{
    public function __construct()
    {
        require_once('router.php');
        new Router;
    }

}