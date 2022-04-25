<?php include_once "session.php";?>
<?php
    if(!isset($_SESSION['username']) && !isset($_SESSION['pwrd'])){
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
        <title>Gestion de formation</title>
    </head>
    <?php
        $id = $_GET['id'];
        $etudiants = $data->getEtudiantNotes();
        foreach($etudiants as $etudiant){
            if($etudiant['for_id'] == $id){
                $fornom = $etudiant['for_nom'];
                $for_id = $etudiant['for_id'];
            }
        }
        $promos = $data->getPromotion();
    ?>
    <body>
        <?php include_once "navbar-admin.php";?>
            <div class="container" id="div-push">
                <div class="text-center pt-3 mb-4">
                    <h2>Gestion de la formation</h2>
                </div>
                <div class="text-center mt-3">
                    <a href="gérer-promotion" target="_blank" class="btn btn-primary">Gérer les promotion</a>
                    <a href="absence?id=<?php echo $for_id ?>" target="_blank" class="btn btn-primary">Gérer l'absence</a>
                    <a href="notes?id=<?php echo $for_id ?>" target="_blank" class="btn btn-primary">Afficher les notes</a>
                </div>
                <div class="text-center pt-5 pb-3">
                    <h3>Liste des stagiaires</h3>
                </div>
                <table class="table table-hover bg-white">
                    <thead class="text-center">
                        <tr>
                            <th scope="col" colspan="9">ARTL Nord</th>
                        </tr>
                        <tr>
                            <th scope = "col" colspan="9"><?= $fornom ?></th>
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
                            $i=1;
                            foreach($etudiants as $etudiant){
                                if($etudiant['for_id'] == $id){
                                    if($etudiant['etud_formation'] != $etudiant['for_id']){
                        ?>  
                        <tr>
                            <th scope="row" colspan="4"><h1>Pas de stagiaires</h1></th>
                        </tr>
                        <?php
                            }else{
                        ?>
                        <tr>
                            <th scope="row"><?php echo $i++ ?></th>
                            <td><?php echo $etudiant['etud_prenom']." ".$etudiant['etud_nom'];?></td>
                            <td><?php echo $etudiant['pro_année'] ?></td>
                            <!--<td>
                                <a download="<?php //echo $etudiant['etud_diplome']?>" href="<?php //echo $etudiant['etud_diplome']?>">
                                    <?php
                                        //if($etudiant['etud_diplome'] == ''){      
                                    ?>
                                    <?php
                                        //}else{
                                        //    echo '<img src="images/PDF_file_icon.svg" style="width:30px">';
                                        //}
                                    ?>
                                </a>
                            </td>-->
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
        <script>
            $(document).ready(function(){
                $(".btn-id" ).click(function() {
                    var ids = $(this).data('id');
                    $.post("functions/traitement.php",{id:ids, action: "student_id"}, function(data){
					    $('#load_data').html(data);
			        })
                });
            })
        </script>
    </body>
</html>