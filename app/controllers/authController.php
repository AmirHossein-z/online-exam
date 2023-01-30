<?php


class authController extends Controller
{
    public function __construct()
    {
    }

    /**
     * check whether the user is student or master
     * @return string
     */
    public function check_user(): string
    {
        if ($_POST['type'] === STUDENT)
            return STUDENT;
        if ($_POST['type'] === MASTER)
            return MASTER;
        return 'ERROR';
    }

    /**
     * save user session
     * @param string $name
     * @param int $id
     * @return void
     */
    public function save_user_session(string $name, int $id): void
    {
        $_SESSION['name'] = $name;
        $_SESSION['id'] = $id;
        $_SESSION['type'] = $this->check_user();
    }

    /**
     * show register page
     * @return void
     */
    public function register(): void
    {
        $this->header('header');
        $this->view('auth/registerView');
        $this->footer('footer');
    }

    /**
     * register a user in database
     * @return void
     */
    public function register_user(): void
    {
        $fullname = filter_var($_POST['fullname'], FILTER_SANITIZE_STRING);
        $mobile = filter_var($_POST['mobile'], FILTER_SANITIZE_NUMBER_INT);
        $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
        $password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);

        $person = $this->model($this->check_user());
        $status = $person->isPersonExists($this->check_user(), $email, $password)['status'];
        if ($status === 1) {
            $this->set_alert('کاربری با این اطلاعات وجود دارد! ', ALERT_ERROR);
        } else {
            $result = $person->insertPerson($this->check_user(), $fullname, $mobile, $email, $password);

            if ($result['status'] === 1) {
                $this->set_alert('با موفقیت ثبت نام شدید!', ALERT_SUCCESS);
                $this->redirect('auth/login');
            } else {
                $this->set_alert('ثبت نام با خطا مواجه شد.دوباره تلاش کنید', ALERT_ERROR);
                $this->redirect('auth/register');
            }
        }
    }

    /**
     * show login page
     * @return void
     */
    public function login(): void
    {
        $this->header('header');
        $this->view('auth/loginView');
        $this->footer('footer');
    }

    /**
     * login a user  
     * @return void
     */
    public function login_user(): void
    {
        $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
        $password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);

        $person = $this->model($this->check_user());
        $result = $person->isPersonExists($this->check_user(), $email, $password);
        if ($result['status'] === 1) {
            $status = $result['status'];
            $name = $result['result']['name'];
            $id = $result['result']["{$this->check_user()}_id"];
        }
        if ($status === 1) {
            $this->save_user_session($name, $id);
            $this->set_alert('شما با موفقیت وارد شدید!', ALERT_SUCCESS);
            $this->redirect('dashboard/index');
        } else {
            $this->set_alert('مشکلی در ورود پیش آمده است دوباره امتحان کنید', ALERT_ERROR);
            $this->redirect('auth/login');
        }
    }

    public function logout()
    {
        session_destroy();
        session_start();
        $this->redirect('auth/login');
        exit();
    }
}