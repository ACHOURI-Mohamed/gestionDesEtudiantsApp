<?php
//the file name is self-explanatory
//okaaay it's used to handle the sign in process
require_once __DIR__ . '/../databaseQuery/query.inc.php';;


if($_SERVER['REQUEST_METHOD'] === 'POST') {
            if(isset($_POST['username']) && isset($_POST['password'])) {
                    $username = $_POST['username'];
                    $password = $_POST['password'];
                    try{
                        if($query->checkUser($username, $password)) {
                            session_start();
                            $_SESSION['username'] = $username;
                            //the chackUser function returns the user data or null if the user is not found
                            $_SESSION['role'] = $query->checkUser($username, $password)['_role'];
                            header("Location: /Home?success=userLoggedIn");
                        } 
                        else {
                            header("Location: /signIn?failure=userNotLoggedIn");
                            die();
                        }}
                    catch(PDOException $e){
                        header("Location: /signIn?failure=connectionFailed");
                        die("u could not connect to the database " . $e->getMessage());
                    }
            } 
            else {
                header("Location: /signIn?failure=missingFields");
                die();

            }

} 

else {
    header("Location: /signIn?failure=invalidRequest");
    die();
}