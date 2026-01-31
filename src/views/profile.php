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
            <img src="<?= $user['avatar'] ?? 'default-avatar.png' ?>" alt="Avatar" class="profile-avatar"><br><br>
            <a href="index.php?page=profile&edit=true" class="profile-edit">modifier</a>
            <h2><?= $user['pseudo'] ?></h2>
            <p>Membre depuis : <?= $user['created_at'] ?></p><br><br><br>

            <p>BIBLIOTHEQUE</p>
        </div>
        <div class="profile-right">
            <h3>Vos informations personnelles</h3>
            <form method="post" action="index.php?page=profile">
                <label for="email">Adresse email </label><br>
                <input type="email" name="email" id="email" value="<?= $user['email'] ?>"><br><br>

                <label for="password">Mot de passe </label><br>
                <input type="password" name="password" id="password"><br><br>

                <label for="pseudo">Pseudo </label><br>
                <input type="text" name="pseudo" id="pseudo" value="<?= $user['pseudo'] ?>"><br><br>

                <button type="submit">Enregistrer</button>
            </form>
        </div>
        <h3>Bibliothèque</h3>

<?php if (!empty($books)): ?>
    <table class="library-table">
        <thead>
            <tr>
                <th>PHOTO</th>
                <th>TITRE</th>
                <th>AUTEUR</th>
                <th>DESCRIPTION</th>
                <th>DISPONIBILITE</th>
                <th>ACTION</th>
            </tr>
        </thead>

        <tbody>
            <?php foreach ($books as $book): ?>
                <tr>
                    <td>
                        <img src="<?= $book['image'] ?? 'default-book.png' ?>" width="60">
                    </td>

                    <td><?= htmlspecialchars($book['title']) ?></td>

                    <td><?= htmlspecialchars($book['author']) ?></td>

                    <td><?= htmlspecialchars($book['description']) ?></td>

                    <td>
                        <?= $book['status'] === 'available' ? 'Disponible' : 'Non disponible' ?>
                    </td>

                    <td>
                        <a href="index.php?page=edit-book&id=<?= $book['id'] ?>">Éditer</a>
                        |
                        <a href="index.php?page=delete-book&id=<?= $book['id'] ?>" class="delete">Supprimer</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php else: ?>
    <p>Aucun livre pour le moment.</p>
<?php endif; ?>
    </body>
</html>