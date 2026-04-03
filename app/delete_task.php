<?php
require_once __DIR__ . '/db.php';

$id = $_GET['id'];

mysqli_query($conn, "DELETE FROM tasks WHERE id=$id");

header('Location: index.php');
exit;