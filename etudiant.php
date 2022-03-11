<?php
    include_once "header.php";
    include_once "navbar_admin.php";
    $data = new Etudiant($db);
        if(!isset($_SESSION['username']) && !isset($_SESSION['pwrd'])){
        echo "<script>window.location.href='login_admin'</script>";
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Etudiants</title>
</head>
<?php
    //$etudiants = $data->getEtudiantFormation();
    $etudiants = $data->getEtudiantForma();
?>
<body>
    <div class="container" id="div-push">
        <?php
            if(isset($_SESSION['status'])){
        ?>
        <div class='alert alert-success text-center mt-2' role='alert'><?php echo $_SESSION['status']?></div>
        <?php
                unset($_SESSION['status']);
            }
        ?>
        <div class="text-center my-3">
            <h2><i class="fas fa-user-graduate"></i> Page étudiant</h2>
        </div>
        <div class="d-flex mt-3">
            <i class="fas fa-search position-awesome"></i>
            <input type="text" class="form-control px-5" id="search" placeholder="Chercher un etudiant" name="nom">
        </div>
        <div></div>
        <table class="table table-hover mt-5">
            <thead class="text-center">
                <tr>
                    <th scope="col" colspan="9">ARTL Nord</th>
                </tr>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Formation</th>
                    <th scope="col">Nom complet</th>
                    <th scope="col">diplôme</th>
                </tr>
            </thead>
            <tbody class="text-center"  id="result">
                <?php
                    $i=1;
                    foreach($etudiants as $etudiant){
                ?>
                <tr>
                    <th scope="row"><?php echo $i++ ?></th>
                    <td><?php echo $etudiant['for_nom'];?></td>
                    <td><?php echo $etudiant['etud_prenom']." ".$etudiant['etud_nom'];?></td>
                    <td><!--<embed  src="<?php //echo $etudiant['etud_diplome']?>" type="application/pdf" loading="lazy" style="max-width:134px"> <br>--> 
                        <a download="<?php echo $etudiant['etud_diplome']?>" href="<?php echo $etudiant['etud_diplome']?>">
                            <?php
                                if($etudiant['etud_diplome'] == ''){      
                            ?>
                            <?php
                                }else{
                                    echo '<img src="images/PDF_file_icon.svg" style="width:30px">';
                                }
                            ?>
                        </a>
                    </td>
                    <td>
                        <!--<a href="saisir_notes?id=<?php ////echo $etudiant['etud_id'] ?>" target="_blank" class="btn btn-primary">Saisir les notes</a>-->
                        <!--<button type="button" class="btn btn-primary btn-id" id="btn-id" data-toggle="modal" data-target="#exampleModal" data-id="<?php // echo $etudiant['etud_id'] ?>">Détails</button>-->
                    </td>
                </tr>
                <?php
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
    <script>
        $(document).ready(function(){
            $("#search").keyup(function() {
                var nom = $("#search").val();
                $.post( "functions/traitement.php",{nom: nom, action:'search_student'}, function(result) {
                    $('#result').html(result);
                });
            });
        })
    </script>
</body>
</html>