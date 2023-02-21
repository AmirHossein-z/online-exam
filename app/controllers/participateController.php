<?php 

class participateController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }


    /**
     * Summary of create
     * @param int $exam_id
     * @return void
     */
    public function create(int $exam_id)
    {
        $student_id = $_SESSION['id'];
        $exam_model = $this->model('exam');
        $exam_info = $exam_model->get_info_by_exam_id($exam_id);

        //prerequirement: checking date and time of exam
        // if the time of exam passed not accept any answer

        $now = time();
    
        $exam_time = strtotime($exam_info[0]['date']);
        // duration when convert to timestamp maens now + duration
        $duration = $exam_time + ($exam_info[0]['duration']*60);

        $participate_model = $this->model('participate');
        $numberOfParticipate = $participate_model->checkNumberOfParticipate($exam_id, $student_id);

        /**
         * if date of exam arrived and number of participating of student is zero
         * in other word just participate can exam just between datetime of exam and a time after that (duration)
         */
        if($duration < ($now) || ($numberOfParticipate !== 0)){
            $this->set_alert('زمان آزمون شما معتبر نمی باشد.',ALERT_ERROR);
            $this->redirect('dashboard/list_exams');
            exit;
        }

        $question = $this->model('question');
        $option = $this->model('option');
        $exam_questionsID = $question->exam_questionsID($exam_id);
        $questions_info = [];
        $options_info = [];

        foreach ($exam_questionsID as $index => $question_id) {
            $question_item = $question->get_question_byID($question_id)[0];
            array_push($questions_info, ['id' => $question_item['question_id'], 'info' => $question_item['q_info'], 'type' => $question_item['type'], 'grade' => $question_item['grade']]);
            $option_list = $option->get_all_option_by_question_id($question_item['question_id']);

            foreach ($option_list as $option_item) {
                array_push($options_info, ['id' => $option_item['option_id'], 'info' => $question_item['type'] === 1 ? $option_item['info'] : "", 'question_id' => $option_item['question_id']]);
            }
        }

        $data = [
            'exam_id' => $exam_id,
            'exam_date' => $exam_info[0]['date'],
            'exam_duration' => $exam_info[0]['duration'],
            'questions_info' => $questions_info,
            'options_info' => $options_info,
        ];

        $this->header('header');
        $this->view('dashboard/participateExamView', $data);
        $this->footer('footer');
    }

    /**
     * Summary of store
     * @return void
     */
    public function store(): void
    {
        // if the time of exam passed not accept any answer

        $now = time();
        // duration when convert to timestamp maens now + duration

        $exam_model = $this->model('exam');
        $exam_info = $exam_model->get_info_by_exam_id($_POST['exam_id'])[0];

        $exam_time = strtotime($exam_info['date']);
        $duration = $exam_time + ($exam_info['duration']*60);

        // if the duration of exam_time passed
        if($now > $duration) {
            $this->set_alert('زمان آزمون گذشته است',ALERT_ERROR);
            $this->redirect('dashboard/list_exams');
            exit;
        }

        
        //first of all create answers in answer table
        $student_id = $_SESSION['id'];
        $exam_id = $_POST['exam_id'];

        if (array_key_exists('option_multi_answer', $_POST)) {
            $student_answers = $_POST['option_multi_answer'];

            include_once('answerController.php');
            $answerController = new answerController;
            $answerController->create($exam_id, $student_answers, $student_id);

            //second evaluate the exam and calculate the grade of participate(student)
            $grade = 0;

            $question_model = $this->model('question');
            $answer_questions = $question_model->selectCorrectOptions($exam_id);

            // convert student answer type to int for better handling
            foreach ($student_answers as $key => $value) {
                $student_answers[$key] = intval($value);
            }

            foreach ($answer_questions as $question_id => $correct_answer) {
                if (array_key_exists($question_id, $student_answers)) {
                    $student_answer = $student_answers[$question_id];
                    $correct_answer;
                    if ($student_answer === $correct_answer) {
                        $question_grade = $question_model->getGrade($question_id);
                        $grade += $question_grade;
                    }
                }
            }

        }
        //end of if option multi answer exists

        //else if student not answer to any question set it's grade 0 and end the exam
        else if (!array_key_exists('option_multi_answer', $_POST))
        {
        $student_answer = null;
        $grade = 0;
        }

        // third and store it in participate table
        $participate_model = $this->model('participate');
        $participate_model->insert($exam_id, $student_id, $grade);

        $this->redirect('dashboard/list_exams');
    }

    public function index(): void
    {
        // var_dump($_SESSION); exit;
        $participate_model = $this->model('participate');
        $data = $participate_model->getParticipates($_SESSION['id']);

        $person_model = $this->model('person');

        foreach ($data as $index => $item) {
            $person_name = $person_model->get_person_name(STUDENT, $data[$index]['student_id'])['name'];
            $data[$index] += ['student_name' => $person_name];
        }

        $exam_model = $this->model('exam');

        foreach ($data as $index => $item) {
            $exam_title = $exam_model->get_info_by_exam_id($data[$index]['exam_id'])[0]['title'];
            $data[$index] += ['exam_title' => $exam_title];
        }

        $this->header('header');
        $this->view('dashboard/participate/ParticipateIndexView', $data);
        $this->footer('footer');
    }
}
?>