<?php
    require __DIR__ . '/../databaseQuery/query.inc.php';

if(empty($query->getSections()))
{  header("Location: /Home?error=NoSections");
    exit;
}
else{


try{
    if($_SERVER['REQUEST_METHOD'] === 'POST'){


        if (!isset($_POST['name']) ||!isset($_POST['birthday'])
        ||!isset($_POST['sectionName']))   {
    header("Location: /Home?error=MissingData");}
    
        $name = $_POST['name'];
        $birthday = $_POST['birthday'];
        $sectionID = (int)$_POST['sectionName'];
        $image = $_FILES['image']??null;


        if ($image && $image['error'] === UPLOAD_ERR_OK) {
            $uploadDir = 'private/uploads/';
            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0755, true);
            }
            
            $fileName = basename($image['name']);  
            $filePath = $uploadDir . $fileName;  
            
            if (file_exists($filePath)) {
                // File exists - use existing path
                $query->addStudent($name, $birthday, $filePath, $sectionID);
            } else {
                // Move new file
                if (move_uploaded_file($image['tmp_name'], $filePath)) {
                    $query->addStudent($name, $birthday, $filePath, $sectionID);
                } else {
                    // If move fails, store as NULL
                    $query->addStudent($name, $birthday, null, $sectionID);
                }
            }
            header("Location: /ListeDesEtudiants");
            exit;
        }
        
        // If no image uploaded
        $query->addStudent($name, $birthday, null, $sectionID);
        header("Location: /ListeDesEtudiants");
        exit;

}
    else{
        echo "❌ Invalid request method.";
    } 

}
catch(PDOException $e){
    error_log( "Database connection failed: " . $e->getMessage());
    exit;
}
}