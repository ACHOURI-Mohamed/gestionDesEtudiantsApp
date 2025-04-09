<?php     if(!$_SERVER['REQUEST_METHOD'] === 'GET') {
    header("Location: /ListeDesEtudiants?failure=invalidRequest");
    die();
}
session_start();
$_SESSION['student_id'] = $_GET['id'] ?? null;

if($_SESSION['student_id'] === null) {
    header("Location: /ListeDesEtudiants?failureeeee=missedId");
    die();
}

header("Location: /updateStudentForm");





