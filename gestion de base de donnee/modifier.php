<?php
     include('bd.php');
     if (isset($_GET['id'])) {
         $id = $_GET['id'];
     
         // Use a parameterized query to prevent SQL injection
         $retourn_sql = "SELECT * FROM employé INNER JOIN service ON employé.numService = service.numService WHERE employé.id = :id";
         $statement = $connexion->prepare($retourn_sql);
         $statement->bindParam(':id', $id, PDO::PARAM_INT);
         $statement->execute();
         $resultat = $statement->fetch(PDO::FETCH_ASSOC);
     
         // Fetch services
         $ser = "SELECT * FROM service";
         $statement1 = $connexion->prepare($ser);
         $statement1->execute();
         $resultat1 = $statement1->fetchAll(PDO::FETCH_ASSOC);
     };
     if($_SERVER['REQUEST_METHOD']=='POST'){
        $cin=$_POST['cin'];
        $nom=$_POST['name'];
        $dn=$_POST['dn'];
        $dm=$_POST['dm'];
        $salaire=$_POST['salaire'];
        $service=$_POST['service'];
        $modifier_sql = "UPDATE `employé` set cin='$cin', nomComplet='$nom', dateNaissance='$dn', dateEmbauche='$dm', salaire='$salaire', numService='$service' where id = '$id'";
        $statement2 = $connexion->prepare($modifier_sql); 
        $statement2->execute(); 
        echo "bien modifier";
        header('location:afficher.php');
    }

?>
<!DOCTYPE html>
<html lang="en">
 
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../bootstrap_library/bootstrap.min.css">
    <title>Ajouter Employee</title>
</head>
 
<body>
    <div class="bg-warning text-black p-3 ">
        <h1>New Employee</h1>
    </div>
    <div class="container d-flex justify-content-center  m-5">
 
 
        <form style="width: 100%;" method="post" action="">
            <div class="form-group">
                <label for="exampleInputPassword1">Cin</label>
                <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Password" name="cin" value="<?php echo $resultat["cin"] ?>">
            </div>

            <div class="form-group">
                <label for="exampleInputPassword1">Name</label>
                <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Password" name="name" value="<?php echo $resultat["nomComplet"] ?>">
            </div>

            <div class="form-group">
                <label for="exampleInputPassword1">Date de naissance</label>
                <input type="date" class="form-control" id="exampleInputPassword1" placeholder="Password" name="dn" value="<?php echo $resultat["dateNaissance"] ?>">
            </div>

            <div class="form-group">
                <label for="exampleInputPassword1">Date d'eumbauche</label>
                <input type="date" class="form-control" id="exampleInputPassword1" placeholder="Password" name="dm" value="<?php echo $resultat["dateEmbauche"] ?>">
            </div>

            <div class="form-group">
                <label for="salaire">salaire</label>
                <input type="text" class="form-control" id="salaire" placeholder="salaire" name="salaire" value="<?php echo $resultat["salaire"] ?>">
            </div>

            <div class="form-group mt-3  mb-3">
                <label for="exampleInputPassword1">Service</label>
                <select class="custom-select" name="service" value="<?php echo $resultat["intitulé"] ?>">
                    <?php foreach($resultat1 as $row){?> 
                    <option value="<?php echo $row["numService"];?>"><?php echo $row['intitulé'];?></option>
                    <?php }?>
                </select>
            </div>
 
            <button type="submit" class="btn btn-primary">modifier</button>
        </form>
    </div>
    <script src="../bootstrap_library/bootstrap.bundle.min.js"></script>
</body>
 
</html>
