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
    <title>Ajouter une salle</title>
</head>
<?php
    if(isset($_POST['submit_salle'])){
        $data->insertSalle();
    }
?>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12 my-5">
                <div class="card card-position">
                    <div class="card-header text-center link-font align-items-center"><i class="fas fa-plus-square"></i> Ajouter une salle</div>
                        <div class="card-body py-5 w-100">
                            <form action="" method="POST" enctype="multipart/form-data">
                            <div class="row mb-3">
                                <label for="titre" class="col-md-12 col-form-label text-md-end">Nom de la salle</label>
                                <div class="col-md-12">
                                    <div class="d-flex">
                                        <i class="fas fa-poll position-awesome"></i>
                                        <input id="titre" type="text" class="form-control px-5" name="nom_salle" value="" autocomplete="titre" autofocus required>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="prof" class="col-md-12 col-form-label text-md-end">Description</label>
                                <div class="col-md-12">
                                    <div class="d-flex">
                                        <i class="fas fa-arrows-alt position-awesome-cursor" id="sizer-salle" onclick="fullpage()"></i>
                                        <textarea id="texte" type="text" rows="10" class="form-control position-text-area pt-5" name="salle_desc" value="" autocomplete="texte" autofocus required></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="salle_prix" class="col-md-12 col-form-label text-md-end">Prix de la salle</label>
                                <div class="col-md-12">
                                    <div class="d-flex">
                                        <i class="fas fa-poll position-awesome"></i>
                                        <input id="salle_prix" type="number" class="form-control px-5" name="salle_prix" autocomplete="prix" autofocus required>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="salle_personne" class="col-md-12 col-form-label text-md-end">Nombre de personnes</label>
                                <div class="col-md-12">
                                    <div class="d-flex">
                                        <i class="fas fa-poll position-awesome"></i>
                                        <input id="salle_personne" type="number" class="form-control px-5" name="salle_personne" autocomplete="titre" autofocus required>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="prof" class="col-md-4 col-form-label text-md-end">Image</label>
                                <div class="col-md-6">
                                    <div class="d-flex">
                                        <i class="fas fa-camera position-awesome-image"></i>
                                        <input id="image" type="file" class="form-control-file px-5" name="salle_image" autofocus required>
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
                                                <input id="salle-service1" type="text" class="form-control px-5" name="salle_service1" autocomplete="prenom" placeholder="Service 1" autofocus>
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
                                                <input id="salle-service2" type="text" class="form-control px-5" name="salle_service2" autocomplete="nom" placeholder="Service 2" autofocus>
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
                                                <input id="salle-service3" type="text" class="form-control px-5" name="salle_service3" autocomplete="prenom" placeholder="Service 3" autofocus>
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
                                                <input id="salle-service4" type="text" class="form-control px-5" name="salle_service4" autocomplete="nom" placeholder="Service 4" autofocus>
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
                                                <input id="salle-service5" type="text" class="form-control px-5" name="salle-service5" autocomplete="prenom" placeholder="Service 5" autofocus>
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
                                                <input id="salle-service6" type="text" class="form-control px-5" name="salle-service6" autocomplete="nom" placeholder="Service 6" autofocus>
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
                                                <input id="salle-service7" type="text" class="form-control px-5" name="salle-service7" autocomplete="prenom" placeholder="Service 7" autofocus>
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
                                                <input id="salle-service8" type="text" class="form-control px-5" name="salle-service8" autocomplete="nom" placeholder="Service 8" autofocus>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-0">
                                <div class="col-md-8 offset-md-12">
                                    <button type="submit" name="submit_salle" class="btn btn-primary mx-3">Ajouter une salle</button>
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
        document.getElementById("texte").classList.toggle("fulltext")
        document.getElementById("sizer-salle").classList.toggle("fullsizer")
    }
</script>
</body>
</html>
