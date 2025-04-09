<?php 
session_start();
if(!isset($_SESSION['username']) ) {
    header("Location: signIn");
    die();
}
else{
require_once __DIR__ . '/../includes/pages_inc/ListeDesEtudiants.inc.php';
}


