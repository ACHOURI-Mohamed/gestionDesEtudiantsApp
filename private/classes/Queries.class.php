<?php
require_once 'functions.php';
class Queries {
    private $pdo;

    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }

// Add a new user to the database
// Check if the username and email are available and if the password meets the conditions
// If all conditions are met, insert the user into the database
// If not, redirect to the signUp page with an error message

public function addUser($username, $email, $password, $role) {

    try{
    if(isAvailable($username,$email,$this->pdo) && verifyConditions($username, $email, $password, $role,$this->pdo)){
    $query = "INSERT INTO utilisateurs (username, email,_role,pwd) VALUES (:username, :email, :role, :pwd)";
    $stmt = $this->pdo->prepare($query);
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':email', $email);
    // Hash the password before storing it FOR SECURITY PURPOSES
    // Use password_hash() to hash the password
 
    $stmt->bindParam(':pwd', password_hash($password, PASSWORD_DEFAULT));
    $stmt->bindParam(':role', $role);
    return $stmt->execute();        
    }

    else{
        header("Location: ../signUp.php?failure=userNotAdded");
        exit();
    }
}
catch(PDOException $e){
    throw new Exception('connection failed ' . $e->getMessage());

}

}

// Check if the user exists and verify the password then return the user data or false 
// THIS IS FOR LOGIN PURPOSES
public function checkUser($username, $password) {
    try{
    $query = "SELECT * FROM utilisateurs WHERE username = :username";
    $stmt = $this->pdo->prepare($query);
    $stmt->bindParam(':username', $username);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    return ($user && password_verify($password, $user['pwd'])) ? $user : false;
}
catch(PDOException $e){
    throw new Exception('connection failed ' . $e->getMessage());

}
}
















}    