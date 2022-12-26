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

}