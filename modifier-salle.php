<?php include_once "session.php";?>
<?php
    if(!isset($_SESSION['username']) && !isset($_SESSION['pwrd'])){
        echo "<script>window.location.href='login-admin'</script>";
    }
    if(!isset($_GET['id'])){
        echo "<script>window.location.href='salles'</script>";
    }
    $id = $_GET['id'];
    $salles = $data->getSalle();
    foreach($salles as $salle){
        if($salle['sal_id'] == $id){
            $salle_nom = $salle['sal_nom'];
            $salle_nom_arab = $salle['sal_nom_arab'];
            $salle_descr = $salle['sal_desc'];
            $salle_descr_arab = $salle['sal_desc_arab'];
            $salle_prix = $salle['sal_prix'];
            $salle_personne = $salle['sal_personne'];    
            $image = $salle['sal_image'];
            $salle_service1 = $salle['sal_service'];
            $salle_service2 = $salle['sal_service2'];
            $salle_service3 = $salle['sal_service3'];
            $salle_service4 = $salle['sal_service4'];
            $salle_service1_arab = $salle['sal_service_arab'];
            $salle_service2_arab = $salle['sal_service2_arab'];
            $salle_service3_arab = $salle['sal_service3_arab'];
            $salle_service4_arab = $salle['sal_service4_arab'];
        }
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
        <title>Modifier salle</title>
    </head>
    <body>
        <?php include_once "navbar-admin.php";?>
            <div class="container">
                <div class="text-center py-3">
                    <h2><i class="fas fa-edit"></i> Modifier la salle</h2>
                </div>
                <?php
                    if(isset($_POST['submit_salle'])){
                        $data->updateSalle();
                    }
                ?>
                <div class="row justify-content-center">
                    <div class="col-md-10 my-5">
                        <div class="card card-position">
                            <div class="card-header text-center link-font"><i class="fas fa-edit"></i> Editer votre salle</div>
                            <div class="card-body py-5 w-100">
                                <form action="" method="POST" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="row mb-3">
                                                <label for="nom_salle" class="col-md-12 col-form-label text-md-end">Nom de salle</label>
                                                <div class="col-md-12">
                                                    <div class="d-flex">
                                                        <i class="fas fa-tag position-awesome"></i>
                                                        <input id="nom_salle" type="text" class="form-control pl-5" name="nom_salle" value="<?php echo $salle_nom?>" autocomplete="titre" autofocus required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="row mb-3">
                                                <label for="nom_salle_arab" class="col-md-12 col-form-label text-md-end">اسم القاعة</label>
                                                <div class="col-md-12">
                                                    <div class="d-flex">
                                                        <i class="fas fa-tag position-awesome"></i>
                                                        <input id="nom_salle_arab" type="text" class="form-control pl-5" name="nom_salle_arab" value="<?php echo $salle_nom_arab?>" autocomplete="titre" autofocus required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="row mb-3">
                                                <label for="desc" class="col-md-12 col-form-label text-md-end">Salle déscription</label>
                                                <div class="col-md-12">
                                                    <textarea rows="10" class="form-control position-text-area" id="editor" name="salle_descr" value="" autocomplete="texte" autofocus required><?php echo $salle_descr?></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="row mb-3">
                                                <label for="desc_arab" class="col-md-12 col-form-label text-md-end">وصف القاعة</label>
                                                <div class="col-md-12">
                                                    <textarea rows="10" class="form-control position-text-area" id="editor2" name="salle_descr_arab" value="" autocomplete="texte" autofocus required><?php echo $salle_descr_arab?></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="salle_prix" class="col-md-12 col-form-label text-md-end">Prix de la salle</label>
                                        <div class="col-md-12">
                                            <div class="d-flex">
                                                <i class="fas fa-dollar-sign position-awesome"></i>
                                                <input id="salle_prix" type="number" min="1" class="form-control pl-5" name="salle_prix" value="<?php echo $salle_prix?>" autocomplete="prix" autofocus required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="salle_personne" class="col-md-12 col-form-label text-md-end">Nombre de personnes</label>
                                        <div class="col-md-12">
                                            <div class="d-flex">
                                                <i class="fas fa-users position-awesome"></i>
                                                <input id="salle_personne" type="number" min="1" class="form-control pl-5" name="salle_personne" value="<?php echo $salle_personne?>" autocomplete="titre" autofocus required>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="row mb-3">
                                                <label for="salle-service1" class="col-md-12 col-form-label text-md-end">Service 1</label>
                                                <div class="col-md-12">
                                                    <div class="d-flex">
                                                        <i class="fas fa-check position-awesome"></i>
                                                        <input id="salle-service1" type="text" class="form-control pl-5" value="<?php echo $salle_service1?>" name="salle_service1" autocomplete="prenom" placeholder="Service 1" autofocus>
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
                                                        <input id="salle-service2" type="text" class="form-control pl-5" value="<?php echo $salle_service2?>" name="salle_service2" autocomplete="nom" placeholder="Service 2" autofocus>
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
                                                        <input id="salle-service3" type="text" class="form-control pl-5" value="<?php echo $salle_service3?>" name="salle_service3" autocomplete="prenom" placeholder="Service 3" autofocus>
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
                                                        <input id="salle-service4" type="text" class="form-control pl-5" value="<?php echo $salle_service4?>" name="salle_service4" autocomplete="nom" placeholder="Service 4" autofocus>
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
                                                        <input id="salle-service1_arab" type="text" class="form-control pl-5" value="<?php echo $salle_service1_arab?>" name="salle_service1_arab" autocomplete="prenom" placeholder="Service 5" autofocus>
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
                                                        <input id="salle-service2_arab" type="text" class="form-control pl-5" value="<?php echo $salle_service2_arab?>" name="salle_service2_arab" autocomplete="nom" placeholder="Service 6" autofocus>
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
                                                        <input id="salle-service3_arab" type="text" class="form-control pl-5" value="<?php echo $salle_service3_arab?>" name="salle_service3_arab" autocomplete="prenom" placeholder="Service 7" autofocus>
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
                                                        <input id="salle-service4_arab" type="text" class="form-control pl-5" value="<?php echo $salle_service4_arab?>" name="salle_service4_arab" autocomplete="nom" placeholder="Service 8" autofocus>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        
                                    </div>
                                    <div class="row mb-3 align-items-center">
                                        <label for="prof" class="col-md-12 col-form-label text-md-end">Image</label>
                                        <div class="col-md-6">
                                            <div class="d-flex">
                                                <i class="fas fa-camera position-awesome-image"></i>
                                                <input id="image" type="file" class="form-control-file pl-5" name="salle_image" autofocus>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div id="display_image" class="display_image" style="display:none;background-size:100% 100%; background-repeat:no-repeat"></div>
                                            <img src="<?php echo $image ?>" alt="" style="width:400px; height:225px" id="image_display">
                                        </div>
                                    </div>
                                    <div class="row mb-0">
                                        <div class="col-md-12 text-center">
                                            <button type="submit" name="submit_salle" class="btn btn-primary mx-3">Modifier Salle</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
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
                document.getElementById("display_image").style.display="block";
                document.getElementById("image_display").style.display="none";
            });
        </script>
    </body>
</html>
