<?php

class examController extends Controller
{
    public function __construct()
    {
    }

    /**
     * show exam form, submitting by master
     * @return void
     */

    public function create(): void
    {
        $questions = $this->model('question');
        $questions = $questions->get_all($_SESSION['id']);
        $data = $questions;
        $this->header('header');
        // $this->navbar('navbar');
        $this->view('dashboard/addExamView', $data);
        $this->footer('footer');
    }

    /**
     * store exam in db
     * @return void
     */

    public function store(): void
    {
        // some validation in information
        $title = filter_var($_POST['title'], FILTER_SANITIZE_STRING);
        $description = filter_var($_POST['description'], FILTER_SANITIZE_STRING);
        $duration = intval(filter_var($_POST['duration'], FILTER_SANITIZE_NUMBER_INT));
        $grade = floatval(filter_var($_POST['grade'], FILTER_SANITIZE_NUMBER_FLOAT));
        $show_grade = filter_var($_POST['show_grade'], FILTER_VALIDATE_BOOL) === "on" ? 1 : 0;
        $question_ids = array_map('strip_tags', $_POST['questions']);

        //  insert exam information into exam table and fetch it's ID
        $exam_model = $this->model('exam');
        $exam_id = $exam_model->insert($title, $description, $duration, $grade, $show_grade);

        // insert exam questions in exam_question table
        $exam_question_model = $this->model('exam_question');
        foreach ($question_ids as $question_id) {
            // each question and one exam has it's own ID
            $exam_question_model->insert($exam_id, $question_id);
        }

        // redirect after insert
        $this->redirect('dashboard/exam/index');
        exit;
    }

    /**
     * show lists of exams
     * @return void
     */

    public function index(): void
    {
        $exam_model = $this->model('exam');
        $exam_model = new examModel;
        $exams = $exam_model->select_all();
        //  foreach ($exams as $exam) {
        //      var_dump($exam);
        //  }
        $data = $exams;

        $this->header('header');
        // $this->navbar('navbar');
        $this->view('dashboard/ExamIndexView', $data);
        $this->footer('footer');
    }

    public function list_exams()
    {
        $student_id = $_SESSION['id'];
        $student_master = $this->model('student_master');

        $all_properties = $student_master->get_all_prop($student_id, STUDENT);
        $exam_master = $this->model('exam_master');
        $exams_info = [];
        foreach ($all_properties as $index => $prop) {
            $master_id = $all_properties[$index]['master_id'];
            $result = $exam_master->exams_for_student($master_id, $student_id);

            $master = $this->model('master');
            $master_info = $master->get_person_info(MASTER, $master_id)[0];
            $exam = $this->model('exam');
            // status should be set for every exam that student can participate in exam or not
            foreach ($result as $index => $item) {
                $info = $exam->get_info_by_exam_id($item['exam_id'])[0];
                array_push($exams_info, ['id' => $info['exam_id'], 'title' => $info['title'], 'description' => $info['description'], 'duration' => $info['duration'], 'final_grade' => $info['final_grade'], 'master_name' => $item['master_id'] === $master_info['master_id'] ? $master_info['name'] : null]);
            }

        }
        // var_dump($master_info[0]['master_id']);
        $data = [
            'exams_info' => $exams_info,
        ];

        $this->header('header');
        $this->view('dashboard/listExamsView', $data);
        $this->footer('footer');

    }
}