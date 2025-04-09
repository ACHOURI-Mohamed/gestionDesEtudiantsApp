<?php session_start();
if($_SESSION['role'] === 'user') {
    header("Location: /Home?failure=notAuthorized");
    die();
 }

 if(!$_SERVER['REQUEST_METHOD'] === 'GET') {
    header("Location: /ListeDesEtudiants?failure=invalidRequest");
    die();
}

$student_id = $_GET['id'] ?? null;

if($student_id === null) {
    header("Location: /ListeDesEtudiants?failureeeee=missedId");
    die();
}
require_once __DIR__ . '/../databaseQuery/query.inc.php';
try{
    $query->deleteStudent($student_id);
    header("Location: /ListeDesEtudiants?success=deletedStudent");
    exit;
} catch(PDOException $e){
    header("Location: /ListeDesEtudiants?failure=connectionFailed");
    die("u could not connect to the database " . $e->getMessage());
}




