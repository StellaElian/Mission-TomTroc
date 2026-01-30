<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>User</title>
</head>
<body>

<h1>Utilisateur :</h1>
<?php if ($user !== FAlSE): ?>
    <p>Pseudo : <?= $user['pseudo']; ?></p>
    <p>Email : <?= $user['email']; ?></p>
<?php endif; ?>
</body>
</html>
