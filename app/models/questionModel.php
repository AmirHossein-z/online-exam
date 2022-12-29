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
    public function insert_question(string $question_info, int $type, float $grade, int $master_id, int|null $option_id)
    {
        $query = "INSERT INTO question(q_info,type,grade,master_id,option_id) VALUES (?,?,?,?,?)";
        $data = [
            ['type' => 's', 'value' => $question_info],
            ['type' => 'i', 'value' => $type],
            ['type' => 'd', 'value' => $grade],
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

    public function get_all_questions(int $master_id)
    {
        $query = "SELECT question.question_id,question.q_info AS question_info,question.type,question.grade,question.option_id AS answer_question_id,optionn.info AS option_info,optionn.option_id FROM question INNER JOIN optionn WHERE question.master_id = ? AND question.question_id = optionn.question_id;";

        $data = [
            ['type' => 'i', 'value' => $master_id],
        ];
        $result = $this->exeQuery($query, $data, true);
        $questions = [];
        if ($result->num_rows > 0) {
            for ($i = 0; $i < $result->num_rows; $i++) {
                array_push($questions, $result->fetch_assoc());
            }
            return ['status' => 1, 'result' => $questions];
        } else {
            return ['status' => 0, 'result' => 'Error'];
        }
    }

    /**
     * @param int master_id
     * @return array
     */

     public function get_all(int $master_id) : array
     {
        $query = "select * from question
        where question.master_id = ?;";

        $data = [
            ['type' => 'i', 'value' => $master_id],
        ];

        return $this->exeQuery($query, $data, true)->fetch_all($mode = MYSQLI_ASSOC);
     }
}