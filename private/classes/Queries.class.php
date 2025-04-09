<?php
require_once 'functions.php';
class Queries {
    private $pdo;

    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }

}    