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
        // some validation in informations
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
        header('Location: ' . URL . 'dashboard/exam/index');
        exit;
     }
     
/**
      * show lists of exams
      * @return void
      */

      public function index (): void
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
 }