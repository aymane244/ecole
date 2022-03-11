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
    <title>Ajouter les images</title>
</head>
<?php
    $id = $_GET['id'];
    $salles = $data->getSalle();
    foreach($salles as $salle){
        if($salle['sal_id'] == $id){
            $salle_nom = $salle['sal_nom'];
            $salle_id = $salle['sal_id'];
        }
    }
?>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12 my-5">
                <div class="card card-position">
                    <div class="card-header text-center link-font align-items-center"><i class="fas fa-plus-square"></i> Ajouter images</div>
                        <div class="card-body py-5">
                            <form action="" method="POST" enctype="multipart/form-data">
                            <div class="row mb-3">
                                <label for="nom_salle" class="col-md-4 col-form-label text-md-end">Nom de la salle</label>
                                <div class="col-md-6">
                                    <div class="d-flex">
                                        <i class="fas fa-poll position-awesome"></i>
                                        <input id="nom_salle" type="text" class="form-control px-5" name="nom_salle" value="<?php echo $salle_nom?>" autocomplete="titre" autofocus required>
                                        <input id="salle_id" type="hidden" class="form-control px-5" name="salle_id" value="<?php echo $salle_id?>" autocomplete="titre" autofocus>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="image1" class="col-md-4 col-form-label text-md-end">Image 1</label>
                                <div class="col-md-6">
                                    <div class="d-flex">
                                        <i class="fas fa-camera position-awesome-image"></i>
                                        <input id="image1" type="file" class="form-control-file px-5" name="image1" autofocus>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="image2" class="col-md-4 col-form-label text-md-end">Image 2</label>
                                <div class="col-md-6">
                                    <div class="d-flex">
                                        <i class="fas fa-camera position-awesome-image"></i>
                                        <input id="image2" type="file" class="form-control-file px-5" name="image2" autofocus>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="image3" class="col-md-4 col-form-label text-md-end">Image 3</label>
                                <div class="col-md-6">
                                    <div class="d-flex">
                                        <i class="fas fa-camera position-awesome-image"></i>
                                        <input id="image3" type="file" class="form-control-file px-5" name="image3" autofocus>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="image4" class="col-md-4 col-form-label text-md-end">Image 4</label>
                                <div class="col-md-6">
                                    <div class="d-flex">
                                        <i class="fas fa-camera position-awesome-image"></i>
                                        <input id="image4" type="file" class="form-control-file px-5" name="image4" autofocus>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" name="submit_img" class="btn btn-primary mx-3">Ajouter les images</button>
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
    if(isset($_POST['submit_img'])){
        $data->insertImages();
    }
?>