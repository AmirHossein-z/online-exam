<?php

class personPolicy extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * check whether person is logged in
     * @return bool
     */
    public function is_login(string $relative_path): bool
    {
        if (isset($_SESSION) && $_SESSION['id']) {
            return true;
        }
        else
        {
            return false;
        }
    }

    /**
     * check whether person is logged in as master
     * @return bool
     */
    public function is_master(string $relative_path): bool
    {
        if ($_SESSION['id'] && $_SESSION['type'] === MASTER) {
            return true;
        }
        $this->redirect($relative_path);
        return false;
    }

    /**
     * check whether person is logged in as student
     * @return bool
     */
    public function is_student(string $relative_path): bool
    {
        if ($_SESSION['id'] && $_SESSION['type'] === STUDENT) {
            return true;
        }
        $this->redirect($relative_path);
        return false;
    }
}