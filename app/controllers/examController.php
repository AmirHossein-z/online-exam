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
        $exam_model = $this->model('exam');
        $data = [];
        $data = $exam_model->get_last_id();

        $this->header('header');
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
        
        // convert final_grade type to float
        $_POST['final_grade'] = floatval($_POST['final_grade']);

        if (filter_var($_POST['final_grade'], FILTER_SANITIZE_NUMBER_FLOAT)) {
            $final_grade = $_POST['final_grade'];
        }
        $show_grade = strip_tags($_POST['show_grade']) === "on" ? 1 : 0;

        // time and date info
        $date = strip_tags($_POST['date_submit']);
        $time = strip_tags($_POST['time_submit']);
        $date = $date . ' ' . $time;

        //information for exam_master table
        $master_id = $_SESSION['id'];

        //  insert exam information into exam table and fetch it's ID
        $exam_model = $this->model('exam');
        $exam_id = $exam_model->insert($title, $description, $duration, $final_grade, $show_grade, $date);

        // insert exam and master id's into exam_master
        $exam_master_model = $this->model('exam_master');
        $exam_master_model->insert($exam_id, $master_id);

        // insert exam questions in exam_question table
        // $exam_question_model = $this->model('exam_question');
        // foreach ($question_ids as $question_id) {
        //     // each question and one exam has it's own ID
        //     $exam_question_model->insert($exam_id, $question_id);
        // }

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
        if($data == null) 
        $this->view('dashboard/ExamIndexView');

        else
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
        // checking the status of exam should be 1 to show
            if($all_properties[$index]['status'] == 1)
            {
            $master_id = $all_properties[$index]['master_id'];
            $result = $exam_master->exams_for_student($master_id, $student_id);

            $master = $this->model('master');
            $master_info = $master->get_person_info(MASTER, $master_id)[0];
            $exam = $this->model('exam');
                foreach ($result as $index => $item) {
                    $info = $exam->get_info_by_exam_id($item['exam_id'])[0];
                    
                    // select every grade from participate table
                    $participate_model = $this->model('participate');
                    $student_grade = $participate_model->getStudentGrade($_SESSION['id'], $info['exam_id']);
                    array_push($exams_info, ['id' => $info['exam_id'], 'title' => $info['title'], 'description' => $info['description'], 'duration' => $info['duration'], 'show_grade' => $info['show_grade'], 'final_grade' => $info['final_grade'], 'date' => $info['date'], 'master_name' => $item['master_id'] === $master_info['master_id'] ? $master_info['name'] : null, 'student_grade' => $student_grade !== NULL ? $student_grade : 'ثبت نشده']);
                }
            }
        }
        $data = [
            'exams_info' => $exams_info
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

        // convert final_grade type to float
        $_POST['final_grade'] = floatval($_POST['final_grade']);
        if (filter_var($_POST['final_grade'], FILTER_SANITIZE_NUMBER_FLOAT)) {
            $final_grade = $_POST['final_grade'];
        }
        // checking show_grade checkbox status
        if(isset($_POST['show_grade']))
            $show_grade = filter_var($_POST['show_grade'], FILTER_VALIDATE_BOOL) === "on" ? 1 : 0;
        else if (!isset($_POST['show_grade']))
            $show_grade = 0;

        // time and date info
        $date = strip_tags($_POST['date_submit']);
        $time = strip_tags($_POST['time_submit']);
        $date = $date . ' ' . $time;
        //  update exam information into exam table and fetch it's ID
        $exam_model = $this->model('exam');
        $exam_model->update($exam_id, $title, $description, $duration, $final_grade, $show_grade, $date);

        $this->redirect('dashboard/exam/index');
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
        $result = $exam_model->delete($exam_id);
        if ($result == true) {
                $this->set_alert('آزمون با موفقیت حذف شد', ALERT_SUCCESS);
                $this->redirect('dashboard/exam/index');
            } else {
                $this->set_alert('آزمون نمی تواند حذف شود', ALERT_ERROR);
                $this->redirect('dashboard/exam/index');
        }
    }

    /**
     * Summary of createQuestion
     * @return void
     */
    public function createQuestion(): void
    {
        $questions = $this->model('question');
        $questions = $questions->get_all($_SESSION['id']);
        
        $this->header('header');
        $this->view('dashboard/addExamQuestionView', $questions);
        $this->footer('footer');
    }

    public function addQuestion(): void
    {
        $url_explode = explode('/', $_GET['url']);
        $exam_id = $url_explode[2];

        foreach($_POST['questions'] as $question_id)
        {
            $question_id = filter_var($question_id, FILTER_SANITIZE_NUMBER_INT);
            $exam_question_model = $this->model('exam_question');
            $exam_question_model->insert($exam_id, $question_id);
        }

        $this->redirect('dashboard/exam/index');
    }
}
