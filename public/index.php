<?php 
// rôle est d'appeler le controller 
// database.php retourne $pdo ainsi on le récupère ici 
$pdo = require_once '../config/database.php'; 
require_once "../src/controllers/UserController.php";
// Show n'est pas statique alors je dois instancier l'objet pour l'utiliser 
$controller = new UserController();
$controller->show($pdo);
$controller->register($pdo);