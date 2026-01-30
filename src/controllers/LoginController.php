<?php
require_once "../src/models/User.php";
class LoginController
{
    public function showForm(){
        require_once "../src/views/login.php";
    }
    public function login($pdo){
        if (!empty($_POST['pseudo']) $$ !empty($_POST['password'])){
            $user = User::login($pdo, $_POST['pseudo'], $_POST['password']);
            if($user){
                echo "Bienvenue " . $user['pseudo'];
            }else{
                echo "Pseudo ou Mot de passe incorect ";
            }
        }
    }
}