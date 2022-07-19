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
$seances = $data->getFormationMatiere();
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
                    <button type="button" class="btn btn-primary btn-id" data-toggle="modal" data-target="#promotion" data-id="<?php echo $for_id ?>">Ajouter Promotion</button>
                    <button type="button" class="btn btn-primary btn-id" data-toggle="modal" data-target="#absence" data-id="<?php echo $for_id ?>">Marquer l'absence</button>
                    <a href="absence?id=<?php echo $for_id ?>" target="_blank" class="btn btn-primary">Etat d'absence</a>
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
                                        <button type="button" class="btn btn-primary btn-id-promotion" id="btn-id" data-toggle="modal" data-target="#saisit" data-id="<?php echo $etudiant['etud_id'] ?>">Saisir</button>  
                                        <?php     
                                            }else{
                                        ?>
                                        Promotion <?php echo $etudiant['pro_groupe'] ?>
                                        <?php     
                                            }
                                        ?>
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-primary btn-id" data-toggle="modal" data-target="#information" data-id="<?php echo $etudiant['etud_id'] ?>">Détails</button>
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
            <!-- information etudiant modal -->
            <div class="modal fade" id="information" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
            <!-- Saisir promotion pour etudiant -->
            <div class="modal fade" id="saisit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title text-center" id="exampleModalLabel">Saisir la promotion</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div id="load_students"></div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Absence modal -->
            <div class="modal fade" id="absence" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title text-center" id="exampleModalLabel">Veuillez choisir un module</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="container">
                                <i class="fa-solid fa-circle-arrow-left" style="font-size:30px; display:none; cursor:pointer" id="retour"></i>
                            </div>
                            <div id="moduleform">
                                <div class="row justify-content-center">
                                    <div class="col-md-8">
                                        <h4 class="my-4 text-center">Avant de poursuivre veuillez choisir un module et une promtion pour la <?php echo $fornom ?></h4>
                                    </div>
                                    <div class="col-md-10">
                                        <div id="error"></div>
                                        <i class="fas fa-folder-open position-awesome"></i>
                                        <select class="custom-select px-5" name="module" id="module">
                                            <option selected value="">--Choisir la module--</option>
                                            <?php
                                                foreach ($seances as $seance) {
                                                    if ($seance['for_id'] == $id) {
                                            ?>
                                            <option value="<?php echo $seance['mat_id'] ?>"><?php echo $seance['mat_nom'] ?></option>
                                            <?php
                                                    }
                                                }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="mt-2 col-md-10">
                                        <i class="fas fa-folder-open position-awesome"></i>
                                        <select class="custom-select pl-5" name="promo" id="promo">
                                            <option selected value="">--Choisir une promotion--</option>
                                            <?php
                                                foreach ($promos as $promo) {
                                                    if($for_id == $promo['pro_formation']){
                                            ?>
                                            <option value="<?php echo $promo['pro_id'] ?>">Promotion <?php echo $promo['pro_groupe'] ?></option>
                                            <?php
                                                    }
                                                }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="col-md-10 mt-2">
                                        <button type='submit' class="btn btn-primary submit_module" name="submit_module">Choisir</button>
                                    </div>
                                </div>
                            </div>
                            <div id="load"></div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Ajout de promotion modal -->
            <div class="modal fade" id="promotion" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title text-center" id="exampleModalLabel">Ajouter promotion</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <h4 class="my-4 text-center">Veuillez Ajouter une promotion</h4>
                            <form action="" method="post">
                                <div class="row justify-content-center">
                                    <div class="col-md-10">
                                        <i class="fas fa-folder-open position-awesome"></i>
                                        <select class="custom-select pl-5" name="formation">
                                            <option value="<?php echo $for_id ?>"><?php echo $fornom ?></option>
                                        </select>
                                    </div>
                                    <div class="col-md-10 mt-3">
                                        <div class="d-flex">
                                            <i class="fas fa-folder-open position-awesome"></i>
                                            <input id="activity" type="text" class="form-control pl-5" name="promotion_name" autocomplete="activity" placeholder="Nom de la promotion" required>
                                        </div>
                                    </div>
                                    <div class="col-md-10 my-3">
                                        <button type="submit" class="btn btn-primary" name="submit_promotion">Ajouter la prmotion</button>
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
                    $.post("../functions/traitement.php", {
                        id: ids,
                        action: "student_id"
                    }, function(data) {
                        $('#load_data').html(data);
                    })
                });
                $(".btn-id-promotion").click(function() {
                    var ids = $(this).data('id');
                    $.post("../functions/traitement.php", {
                        id: ids,
                        action: "student_promotion"
                    }, function(data) {
                        $('#load_students').html(data);
                    })
                });
                $(".submit_module").click(function() {
                    var module = $("#module").val();
                    var promo = $("#promo").val();
                    if(module == ''){
                        $('#error').show();
                        $('#error').html('<div class="alert alert-danger text-center mt-2" role="alert" id="btn-fermer">Veuillez choisir un module</div>');
                    }else if(promo == ''){
                        $('#error').show();
                        $('#error').html('<div class="alert alert-danger text-center mt-2" role="alert" id="btn-fermer">Veuillez choisir une promotion</div>');
                    }else{
                        $('#error').hide();
                        $('#error').hide();
                        $("#moduleform").hide();
                        $("#retour").show();
                        $.post("../functions/traitement.php", {
                        module:module,
                        promo:promo,
                        action: "module_submit"
                        }, function(data) {
                            $('#load').show();
                            $('#load').html(data);
                        })
                    }
                    $("#retour").click(function(){
                        $("#moduleform").show();
                        $('#load').hide();
                        $("#retour").hide();
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
    if (isset($_POST['submit_promotion'])) {
        $data->insertPromotion();
    }
    if (isset($_POST['absence_submit'])) {
        $data->insertAbsence();
    }
?>