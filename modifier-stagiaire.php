<?php include_once "session.php";?>
<?php
    if(!isset($_SESSION['username']) && !isset($_SESSION['pwrd'])){
        echo "<script>window.location.href='login-admin'</script>";
    }
    if(!isset($_GET['id'])){
        echo "<script>window.location.href='etudiant'</script>";
    }
    $id = $_GET['id'];
    $etudiants=$data->getEtudiantFormation();
    foreach($etudiants as $etudiant){
        if($etudiant['etud_id'] == $id){
            $cin = $etudiant['etud_cin'];
            $prenom = $etudiant['etud_prenom'];
            $prenom_arab = $etudiant['etud_prenom_arabe'];
            $nom = $etudiant['etud_nom'];
            $nom_arab = $etudiant['etud_nom_arab'];
            $email = $etudiant['etud_email'];
            $naissance = $etudiant['etud_naissance'];
            $lieu = $etudiant['etud_lieu_naissance'];
            $adress = $etudiant['etud_adress'];
            $permis = $etudiant['etud_permis'];
            $categorie = $etudiant['etud_cat_permis'];
            $pro = $etudiant['etude_carte_pro'];
            $obtenue = $etudiant['etud_permis_obt'];
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
        <?php 
            include_once "header.php";  
            include_once "style.php";
            include_once "scripts.php";
        ?>
        <title>Modifier Profile</title>
    </head>
    <body>
        <?php include_once "navbar-admin.php";?>
        <div class="container">
            <div class="text-center py-3">
                <h2><i class="fas fa-edit"></i> Modifier le stagiaire</h2>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-10 mt-5">
                    <div class="card card-position">
                    <div class="card-header text-center link-font"><i class="fas fa-edit"></i> Editer le profile</div>
                        <div class="card-body py-5">
                            <div class="text-center mb-3">
                                <div id="display_image" class="display_image_profile" style="display:none;background-size:100% 100%; background-repeat:no-repeat"></div>
                                <?php
                                    if($image == "./images/etudiants/"){
                                        echo "<img src='images/etudiants/unknown_person.jpg' class='rounded-circle img-fluid' style='max-width: 5rem' id='image_display'>";
                                    }
                                ?>
                                <img src="<?php echo $image ?>" alt="" class='rounded-circle img-fluid' style='max-width: 5rem' id='image_display'>
                            </div>
                            <form action="" method="POST" enctype="multipart/form-data">
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label for="prenom" class="col-md-12 col-form-label text-md-end">Prénom Français</label>
                                        <div class="d-flex">
                                            <i class="fas fa-user position-awesome"></i>
                                            <input id="prenom" type="text" class="form-control pl-5" name="prenom" autocomplete="prenom" value="<?php echo $prenom?>" placeholder="Votre prénom" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="nom" class="col-md-12 col-form-label text-md-end">Nom Français</label>
                                        <div class="d-flex">
                                            <i class="fas fa-user position-awesome"></i>
                                            <input id="nom" type="text" class="form-control pl-5" name="nom" autocomplete="nom" value="<?php echo $nom?>" placeholder="Votre nom" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="prenom" class="col-md-12 col-form-label text-md-end">Prénom Arabe</label>
                                        <div class="d-flex">
                                            <i class="fas fa-user position-awesome"></i>
                                            <input id="prenom" type="text" class="form-control pl-5" name="prenom_arab" autocomplete="prenom" value="<?php echo $prenom_arab?>" placeholder="Votre prénom" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="nom" class="col-md-12 col-form-label text-md-end">Nom Arabe</label>
                                        <div class="d-flex">
                                            <i class="fas fa-user position-awesome"></i>
                                            <input id="nom" type="text" class="form-control pl-5" name="nom_arab" autocomplete="nom" value="<?php echo $nom_arab?>" placeholder="Votre nom" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="cin" class="col-md-12 col-form-label text-md-end">CIN</label>
                                        <div class="d-flex">
                                            <i class="fas fa-file-alt position-awesome"></i>
                                            <input id="cin" type="text" class="form-control pl-5" name="cin" autocomplete="cin" value="<?php echo $cin?>" placeholder="Votre carte d'identité nationale">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="phone" class="col-md-12 col-form-label text-md-end">Téléphone</label>
                                        <div class="d-flex">
                                            <i class="fas fa-phone position-awesome"></i>
                                            <input id="phone" type="text" class="form-control pl-5" name="phone" autocomplete="phone" value="<?php echo $phone?>" placeholder="Votre numéro de téléphone" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="email" class="col-md-12 col-form-label text-md-end">Email</label>
                                        <div class="d-flex">
                                            <i class="fas fa-envelope position-awesome"></i>
                                            <input id="email" type="email" class="form-control pl-5" name="email" autocomplete="phone" value="<?php echo $email?>" placeholder="Votre numéro de téléphone" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="adress" class="col-md-12 col-form-label text-md-end">Adresse</label>
                                        <div class="d-flex">
                                            <i class="fas fa-map-marker-alt position-awesome"></i>
                                            <input id="adress" type="text" class="form-control pl-5" name="adress" autocomplete="adress" value="<?php echo $adress?>" placeholder="Votre numéro de téléphone" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="naissance" class="col-md-12 col-form-label text-md-end">Date de naissance</label>
                                        <div class="d-flex">
                                            <i class="fas fa-calendar position-awesome"></i>
                                            <input id="naissance" type="date" class="form-control pl-5" name="naissance" value="<?php echo $naissance?>" autocomplete="naissance" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="lieu" class="col-md-12 col-form-label text-md-end">Lieu de naissance</label>
                                        <div class="d-flex">
                                            <i class="fas fa-map-marker-alt position-awesome"></i>
                                            <input id="lieu" type="text" class="form-control pl-5" name="lieu" autocomplete="lieu" value="<?php echo $lieu;?>" placeholder="Lieu de naissance">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="age" class="col-md-12 col-form-label text-md-end">Age</label>
                                        <div class="d-flex">
                                            <i class="fas fa-user-clock position-awesome"></i>
                                            <input id="age" type="text" class="form-control pl-5" name="age" autocomplete="age" value="<?php echo $age->format('%y');?> ans" placeholder="Age" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="permis" class="col-md-12 col-form-label text-md-end">Numéro de permis</label>
                                        <div class="d-flex">
                                            <i class="fas fa-file-alt position-awesome"></i>
                                            <input id="permis" type="text" class="form-control pl-5" name="permis" autocomplete="permis" value="<?php echo $permis;?>" placeholder="Numéro de permis">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="obtenue" class="col-md-12 col-form-label text-md-end">Date d'obtention</label>
                                        <div class="d-flex">
                                            <i class="fas fa-calendar position-awesome"></i>
                                            <input id="obtenue" type="text" class="form-control pl-5" name="obtenue" autocomplete="obtenue" value="<?php echo $obtenue;?>" placeholder="Lieu de naissance">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="row mb-3">
                                            <label for="adresse" class="col-md-12 col-form-label text-md-end">Catégorie de permis</label>
                                            <div class="col-md-12">
                                                <div class="d-flex">
                                                    <i class="fas fa-bus position-awesome"></i>
                                                    <select class="custom-select px-5" name="categorie" id="categorie">
                                                        <option selected value="<?php echo $categorie?>"><?php echo $categorie?></option>
                                                        <option value="A">A</option>
                                                        <option value="B">B</option>
                                                        <option value="C">C</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="pro" class="col-md-12 col-form-label text-md-end">Numéro de la carte professionnelle</label>
                                        <div class="d-flex">
                                            <i class="fas fa-file-alt position-awesome"></i>
                                            <input id="pro" type="text" class="form-control pl-5" name="pro" autocomplete="pro" value="<?php echo $pro;?>" placeholder="Lieu de naissance">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="image" class="col-md-4 col-form-label text-md-end">Image</label>
                                        <div class="d-flex">
                                            <i class="fas fa-camera position-awesome-image"></i>
                                            <input id="image" type="file" class="form-control-file pl-5" name="image">
                                        </div>
                                        
                                    </div>
                                </div>
                                <div class="row mb-0">
                                    <div class="col-md-12 text-center">
                                        <button type="submit" class="btn btn-primary" name="submit">Modifier</button>
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
<?php
    if(isset($_POST['submit'])){
        $data->updateEtudiant();
    }
?>