<?php
require_once  __dir__.'/../../classes/DatabaseConnect.class.php'; 

$host = 'localhost'; // Change this to your database host
$username = 'root'; // Change this to your database username
$password = '';   // Change this to your database password
$dbname = 'insat';
$database = new DatabaseConnect($host, $username, $password, $dbname);
$pdo = $database->connect();