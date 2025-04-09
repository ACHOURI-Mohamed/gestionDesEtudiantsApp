<?php
header('Content-Type: application/json');
require __DIR__ . '/../databaseQuery/query.inc.php';
$data = $query->getSections();
die(json_encode($data));
?>