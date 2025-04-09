<?php
/* header('Content-Type: application/json');
require __DIR__ . '/../databaseQuery/query.inc.php';
$data =$query->getstudentsInfo();
echo json_encode(["data" => $data], JSON_PRETTY_PRINT);
exit; */

header('Content-Type: application/json');
require __DIR__ . '/../databaseQuery/query.inc.php';
$data = $query->getStudentsInfo();
die(json_encode($data));



