<?php  
session_start();

if ( $_SERVER['REQUEST_METHOD'] === 'POST' ) {


    if(isset($_POST['name']) || isset($_POST['birthday']) || isset($_POST['section']) || isset($_FILES['image'])) {


        $student_id = $_SESSION['student_id'];
        $name = $_POST['name']===''?null:$_POST['name'];
        $birthday = $_POST['birthday']??null;
        $sectionName = ($_POST['sectionName'])??null;
        $image = $_FILES['image'] ?? null;



        require_once __DIR__ . '/../databaseQuery/query.inc.php';
        try{
            if ($image && $image['error'] === UPLOAD_ERR_OK) {
                $uploadDir = 'private/uploads/';
                
                // Create directory if it doesn't exist
                if (!is_dir($uploadDir)) {
                    mkdir($uploadDir, 0755, true);
                }
            
                $fileName = basename($image['name']);
                $filePath = $uploadDir . $fileName;
            
                if (file_exists($filePath)) {
                    // File exists - use the existing path
                    $query->updateStudent($student_id, $name, $birthday, $filePath, $sectionName);
                } else {
                    // Try to move the uploaded file
                    if (move_uploaded_file($image['tmp_name'], $filePath)) {
                        $query->updateStudent($student_id, $name, $birthday, $filePath, $sectionName);
                    } else {
                        // If move fails, keep the old image (or set to null)
                        $oldImage = $query->getStudentOneData($student_id, 'image');
                        $query->updateStudent($student_id, $name, $birthday, $oldImage, $sectionName);
                    }
                }
            } else {
                // No new image uploaded - keep the old image
                $oldImage = $query->getStudentOneData($student_id, 'image');
                $query->updateStudent($student_id, $name, $birthday, $oldImage, $sectionName);
            }
            
            header("Location: /ListeDesEtudiants");
            exit;




        }

        catch(PDOException $e){
            header("Location: /ListeDesEtudiants?failure=connectionFailed");
            die("u could not connect to the database " . $e->getMessage());
        }
    }
    
    
    else {
        header("Location: /ListeDesEtudiants?failureeee=missingFields");
        die();
    }
}
else {
    header("Location: /ListeDesEtudiants?failure=invalidRequest");
    die();
}

