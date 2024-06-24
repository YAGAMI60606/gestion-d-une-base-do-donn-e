<?php
    include('bd.php');
    $service_sql="select * from service";
    $statement = $connexion->prepare($service_sql); 
    $statement->execute(); 
    $resultat = $statement -> fetchall(PDO::FETCH_ASSOC);
    if($_SERVER['REQUEST_METHOD']=='POST'){
        $cin=$_POST['cin'];
        $nom=$_POST['name'];
        $dn=$_POST['dn'];
        $dm=$_POST['dm'];
        $salaire=$_POST['salaire'];
        $service=$_POST['service'];
        $ajouter_sql = "INSERT INTO `employé`(cin ,nomComplet ,dateNaissance ,dateEmbauche ,salaire ,numService ) VALUES ('$cin', '$nom', '$dn', '$dm', '$salaire', '$service')";
        $statement = $connexion->prepare($ajouter_sql); 
        $statement->execute(); 
        echo "bien ajoutée";
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
                <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Password" name="cin">
            </div>

            <div class="form-group">
                <label for="exampleInputPassword1">Name</label>
                <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Password" name="name">
            </div>

            <div class="form-group">
                <label for="exampleInputPassword1">Date de naissance</label>
                <input type="date" class="form-control" id="exampleInputPassword1" placeholder="Password" name="dn">
            </div>

            <div class="form-group">
                <label for="exampleInputPassword1">Date d'eumbauche</label>
                <input type="date" class="form-control" id="exampleInputPassword1" placeholder="Password" name="dm">
            </div>

            <div class="form-group">
                <label for="salaire">salaire</label>
                <input type="text" class="form-control" id="salaire" placeholder="salaire" name="salaire">
            </div>

            <div class="form-group mt-3  mb-3">
                <label for="exampleInputPassword1">Service</label>
                <select class="custom-select" name="service">
                    <?php foreach($resultat as $row){?> 
                    <option value="<?php echo $row["numService"];?>"><?php echo $row['intitulé'];?></option>
                    <?php }?>
                </select>
            </div>
 
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    <script src="../bootstrap_library/bootstrap.bundle.min.js"></script>
</body>
 
</html>
