<?php include_once "session.php";?>
<?php
    if(!isset($_SESSION['etud_cin']) && !isset($_SESSION['etud_motdepasse'])){
        echo "<script>window.location.href='login'</script>";
    }
    $etudiants = $data->getEtudiantMatiereFormation();
    $matieres = $data->getEtudiantMatiereFormation();
    $notes = $data->noteGenerale();
    foreach($etudiants as $etudiant){
        if($_SESSION['id'] == $etudiant['etud_id']){
            $etudnom = $etudiant['etud_nom'];
            $etudprenom = $etudiant['etud_prenom'];
            $fornom = $etudiant['for_nom'];
            $fornom_arab = $etudiant['for_nom_arab'];
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
            <div class="mx-auto w-75 pb-3">
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
                         <th scope="col" colspan="9"><?php echo $fornom?></th>
                        <?php      
                            }
                        ?>
                        </tr>
                        <tr>
                            <th scope="col" colspan="9"><?php echo $etudprenom." ".$etudnom?></th>
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
                <div class="text-center" style="display:none">
                <?php
                    foreach($notes as $note){
                        if($note['etud_id'] == $_SESSION['id']){
                            if($note['notegenerale'] > 9){
                ?>
                <h5 class="text-success"> Félicitaion vous avez bien passé votre module</h5>
                <?php
                            }else{
                ?>
                <h5 class="text-success"> Vous devez passer votre ratrappage</h5>
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