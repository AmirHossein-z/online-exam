<?php

class questionModel extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * insert a new question 
     * @param string $question_info
     * @param int $type
     * @param int $grade
     * @param int $master_id
     * @param int|null $option_id
     * @return int|string 
     */
    public function insert_question(string $question_info, int $type, int $grade, int $master_id, int|null $option_id)
    {
        $query = "INSERT INTO question(q_info,type,grade,master_id,option_id) VALUES (?,?,?,?,?)";
        $data = [
            ['type' => 's', 'value' => $question_info],
            ['type' => 'i', 'value' => $type],
            ['type' => 'i', 'value' => $grade],
            ['type' => 'i', 'value' => $master_id],
            ['type' => 'i', 'value' => $option_id],
        ];

        $status = $this->exeQuery($query, $data, false);
        if ($status)
            return $this->connection->insert_id;
        else
            return "ERROR";
    }

    /**
     * update optionID to the corrected option
     * @param int $option_id
     * @param int $question_id
     * @return bool|mysqli_result
     */
    public function update_optionID(int $option_id, int $question_id)
    {
        $query = "UPDATE question SET question.option_id=? WHERE question.question_id =?";
        $data = [
            ['type' => 'i', 'value' => $question_id],
            ['type' => 'i', 'value' => $option_id],
        ];
        return $this->exeQuery($query, $data, false);
    }
}