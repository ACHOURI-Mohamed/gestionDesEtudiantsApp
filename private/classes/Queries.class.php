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

//add a new student to the database
public function addStudent($name,$birthday,$image=null,$section_id){
    try{
        if($image === null){
            $image = 'private/uploads/default.png';
            // Default image path WHEN NO IMAGE IS PROVIDED
        }
        $query = "INSERT INTO etudiant (name,birthday,image,section_id) VALUES (:name,:birthday,:image,:section_id);";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':birthday', $birthday);
        $stmt->bindParam(':image', $image);
        $stmt->bindParam(':section_id', $section_id);
        return $stmt->execute();
    }
    catch(PDOException $e){
        throw new Exception('connection failed ' . $e->getMessage());

    }
}
//add a new section to the database
public function addSection($designation,$description){
    try{
        $query = "INSERT INTO section (designation,description) VALUES (:designation,:description);";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':designation', $designation);
        $stmt->bindParam(':description', $description);
        return $stmt->execute();
    }
    catch(PDOException $e){
        throw new Exception('connection failed ' . $e->getMessage());

    }
}

//get all the students from the database
public function getStudents(){
    try{
        $query = "SELECT * FROM etudiant";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    catch(PDOException $e){
        throw new Exception('connection failed ' . $e->getMessage());

    }




}
//get all the sections from the database
public function getSections(){
    try{
        $query = "SELECT * FROM section;";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    catch(PDOException $e){
        throw new Exception('connection failed ' . $e->getMessage());

    }
}
//get students_info 'etudiant_info' is a view,already existed in db insat, that contains the students and their sections
public function getStudentsInfo(){
    try{
        $query = "SELECT id,name,image,date(birthday) as birthday,section from etudiant_info;";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    catch(PDOException $e){
        throw new Exception('connection failed ' . $e->getMessage());

    }

}
//get student by name
public function getStudentByName($name){
    try{
        $query = "SELECT * from etudiant where name = :name;";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':name', $name);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    catch(PDOException $e){
        throw new Exception('connection failed ' . $e->getMessage());

    }

}
//get student by id
public function getStudentById($id){
    try{
        $query = "SELECT * from etudiant where id = :id;";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    catch(PDOException $e){
        throw new Exception('connection failed ' . $e->getMessage());

    }

}















}    