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
    <title>Sasie de note</title>
</head>
<?php
    @$id = $_GET['id'];
    $formations = $data->getEtudiantMatiereFormation();
    $etudiants = $data->getEtudForm();
    $matieres = $data->getForMat();
    foreach($formations as $formation){
        if($formation['not_id'] == $id){
            $for_nom= $formation['for_nom'];
            $for_id = $formation['for_id'];
            $mat_id = $formation['mat_id'];
            $mat_nom = $formation['mat_nom'];
            $etud_id = $formation['etud_id'];
            $etud_nom = $formation['etud_nom'];
            $etud_prenom = $formation['etud_prenom'];
            $note = $formation['not_note'];
        }
    }
?>
<body>
    <div class="container">
        <?php
            if(isset($_SESSION['status'])){
        ?>
        <div class='alert alert-success text-center mt-2' role='alert'><?php echo $_SESSION['status']?></div>
        <?php
                unset($_SESSION['status']);
            }
        ?>
        <div class="row justify-content-center">
            <div class="col-md-8 mt-5">
                <div class="card card-position">
                    <div class="card-header text-center link-font"><i class="fas fa-edit"></i> Saisir les notes</div>
                        <div class="card-body py-5">
                            <form action="" method="POST" enctype="multipart/form-data">
                            <div class="row mb-3">
                                <label for="categorie" class="col-md-4 col-form-label text-md-end">Formations</label>
                                <div class="col-md-12">
                                    <div class="d-flex">
                                        <i class="fas fa-folder-open position-awesome"></i>
                                        <select class="custom-select px-5" name="nameformations">
                                            <option value="<?php echo $for_id ?>"><?php echo $for_nom?></option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="categorie" class="col-md-4 col-form-label text-md-end">Matières</label>
                                <div class="col-md-12">
                                    <div class="d-flex">
                                        <i class="fas fa-folder-open position-awesome"></i>
                                        <select class="custom-select px-5" name="matieres">
                                            <option value="<?php echo $formation['mat_id'] ?>"><?php echo $formation['mat_nom']?></option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="categorie" class="col-md-4 col-form-label text-md-end">Etudiants</label>
                                <div class="col-md-12">
                                    <div class="d-flex">
                                        <i class="fas fa-folder-open position-awesome"></i>
                                        <select class="custom-select px-5" name="etudiants">
                                            <option value="<?php echo $etud_id ?>"><?php echo $etud_prenom." ". $etud_nom?></option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="note" class="col-md-4 col-form-label text-md-end">Saisir la note</label>
                                <div class="col-md-6">
                                    <div class="d-flex">
                                        <i class="fas fa-poll position-awesome"></i>
                                        <input id="note" type="number" class="form-control px-5" min="0" max="20" name="note" value="<?php echo $note ?>" autocomplete="note" size="2" autofocus required>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" name="submit" class="btn btn-primary mx-3">Modifier la note</button>
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
        $data->updateNote();
    }
?>