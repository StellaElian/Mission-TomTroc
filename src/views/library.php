<h2>Ma bibliothèque</h2>
<?php if (empty($books)) : ?>
    <p>Aucun livre dans votre bibliothèque.</p>
<?php else : ?>
    <?php foreach($books as $book) : ?>
        <div>
            <h3><?= htmlspecialchars($book->title) ?></h3>
            <p><strong>Auteur :</strong> <?= htmlspecialchars($book->author) ?></p>
            <p><?= htmlspecialchars($book->description) ?></p>
        </div>
        <hr>
    <?php endforeach; ?>
<?php endif; ?>