<?php   

//this handles the update section process
// when an admin wants to update a section
// it checks if the request method is GET
// if not, it redirects to the list of sections with an error message
// if the id is not set, it redirects to the list of sections with an error message
// if the id is set, it starts a session and sets the id in the session
// then it redirects to the update section form

if(!$_SERVER['REQUEST_METHOD'] === 'GET') {
    header("Location: /ListeDesSections?failure=invalidRequest");
    die();
}
session_start();
$_SESSION['id'] = $_GET['id'] ?? null;

if($_SESSION['id'] === null) {
    header("Location: /ListeDesSections?failureeeee=missedId");
    die();
}

header("Location: /updateSectionForm");


 