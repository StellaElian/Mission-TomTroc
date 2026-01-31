<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Mon compte</title>
    </head>
    <body>
        <h1>Mon compte</h1><br>
        <div class="profile-main">
            <div class="profile-left">
            <img src="<?= $user['avatar'] ?? 'default-avatar.png' ?>" alt="Avatar" class="profile-avatar">
            <a href="index.php?page=profile&edit=true" class="profile-edit">modifier</a>
            <h2><?= $user['pseudo'] ?></h2>
            <p>Membre depuis : <?= $user['created_at'] ?></p>
        
        </div>

        <div class="profile-right">
            <h3>Vos informations personnelles</h3>
            <form method="post" action="index.php?page=profile">
                <label for="email">Email :</label>
                <input type="email" name="email" id="email" value="<?= $user['email'] ?>">

                <label for="pseudo">Pseudo :</label>
                <input type="text" name="pseudo" id="pseudo" value="<?= $user['pseudo'] ?>">

                <label for="password">Mot de passe :</label>
                <input type="password" name="password" id="password">

                <p>Bibliothèque</p>

                <button type="submit">Enregistrer</button>
            </form>
        </div>
    </body>
</html>