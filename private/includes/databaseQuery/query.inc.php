<?php

require_once 'databaseConnect.inc.php';
require_once  __dir__.'/../../classes/Queries.class.php';
$query= new Queries($pdo); //this is the object that will be used to call the methods of the Queries class
// $query->getstudentsInfo();
// $query->getSections();
// and so on

