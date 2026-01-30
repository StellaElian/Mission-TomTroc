<?php 
// rôle est d'appeler le controller 
// database.php retourne $pdo ainsi on le récupère ici 
$pdo = require_once '../config/database.php'; 
require_once "../src/controllers/UserController.php";
//controller de l'inscription 
require_once "../src/controllers/RegisterController.php";
// Show n'est pas statique alors je dois instancier l'objet pour l'utiliser 
$usercontroller = new UserController();
$usercontroller->show($pdo);
$registercontroller = new RegisterController();
$registercontroller->showform();