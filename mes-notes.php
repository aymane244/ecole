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
            $etudnom_arab = $etudiant['etud_nom_arab'];
            $etudprenom_arab = $etudiant['etud_prenom_arabe'];
            $fornom = $etudiant['for_nom'];
            $fornom_arab = $etudiant['for_nom_arab'];
            $etud_id = $etudiant['not_etudiant'];
        }
    }
    // foreach($notes as $note){
    //     if($note['etud_id'] == $_SESSION['id']){
    //         print_r(array_column($matieresMessage, 'mat_id')). "<br>";
    //         print_r(array_column($notesMessage, 'not_matiere'));
    //     }
    // }
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
                    <?php
                        if($_SESSION['lang'] =="ar"){
                    ?>
                    <thead class="text-center">
                        <tr>
                            <th scope="col" colspan="9"><?php echo $title['titre']?></th>
                        </tr>
                        <tr>
                            <th scope="col" colspan="9"><?php echo $fornom_arab?></th>
                        </tr>
                        <tr>
                            <th scope="col" colspan="9"><?php echo @$etudprenom_arab." ".@$etudnom_arab?></th>
                        </tr>
                        <tr>
                            <th scope="col"><?php echo $espaceetudiant['note']?></th>
                            <th scope="col"><?php echo $forma['matieres']?></th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        <?php
                            foreach($matieres as $matiere){
                                if($_SESSION['id'] == $matiere['etud_id']){
                        ?>
                        <tr>
                            <td><?php echo $matiere['not_note']?></td>
                            <td scope="row"><?php echo $matiere['mat_nom_arab'] ?></td>
                        </tr>
                        <?php
                                }
                            }
                        ?>
                        <tr>
                            <?php
                                foreach($notes as $note){
                                    if($note['etud_id'] == $_SESSION['id']){
                            ?>
                            <td><b><?php echo $note['notegenerale']?></b></td>
                            <?php
                                    }
                                }
                            ?>
                            <td><b><?php echo $espaceetudiant['general']?></b></td>
                        </tr>
                    </tbody>
                    <?php
                        }else{
                    ?>
                    <thead class="text-center">
                        <tr>
                            <th scope="col" colspan="9"><?php echo $title['titre']?></th>
                        </tr>
                        <tr>
                            <th scope="col" colspan="9"><?php echo @$fornom?></th>
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
                            <td scope="row"><?php echo $matiere['mat_nom'] ?></td>
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
                    <?php      
                        }
                    ?>
                </table>
                <?php                
                    }else{
                ?>
                <h3 class="text-center"><?php echo $pasnotes['pas_notes']?></h3> 
                <?php                       
                    }
                ?>
                <div class="text-center">
                <?php
                    foreach($notes as $note){
                        if($note['etud_id'] == $_SESSION['id']){
                            if($note['notegenerale'] >= 10 && $note1 == $note2){
                ?>
                <h5 class="text-success"> <?php echo $pasnotes['resussi']?></h5>
                <?php
                            }else if($note['notegenerale'] < 10 && $note1 == $note2){
                ?>
                <h5 class="text-danger"> <?php echo $pasnotes['ratrappage']?></h5>
                <?php                
                            }
                            if($note['not_formation'] == 1 && $note1 == $note2 && $note['notegenerale'] >= 10) {
                ?>
                <h5 class="my-3"> <?php echo $pasnotes['inscription']?></h5>
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                    <?php echo $login['inscrire']?>
                </button>
                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <?php
                                    if($_SESSION['lang'] == 'ar'){
                                ?>
                                <div class="text-left">
                                    <button type="button" class="close"  data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true" class="text-left">&times;</span>
                                    </button>
                                </div>
                                <h5 class="modal-title" id="exampleModalLabel"><?php echo $login['inscrire']?> </h5>
                                <?php
                                    }else{
                                ?>
                                <h5 class="modal-title" id="exampleModalLabel"><?php echo $login['inscrire']?> </h5>
                                <button type="button" class="close"  data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true" class="text-left">&times;</span>
                                </button>
                                <?php                
                                    }
                                ?>
                            </div>
                            <div class="modal-body">
                                <form action="" method="post">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <?php
                                                if($_SESSION['lang'] == 'ar'){
                                            ?>
                                            <div class="row mb-3 text-right">
                                                <label for="profesionnel" class="col-md-12 col-form-label text-md-end"><?php echo $inscription['profesionnel']?></label>
                                                <div class="col-md-12">
                                                    <div class="d-flex">
                                                        <i class="fas fa-address-card position-awesome_arab_note"></i>
                                                        <input id="profesionnel" type="text" class="form-control pr-5 text-right" name="profesionnel" autocomplete="profesionnel" placeholder="رقم البطاقة الوطنية">
                                                    </div>
                                                </div>
                                            </div>
                                            <?php
                                                }else{
                                            ?>
                                            <div class="row mb-3">
                                                <label for="profesionnel" class="col-md-8 col-form-label text-md-end"><?php echo $inscription['profesionnel']?></label>
                                                <div class="col-md-12">
                                                    <div class="d-flex">
                                                        <i class="fas fa-address-card position-awesome"></i>
                                                        <input id="profesionnel" type="text" class="form-control pl-5" name="profesionnel" autocomplete="profesionnel" placeholder="Votre numéro de la carte professionelle" value="<?php echo isset($_POST['profesionnel']) ? $_POST['profesionnel'] : ''; ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <?php                
                                                }
                                            ?>
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
                            <div class="modal-footer text-left">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo $accompagenemt['fermer'] ?></button>
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