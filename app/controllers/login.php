<?php

session_start();
require 'Registration.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['login-email']) && isset($_POST['login-password'])) {
        $email = $_POST['login-email'];
        $password = $_POST['login-password'];

        $registration = new Registration();
        $response = $registration->login($email, $password);

        header('Content-Type: application/json');
        echo json_encode($response);
    }
}
