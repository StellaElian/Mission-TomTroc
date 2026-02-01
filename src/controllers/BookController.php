<?php
require_once "../src/models/Book.php";
class BookController
{
    public function showLibrary(PDO $pdo){
        //récupération de tous les livres depuis le modèle
        $books = Book::getAllBooks($pdo);
        require_once "../src/views/library.php";
    }

    public function index(PDO $pdo){
        // index: nom juste pour afficher la page principale de la librairie
        $books = Book::getAllBooks($pdo);
        require_once "../src/views/library.php";
    }
}