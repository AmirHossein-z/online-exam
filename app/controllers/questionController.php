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
        $data = [];
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
        $question_info = filter_var($_POST['question_info'], FILTER_SANITIZE_STRING);
        $grade = (float) filter_var($_POST['grade'], FILTER_SANITIZE_NUMBER_FLOAT);

        $number_question = (int) $_POST['number_questions'] ?? 0;
        $option_lists = $_POST['option_multi'] ?? [0 => $_POST['option_descriptive']];
        $correct_option_index = (int) filter_var($_POST['check_correct_option'], FILTER_SANITIZE_NUMBER_INT) ?? 0;
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
                    $this->set_alert('سوال اضافه شد!', ALERT_SUCCESS);
                    $this->redirect('dashboard/add_question');
                } else {
                    $this->set_alert('دوباره تلاش کنید', ALERT_ERROR);
                    $this->redirect('dashboard/add_question');
                }
            }
        }
    }

    /**
     * show all questions
     * @return void
     */
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

        } else {
            $data = [
                'questions_info' => [],
                'options_info' => [],
            ];
        }

        $this->header('header');
        $this->view('dashboard/questionsView', $data);
        $this->footer('footer');
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
        $question_info = filter_var($_POST['question_info'], FILTER_SANITIZE_STRING);
        $grade = (float) filter_var($_POST['grade'], FILTER_SANITIZE_NUMBER_FLOAT);
        $type = (int) filter_var($_POST['type'], FILTER_SANITIZE_NUMBER_INT);

        if ($type === 1) {
            $option = $this->model('option');
            $options_list = $_POST['option_multi'] ?? [];
            foreach ($options_list as $option_id => $option_info) {
                $status2 = $option->update_option($option_id, $option_info);
                if ($status2 === false) {
                    break;
                }
            }
            $option_id = (int) filter_var($_POST['check_correct_option'], FILTER_SANITIZE_NUMBER_INT);
            $question = $this->model('question');
            $status1 = $question->update_question($question_id, $option_id, $question_info, $grade);
        } else if ($type === 0) {
            $question = $this->model('question');
            $option_descriptive = filter_var($_POST['option_descriptive'], FILTER_SANITIZE_STRING);
            $option_id = filter_var($_POST['option_id_descriptive'], FILTER_SANITIZE_NUMBER_INT);
            $status1 = $question->update_question($question_id, $option_id, $question_info, $grade);

            $option = $this->model('option');
            $status2 = $option->update_option($option_id, $option_descriptive);
        }

        if ($status1 && $status2) {
            $this->set_alert('سوال مورد نظر ویرایش شد.', ALERT_SUCCESS);
            $this->redirect('dashboard/questions');
        } else {
            $this->set_alert('دوباره تلاش کنید.', ALERT_ERROR);
            $this->redirect('dashboard/edit_question/' . $question_id);
        }

    }

    /**
     * delete a question
     * @param int $question_id
     * @return void
     */
    public function delete_question(int $question_id): void
    {
        $question = $this->model('question');
        $exists_in_exam = $question->is_question_exists_in_exam($question_id);

        if (!$exists_in_exam) {
            $option = $this->model('option');
            $status1 = $option->delete_option($question_id);

            $question = $this->model('question');
            $status2 = $question->delete_question($question_id);


            if ($status1 && $status2) {
                $this->set_alert('سوال حذف شد', ALERT_SUCCESS);
                $this->redirect('dashboard/questions');
            } else {
                $this->set_alert('مشکلی پیش آمده است،دوباره تلاش کنید', ALERT_ERROR);
                $this->redirect('dashboard/questions');
            }

        } else {
            $this->set_alert('سوال نمی تواند حذف شود،چون در آزمون استاد انتخاب شده است٬', ALERT_ERROR);
            $this->redirect('dashboard/questions');
        }

    }

    
}