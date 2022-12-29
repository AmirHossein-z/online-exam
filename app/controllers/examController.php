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

    public function create() : void
    {
        $this->header('header');
        // $this->navbar('navbar');
        $this->view('dashboard/addExamView');
        $this->footer('footer');
    }

    /**
     * store exam in db
     * @return void
     */

     public function store() : void
     {
        $title = strip_tags($_POST['title'], FILTER_SANITIZE_ENCODED);
        $description = strip_tags($_POST['description'], FILTER_SANITIZE_ENCODED);
        $duration = intval(strip_tags($_POST['duration'], FILTER_SANITIZE_NUMBER_INT));
        // $grade = floatval(strip_tags($_POST['grade'], FILTER_SANITIZE_NUMBER_FLOAT));
        $grade = 18.2;
        $show_grade = strip_tags($_POST['show_grade'], FILTER_VALIDATE_BOOL) === "on" ? 1 : 0;
        
        $exam_model = $this->model('exam');
        $exam_model->insert($title,$description,$duration,$grade,$show_grade);
     }
}