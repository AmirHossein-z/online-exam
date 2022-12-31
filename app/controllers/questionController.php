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
                    // show success message
                    header('Location: ' . URL . 'dashboard/add_question');
                } else {
                    // show failed message and try again
                    header('Location: ' . URL . 'dashboard/add_question');
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

    /**
     * show edit question view
     * @param int $question_id
     * @return void
     */
    public function edit_question(int $question_id): void
    {
        $question = $this->model('question');
        $question = $question->get_question_byID($question_id)[0];
        $option = $this->model('option');
        $result2 = $option->get_all_option_by_question_id($question_id);
        $options_list = [];
        foreach ($result2 as $item) {
            array_push($options_list, [
                'option_id' => $item['option_id'],
                'info' => $item['info']
            ]);
        }

        $data = [
            'question_id' => $question['question_id'],
            'type' => $question['type'],
            'grade' => $question['grade'],
            'question_info' => $question['q_info'],
            'correct_option_id' => $question['option_id'],
            'options_list' => $options_list
        ];
        $this->header('header');
        $this->view('dashboard/editQuestionView', $data);
        $this->footer('footer');
    }

    /**
     * edit a question
     * @param int $question_id
     * @return void
     */
    public function edit_one_question(int $question_id)
    {
        $question_info = $_POST['question_info'];
        $grade = $_POST['grade'];
        $type = (int) $_POST['type'];

        if ($type === 1) {
            $option = $this->model('option');
            $options_list = $_POST['option_multi'];
            foreach ($options_list as $option_id => $option_info) {
                $status2 = $option->update_option($option_id, $option_info);
                if ($status2 === false) {
                    break;
                }
            }
            $option_id = (int) $_POST['check_correct_option'];
            $question = $this->model('question');
            $status1 = $question->update_question($question_id, $option_id, $question_info, $grade);
        } else if ($type === 0) {
            $question = $this->model('question');
            $option_descriptive = $_POST['option_descriptive'];
            $option_id = $_POST['option_id_descriptive'];
            $status1 = $question->update_question($question_id, $option_id, $question_info, $grade);

            $option = $this->model('option');
            $status2 = $option->update_option($option_id, $option_descriptive);
        }

        if ($status1 && $status2) {
            // show success message
            echo "success";
            header('Location: ' . URL . 'dashboard/questions');
        } else {
            // show error and problem
            echo "error";
            header('Location: ' . URL . 'dashboard/edit_one_question/' . $question_id);
        }

    }

}