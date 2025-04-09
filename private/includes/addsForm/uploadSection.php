<?php
try{
    require __DIR__ . '/../databaseQuery/query.inc.php';
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        if (!isset($_POST['designation']) || !isset($_POST['description']))   {
            header("Location: /Home?error=MissingData");       
            throw new Exception("Missing section designation or description.");}
        $designation = $_POST['designation'];
        $description = $_POST['description'];
        $query->addSection($designation, $description);
        header("Location: /ListeDesSections");
    }    
    else{
        echo "❌ Invalid request method.";
    } 
}
catch(PDOException $e){
    error_log( "Database connection failed: " . $e->getMessage());
    exit;
}
