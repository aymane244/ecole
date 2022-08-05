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
            include_once "includes/header.php";  
            include_once "includes/style.php";
            include_once "includes/scripts.php";
        ?>
        <title><?php echo $title['connexion']?></title>
    </head>
    <body>
        <?php include_once "navbar.php";?>
        <div class="container pt-5" id="top">
            <?php
                if(isset($_SESSION['status_login'])){
            ?>
            <div class='alert alert-danger text-center' role='alert'><?php echo $_SESSION['status_login']?></div>
            <?php
                    unset($_SESSION['status_login']);
                }
            ?>
            <?php
                if(isset($_SESSION['status_inscription'])){
            ?>
            <div class='alert alert-success text-center' role='alert'><?php echo $_SESSION['status_inscription']?></div>
            <?php
                unset($_SESSION['status_inscription']);
                }
            ?>
            <?php
                if ($_SESSION['lang'] == "ar") {
            ?>
            <div id="error_ar"></div>
            <?php
                } else {
            ?>
            <div id="error"></div>
            <?php
                }
            ?>
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card card-position" style="box-shadow: 5px 5px 5px 5px rgba(0, 0, 0, 0.2);">
                        <div class="card-header text-center link-font">
                            <h3>
                                <?php
                                    if($_SESSION['lang'] == 'ar'){    
                                ?>
                                <?php echo $login['connexion']?> <i class="fas fa-user"></i>
                                <?php
                                    }else{
                                ?>
                                <i class="fas fa-user"></i> <?php echo $login['connexion']?>
                                <?php                
                                    }
                                ?>
                                
                            </h3>
                        </div>
                        <div class="card-body py-5">
                            <form action="" method="POST">
                                <div class="row mb-3 justify-content-center">
                                    <?php
                                        if($_SESSION['lang'] == 'ar'){
                                    ?>
                                    <div class="col-md-8">
                                        <div style="text-align: right;" dir="rtl" lang="ar">
                                            <label for="cin" class="col-md-4 col-form-label text-md-end"><?php echo $login['CIN']?></label>
                                        </div>
                                        <div style="float:right">
                                            <i class="fas fa-file-alt position-awesome-arab"></i>
                                        </div>
                                        <input id="cin" type="text" class="form-control pr-5" name="cin" dir="rtl" lang="ar" style="text-align:right;" autocomplete="username" autofocus placeholder="رقم بطاقتكم الوطنية" value="<?php echo isset($_POST['cin']) ? $_POST['cin'] : ''; ?>">
                                    </div>
                                    <?php
                                        }else{
                                    ?>
                                    <label for="cin" class="col-md-3 col-form-label text-md-end"><?php echo $login['CIN']?></label>
                                    <div class="col-md-8">
                                        <div class="d-flex">
                                            <i class="fas fa-file-alt position-awesome"></i>
                                            <input id="cin" type="text" class="form-control pl-5" name="cin" autocomplete="username" autofocus placeholder="Votre carte d'identité nationale" value="<?php echo isset($_POST['cin']) ? $_POST['cin'] : ''; ?>">
                                        </div>
                                    </div>   
                                    <?php                
                                        }
                                    ?>
                                </div>
                                <div class="row mb-3 justify-content-center">
                                    <?php
                                        if($_SESSION['lang'] == 'ar'){
                                    ?>
                                    <div class="col-md-8">
                                        <div style="text-align: right;" dir="rtl" lang="ar">
                                            <label for="password" class="col-md-4 col-form-label text-md-end"><?php echo $login['passe']?></label>
                                        </div>
                                        <div style="float:right">
                                            <i class="fas fa-key position-awesome-arab"></i>
                                        </div>
                                        <input id="password" type="password" class="form-control pr-5" dir="rtl" lang="ar" name="password" autocomplete="current-password" placeholder="كلمة المرور" style="text-align: right;">
                                        <div class="col-md-12 text-right mt-3">
                                            <a href="inscription" class="px-4"><?php echo $login['inscrire']?></a>
                                            <button type="submit" class="btn btn-primary" name="submit" id="submit_login"><?php echo $login['connexion']?></button>
                                        </div>
                                        <div class="col-md-12 mt-3 text-right">
                                            <a href="mot-depasse-oublié"><?php echo $login['oublie']?></a>
                                        </div>
                                    </div>
                                    <?php
                                        }else{
                                    ?>
                                    <label for="password" class="col-md-3 col-form-label text-md-end"><?php echo $login['passe']?></label>
                                    <div class="col-md-8">
                                        <div class="d-flex">
                                            <i class="fas fa-key position-awesome"></i>
                                            <input id="password" type="password" class="form-control pl-5" name="password" autocomplete="current-password" placeholder="Votre mot de passe">
                                        </div>
                                        <div class="col-md-12 mt-3 mr-3">
                                            <button type="submit" class="btn btn-primary" name="submit" id="submit_login"><?php echo $login['connexion']?></button>
                                            <a href="inscription" class="px-4"><?php echo $login['inscrire']?></a>
                                        </div>
                                        <div class="col-md-12 mt-3">
                                            <a href="mot-depasse-oublié"><?php echo $login['oublie']?></a>
                                        </div>
                                    </div>
                                    <?php                
                                        }
                                    ?>
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
        <?php include_once "includes/footer.php";?>
        <script>
            $("#submit_login").click(function(e){
                var cin = $("#cin").val();
                var password = $("#password").val();
                if(cin == '' && password == ''){
                    e.preventDefault();
                    $('#error').html('<div class="alert alert-danger text-center mt-2" role="alert" id="btn-fermer">Veuillez remplir tous les champs</div>');
                    $('#error_ar').html('<div class="alert alert-danger text-center mt-2" role="alert" id="btn-fermer">رجاءا اكمل جميع الحقول</div>');
                }else if(cin == ''){
                    e.preventDefault();
                    $('#error').html('<div class="alert alert-danger text-center mt-2" role="alert" id="btn-fermer">Veuillez saisir votre CIN</div>');
                    $('#error_ar').html('<div class="alert alert-danger text-center mt-2" role="alert" id="btn-fermer">الرجاء إدخال رقم البطاقة الوطنية الخاص بك</div>');
                }else if(password == ''){
                    e.preventDefault();
                    $('#error').html('<div class="alert alert-danger text-center mt-2" role="alert" id="btn-fermer">Veuillez saisir votre Mot de passe</div>');
                    $('#error_ar').html('<div class="alert alert-danger text-center mt-2" role="alert" id="btn-fermer">الرجاء إدخال كلمة المرور الخاصة بك</div>');
                }else{
                    $.post("functions/traitement.php",{cin: cin, password: password,  action:'login'}, function(result) {
                        $('#output').html(result);
                    });
                }
            })
        </script>
    </body>
</html>