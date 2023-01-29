<?php 

class answerController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

      /**
       * Summary of create
       * @param int $exam_id
       * @param array $answers
       * @param int $student_id
       * @return void
       */
      public function create(int $exam_id, array $answers, int $student_id) : void
      {
          $answer_model = $this->model('answer');
          $answer_model->insert($exam_id, $answers, $student_id);
      }
}
?>