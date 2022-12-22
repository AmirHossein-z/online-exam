<?php


class authController extends Controller
{
    public function __construct()
    {
        if (isset($_SESSION['name'])) {
            header('Location: ' . URL . 'dashboard/index');
        }
    }

    public function check_user(): string
    {
        if ($_POST['type'] === Controller::$STUDENT)
            return Controller::$STUDENT;
        if ($_POST['type'] === Controller::$MASTER)
            return Controller::$MASTER;
        return 'ERROR';
    }

    public function save_user_session($name)
    {
        $_SESSION['name'] = $name;
        $_SESSION['type'] = $this->check_user();
    }

    public function register(): void
    {
        $this->header('header');
        $this->navbar('navbar');
        $this->view('auth/registerView');
        $this->footer('footer');
    }

    public function register_user(): void
    {
        $fullname = strip_tags($_POST['fullname'], FILTER_SANITIZE_ENCODED);
        $mobile = strip_tags($_POST['mobile'], FILTER_SANITIZE_ENCODED);
        $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
        $password = strip_tags($_POST['password'], FILTER_SANITIZE_ENCODED);
        $duplicate_password = strip_tags($_POST['duplicate_password'], FILTER_SANITIZE_ENCODED);

        $person = $this->model($this->check_user());
        $status = $person->isPersonExists($this->check_user(), $email, $password)['status'];
        if ($status === 1) {
            echo "user with this information exists";
        } else {
            $status = $person->insertPerson($this->check_user(), $fullname, $mobile, $email, $password);

            if ($status) {
                echo "register success";
                header('Location: ' . URL . 'auth/login');
            } else {
                echo "register failed";
            }
        }
    }

    public function login(): void
    {
        $this->header('header');
        $this->navbar('navbar');
        $this->view('auth/loginView');
        $this->footer('footer');
    }

    public function login_user(): void
    {
        $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
        $password = strip_tags($_POST['password'], FILTER_SANITIZE_ENCODED);

        $person = $this->model($this->check_user());
        $result = $person->isPersonExists($this->check_user(), $email, $password);
        [$status, $name] = [$result['status'], $result['result']['name']];
        if ($status === 1) {
            $this->save_user_session($name);
            header('Location: ' . URL . 'dashboard/index');
        } else {
            echo "login failed";
        }
    }
}