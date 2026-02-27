<?php
session_start();
require 'db.php';

if (!isset($_SESSION['admin'])) {
    header("Location: login_admin.php");
    exit();
}

$stmt = $pdo->query("SELECT * FROM Client ORDER BY messageTexte DESC");
$messages = $stmt->fetchAll();
?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Dashboard Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
    <h2 class="mb-4">Messages reçus</h2>
    <a href="logout.php" class="btn btn-secondary mb-3">Déconnexion</a>
    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Email</th>
                <th>Objet</th>
                <th>Message</th>
                
            </tr>
        </thead>
        <tbody>
            <?php foreach($messages as $msg): ?>
            <tr>
                <td><?= $msg['id'] ?></td>
                <td><?= htmlspecialchars($msg['nom']) ?></td>
                <td><?= htmlspecialchars($msg['prenom']) ?></td>
                <td><?= htmlspecialchars($msg['email']) ?></td>
                <td><?= htmlspecialchars($msg['objet']) ?></td>
                <td><?= htmlspecialchars($msg['messageTexte']) ?></td>
               
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
</body>
</html>