<?php include_once "../session.php";?>
<?php
    $formations = $data->getformation();
    $promos = $data->getPromotion();
    foreach($promos as $promo){
        $promoid = $promo['pro_id']; 
    }
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" href="../images/view/logo.png" type="image/x-icon">
        <?php 
            include_once "../includes/header.php";  
            include_once "../includes/style.php";
            include_once "../includes/scripts.php";
        ?>
        <title>Inscription</title>
    </head>
    <body>
            <div class="container pt-5">
                <?php
                    if(isset($_POST['submit'])){
                        $admin->insertAdmin();
                    }
                ?>
                <?php
                    if(isset($_SESSION['status'])){
                ?>
                <div class='alert alert-danger text-center' role='alert'><?php echo $_SESSION['status']?></div>
                <?php
                        unset($_SESSION['status']);
                    }
                ?>
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="card" style="box-shadow: 5px 5px 5px 2px rgba(0, 0, 0, 0.2);">
                            <div class="card-header text-center link-font">
                                <h3><i class="fas fa-edit"></i> Inscription</h3>
                            </div>
                            <div class="card-body py-5">
                                <form action="" method="POST" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="row mb-3">
                                                <label for="prenom" class="col-md-12 col-form-label text-md-end">Prénom</label>
                                                <div class="col-md-12">
                                                    <div class="d-flex">
                                                        <i class="fas fa-user position-awesome"></i>
                                                        <input id="prenom" type="text" class="form-control pl-5" name="prenom" autocomplete="prenom" placeholder="Votre prénom">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="row mb-3">
                                                <label for="nom" class="col-md-12 col-form-label text-md-end">Nom</label>
                                                <div class="col-md-12">
                                                    <div class="d-flex">
                                                        <i class="fas fa-user position-awesome"></i>
                                                        <input id="nom" type="text" class="form-control pl-5" name="nom" autocomplete="nom" placeholder="Votre nom">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="row mb-3">
                                                <label for="email" class="col-md-12 col-form-label text-md-end">Email</label>
                                                <div class="col-md-12">
                                                    <div class="d-flex">
                                                        <i class="fas fa-envelope position-awesome"></i>
                                                        <input id="email" type="email" class="form-control pl-5" name="email" autocomplete="email" placeholder="Votre email">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="row mb-3">
                                                <label for="motdepasse" class="col-md-12 col-form-label text-md-end">Mot de passe</label>
                                                <div class="col-md-12">
                                                    <div class="d-flex">
                                                        <i class="fas fa-lock position-awesome"></i>
                                                        <input id="motdepasse" type="password" class="form-control pl-5" name="motdepasse" placeholder="Votre mot de passe">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row justify-content-center">
                                        <div class="col-md-3 mt-3">
                                            <label for="image" class="text-md-end d-flex justify-content-center file-label py-3 rounded">
                                                <i class="fas fa-file-upload position-awesome-upload"></i> &nbsp;
                                                Image
                                            </label>
                                            <input id="image" type="file" class="form-control-file file" name="image">
                                            <div id="showimage" style="background-size:100% 100%; background-repeat:no-repeat"></div>
                                            <div id="show" class="text-center"></div>
                                            <span id='error_image_arab' class="text-danger"></span>
                                            <span id='error_image' class="text-danger"></span>
                                        </div>
                                    </div>
                                    <div class="row justify-content-center mt-3">
                                        <div class="col-md-12 text-center">
                                            <button type="submit" class="btn btn-primary" name="submit" id="submit_inscri">S'inscrire</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <script>
            const image_input = document.getElementById("image");
            var uploaded_image;
            image_input.addEventListener('change', function(event){
                var output = event.srcElement;
                var filee = output.files[0].name;
                var extension = filee.split('.').pop();
                if(extension != "jpeg" && extension != "jpg" && extension != "png"){
                    alert('Veuillez inserer un fichier de type jpg, jpeg, png, le fichier insérer est de type '+extension)
                    document.getElementById("showimage").classList.remove("showimage");
                }else{
                    const reader = new FileReader();
                    reader.addEventListener('load', () =>{
                    uploaded_image = reader.result;
                    document.getElementById("showimage").style.backgroundImage = `url(${uploaded_image})`;
                    document.getElementById("showimage").classList.add("showimage");
                });
                reader.readAsDataURL(this.files[0]);
                }
            });
        </script>
            <script>
            var input = document.getElementById('image');
            var infoArea = document.getElementById("show");
            input.addEventListener('change', displayfilename);
            function displayfilename(e){    
                var input = e.srcElement;
                var filName = input.files[0].name;
                var extension = filName.split('.').pop();
                if(extension != "png" && extension != "jpg" && extension != "jpeg"){
                    infoArea.innerHTML = '';
                }else{
                    infoArea.textContent = filName;
                }
            }
        </script>
    </body>
</html>