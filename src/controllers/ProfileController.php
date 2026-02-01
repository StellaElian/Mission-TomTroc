<?php
//Demande au modéle et l'envoie à la vue 
require_once "../src/models/User.php";
require_once "../src/models/Book.php";

class ProfileController
{
    public function show(PDO $pdo){
        $user = User::getOneProfile($pdo);
        // livre de cet utilisateur
        $userId = $_SESSION['user_id'];
        if(!isset($_SESSION['user_id'])){
            echo "Utilisateur non connecté";
            exit;
        }
        $books = Book::getBooksByUser($pdo, $userId);
        if(!empty($_POST)){
            User::updateProfile(
                $pdo,
                $user['id'],
                $_POST['email'],
                $_POST['password']?: null,
                $_POST['pseudo']
            );
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