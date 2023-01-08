<?php

class studentController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function list_masters()
    {
        $student_id = $_SESSION['id'];

        $student_master = $this->model('student_master');
        $masters_IDs = $student_master->get_masters_listID($student_id);
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
        $token = filter_var($_POST['token'], FILTER_SANITIZE_STRING);
        $student_master = $this->model('student_master');
        $result = $student_master->is_token_exists($token);
        if ($result['status'] === 1234) {
            $status2 = $student_master->insert_by_studentID($student_id, $token, false, $result['result']['master_id']);
            if ($status2) {
                // alert waiting for accepting from master
                header('Location: ' . URL . 'dashboard/list_masters/' . $student_id);
            } else {
                // alert error and 
            }
        }

    }
}