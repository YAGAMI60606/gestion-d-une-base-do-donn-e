<?php
    include('bd.php');
    $afficher_sql = "SELECT * FROM employé INNER JOIN service ON employé.numService = service.numService";
    $statement = $connexion->prepare($afficher_sql); 
    $statement->execute(); 
    $resultat = $statement -> fetchall(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table border="1">
        <tr>
            <th>id</th>
            <th>cin</th>
            <th>nom complet</th>
            <th>date de naissance</th>
            <th>date d'eumbauche</th>
            <th>salaire</th>
            <th>service</th>
            <th>action</th>
            <?php foreach($resultat as $row) {?>
                <tr>
                    <td><?php echo $row["id"] ;?></td>
                    <td><?php echo $row["cin"] ;?></td>
                    <td><?php echo $row["nomComplet"] ;?></td>
                    <td><?php echo $row["dateNaissance"] ;?></td>
                    <td><?php echo $row["dateEmbauche"] ;?></td>
                    <td><?php echo $row["salaire"] ;?></td>
                    <td><?php echo $row["intitulé"] ;?></td>
                    <td><a href="modifier.php?id=<?php echo $row["id"] ;?>">modifier</a>
                    <a href="supprimer.php?id=<?php echo $row["id"] ;?> " onclick="return confirm('Êtes-vous sûr de vouloir supprimer <?php echo $row['nomComplet']; ?>?') ">suprimmer</a></td>

                </tr>
                <?php };?>
        </tr>
    </table>
    
</body>
</html>