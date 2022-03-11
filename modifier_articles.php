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
    <title>Modifier Formation</title>
</head>
<?php
    $id = $_GET['id'];
    $articles = $data->getArticle();
    foreach($articles as $article){
        if($article['art_id'] == $id){
            $titre = $article['art_titre'];
            $texte = $article['art_texte'];          
            $image = $article['art_image'];
        }
    }
?>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-5">
                <div class="card card-position w-100">
                    <div class="card-header text-center link-font"><i class="fas fa-edit"></i> Editer votre Article</div>
                        <div class="card-body py-5">
                            <form action="" method="POST" enctype="multipart/form-data">
                            <div class="row mb-3">
                                <label for="art_titre" class="col-md-12 col-form-label text-md-end">Titre d'article</label>
                                <div class="col-md-12">
                                    <div class="d-flex">
                                        <i class="fas fa-poll position-awesome"></i>
                                        <input id="art_titre" type="text" class="form-control px-5" name="art_titre" value="<?php echo $titre ?>" autocomplete="titre" autofocus required>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="art_texte" class="col-md-12 col-form-label text-md-end">Texte</label>
                                <div class="col-md-12">
                                    <div class="d-flex">
                                        <i class="fas fa-arrows-alt position-awesome-cursor" id="sizer-article" onclick="fullpage()"></i>
                                        <textarea id="art_texte" type="text" rows="10" class="form-control position-text-area pt-5" name="art_texte" autocomplete="texte" autofocus required><?php echo $texte ?></textarea>
                                    </div>
                                </div>
                            </div>
                           
                            <div class="row mb-3">
                                <label for="prof" class="col-md-12 col-form-label text-md-end">Image</label>
                                <div class="col-md-6">
                                    <div class="d-flex">
                                        <i class="fas fa-camera position-awesome-image"></i>
                                        <input id="image" type="file" class="form-control-file px-5" name="image" autofocus>
                                    </div>
                                </div>
                            </div>
                            <div class="text-center mb-3">
                                    <img src="<?php echo $image ?>" alt="" style="width:32rem; height: 280px;">
                                </div>
                            <div class="row mb-0">
                                <div class="col-md-8 offset-md-12">
                                    <button type="submit" name="submit" class="btn btn-primary mx-3">Modifier l'article</button>
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
        document.getElementById("art_texte").classList.toggle("fulltext")
        document.getElementById("sizer-article").classList.toggle("fullsizer")
    }
</script>
</body>
</html>
<?php
    if(isset($_POST['submit'])){
        $data->updateArticle();
    }
?>