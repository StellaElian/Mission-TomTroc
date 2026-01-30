<?php
// cer dossier crée la connexion et la retourne 
require_once "_config.php";
//connexion à la base de données 
$pdo = new PDO(
    "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8",
    DB_USER,
    DB_PASS
);

return $pdo;