<?php

class masterController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * show token & students list to master
     * @return void
     */
    public function list_students()
    {
        $master_id = $_SESSION['id'];
        $student_master = $this->model('student_master');
        $students_IDs = $student_master->get_listID($master_id, STUDENT);
        $all_properties = $student_master->get_all_prop($master_id, MASTER);

        $token = $all_properties[0]['identification_token'];
        $student = $this->model('student');
        $students_info = [];
        foreach ($students_IDs as $index => $id) {
            $info = $student->get_person_info('student', $id);
            array_push($students_info, ['id' => $id, 'name' => $info[0]['name'], 'email' => $info[0]['email'], 'status' => $all_properties[$index + 1]['student_id'] === $id ? $all_properties[$index]['status'] : null]);
        }

        $data = [
            'token' => $token,
            'students_info' => $students_info,
        ];

        $data = $this->set_alert_for_show($data);
        if (isset($data['alert'])) {
            $this->view('layout/alert', $data['alert']);
        }
        $this->header('header');
        $this->view('dashboard/studentsListView', $data);
        $this->footer('footer');
    }

    /**
     * enable student to be of masters' students
     * @param int $student_id
     * @return void
     */
    public function enable_student(int $student_id)
    {
        $master_id = $_SESSION['id'];

        $student_master = $this->model('student_master');
        $status = $student_master->update_state($master_id, $student_id);
        if ($status) {
            $this->set_alert_info('موفق', 'کاربر به لیست دانشجویان شما اضافه شد', ALERT_SUCCESS);
            header('Location:' . URL . 'dashboard/list_students');
        } else {
            $this->set_alert_info('خطا', 'مشکلی پیش آمده است،دوباره تلاش کنید.', ALERT_ERROR);
            header('Location:' . URL . 'dashboard/list_students');
        }
    }
}