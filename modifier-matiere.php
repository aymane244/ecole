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
    <title>Modifier Matière</title>
</head>
<?php
    $id = $_GET['id'];
    $matieres = $data->getFormationMatiere();
    $formations = $data->getformation();
    foreach($matieres as $matiere){
        if($matiere['mat_id'] == $id){
            $formation = $matiere['for_nom'];
            $mat = $matiere['mat_nom'];
            $prof = $matiere['mat_prof'];
            $duree = $matiere['mat_duree'];
            $for_id = $matiere['mat_formation'];
        }
    }
?>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 mt-5">
                <div class="card card-position">
                    <div class="card-header text-center link-font"><i class="fas fa-edit"></i> Editer votre matière</div>
                        <div class="card-body py-5">
                            <form action="" method="POST" enctype="multipart/form-data">
                            <div class="row mb-3">
                                <label for="formationnom" class="col-md-4 col-form-label text-md-end">Formation</label>
                                <div class="col-md-6">
                                    <input type="hidden" name="formation_nom" id="" value="<?php echo $for_id ?>">
                                    <div class="d-flex">
                                        <i class="fas fa-folder-open position-awesome"></i>
                                        <select class="custom-select px-5" name="formation">
                                            <option value="<?php echo $for_id?>"><?php echo $formation ?></option>
                                            <option>--Choisir la formation--</option>
                                            <?php
                                                foreach($formations as $forma){
                                            ?>    
                                            <option value="<?php echo $forma['for_id']?>"><?php echo $forma['for_nom'] ?></option>
                                            <?php
                                                }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="matiere" class="col-md-4 col-form-label text-md-end">Matières</label>
                                <div class="col-md-6">
                                    <div class="d-flex">
                                        <i class="fas fa-poll position-awesome"></i>
                                        <input id="matiere" type="text" class="form-control px-5" name="matiere_nom" value="<?php echo $mat ?>" autocomplete="matiere" autofocus required>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="prof" class="col-md-4 col-form-label text-md-end">Professeur</label>
                                <div class="col-md-6">
                                    <div class="d-flex">
                                        <i class="fas fa-file-signature position-awesome"></i>
                                        <input id="prof" type="text" class="form-control px-5" name="prof_nom" value="<?php echo $prof ?>" autocomplete="profnom" autofocus required>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="duree" class="col-md-4 col-form-label text-md-end">Durée</label>
                                <div class="col-md-6">
                                    <div class="d-flex">
                                        <i class="fas fa-comment-dollar position-awesome"></i>
                                        <input id="duree" type="text" class="form-control px-5" name="duree" value="<?php echo $duree ?>" autocomplete="duree" autofocus required>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" name="submit" class="btn btn-primary mx-3">Modifier matière</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
<?php
    if(isset($_POST['submit'])){
        $data->updateMatiere();
    }
?>