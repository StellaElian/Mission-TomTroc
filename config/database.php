<?php
// se connecte à la bdd 
require_once "config.php";
//connexion à la base de données 
$pdo = new PDO(
    "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8",
    DB_USER,
    DB_PASS
);