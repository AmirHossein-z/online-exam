<?php

class personPolicy extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * check whether person is logged in
     * @param string $path
     * @return bool
     */
    public function is_login(string $path): bool
    {
        if (isset($_SESSION) && isset($_SESSION['id'])) {
            $this->redirect($path);
            return true;
        }
        return false;
    }

    /**
     * check whether person is not logged in
     * @param string $path
     * @return bool
     */
    public function is_not_login(string $path):bool {
        if(!(isset($_SESSION) && isset($_SESSION['id']))) {
            $this->redirect($path);
            return true;
        }
        return false;
    }

    /**
     * check whether person is logged in as master
     * @param string $path
     * @return bool
     */
    public function is_master(string $path): bool
    {
        if (isset($_SESSION['id']) && $_SESSION['type'] === MASTER) {
            $this->redirect($path);
            return true;
        }
        return false;
    }

    /**
     * check whether person is not logged in as master
     * @param string $path
     * @return bool
     */
    public function is_not_master(string $path):bool {
        if (!(isset($_SESSION['id']) && $_SESSION['type'] === MASTER)) {
            $this->redirect($path);
            return true;
        }
        return false;
    }

    /**
     * check whether person is logged in as student
     * @param string $path
     * @return bool
     */
    public function is_student(string $path): bool
    {
        if (isset($_SESSION['id']) && $_SESSION['type'] === STUDENT) {
            $this->redirect($path);
            return true;
        }
        return false;
    }

    /**
     * check whether person is not logged in as student
     * @param string $path
     * @return bool
     */
    public function is_not_student(string $path): bool
    {
        if (!(isset($_SESSION['id']) && $_SESSION['type'] === STUDENT)) {
            $this->redirect($path);
            return true;
        }
        return false;
    }
}