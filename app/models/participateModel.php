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
    public function getStudentGrade(int $student_id, int $exam_id): float
    {
        // getting first grade of student participate
        $query = "select grade from participate
                where student_id = ? AND exam_id = ? limit 1";

        $data = [
            ['type' => 'i', 'value' => $student_id],
            ['type' => 'i', 'value' => $exam_id]
        ];

        $result = $this->exeQuery($query, $data, true)->fetch_assoc();
        if(isset($result['grade']))
            return $result['grade'];
        else
            return 0;
    }
}
?>