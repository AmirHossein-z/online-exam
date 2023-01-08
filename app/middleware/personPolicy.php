<?php

class personPolicy
{
    public function __construct()
    {
    }

    /**
     * check whether person is logged in
     * @return bool
     */
    public function is_login(): bool
    {
        if (isset($_SESSION) && $_SESSION['id']) {
            return true;
        }
        header('Location: ' . URL . 'auth/login');
        return false;
    }
    /**
     * check whether person is logged in as master
     * @return bool
     */
    public function is_master()
    {
        if ($_SESSION['id'] && $_SESSION['type'] === MASTER) {
            return true;
        }
        return false;
    }
    /**
     * check whether person is logged in as student
     * @return bool
     */
    public function is_student()
    {
        if ($_SESSION['id'] && $_SESSION['type'] === STUDENT) {
            return true;
        }
        return false;
    }
}