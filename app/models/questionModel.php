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
     * @return bool
     */
    public function update_optionID(int $option_id, int $question_id): bool
    {
        $query = "UPDATE question SET question.option_id=? WHERE question.question_id =?";
        $data = [
            ['type' => 'i', 'value' => $question_id],
            ['type' => 'i', 'value' => $option_id],
        ];
        return $this->exeQuery($query, $data, false);
    }

    /**
     * get all questions by master_id
     * @param int $master_id
     * @return array
     */
    public function get_all_questions(int $master_id): array
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
     * get a question by id
     * @param int $question_id
     * @return array
     */
    public function get_question_byID(int $question_id): array
    {
        $query = "SELECT * FROM question WHERE question_id = ?";

        $data = [
            ['type' => 'i', 'value' => $question_id],
        ];

        return $this->exeQuery($query, $data, true)->fetch_all($mode = MYSQLI_ASSOC);

    }

    /**
     * @param int master_id
     * @return array
     */

    public function get_all(int $master_id): array
    {
        $query = "select * from question
        where question.master_id = ?;";

        $data = [
            ['type' => 'i', 'value' => $master_id],
        ];

        return $this->exeQuery($query, $data, true)->fetch_all($mode = MYSQLI_ASSOC);
    }

    /**
     * update question info by question_id
     * @param int $question_id
     * @param int $option_id
     * @param string $question_info
     * @param float $grade
     * @return bool
     */
    public function update_question(int $question_id, int $option_id, string $question_info, float $grade): bool
    {
        $query = "UPDATE question SET q_info=?, grade=?, question.option_id=? WHERE question.question_id=?";

        $data = [
            ['type' => 's', 'value' => $question_info],
            ['type' => 'd', 'value' => $grade],
            ['type' => 'i', 'value' => $option_id],
            ['type' => 'i', 'value' => $question_id],
        ];

        return $this->exeQuery($query, $data, false);
    }


    /**
     * check if the question exists in question_exam table
     * @param int $question_id
     * @return bool
     */
    public function is_question_exists_in_exam(int $question_id): bool
    {
        $query = "SELECT * FROM exam_question WHERE question_id=?";

        $data = [
            ['type' => 'i', 'value' => $question_id]
        ];

        $result = $this->exeQuery($query, $data, true);
        if ($result->num_rows > 0) {
            return true;
        }
        return false;
    }

    /**
     * delete a question
     * @param int $question_id
     * @return bool
     */
    public function delete_question(int $question_id): bool
    {
        $query = "DELETE FROM question WHERE question.question_id=?";

        $data = [
            ['type' => 'i', 'value' => $question_id]
        ];

        return $this->exeQuery($query, $data, false);
    }

    /**
     * all questions' id in a special exam
     * @param int $exam_id
     * @return array
     */
    public function exam_questionsID(int $exam_id): array
    {
        $query = "SELECT question_id FROM exam_question WHERE exam_id=?";

        $data = [
            ['type' => 'i', 'value' => $exam_id]
        ];

        $result = $this->exeQuery($query, $data, true)->fetch_all($mode = MYSQLI_ASSOC);

        $questions_id = [];
        foreach ($result as $item) {
            array_push($questions_id, $item['question_id']);
        }
        return $questions_id;
    }

    /**
     * Summary of selectCorrectOptions
     * @param mixed $exam_id
     * @return array
     */
    public function selectCorrectOptions($exam_id): array
    {
        $query = "SELECT * from exam_question join question
        on
        exam_question.question_id = question.question_id
        WHERE exam_id = ?";

        $data = [
            ['type' => 'i', 'value' => $exam_id]
        ];

        $result = $this->exeQuery($query, $data, true)->fetch_all($mode = MYSQLI_ASSOC);

        $question_answer = [];
        foreach ($result as $item) {
            $question_answer[$item['question_id']] = $item['option_id'];
        }
        return $question_answer;
    }

    /**
     * Summary of getGrade
     * @param int $question_id
     * @return float
     */
    public function getGrade(int $question_id): float
    {
        $query = "select grade from question
                where question_id = ?";

        $data = [
            ['type' => 'i', 'value' => $question_id]
        ];

        $result = $this->exeQuery($query, $data, true)->fetch_assoc();
        return $result['grade'];
    }
}