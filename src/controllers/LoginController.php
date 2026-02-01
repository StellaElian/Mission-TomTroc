<?php
require_once "../src/models/User.php";
class LoginController
{
    public function showForm(){
        require_once "../src/views/login.php";
    }
    public function login($pdo){
        if (!empty($_POST['pseudo']) && !empty($_POST['password'])){
            $user = User::login($pdo, $_POST['pseudo'], $_POST['password']);
            if($user){
                //mémoriser l'utilisateur
                $_SESSION['user_id'] = $user['id'];
                header('Location: index.php?page=profile');
                exit;
            }else{
                echo "Pseudo ou Mot de passe incorect ";
            }
        }
    }
}