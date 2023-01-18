<?php

class student_masterModel extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * return all properties base on master OR student
     * @param int $master_id
     * @return array
     */
    public function get_all_prop(int $id, string $who): array
    {
        if ($who === MASTER) {
            $query = "SELECT * FROM student_master WHERE master_id=?";
        } else if ($who === STUDENT) {
            $query = "SELECT * FROM student_master WHERE student_id=?";
        }

        $data = [
            ['type' => 'i', 'value' => $id]
        ];

        return $this->exeQuery($query, $data, true)->fetch_all($mode = MYSQLI_ASSOC);
    }

    /**
     * check if student requested for master before
     * @param int $student_id
     * @param int $master_id
     * @return bool
     */
    public function is_student_requested_before(int $student_id, int $master_id): bool
    {
        $query = "SELECT * FROM student_master WHERE student_id = ? AND master_id = ?";

        $data = [
            ['type' => 'i', 'value' => $student_id],
            ['type' => 'i', 'value' => $master_id],
        ];

        $result = $this->exeQuery($query, $data, true);
        if ($result->num_rows > 0) {
            return true;
        }
        return false;
    }

    /**
     * update student_master table by student_id
     * @param int $student_id
     * @param bool $status
     * @param int $master_id
     * @return bool
     */
    public function insert_by_studentID(int $student_id, bool $status = false, int $master_id): bool
    {
        $query = "INSERT INTO student_master SET student_id = ?, master_id = ?,status = ? ";

        $data = [
            ['type' => 'i', 'value' => $student_id],
            ['type' => 'i', 'value' => $master_id],
            ['type' => 'i', 'value' => $status],
        ];

        return $this->exeQuery($query, $data, false);
    }

    /**
     * get lists of ID
     * @param int $id
     * @param string $who
     * @return array
     */
    public function get_listID(int $id, string $who): array
    {
        if ($who === MASTER) {
            $key = 'master_id';
            $query = "SELECT master_id FROM student_master WHERE student_id=?";
        } else if ($who === STUDENT) {
            $key = 'student_id';
            $query = "SELECT student_id FROM student_master WHERE master_id=?";
        }

        $data = [
            ['type' => 'i', 'value' => $id],
        ];

        $result = $this->exeQuery($query, $data, true);
        $ids = [];
        foreach ($result as $item) {
            if (isset($item[$key])) {
                array_push($ids, $item[$key]);
            }
        }

        return $ids;
    }

    /**
     * update state
     * @param int $master_id
     * @param int $student_id
     * @param bool $state
     * @return bool
     */
    public function update_state(int $master_id, int $student_id, bool $state = true): bool
    {
        $query = "UPDATE student_master SET status = ? WHERE master_id = ? AND student_id = ?";

        $data = [
            ['type' => 'i', 'value' => $state],
            ['type' => 'i', 'value' => $master_id],
            ['type' => 'i', 'value' => $student_id],
        ];

        return $this->exeQuery($query, $data, false);
    }
}