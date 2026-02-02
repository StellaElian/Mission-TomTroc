<?php
//Communique avec la base de connées 
// envoies la requête de la base de données 

class User
{
    // enregistrer un utilisateur 
    public static function createUser(PDO $pdo, string $pseudo, string $password, string $email): void
    {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO users (email, password, pseudo) VALUES (:email, :password, :pseudo)";
        $statement = $pdo->prepare($sql);
        $statement->execute([
            'email' => $email,
            'password' => $password,
            'pseudo' => $pseudo
        ]);
    }

    public static function login(PDO $pdo, string $pseudo, string $password): array|false
    {
        $stmt= $pdo->prepare("SELECT * FROM users WHERE pseudo = :pseudo");
        $stmt->execute(['pseudo' => $pseudo]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        if($user && password_verify($password, $user['password'])){
            return $user;
        }else{
            return false;
        }
    }

    public static function getOneProfile(PDO $pdo, int $userId): array |false
    {
        $stmt = $pdo->prepare("SELECT pseudo, email, created_at FROM users LIMIT 1");
        $stmt->execute(['id' => $userId]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function updateProfile(
        PDO $pdo, 
        int $id, 
        string $pseudo, 
        string $email, 
        ?string $password
        ): void {
            if ($password) {
            $password = password_hash($password, PASSWORD_DEFAULT);
            $sql = "UPDATE users SET email = :email, password = :password, pseudo = :pseudo WHERE id = :id";
            } else {
                $sql = "UPDATE users SET pseudo = :pseudo, email = :email WHERE id = :id";
            }
            $stmt = $pdo->prepare($sql);
            $stmt->execute([
            'email' => $email,
            'password' => $password,
            'pseudo' => $pseudo,
            'id' => $id
        ]);
    }
    
    public static function updateAvatar(PDO $pdo, int $id, string $avatar): void
    {
        $stmt = $pdo->prepare("UPDATE users SET avatar = :avatar WHERE id = :id");
        $stmt->execute([
            'avatar' => $avatar,
            'id' => $id
        ]);
    }
}

