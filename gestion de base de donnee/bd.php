<?php

$host = 'localhost';
$port = 3307; 
$dbname = 'entreprise';
$username = 'root';
$password = '';

try {
    $connexion = new PDO("mysql:host=$host;dbname=$dbname;port=$port", $username, $password);

    echo "Vous êtes maintenant connecté à $dbname sur $host:$port.";
} catch (PDOException $e) {
    die("Impossible de se connecter à la base de données $dbname : " . $e->getMessage());
}

?>
