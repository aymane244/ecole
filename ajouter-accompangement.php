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
        <title>Ajouter un accompagenemt ISO</title>
    </head>
    <body>
        <?php include_once "navbar-admin.php";?>
        <div class="container">
            <div class="row">
                <div class="col-md-12 my-5">
                    <div class="card card-position">
                        <div class="card-header text-center link-font align-items-center"><i class="fas fa-plus-square"></i> Ajouter un accompagenemt ISO</div>
                        <div class="card-body py-5 w-100">
                            <form action="" method="POST" enctype="multipart/form-data">
                                <div class="row mb-3">
                                    <label for="iso" class="col-md-12 col-form-label text-md-end">ISO</label>
                                    <div class="col-md-12">
                                        <div class="d-flex">
                                            <i class="fas fa-poll position-awesome"></i>
                                            <input id="iso" type="text" class="form-control px-5" name="iso" value="" autocomplete="titre" autofocus required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="presentation_iso" class="col-md-12 col-form-label text-md-end">Présentation</label>
                                    <div class="col-md-12">
                                        <div class="d-flex">
                                            <textarea type="text" rows="10" class="form-control position-text-area" name="presentation_iso" value="" autocomplete="presentation" autofocus required></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-0">
                                    <div class="col-md-8 offset-md-12">
                                        <button type="submit" name="submit_iso" class="btn btn-primary mx-3">Ajouter accompagnement ISO</button>
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
<?php
    if(isset($_POST['submit_iso'])){
        $data->insertiso();
    }
?>