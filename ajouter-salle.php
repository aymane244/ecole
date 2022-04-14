<?php include_once "session.php";?>
<?php
    if(!isset($_SESSION['username']) && !isset($_SESSION['pwrd'])){
        echo "<script>window.location.href='login-admin'</script>";
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <?php 
            include_once "header.php";  
            include_once "style.php";
            include_once "scripts.php";
        ?>
        <title>Ajouter une salle</title>
    </head>
    <body>
        <?php include_once "navbar-admin.php";?>
            <div class="container">
                <div class="text-center py-5">
                    <h2><i class="fas fa-plus-square"></i> Ajouter une salle</h2>
                </div>
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="row">    
                        <div class="col-md-12 my-5">
                            <h3 class="text-center mb-3">Ajout en Français</h3>
                            <div class="card card-position">
                                <div class="card-header text-center link-font align-items-center"><i class="fas fa-plus-square"></i> Ajouter une salle</div>
                                <div class="card-body py-5 w-100">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="row mb-3">
                                                <label for="titre" class="col-md-12 col-form-label text-md-end">Nom de la salle</label>
                                                <div class="col-md-12">
                                                    <div class="d-flex">
                                                        <i class="fas fa-tag position-awesome"></i>
                                                        <input id="titre" type="text" class="form-control pl-5" name="nom_salle" value="" autocomplete="titre" autofocus placeholder="Nom de la salle" required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="row mb-3">
                                                <label for="titre_arab" class="col-md-12 col-form-label text-md-end">اسم القاعة</label>
                                                <div class="col-md-12">
                                                    <div class="d-flex">
                                                        <i class="fas fa-tag position-awesome"></i>
                                                        <input id="titre_arab" type="text" class="form-control pl-5" name="nom_salle_arab" value="" autocomplete="titre" placeholder="اسم القاعة" autofocus required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="row mb-3">
                                                <label for="desc" class="col-md-12 col-form-label text-md-end">Description</label>
                                                <div class="col-md-12">
                                                    <textarea id="editor" type="text" rows="10" class="form-control position-text-area" name="salle_desc" value="" autocomplete="texte" autofocus required></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="row mb-3">
                                                <label for="desc_arab" class="col-md-12 col-form-label text-md-end">وصف القاعة</label>
                                                <div class="col-md-12">
                                                    <textarea id="editor2" type="text" rows="10" class="form-control position-text-area" name="salle_desc_arab" value="" autocomplete="texte" autofocus required></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="salle_prix" class="col-md-12 col-form-label text-md-end">Prix de la salle</label>
                                        <div class="col-md-12">
                                            <div class="d-flex">
                                                <i class="fas fa-dollar-sign position-awesome"></i>
                                                <input id="salle_prix" type="number" class="form-control pl-5" name="salle_prix" autocomplete="prix" min="1" placeholder="Prix" autofocus required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="salle_personne" class="col-md-12 col-form-label text-md-end">Nombre de personnes</label>
                                        <div class="col-md-12">
                                            <div class="d-flex">
                                                <i class="fas fa-users position-awesome"></i>
                                                <input id="salle_personne" type="number" class="form-control pl-5" name="salle_personne" autocomplete="titre" placeholder="Personnes" min="1" autofocus required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-3">
                                            <div class="row mb-3">
                                                <label for="salle-service1" class="col-md-12 col-form-label text-md-end">Service 1</label>
                                                <div class="col-md-12">
                                                    <div class="d-flex">
                                                        <i class="fas fa-check position-awesome"></i>
                                                        <input id="salle-service1" type="text" class="form-control pl-5" name="salle_service1" autocomplete="prenom" placeholder="Service 1" autofocus>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="row mb-3">
                                                <label for="salle-service2" class="col-md-12 col-form-label text-md-end">Service 2</label>
                                                <div class="col-md-12">
                                                    <div class="d-flex">
                                                        <i class="fas fa-check position-awesome"></i>
                                                        <input id="salle-service2" type="text" class="form-control pl-5" name="salle_service2" autocomplete="nom" placeholder="Service 2" autofocus>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="row mb-3">
                                                <label for="salle-service3" class="col-md-12 col-form-label text-md-end">Service 3</label>
                                                <div class="col-md-12">
                                                    <div class="d-flex">
                                                        <i class="fas fa-check position-awesome"></i>
                                                        <input id="salle-service3" type="text" class="form-control pl-5" name="salle_service3" autocomplete="prenom" placeholder="Service 3" autofocus>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="row mb-3">
                                                <label for="salle-service4" class="col-md-12 col-form-label text-md-end">Service 4</label>
                                                <div class="col-md-12">
                                                    <div class="d-flex">
                                                        <i class="fas fa-check position-awesome"></i>
                                                        <input id="salle-service4" type="text" class="form-control pl-5" name="salle_service4" autocomplete="nom" placeholder="Service 4" autofocus>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="row mb-3">
                                                <label for="salle-service1_arab" class="col-md-12 col-form-label text-md-end">خدمة 1</label>
                                                <div class="col-md-12">
                                                    <div class="d-flex">
                                                        <i class="fas fa-check position-awesome"></i>
                                                        <input id="salle-service1_arab" type="text" class="form-control pl-5" name="salle_service1_arab" autocomplete="nom" placeholder="خدمة 1" autofocus>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="row mb-3">
                                                <label for="salle-service2_arab" class="col-md-12 col-form-label text-md-end">خدمة 2</label>
                                                <div class="col-md-12">
                                                    <div class="d-flex">
                                                        <i class="fas fa-check position-awesome"></i>
                                                        <input id="salle-service2_arab" type="text" class="form-control pl-5" name="salle_service2_arab" autocomplete="nom" placeholder="خدمة 2" autofocus>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="row mb-3">
                                                <label for="salle-service3_arab" class="col-md-12 col-form-label text-md-end">خدمة 3</label>
                                                <div class="col-md-12">
                                                    <div class="d-flex">
                                                        <i class="fas fa-check position-awesome"></i>
                                                        <input id="salle-service3_arab" type="text" class="form-control pl-5" name="salle_service3_arab" autocomplete="nom" placeholder="خدمة 3" autofocus>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="row mb-3">
                                                <label for="salle-service4_arab" class="col-md-12 col-form-label text-md-end">خدمة 4</label>
                                                <div class="col-md-12">
                                                    <div class="d-flex">
                                                        <i class="fas fa-check position-awesome"></i>
                                                        <input id="salle-service4_arab" type="text" class="form-control pl-5" name="salle_service4_arab" autocomplete="nom" placeholder="خدمة 4" autofocus>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3 align-items-center">
                                        <label for="prof" class="col-md-12 col-form-label text-md-end">Image</label>
                                        <div class="col-md-6">
                                            <div class="d-flex">
                                                <i class="fas fa-camera position-awesome-image"></i>
                                                <input id="image" type="file" class="form-control-file pl-5" name="salle_image" autofocus required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div id="display_image" class="display_image"></div>
                                        </div>
                                    </div>
                                    <div class="row mb-0">
                                        <div class="col-md-12 text-center">
                                            <button type="submit" name="submit_salle" class="btn btn-primary">Ajouter une salle</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        <script>
            CKEDITOR.replace('editor');
            CKEDITOR.replace('editor2');
        </script>
        <script>
            const image_input = document.getElementById("image");
            var uploaded_image;
            image_input.addEventListener('change', function(){
                const reader = new FileReader();
                reader.addEventListener('load', () =>{
                    uploaded_image = reader.result;
                    document.getElementById("display_image").style.backgroundImage = `url(${uploaded_image})`;
                });
                reader.readAsDataURL(this.files[0]);
            });
        </script>
    </body>
</html>
<?php
    if(isset($_POST['submit_salle'])){
        $data->insertSalle();
    }
?>