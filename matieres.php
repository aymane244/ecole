<?php
    include_once "header.php";
    include_once "navbar_admin.php";
    $data = new Etudiant($db);
    if(!isset($_SESSION['username']) && !isset($_SESSION['pwrd'])){
        echo "<script>window.location.href='login_admin'</script>";
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Matières</title>
</head>
<?php
    $formations = $data->getFormationMatiere();
    $arr = array();
    $matieres = array();
    $formationame = array();
    $prof = array();
    $duree = array();
    $mat_id = array();
    foreach($formations as $row){
        array_push($formationame, $row['for_nom']);
        array_push($matieres, $row['mat_nom']);
        array_push($prof, $row['mat_prof']);
        array_push($duree, $row['mat_duree']);
        array_push($mat_id, $row['mat_id']);
        if(!isset($arr[$row['for_nom']])){
            $arr[$row['for_nom']]['rowspan'] = 0;
        }
        $arr[$row['for_nom']]['printed'] = 'no';
        $arr[$row['for_nom']]['rowspan'] += 1;
    }
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
            <h2><i class="fas fa-book-open"></i> Page Matières</h2>
        </div>
        <div class="mt-4 text-center">
            <a href="ajouter-matiere" target="_blank" class="btn btn-primary"><i class="fas fa-plus-square"></i> Ajouter une matière</a>
        </div>
        <table class="table table-bordered mt-5">
            <thead class="text-center">
                <tr>
                    <th scope="col" colspan="5">ARTL Nord</th>
                </tr>
                <tr>
                    <th scope="col">Formation</th>
                    <th scope="col">Matières</th>
                    <th scope="col">Professeur</th>
                    <th scope="col">Durée globale</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody class="text-center">
                <?php
                    for($i=0; $i<sizeof($matieres); $i++){
                        $formationom = $formationame[$i];
                ?>
                <tr>
                    <?php
                        if($arr[$formationom]['printed'] == 'no'){
                    ?>
                    <td class="row-style" rowspan="<?php echo $arr[$formationom]['rowspan'] ?>"><?php echo $formationom ?></td>    
                    <?php
                            $arr[$formationom]['printed'] = 'yes';
                        }
                    ?>      
                    <td><?php echo $matieres[$i] ?> </td>
                    <td><?php echo $prof[$i] ?></td>
                    <td><?php echo $duree[$i] ?></td>
                    <td>
                        <div class="row">
                            <div class="col-md-6">
                                <a href="modifier-matiere?id=<?php echo $mat_id[$i] ?>" target="_blank"> 
                                    <i class="fas fa-edit text-success awesome-size"></i>
                                </a>
                            </div>
                            <div class="col-md-6">
                                <form action="" method="POST">
                                    <input type="hidden" name="matiere_id" value="<?php echo $mat_id[$i] ?>">
                                    <button type="submit" class="btn-style" name="submit" onclick='return confirm("Voulez-vous supprimer cette matière")'>
                                        <i class="fas fa-trash-alt text-danger awesome-size"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </td>
                </tr>
                <?php
                    }
                ?>
            </tbody>    
        </table>
    </div>
</body>
</html>
<?php
    if(isset($_POST['submit'])){
        $data->deleteMatieres($_POST['matiere_id']);
    }
?>