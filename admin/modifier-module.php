<?php include_once "../session.php"; ?>
<?php
if (!isset($_SESSION['username']) && !isset($_SESSION['pwrd'])) {
    echo "<script>window.location.href='login-admin'</script>";
}
if (!isset($_GET['id'])) {
    echo "<script>window.location.href='module'</script>";
}
$id = $_GET['id'];
$matieres = $data->getFormationMatiere();
$formations = $data->getformation();
foreach ($matieres as $matiere) {
    if ($matiere['mat_id'] == $id) {
        $formation = $matiere['for_nom'];
        $formation_arab = $matiere['for_nom_arab'];
        $mat = $matiere['mat_nom'];
        $prof = $matiere['mat_prof'];
        $mat_arab = $matiere['mat_nom_arab'];
        $prof_arab = $matiere['mat_prof_arab'];
        $duree = $matiere['mat_duree'];
        $for_id = $matiere['mat_formation'];
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
    <title>Modifier Module</title>
</head>

<body>
    <?php include_once "navbar-admin.php"; ?>
    <div class="main-content">
        <header>
            <?php include 'admin.php' ?>
        </header>
        <div class="container mt-5 pt-5">
            <div class="text-center py-3">
                <h2><i class="fas fa-edit"></i> Modifier le module</h2>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-12 mt-5">
                    <div class="card card-position pb-3">
                        <div class="card-header text-center link-font"><i class="fas fa-edit"></i> Modifier votre module</div>
                        <div class="card-body py-5">
                            <form action="" method="POST" enctype="multipart/form-data">
                                <div class="row mb-3 justify-content-center">
                                    <div class="col-md-10">
                                        <label for="formationnom" class="col-md-12 col-form-label text-md-end">Formation</label>
                                        <input type="hidden" name="formation_nom" id="" value="<?php echo $for_id ?>">
                                        <div class="d-flex">
                                            <i class="fas fa-folder-open position-awesome"></i>
                                            <select class="custom-select pl-5" name="formation">
                                                <option value="<?php echo $for_id ?>"><?php echo $formation ?></option>
                                                <?php
                                                foreach ($formations as $forma) {
                                                    if ($forma['for_id'] != $for_id) {
                                                ?>
                                                        <option value="<?php echo $forma['for_id'] ?>"><?php echo $forma['for_nom'] . "<br>" . $forma['for_nom_arab'] ?></option>
                                                <?php
                                                    }
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3 justify-content-center">
                                    <div class="col-md-5">
                                        <label for="matiere" class="col-md-12 col-form-label text-md-end">Module</label>
                                        <div class="d-flex">
                                            <i class="fas fa-tag position-awesome"></i>
                                            <input id="matiere" type="text" class="form-control pl-5" name="matiere_nom" value="<?php echo $mat ?>" autocomplete="matiere" autofocus required>
                                        </div>
                                    </div>
                                    <div class="col-md-5 text-right">
                                        <label for="matiere_arab" class="col-md-12 col-form-label text-md-end">الوحدة</label>
                                        <div class="d-flex">
                                            <i class="fas fa-tag position-awesome_arab_full_module"></i>
                                            <input id="matiere_arab" type="text" class="form-control pr-5 text-right" name="matiere_nom_arab" value="<?php echo $mat_arab ?>" autocomplete="matiere" autofocus required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3 justify-content-center">
                                    <div class="col-md-5">
                                        <label for="prof" class="col-md-12 col-form-label text-md-end">Formateur</label>
                                        <div class="d-flex">
                                            <i class="fas fa-user-tie position-awesome"></i>
                                            <input id="prof" type="text" class="form-control pl-5" name="prof_nom" value="<?php echo $prof ?>" autocomplete="profnom" autofocus required>
                                        </div>
                                    </div>
                                    <div class="col-md-5 text-right">
                                        <label for="prof_arab" class="col-md-12 col-form-label text-md-end">المؤطر</label>
                                        <div class="d-flex">
                                            <i class="fas fa-user-tie position-awesome_arab_full_module"></i>
                                            <input id="prof_arab" type="text" class="form-control pr-5 text-right" name="prof_nom_arab" value="<?php echo $prof_arab ?>" autocomplete="profnom" autofocus required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3 justify-content-center">
                                    <div class="col-md-10">
                                        <label for="duree" class="col-md-12 col-form-label text-md-end">Durée</label>
                                        <div class="d-flex">
                                            <i class="fas fa-poll position-awesome"></i>
                                            <input id="duree" type="text" class="form-control pl-5" name="duree" value="<?php echo $duree ?>" autocomplete="duree" autofocus required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-0 justify-content-center">
                                    <div class="col-md-10 text-center">
                                        <button type="submit" name="submit" class="btn btn-primary">Modifier module</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
<?php
if (isset($_POST['submit'])) {
    $data->updateMatiere();
}
?>