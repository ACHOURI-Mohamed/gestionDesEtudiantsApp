
<?php
// This file contains the Section class which handles section-related operations
// It includes methods to add, update, delete, and retrieve sections from the database
// It also includes a constructor to initialize the section object with designation and description
// It requires the database query file to perform database operations
// the database connection is already established in the included file
// the query object is already created in the included file

class Section{
    private $designation;
    private $description;

    public function __construct($designation, $description){
        $this->designation = $designation;
        $this->description = $description;
    }
    public function addSection($designation, $description){
        $this->designation = $designation;
        $this->description = $description;
       require_once __DIR__.'/../../includes/databaseQuery/query.inc.php';
        $query->addSection($this->designation, $this->description);
    }
    public function updateSection($id, $designation, $description){
        $this->designation = $designation;
        $this->description = $description;
        require_once __DIR__.'/../../includes/databaseQuery/query.inc.php';
        $query->updateSection($id,$this->designation, $this->description);
    }
    public function deleteSection($id){
       require_once __DIR__.'/../../includes/databaseQuery/query.inc.php';
        $query->deleteSection($id);
    }
    public function getSection($id){
       require_once __DIR__.'/../../includes/databaseQuery/query.inc.php';
        return $query->getSectionById($id);
    }
    public function getSectionByDesignation($designation){
       require_once __DIR__.'/../../includes/databaseQuery/query.inc.php';
        return $query->getSectionByDesignation($designation);
    }
 

}