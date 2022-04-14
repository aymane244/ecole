<?php include_once "session.php";?>
<?php
    if(!isset($_SESSION['username']) && !isset($_SESSION['pwrd'])){
        echo "<script>window.location.href='login-admin'</script>";
    }
    include_once 'etudiant.php';
    include_once 'functions/db.php';
    $db = new DBController();
    $data = new Etudiant($db);
    //$etudiants = $data->getEtudiantForma();
    $result = $db->conn->query("SELECT `etud_id` FROM `etudiant` INNER JOIN `formation` ON for_id=etud_formation");
    $per_page = 5;
    $start = 0;
    $current_page = 1;
    $record = $result->num_rows; 
    if(isset($_GET['page'])){
        $start=$_GET['page'];
        if($start <=0){
            $start = 0;
            $current_page = 1;
        }else{
            $current_page = $start;
            $start--;
            $start = $start*$per_page;
        }
    }
    $pages = ceil($record/$per_page);
        $result = $db->conn->query("SELECT * FROM `etudiant` INNER JOIN `formation` ON for_id=etud_formation LIMIT $start, $per_page");
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
        <title>Etudiants</title>
    </head>
    <body>
        <?php include_once "navbar-admin.php";?>
            <div class="container" id="div-push">
                <?php
                    if(isset($_SESSION['status'])){
                ?>
                <div class='alert alert-success text-center mt-2' role='alert'><?php echo $_SESSION['status']?></div>
                <?php
                        unset($_SESSION['status']);
                    }
                ?>
                <div class="text-center py-5">
                    <h2><i class="fas fa-user-graduate"></i> Page étudiant</h2>
                </div>
                <div class="d-flex mt-3">
                    <i class="fas fa-search position-awesome"></i>
                    <input type="text" class="form-control px-5" id="search" placeholder="Chercher un etudiant" name="nom">
                </div>
                <table class="table bg-white table-bordered mt-5">
                    <thead class="text-center">
                        <tr>
                            <th scope="col" colspan="9">ARTL Nord</th>
                        </tr>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Formation</th>
                            <th scope="col">Nom complet</th>
                        </tr>
                    </thead>
                    <tbody class="text-center"  id="result">
                        <?php
                            if($result->num_rows <= 0){
                        ?>
                        <tr>
                            <th scope="col" colspan="4"><h1>Pas d'étudiants</h1></th>
                        </tr>
                        <?php
                            }else{
                                $i=1;
                                while($etudiant = $result->fetch_assoc()){
                        ?>
                        <tr>
                            <th scope="row"><?php echo $i++ ?></th>
                            <td><?php echo $etudiant['for_nom'];?></td>
                            <td><?php echo $etudiant['etud_prenom']." ".$etudiant['etud_nom'];?></td>
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
                        </tr>
                        <?php
                                }
                            }
                        ?>
                    </tbody>
                </table>
                <nav aria-label="Page navigation example" class="pb-1">
                    <ul class="pagination">
                        <?php
                            for($n=1;$n<=$pages;$n++){
                                $calss ='';
                                if($current_page == $n){
                                    $calss ="active";
                                }
                        ?>
                        <li class="page-item <?php echo $calss ?> ml-2"><a class="page-link" href="?page=<?php echo $n ?>"><?php echo $n ?></a></li>
                        <?php
                            }
                        ?>
                    </ul>
                </nav>
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