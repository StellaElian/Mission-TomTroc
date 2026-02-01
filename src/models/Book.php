<?php 
class Book
{
    public static function getAllBooks(PDO $pdo){
        $statement = $pdo->query("SELECT * FROM books ORDER BY id DESC");
        return $statement->fetchAll(PDO::FETCH_ASSOC); // récupère tout sous forme de tableau (chaque livre est un tableau avec ses colonnes)
    }

    public static function getBookById(PDO $pdo, int $id){
        $statement = $pdo->prepare("SELECT * FROM books WHERE id = :id");
        $statement->execute(['id' => $id]);
        return $statement->fetch(PDO::FETCH_ASSOC);
    }

    public static function createBook(PDO $pdo, string $title, string $author, string $description, string $disponibilite, string $image){
        $sql = "INSERT INTO books (title, author, description, image, user_id, disponibilite) VALUES (:title, :author, :description, :image, :user_id, :disponibilite)";
        $statement = $pdo->prepare($sql);
        $statement->execute([
            'title' => $title,
            'author' => $author,
            'description' => $description,
            'image' => $image,
            'user_id' => $userid,
            'disponibilte' => $disponibilite
        ]);
    }

    public static function deleteBook(PDO $pdo, int $id){
        $statement = $pdo->prepare("DELETE FROM books WHERE id = :id");
        $statement->(['id' => $id]);
    }

    public static function updateBook(PDO $pdo, int $id, string $title, string $author, string $description, string $image, string $disponibilite){
        $sql = "UPDATE books SET title = :title, author = :author, description = :description, image = :image, disponibilite = :disponibilite WHERE id = :id";
        $statement = $pdo->prepare($sql);
        $statement->execute([
            'title' => $title,
            'author' => $author,
            'description' => $description,
            'image' => $image,
            'disponibilite' => $disponibilite,
            'id' => $id
        ]);
    }
}