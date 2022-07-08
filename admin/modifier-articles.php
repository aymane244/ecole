<?php include_once "../session.php"; ?>
<?php
if (!isset($_SESSION['username']) && !isset($_SESSION['pwrd'])) {
    echo "<script>window.location.href='login-admin'</script>";
}
if (!isset($_GET['id'])) {
    echo "<script>window.location.href='articles'</script>";
}
$id = $_GET['id'];
$articles = $data->getArticle();
foreach ($articles as $article) {
    if ($article['art_id'] == $id) {
        $titre = $article['art_titre'];
        $texte = $article['art_texte'];
        $titre_arab = $article['art_titre_arab'];
        $texte_arab = $article['art_texte_arab'];
        $image = $article['art_image'];
    }
}
?>
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
    <title>Modifier Formation</title>
</head>

<body>
    <?php include_once "navbar-admin.php"; ?>
    <div class="main-content">
        <header>
            <?php include 'admin.php' ?>
        </header>
        <div class="container mt-5 pt-5">
            <div class="text-center py-3">
                <h2><i class="fas fa-edit"></i> Editer l'article</h2>
            </div>
            <?php
            if (isset($_POST['submit'])) {
                $data->updateArticle();
            }
            ?>
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="row justify-content-center">
                    <div class="col-md-12 mt-5">
                        <h3 class="text-center mb-3">Modification en Français</h3>
                        <div class="card card-position">
                            <div class="card-header text-center link-font"><i class="fas fa-edit"></i> Editer votre Article</div>
                            <div class="card-body py-5">
                                <div class="row mb-3">
                                    <label for="art_titre" class="col-md-12 col-form-label text-md-end">Titre d'article</label>
                                    <div class="col-md-12">
                                        <div class="d-flex">
                                            <i class="fas fa-poll position-awesome"></i>
                                            <input id="art_titre" type="text" class="form-control pl-5" name="art_titre" value="<?php echo $titre ?>" autocomplete="titre" placeholder="Titre de l'article" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="art_texte" class="col-md-12 col-form-label text-md-end">Texte</label>
                                    <div class="col-md-12">
                                        <textarea id="editor" type="text" rows="10" class="form-control position-text-area" name="art_texte" autocomplete="texte" required><?php echo $texte ?></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 mt-5">
                    <h3 class="text-center mb-3">Modification en Arabe</h3>
                    <div class="card card-position">
                        <div class="card-header text-center link-font"> تعديل المقال <i class="fas fa-edit"></i></div>
                        <div class="card-body py-5">
                            <div class="row mb-3 text-right">
                                <label for="art_titre_arab" class="col-md-12 col-form-label text-md-end">عنوان المقال</label>
                                <div class="col-md-12">
                                    <div class="float-right">
                                        <i class="fas fa-poll position-awesome-arab"></i>
                                    </div>
                                    <input id="art_titre_arab" type="text" class="form-control pr-5 text-right" name="art_titre_arab" value="<?php echo $titre_arab ?>" placeholder="عنوان المقال" autocomplete="titre" required>
                                </div>
                            </div>
                            <div class="row mb-3 text-right">
                                <label for="art_texte_arab" class="col-md-12 col-form-label text-md-end">النص</label>
                                <div class="col-md-12">
                                    <textarea id="editor" type="text" rows="10" class="form-control position-text-area" name="art_texte_arab" autocomplete="texte" required><?php echo $texte_arab ?></textarea>
                                </div>
                            </div>
                            <div class="row mb-3 align-items-center">
                                <label for="image" class="col-md-12 col-form-label text-md-end">Image</label>
                                <div class="col-md-6">
                                    <div class="d-flex">
                                        <i class="fas fa-camera position-awesome-image"></i>
                                        <input id="image_2" type="file" class="form-control-file px-5" name="image">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div id="display_image_2" class="display_image" style="display:none;background-size:100% 100%; background-repeat:no-repeat"></div>
                                    <img src="../images/articles/<?php echo $image ?>" alt="" style="width:400px; height:225px;" id="image_display">
                                </div>
                            </div>
                            <div class="row mb-0 text-center">
                                <div class="col-md-12 mt-3">
                                    <button type="submit" name="submit" class="btn btn-primary mx-3">Modifier l'article</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script>
      tinymce.init({
        selector: '#editor',
        branding: false,
        plugins: [
          'a11ychecker','advlist','advcode','advtable','autolink','checklist','export',
          'lists','link','image','charmap','preview','anchor','searchreplace','visualblocks',
          'powerpaste','fullscreen','formatpainter','insertdatetime','media','table','help','wordcount'
        ],
        toolbar: 'undo redo | formatpainter casechange blocks | bold italic backcolor | ' +
          'alignleft aligncenter alignright alignjustify | ' +
          'bullist numlist checklist outdent indent | removeformat | a11ycheck code table help'
      });
      tinymce.init({
        selector: '#editor2',
        branding: false,
        directionality : 'rtl',
        plugins: [
          'a11ychecker','advlist','advcode','advtable','autolink','checklist','export',
          'lists','link','image','charmap','preview','anchor','searchreplace','visualblocks',
          'powerpaste','fullscreen','formatpainter','insertdatetime','media','table','help','wordcount'
        ],
        toolbar: 'undo redo | formatpainter casechange blocks | bold italic backcolor | ' +
          'alignleft aligncenter alignright alignjustify | ' +
          'bullist numlist checklist outdent indent | removeformat | a11ycheck code table help'
      });
    </script>
    <script>
        const image_input = document.getElementById("image_2");
        var uploaded_image;
        image_input.addEventListener('change', function() {
            const reader = new FileReader();
            reader.addEventListener('load', () => {
                uploaded_image = reader.result;
                document.getElementById("display_image_2").style.backgroundImage = `url(${uploaded_image})`;
            });
            reader.readAsDataURL(this.files[0]);
            document.getElementById("display_image_2").style.display = "block";
            document.getElementById("image_display").style.display = "none";
        });
    </script>
</body>

</html>