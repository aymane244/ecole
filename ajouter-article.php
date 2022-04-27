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
        <title>Ajouter un article</title>
    </head>
    <body>
        <?php include_once "navbar-admin.php";?>
        <div class="container">
            <div class="text-center py-3">
                <h2><i class="fas fa-plus-square"></i> Ajouter article</h2>
            </div>
            <?php
                if(isset($_POST['submit'])){
                    $data->insertArticle();
                }
            ?>
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-12 my-5">
                        <h3 class="text-center mb-3">Ajout en Français</h3>
                        <div class="card card-position">
                            <div class="card-header text-center link-font align-items-center"><i class="fas fa-plus-square"></i> Ajouter un article</div>
                                <div class="card-body py-5 w-100">
                                    <div class="row mb-3">
                                        <label for="titre" class="col-md-12 col-form-label text-md-end">Titre</label>
                                        <div class="col-md-12">
                                            <div class="d-flex">
                                                <i class="fas fa-tag position-awesome"></i>
                                                <input id="titre" type="text" class="form-control pl-5" name="titre" value="<?php echo isset($_POST['titre']) ? $_POST['titre'] : ''; ?>" autocomplete="titre" placeholder="Titre de l'article">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="prof" class="col-md-12 col-form-label text-md-end">Zone de texte</label>
                                        <div class="col-md-12">
                                            <textarea type="text" rows="10" class="form-control position-text-area" id="editor2" name="texte" value="<?php echo isset($_POST['texte']) ? $_POST['texte'] : ''; ?>" autocomplete="texte"><?php echo isset($_POST['texte']) ? $_POST['texte'] : ''; ?></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 my-5">
                        <h3 class="text-center mb-3">Ajout en Arabe</h3>
                        <div class="card card-position">
                            <div class="card-header text-center link-font align-items-center"><i class="fas fa-plus-square"></i> أضف مقال</div>
                                <div class="card-body py-5 w-100">
                                    <div class="row mb-3">
                                        <label for="titre_arab" class="col-md-12 col-form-label text-md-end">عنوان المقال</label>
                                        <div class="col-md-12">
                                            <div class="d-flex">
                                                <i class="fas fa-tag position-awesome"></i>
                                                <input id="titre_arab" type="text" class="form-control pl-5" name="titre_arab" value="<?php echo isset($_POST['titre_arab']) ? $_POST['titre_arab'] : ''; ?>" placeholder="عنوان المقال" autocomplete="titre">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="texte_arab" class="col-md-12 col-form-label text-md-end">كتابة المقال</label>
                                        <div class="col-md-12">
                                            <textarea type="text" rows="10" class="form-control position-text-area" id="editor" name="texte_arab" value="" autocomplete="texte"><?php echo isset($_POST['texte_arab']) ? $_POST['texte_arab'] : ''; ?></textarea>
                                        </div>
                                    </div>
                                    <div class="row mb-3 align-items-center">
                                        <label for="image" class="col-md-12 col-form-label text-md-end">Image</label>
                                        <div class="col-md-6">
                                            <div class="d-flex">
                                                <i class="fas fa-camera position-awesome-image"></i>
                                                <input id="image" type="file" class="form-control-file pl-5" name="image">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div id="display_image" class="display_image" style="background-size:100% 100%; background-repeat:no-repeat"></div>
                                        </div>
                                    </div>
                                    <div class="row text-center">
                                        <div class="col-md-12 mt-3">
                                            <button type="submit" name="submit" class="btn btn-primary">Ajouter un article</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <script>
            CKEDITOR.replace('editor');
            CKEDITOR.replace('editor2');
        </script>
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
            });
        </script>
    </body>
</html>