<?php

class personModel extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * get person information
     * @param string $person
     * @param int $person_id
     * @return array
     */
    public function get_person_info(string $person, int $person_id): array
    {
        $p = $person;
        $id = $p . '_id';
        $query = "SELECT * FROM $p WHERE $p.$id =?";

        $data = [
            ['type' => 'i', 'value' => $person_id]
        ];

        return $this->exeQuery($query, $data, true)->fetch_all($mode = MYSQLI_ASSOC);
    }

    /**
     * insert a person(student OR master) to database
     * @param string $person
     * @param string $fullname
     * @param string $mobile
     * @param string $email
     * @param string $password
     * @return array
     */
    public function insertPerson(string $person, string $fullname, string $mobile, string $email, string $password): array
    {
        $password_hash = password_hash($password, PASSWORD_DEFAULT);
        $token = bin2hex(openssl_random_pseudo_bytes(32));

        $query = "INSERT INTO $person (name,mobile,email,password,identification_token)
         VALUES (?,?,?,?,?)";
        $data = [
            ['type' => 's', 'value' => $fullname],
            ['type' => 's', 'value' => $mobile],
            ['type' => 's', 'value' => $email],
            ['type' => 's', 'value' => $password_hash],
            ['type' => 's', 'value' => $token],
        ];
        $status = $this->exeQuery($query, $data, false);
        if ($status) {
            return ['status' => 1, 'result' => $this->connection->insert_id];
        } else {
            return ['status' => 0, 'result' => 'Error'];
        }

    }

    /**
     * check if person exists in db or not
     * @param string $person
     * @param string $email
     * @param string $password
     * @return array
     */
    public function isPersonExists(string $person, string $email, string $password): array
    {
        $query = "SELECT * FROM $person WHERE email=? LIMIT 0,1";
        $data = [
            ['type' => 's', 'value' => $email]
        ];
        $result = $this->exeQuery($query, $data, true);

        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();
            if (password_verify($password, $user['password'])) {
                return ['status' => 1, 'result' => $user];
            } else {
                return ['status' => 0, 'result' => 'password was wrong.'];
            }
        } else {
            return ['status' => 0, 'result' => "$person does not exist."];
        }
    }
}