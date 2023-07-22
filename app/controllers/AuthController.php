<?php

class Registration
{
    use Database;
    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['login-email'];
            $password = $_POST['login-password'];

            $q = 'SELECT * FROM user WHERE email = :email';
            $data = ['email' => $email];
            $users = $this->read($q, $data);
            // var_dump($users);
            if ($users && count($users) === 1) {
                $user = $users[0];
                // echo var_dump($user);
                if ($password === $user->password) {
                    $_SESSION['user_id'] = $user->id;

                    exit();
                } else {
                    echo 'Invalid password ';
                }
            } else {
                echo $email . 'dont exit';
            }
        }
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
