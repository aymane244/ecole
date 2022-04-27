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
            <div class="text-center py-3">
                <h2><i class="fas fa-edit"></i> Modifier les images</h2>
            </div>
            <?php
                if(isset($_POST['submit_img'])){
                    $data->updateImage();
                }
            ?>
            <?php
                if(isset($_SESSION['status'])){
            ?>
            <div class='alert alert-success text-center mt-3' role='alert'><?php echo $_SESSION['status']?></div>
            <?php
                    unset($_SESSION['status']);
                }
            ?>
            <div class="row justify-content-center">
                <div class="col-md-10 my-5 justify-content-center">
                    <div class="card card-position">
                        <div class="card-header text-center link-font align-items-center"><i class="fas fa-edit"></i> Editer les images</div>
                        <div class="card-body py-5">
                            <form action="" method="POST" enctype="multipart/form-data">
                                <div class="row mb-3 justify-content-center">
                                    <div class="col-md-10">
                                        <label for="image1" class="col-md-4 col-form-label text-md-end">Image 1</label>
                                        <div class="d-flex">
                                            <i class="fas fa-camera position-awesome-image"></i>
                                            <input id="image" type="file" class="form-control-file pl-5" name="image1">
                                        </div>
                                    </div>
                                    <div class="col-md-10">
                                        <label for="image2" class="col-md-4 col-form-label text-md-end">Image 2</label>
                                        <div class="d-flex">
                                            <i class="fas fa-camera position-awesome-image"></i>
                                            <input id="image2" type="file" class="form-control-file pl-5" name="image2">
                                        </div>
                                    </div>
                                    <div class="col-md-10">
                                        <label for="image3" class="col-md-4 col-form-label text-md-end">Image 3</label>
                                        <div class="d-flex">
                                            <i class="fas fa-camera position-awesome-image"></i>
                                            <input id="image3" type="file" class="form-control-file pl-5" name="image3">
                                        </div>
                                    </div>
                                    <div class="col-md-10">
                                        <label for="image4" class="col-md-4 col-form-label text-md-end">Image 4</label>
                                        <div class="d-flex">
                                            <i class="fas fa-camera position-awesome-image"></i>
                                            <input id="image4" type="file" class="form-control-file pl-5" name="image4">
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-0 mt-3">
                                    <div class="col-md-3">
                                        <div id="display_image" style="display:none;background-size:100% 100%; background-repeat:no-repeat"></div>
                                        <img src="<?php echo $image1?>" alt="" class="img-fluid" style="width:12rem; height:180px" id="image_display">
                                    </div>
                                    <div class="col-md-3">
                                        <div id="display_image2" style="display:none;background-size:100% 100%; background-repeat:no-repeat"></div>
                                        <img src="<?php echo $image2?>" alt="" class="img-fluid" style="width:12rem; height:180px" id="image_display2">
                                    </div>
                                    <div class="col-md-3">
                                    <div id="display_image3" style="display:none;background-size:100% 100%; background-repeat:no-repeat"></div>
                                        <img src="<?php echo $image3?>" alt="" class="img-fluid" style="width:12rem; height:180px" id="image_display3">
                                    </div>
                                    <div class="col-md-3">
                                    <div id="display_image4" style="display:none;background-size:100% 100%; background-repeat:no-repeat"></div>
                                        <img src="<?php echo $image4?>" alt="" class="img-fluid" style="width:12rem; height:180px"  id="image_display4">
                                    </div>
                                    <div class="col-md-12 mt-3 text-center">
                                        <button type="submit" name="submit_img" class="btn btn-primary">Modifier les images</button>
                                    </div>
                                </div>
                                <input id="salle_id" type="hidden" class="form-control pl-5" name="salle_id" value="<?php echo $salle_id?>" autocomplete="titre">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>
            const image_input = document.getElementById("image");
            const image_input2 = document.getElementById("image2");
            const image_input3 = document.getElementById("image3");
            const image_input4 = document.getElementById("image4");
            var uploaded_image;
            image_input.addEventListener('change', function(event){
                var output = event.srcElement;
                var filee = output.files[0].name;
                var extension = filee.split('.').pop();
                const reader = new FileReader();
                reader.addEventListener('load', (event) =>{
                    uploaded_image = reader.result;
                    document.getElementById("display_image").style.backgroundImage = `url(${uploaded_image})`;
                    document.getElementById("display_image").classList.add("display_image_salle");
                    document.getElementById("display_image").style.display="block";
                    document.getElementById("image_display").style.display="none";
                });
                reader.readAsDataURL(this.files[0]);
            });
            image_input2.addEventListener('change', function(event){
                const reader = new FileReader();
                reader.addEventListener('load', () =>{
                    uploaded_image = reader.result;
                    document.getElementById("display_image2").style.backgroundImage = `url(${uploaded_image})`;
                    document.getElementById("display_image2").classList.add("display_image_salle");
                    document.getElementById("display_image2").style.display="block";
                    document.getElementById("image_display2").style.display="none";
                });
                reader.readAsDataURL(this.files[0]);
            });
            image_input3.addEventListener('change', function(){
                const reader = new FileReader();
                reader.addEventListener('load', () =>{
                    uploaded_image = reader.result;
                    document.getElementById("display_image3").style.backgroundImage = `url(${uploaded_image})`;
                    document.getElementById("display_image3").classList.add("display_image_salle");
                    document.getElementById("display_image3").style.display="block";
                    document.getElementById("image_display3").style.display="none";
                });
                reader.readAsDataURL(this.files[0]);
            });
            image_input4.addEventListener('change', function(){
                const reader = new FileReader();
                reader.addEventListener('load', () =>{
                    uploaded_image = reader.result;
                    document.getElementById("display_image4").style.backgroundImage = `url(${uploaded_image})`;
                    document.getElementById("display_image4").classList.add("display_image_salle");
                    document.getElementById("display_image4").style.display="block";
                    document.getElementById("image_display4").style.display="none";
                });
                reader.readAsDataURL(this.files[0]);
            });
        </script>
    </body>
</html>
