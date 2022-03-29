<?php include_once "session.php";?>
<?php
    if(!isset($_SESSION['etud_cin']) && !isset($_SESSION['etud_motdepasse'])){
        echo "<script>window.location.href='login'</script>";
    }
    $etudiants = $data->getEtudiantMatiereFormation();
    $notes = $data->noteGenerale();
    foreach($etudiants as $etudiant){
        if($_SESSION['id'] == $etudiant['etud_id']){
            $etudnom = $etudiant['etud_nom'];
            $etudprenom = $etudiant['etud_prenom'];
            $fornom = $etudiant['for_nom'];
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
        <title>Mes notes</title>
    </head>
    <body>
        <?php include_once "navbar.php";?>
        <h1 class="py-3 text-center" id="top">Mes notes</h1>
        <div class="container">
            <div class="mx-auto w-75 pb-3">
                <table class="table table-hover mt-5">
                    <thead class="text-center">
                        <tr>
                            <th scope="col" colspan="9">ARTL Nord</th>
                        </tr>
                        <tr>
                            <th scope="col" colspan="9"><?php echo $fornom?></th>
                        </tr>
                        <tr>
                            <th scope="col" colspan="9"><?php echo $etudprenom." ".$etudnom?></th>
                        </tr>
                        <tr>
                            <th scope="col">Matières</th>
                            <th scope="col">Notes</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        <?php
                            foreach($etudiants as $etudiant){
                                if($_SESSION['id'] == $etudiant['etud_id']){
                        ?>
                        <tr>
                            <td scope="row"><?php echo $etudiant['mat_nom'] ?></td>
                            <td><?php echo $etudiant['not_note']?></td>
                        </tr>
                        <?php
                                }
                            }
                        ?>
                        <tr>
                            <td>Note Générale</td>
                            <?php
                                foreach($notes as $note){
                                    if($note['etud_id'] == $_SESSION['id']){
                            ?>
                            <td><?php echo $note['notegenerale']?></td>
                            <?php
                                    }
                                }
                            ?>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="div-btn fixed-bottom mb-2 mx-2" id="div-btn">
            <a href="#top" class="btn-top px-3 float-right py-2 rounded"><i class="fas fa-long-arrow-alt-up text-white"></i></a>
        </div>
        <?php include_once "footer.php";?>
    </body>
</html>