<?php 

class participateModel extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Summary of insert
     * @param int $exam_id
     * @param int $student_id
     * @param float $grade
     * @return void
     */
    public function insert(int $exam_id,int  $student_id,float $grade): void
    {
        $query = "insert into participate
                 (student_id, exam_id, grade)
                 values (?,?,?)";
        $data = [
            ['type' => 'i', 'value' => $student_id],
            ['type' => 'i', 'value' => $exam_id],
            ['type' => 'd', 'value' => $grade]
        ];

        $this->exeQuery($query, $data, false);
    }

    /**
     * Summary of getStudentGrade
     * @param int $student_id
     * @return mixed
     */
    public function getStudentGrade(int $student_id, int $exam_id) : mixed
    {
        // getting first grade of student participate
        $query = "select grade from participate
                where student_id = ? AND exam_id = ? limit 1";

        $data = [
            ['type' => 'i', 'value' => $student_id],
            ['type' => 'i', 'value' => $exam_id]
        ];

        $result = $this->exeQuery($query, $data, true)->fetch_assoc();
        if ($result === NULL)
            return NULL;
        else return $result['grade'];
    }

     /**
      * Summary of checkNumberOfParticipate
      * @param int $exam_model
      * @param int $student_id
      * @return int
      */

    public function checkNumberOfParticipate(int $exam_id, int $student_id): int
    {
        $query = "SELECT count(*) from participate
                  WHERE exam_id = ? AND student_id = ?";

        $data =
            [
                ['type' => 's', 'value' => $exam_id],
                ['type' => 's', 'value' => $student_id]
            ];

        $result = $this->exeQuery($query, $data, true)->fetch_column();
        return $result;
    }

    /**
     * Summary of getParticipates
     * @return array
     */
    public function getParticipates(int $master_id): array
    {
        $query = "SELECT * FROM `participate` JOIN exam_master
        on exam_master.exam_id = participate.exam_id
        WHERE exam_master.master_id = ?";

        $data = [
            ['type' => 's', 'value' => $master_id]
        ];

        $participates = $this->exeQuery($query, $data, true)->fetch_all($mode = MYSQLI_ASSOC);
        $result = [];
        foreach ($participates as $record)
        {
            array_push($result,
            [
            'student_id' => $record['student_id'],
            'exam_id' => $record['exam_id'],
            'grade' => $record['grade']
            ]
        );
        }

        return $result;
    }
}
?>