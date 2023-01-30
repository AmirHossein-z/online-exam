<?php

class studentController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * show masters' list
     * @return void
     */
    public function list_masters()
    {
        $student_id = $_SESSION['id'];

        $student_master = $this->model('student_master');
        $masters_IDs = $student_master->get_listID($student_id, MASTER);
        $all_properties = $student_master->get_all_prop($student_id, STUDENT);

        $master = $this->model('master');
        $masters_info = [];
        foreach ($masters_IDs as $index => $id) {
            $info = $master->get_person_info('master', $id);
            array_push($masters_info, ['id' => $id, 'name' => $info[0]['name'], 'email' => $info[0]['email'], 'status' => $all_properties[$index]['master_id'] === $id ? $all_properties[$index]['status'] : null]);
        }

        $data = [
            'id' => $student_id,
            'masters_info' => $masters_info
        ];

        $this->header('header');
        $this->view('dashboard/mastersListView', $data);
        $this->footer('footer');
    }

    /**
     * add master to student's list
     * @param int $student_id
     * @return void
     */
    public function add_master(int $student_id)
    {
        $token = trim(filter_var($_POST['token'], FILTER_SANITIZE_STRING));
        $master = $this->model('master');
        $result = $master->is_token_exists($token);

        $student_master = $this->model('student_master');
        if ($result['status'] === 1) {
            $status2 = $student_master->is_student_requested_before($student_id, $result['result']['master_id']);
            if (!$status2) {
                $status3 = $student_master->insert_by_studentID($student_id, false, $result['result']['master_id']);

                if ($status3) {
                    $this->set_alert('منتظر تایید استاد باشید', ALERT_SUCCESS);
                    $this->redirect('dashboard/list_masters');
                } else {
                    $this->set_alert('مشکلی پیش آمده است.دوباره تلاش کنید', ALERT_ERROR);
                    $this->redirect('dashboard/list_masters');
                }
            } else {
                $this->set_alert('شما قبلا درخواست داده اید٬', ALERT_ERROR);
                $this->redirect('dashboard/list_masters');
            }
        }

    }
}