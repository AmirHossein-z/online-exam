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
    public function is_login(string $first_path,$second_path): bool
    {
        // if session was set and also has an id,then user has logged in
        if (isset($_SESSION) && isset($_SESSION['id'])) {
            if($first_path !== NOWHERE) {
                // this condition checks for redirecting to valid path
                $this->redirect($first_path);
            }
            return true;
        }
        if($second_path !== NOWHERE) {
            $this->redirect($second_path);
        }
        return false;
    }

    /**
     * check whether person is logged in as master
     * @return bool
     */
    public function is_master(string $first_path,$second_path): bool
    {
        if (isset($_SESSION['id']) && $_SESSION['type'] === MASTER) {
            if($first_path !== NOWHERE) {
                $this->redirect($first_path);
            }
            return true;
        }
        if($second_path !== NOWHERE) {
            $this->redirect($second_path);
        }
        return false;
    }

    /**
     * check whether person is logged in as student
     * @return bool
     */
    public function is_student(string $first_path,$second_path): bool
    {
        if (isset($_SESSION['id']) && $_SESSION['type'] === STUDENT) {
            if($first_path !== NOWHERE) {
                $this->redirect($first_path);
            }
            return true;
        }
        if($second_path !== NOWHERE) {
            $this->redirect($second_path);
        }
        return false;
    }
}