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
    $formations = $data->getformation();
    foreach($formations as $formation){
        if($formation['for_id'] == $id){
            $forma = $formation['for_nom'];
            $presentation = $formation['for_pres'];
            $description = $formation['for_descr'];
            $image = $formation['for_image'];
        }
      }
?>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-5">
                <div class="card card-position">
                    <div class="card-header text-center link-font"><i class="fas fa-edit"></i> Editer votre formation</div>
                        <div class="card-body py-5">
                            <form action="" method="POST" enctype="multipart/form-data">
                            <div class="row mb-3">
                                <label for="formationom" class="col-md-12 col-form-label text-md-end">Nom de Formation</label>
                                <div class="col-md-12">
                                    <div class="d-flex">
                                        <i class="fas fa-poll position-awesome"></i>
                                        <input id="formationom" type="text" class="form-control px-5" name="formation_nom" value="<?php echo $forma ?>" autocomplete="matiere" autofocus required>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="presentation" class="col-md-12 col-form-label text-md-end">Présentation</label>
                                <div class="col-md-12">
                                    <div class="d-flex">
                                        <textarea id="presentation" type="text" rows="10" class="form-control" name="presentation" autocomplete="presentation" autofocus required><?php echo $presentation ?></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="description" class="col-md-12 col-form-label text-md-end">Déscription</label>
                                <div class="col-md-12">
                                    <div class="d-flex">
                                        <i class="fas fa-arrows-alt position-awesome-cursor" id="sizerff" onclick="fullpage()"></i>
                                        <textarea id="description" type="text" rows="10" class="form-control  pt-5" name="description" autocomplete="description" autofocus required><?php echo $description ?></textarea>
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
                                    <button type="submit" name="submit" class="btn btn-primary mx-3">Modifier la formation</button>
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
        document.getElementById("description").classList.toggle("fulltext2")
        document.getElementById("sizerff").classList.toggle("fullsizer2")
    }
</script>
</body>
</html>
<?php
    if(isset($_POST['submit'])){
        $data->updateFormation();
    }
?>