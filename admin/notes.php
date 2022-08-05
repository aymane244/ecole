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
$matieres = $data->getMatiereFormation();

foreach ($etudiants as $etudiant) {
    if ($etudiant['for_id'] == $id) {
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
    <link rel="shortcut icon" href="../images/view/logo.png" type="image/x-icon">
    <?php
        include_once "../includes/header.php";  
        include_once "../includes/style.php";
        include_once "../includes/scripts.php";
    ?>
    <title>Affichage de note</title>
</head>

<body>
    <?php include_once "navbar-admin.php"; ?>
    <div class="main-content">
        <header>
            <?php include 'admin.php' ?>
        </header>
        <div class="container mt-5 pt-5">
            <div class="text-center py-3">
                <h2><i class="fas fa-graduation-cap"></i> Notes</h2>
            </div>
            <?php
            if (isset($_SESSION['status'])) {
            ?>
                <div class='alert alert-danger text-center mt-2' role='alert'><?php echo $_SESSION['status'] ?></div>
            <?php
                unset($_SESSION['status']);
            }
            ?>
            <div class="row pb-2 justify-content-center">
                <div class="col-md-6 mt-5">
                    <div class="card card-position affichage">
                        <div class="card-header text-center link-font"><i class="fas fa-edit"></i> Afficher les notes</div>
                        <div class="card-body py-5">
                            <form action="" method="POST" enctype="multipart/form-data">
                                <div class="row mb-3">
                                    <label for="categorie" class="col-md-4 col-form-label text-md-end">Formation</label>
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
                                    <label for="categorie" class="col-md-4 col-form-label text-md-end">Stagiaires</label>
                                    <div class="col-md-12">
                                        <div class="d-flex">
                                            <i class="fas fa-user-graduate position-awesome"></i>
                                            <select class="custom-select pl-5" name="etudiants">
                                                <option value="">--Veuillez Choisir un stagiaire--</option>
                                                <?php
                                                    foreach ($etudiants as $etudiant) {
                                                        if ($etudiant['for_id'] == $id && $etudiant['etud_promos'] != "") {
                                                ?>
                                                <option value="<?php echo $etudiant['etud_id'] ?>"><?php echo $etudiant['etud_prenom'] . " " . $etudiant['etud_nom'] ?></option>
                                                <?php
                                                        }
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-0">
                                    <div class="col-md-8 offset-md-4">
                                        <button type="submit" name="submit_note" class="btn btn-primary">Afficher la note</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <?php
                    if (isset($_POST['submit_note'])) {
                        $formations = $data->getEtudiantMatiereFormations();
                        $etuds = $data->getEtudiantId();
                        foreach ($etuds as $etud) {
                            $etud_note_prenom = $etud['etud_prenom'];
                            $etud_note_nom = $etud['etud_nom'];
                        }
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
                                    <?php echo $etud_note_prenom . " " . $etud_note_nom ?>
                                    <input type="hidden" name="forname" value="<?php echo $etud['etud_id'] ?>">
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
                                foreach ($formations as $formation) {
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
                                    <!-- <a href="modifier-note?id=<?php echo $formation['not_id'] ?>" target="_blank">
                                        <i class="fas fa-edit text-success awesome-size"></i>
                                    </a> -->
                                    <button type="button" class="btn btn-notes bg-transparent" id="btn-id" data-toggle="modal" data-target="#note" data-id="<?php echo $formation['not_id'] ?>"><i class="fas fa-edit text-success awesome-size"></i></button> 
                                </td>
                                <?php        
                                    }
                                ?>
                            </tr>
                            <?php
                                }
                            ?>
                            <tr>
                                <th>Note géneral</th>
                                <?php
                                    foreach ($etuds as $etud) {
                                        if($etud['etud_id'] != $etud['not_etudiant']){
                                ?>
                                <th colspan="2">0</th>
                                <?php
                                    }else{
                                ?>
                                <th colspan="2"><?php echo $etud['noteglobal'] ?></th>
                                <?php
                                            }
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
    <div class="modal fade" id="note" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalScrollableTitle">Modifier note</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div id="notes"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function(){
            $(".btn-notes").click(function(){
                var ids = $(this).data('id');
                $.post("../functions/traitement.php", {
                        id: ids,
                        action: "modifier_note"
                    }, function(data) {
                        $('#notes').html(data);
                })
            })
        })
    </script>
</body>

</html>
<?php
    if (isset($_POST['submit_note'])) {
        $data->updateNote();
    }
?>