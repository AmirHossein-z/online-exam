<?php

class exam_masterModel extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * return all exams that must be shown to special a student
     * @param int $master_id
     * @param int $student_id
     * @return array
     */
    public function exams_for_student(int $master_id, int $student_id): array
    {
        $query = "SELECT exam_master.exam_id AS exam_id,student_master.master_id AS master_id, student_master.student_id FROM exam_master INNER JOIN student_master WHERE exam_master.master_id = student_master.master_id AND student_master.master_id = ? AND student_master.student_id = ?";

        $data = [
            ['type' => 'i', 'value' => $master_id],
            ['type' => 'i', 'value' => $student_id],
        ];

        return $this->exeQuery($query, $data, true)->fetch_all($mode = MYSQLI_ASSOC);
    }
}