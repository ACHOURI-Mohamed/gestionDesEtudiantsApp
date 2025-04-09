<?php  
session_start();

if ( $_SERVER['REQUEST_METHOD'] === 'POST' ) {

    if(isset($_POST['designation']) || isset($_POST['description'])) {
        $section_id = $_SESSION['id'];
        $designation = $_POST['designation']===''?null:$_POST['designation'];
        $description = $_POST['description']===''?null:$_POST['description'];
        // Check if the designation is empty

    
        require_once __DIR__ . '/../databaseQuery/query.inc.php';
        try{
            $query->updateSection($section_id, $designation, $description);
            header("Location: /ListeDesSections?success=updatedSection");
            exit;
        } catch(PDOException $e){
            header("Location: /ListeDesSections?failure=connectionFailed");
            die("u could not connect to the database " . $e->getMessage());
        }
    } 
    else {
        header("Location: /ListeDesSections?failure=missedData");
        die();
    }





}


else {
    header("Location: /ListeDesSections?failure=invalidRequest");
    die();
}
