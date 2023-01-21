<?php

class Model
{
    public $connection = "";
    public function __construct()
    {
        $this->connection = new mysqli('localhost', 'root', '123456', 'online-test');
    }

    public function exeQuery(string $query, array $data = [], bool $returnData)
    { // $data = [
        //     ['type' => 's', 'value' => 'string'],
        //     ['type' => 'i', 'value' => 'int']
        // ];
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
     * there is a bug in the exeQuery, I can't solve it! 
     */
    // public function existsColumn($model_name, $column, $key)
    // {
    //     $query = "SELECT * FROM $model_name where $column = ?";
    //     return $this->exeQuery($query, [$key] , false);
    // }
}