
<?php
// This file contains functions for user registration and validation
// It includes functions to verify user input, check availability of username and email, and register a new user
// It also includes a function to hash the password before storing it in the database
function verifyConditions($username, $email, $password, $role) {

    if(empty($username) || empty($email) || empty($password) || empty($role)
    || !filter_var($email, FILTER_VALIDATE_EMAIL) || !preg_match('/^[a-zA-Z0-9_]{3,50}$/', $username) || !in_array($role, ['admin', 'user']))
    {
        return false; 
    }
    else {
        return true;
    }
}
function isAvailable($username,$email,$pdo) {
    try{
        $query = "SELECT COUNT(*) FROM utilisateurs WHERE username = :username OR email = :email";  
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        return $stmt->fetchColumn() === 0;
    }catch(PDOException $e){
        throw new Exception('Database connection failed: ' . $e->getMessage());
    }
}
