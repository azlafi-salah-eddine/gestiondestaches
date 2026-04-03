<?php
$host = 'localhost';
$user = 'root';
$pass = '';
$dbName = 'gestion_taches';

$conn = mysqli_connect($host, $user, $pass, $dbName);

if (!$conn) {
    die('Erreur de connexion: ' . mysqli_connect_error());
}
