<?php
    include_once "header.php";
    include_once "navbar_admin.php";
    $data = new Etudiant($db);
    if(!isset($_SESSION['username']) && !isset($_SESSION['pwrd'])){
        echo "<script>window.location.href='login_admin'</script>";
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un article</title>
</head>
<?php
    if(isset($_POST['submit'])){
        $data->insertArticle();
    }
?>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12 my-5">
                <div class="card card-position">
                    <div class="card-header text-center link-font align-items-center"><i class="fas fa-plus-square"></i> Ajouter un article</div>
                        <div class="card-body py-5 w-100">
                            <form action="" method="POST" enctype="multipart/form-data">
                            <div class="row mb-3">
                                <label for="titre" class="col-md-12 col-form-label text-md-end">Titre</label>
                                <div class="col-md-12">
                                    <div class="d-flex">
                                        <i class="fas fa-poll position-awesome"></i>
                                        <input id="titre" type="text" class="form-control px-5" name="titre" value="" autocomplete="titre" autofocus required>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="prof" class="col-md-12 col-form-label text-md-end">Zone de texte</label>
                                <div class="col-md-12">
                                    <div class="d-flex">
                                        <i class="fas fa-arrows-alt position-awesome-cursor" id="sizer" onclick="fullpage()"></i>
                                        <textarea type="text" rows="10" class="form-control position-text-area pt-5" id="zone-text" name="texte" value="" autocomplete="texte" autofocus required></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="prof" class="col-md-12 col-form-label text-md-end">Image</label>
                                <div class="col-md-6">
                                    <div class="d-flex">
                                        <i class="fas fa-camera position-awesome-image"></i>
                                        <input id="image" type="file" class="form-control-file px-5" name="image" autofocus required>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-0">
                                <div class="col-md-8 offset-md-12">
                                    <button type="submit" name="submit" class="btn btn-primary mx-3">Ajouter un article</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function fullpage(){
        document.getElementById("zone-text").classList.toggle("fulltext")
        document.getElementById("sizer").classList.toggle("fullsizer")
    }
</script>
</body>
</html>
