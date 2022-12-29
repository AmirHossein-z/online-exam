<?php

class exam_questionModel extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @param int exam_id
     * @param int question_id
     * @return void
     */

    public function insert(int $exam_id, int $question_id) : void
    {
        $query = "insert into exam_question(exam_id, question_id)
        values (?,?)";

        $data = [
            ['type' => 'i', 'value' => $exam_id],
            ['type' => 'i', 'value' => $question_id]
        ];
        
        $this->exeQuery($query, $data, false);
    }
}