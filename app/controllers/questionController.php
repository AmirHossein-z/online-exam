<?php

class questionController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * shows question form creation
     * @return void
     */
    public function add_question()
    {
        $this->header('header');
        $this->view('dashboard/addQuestionView');
        $this->footer('footer');
    }

    /**
     * add question with its options to database by master
     * @return void
     */
    public function add_one_question()
    {
        $question_info = $_POST['question_info'];
        $grade = $_POST['grade'];
        // $number_question = (int) $_POST['number_questions'] ?? 0;
        $option_lists = $_POST['option_multi'] ?? [0 => $_POST['option_descriptive']];
        $correct_option_index = (int) $_POST['check_correct_option'] ?? 0;
        // type:1 -> multi_option type:0 -> option_descriptive
        $type = $_POST['is_multi_choice_option'] === "on" ? 1 : 0;

        // add question
        $question = $this->model('question');
        $question_id = $question->insert_question($question_info, $type, $grade, $_SESSION['id'], null);

        $option = $this->model('option');
        foreach ($option_lists as $index => $option_info) {
            // add option
            $option_id = $option->add_option($option_info, $question_id);

            // add correct option to question
            if ($index === $correct_option_index) {
                $status = $question->update_optionID($question_id, $option_id);
                if ($status) {
                    echo "success";
                } else {
                    echo "failed";
                }
            }
        }
    }
}