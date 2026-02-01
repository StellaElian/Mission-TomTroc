<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
    </head>
    <body>
        <h3>BIBLIOTHEQUE</h3>
        <?php if (!empty($books)): ?>
            <table class="library-table">
                <thead>
                    <tr>
                        <th>Photo</th>
                        <th>Titre</th>
                        <th>auteur</th>
                        <th>Description</th>
                        <th>Disponibilité</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($books as $book): ?>
                        <tr>
                            <td>
                                <img src="img/Books/<?= $book['image'] ?? 'default-book.png' ?>" width="60">
                            </td>
                            <td><?= htmlspecialchars($book['title']) ?></td>
                            <td><?= htmlspecialchars($book['author']) ?></td>
                            <td><?= htmlspecialchars($book['description']) ?></td>
                            <td>
                                <a href="index.php?page=edit-book&id=<?= $book['id'] ?>">Editer</a>
                                <a href="index.php?page=delet-book&id=<?= $book['id'] ?>" class="delete">Supprimer</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <?php else: ?>
                <p>Aucun livre pour le moment. </p>
            <?php endif; ?>
    </body>
</html>