
<?php

// This file contains the Student class which handles student-related operations
// It includes methods to add, update, delete, and retrieve students from the database
// It also includes a constructor to initialize the student object with name, birthday, image, and section_id
// It requires the database query file to perform database operations
// the database connection is already established in the included file
// the query object is already created in the included file
class Student{
    private $name;
    private $birthday;
    private $section_id;
    private $image;
    public function __construct($name, $birthday, $image,$section_id ) {
        $this->name = $name;
        $this->birthday = $birthday;
        $this->section_id = $section_id;
        $this->image = $image;
        require_once '../includes/query.inc.php';
        $query->addStudent($this->name, $this->birthday, $this->image,$this->section_id);
    }
    public function updateStudent($id, $name, $birthday, $image,$section_id){
        $this->name = $name;
        $this->birthday = $birthday;
        $this->section_id = $section_id;
        $this->image = $image;
        // $this->id = $id;
        require_once '../includes/query.inc.php';
        $query->updateStudent($id,$this->name, $this->birthday, $this->image,$this->section_id);
    }

    public function deleteStudent($id){
        require_once '../includes/query.inc.php';
        $query->deleteStudent($id);
    }
    public function getStudent($id){
        require_once '../includes/query.inc.php';
        return $query->getStudentById($id);
    }


}