<?php

class optionModel extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * add a option
     * @param string $info
     * @param int $question_id
     * @return int|string
     */
    public function add_option(string $info, int $question_id)
    {
        $query = "INSERT INTO optionn(info,question_id) VALUES (?,?)";
        $data = [
            ['type' => 's', 'value' => $info],
            ['type' => 'i', 'value' => $question_id],
        ];

        $status = $this->exeQuery($query, $data, false);
        if ($status)
            return $this->connection->insert_id;

        return "ERROR";
    }


    /**
     * get all options belongs to a specific question
     * @param int $question_id
     * @return array
     */
    public function get_all_option_by_question_id(int $question_id): array
    {
        $query = "SELECT * FROM optionn WHERE question_id = ?";

        $data = [
            ['type' => 's', 'value' => $question_id],
        ];

        return $this->exeQuery($query, $data, true)->fetch_all($mode = MYSQLI_ASSOC);
    }

    /**
     * update option info
     * @param int $option_id
     * @param string $option_info
     * @return bool
     */
    public function update_option(int $option_id, string $option_info): bool
    {
        $query = "UPDATE optionn SET info=? WHERE optionn.option_id=?";

        $data = [
            ['type' => 's', 'value' => $option_info],
            ['type' => 'i', 'value' => $option_id],
        ];

        return $this->exeQuery($query, $data, false);
    }

    /**
     * delete a option
     * @param int $question_id
     * @return bool
     */
    public function delete_option(int $question_id): bool
    {
        $query = "DELETE FROM optionn WHERE optionn.question_id=?";

        $data = [
            ['type' => 'i', 'value' => $question_id]
        ];

        return $this->exeQuery($query, $data, false);
    }
}