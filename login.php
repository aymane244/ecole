<?php include_once "session.php";?>
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
        <?php 
            include_once "header.php";  
            include_once "style.php";
            include_once "scripts.php";
        ?>
        <title><?php echo $title['connexion']?></title>
    </head>
    <body>
        <?php include_once "navbar.php";?>
            <div class="container pt-5" id="top">
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
                                <h3><i class="fas fa-user"></i> <?php echo $login['connexion']?></h3>
                            </div>
                            <div class="card-body py-5">
                                <form action="" method="POST">
                                    <div class="row mb-3">
                                        <label for="cin" class="col-md-4 col-form-label text-md-end"><?php echo $login['CIN']?></label>
                                        <div class="col-md-6">
                                            <div class="d-flex">
                                                <i class="fas fa-file-alt position-awesome"></i>
                                                <input id="cin" type="text" class="form-control pl-5" name="cin" autocomplete="username" autofocus placeholder="Votre carte d'identité nationale" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="password" class="col-md-4 col-form-label text-md-end"><?php echo $login['passe']?></label>
                                        <div class="col-md-6">
                                            <div class="d-flex">
                                                <i class="fas fa-key position-awesome"></i>
                                                <input id="password" type="password" class="form-control pl-5" name="password" autocomplete="current-password" placeholder="Votre mot de passe" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-0">
                                        <div class="col-md-8 offset-md-4">
                                            <button type="submit" class="btn btn-primary" name="submit"><?php echo $login['connexion']?></button>
                                            <a href="inscription" class="px-4"><?php echo $login['inscrire']?></a>
                                        </div>
                                        <div class="col-md-8 offset-md-4 mt-3">
                                            <a href="mot-depasse-oublié"><?php echo $login['oublie']?></a>
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
    </body>
</html>