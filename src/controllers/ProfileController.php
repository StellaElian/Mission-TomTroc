<?php
//Demande au modéle et l'envoie à la vue 
require_once "../src/models/User.php";

class ProfileController
{
    public function show($pdo){
        $user = User::getOneProfile($pdo);
        require_once '../src/views/profile.php'; 
    }

    public function register($pdo){
        if(!EMPTY($_POST)){
            User::createUser(
                $pdo,
                $_POST['pseudo'],
                $_POST['email'],
                $_POST['password']
            );
            require_once '../src/views/register.php';
        }
    }
}