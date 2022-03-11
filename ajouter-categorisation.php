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
    <title>Ajouter une catégorisation douane</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12 my-5">
                <div class="card card-position">
                    <div class="card-header text-center link-font align-items-center"><i class="fas fa-plus-square"></i> Ajouter une catégorisation douane</div>
                        <div class="card-body py-5 w-100">
                            <form action="" method="POST" enctype="multipart/form-data">
                            <div class="row mb-3">
                                <label for="douane" class="col-md-12 col-form-label text-md-end">Catégorisation douane</label>
                                <div class="col-md-12">
                                    <div class="d-flex">
                                        <i class="fas fa-poll position-awesome"></i>
                                        <input id="douane" type="text" class="form-control px-5" name="douane" value="" autocomplete="titre" autofocus required>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="presentation_douane" class="col-md-12 col-form-label text-md-end">Présentation</label>
                                <div class="col-md-12">
                                    <div class="d-flex">
                                        <textarea type="text" rows="10" class="form-control position-text-area" name="presentation_douane" value="" autocomplete="presentation" autofocus required></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-0">
                                <div class="col-md-8 offset-md-12">
                                    <button type="submit" name="submit_douane" class="btn btn-primary mx-3">Ajouter catégorisation douane</button>
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
    if(isset($_POST['submit_douane'])){
        $data->insertdouane();
    }
?>