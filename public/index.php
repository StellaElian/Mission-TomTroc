<?php 
// rôle est d'appeler le controller 
// database.php retourne $pdo ainsi on le récupère ici 
$pdo = require_once '../config/database.php'; 

//controller de l'inscription 


//isset verifie si une information existe 
if(isset($_GET['page']) && $_GET['page'] === 'register'){
    require_once "../src/controllers/RegisterController.php";
    $registercontroller = new RegisterController();
    $registercontroller->showform();
}else{
    require_once "../src/controllers/UserController.php";
    //show n'est pas statique alors je dois instancier l'objet pour l'utiliser 
    $usercontroller = new UserController();
    $usercontroller->show($pdo);
}
if(isset($_GET['page']) && $_GET['page'] === 'login'){
    require_once "../src/controllers/LoginController.php";
    $loginController = new LoginController();
    $loginController->showForm();
    $loginController->login($pdo);
}else{
    require_once "../src/controllers:UserController.php";
    $userController = new UserController();
    $userController->show($pdo);
}