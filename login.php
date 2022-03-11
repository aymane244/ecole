<?php
    include_once "header.php";
    include_once "navbar.php";
    $data = new Etudiant($db);
?>
<?php
    if(isset($_POST['submit'])){
        $etudiants = $data->getEtudiantCinPwd();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log in</title>
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
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-position">
                <div class="card-header text-center link-font">
                    <h3><i class="fas fa-user"></i> Login</h3>
                </div>
                <div class="card-body py-5">
                    <form action="" method="POST">
                        <div class="row mb-3">
                            <label for="cin" class="col-md-4 col-form-label text-md-end">CIN</label>
                            <div class="col-md-6">
                                <div class="d-flex">
                                    <i class="fas fa-file-alt position-awesome"></i>
                                    <input id="cin" type="text" class="form-control px-5" name="cin" autocomplete="username" autofocus placeholder="Votre carte d'identité nationale" required>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">Mot de passe</label>
                            <div class="col-md-6">
                                <div class="d-flex">
                                    <i class="fas fa-key position-awesome"></i>
                                    <input id="password" type="password" class="form-control px-5" name="password" autocomplete="current-password" placeholder="Votre mot de passe" required>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary" name="submit">Login</button>
                                <a href="inscription" class="px-4">S'inscrire Ici</a>
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