<?php
$url = parse_url($_SERVER['REQUEST_URI'])['path'];
$routes=[
    '/' => 'pages/Home.php',
    '/Home' => 'pages/Home.php',
    '/ListeDesEtudiants' => 'pages/ListeDesEtudiants.php',
    '/ListeDesSections' => 'pages/ListeDesSections.php',
    '/home' => 'pages/Home.php',
    '/listedesetudiants' => 'pages/ListeDesEtudiants.php',
    '/listedessections' => 'pages/ListeDesSections.php',
    '/signIn' => 'pages/signIn.php',
    '/signUp' => 'pages/signUp.php',
    '/signin' => 'pages/signIn.php',
    '/signup' => 'pages/signUp.php',
    '/updateStudent' => 'includes/updates/updateStudent.php',
    '/updateStudentForm' => 'includes/updates/updateStudentForm.php',
    '/updateStudentRequest' => 'includes/updates/updatestudentRequest.php',
    '/uploadSection' => 'includes/addsForm/uploadSection.php',
    '/uploadStudent' => 'includes/addsForm/uploadStudent.php',
    '/updateSection' => 'includes/updates/updateSection.php',
    '/updateSectionForm' => 'includes/updates/updateSectionForm.php',
    '/updateSectionRequest' => 'includes/updates/updateSectionRequest.php',
    '/deleteStudent' => 'includes/deletes/deleteStudent.php',
    '/deleteSection' => 'includes/deletes/deleteSection.php',

    

];
if(array_key_exists($url, $routes)) {
    require_once './private/' . $routes[$url];
} else {
    http_response_code(404);
    require_once './private/pages/404.php';
    die();
   
}
