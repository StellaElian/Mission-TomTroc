<?php 
// rôle est d'appeler le controller 
// database.php retourne $pdo ainsi on le récupère ici 
$pdo = require_once '../config/database.php'; 

$page = $_GET['page'] ?? 'user';

//isset verifie si une information existe 
if(isset($_GET['page']) && $_GET['page'] === 'register'){
    require_once "../src/controllers/RegisterController.php";
    $registercontroller = new RegisterController();
    $registercontroller->showform();
}elseif(isset($_GET['page']) && $_GET['page'] === 'login'){
    require_once "../src/controllers/LoginController.php";
    $loginController = new LoginController();
    $loginController->showForm();
    $loginController->login($pdo);
}else{
    //page utilisateur
    require_once "../src/controllers/ProfileController.php";
    $profileController = new ProfileController();
    $profileController->show($pdo);
}