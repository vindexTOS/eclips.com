<?php

class Registration
{
    use Database;
    public function login()
    {
    }

    public function registration()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'];
            $password = $_POST['password'];
            $username = $_POST['username'];
            $q =
                'INSERT INTO user (email, username, password)' .
                ' VALUES (:email, :username, :password)';
            $data = [
                'email' => $email,
                'username' => $username,
                'password' => $password,
            ];
            $this->write($q, $data);
        }
    }
}
