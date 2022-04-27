<?php include_once "session.php";?>
<?php
    if(!isset($_SESSION['username']) && !isset($_SESSION['pwrd'])){
        echo "<script>window.location.href='login-admin'</script>";
    }
    $formations = $data->getformation();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <?php 
            include_once "header.php";  
            include_once "style.php";
            include_once "scripts.php";
        ?>
        <title>Ajouter un module</title>
    </head>
    <body>
        <?php include_once "navbar-admin.php";?>
        <div class="container">
            <div class="text-center py-3">
                <h2><i class="fas fa-plus-square"></i> Ajouter Module</h2>
            </div>
            <div class="row">
                <div class="col-md-12 my-5">
                    <div class="card card-position">
                        <div class="card-header text-center link-font align-items-center"><i class="fas fa-plus-square"></i> Ajouter un module</div>
                        <div class="card-body py-5">
                            <form action="" method="POST">
                                <div class="text-center">
                                    <p>Combien voulez-vous ajouter de modules</p>
                                    <input type="number" name="numbers" id="" size="2" min="1"> <br><br>
                                    <input type="submit" class="btn btn-primary" name="num" id="" value="Confirmer" onclick="afficher()">
                                </div>
                            </form>
                            <form action="" method="POST">
                                <?php
                                    if(isset($_POST['num'])){
                                        $numbers = $_POST['numbers'];
                                        if($numbers == ''){
                                            echo "<div class='alert alert-danger text-center mt-3 container' role='alert'>
                                                    Veuillez saisir le nombre de module que vous souhitez enregistrer
                                                </div>";
                                        }else{
                                ?>
                                <div class="row mb-3" id="formation">
                                    <label for="categorie" class="col-md-4 col-form-label text-md-end">Formation</label>
                                    <div class="col-md-12">
                                        <div class="d-flex">
                                            <i class="fas fa-folder-open position-awesome"></i>
                                            <select class="custom-select px-5" name="formation">
                                                <?php
                                                    foreach($formations as $formation){
                                                ?>
                                                <option value="<?php echo $formation['for_id'] ?>"><?php echo $formation['for_nom']." ".$formation['for_nom_arab'] ?></option>
                                                <?php
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                            for($i=1; $i<=$numbers; $i++){
                                ?>

                                <div>Cours # <?php echo $i ?></div>
                                <input type="hidden" name="nums" value="<?php echo $numbers ?>">
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label for="matiere" class="col-md-12 col-form-label text-md-end">Nom du module</label>
                                        <div class="d-flex">
                                            <i class="fas fa-tag position-awesome"></i>
                                            <input id="matiere" type="text" class="form-control pl-5" name="matiere[]" placeholder="Nom du module" autocomplete="matiere" autofocus value="<?php echo isset($_POST['matiere']) ? $_POST['matiere'] : ''; ?>" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="prof" class="col-md-12 col-form-label text-md-end">Nom du formateur</label>
                                        <div class="d-flex">
                                            <i class="fas fa-user-tie position-awesome"></i>
                                            <input id="prof" type="text" class="form-control pl-5" name="prof[]" placeholder="Nom du formateur" autocomplete="prof" autofocus value="<?php echo isset($_POST['prof']) ? $_POST['prof'] : ''; ?>" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="matiere_arab" class="col-md-12 col-form-label text-md-end">اسم الوحدة</label>
                                        <div class="d-flex">
                                            <i class="fas fa-tag position-awesome"></i>
                                            <input id="matiere_arab" type="text" class="form-control pl-5" name="matiere_arab[]" placeholder="اسم الوحدة" autocomplete="matiere" autofocus value="<?php echo isset($_POST['matiere_arab']) ? $_POST['matiere_arab'] : ''; ?>" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="prof_arab" class="col-md-12 col-form-label text-md-end">اسم المؤطر</label>
                                        <div class="d-flex">
                                            <i class="fas fa-user-tie position-awesome"></i>
                                            <input id="prof_arab" type="text" class="form-control pl-5" name="prof_arab[]" placeholder="اسم المؤطر" autocomplete="matiere" autofocus value="<?php echo isset($_POST['matiere_arab']) ? $_POST['matiere_arab'] : ''; ?>" required>
                                        </div> 
                                    </div>
                                    <div class="col-md-6">
                                        <label for="duree" class="col-md-12 col-form-label text-md-end">Durée total du cours</label>
                                        <div class="d-flex">
                                            <i class="fas fa-poll position-awesome"></i>
                                            <input id="duree" type="number" min="1" class="form-control pl-5 w-25" name="duree[]" autocomplete="duree" autofocus value="<?php echo isset($_POST['duree']) ? $_POST['duree'] : ''; ?>" required>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                            }
                                ?>
                                <div class="row mb-0" id="divbtn">
                                    <div class="col-md-12 text-center">
                                        <input type="submit" name="submit_module" class="btn btn-primary" id='submit_module' value="Ajouter le module" id="ajout">
                                    </div>
                                </div>
                                <?php            
                                        }
                                    }
                                ?>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
<?php
    if(isset($_POST['submit_module'])){
        $data->insertMatiere();
    }
?>