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
     * @return float
     */
    public function getStudentGrade(int $student_id): float
    {
        $query = "select grade from participate
                where student_id = ?";

        $data = [
            ['type' => 'i', 'value' => $student_id]
        ];

        $result = $this->exeQuery($query, $data, true)->fetch_assoc();
        return $result['grade'];
    }
}
?>