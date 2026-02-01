<?php 
// rôle est d'appeler le controller 
require_once "../config/_config.php";
// database.php retourne $pdo ainsi on le récupère ici 
$pdo = require_once '../config/database.php'; 

$page = $_GET['page'] ?? 'profile';

switch ($page){
    case 'register':
        require_once "../src/controllers/RegisterController.php";
        $registercontroller = new RegisterController();
        $registercontroller->showform();
        break;
    
    case 'login':
        require_once "../src/controllers/LoginController.php";
        $loginController = new LoginController();
        $loginController->showForm();
        $loginController->login($pdo);
        break;

    case 'profile':
        require_once "../src/controllers/ProfileController.php";
        $profileController = new ProfileController();
        $profileController->show($pdo);
        break;

    case 'library':
        require_once "../src/controller/BookController.php";
        $bookcontroller = new BookController();
        $bookController->index($pdo);
        break;

    default:
        echo "Page introuvable";
}