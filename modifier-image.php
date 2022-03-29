<?php include_once "session.php";?>
<?php
    if(!isset($_SESSION['username']) && !isset($_SESSION['pwrd'])){
        echo "<script>window.location.href='login-admin'</script>";
    }
    if(!isset($_GET['id'])){
        echo "<script>window.location.href='salles'</script>";
    }
    $id = $_GET['id'];
    $images = $data->getImage();
    foreach($images as $image){
        if($image['img_id'] == $id){
            $salle_nom = $image['sal_nom'];
            $salle_id = $image['sal_id'];
            $image1 = $image['img1'];
            $image2 = $image['img2'];
            $image3 = $image['img3'];
            $image4 = $image['img4'];
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
        <title>Modifier les images</title>
    </head>
    <body>
        <?php include_once "navbar-admin.php";?>
        <div class="container">
            <?php
                if(isset($_SESSION['status'])){
            ?>
            <div class='alert alert-success text-center mt-2' role='alert'><?php echo $_SESSION['status']?></div>
            <?php
                    unset($_SESSION['status']);
                }
            ?>
            <div class="row">
                <div class="col-md-12 my-5">
                    <div class="card card-position">
                        <div class="card-header text-center link-font align-items-center"><i class="fas fa-plus-square"></i> Ajouter images</div>
                        <div class="card-body py-5">
                            <form action="" method="POST" enctype="multipart/form-data">
                                <div class="row mb-3">
                                    <label for="nom_salle" class="col-md-4 col-form-label text-md-end">Nom de la salle</label>
                                    <div class="col-md-6">
                                        <div class="d-flex">
                                            <i class="fas fa-poll position-awesome"></i>
                                            <input id="nom_salle" type="text" class="form-control pl-5" name="nom_salle" value="<?php echo $salle_nom?>" autocomplete="titre" autofocus required>
                                            <input id="salle_id" type="hidden" class="form-control pl-5" name="salle_id" value="<?php echo $salle_id?>" autocomplete="titre" autofocus>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="image1" class="col-md-4 col-form-label text-md-end">Image 1</label>
                                    <div class="col-md-6">
                                        <div class="d-flex">
                                            <i class="fas fa-camera position-awesome-image"></i>
                                            <input id="image1" type="file" class="form-control-file pl-5" name="image1" autofocus>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="image2" class="col-md-4 col-form-label text-md-end">Image 2</label>
                                    <div class="col-md-6">
                                        <div class="d-flex">
                                            <i class="fas fa-camera position-awesome-image"></i>
                                            <input id="image2" type="file" class="form-control-file pl-5" name="image2" autofocus>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="image3" class="col-md-4 col-form-label text-md-end">Image 3</label>
                                    <div class="col-md-6">
                                        <div class="d-flex">
                                            <i class="fas fa-camera position-awesome-image"></i>
                                            <input id="image3" type="file" class="form-control-file pl-5" name="image3" autofocus>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="image4" class="col-md-4 col-form-label text-md-end">Image 4</label>
                                    <div class="col-md-6">
                                        <div class="d-flex">
                                            <i class="fas fa-camera position-awesome-image"></i>
                                            <input id="image4" type="file" class="form-control-file pl-5" name="image4" autofocus>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-0">
                                    <div class="col-md-8 offset-md-4">
                                        <button type="submit" name="submit_img" class="btn btn-primary">Modifier les images</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <img src="<?php echo $image1?>" alt="" class="img-fluid" style="width:12rem; height:180px">
                </div>
                <div class="col-md-3">
                    <img src="<?php echo $image2?>" alt="" class="img-fluid" style="width:12rem; height:180px">
                </div>
                <div class="col-md-3">
                    <img src="<?php echo $image3?>" alt="" class="img-fluid" style="width:12rem; height:180px">
                </div>
                <div class="col-md-3">
                    <img src="<?php echo $image4?>" alt="" class="img-fluid" style="width:12rem; height:180px">
                </div>
            </div>
        </div>
    </body>
</html>
<?php
    if(isset($_POST['submit_img'])){
        $data->updateImage();
    }
?>