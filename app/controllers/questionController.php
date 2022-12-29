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
        $grade = (float) $_POST['grade'];
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

    public function show_questions()
    {

        $question = $this->model("question");
        $result = $question->get_all_questions($_SESSION['id']);

        if ($result['status'] === 1) {
            $question_ids = [];
            $questions_info = [];
            $options_info = [];
            foreach ($result['result'] as $questions) {
                if (!in_array($questions['question_id'], $question_ids)) {
                    array_push($question_ids, $questions['question_id']);
                    array_push($questions_info, ['id' => $questions['question_id'], 'info' => $questions['question_info'], 'type' => $questions['type'], 'grade' => $questions['grade']]);
                }
                array_push($options_info, ['info' => $questions['option_info'], 'is_correct' => $questions['answer_question_id'] === $questions['option_id'] ? 1 : 0, 'question_id' => $questions['question_id']]);
            }

            $data = [
                'questions_info' => $questions_info,
                'options_info' => $options_info,
            ];
            $this->header('header');
            $this->view('dashboard/questionsView', $data);
            $this->footer('footer');
        }
    }
}