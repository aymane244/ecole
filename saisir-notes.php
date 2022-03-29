<?php include_once "session.php";?>
<?php
    if(!isset($_SESSION['username']) && !isset($_SESSION['pwrd'])){
        echo "<script>window.location.href='login-admin'</script>";
    }
    if(!isset($_GET['id'])){
        echo "<script>window.location.href='formations'</script>";
    }
    $id = $_GET['id'];
    $etudiants = $data->getEtudiantFormation();
    $matieres = $data->getForMat();
    $notes = $data->getNotes();
    $output = array_diff(array_column($matieres, 'mat_id'),array_column($notes, 'not_matiere'));
    foreach($etudiants as $etudiant){
        if($etudiant['etud_id'] == $id){
            $etud_id = $etudiant['etud_id'];
            $etud_nom = $etudiant['etud_nom'];
            $etud_prenom = $etudiant['etud_prenom'];
            $for_id = $etudiant['for_id'];
            $for_nom = $etudiant['for_nom'];
        }
    }
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
        <title>Sasie de note</title>
    </head>
    <body>
        <?php include_once "navbar-admin.php";?>
        <div class="container">
            <?php
                if(isset($_SESSION['status'])){
            ?>
            <div class='alert alert-success text-center mt-2' role='alert'><?php echo $_SESSION['status']?></div>
            <?php
                    unset($_SESSION['status']);
                }
            ?>
            <div class="row">
                <div class="col-md-6 mt-5">
                    <div class="card card-position affichage">
                        <div class="card-header text-center link-font"><i class="fas fa-edit"></i> Saisir les notes</div>
                        <div class="card-body py-5">
                            <form action="" method="POST" enctype="multipart/form-data">
                                <div class="row mb-3">
                                    <label for="categorie" class="col-md-4 col-form-label text-md-end">Formations</label>
                                    <div class="col-md-12">
                                        <div class="d-flex">
                                            <i class="fas fa-folder-open position-awesome"></i>
                                            <select class="custom-select pl-5" name="nameformation">
                                                <option value="<?php echo $for_id ?>"><?php echo $for_nom?></option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="categorie" class="col-md-4 col-form-label text-md-end">Matières</label>
                                    <div class="col-md-12">
                                        <div class="d-flex">
                                            <i class="fas fa-tag position-awesome"></i>
                                            <select class="custom-select pl-5" name="matieres">
                                                <option selected value="">--Choisir la matière--</option>
                                                <?php
                                                    foreach($output as $item){
                                                        foreach($matieres as $matiere){
                                                            if($matiere['mat_id'] == $item){
                                                ?>
                                                <option value="<?php echo $matiere['mat_id'] ?>"><?php echo $matiere['mat_nom']?></option>
                                                <?php
                                                            }
                                                        }
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="categorie" class="col-md-4 col-form-label text-md-end">Etudiants</label>
                                    <div class="col-md-12">
                                        <div class="d-flex">
                                            <i class="fas fa-user-graduate position-awesome"></i>
                                            <select class="custom-select pl-5" name="etudiants">
                                                <option value="<?php echo $etud_id ?>"><?php echo $etud_prenom." ". $etud_nom?></option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="note" class="col-md-4 col-form-label text-md-end">Saisir la note</label>
                                    <div class="col-md-12">
                                        <div class="d-flex">
                                            <i class="fas fa-poll position-awesome"></i>
                                            <input id="note" type="number" class="form-control pl-5" min="0" max="20" name="note" value="" autocomplete="note" size="2" autofocus required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-0">
                                    <div class="col-md-8 offset-md-4">
                                        <button type="submit" name="submit" class="btn btn-primary">Valider la note</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <?php
                    $formations = $data->getEtudiantMatiereFormation();
                    $notes = $data->noteGenerale();
                ?>
                <div class="col-md-6">
                    <table class="table table-bordered mt-5">
                        <thead class="text-center">
                            <tr>
                                <th scope="col" colspan="5">ALT Nord</th>
                            </tr>
                            <tr>
                                <th scop="col" colspan="5"><?php echo $for_nom ?></th>
                            </tr>
                            <tr>
                                <th scop="col" colspan="5">
                                    <?php echo $etud_prenom." ". $etud_nom?>
                                    <input type="hidden" name="forname" value="<?php echo $etud_id ?>">
                                </th>
                            </tr>
                            <tr>
                                <th scope="col">Matières</th>
                                <th scope="col">Note</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            <?php
                                foreach($formations as $formation){
                                    if($formation['etud_id'] == $id){ 
                            ?>
                            <tr>
                                <td><?php echo $formation['mat_nom']?></td>
                                <td><?php echo $formation['not_note']?></td>
                                <td>
                                    <a href="modifier-note?id=<?php echo $formation['not_id']?>" target="_blank"> 
                                        <i class="fas fa-edit text-success awesome-size"></i>
                                    </a>
                                </td>
                            </tr>
                            <?php
                                    }
                                }
                            ?>
                            <tr>
                                <td>Note géneral</td>
                                <?php
                                    foreach($notes as $note){
                                        if($note['etud_id'] == $id){
                                ?>
                                <td colspan="2"><?php echo $note['notegenerale']?></td>
                                <?php
                                        }
                                    }
                                ?>
                            </tr>
                        </tbody>    
                    </table>
                </div>
            </div>
        </div>
        <br><br><br>
    </body>
</html>
<?php
    if(isset($_POST['submit'])){
        $data->sasirNotes();
    }
?>