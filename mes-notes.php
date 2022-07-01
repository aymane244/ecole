<?php include_once "session.php";?>
<?php
    if(!isset($_SESSION['etud_cin']) && !isset($_SESSION['etud_motdepasse'])){
        echo "<script>window.location.href='login'</script>";
    }
    $etudiants = $data->getEtudiantMatiereFormation();
    $matieres = $data->getEtudiantMatiereFormation();
    $notes = $data->noteGenerale();
    $matieresMessage = $data->getForMatEtud();
    $notesMessage = $data->getNotesEtud();
    $output = array_diff(array_column($matieresMessage, 'mat_id'), array_column($notesMessage, 'not_matiere'));
    $note1 = array_column($matieresMessage, 'mat_id');
    $note2 = array_column($notesMessage, 'not_matiere');
    foreach($etudiants as $etudiant){
        if($_SESSION['id'] == $etudiant['etud_id']){
            $etudnom = $etudiant['etud_nom'];
            $etudprenom = $etudiant['etud_prenom'];
            $fornom = $etudiant['for_nom'];
            $fornom_arab = $etudiant['for_nom_arab'];

        }
        $etud_id = $etudiant['not_etudiant'];
    }
    foreach($notes as $note){
        if($note['etud_id'] == $_SESSION['id']){
            print_r(array_column($matieresMessage, 'mat_id')). "<br>";
            print_r(array_column($notesMessage, 'not_matiere'));
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
        <title><?php echo $espaceetudiant['notes']?></title>
    </head>
    <body>
        <?php include_once "navbar.php";?>
        <h1 class="py-3 text-center" id="top"><?php echo $espaceetudiant['notes']?></h1>
        <div class="container">
            <?php
                if (isset($_SESSION['status'])) {
            ?>
            <div class='alert alert-success text-center mt-2' role='alert'><?php echo $_SESSION['status'] ?></div>
            <?php
                unset($_SESSION['status']);
            }
            ?>
            <div class="mx-auto w-75 pb-3">
                <?php
                    if($_SESSION['id'] == @$etud_id){
                ?>
                <table class="table table-hover mt-5 bg-white">
                    <thead class="text-center">
                        <tr>
                            <th scope="col" colspan="9"><?php echo $title['titre']?></th>
                        </tr>
                        <tr>
                        <?php
                            if($_SESSION['lang'] =="ar"){
                        ?>
                            <th scope="col" colspan="9"><?php echo $fornom_arab?></th>
                        <?php
                            }else{
                        ?>
                         <th scope="col" colspan="9"><?php echo @$fornom?></th>
                        <?php      
                            }
                        ?>
                        </tr>
                        <tr>
                            <th scope="col" colspan="9"><?php echo @$etudprenom." ".@$etudnom?></th>
                        </tr>
                        <tr>
                            <th scope="col"><?php echo $forma['matieres']?></th>
                            <th scope="col"><?php echo $espaceetudiant['note']?></th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        <?php
                            foreach($matieres as $matiere){
                                if($_SESSION['id'] == $matiere['etud_id']){
                        ?>
                        <tr>
                            <?php
                                if($_SESSION['lang'] =="ar"){
                            ?>
                            <td scope="row"><?php echo $matiere['mat_nom_arab'] ?></td>
                            <?php
                                }else{
                            ?>
                            <td scope="row"><?php echo $matiere['mat_nom'] ?></td>
                            <?php      
                                }
                            ?>
                            <td><?php echo $matiere['not_note']?></td>
                        </tr>
                        <?php
                                }
                            }
                        ?>
                        <tr>
                            <td><b><?php echo $espaceetudiant['general']?></b></td>
                            <?php
                                foreach($notes as $note){
                                    if($note['etud_id'] == $_SESSION['id']){
                            ?>
                            <td><b><?php echo $note['notegenerale']?></b></td>
                            <?php
                                    }
                                }
                            ?>
                        </tr>
                    </tbody>
                </table>
                <?php                
                    }else{
                ?>
                <h3 class="text-center">Pas de note</h3> 
                <?php                       
                    }
                ?>
                <div class="text-center">
                <?php
                    foreach($notes as $note){
                        if($note['etud_id'] == $_SESSION['id']){
                            if($note['notegenerale'] >= 10 && $note1 == $note2){
                ?>
                <h5 class="text-success"> Félicitaion vous avez bien passé votre module</h5>
                <?php
                            }else if($note['notegenerale'] < 10 && $note1 == $note2){
                ?>
                <h5 class="text-danger"> Vous devez passer votre ratrappage</h5>
                <?php                
                            }
                            if($note['not_formation'] == 1){
                ?>
                <h5 class="my-3"> Inscrivez-vous pour la formation des conducteurs professionnels ci-dessous</h5>
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                    Inscription
                </button>
                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Inscription </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="" method="post">
                                    <div class="row">
                                        <div class="col-md-12" id="div-carte">
                                            <div class="row mb-3">
                                                <label for="profesionnel" class="col-md-8 col-form-label text-md-end"><?php echo $inscription['profesionnel']?></label>
                                                <div class="col-md-12">
                                                    <div class="d-flex">
                                                        <i class="fas fa-address-card position-awesome"></i>
                                                        <input id="profesionnel" type="text" class="form-control pl-5" name="profesionnel" autocomplete="profesionnel" placeholder="Votre numéro de la carte professionelle" value="<?php echo isset($_POST['profesionnel']) ? $_POST['profesionnel'] : ''; ?>">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row justify-content-center mt-3">
                                        <div class="col-md-12 text-center">
                                            <?php
                                                $formations = $data->getformation();                
                                                foreach($formations as $formation){
                                                    if($formation['for_id'] == 2){
                                            ?>
                                            <input type="hidden" name="for_id" value="<?php echo $formation['for_id'] ?>">
                                            <?php
                                                    }
                                                }
                                            ?>
                                            <?php              
                                                foreach($matieres as $matiere){
                                                    if($_SESSION['id'] == $matiere['etud_id']){
                                            ?>
                                            <input type="hidden" name="not_id[]" value="<?php echo $matiere['not_id'] ?>">
                                            <?php
                                                    }
                                                }
                                            ?>
                                            <?php              
                                            $counts = $data->countNotes();
                                                foreach($counts as $count){
                                                    if($_SESSION['id'] == $count['etud_id']){
                                            ?>
                                            <input type="text" name="not_count" value="<?php echo $count['total_not'] ?>">
                                            <?php
                                                    }
                                                }
                                            ?>
                                            <button type="submit" class="btn btn-primary" name="submit" id="submit_inscri"><?php echo $inscription['inscrire']?></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                            </div>
                        </div>
                    </div>
                </div>
                <?php              
                            }
                        }
                    }
                ?>
                </div>
            </div>
        </div>
        <div class="div-btn fixed-bottom mb-2 mx-2" id="div-btn">
            <a href="#top" class="btn-top px-3 float-right py-2 rounded"><i class="fas fa-long-arrow-alt-up text-white"></i></a>
        </div>
        <?php include_once "footer.php";?>
    </body>
</html>
<?php
if (isset($_POST['submit'])) {
    // $data->updateEtudFormation();
    $data->insertEtudiant();
    // $data->deleteNote($_POST['not_id']);
}
?>