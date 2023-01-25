<?php 

class answerModel extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Summary of insert
     * @param int $exam_id
     * @param array $options
     * @param int $student_id
     * @return void
     */
    public function insert(int $exam_id, array $options, int $student_id): void
    {
        $query = "insert into answer
                 (question_id, option_id, exam_id, student_id)
                 values (?,?,?,?)
                 ";
        foreach($options as $question_id => $option_id)
        {
        $data = [
            ['type' => 'i', 'value' => $question_id],
            ['type' => 'i', 'value' => $option_id],
            ['type' => 'i', 'value' => $exam_id],
            ['type' => 'i', 'value' => $student_id],
        ];
        $this->exeQuery($query, $data, false);
    }
    }
}

?>