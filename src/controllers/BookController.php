<?php
require_once "../src/models/Book.php";

class BookController
{
    private PDO $db;

    public function __construct(){
        $this->db = require __DIR__ . '/../config/database.php';
    }

    public function showUserLibrary(int $userId): array
    {
        $sql = "SELECT * FROM books WHERE user_id = :user_id";
        $statement = $this->db->prepare($sql);
        $statement->execute([
            'user_id' => $userId
        ]); 
        return $statement->fetchAll(PDO::FETCH_ASSOC); 
    }
    public function index(): array 
    {
        // index: nom juste pour afficher la page principale de la librairie
        return Book::getAllBooks($this->db);
    }
}