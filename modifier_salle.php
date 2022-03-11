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
    <title>Modifier salle</title>
</head>
<?php
    $id = $_GET['id'];
    $salles = $data->getSalle();
    foreach($salles as $salle){
        if($salle['sal_id'] == $id){
            $salle_nom = $salle['sal_nom'];
            $salle_descr = $salle['sal_desc'];
            $salle_prix = $salle['sal_prix'];
            $salle_personne = $salle['sal_personne'];    
            $image = $salle['sal_image'];
            $salle_service1 = $salle['sal_service'];
            $salle_service2 = $salle['sal_service2'];
            $salle_service3 = $salle['sal_service3'];
            $salle_service4 = $salle['sal_service4'];
            $salle_service5 = $salle['sal_service5'];
            $salle_service6 = $salle['sal_service6'];
            $salle_service7 = $salle['sal_service7'];
            $salle_service8 = $salle['sal_service8'];
        }
    }
?>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12 my-5">
                <div class="card card-position">
                    <div class="card-header text-center link-font"><i class="fas fa-edit"></i> Editer votre salle</div>
                        <div class="card-body py-5 w-100">
                            <form action="" method="POST" enctype="multipart/form-data">
                            <div class="row mb-3">
                                <label for="nom_salle" class="col-md-12 col-form-label text-md-end">Nom de salle</label>
                                <div class="col-md-12">
                                    <div class="d-flex">
                                        <i class="fas fa-poll position-awesome"></i>
                                        <input id="nom_salle" type="text" class="form-control px-5" name="nom_salle" value="<?php echo $salle_nom?>" autocomplete="titre" autofocus required>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="salle_prix" class="col-md-12 col-form-label text-md-end">Prix de la salle</label>
                                <div class="col-md-12">
                                    <div class="d-flex">
                                        <i class="fas fa-poll position-awesome"></i>
                                        <input id="salle_prix" type="text" class="form-control px-5" name="salle_prix" value="<?php echo $salle_prix?>" autocomplete="prix" autofocus required>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="salle_personne" class="col-md-12 col-form-label text-md-end">Nombre de personnes</label>
                                <div class="col-md-12">
                                    <div class="d-flex">
                                        <i class="fas fa-poll position-awesome"></i>
                                        <input id="salle_personne" type="text" class="form-control px-5" name="salle_personne" value="<?php echo $salle_personne?>" autocomplete="titre" autofocus required>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="prof" class="col-md-12 col-form-label text-md-end">Salle déscription</label>
                                <div class="col-md-12">
                                    <div class="d-flex">
                                        <i class="fas fa-arrows-alt position-awesome-cursor" id="sizer-salle" onclick="fullpage()"></i>
                                        <textarea type="text" rows="10" class="form-control position-text-area pt-5" id="zone-text" name="salle_descr" value="" autocomplete="texte" autofocus required><?php echo $salle_descr?></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="row mb-3">
                                        <label for="salle-service1" class="col-md-12 col-form-label text-md-end">Service 1</label>
                                        <div class="col-md-12">
                                            <div class="d-flex">
                                                <i class="fas fa-check position-awesome"></i>
                                                <input id="salle-service1" type="text" class="form-control px-5" value="<?php echo $salle_service1?>" name="salle_service1" autocomplete="prenom" placeholder="Service 1" autofocus>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="row mb-3">
                                        <label for="salle-service2" class="col-md-12 col-form-label text-md-end">Service 2</label>
                                        <div class="col-md-12">
                                            <div class="d-flex">
                                                <i class="fas fa-check position-awesome"></i>
                                                <input id="salle-service2" type="text" class="form-control px-5" value="<?php echo $salle_service2?>" name="salle_service2" autocomplete="nom" placeholder="Service 2" autofocus>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="row mb-3">
                                        <label for="salle-service3" class="col-md-12 col-form-label text-md-end">Service 3</label>
                                        <div class="col-md-12">
                                            <div class="d-flex">
                                                <i class="fas fa-check position-awesome"></i>
                                                <input id="salle-service3" type="text" class="form-control px-5" value="<?php echo $salle_service3?>" name="salle_service3" autocomplete="prenom" placeholder="Service 3" autofocus>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="row mb-3">
                                        <label for="salle-service4" class="col-md-12 col-form-label text-md-end">Service 4</label>
                                        <div class="col-md-12">
                                            <div class="d-flex">
                                                <i class="fas fa-check position-awesome"></i>
                                                <input id="salle-service4" type="text" class="form-control px-5" value="<?php echo $salle_service4?>" name="salle_service4" autocomplete="nom" placeholder="Service 4" autofocus>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="row mb-3">
                                        <label for="salle-service5" class="col-md-12 col-form-label text-md-end">Service 5</label>
                                        <div class="col-md-12">
                                            <div class="d-flex">
                                                <i class="fas fa-check position-awesome"></i>
                                                <input id="salle-service5" type="text" class="form-control px-5" value="<?php echo $salle_service5?>" name="salle-service5" autocomplete="prenom" placeholder="Service 5" autofocus>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="row mb-3">
                                        <label for="salle-service6" class="col-md-12 col-form-label text-md-end">Service 6</label>
                                        <div class="col-md-12">
                                            <div class="d-flex">
                                                <i class="fas fa-check position-awesome"></i>
                                                <input id="salle-service6" type="text" class="form-control px-5" value="<?php echo $salle_service6?>" name="salle-service6" autocomplete="nom" placeholder="Service 6" autofocus>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="row mb-3">
                                        <label for="salle-service7" class="col-md-12 col-form-label text-md-end">Service 7</label>
                                        <div class="col-md-12">
                                            <div class="d-flex">
                                                <i class="fas fa-check position-awesome"></i>
                                                <input id="salle-service7" type="text" class="form-control px-5" value="<?php echo $salle_service7?>" name="salle-service7" autocomplete="prenom" placeholder="Service 7" autofocus>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="row mb-3">
                                        <label for="salle-service8" class="col-md-12 col-form-label text-md-end">Service 8</label>
                                        <div class="col-md-12">
                                            <div class="d-flex">
                                                <i class="fas fa-check position-awesome"></i>
                                                <input id="salle-service8" type="text" class="form-control px-5" value="<?php echo $salle_service8?>" name="salle-service8" autocomplete="nom" placeholder="Service 8" autofocus>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="text-center">
                                <img src="<?php echo $image?>" alt="" style="width:32rem; height: 280px;">
                            </div>
                            <div class="row mb-3">
                                <label for="prof" class="col-md-12 col-form-label text-md-end">Image</label>
                                <div class="col-md-6">
                                    <div class="d-flex">
                                        <i class="fas fa-camera position-awesome-image"></i>
                                        <input id="image" type="file" class="form-control-file px-5" name="salle_image" autofocus>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-0">
                                <div class="col-md-8 offset-md-12">
                                    <button type="submit" name="submit_salle" class="btn btn-primary mx-3">Modifier article</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function fullpage(){
        document.getElementById("zone-text").classList.toggle("fulltext3")
        document.getElementById("sizer-salle").classList.toggle("fullsizer3")
    }
</script>
</body>
</html>
<?php
    if(isset($_POST['submit_salle'])){
        $data->updateSalle();
    }
?>