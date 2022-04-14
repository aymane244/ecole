<?php include_once "session.php";?>
<?php
    $formations = $data->getformation();
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
        <title><?php echo $title['inscription']?></title>
    </head>
    <body>
        <?php include_once "navbar.php";?>
            <div class="container pt-5" id="top">
                <?php
                    if(isset($_POST['submit'])){
                        $data->checkEmailCin();
                        //mkdir("test",0777,true);
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
                <?php
                    if(isset($_SESSION['status_login'])){
                        /* $to = $_POST['email'];
                        $subject = "Confirmation d'inscription";
                        $headers = 'Content-type: text/html';
                        $msg = "<center><h1>Confirmation d'inscription</h1><br>
                                <p><b>Merci d'avoir choisit notre institut.<br>
                                Veuillez trouvez ci-dessous vos identifiants:
                                <p> idenatidiant: ".$_POST['cin']."</p>
                                <br>Mot de passe: ".$_POST['motdepasse']."<br>
                                Pour plus d'information merci de visiter notre .<br><br>
                                <a href='http://localhost/ecole/'>Click here</a><b></p></center>";
                        mail($to, $subject, $msg, $headers);*/
                ?>
                <div class='alert alert-success text-center' role='alert'><?php echo $_SESSION['status_login']?></div>
                <?php
                        unset($_SESSION['status_login']);
                    }
                ?>
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="card">
                            <div class="card-header text-center link-font">
                                <h3><i class="fas fa-edit"></i> <?php echo $inscription['inscription']?></h3>
                            </div>
                            <div class="card-body py-5">
                                <form action="" method="POST" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="row mb-3">
                                                <label for="prenom" class="col-md-12 col-form-label text-md-end">Prénom (en français)</label>
                                                <div class="col-md-12">
                                                    <div class="d-flex">
                                                        <i class="fas fa-user position-awesome"></i>
                                                        <input id="prenom" type="text" class="form-control pl-5" name="prenom" autocomplete="prenom" placeholder="Votre prénom" autofocus required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="row mb-3">
                                                <label for="nom" class="col-md-12 col-form-label text-md-end">Nom (en français)</label>
                                                <div class="col-md-12">
                                                    <div class="d-flex">
                                                        <i class="fas fa-user position-awesome"></i>
                                                        <input id="nom" type="text" class="form-control pl-5" name="nom" autocomplete="nom" placeholder="Votre nom" autofocus required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="row mb-3">
                                                <label for="prenom_arab" class="col-md-12 col-form-label text-md-end">(بالعربية) الاسم الشخصي</label>
                                                <div class="col-md-12">
                                                    <div class="d-flex">
                                                        <i class="fas fa-user position-awesome"></i>
                                                        <input id="prenom_arab" type="text" class="form-control pl-5" name="prenom_arab" autocomplete="prenom" placeholder="الاسم الشخصي" autofocus required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="row mb-3">
                                                <label for="nom_arab" class="col-md-12 col-form-label text-md-end">(بالعربية) الاسم العائلي</label>
                                                <div class="col-md-12">
                                                    <div class="d-flex">
                                                        <i class="fas fa-user position-awesome"></i>
                                                        <input id="nom_arab" type="text" class="form-control pl-5" name="nom_arab" autocomplete="nom_arab" placeholder="الاسم العائلي" autofocus required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="row mb-3">
                                                <label for="email" class="col-md-12 col-form-label text-md-end"><?php echo $inscription['email']?></label>
                                                <div class="col-md-12">
                                                    <div class="d-flex">
                                                        <i class="fas fa-envelope position-awesome"></i>
                                                        <input id="email" type="email" class="form-control pl-5" name="email" autocomplete="email" placeholder="Votre email" autofocus required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="row mb-3">
                                                <label for="motdepasse" class="col-md-12 col-form-label text-md-end"><?php echo $inscription['passe']?></label>
                                                <div class="col-md-12">
                                                    <div class="d-flex">
                                                        <i class="fas fa-lock position-awesome"></i>
                                                        <input id="motdepasse" type="password" class="form-control pl-5" name="motdepasse" placeholder="Votre mot de passe" autofocus required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="row mb-3">
                                                <label for="naissance" class="col-md-12 col-form-label text-md-end"><?php echo $inscription['date']?></label>
                                                <div class="col-md-12">
                                                    <div class="d-flex">
                                                        <i class="fas fa-calendar position-awesome"></i>
                                                        <input id="naissance" type="date" class="form-control pl-5" name="naissance" autofocus required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="row mb-3">
                                                <label for="lieu" class="col-md-12 col-form-label text-md-end"><?php echo $inscription['lieu']?></label>
                                                <div class="col-md-12">
                                                    <div class="d-flex">
                                                        <i class="fas fa-map-marker-alt position-awesome"></i>
                                                        <input id="lieu" type="text" class="form-control pl-5" name="lieu" placeholder='Lieu de naissance' autofocus required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="row mb-3">
                                                <label for="cin" class="col-md-12 col-form-label text-md-end"><?php echo $inscription['cin']?></label>
                                                <div class="col-md-12">
                                                    <div class="d-flex">
                                                        <i class="fas fa-file-alt position-awesome"></i>
                                                        <input id="cin" type="text" class="form-control pl-5" name="cin" autocomplete="cin" placeholder="Votre CIN" autofocus required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="row mb-3">
                                                <label for="telephone" class="col-md-12 col-form-label text-md-end"><?php echo $inscription['telephone']?></label>
                                                <div class="col-md-12">
                                                    <div class="d-flex">
                                                        <i class="fas fa-phone position-awesome"></i>
                                                        <input id="telephone-inscription" type="text" class="form-control pl-5" name="telephone" autocomplete="telephone" placeholder="Votre numéro de téléphone" autofocus required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="row mb-3">
                                                <label for="adresse" class="col-md-12 col-form-label text-md-end"><?php echo $inscription['adresse']?></label>
                                                <div class="col-md-12">
                                                    <div class="d-flex">
                                                        <i class="fas fa-map-marker-alt position-awesome"></i>
                                                        <input id="adresse" type="text" class="form-control pl-5" name="adresse" autocomplete="adresse" placeholder="Votre Adresse" autofocus required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <label for="categorie" class="col-md-4 col-form-label text-md-end"><?php echo $inscription['formation']?></label>
                                        <div class="col-md-12 mb-3">
                                            <div class="d-flex">
                                                <i class="fas fa-folder-open position-awesome"></i>
                                                <select class="custom-select px-5" name="formation" onchange="affichage()" id="formation">
                                                    <option selected value="">--<?php echo $inscription['choisir']?>--</option>
                                                    <?php
                                                        foreach($formations as $formation){
                                                    ?>
                                                    <option value="<?php echo $formation['for_id'] ?>">
                                                        <?php
                                                            if($_SESSION['lang'] =="ar"){
                                                        ?>
                                                        <?php echo $formation['for_nom_arab'] ?>
                                                        <?php    
                                                            }else{
                                                        ?>
                                                        <?php echo $formation['for_nom'] ?>
                                                        <?php      
                                                            }
                                                        ?>
                                                    </option>
                                                    <?php
                                                        }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="row mb-3">
                                                <label for="permis" class="col-md-12 col-form-label text-md-end"><?php echo $inscription['permis']?></label>
                                                <div class="col-md-12">
                                                    <div class="d-flex">
                                                        <i class="fas fa-id-badge position-awesome"></i>
                                                        <input id="permis" type="text" class="form-control pl-5" name="permis" autocomplete="permis" placeholder="Votre numéro de permis" autofocus required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="row mb-3">
                                                <label for="adresse" class="col-md-12 col-form-label text-md-end"><?php echo $inscription['categorie']?></label>
                                                <div class="col-md-12">
                                                    <div class="d-flex">
                                                        <i class="fas fa-bus position-awesome"></i>
                                                        <select class="custom-select px-5" name="categorie" id="categorie">
                                                            <option selected value="">--<?php echo $inscription['categorie_permis']?>--</option>
                                                            <option value="A">A</option>
                                                            <option value="B">B</option>
                                                            <option value="C">C</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="row mb-3">
                                                <label for="obtenir" class="col-md-12 col-form-label text-md-end"><?php echo $inscription['obtention']?></label>
                                                <div class="col-md-12">
                                                    <div class="d-flex">
                                                        <i class="fas fa-calendar position-awesome"></i>
                                                        <input id="obtenir" type="date" class="form-control pl-5" name="obtenir" autocomplete="obtenir" autofocus required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-5" id="div-carte" style="display:none;">
                                            <div class="row mb-3">
                                                <label for="profesionnel" class="col-md-12 col-form-label text-md-end"><?php echo $inscription['profesionnel']?></label>
                                                <div class="col-md-12">
                                                    <div class="d-flex">
                                                        <i class="fas fa-address-card position-awesome"></i>
                                                        <input id="profesionnel" type="text" class="form-control pl-5" name="profesionnel" autocomplete="profesionnel" placeholder="Votre numéro de la carte professionelle" autofocus>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3 mt-3">
                                            <label for="scan_cin" class="text-md-end d-flex justify-content-center file-label py-3 rounded">
                                                <i class="fas fa-file-upload position-awesome-upload"></i> &nbsp;
                                                <?php echo $inscription['scan_cin']?>
                                            </label>
                                            <input id="scan_cin" type="file" class="form-control-file file" name="scan_cin" autofocus required>
                                            <div id="showimage4" class="showpdf"></div>
                                            <div id="show4" class="text-center"></div>
                                        </div>
                                        <div class="col-md-3 mt-3">
                                                <label for="scan_permis" class="text-md-end d-flex justify-content-center file-label py-3 rounded">
                                                <i class="fas fa-file-upload position-awesome-upload"></i> &nbsp;
                                                <?php echo $inscription['scan_permis']?>
                                            </label>
                                            <input id="scan_permis" type="file" class="form-control-file file" name="scan_permis" autofocus required>
                                            <div id="showimage3" class="showpdf"></div>
                                            <div id="show3" class="text-center"></div>
                                        </div>
                                        <div class="col-md-3 mt-3">
                                            <label for="scan_visite" class="text-md-end d-flex justify-content-center file-label py-3 rounded">
                                                <i class="fas fa-file-upload position-awesome-upload"></i> &nbsp;
                                                <?php echo $inscription['scan_visite']?>
                                            </label>
                                            <input id="scan_visite" type="file" class="form-control-file file" name="scan_visite" autofocus required>
                                            <div id="showimage2" class="showpdf"></div>
                                            <div id="show2" class="text-center"></div>
                                        </div>
                                        <div class="col-md-3 mt-3">
                                            <label for="image" class="text-md-end d-flex justify-content-center file-label py-3 rounded">
                                                <i class="fas fa-file-upload position-awesome-upload"></i> &nbsp;
                                                <?php echo $inscription['image']?>
                                            </label>
                                            <input id="image" type="file" class="form-control-file file" name="image" autofocus>
                                            <div id="showimage"></div>
                                            <div id="show" class="text-center"></div>
                                        </div>
                                    </div>
                                    <div class="row justify-content-center mt-3">
                                        <div class="col-md-12 text-center">
                                            <input type="hidden" name="promos" value="1">
                                            <button type="submit" class="btn btn-primary" name="submit"><?php echo $inscription['inscrire']?></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="div-btn fixed-bottom mb-2 mx-2" id="div-btn">
                <a href="#top" class="btn-top px-3 float-right py-2 rounded"><i class="fas fa-long-arrow-alt-up text-white"></i></a>
            </div>
            <?php include_once "footer.php";?>
        <script>
            function affichage(){
                if(document.getElementById('formation').value == 2){
                    document.getElementById('div-carte').style.display ="block";
                }else{
                    document.getElementById('div-carte').style.display ="none";
                }
            }
        </script>
        <script>
            const scan_cin = document.getElementById("scan_cin");
            scan_cin.addEventListener('change', function(event){
                var output = event.srcElement;
                var filee = output.files[0].name;
                var extension = filee.split('.').pop();
                if(extension != "pdf"){
                    alert('Veuillez inserer un fichier de type pdf, le fichier insérer est de type '+extension)
                }else{
                    const reader = new FileReader();
                reader.addEventListener('load', () =>{
                    document.getElementById("showimage4").style.backgroundImage = `url('images/Untitled-2.png')`;
                });
                reader.readAsDataURL(this.files[0]);
                }

            });
        </script>
        <script>
            const scan_permis = document.getElementById("scan_permis");
            scan_permis.addEventListener('change', function(event){
                var output = event.srcElement;
                var filee = output.files[0].name;
                var extension = filee.split('.').pop();
                if(extension != "pdf"){
                    alert('Veuillez inserer un fichier de type pdf, le fichier insérer est de type '+extension)
                }else{
                    const reader = new FileReader();
                reader.addEventListener('load', () =>{
                    document.getElementById("showimage3").style.backgroundImage = `url('images/Untitled-2.png')`;
                });
                reader.readAsDataURL(this.files[0]);
                }
            });
        </script>
        <script>
            const scan_visite = document.getElementById("scan_visite");
            scan_visite.addEventListener('change', function(event){
                var output = event.srcElement;
                var filee = output.files[0].name;
                var extension = filee.split('.').pop();
                if(extension != "pdf"){
                    alert('Veuillez inserer un fichier de type pdf, le fichier insérer est de type '+extension)
                }else{
                    const reader = new FileReader();
                reader.addEventListener('load', () =>{
                    document.getElementById("showimage2").style.backgroundImage = `url('images/Untitled-2.png')`;
                });
                reader.readAsDataURL(this.files[0]);
                }
            });
        </script>
        <script>
            const image_input = document.getElementById("image");
            var uploaded_image;
            image_input.addEventListener('change', function(event){
                var output = event.srcElement;
                var filee = output.files[0].name;
                var extension = filee.split('.').pop();
                if(extension != "jpeg" && extension != "jpg" && extension != "png"){
                    alert('Veuillez inserer un fichier de type png, jpg ou jpeg, le fichier insérer est de type '+extension);
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
            var input_cin = document.getElementById('scan_cin');
            var infoArea_cin = document.getElementById("show4");
            input_cin.addEventListener('change', displayfilenamecin);
            function displayfilenamecin(e){
                var input_cin = e.srcElement;
                var filName = input_cin.files[0].name;
                var extension = filName.split('.').pop();
                if(extension != "pdf"){
                    infoArea_cin.innerHTML = '';
                }else{
                    infoArea_cin.textContent = filName;
                }
            }
        </script>
        <script>
            var input_permis = document.getElementById('scan_permis');
            var infoArea_permis = document.getElementById("show3");
            input_permis.addEventListener('change', displayfilenamepermis);
            function displayfilenamepermis(e){
                var input_permis = e.srcElement;
                var filName = input_permis.files[0].name;
                var extension = filName.split('.').pop();
                if(extension != "pdf"){
                    infoArea_permis.innerHTML = '';
                }else{
                    infoArea_permis.textContent = filName;
                }
            }
        </script>
        <script>
            var input_visite = document.getElementById('scan_visite');
            var infoArea_visite = document.getElementById("show2");
            input_visite.addEventListener('change', displayfilenamevisite);
            function displayfilenamevisite(e){
                var input_visite = e.srcElement;
                var filName = input_visite.files[0].name;
                var extension = filName.split('.').pop();
                if(extension != "pdf"){
                    infoArea_visite.innerHTML = '';
                }else{
                    infoArea_visite.textContent = filName;
                }
            }
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