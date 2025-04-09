<?php 
session_start();
if(!isset($_SESSION['username']) ) {
    header("Location: signIn");
    die();
}
else{
    if($_SESSION['role'] === 'admin') {
        require_once __DIR__ . '/../includes/pages_inc/homeAdmin.inc.php';
    }
    else{
       require_once __DIR__ . '/../includes/pages_inc/Home.inc.php';}
}








