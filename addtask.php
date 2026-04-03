<?php
require_once __DIR__ . '/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom = $_POST['nom'];
    $description = $_POST['description'];
    $executed = isset($_POST['executed']) ? 1 : 0;

    if ($nom) {
        $sql = "INSERT INTO tasks (nom, description, executed)
                VALUES ('$nom', '$description', $executed)";
        mysqli_query($conn, $sql);

        header('Location: index.php');
        exit;
    } else {
        echo "Nom obligatoire";
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ajouter tache</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Ajouter une tache</h1>


    <form method="post">
        <label>Nom :</label><br>
        <input type="text" name="nom" required><br><br>

        <label>Description :</label><br>
        <textarea name="description"></textarea><br><br>

        <label>
            <input type="checkbox" name="executed" value="1">
            Executee
        </label><br><br>

        <button type="submit">Enregistrer</button>
        <a href="index.php">Retour</a>
    </form>
</body>
</html>
