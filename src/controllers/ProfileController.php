<?php
//Demande au modéle et l'envoie à la vue 
require_once "../src/models/User.php";
require_once "../src/models/Book.php";
require_once "../config/_config.php";

class ProfileController
{
    public function show(PDO $pdo){
        // verifie si utilisateur connecté
       if(!isset($_SESSION['user_id'])){
            echo "Utilisateur non connecté";
            return;
        } 
        $userId = $_SESSION['user_id'];
         $user = User::getOneProfile($pdo);
         // livre de cet utilisateur
         $books = Book::getBooksByUser($pdo, $userId);
         //MàJ formulaire
        if(!empty($_POST)){
            User::updateProfile(
                $pdo,
                $user['id'],
                $_POST['email'],
                $_POST['password']?: null,
                $_POST['pseudo']
            );
            //rechargement des données 
            User::getOneProfile($pdo);
        }
        require_once '../src/views/profile.php'; 
    }

    public function register($pdo){
        if(!EMPTY($_POST)){
            User::createUser(
                $pdo,
                $_POST['email'],
                $_POST['password'],
                $_POST['pseudo']
            );
            require_once '../src/views/register.php';
        }
    }
}