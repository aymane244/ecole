<?php include_once "../session.php";?>
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
        <title>Admin</title>
    </head>
    <body>
        <div class="div-background">
            <div class="container py-4">
                <div class="text-center py-5">
                    <h2><i class="fas fa-user"></i> Connexion</h2>
                </div>
                <?php
                    if(isset($_SESSION['status'])){
                ?>
                <div class='alert alert-danger text-center' role='alert'><?php echo $_SESSION['status']?></div>
                <?php
                        unset($_SESSION['status']);
                    }
                ?>
                <?php
                    if(isset($_SESSION['success'])){
                ?>
                <div class='alert alert-success text-center' role='alert'><?php echo $_SESSION['success']?></div>
                <?php
                        unset($_SESSION['success']);
                    }
                ?>
                <div class="row justify-content-center pb-1">
                    <div class="col-md-8">
                        <div class="card card-position" style="box-shadow: 5px 5px 5px 2px rgba(0, 0, 0, 0.2);">
                            <div class="card-header text-center link-font">
                                <h3><i class="fas fa-user"></i> Connexion</h3>
                            </div>
                            <div class="card-body py-5">
                                <form action="" method="POST">
                                    <div class="row mb-3">
                                        <label for="email" class="col-md-4 col-form-label text-md-end">Email</label>
                                        <div class="col-md-6">
                                            <div class="d-flex">
                                                <i class="fas fa-envelope position-awesome"></i>
                                                <input id="email" type="email" class="form-control pl-5" name="email" autocomplete="email" placeholder="Votre nom d'utilisateur" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="pwrd" class="col-md-4 col-form-label text-md-end">Mot de passe</label>
                                        <div class="col-md-6">
                                            <div class="d-flex">
                                                <i class="fas fa-key position-awesome"></i>
                                                <input id="pwrd" type="password" class="form-control pl-5" name="pwrd" autocomplete="current-password" placeholder="Votre mot de passe" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-0">
                                        <div class="col-md-8 offset-md-4">
                                            <button type="submit" class="btn btn-primary" name="submit">Connexion</button>
                                            <a href="inscription-admin" class="px-4">S'inscrire</a>
                                            <div class="col-md-12 mt-3">
                                                <a href="mot-depasse-oublié-admin">Mot de passe oublié</a>
                                            </div>
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
    if(isset($_POST['submit'])){
        $admin->loginAdmin();
    }
?>