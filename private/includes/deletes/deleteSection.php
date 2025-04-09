<?php session_start();
if($_SESSION['role'] === 'user') {
    header("Location: /Home?failure=notAuthorized");
    die();
 }
if(!$_SERVER['REQUEST_METHOD'] === 'GET') {
    header("Location: /ListeDesSections?failure=invalidRequest");
    die();
}

$section_id = $_GET['id'] ?? null;

if($section_id === null) {
    header("Location: /ListeDesSections?failureeeee=missedId");
    die();
}
require_once __DIR__ . '/../databaseQuery/query.inc.php';
try{
    $query->deleteSection($section_id);
    header("Location: /ListeDesSections?success=deletedSection");
    exit;
} catch(PDOException $e){
    header("Location: /ListeDesSections?failure=connectionFailed");
    die("u could not connect to the database " . $e->getMessage());
}