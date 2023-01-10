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
     * update student_master table by student_id
     * @param int $student_id
     * @param string $token
     * @param bool $status
     * @param int $master_id
     * @return bool
     */
    public function insert_by_studentID(int $student_id, string $token, bool $status = false, int $master_id): bool
    {
        $query = "INSERT INTO student_master SET student_id = ?, identification_token = ?, master_id = ?,status = ? ";

        $data = [
            ['type' => 'i', 'value' => $student_id],
            ['type' => 's', 'value' => $token],
            ['type' => 'i', 'value' => $master_id],
            ['type' => 'i', 'value' => $status],
        ];

        return $this->exeQuery($query, $data, false);
    }

    /**
     * check if a special token exists in table
     * @param string $token
     * @return array
     */
    public function is_token_exists(string $token): array
    {
        $query = "SELECT * FROM student_master WHERE identification_token=?";

        $data = [
            ['type' => 's', 'value' => $token]
        ];

        $result = $this->exeQuery($query, $data, true);
        if ($result->num_rows > 0) {
            return ['status' => 1, 'result' => $result->fetch_assoc()];
        }
        return ['status' => 0, 'result' => "ERROR"];
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
     * add master id & token to master_student table
     * @param int $master_id
     * @return bool
     */
    public function add_student_to_master_students_list(int $master_id): bool
    {
        $status = false;
        $token = bin2hex(openssl_random_pseudo_bytes(32));
        $query = "INSERT INTO student_master(master_id,status,identification_token) VALUES (?,?,?)";

        $data = [
            ['type' => 'i', 'value' => $master_id],
            ['type' => 'i', 'value' => $status],
            ['type' => 's', 'value' => $token]
        ];

        return $this->exeQuery($query, $data, false);
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
        // $query = "UPDATE question SET question.option_id=? WHERE question.question_id =?";
        $query = "UPDATE student_master SET status = ? WHERE master_id = ? AND student_id = ?";

        $data = [
            ['type' => 'i', 'value' => $state],
            ['type' => 'i', 'value' => $master_id],
            ['type' => 'i', 'value' => $student_id],
        ];

        return $this->exeQuery($query, $data, false);
    }
}