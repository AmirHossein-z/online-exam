<?php

class personPolicy
{
    public function __construct()
    {
    }

    public function is_login()
    {
        if (isset($_SESSION) && $_SESSION['id']) {
            return true;
        }
        header('Location: ' . URL . 'dashboard/index');
    }
    public function is_master()
    {
        if ($_SESSION['id'] && $_SESSION['type'] === MASTER) {
            return true;
        }
        return false;
    }
    public function is_student()
    {
        if ($_SESSION['id'] && $_SESSION['type'] === STUDENT) {
            return true;
        }
        return false;
    }

}