<?php

class Model
{
    public $connection = "";
    public function __construct()
    {
        $this->connection = new mysqli('localhost', 'root', '123456', 'online-test');
        $this->setTimeZone();
    }

    /**
     * automate execute query to mysql database
     * @param string $query
     * @param array $data
     * @param bool $returnData
     * @return bool|mysqli_result
     */
    public function exeQuery(string $query, array $data = [], bool $returnData)
    { 
        /*
            data should be like
            $data = [
                ['type' => 's', 'value' => 'string'],
                ['type' => 'i', 'value' => 'int'],
                ['type' => 'd', 'value' => 'float'],
            ];
        */
        $prepare = $this->connection->prepare($query);
        $type = '';
        $values = [];
        if (count($data) > 0) {
            foreach ($data as $key => $item) {
                $type .= $item['type'];
                $values[$key] = $item['value'];
            }
            $prepare->bind_param($type, ...$values);
        }
        if ($returnData) {
            $prepare->execute();
            return $prepare->get_result();
        }
        return $prepare->execute();
    }

    /**
     * a function for detect that a record exists
     * because a bug in the exeQuery, I can't write it! 
     */
    // public function existsColumn($model_name, $column, $key)
    // {
    //     $query = "SELECT * FROM $model_name where $column = ?";
    //     return $this->exeQuery($query, [$key] , false);
    // }

    public function setTimeZone(): void
    {
        $query = "set time_zone = '+03:30'";
        $this->exeQuery($query, [], false);
    }
}