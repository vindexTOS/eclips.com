<?php

trait Database
{
    public function db_connect(): object
    {
        try {
            $string = DB_TYPE . ':host=' . DB_HOST . ';dbname=' . DB_NAME . ';';
            $db = new PDO($string, 'root', DB_PASS);
            return $db;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
    public function read($query, $data = [])
    {
        $DB = $this->db_connect();
        $stm = $DB->prepare($query);

        if (count($data) == 0) {
            $check = $stm->execute();
        } else {
            $check = $stm->execute($data);
        }

        if ($check) {
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } else {
            return false;
        }
    }

    public function write($query, $data = [])
    {
        $DB = $this->db_connect();
        $stm = $DB->prepare($query);

        if (count($data) == 0) {
            $stm = $DB->query($query);
            $stm ? ($check = 0) : ($check = 1);
        } else {
            $check = $stm->execute($data);
        }

        if ($check) {
            return true;
        } else {
            return false;
        }
    }
}
