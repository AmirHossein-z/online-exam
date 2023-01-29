<?php 

class participateController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function test_action(): void
    {
        //prerequirement: checking date and time of exam

        //first of all create answers in answer table
        $exam_id = $_POST['exam_id'];
        $student_answers = $_POST['option_multi_answer'];
        $student_id = $_SESSION['id'];

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

        foreach($answer_questions as $question_id => $correct_answer)
        {
            if(array_key_exists($question_id, $student_answers))
            {
                $student_answer = $student_answers[$question_id];
                $correct_answer;
                if($student_answer === $correct_answer)
                {
                    $question_grade = $question_model->getGrade($question_id);
                    $grade += $question_grade;
                }
                }
            }

        // third and store it in participate table
        $participate_model = $this->model('participate');
        $participate_model->insert($exam_id, $student_id, $grade);

        $this->redirect('dashboard/list_exams');
    }
}
?>