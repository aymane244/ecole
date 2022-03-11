<?php
    include_once "header.php";
    include_once "navbar.php";
    if(!isset($_SESSION['etud_cin']) && !isset($_SESSION['etud_motdepasse'])){
        echo "<script>window.location.href='login'</script>";
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Espace étudiant</title>
</head>
<?php
    $data = new Etudiant($db);
    $etudiants=$data->getEtudiantFormation();
    $articles = $data->getArticle();
    $diplomes = $data->getDataDiplome();
    $attestations = $data->getAttestation();
?>
<body>
    <div class="div-background">
    <div class="container">
        <?php
            if(isset($_SESSION['status'])){
        ?>
        <div class='alert alert-success text-center mt-2' role='alert'><?php echo $_SESSION['status']?></div>
        <?php
                unset($_SESSION['status']);
            }
        ?>
    </div>
    <div class="container">
        <div class="text-center py-3 text-color mb-3">
            <h2 class="pt-3 mb-3">Espace étudiant</h2>
            <hr class="hr-width">
        </div>
        <div class="row align-items-center bg-white py-3">
            <div class="col-lg-4">
                <div>
                    <?php
                        foreach($etudiants as $etudiant){
                            if($_SESSION['id'] == $etudiant['etud_id']){
                                $etud_id = $etudiant['etud_id'];
                                $etud_email = $etudiant['etud_email'];
                                $etud_nom = $etudiant['etud_nom'];
                                $etud_prenom = $etudiant['etud_prenom'];
                                $etud_cin = $etudiant['etud_cin'];
                                $etud_image =$etudiant["etud_image"];
                                $etud_formation =$etudiant["for_nom"];
                                $etud_age =  $etudiant['etud_naissance'];
                                $date= date("Y-m-d");
                                $naissance = date("Y-m-d", strtotime($etud_age));
                                $age = date_diff(date_create($etud_age), date_create($date));
                    ?>
                    <hr class="bg-light">
                    <div class="">
                        <div class="d-flex justify-content-between align-items-center">
                            <?php
                                if($etud_image === "./images/etudiants/"){
                                    echo '<img src="images/etudiants/unknown_person.jpg" alt="" class="card-image">';
                                }
                            ?>
                            <p><img src="<?php echo $etud_image ?>" alt=""  class="card-image"></p>
                            <a href="modifier_profile?id=<?php echo $etudiant['etud_id'] ?>" class="btn btn-info" target="_blank"><i class="fas fa-edit"></i> Modifier mon profile</a>
                        </div>
                        <hr class="bg-light">
                        <div class="">
                            <h5 class="pl-4">Nom: <?php echo $etud_nom ?></h5>
                            <h5 class="pl-4">Prénom: <?php echo $etud_prenom ?></h5>
                            <h5 class="pl-4">Age: <?php echo $age->format('%y');?> ans</h5>
                            <h5 class="pl-4">CIN: <?php echo $etud_cin ?></h5>
                            <h5 class="pl-4">Formation: <?php echo $etud_formation ?></h5>
                        </div>
                        <hr class="bg-light">
                        <div class="d-flex justify-content-center">
                            <form action="" method="POST">
                                <input type="hidden" name="student_id" value="<?php echo $etud_id ?? '1'; ?>">
                                <?php
                                    foreach($diplomes as $diplome){
                                        if($_SESSION['id'] == $diplome['etud_id']){
                                            if($diplome['dip_image'] == ''){
                                                echo '<button type="submit" disabled class="btn btn-info button-style">Demande envoyée</button>';
                                            }else if(in_array($etud_id, $data->getDiplometId($data->getDataDiplome()) ?? [])){
                                                echo '<a href="mes-documents" class="btn btn-info button-style">Diplome prêt</a>';
                                            }
                                        }
                                    }
                                    if(!in_array($etud_id, $data->getDiplometId($data->getDataDiplome()) ?? [])){
                                        echo '<button type="submit" name="diplome_submit" class="btn btn-info button-style">Demande Diplôme</button>';
                                    }
                                ?>
                            </form>    
                            <form action="" method="POST">
                                <input type="hidden" name="student_id" value="<?php echo $etud_id ?? '1'; ?>">
                                <?php
                                    foreach($attestations as $attestation){
                                        if($_SESSION['id'] == $attestation['etud_id']){
                                            if($attestation['att_image'] == ''){
                                                echo '<button type="submit" disabled class="btn btn-info button-style ml-3">Demande envoyée</button>';
                                            }else if(in_array($etud_id, $data->getAttestationtId($data->getDataAttestation()) ?? [])){
                                                echo '<a href="mes-documents" class="btn btn-info button-style ml-3">Attestation prête</a>';
                                            }
                                        }
                                    }
                                    if(!in_array($etud_id, $data->getAttestationtId($data->getDataAttestation()) ?? [])){
                                        echo '<button type="submit" name="attestation_submit" class="btn btn-info button-style ml-3">Demande Attestation</button>';
                                    }
                                ?>
                            </form>
                        </div>
                        <hr class="bg-light">
                            <?php
                                    }
                                }
                            ?>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 bg-white py-3">
                <div class="row">
                    <div class="col-lg-4 col-sm-12 pt-3 text-center">
                        <a href="mes-notes"><h3 class="text-color">Mes Notes</h3></a>
                        <a href="mes-notes"><img src="images/notes.jpg" class="img-fluid img-thumbnail img-1 mt-4 mb-2" alt="" style="height:234px"></a>
                    </div>
                    <div class="col-lg-4 col-sm-12 pt-3 text-center">
                        <a href="mes-documents"><h3 class="text-color">Mes Documents</h3></a>
                        <a href="mes-documents"><img src="images/documents.jpg" class="img-fluid img-thumbnail img-1 mt-4 mb-2" alt="" style="height:234px"></a>
                    </div>
                    <div class="col-lg-4 col-sm-12 pt-3 text-center">
                        <a href="article"><h3 class="text-color">Actualités</h3></a>
                        <a href="article"><img src="images/actualites.jpg" class="img-fluid img-thumbnail img-1 mt-4 mb-2" alt="" style="height:234px"></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="text-center pt-3 text-color mb-3">
            <h2 class="pt-4">Articles</h2>
            <hr class="hr-width">
        </div>
        <div class="bg-white py-3 px-3">
            <div class="owl-carousel">
                <?php
                    foreach($articles as $article){                 
                ?>
                <div class="px-4">
                    <a href="article-lecture?id=<?php echo $article['art_id']?>"><img src="<?php echo $article['art_image'] ?>" alt="" class="img-fluid img-etudiant"></a>
                    <h5 class="mt-2"><b><a href="article-lecture?id=<?php echo $article['art_id']?>"><?php echo $article['art_titre']?></a></b></h5>
                    <p class="text-length-2"><?php echo $article['art_texte']?></p>
                </div>
                <?php
                    }
                ?>
            </div>
        </div>
    </div>
    <?php
        include_once "footer.php";
    ?>
    </div>

    <script>
        $(document).ready(function(){
            $(".owl-carousel").owlCarousel();
        });
    </script>
</body>
</html>
<?php
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        if (isset($_POST['diplome_submit'])){
            $data->addDiplome($_POST['student_id']);
        }
    }
?>
<?php
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        if (isset($_POST['attestation_submit'])){
            $data->addAttestation($_POST['student_id']);
        }
    }
?>