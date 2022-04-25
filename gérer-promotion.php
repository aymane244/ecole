<?php include_once "session.php";?>
<?php
    if(!isset($_SESSION['username']) && !isset($_SESSION['pwrd'])){
        echo "<script>window.location.href='login-admin'</script>";
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
        <title>Gérer les promotions</title>
    </head>
    <?php 
        $etudiants = $data->getEtudiantPromotion();
        $promos = $data->getPromotion();
    ?>
    <body>
        <?php include_once "navbar-admin.php";?>
        <div class="container">
            <div class="text-center pt-3 mb-4">
                <h2>Gestion de la promotion</h2>
            </div>
            <?php 
                if(isset($_SESSION['status'])){
            ?>
            <div class="alert alert-success text-center" role="alert"><?php echo $_SESSION['status']?></div>
            <?php
                    unset($_SESSION['status']);
                }
            ?>
            <div class="mt-4 text-center">
                <a href="ajouter-promotion" target="_blank" class="btn btn-primary"><i class="fas fa-plus-square"></i> Ajouter une promotion</a>
            </div>
            <table class="table table-hover mt-5 bg-white">
                <thead class="text-center">
                    <tr>
                        <th scope="col" colspan="4">ARTL Nord</th>
                    </tr>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nom complet</th>
                        <th scope="col">Promos</th>
                        <!--<th scope="col">Actions</th>-->
                    </tr>
                </thead>
                <tbody class="text-center">
                    <?php
                        $i=1;
                        foreach($etudiants as $etudiant){
                            if($etudiant['etud_id'] == ''){
                    ?>
                    <th scope="row" colspan="4"><h1>Pas d'étudiants</h1></th>
                    <?php       
                            }else{
                    ?>
                    <tr>
                        <th scope="row"><?php echo $i++ ?></th>
                        <td><?php echo $etudiant['etud_prenom']." ".$etudiant['etud_nom'];?></td>
                        <td>
                            <form action="" method="POST">
                                <div class="d-flex justify-content-center">
                                    <select name="promotion" id="promotion" class="custom-select w-75">  
                                        <option value="<?php echo $etudiant['pro_id']?>"><?php echo $etudiant['pro_année']?></option>
                                    </select>
                                    <button type="button" class="btn btn-primary btn-id ml-2" id="btn-id" data-toggle="modal" data-target="#exampleModal" data-id="<?php echo $etudiant['etud_id'] ?>">Modifier</button>
                                        
                                </div>
                            </form>
                        </td>
                        <!--<td>
                            <form action="" method="POST">
                                <button type="submit" class="btn-style" name="submit" onclick='return confirm("Voulez-vous supprimer cette matière")'>
                                    <i class="fas fa-trash-alt text-danger awesome-size"></i>
                                </button>
                            </form>
                        </td>-->
                    </tr>
                    <?php  
                            }
                        }      
                    ?>
                </tbody>
            </table>
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title text-center" id="exampleModalLabel">Choisir la promotion</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="" method="POST">
                                <div id="load_data"></div>
                                <div class="text-center font-style mt-4">
                                    <button type="submit" class="btn btn-primary mb-3" name="submit_promos">Valider</button>
                                </div> 
                            </form>
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
                    $.post("functions/traitement.php",{id:ids, action: "promotion"}, function(data){
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