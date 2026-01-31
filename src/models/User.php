<?php
//Communque avec la base de connées 
// envoies la requête de la base de données à sql et mets le dans l'objet query
//et affiches le a ligne du résultat de la requête
class User
{
    // enregistrer un utilisateur 
    public static function createUser($pdo, $pseudo, $email, $password){
        $sql = "INSERT INTO users (pseudo, email, password)
                VALUES ('pseudo', 'email', 'password')";
        $pdo->query($sql);
    }

    public static function login($pdo, $pseudo, $password){
        $query = $pdo->query("SELECT * FROM users WHERE pseudo = '$pseudo' LIMIT 1");
        $user = $query->fetch();
        if($user && password_verify($password, $user['password'])){
            return $user;
        }else{
            return false;
        }
    }

    public static function getOneProfile(PDO $pdo){
        $query = $pdo->query("SELECT pseudo, email, created_at FROM users LIMIT 1");
        return $query->fetch();
    }
}
