<?php
//this handles the sign up process
require_once __DIR__ . '/../databaseQuery/query.inc.php';;
if($_SERVER['REQUEST_METHOD'] === 'POST') {
    if(isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['role'])) {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $role = $_POST['role'];

        if($query->addUser($username, $email, $password, $role)) {
            header("Location: /signIn?success=userAdded");
            die();

        } else {
            header("Location: /signUp?failure=userNotAdded");

        }
    } 
    else {
        header("Location: /signUp?failure=missingFields");

    }
} 
else {
    header("Location: /signUp?failure=invalidRequest");
    exit();
}

