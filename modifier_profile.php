<?php
    include_once "header.php";
    include_once "navbar.php";
    $data = new Etudiant($db);
    if(!isset($_SESSION['etud_cin']) && !isset($_SESSION['etud_motdepasse'])){
        echo "<script>window.location.href='login'</script>";
    }
?>
<?php
    $id = $_GET['id'];
    $etudiants=$data->getEtudiantFormation();
    foreach($etudiants as $etudiant){
        if($etudiant['etud_id'] == $id){
            $cin = $etudiant['etud_cin'];
            $prenom = $etudiant['etud_prenom'];
            $nom = $etudiant['etud_nom'];
            $naissance = $etudiant['etud_naissance'];
            $image = $etudiant['etud_image'];
            $phone = $etudiant['etud_telephone'];
            $date= date("Y-m-d");
            $etud_naissance = date("Y-m-d", strtotime($naissance));
            $age = date_diff(date_create($naissance), date_create($date));
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier Profile</title>
</head>
<body>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-position">
                <div class="card-header text-center link-font">
                    <h3><i class="fas fa-user-edit"></i> Modifier mon profile</h3>
                </div>
                <div class="card-body py-5">
                    <div class="text-center mb-3">
                        <?php
                            if($image == "./images/etudiants/"){
                                echo "<img src='images/etudiants/unknown_person.jpg' class='rounded-circle img-fluid' style='max-width: 5rem'>";
                            }
                        ?>
                        <img src="<?php echo $image ?>" alt="" class='rounded-circle img-fluid' style='max-width: 5rem'>
                    </div>
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="row mb-3">
                            <label for="cin" class="col-md-4 col-form-label text-md-end">CIN</label>
                            <div class="col-md-6">
                                <div class="d-flex">
                                    <i class="fas fa-file-alt position-awesome"></i>
                                    <input id="cin" type="text" class="form-control px-5" name="cin" autocomplete="cin" value="<?php echo $cin?>" placeholder="Votre carte d'identité nationale" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="prenom" class="col-md-4 col-form-label text-md-end">Prénom</label>
                            <div class="col-md-6">
                                <div class="d-flex">
                                    <i class="fas fa-user position-awesome"></i>
                                    <input id="prenom" type="text" class="form-control px-5" name="prenom" autocomplete="prenom" value="<?php echo $prenom?>" placeholder="Votre prénom" required>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="nom" class="col-md-4 col-form-label text-md-end">Nom</label>
                            <div class="col-md-6">
                                <div class="d-flex">
                                    <i class="fas fa-user position-awesome"></i>
                                    <input id="nom" type="text" class="form-control px-5" name="nom" autocomplete="nom" value="<?php echo $nom?>" placeholder="Votre nom" required>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="phone" class="col-md-4 col-form-label text-md-end">Téléphone</label>
                            <div class="col-md-6">
                                <div class="d-flex">
                                    <i class="fas fa-phone position-awesome"></i>
                                    <input id="phone" type="text" class="form-control px-5" name="phone" autocomplete="phone" value="<?php echo $phone?>" placeholder="Votre numéro de téléphone" required>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="age" class="col-md-4 col-form-label text-md-end">Age</label>
                            <div class="col-md-6">
                                <div class="d-flex">
                                    <i class="fas fa-file-alt position-awesome"></i>
                                    <input id="age" type="text" class="form-control px-5" name="age" autocomplete="age" value="<?php echo $age->format('%y');?> ans" placeholder="Votre carte d'identité nationale" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="naissance" class="col-md-4 col-form-label text-md-end">Date de naissance</label>
                            <div class="col-md-6">
                                <div class="d-flex">
                                    <i class="fas fa-calendar position-awesome"></i>
                                    <input id="naissance" type="date" class="form-control px-5" name="naissance"  value="<?php echo $naissance?>" autocomplete="naissance" required>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                                <label for="image" class="col-md-4 col-form-label text-md-end">Image</label>
                                <div class="col-md-8">
                                    <div class="d-flex">
                                        <i class="fas fa-camera position-awesome-image"></i>
                                        <input id="image" type="file" class="form-control-file px-5" name="image" autofocus>
                                    </div>
                                </div>
                            </div>
                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary" name="submit">Modifier</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
        include_once "footer.php";
    ?>
</body>
</html>
<?php
    if(isset($_POST['submit'])){
        $data->updateEtudiant();
    }
?>