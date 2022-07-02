<?php include_once "session.php"; ?>
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
    <?php
    include_once "header.php";
    include_once "style.php";
    include_once "scripts.php";
    ?>
    <style>
    .modal {
  		padding: 0 !important;
	}
	.modal .modal-dialog {
  		width: 100%;
  		max-width: none;
  		height: 100%;
  		margin: 0;
	}
	.modal .modal-content {
  		height: 100%;
  		border: 0;
  		border-radius: 0;
	}
	.modal .modal-body {
  		overflow-y: auto;
	}
    </style>
    <title>Gestion de formation</title>
</head>
<?php
$id = $_GET['id'];
$etudiants = $data->getEtudiantNotes();
foreach ($etudiants as $etudiant) {
    if ($etudiant['for_id'] == $id) {
        $fornom = $etudiant['for_nom'];
        $for_id = $etudiant['for_id'];
        $etud_nom = $etudiant['etud_nom'];
        $etud_prenom = $etudiant['etud_prenom'];
        $etud_id = $etudiant['etud_id'];
    }
}
$promos = $data->getPromotion();
?>

<body>
    <?php include_once "navbar-admin.php"; ?>
    <div class="main-content">
        <header>
            <?php include 'admin.php' ?>
        </header>
        <div class="container mt-5 pt-5">
            <?php 
                if(isset($_SESSION['status'])){
            ?>
            <div class="alert alert-success text-center mt-2" role="alert"><?php echo $_SESSION['status']?></div>
            <?php
                    unset($_SESSION['status']);
                }
            ?>
            <div class="text-center py-3">
                <h2>Gestion de la formation</h2>
            </div>
            <div class="text-center mt-4">
                <?php
                foreach ($etudiants as $etudiant) {
                    if ($etudiant['for_id'] == $id) {
                        if ($etudiant['etud_formation'] != $etudiant['for_id']) {
                            $class = 'd-none';
                        } else {
                            $class = 'd-block';
                        }
                    }
                }
                ?>
                <div class="<?php echo $class ?>">
                    <a href="gérer-promotion" target="_blank" class="btn btn-primary">Gérer les promotion</a>
                    <a href="absence?id=<?php echo $for_id ?>" target="_blank" class="btn btn-primary">Gérer l'absence</a>
                    <a href="notes?id=<?php echo $for_id ?>" target="_blank" class="btn btn-primary">Afficher les notes</a>
                </div>
            </div>

            <div class="text-center pt-5 pb-3">
                <h3>Liste des stagiaires</h3>
            </div>
            <table class="table table-hover bg-white">
                <thead class="text-center text-white" style="background-color: #11101d;">
                    <tr>
                        <th scope="col" colspan="9">ARTL Nord</th>
                    </tr>
                    <tr>
                        <th scope="col" colspan="9"><?= $fornom ?></th>
                    </tr>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nom complet</th>
                        <th scope="col">Promotion</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    <?php
                    $i = 1;
                    foreach ($etudiants as $etudiant) {
                        if ($etudiant['for_id'] == $id) {
                            if ($etudiant['etud_formation'] != $etudiant['for_id']) {
                    ?>
                                <tr>
                                    <th scope="row" colspan="4">
                                        <h2>Pas de stagiaires</h2>
                                    </th>
                                </tr>
                            <?php
                            } else {
                            ?>
                                <tr>
                                    <th scope="row"><?php echo $i++ ?></th>
                                    <td><?php echo $etudiant['etud_prenom'] . " " . $etudiant['etud_nom']; ?></td>
                                    <td>
                                        <?php
                                            if($etudiant['etud_promos'] == 0 ){
                                        ?>
                                        <b>Veuillez saisir la promotion</b>
                                        <button type="button" class="btn btn-primary btn-id" id="btn-id" data-toggle="modal" data-target="#modal" data-id="<?php echo $etudiant['etud_id'] ?>">Saisir</button>  
                                        <?php     
                                            }else{
                                        ?>
                                        Promotion <?php echo $etudiant['pro_groupe'] ?>
                                        <?php     
                                            }
                                        ?>
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-primary btn-id" id="btn-id" data-toggle="modal" data-target="#exampleModal" data-id="<?php echo $etudiant['etud_id'] ?>">Détails</button>
                                        <a href="saisir-notes?id=<?php echo $etudiant['etud_id'] ?>" target="_blank" class="btn btn-primary">Saisir les notes</a>
                                    </td>
                                </tr>
                    <?php
                            }
                        }
                    }
                    ?>
                </tbody>
            </table>
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title text-center" id="exampleModalLabel">Informations personnelles</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div id="load_data">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title text-center" id="exampleModalLabel">Saisir la promotion</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <?php 
                                $promos = $data->getEtudiantPromotion();
                            ?>
                            <h6 class="my-3">Veuillez choisir la promotion de l'étudiant <?php echo $etud_prenom." ".$etud_nom?></h6>
                            <form action="" method="post">
                                <div class="d-flex">
                                    <i class="fas fa-folder-open position-awesome"></i>
                                    <select class="custom-select pl-5" name="promotion">
                                        <option selected value="">--Choisir promotion--</option>
                                        <?php
                                            foreach($promos as $promo){
                                        ?>
                                        <option value="<?php echo $promo['pro_id'] ?>">Promotion <?php echo $promo['pro_groupe'] ?></option>
                                        <?php
                                            }
                                        ?>
                                    </select>
                                </div>
                                <div class="row justify-content-center my-3">
                                    <div class="col-md-12 text-center">
                                        <input type="hidden" name="etudiant" id="" value="<?php echo $etud_id?>">
                                        <button type="submit" class="btn btn-primary" name="submit_promos">Saisir</button>
                                    </div>
                                </div>
                            </form>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>
            $(document).ready(function() {
                $(".btn-id").click(function() {
                    var ids = $(this).data('id');
                    $.post("functions/traitement.php", {
                        id: ids,
                        action: "student_id"
                    }, function(data) {
                        $('#load_data').html(data);
                    })
                });
            })
        </script>
</body>

</html>
<?php
    if(isset($_POST['submit_promos'])){
        $data->updatePromotion();
    }
?>