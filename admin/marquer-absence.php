<?php include_once "../session.php"; ?>
<?php
if (!isset($_SESSION['username']) && !isset($_SESSION['pwrd'])) {
    echo "<script>window.location.href='index'</script>";
}
$etudiants = $data->getFormationMatiereEtudiant();
$promos = $data->getPromotion();
$seances = $data->getFormationMatiere();
// $formations = $data->getformation();
$total_etudiants = $data->etudiantTotal();
// $students = $data->getEtudiantPromos();
if (!isset($_GET['id'])) {
    echo "<script>window.location.href='formations'</script>";
}
$id = $_GET['id'];
foreach ($seances as $seance) {
    if ($seance['mat_id'] == $id) {
        $matiere_nom =  $seance['mat_nom'];
        $matiere_id =  $seance['mat_id'];
        $formation_nom =  $seance['for_nom'];
        $for_id =  $seance['for_id'];
    }
}
foreach ($total_etudiants as $total_etudiant) {
    if ($total_etudiant['mat_id'] == $id) {
        $total = $total_etudiant['total_etudiant'];
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
    <title>Absence</title>
</head>

<body>

        <div class="container mt-5 pt-5">
            <div class="text-center py-3">
                <h2><i class="fas fa-user-check"></i> Absence</h2>
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
            if (isset($_SESSION['status_error'])) {
            ?>
                <div class='alert alert-danger text-center mt-2' role='alert'><?php echo $_SESSION['status_error'] ?></div>
            <?php
                unset($_SESSION['status_error']);
            }
            ?>
            <form action="" method="post">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="d-flex mt-4">
                            <i class="fas fa-folder-open position-awesome"></i>
                            <select class="custom-select pl-5" name="promotion" onchange="affichage()" id="promotion">
                                <option selected value="">--Choisir la promotion--</option>
                                <?php
                                foreach ($promos as $promo) {
                                ?>
                                    <option value="<?php echo $promo['pro_id'] ?>">Promotion <?php echo $promo['pro_groupe'] ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-1 mt-4">
                        <button type='submit' class="btn btn-primary" name="submit_promotion">Choisir</button>
                    </div>
                </div>
            </form>
            <?php
                if (!isset($_POST['submit_promotion'])) {
            ?>
                <h3 class="text-center mt-4">Veuillez séléctionner une promotion avent de poursuivre</h3>
            <?php
                } else {
                    if($_POST['promotion'] !=''){ 
            ?>
                <form action="" method="POST">
                    <div class="text-center py-3">
                        <h2><?php echo $formation_nom ?></h2>
                        <input type="hidden" value="<?php echo $for_id ?>" name="absence_formation">
                    </div>
                    <div class="d-flex justify-content-around mt-3">
                        <h2><?php echo $matiere_nom ?></h2>
                        <input type="hidden" value="<?php echo $matiere_id ?>" name="absence_matiere">
                        <div class="d-flex">
                            <i class="fas fa-calendar position-awesome"></i>
                            <input id="absence_date" type="date" class="form-control pl-5" name="absence_date">
                        </div>
                    </div>
                    <div id="errors"></div>
                    <table class="table table-bordered mt-5 bg-white">
                        <thead class="text-center text-white" style="background-color: #11101d;">
                            <tr>
                                <th scope="col" colspan="5">ARTL Nord</th>
                            </tr>
                            <tr>
                                <th scope="col" colspan="5">
                                    <?php 
                                        foreach ($total_etudiants as $total_etudiant) {
                                            if ($total_etudiant['mat_id'] == $id) {
                                                if($total_etudiant['etud_promos'] == $_POST['promotion'] ){
                                    ?>
                                    Total etudiants: <?php echo $total ?>
                                    <input type="hidden" value="<?php echo $total ?>" name="number_etudiant">
                                    <?php 
                                                }else{
                                    ?>
                                    Total etudiants : 0
                                    <input type="hidden" value="<?php echo $total ?>" name="number_etudiant">
                                    <?php  
                                                }
                                            }
                                        }
                                    ?>
                                </th>
                            </tr>
                            <tr>
                                <th scope="col">Etudiants</th>
                                <th scope="col">Promotion</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            <?php   
                                foreach ($etudiants as $etudiant) {
                                    if ($etudiant['mat_id'] == $id) {
                            ?>
                                    <tr>
                                    <td>
                                        <?php echo $etudiant['etud_nom'] . " " . $etudiant['etud_prenom'] ?>
                                        <input type="hidden" value="<?php echo $etudiant['etud_id'] ?>" name="absence_etudiant[]">
                                    </td>
                                    <td>
                                        <div class="row justify-content-center">
                                            <div class="col-md-8">
                                                <div class="d-flex">
                                                    <i class="fas fa-user-check position-awesome"></i>
                                                    <select class="custom-select pl-5" name="absence[]" id="absence">
                                                        <option selected value="Présent">Présent</option>
                                                        <option value="Absent">Absent</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            <?php 
                                    }
                                }
                            ?>
                        </tbody>
                    </table>
                    <div class="text-center py-3">
                        <button class="btn btn-primary" type="submit" name="absence_submit" id="submit">Valider</button>
                    </div>
                </form>
            <?php
                    }
                }
            ?>
        </div>
    </div>
    <script>
        $(document).ready(function(){
            $("#submit").click(function(e){
                var date = $("#absence_date").val();
                var today = new Date();
                var dd = String(today.getDate()).padStart(2, '0');
                var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
                var yyyy = today.getFullYear();
                today = yyyy + '-' + mm + '-' + dd;
                if(date == ''){
                    e.preventDefault();
                    alert(today+' '+ date)
                    $('#errors').html('<div class="alert alert-danger text-center mt-2" role="alert" id="btn-fermer">Veuillez saisir une date</div>');
                }else if(date > today){
                    e.preventDefault();
                    alert(today+' '+ date)
                    $('#errors').html('<div class="alert alert-danger text-center mt-2" role="alert" id="btn-fermer">La date saisit ne doit pas être supérieure à la date d\'ajourd\'hui</div>');
                }
            })
        })
    </script>
</body>

</html>
<?php
if (isset($_POST['absence_submit'])) {
    $data->insertAbsence();
}
?>