<?php

require_once "app/models/personModel.php";
class masterModel extends personModel
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * check if a special token exists in table
     * @param string $token
     * @return array
     */
    public function is_token_exists(string $token): array
    {
        $query = "SELECT * FROM master WHERE identification_token = ?";

        $data = [
            ['type' => 's', 'value' => $token]
        ];

        $result = $this->exeQuery($query, $data, true);
        if ($result->num_rows > 0) {
            return ['status' => 1, 'result' => $result->fetch_assoc()];
        }
        return ['status' => 0, 'result' => "ERROR"];
    }
}