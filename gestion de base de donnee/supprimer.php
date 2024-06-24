<?php
require_once('bd.php');

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $requete="DELETE FROM employé WHERE id='$id'";
    $statement=$connexion->prepare($requete);
    $statement->execute();
    header('location:afficher.php');
}
?>