<?php
    include_once "header.php";
    include_once "navbar.php";
    $data = new Etudiant($db);
?>
<?php
    $formations = $data->getformation();
    if(isset($_POST['submit'])){
        $data->checkEmailCin();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
</head>
<body>
    <div class="container mt-5">
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
                                                <input id="prenom" type="text" class="form-control px-5" name="prenom" autocomplete="prenom" placeholder="Votre prénom" autofocus required>
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
                                                <input id="nom" type="text" class="form-control px-5" name="nom" autocomplete="nom" placeholder="Votre nom" autofocus required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <div class="row mb-3">
                                        <label for="telephone" class="col-md-12 col-form-label text-md-end">Numéro de téléphone</label>
                                        <div class="col-md-12">
                                            <div class="d-flex">
                                                <i class="fas fa-phone position-awesome"></i>
                                                <input id="telephone-inscription" type="text" class="form-control px-5" name="telephone" autocomplete="telephone" placeholder="Votre numéro de téléphone" autofocus required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="row mb-3">
                                        <label for="email" class="col-md-12 col-form-label text-md-end">Email</label>
                                        <div class="col-md-12">
                                            <div class="d-flex">
                                                <i class="fas fa-envelope position-awesome"></i>
                                                <input id="email" type="email" class="form-control px-5" name="email" autocomplete="email" placeholder="Votre email" autofocus required>
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
                                                <input id="motdepasse" type="password" class="form-control px-5" name="motdepasse" placeholder="Votre mot de passe" autofocus required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="row mb-3">
                                        <label for="cin" class="col-md-12 col-form-label text-md-end">CIN</label>
                                        <div class="col-md-12">
                                            <div class="d-flex">
                                                <i class="fas fa-file-alt position-awesome"></i>
                                                <input id="cin" type="text" class="form-control px-5" name="cin" autocomplete="cin" placeholder="Votre CIN" autofocus required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="row mb-3">
                                        <label for="naissance" class="col-md-12 col-form-label text-md-end">Date de naissance</label>
                                        <div class="col-md-12">
                                            <div class="d-flex">
                                                <i class="fas fa-calendar position-awesome"></i>
                                                <input id="naissance" type="date" class="form-control px-5" name="naissance" autofocus required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="categorie" class="col-md-4 col-form-label text-md-end">Formations</label>
                                <div class="col-md-12">
                                    <div class="d-flex">
                                        <i class="fas fa-folder-open position-awesome"></i>
                                        <select class="custom-select px-5" name="formation">
                                            <option selected value="">--Choisir votre formation--</option>
                                            <?php
                                                foreach($formations as $formation){
                                            ?>
                                                <option value="<?php echo $formation['for_id'] ?>"><?php echo $formation['for_nom'] ?></option>
                                            <?php
                                                }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="diplome" class="col-md-12 col-form-label text-md-end">Diplôme</label>
                                <div class="col-md-12">
                                    <div class="d-flex">
                                        <i class="fas fa-file position-awesome-image"></i>
                                        <input id="diplome" type="file" class="form-control-file px-5" name="diplome" autofocus>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="image" class="col-md-12 col-form-label text-md-end">Image de profile (optionnelle)</label>
                                <div class="col-md-12">
                                    <div class="d-flex">
                                        <i class="fas fa-camera position-awesome-image"></i>
                                        <input id="image" type="file" class="form-control-file px-5" name="image" autofocus>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-0">
                                <div class="col-md-8">
                                    <button type="submit" class="btn btn-primary" name="submit">S'inscrire</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>