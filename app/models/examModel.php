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
     * @return bool
     */

    public function insert(string $title, string $description, int $duration,
    float $final_grade,int $show_grade)
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
        if($result){
            // flash message
            header('Location: ' . URL . 'dashboard/exam/index');
        }
        else{
            // flash message
            header('Location: ' . URL . 'dashboard/exam/create');
        }
    }

    
}