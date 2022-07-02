<?php include_once "session.php"; ?>
<?php
if (!isset($_SESSION['username']) && !isset($_SESSION['pwrd'])) {
    echo "<script>window.location.href='login-admin'</script>";
}
if (!isset($_GET['id'])) {
    echo "<script>window.location.href='formations'</script>";
}
$id = $_GET['id'];
$formations = $data->getformation();
foreach ($formations as $formation) {
    if ($formation['for_id'] == $id) {
        $forma = $formation['for_nom'];
        $presentation = $formation['for_pres'];
        $description = $formation['for_descr'];
        $forma_arab = $formation['for_nom_arab'];
        $presentation_arab = $formation['for_pres_arab'];
        $description_arab = $formation['for_desc_arab'];
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="shortcut icon" href="images/artl/logo.png" type="/image/x-icon">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
    include_once "header.php";
    include_once "style.php";
    include_once "scripts.php";
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
                <h2><i class="fas fa-edit"></i> Modifier la formation</h2>
            </div>
            <?php
            if (isset($_POST['submit'])) {
                $data->updateFormation();
            }
            ?>
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="row justify-content-center">
                    <div class="col-md-12 mt-5">
                        <h3 class="text-center mb-3">Modification en Français</h3>
                        <div class="card card-position pb-5">
                            <div class="card-header text-center link-font"><i class="fas fa-edit"></i> Editer votre formation</div>
                            <div class="card-body py-5">
                                <div class="row mb-3">
                                    <label for="formationom" class="col-md-12 col-form-label text-md-end">Nom de Formation</label>
                                    <div class="col-md-12">
                                        <div class="d-flex">
                                            <i class="fas fa-tag position-awesome"></i>
                                            <input id="formationom" type="text" class="form-control pl-5" name="formation_nom" value="<?php echo $forma ?>" autocomplete="matiere" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="presentation" class="col-md-12 col-form-label text-md-end">Présentation</label>
                                    <div class="col-md-12">
                                        <textarea id="editor" rows="10" class="form-control aligns" name="presentation" autocomplete="presentation" required><?php echo $presentation ?></textarea>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="description" class="col-md-12 col-form-label text-md-end">Déscription</label>
                                    <div class="col-md-12">
                                        <textarea rows="10" id='editor2' class="form-control" name="description" autocomplete="description" value="<?php echo $description ?>" required><?php echo $description ?></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 mt-5">
                        <h3 class="text-center mb-3">Modification en Arabe</h3>
                        <div class="card card-position">
                            <div class="card-header text-center link-font">تعديل التكوين <i class="fas fa-edit"></i></div>
                            <div class="card-body py-5">
                                <div class="row mb-3 text-right">
                                    <label for="formationom" class="col-md-12 col-form-label text-md-end">اسم التكوين</label>
                                    <div class="col-md-12">
                                        <div class="d-flex text-right">
                                            <i class="fas fa-tag position-awesome_arab_dashboard"></i>
                                            <input id="formationom" type="text" class="form-control pr-5 text-right" name="formation_nom_arab" value="<?php echo $forma_arab ?>" autocomplete="matiere" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3 text-right">
                                    <label for="presentation" class="col-md-12 col-form-label text-md-end">مقدمة عن التكوين</label>
                                    <div class="col-md-12">
                                        <textarea id="editor3" rows="10" class="form-control" style="text-align: right !important;" name="presentation_arab" autocomplete="presentation" required><?php echo $presentation_arab ?></textarea>
                                    </div>
                                </div>
                                <div class="row mb-3 text-right">
                                    <label for="description" class="col-md-12 col-form-label text-md-end">عرض التكوين</label>
                                    <div class="col-md-12">
                                        <textarea id="editor4" rows="10" class="form-control" name="description_arab" autocomplete="description" value="<?php echo $description_arab ?>" required><?php echo $description_arab ?></textarea>
                                    </div>
                                </div>
                                <!-- <div class="row align-items-center">
                                    <label for="prof" class="col-md-12 col-form-label text-md-end">Image</label>
                                    <div class="col-md-6">
                                        <div class="d-flex">
                                            <i class="fas fa-camera position-awesome-image"></i>
                                            <input id="image_2" type="file" class="form-control-file pl-5" name="image">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div id="display_image_2" class="display_image" style="display:none;background-size:100% 100%; background-repeat:no-repeat"></div>
                                        <img src="<?php echo $image ?>" alt="" style="width:400px; height:225px" id="image_display">
                                    </div>
                                </div> -->
                                <div class="row mb-0 text-center">
                                    <div class="col-md-12 mt-4">
                                        <button type="submit" name="submit" class="btn btn-primary">Modifier la formation</button>
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
        content_css : "mycontent.css",
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
        content_css : "mycontent.css",
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