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
    <title>Ajouter une salle</title>
</head>

<body>
    <?php include_once "navbar-admin.php"; ?>
    <div class="main-content">
        <header>
            <?php include 'admin.php' ?>
        </header>
        <div class="container mt-5 pt-5">
            <div class="text-center py-3">
                <h2><i class="fas fa-plus-square"></i> Ajouter une salle</h2>
            </div>
            <?php
            if (isset($_POST['submit_salle'])) {
                $data->insertSalle();
            }
            ?>
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-12 my-5">
                        <div class="card card-position">
                            <div class="card-header text-center link-font align-items-center"><i class="fas fa-plus-square"></i> Ajouter une salle</div>
                            <div class="card-body py-5 w-100">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="row mb-3">
                                            <label for="titre" class="col-md-12 col-form-label text-md-end">Nom de la salle</label>
                                            <div class="col-md-12">
                                                <div class="d-flex">
                                                    <i class="fas fa-tag position-awesome"></i>
                                                    <input id="titre" type="text" class="form-control pl-5" name="nom_salle" autocomplete="titre" placeholder="Nom de la salle" value="<?php echo isset($_POST['nom_salle']) ? $_POST['nom_salle'] : ''; ?>">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6" lang="ar">
                                        <div class="row mb-3 text-right">
                                            <label for="titre_arab" class="col-md-12 col-form-label text-md-end">اسم القاعة</label>
                                            <div class="col-md-12">
                                                <div class="float-right">
                                                    <i class="fas fa-tag position-awesome-arab"></i>
                                                </div>
                                                <input id="titre_arab" type="text" class="form-control pr-5 text-right" name="nom_salle_arab" value="<?php echo isset($_POST['nom_salle_arab']) ? $_POST['nom_salle_arab'] : ''; ?>" autocomplete="titre" placeholder="اسم القاعة">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="row mb-3">
                                            <label for="desc" class="col-md-12 col-form-label text-md-end">Description</label>
                                            <div class="col-md-12">
                                                <textarea id="editor" type="text" rows="10" class="form-control" name="salle_desc" autocomplete="texte"><?php echo isset($_POST['salle_desc']) ? $_POST['salle_desc'] : ''; ?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6" lang="ar">
                                        <div class="row mb-3 text-right">
                                            <label for="desc_arab" class="col-md-12 col-form-label text-md-end">وصف القاعة</label>
                                            <div class="col-md-12">
                                                <textarea id="editor2" type="text" rows="10" class="form-control text-right" name="salle_desc_arab" autocomplete="texte"><?php echo isset($_POST['salle_desc_arab']) ? $_POST['salle_desc_arab'] : ''; ?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="salle_prix" class="col-md-12 col-form-label text-md-end">Prix de la salle</label>
                                    <div class="col-md-12">
                                        <div class="d-flex">
                                            <i class="fas fa-dollar-sign position-awesome"></i>
                                            <input id="salle_prix" type="number" class="form-control pl-5" name="salle_prix" autocomplete="prix" min="1" placeholder="Prix" value="<?php echo isset($_POST['salle_prix']) ? $_POST['salle_prix'] : ''; ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="salle_personne" class="col-md-12 col-form-label text-md-end">Nombre de personnes</label>
                                    <div class="col-md-12">
                                        <div class="d-flex">
                                            <i class="fas fa-users position-awesome"></i>
                                            <input id="salle_personne" type="number" class="form-control pl-5" name="salle_personne" autocomplete="titre" placeholder="Personnes" min="1" value="<?php echo isset($_POST['salle_personne']) ? $_POST['salle_personne'] : ''; ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-3">
                                        <div class="row mb-3">
                                            <label for="salle-service1" class="col-md-12 col-form-label text-md-end">Service 1</label>
                                            <div class="col-md-12">
                                                <div class="d-flex">
                                                    <i class="fas fa-check position-awesome"></i>
                                                    <input id="salle-service1" type="text" class="form-control pl-5" name="salle_service1" autocomplete="prenom" placeholder="Service 1" value="<?php echo isset($_POST['salle_service1']) ? $_POST['salle_service1'] : ''; ?>">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="row mb-3">
                                            <label for="salle-service2" class="col-md-12 col-form-label text-md-end">Service 2</label>
                                            <div class="col-md-12">
                                                <div class="d-flex">
                                                    <i class="fas fa-check position-awesome"></i>
                                                    <input id="salle-service2" type="text" class="form-control pl-5" name="salle_service2" autocomplete="nom" placeholder="Service 2" value="<?php echo isset($_POST['salle_service2']) ? $_POST['salle_service2'] : ''; ?>">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="row mb-3">
                                            <label for="salle-service3" class="col-md-12 col-form-label text-md-end">Service 3</label>
                                            <div class="col-md-12">
                                                <div class="d-flex">
                                                    <i class="fas fa-check position-awesome"></i>
                                                    <input id="salle-service3" type="text" class="form-control pl-5" name="salle_service3" autocomplete="prenom" placeholder="Service 3" value="<?php echo isset($_POST['salle_service3']) ? $_POST['salle_service3'] : ''; ?>">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="row mb-3">
                                            <label for="salle-service4" class="col-md-12 col-form-label text-md-end">Service 4</label>
                                            <div class="col-md-12">
                                                <div class="d-flex">
                                                    <i class="fas fa-check position-awesome"></i>
                                                    <input id="salle-service4" type="text" class="form-control pl-5" name="salle_service4" autocomplete="nom" placeholder="Service 4" value="<?php echo isset($_POST['salle_service4']) ? $_POST['salle_service4'] : ''; ?>">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="row mb-3 text-right" lang="ar">
                                            <label for="salle-service4_arab" class="col-md-12 col-form-label text-md-end">خدمة 4</label>
                                            <div class="col-md-12">
                                                <div class="float-right">
                                                    <i class="fas fa-check position-awesome-arab"></i>
                                                </div>
                                                <input id="salle-service4_arab" type="text" class="form-control pr-5 text-right" name="salle_service4_arab" autocomplete="nom" placeholder="خدمة 4" value="<?php echo isset($_POST['salle_service4_arab']) ? $_POST['salle_service4_arab'] : ''; ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="row mb-3 text-right" lang="ar">
                                            <label for="salle-service3_arab" class="col-md-12 col-form-label text-md-end">خدمة 3</label>
                                            <div class="col-md-12">
                                                <div class="float-right">
                                                    <i class="fas fa-check position-awesome-arab"></i>
                                                </div>
                                                <input id="salle-service3_arab" type="text" class="form-control pr-5 text-right" name="salle_service3_arab" autocomplete="nom" placeholder="خدمة 3" value="<?php echo isset($_POST['salle_service3_arab']) ? $_POST['salle_service3_arab'] : ''; ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="row mb-3 text-right" lang="ar">
                                            <label for="salle-service2_arab" class="col-md-12 col-form-label text-md-end">خدمة 2</label>
                                            <div class="col-md-12">
                                                <div class="float-right">
                                                    <i class="fas fa-check position-awesome-arab"></i>
                                                </div>
                                                <input id="salle-service2_arab" type="text" class="form-control pr-5 text-right" name="salle_service2_arab" autocomplete="nom" placeholder="خدمة 2" value="<?php echo isset($_POST['salle_service2_arab']) ? $_POST['salle_service2_arab'] : ''; ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="row mb-3 text-right" lang="ar">
                                            <label for="salle-service1_arab" class="col-md-12 col-form-label text-md-end">خدمة 1</label>
                                            <div class="col-md-12">
                                                <div class="float-right">
                                                    <i class="fas fa-check position-awesome-arab"></i>
                                                </div>
                                                <input id="salle-service1_arab" type="text" class="form-control pr-5 text-right" name="salle_service1_arab" autocomplete="nom" placeholder="خدمة 1" value="<?php echo isset($_POST['salle_service1_arab']) ? $_POST['salle_service1_arab'] : ''; ?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3 align-items-center">
                                    <label for="prof" class="col-md-12 col-form-label text-md-end">Image</label>
                                    <div class="col-md-6">
                                        <div class="d-flex">
                                            <i class="fas fa-camera position-awesome-image"></i>
                                            <input id="image" type="file" class="form-control-file pl-5" name="salle_image">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div id="display_image" class="display_image" style="background-size:100% 100%; background-repeat:no-repeat"></div>
                                    </div>
                                </div>
                                <div class="row mb-0">
                                    <div class="col-md-12 text-center">
                                        <button type="submit" name="submit_salle" class="btn btn-primary">Ajouter une salle</button>
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
        const image_input = document.getElementById("image");
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