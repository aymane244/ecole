<?php include_once "session.php";?>
<?php
    if(!isset($_SESSION['etud_cin']) && !isset($_SESSION['etud_motdepasse'])){
        echo "<script>window.location.href='login'</script>";
    }
    $etudiants=$data->getEtudiantFormation();
    $formations = $data->getformation();
    $articles = $data->getArticle();
    $diplomes = $data->getDataDiplome();
    // $attestations = $data->getAttestation();
    $absences = $data->getabsenceetudiant();
    $totalabsences = $data->getTotalAbsence();
    foreach($absences as $absence){
        if($absence['etud_id'] == $_SESSION['id']){
            $totalabsence = $absence['Total_absence'];
        }
        foreach($totalabsences as $total){
            $abs = $total['Total'];
        }
    }
    foreach($etudiants as $etudiant){
        if($_SESSION['id'] == $etudiant['etud_id']){
            $etud_id = $etudiant['etud_id'];
            $etud_email = $etudiant['etud_email'];
            $etud_nom = $etudiant['etud_nom'];
            $etud_nom_arab = $etudiant['etud_nom_arab'];
            $etud_prenom = $etudiant['etud_prenom'];
            $etud_prenom_arab = $etudiant['etud_prenom_arabe'];
            $etud_cin = $etudiant['etud_cin'];
            $etud_image =$etudiant["etud_image"];
            $etud_formation =$etudiant["for_nom"];
            $etud_formation_arab =$etudiant["for_nom_arab"];
            $etud_age =  $etudiant['etud_naissance'];
            $date= date("Y-m-d");
            $naissance = date("Y-m-d", strtotime($etud_age));
            $age = date_diff(date_create($etud_age), date_create($date));
        }
    }
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <?php 
            include_once "includes/header.php";  
            include_once "includes/style.php";
            include_once "includes/scripts.php";
        ?>
        <title><?php echo $navbar['etudiant']?></title>
    </head>
    <body>
        <?php include_once "navbar.php";?>
        <div class="div-background" id="top">
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
            <div class="container-fluid">
                <div class="text-center py-3 text-color mb-3">
                    <h2 class="pt-3 mb-3"><?php echo $navbar['etudiant']?></h2>
                    <hr class="hr-width">
                </div>
                <div class="row py-3 justify-content-around">
                    <div class="col-lg-6 bg-white raduis">
                        <hr class="bg-light">
                        <div class="text-center">
                            <?php
                                if($etud_image === ""){
                                    echo '<img src="images/unknown.jpg" alt="" class="card-image">';
                                }
                            ?>
                            <p><img src="dossiers-stagiaires/<?php echo $etud_prenom.'-'.$etud_nom.'/'.$etud_image ?>" alt=""  class="card-image"></p>
                            <!--<a href="modifier-profile?id=<?php //echo $etudiant['etud_id'] ?>" class="btn btn-info" target="_blank"><i class="fas fa-edit"></i> Modifier mon profile</a>-->
                        </div>
                        <hr class="bg-light">
                        <?php
                            if($_SESSION['lang'] == 'ar'){
                        ?>
                        <h5 class="text-center pb-3" dir="rtl" lang="ar"> التكوين: <?php echo $etud_formation_arab ?></h5>
                        <?php
                            }else{
                        ?>
                        <h5 class="text-center pb-3">Formation: <?php echo $etud_formation ?></h5>
                        <?php
                            }
                        ?>
                        <div class="d-flex justify-content-between">
                            <div>
                                <h5 class="pl-4">Nom: <?php echo $etud_nom ?></h5>
                                <h5 class="pl-4">Prénom: <?php echo $etud_prenom ?></h5>
                            </div>
                            <div>
                                <h5 class="pr-4 text-right" dir="rtl" lang="ar">الاسم العائلي:  <?php echo $etud_nom_arab ?></h5>
                                <h5 class="pr-4 text-right" dir="rtl" lang="ar">الاسم الشخصي: <?php echo $etud_prenom_arab ?></h5>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between">
                            <h5 class="pl-4">Age: <?php echo $age->format('%y');?> ans</h5>
                            <h5 class="pr-4 text-right" dir="rtl" lang="ar">السن: <?php echo $age->format('%y');?> سنة</h5>
                        </div>
                        <div class="d-flex justify-content-between">
                            <h5 class="pl-4">CIN: <?php echo $etud_cin ?></h5>
                            <h5 class="pr-4 text-right" dir="rtl" lang="ar">ر.ب.و: <?php echo $etud_cin ?></h5>
                        </div>

                        <hr class="bg-light">
                        <div class="d-flex align-items-center">
                            <?php
                                if($_SESSION['lang'] == 'ar'){
                            ?>
                            <h5 class="text-center">
                                <span><?php echo $espaceetudiant['presence']?> <?php echo $totalabsence?> / <?php echo $espaceetudiant['seances']?> <?php echo $abs?></span>
                                <progress id="progressBar" value="0" max="<?php echo $abs?>" style="width:300px; height: 30px;" class="ml-3"></progress>
                                <span id="status"></span>
                            </h5>
                            <h5 class="pl-4">:<?php echo $espaceetudiant['avancement']?></h5>
                            <?php        
                                }else{
                            ?>
                                <h5 class="pl-4"><?php echo $espaceetudiant['avancement']?>:</h5>
                                <h5 class="text-center">
                                <span><?php echo $totalabsence?> <?php echo $espaceetudiant['presence']?> / <?php echo $abs?> <?php echo $espaceetudiant['seances']?></span>
                                <progress id="progressBar" value="0" max="<?php echo $abs?>" style="width:300px; height: 30px;" class="ml-3"></progress>
                                <span id="status"></span>
                            </h5>
                            <?php      
                                }
                            ?>
                        </div>
                        <hr class="bg-light">
                        <div class="d-flex justify-content-center">
                            <form action="" method="POST">
                                <input type="hidden" name="student_id" value="<?php echo $etud_id ?? '1'; ?>">
                                <?php
                                    foreach($diplomes as $diplome){
                                        if($_SESSION['id'] == $diplome['etud_id']){
                                            if($diplome['dip_image'] == ''){
                                                echo '<button type="submit" disabled class="btn btn-info button-style">'.$espaceetudiant['envoyee'].'</button>';
                                            }else if(in_array($etud_id, $data->getDiplometId($data->getDataDiplome()) ?? [])){
                                                echo '<a href="mes-documents" class="btn btn-info button-style">'.$espaceetudiant['Diplome'].'</a>';
                                            }
                                        }
                                    }
                                    if(!in_array($etud_id, $data->getDiplometId($data->getDataDiplome()) ?? [])){
                                        echo '<button type="submit" name="diplome_submit" class="btn btn-info button-style">'.$espaceetudiant['Demande_dip'].'</button>';
                                    }
                                ?>
                            </form>    
                            <!-- <form action="" method="POST">
                                <input type="hidden" name="student_id" value="<?php echo $etud_id ?? '1'; ?>">
                                <?php
                                    // foreach($attestations as $attestation){
                                    //     if($_SESSION['id'] == $attestation['etud_id']){
                                    //         if($attestation['att_image'] == ''){
                                    //             echo '<button type="submit" disabled class="btn btn-info button-style ml-3">'.$espaceetudiant['envoyee'].'</button>';
                                    //         }else if(in_array($etud_id, $data->getAttestationtId($data->getDataAttestation()) ?? [])){
                                    //             echo '<a href="mes-documents" class="btn btn-info button-style ml-3">'.$espaceetudiant['Attestation'].'</a>';
                                    //         }
                                    //     }
                                    // }
                                    // if(!in_array($etud_id, $data->getAttestationtId($data->getDataAttestation()) ?? [])){
                                    //     echo '<button type="submit" name="attestation_submit" class="btn btn-info button-style ml-3">'.$espaceetudiant['Demande_att'].'</button>';
                                    // }
                               ?>
                            </form> -->
                        </div>
                        <hr class="bg-light">
                    </div>
                    <div class="col-lg-5 py-3 bg-white raduis">
                        <div class="d-flex justify-content-around">
                            <div class="text-center">
                                <a href="mes-notes"><h3 class="text-color"><?php echo $espaceetudiant['notes']?></h3></a>
                                <a href="mes-notes"><img src="images/view/notes_11zon.jpg" class="img-fluid img-thumbnail img-1 mt-4 mb-2" alt="" style="height:234px"></a>
                            </div>
                            <div class="text-center">
                                <a href="mes-documents"><h3 class="text-color"><?php echo $espaceetudiant['documents']?></h3></a>
                                <a href="mes-documents"><img src="images/view/documents.jpg" class="img-fluid img-thumbnail img-1 mt-4 mb-2" alt="" style="height:234px"></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="div-btn fixed-bottom mb-2 mx-2" id="div-btn">
                <a href="#top" class="btn-top px-3 float-right py-2 rounded"><i class="fas fa-long-arrow-alt-up text-white"></i></a>
            </div>
            <?php include_once "includes/footer.php";?>
        </div>
        <script>
            $(document).ready(function(){
                $(".owl-carousel").owlCarousel();
            });
        </script>
        <script>
            function progress(al){
                var bar = document.getElementById('progressBar');
                var status = document.getElementById("status");
                var numbetud = <?php echo json_encode($totalabsence)?>;
                var absence = <?php echo json_encode($abs)?>;
                //status.innerHTML = al+1+"%";
                bar.value = al;
                al++;
                var simulation = setTimeout("progress("+al+")",100);
                if(al == numbetud){
                   // status.innerHTML = absence+'%';
                    bar.value =numbetud;
                    clearTimeout(simulation);
                }
            }
            var amountLoad = 0;
            progress(amountLoad);
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
    // if($_SERVER['REQUEST_METHOD'] == "POST"){
    //     if (isset($_POST['attestation_submit'])){
    //         $data->addAttestation($_POST['student_id']);
    //     }
    // }
?>