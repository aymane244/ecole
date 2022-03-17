<?php
    include_once "header.php";
    include_once "navbar_admin.php";
    $data = new Etudiant($db);
    if(!isset($_SESSION['username']) && !isset($_SESSION['pwrd'])){
        echo "<script>window.location.href='login_admin'</script>";
    }
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formations</title>
</head>
<?php
    $formations = $data->getTotalFormationMatieres();
?>
<body>
    <div class="container" id="div-push">
        <?php
            if(isset($_SESSION['status'])){
        ?>
        <div class='alert alert-success text-center mt-2' role='alert'><?php echo $_SESSION['status']?></div>
        <?php
                unset($_SESSION['status']);
            }
        ?>
        <div class="text-center my-3">
            <h2><i class="fas fa-school"></i> Page Formations</h2>
        </div>
        <div class="mt-4 align-items-center text-center">
            <a href="ajouter-formation" target="_blank" class="btn btn-primary"><i class="fas fa-plus-square"></i> Ajouter une formation</a>
        </div>
        <table class="table table-bordered mt-5">
            <thead class="text-center">
                <tr>
                    <th scope="col" colspan="10">ARTL Nord</th>
                </tr>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Formation</th>
                    <th scope="col">Présentation</th>
                    <th scope="col">Description</th>
                    <!--<th scope="col">Nbr de professeur</th>-->
                    <!--<th scope="col">Nbr de matières</th>-->
                    <!--<th scope="col">Durée total</th>-->
                    <th scope="col">Image</th>
                    <th scope="col">Etudiants</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody class="text-center">
                <?php
                    $i=1;
                    foreach($formations as $formation){
                ?>
                <tr>
                    <td class="row-style"><?php echo $i ?></td>          
                    <td class="row-style"><?php echo $formation['for_nom'] ?></td>
                    <td class="w-25  row-style"><?php echo $formation['for_pres']?></td>
                    <td class="row-style text-length2"><?php echo $formation['for_descr']?></td>
                    <!--<td><?php //echo $formation['prof_total'] ?></td>-->
                    <!--<td><?php //echo //$formation['matiere_total'] ?></td>-->
                    <!--<td><?php //echo $formation['duree_total'] ?> h</td>-->
                    <td class="row-style"><img src="<?php echo $formation['for_image'] ?>" style='max-width: 5rem'></td>
                    <td class="row-style">
                        <a href="les-etudiants?id=<?php echo $formation['for_id'] ?>" target="_blank"> 
                            Voir les étudiants
                        </a>
                    </td>
                    <td class="row-style"> 
                        <a href="modifier-formation?id=<?php echo $formation['for_id'] ?>" target="_blank"> 
                            <i class="fas fa-edit text-success awesome-size"></i>
                        </a>
                    </td>
                </tr>
                <?php
                    $i++;
                    }
                ?>
            </tbody>    
        </table>
    </div>

</body>
</html>