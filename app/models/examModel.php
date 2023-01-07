<?php

class examModel extends Model
{

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * insert new exam
     * @param string title
     * @param string description
     * @param int duration
     * @param float final_grade
     * @param int show_grade
     * @return int
     */

    public function insert(string $title, string $description, int $duration,
    float $final_grade,int $show_grade) : int
    {
        $query = "insert into exam
                  (title, description, duration, final_grade, show_grade)
                  values (?,?,?,?,?)";
        $data = [
            ['type' => 's', 'value' => $title],
            ['type' => 's', 'value' => $description],
            ['type' => 'i', 'value' => $duration],
            ['type' => 'd', 'value' => 20.5],
            ['type' => 'i', 'value' => $show_grade],
        ];

        // throw error
        $result = $this->exeQuery($query,$data,false);
        return $this->connection->insert_id;
    }

    /**
     * select all exams
     * @return mixed
     */

     public function select_all() : mixed
     {
        try{
        $query = "SELECT exam_id, title,description, duration, final_grade, show_grade FROM exam order by exam_id DESC";
        $result = $this->exeQuery($query, [], true);
            if ($result->num_rows > 0) {
                $exams = [];
                for ($i = 0; $i < $result->num_rows; $i++) {
                    array_push($exams, $result->fetch_assoc());
                }
            }
            return $exams;
        }
        catch(customException $e)   {
            throw new $e;
        };
     }
    
}