<?php
require_once 'db.php';

$id = $_GET['id'];

if ($_POST) {
    $nom = $_POST['nom'];
    $description = $_POST['description'];
    $executed = isset($_POST['executed']) ? 1 : 0;

    if ($nom) {
        mysqli_query($conn, "UPDATE tasks 
            SET nom='$nom', description='$description', executed=$executed 
            WHERE id=$id");

        header('Location: index.php');
        exit;
    }
}

$result = mysqli_query($conn, "SELECT * FROM tasks WHERE id=$id");
$task = mysqli_fetch_assoc($result);

$nom = $task['nom'];
$description = $task['description'];
$executed = $task['executed'];
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Modifier tache</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Modifier la tache #<?= $id ?></h1>


    <form method="post">
        <label>Nom :</label><br>
        <input type="text" name="nom" value="<?= htmlspecialchars($nom) ?>" required><br><br>

        <label>Description :</label><br>
        <textarea name="description"><?= htmlspecialchars($description) ?></textarea><br><br>

        <label>
            <input type="checkbox" name="executed" value="1" <?= $executed ? 'checked' : '' ?>>
            Executee
        </label><br><br>

        <button type="submit">Mettre a jour</button>
        <a href="index.php">Retour</a>
    </form>
</body>
</html>
