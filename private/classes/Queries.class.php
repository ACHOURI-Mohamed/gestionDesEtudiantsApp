<?php
require_once 'functions.php';
class Queries
{
    private $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    // Add a new user to the database
    // Check if the username and email are available and if the password meets the conditions
    // If all conditions are met, insert the user into the database
    // If not, redirect to the signUp page with an error message

    public function addUser($username, $email, $password, $role)
    {

        try {
            if (isAvailable($username, $email, $this->pdo) && verifyConditions($username, $email, $password, $role, $this->pdo)) {
                $query = "INSERT INTO utilisateurs (username, email,_role,pwd) VALUES (:username, :email, :role, :pwd)";
                $stmt = $this->pdo->prepare($query);
                $stmt->bindParam(':username', $username);
                $stmt->bindParam(':email', $email);
                // Hash the password before storing it FOR SECURITY PURPOSES
                // Use password_hash() to hash the password

                $stmt->bindParam(':pwd', password_hash($password, PASSWORD_DEFAULT));
                $stmt->bindParam(':role', $role);
                return $stmt->execute();
            } else {
                header("Location: ../signUp.php?failure=userNotAdded");
                exit();
            }
        } catch (PDOException $e) {
            throw new Exception('connection failed ' . $e->getMessage());
        }
    }

    // Check if the user exists and verify the password then return the user data or false 
    // THIS IS FOR LOGIN PURPOSES
    public function checkUser($username, $password)
    {
        try {
            $query = "SELECT * FROM utilisateurs WHERE username = :username";
            $stmt = $this->pdo->prepare($query);
            $stmt->bindParam(':username', $username);
            $stmt->execute();
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            return ($user && password_verify($password, $user['pwd'])) ? $user : false;
        } catch (PDOException $e) {
            throw new Exception('connection failed ' . $e->getMessage());
        }
    }

    //add a new student to the database
    public function addStudent($name, $birthday, $image = null, $section_id)
    {
        try {
            if ($image === null) {
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
        } catch (PDOException $e) {
            throw new Exception('connection failed ' . $e->getMessage());
        }
    }
    //add a new section to the database
    public function addSection($designation, $description)
    {
        try {
            $query = "INSERT INTO section (designation,description) VALUES (:designation,:description);";
            $stmt = $this->pdo->prepare($query);
            $stmt->bindParam(':designation', $designation);
            $stmt->bindParam(':description', $description);
            return $stmt->execute();
        } catch (PDOException $e) {
            throw new Exception('connection failed ' . $e->getMessage());
        }
    }

    //get all the students from the database
    public function getStudents()
    {
        try {
            $query = "SELECT * FROM etudiant";
            $stmt = $this->pdo->prepare($query);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            throw new Exception('connection failed ' . $e->getMessage());
        }
    }
    //get all the sections from the database
    public function getSections()
    {
        try {
            $query = "SELECT * FROM section;";
            $stmt = $this->pdo->prepare($query);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            throw new Exception('connection failed ' . $e->getMessage());
        }
    }
    //get students_info 'etudiant_info' is a view,already existed in db insat, that contains the students and their sections
    public function getStudentsInfo()
    {
        try {
            $query = "SELECT id,name,image,date(birthday) as birthday,section from etudiant_info;";
            $stmt = $this->pdo->prepare($query);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            throw new Exception('connection failed ' . $e->getMessage());
        }
    }
    //get student by name
    public function getStudentByName($name)
    {
        try {
            $query = "SELECT * from etudiant where name = :name;";
            $stmt = $this->pdo->prepare($query);
            $stmt->bindParam(':name', $name);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            throw new Exception('connection failed ' . $e->getMessage());
        }
    }
    //get student by id
    public function getStudentById($id)
    {
        try {
            $query = "SELECT * from etudiant where id = :id;";
            $stmt = $this->pdo->prepare($query);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            throw new Exception('connection failed ' . $e->getMessage());
        }
    }
    //get section by id
    public function getSectionById($id)
    {
        try {
            $query = "SELECT * from section where id = :id;";
            $stmt = $this->pdo->prepare($query);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            throw new Exception('connection failed ' . $e->getMessage());
        }
    }
    //get section by designation
    public function getSectionByDesignation($designation)
    {
        try {
            $query = "SELECT * from section where designation = :designation;";
            $stmt = $this->pdo->prepare($query);
            $stmt->bindParam(':designation', $designation);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            throw new Exception('connection failed ' . $e->getMessage());
        }
    }
    //delete a student by id
    public function deleteStudent($id)
    {
        try {
            $query = "DELETE from etudiant where id = :id;";
            $stmt = $this->pdo->prepare($query);
            $stmt->bindParam(':id', $id);
            return $stmt->execute();
        } catch (PDOException $e) {
            throw new Exception('connection failed ' . $e->getMessage());
        }
    }
    //delete a section by id
    public function deleteSection($id)
    {
        try {
            $query = "DELETE from section where id = :id;";
            $stmt = $this->pdo->prepare($query);
            $stmt->bindParam(':id', $id);
            return $stmt->execute();
        } catch (PDOException $e) {
            throw new Exception('connection failed ' . $e->getMessage());
        }
    }
    //get a specific column from the student table by id
    // This function is used to get a specific column from the student table by id
    // It takes the id of the student and the column name as parameters
    // It returns the value of the column for the student with the given id
    // If the student is not found, it throws an exception

    public function getStudentOneData($id, $column)
    {
        try {
            $query = "SELECT $column FROM etudiant WHERE id = :id";
            $stmt = $this->pdo->prepare($query);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($result && isset($result[$column])) {
                return $result[$column];
            } else {
                throw new Exception('Student not found');
            }
        } catch (PDOException $e) {
            throw new Exception('Connection failed: ' . $e->getMessage());
        }
    }
    // Update a student by ID
    public function updateStudent($id, $name = null, $birthday = null, $image = null, $section_id = null)
    {
        try {
            // If no name provided, get it from user table

            $name = $name ?? $this->getStudentOneData($id, 'name');
            // If no birthday provided, get it from user table
            if (empty($birthday)) {
                $birthday = $this->getStudentOneData($id, 'birthday');
            }
            // If no image provided, get it from user table
            $image = $image ?? $this->getStudentOneData($id, 'image');
            // If no section_id provided, get it from user table

            if ($section_id === null || $section_id === '') {
                $section_id = $this->getStudentOneData($id, 'section_id');
            }

            // Update the student
            $query = "UPDATE etudiant 
                  SET name = :name, birthday = :birthday, image = :image, section_id = :section_id
                  WHERE id = :id";
            $stmt = $this->pdo->prepare($query);
            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':birthday', $birthday);
            $stmt->bindParam(':image', $image);
            $stmt->bindParam(':section_id', $section_id);
            return $stmt->execute();
        } catch (PDOException $e) {
            throw new Exception('Connection failed: ' . $e->getMessage());
        }
    }


    //Get a specific column from the section table by id
    public function getSectionOneData($id, $column)
    {
        try {
            $query = "SELECT $column FROM section WHERE id = :id";
            $stmt = $this->pdo->prepare($query);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($result && isset($result[$column])) {
                return $result[$column];
            } else {
                throw new Exception('Section not found');
            }
        } catch (PDOException $e) {
            throw new Exception('Connection failed: ' . $e->getMessage());
        }
    }

    //update a section by id
    public function updateSection($id, $designation = null, $description = null)
    {
        try {
            // If no designation provided, get it from user table
            $designation = $designation ?? $this->getSectionOneData($id, 'designation');
            // If no description provided, get it from user table
            $description = $description ?? $this->getSectionOneData($id, 'description');
            // Update the section

            $query = "UPDATE section set designation = :designation, description = :description where id = :id;";
            $stmt = $this->pdo->prepare($query);
            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':designation', $designation);
            $stmt->bindParam(':description', $description);
            return $stmt->execute();
        } catch (PDOException $e) {
            throw new Exception('connection failed ' . $e->getMessage());
        }
    }
}
