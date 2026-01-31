<?php
//Demande au modéle et l'envoie à la vue 
require_once "../src/models/User.php";

class ProfileController
{
    public function show($pdo){
        $profile = User::getOneProfile($pdo);
        require_once '../src/views/profile.php'; // car $user existe maintenant 
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