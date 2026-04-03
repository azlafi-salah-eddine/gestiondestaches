<?php
require_once __DIR__ . '/db.php';

$tasks = mysqli_query($conn, "SELECT * FROM tasks ORDER BY id DESC");
$statsResult = mysqli_query($conn, "SELECT COUNT(*) AS total, COALESCE(SUM(executed), 0) AS done FROM tasks");
$stats = mysqli_fetch_assoc($statsResult);
$totalTasks = (int) $stats['total'];
$doneTasks = (int) $stats['done'];
$pendingTasks = $totalTasks - $doneTasks;
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Gestion des taches</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<h1>Gestion des taches</h1>

<a href="add_task.php">Ajouter</a>

<table>
<tr>
    <th>ID</th>
    <th>Nom</th>
    <th>Description</th>
    <th>Etat</th>
    <th>Actions</th>
</tr>

<?php while($row = mysqli_fetch_assoc($tasks)): ?>
<tr>
    <td><?= $row['id'] ?></td>
    <td><?= htmlspecialchars($row['nom']) ?></td>
    <td><?= htmlspecialchars($row['description']) ?></td>
    <td class="<?= $row['executed'] ? 'status-yes' : 'status-no' ?>"><?= $row['executed'] ? 'Oui' : 'Non' ?></td>
    <td>
        <a href="edit_task.php?id=<?= $row['id'] ?>">Edit</a>
        <a href="delete_task.php?id=<?= $row['id'] ?>">Delete</a>
    </td>
</tr>
<?php endwhile; ?>

</table>

<p class="table-stats">
    Total: <?= $totalTasks ?> |
    Executees: <?= $doneTasks ?> |
    Non executees: <?= $pendingTasks ?>
</p>

</body>
</html>