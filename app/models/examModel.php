<?php

class examModel extends Model
{

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * insert new exam
     * @param string title
     * @param string description
     * @param int duration
     * @param float final_grade
     * @param int show_grade
     * @return int
     */

    public function insert(
        string $title, string $description, int $duration,
        float $final_grade, int $show_grade, string $date
    ): int
    {
        $query = "insert into exam
                  (title, description, duration, final_grade, show_grade, date)
                  values (?,?,?,?,?,?)";
        $data = [
            ['type' => 's', 'value' => $title],
            ['type' => 's', 'value' => $description],
            ['type' => 'i', 'value' => $duration],
            ['type' => 'd', 'value' => $final_grade],
            ['type' => 'i', 'value' => $show_grade],
            ['type' => 's', 'value' => $date],
        ];

        // throw error
        $result = $this->exeQuery($query, $data, false);
        return $this->connection->insert_id;
    }

    /**
     * select all exams
     * @return mixed
     */

    public function select_all_master_exams(int $master_id): mixed
    {
        try {
            $query = "SELECT exam.exam_id, exam.title, exam.description, exam.duration, exam.final_grade, exam.show_grade, master.name
            from exam
            join exam_master on exam.exam_id = exam_master.exam_id 
            join master on exam_master.master_id = master.master_id
            WHERE exam_master.master_id = ?";
            $data = [
                ['type' => 'i',
                'value' => $master_id],
            ];
            $result = $this->exeQuery($query, $data, true);
            if ($result->num_rows > 0) {
                $exams = [];
                for ($i = 0; $i < $result->num_rows; $i++) {
                    array_push($exams, $result->fetch_assoc());
                }
            }
            return $exams;
        } catch (customException $e) {
            throw new $e;
        }
        ;
    }

    /**
     * get exam information by exam_id
     * @param int $exam_id
     * @return array
     */
    public function get_info_by_exam_id(int $exam_id): array
    {
        $query = "SELECT * FROM exam WHERE exam_id = ?";

        $data = [
            ['type' => 'i', 'value' => $exam_id]
        ];

        return $this->exeQuery($query, $data, true)->fetch_all($mode = MYSQLI_ASSOC);
    }

    /**
     * update exam
     * @param string title
     * @param string description
     * @param int duration
     * @param float final_grade
     * @param int show_grade
     * @return void
     */

     public function update(int $exam_id, string $title, string $description, int $duration,
     float $final_grade, int $show_grade, string $date): void
     {
        $query = "update exam
                  set title=?, description=? , duration=?, final_grade=?, show_grade=?, date=?
                  where exam_id = $exam_id";
        $data = [
            ['type' => 's', 'value' => $title],
            ['type' => 's', 'value' => $description],
            ['type' => 'i', 'value' => $duration],
            ['type' => 'd', 'value' => $final_grade],
            ['type' => 'i', 'value' => $show_grade],
            ['type' => 's', 'value' => $date],
        ];

        // throw error
        $result = $this->exeQuery($query, $data, false);
     }

      /**
       * Summary of delete_exam
       * @param int $exam_id
       * @return bool
       */

     public function delete(int $exam_id): bool
     {
        $query = "DELETE from exam where exam.exam_id = ?";

        $data = [
            ['type' => 'i', 'value' => $exam_id]
        ];
            return $this->exeQuery($query, $data, false);
     }

      /**
       * Summary of is_exam_have_question
       * @param int $exam_id
       * @return bool
       */

     public function is_exam_have_question(int $exam_id): bool
    {
        $query = "SELECT count(exam_id) FROM exam_question WHERE exam_id=?";

        $data = [
            ['type' => 'i', 'value' => $exam_id]
        ];

        $result = $this->exeQuery($query, $data, true);
        if ($result->num_rows > 0) {
            return true;
        }
        return false;
    }

    public function get_last_id()
    {
        $query = "select exam_id from exam ORDER by exam_id DESC limit 1";
        return $this->exeQuery($query, [], true)->fetch_assoc();
    }
}