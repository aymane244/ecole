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
    <title>Ajouter une promotion</title>
</head>

<body>
    <?php include_once "navbar-admin.php"; ?>
    <div class="main-content">
        <header>
            <?php include 'admin.php' ?>
        </header>
        <div class="container mt-5 pt-5">
            <div class="text-center mt-4 mb-5">
                <h2>Ajouter promotion</h2>
            </div>
            <?php
            if (isset($_SESSION['status'])) {
            ?>
                <div class='alert alert-success text-center mt-2' role='alert'><?php echo $_SESSION['status'] ?></div>
            <?php
                unset($_SESSION['status']);
            }
            ?>
            <?php
            if (isset($_SESSION['status_danger'])) {
            ?>
                <div class='alert alert-danger text-center mt-2' role='alert'><?php echo $_SESSION['status_danger'] ?></div>
            <?php
                unset($_SESSION['status_danger']);
            }
            ?>
            <div class="row justify-content-center">
                <div class="col-lg-6 col-md-12">
                    <div class="card mb-4">
                        <div class="card-header text-center"><i class="fas fa-square-plus"></i> Ajouter une promotion</div>
                        <div class="card-body py-5">
                            <form action="" method="POST">
                                <div class="row mb-3">
                                    <label for="activity" class="col-md-12 col-form-label text-md-end">Nom de la promotion</label>
                                    <div class="col-md-12">
                                        <div class="d-flex">
                                            <i class="fas fa-folder-open position-awesome"></i>
                                            <input id="activity" type="text" class="form-control px-5" name="promotion_name" autocomplete="activity" placeholder="Nom de la promotion" autofocus required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-0">
                                    <div class="col-md-8">
                                        <button type="submit" class="btn btn-primary" name="submit_promotion">Ajouter la prmotion</button>
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
if (isset($_POST['submit_promotion'])) {
    $data->insertPromotion();
}
?>