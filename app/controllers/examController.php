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
        $exam_model = $this->model('exam');

        $get_last_exam_id = $exam_model->get_last_id();
        var_dump($get_last_exam_id);
        exit;

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
        if (filter_var($_POST['final_grade'], FILTER_SANITIZE_NUMBER_FLOAT)) {
            $final_grade = $_POST['final_grade'];
        } else {
            $this->set_alert_info('خطا', 'نمره نهایی آزمون معتبر نیست', ALERT_ERROR);
            $this->set_alert_for_show();
            $this->redirect('dashboard/exam/create');
        }
        $show_grade = filter_var($_POST['show_grade'], FILTER_VALIDATE_BOOL) === "on" ? 1 : 0;
        $question_ids = array_map('strip_tags', $_POST['questions']);

        //information for exam_master table
        $master_id = $_SESSION['id'];

        //  insert exam information into exam table and fetch it's ID
        $exam_model = $this->model('exam');
        $exam_id = $exam_model->insert($title, $description, $duration, $final_grade, $show_grade);

        // insert exam and master id's into exam_master
        $exam_master_model = $this->model('exam_master');
        $exam_model->insert($exam_id, $master_id);

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
        $exams = $exam_model->select_all_master_exams($_SESSION['id']);
        $data = $exams;
        
        $this->header('header');
        // $this->navbar('navbar');
        $this->view('dashboard/ExamIndexView', $data);
        $this->footer('footer');
    }

    /**
     * Summary of list_exams
     * @return void
     */

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

    /**
     * Summary of edit
     * @param int
     * @return void
     */

    public function edit($exam_id)
    {
        $exam_id = htmlentities($exam_id);
        $model = new Model();
        // if ($model->existsColumn('exam', 'exam_id' ,$exam_id) == true) {
        $exam = $this->model('exam');
        $addExamView = $exam->get_info_by_exam_id($exam_id);
        $this->header('header');
        $this->view('dashboard/addExamView', $addExamView);
        $this->footer('footer');
        // }
    }

    public function update(): void
    {
        // some validation in information
        $exam_id = intval(filter_var($_POST['exam_id'], FILTER_SANITIZE_NUMBER_INT));
        $title = filter_var($_POST['title'], FILTER_SANITIZE_STRING);
        $description = filter_var($_POST['description'], FILTER_SANITIZE_STRING);
        $duration = intval(filter_var($_POST['duration'], FILTER_SANITIZE_NUMBER_INT));
        $grade = floatval(filter_var($_POST['grade'], FILTER_SANITIZE_NUMBER_FLOAT));
        $show_grade = filter_var($_POST['show_grade'], FILTER_VALIDATE_BOOL) === "on" ? 1 : 0;

        //  update exam information into exam table and fetch it's ID
        $exam_model = $this->model('exam');
        $exam_model->update($exam_id, $title, $description, $duration, $grade, $show_grade);

        header('Location: ' . 'exam/index', 200);
    }

    /**
     * Summary of delete_exam
     * @return void
     */

    public function delete(): void
    {
        // some validation in information
        $exam_id = intval(filter_var($_POST['exam_id'], FILTER_SANITIZE_NUMBER_INT));
        $exam_model = $this->model('exam');
        $have_question = $exam_model->is_exam_have_question($exam_id);
        if ($have_question === true) {
            $this->set_alert_info('خطا', 'آزمون نمی تواند حذف شود،چون حاوی سوال است٬', ALERT_ERROR);
            $this->redirect('dashboard/exam/index');
        } else {
            $result = $exam_model->delete($exam_id);
            if ($result == true) {
                $this->set_alert_info('موفق', 'آزمون با موفقیت حذف شد', ALERT_SUCCESS);
                // header('Location: ' . 'exam/index', 200);
            } else
                $this->set_alert_info('خطا', 'لطفا ابتدا سوال آزمون مورد نظر را از بخش لیست سوالات حذف کنید!', ALERT_ERROR);
        }
    }
}