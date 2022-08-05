<?php include_once "../session.php"; ?>
<?php
if (!isset($_SESSION['username']) && !isset($_SESSION['pwrd'])) {
    echo "<script>window.location.href='index'</script>";
}
if (!isset($_GET['id'])) {
    echo "<script>window.location.href='formations'</script>";
}
$id = $_GET['id'];
$etudiants = $data->getEtudiantFormation();
$matieres = $data->getForMat();
$notes = $data->getNotes();
$output = array_diff(array_column($matieres, 'mat_id'), array_column($notes, 'not_matiere'));
foreach ($etudiants as $etudiant) {
    if ($etudiant['etud_id'] == $id) {
        $etud_id = $etudiant['etud_id'];
        $etud_nom = $etudiant['etud_nom'];
        $etud_prenom = $etudiant['etud_prenom'];
        $for_id = $etudiant['for_id'];
        $for_nom = $etudiant['for_nom'];
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
    <title>Sasie de note</title>
</head>

<body>
    <?php include_once "navbar-admin.php"; ?>
    <div class="main-content">
        <header>
            <?php include 'admin.php' ?>
        </header>
        <div class="container mt-5 pt-5 pb-3">
            <?php
            if (isset($_SESSION['status'])) {
            ?>
                <div class='alert alert-success text-center mt-2' role='alert'><?php echo $_SESSION['status'] ?></div>
            <?php
                unset($_SESSION['status']);
            }
            ?>
            <?php
            if (isset($_SESSION['status_error'])) {
            ?>
                <div class='alert alert-danger text-center mt-2' role='alert'><?php echo $_SESSION['status_error'] ?></div>
            <?php
                unset($_SESSION['status_error']);
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
                                                <option value="<?php echo $for_id ?>"><?php echo $for_nom ?></option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="categorie" class="col-md-4 col-form-label text-md-end">Modules</label>
                                    <div class="col-md-12">
                                        <div class="d-flex">
                                            <i class="fas fa-tag position-awesome"></i>
                                            <select class="custom-select pl-5" name="matieres">
                                                <option selected value="">--Choisir le module--</option>
                                                <?php
                                                foreach ($output as $item) {
                                                    foreach ($matieres as $matiere) {
                                                        if ($matiere['mat_id'] == $item) {
                                                ?>
                                                            <option value="<?php echo $matiere['mat_id'] ?>"><?php echo $matiere['mat_nom'] ?></option>
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
                                    <label for="categorie" class="col-md-4 col-form-label text-md-end">Stagiaires</label>
                                    <div class="col-md-12">
                                        <div class="d-flex">
                                            <i class="fas fa-user-graduate position-awesome"></i>
                                            <select class="custom-select pl-5" name="etudiants">
                                                <option value="<?php echo $etud_id ?>"><?php echo $etud_prenom . " " . $etud_nom ?></option>
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
                $formations = $data->getEtudiantNoteMatiere();
                $notes = $data->noteGenerale();
                ?>
                <div class="col-md-6">
                    <table class="table table-bordered mt-5 bg-white">
                        <thead class="text-center text-white" style="background-color: #11101d;">
                            <tr>
                                <th scope="col" colspan="5">ARLT Nord</th>
                            </tr>
                            <tr>
                                <th scop="col" colspan="5"><?php echo $for_nom ?></th>
                            </tr>
                            <tr>
                                <th scop="col" colspan="5">
                                    <?php echo $etud_prenom . " " . $etud_nom ?>
                                    <input type="hidden" name="forname" value="<?php echo $etud_id ?>">
                                </th>
                            </tr>
                            <tr>
                                <th scope="col">Modules</th>
                                <th scope="col">Note</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            <?php
                            foreach ($formations as $formation) {
                                if ($formation['etud_id'] == $id) {
                            ?>
                                    <tr>
                                    <?php
                                        if($formation['etud_id'] != $formation['not_etudiant']){
                                    ?>
                                    <td colspan="3"><h4>Pas de notes saisit</h4></td>
                                    <?php        
                                        }else{
                                    ?>
                                        <td><?php echo $formation['mat_nom'] ?></td>
                                        <td><?php echo $formation['not_note'] ?></td>
                                        <td>
                                            <!-- <a href="modifier-note?id=" target="_blank">
                                                
                                            </a> -->
                                            <button type="button" class="btn btn-note bg-transparent" id="btn-id" data-toggle="modal" data-target="#saisit" data-id="<?php echo $formation['not_id'] ?>"><i class="fas fa-edit text-success awesome-size"></i></button>  
                                        </td>
                                    </tr>
                                    <?php        
                                        }
                                    ?>
                            <?php
                                }
                            }
                            ?>
                            <tr>
                                <th>Note géneral</th>
                                <?php
                                foreach ($notes as $note) {
                                    if ($note['etud_id'] == $id) {
                                ?>
                                    <th colspan="2"><?php echo $note['notegenerale'] ?></th>
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
    </div>
    <!-- Modifier note -->
    <div class="modal fade" id="saisit" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalScrollableTitle">Modifier note</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div id="load_notes"></div>
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function(){
            $(".btn-note").click(function(){
                var note = $("#note").val();
                var ids = $(this).data('id');
                $.post("../functions/traitement.php", {
                        id: ids,
                        action: "modifier_note"
                    }, function(data) {
                        $('#load_notes').html(data);
                })
            })
        })
    </script>
</body>
</html>
<?php
    if (isset($_POST['submit'])) {
        $data->sasirNotes();
    }
    if (isset($_POST['submit_note'])) {
        $data->updateNote();
    }
?>