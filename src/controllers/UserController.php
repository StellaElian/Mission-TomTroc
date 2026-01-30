<?php
//Demande au modéle et l'envoie à la vue 
require_once "../src/models/User.php";

class UserController
{
    public function show($pdo){
        $user = User::getOneUser($pdo);
        require_once '../src/views/user.php'; // car $user existe maintenant 
    }
}