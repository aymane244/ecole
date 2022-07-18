<?php include_once "../session.php"; ?>
<?php
if (!isset($_SESSION['username']) && !isset($_SESSION['pwrd'])) {
    echo "<script>window.location.href='login-admin'</script>";
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
    <title>Ajouter une formation</title>
</head>

<body>
    <?php include_once "navbar-admin.php"; ?>
    <div class="main-content">
        <header>
            <?php include 'admin.php' ?>
        </header>
        <div class="container mt-5 pt-5">
            <div class="text-center py-3">
                <h2><i class="fas fa-plus-square"></i> Ajouter Formation</h2>
            </div>
            <?php
            if (isset($_POST['submit'])) {
                $data->insertFormation();
            }
            ?>
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-12 my-5">
                        <h3 class="text-center mb-3">Ajout en Français</h3>
                        <div class="card card-position">
                            <div class="card-header text-center link-font align-items-center">
                                <i class="fas fa-plus-square"></i> Ajouter une formation
                            </div>
                            <div class="card-body py-5 w-100">
                                <div class="row mb-3">
                                    <label for="titre" class="col-md-12 col-form-label text-md-end">Nom de formation</label>
                                    <div class="col-md-12">
                                        <div class="d-flex">
                                            <i class="fas fa-tag position-awesome"></i>
                                            <input id="titre" type="text" class="form-control pl-5" name="titre" placeholder="Nom de la formation" value="<?php echo isset($_POST['titre']) ? $_POST['titre'] : ''; ?>" autocomplete="titre">
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="presentation" class="col-md-12 col-form-label text-md-end">Présentation</label>
                                    <div class="col-md-12">
                                        <textarea id="editor" rows="10" class="form-control" name="presentation" value="<?php echo isset($_POST['presentation']) ? $_POST['presentation'] : ''; ?>" autocomplete="presentation"><?php echo isset($_POST['presentation']) ? $_POST['presentation'] : ''; ?></textarea>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="prof" class="col-md-12 col-form-label text-md-end">Déscription</label>
                                    <div class="col-md-12">
                                        <textarea rows="10" class="form-control" id="editor2" style="text-align:right !important" name="description" value="<?php echo isset($_POST['description']) ? $_POST['description'] : ''; ?>" autocomplete="description"><?php echo isset($_POST['description']) ? $_POST['description'] : ''; ?></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 my-5">
                        <h3 class="text-center mb-3">Ajout en Arabe</h3>
                        <div class="card card-position" lang="ar">
                            <div class="card-header text-center link-font align-items-center"> أضف تكوين <i class="fas fa-plus-square"></i></div>
                            <div class="card-body py-5">
                                <div class="row mb-3 text-right" lang="ar">
                                    <label for="titre" class="col-md-12 col-form-label text-md-end">اسم التكوين</label>
                                    <div class="col-md-12">
                                        <div style="float: right;">
                                            <i class="fas fa-tag position-awesome-arab"></i>
                                        </div>        
                                        <input id="titre" type="text" class="form-control pr-5 text-right" placeholder="اسم التكوين" name="titre_arabe" value="<?php echo isset($_POST['titre_arabe']) ? $_POST['titre_arabe'] : ''; ?>" autocomplete="titre">
                                    </div>
                                </div>
                                <div class="row mb-3 text-right" lang="ar">
                                    <label for="presentation" class="col-md-12 col-form-label text-md-end">مقدمة عن التكوين</label>
                                    <div class="col-md-12">
                                        <textarea id="editor3" rows="10" class="form-control text-right" name="presentation_arabe" value="<?php echo isset($_POST['presentation_arabe']) ? $_POST['presentation_arabe'] : ''; ?>" autocomplete="presentation"><?php echo isset($_POST['presentation_arabe']) ? $_POST['presentation_arabe'] : ''; ?></textarea>
                                    </div>
                                </div>
                                <div class="row mb-3 text-right" lang="ar">
                                    <label for="prof" class="col-md-12 col-form-label text-md-end">وصف التكوين</label>
                                    <div class="col-md-12">
                                        <textarea rows="10" class="form-control text-right" id="editor4" name="description_arabe" value="<?php echo isset($_POST['presentation_arabe']) ? $_POST['presentation_arabe'] : ''; ?>" autocomplete="description"><?php echo isset($_POST['description_arabe']) ? $_POST['description_arabe'] : ''; ?></textarea>
                                    </div>
                                </div>
                                <!-- <div class="row mb-3 align-items-center">
                                    <label for="prof" class="col-md-12 col-form-label text-md-end">Image</label>
                                    <div class="col-md-6">
                                        <div class="d-flex">
                                            <i class="fas fa-camera position-awesome-image"></i>
                                            <input id="image_input" type="file" class="form-control-file pl-5" name="image">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div id="display_image" class="display_image" style="background-size:100% 100%; background-repeat:no-repeat"></div>
                                    </div>
                                </div> -->
                                <div class="row mb-0 text-center">
                                    <div class="col-md-12">
                                        <button type="submit" name="submit" class="btn btn-primary">Ajouter la formation</button>
                                    </div>
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
        selector: '#editor3',
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
      tinymce.init({
        selector: '#editor4',
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
        const image_input = document.getElementById("image_input");
        var uploaded_image;
        image_input.addEventListener('change', function() {
            const reader = new FileReader();
            reader.addEventListener('load', () => {
                uploaded_image = reader.result;
                document.getElementById("display_image").style.backgroundImage = `url(${uploaded_image})`;
            });
            reader.readAsDataURL(this.files[0]);
        });
    </script>
</body>

</html>