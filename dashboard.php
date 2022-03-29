<?php include_once "session.php";?>
<?php
    if(!isset($_SESSION['username']) && !isset($_SESSION['pwrd'])){
        echo "<script>window.location.href='login-admin'</script>";
    }
    $etudparforma = $data->getEtudiantparFormation();
    $etudianttotal = $data->getEtudiantTotal();
    $formatotlal = $data->getFormationTotal();
    $proftotal = $data->getProfTotal();
    $etudiantsinscrit = $data->getEtudiantInscri();
    $articles =$data->getTotalArtciles();
    $totals = $data->getTotalComments();
    $diplomes = $data->getDiplome();
    $attestations = $data->getAttestation();
    $reservations = $data->getReservations();
    $etuds = $data->getEtudiantTotalDate();
    $dates = $data->getReservationsDate();
    $counts = $data->getReservationsCount();
    $i=1;
    foreach($etudparforma as $etud){
        $nombreEtudiant[] = $etud['nombre_total'];
        $formation[] = $etud['for_nom'];
    }
    foreach($etudianttotal as $total){
        $total_etud = $total['nombre_total'];
    }
    foreach($formatotlal as $total){
        $total_forma = $total['nombre_total'];
    }
    foreach($proftotal as $total){
        $total_prof = $total['nombre_total'];
    }
    foreach($articles as $article){
        $total_article = $article['total_article'];
    }
    foreach($totals as $total){
        $com_total = $total['commentaires'];
    }
    foreach($etuds as $etud){
        $etudiantdate = $etud['nombre_total'];
    }
    foreach($counts as $count){
        $sallenumb = $count['reservations'];
    }
    foreach($dates as $date){
        $salledate = $date['reservations_date'];
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
        <title>Dashboard</title>
    </head>
    <body>
        <div class="div-background">
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
                <div class="text-center pt-3 text-color mb-4">
                    <h2 class="pt-4"><i class="fas fa-tachometer-alt"></i> Tableau de bord de l'institut</h2>
                    <hr class="hr-width">
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="bg-white w-100 rounded px-3 py-3 text-color" style="height:100%">
                            <h4>Total de stagiaires: <label id="value_etud"><?php echo $total_etud?></label></h4>
                            <div class="div-progress mx-auto">
                                <div id="myBar" class="bar"></div>
                            </div>
                            <h4 class="mt-4">Total des formateurs: <label id="value_prof"><?php echo $total_prof?></label></h4>
                            <div class="div-progress mx-auto">
                                <div id="myBar3" class="bar"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 text-center">
                        <div class="bg-white w-100 rounded px-3 py-3 text-color" style="height:100%">
                            <h4>Articles publiés: <br> <label id="value_article"><?php echo $total_article?></label></h4>
                            <h4 class="mt-3">Commentaires ecrits: <br><label id="value_comm"><?php echo $com_total?></label></h4>
                        </div>
                    </div>
                    <div class="col-md-4 text-center">
                        <div class="bg-white w-100 rounded px-3 py-3 text-color" style="height:100%">
                            <h4>Date: <label id=""><?php echo date("d/m/Y")?></label></h4>
                            <h4 class="mt-5">Etudiants inscrits aujourd'hui: <br> <label id="value_etud_date"><?php echo $etudiantdate?></label></h4>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="text-center pt-3 text-color">
                            <h4 class="pt-4">Nouvels inscriptions</h4>
                            <hr class="hr-width mb-3">
                        </div>
                        <table class="table bg-white">
                            <thead class="text-center">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nom et prénom</th>
                                    <th scope="col">Formation</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                <?php
                                    foreach($etudiantsinscrit as $inscrit){
                                ?>
                                <tr>
                                    <th scope="row"><?php echo $i ?></th>
                                    <td><?php echo $inscrit['etud_nom']." ".$inscrit['etud_prenom']; ?></td>
                                    <td><?php echo $inscrit['for_nom'] ?></td>
                                </tr>
                                <?php
                                        $i++;
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-4 text-center">
                        <div class="text-center pt-3 text-color">
                            <h4 class="pt-4">Réservation des salles</h4>
                            <hr class="hr-width mb-3">
                        </div>
                        <div class="bg-white w-100 rounded px-3 py-3 text-color">
                            <h4>Nombre de réservations: <label id="sall_res"><?php echo $sallenumb?></label></h4>
                            <h4 class="mt-5">Réservations aujourd'hui: <br> <label id="sall_res_date"><?php echo $salledate?></label></h4>
                        </div>
                    </div>
                    <div class="col-md-7 text-center">
                        <div class="text-center pt-3 text-color">
                            <h4 class="pt-4">Etudiant inscrit pour chaque formation</h4>
                            <hr class="hr-width mb-3">
                        </div>
                        <div class="bg-white py-3">
                            <canvas class="myChart px-5"></canvas>
                        </div>
                    </div>
                    <div class="col-md-5 text-center">
                        <div class="text-center pt-3 text-color">
                            <h4 class="pt-4">Demandes documents</h4>
                            <hr class="hr-width mb-3">
                        </div>
                        <table class="table bg-white">
                            <thead class="text-center">
                                <tr>
                                    <th scope="col" colspan="2">Demande diplome</th>
                                </tr>
                                <tr>
                                    <th>Nom et prénom</th>
                                    <th>Type de demande</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                <?php
                                    foreach($diplomes as $diplome){
                                        if($diplome['dip_image'] == ''){
                                ?>
                                <tr>
                                    <td><?= $diplome['etud_prenom']." ".$diplome['etud_nom']?></td>
                                    <td>Diplôme</td>
                                </tr>
                                <?php
                                        }
                                    }foreach($attestations as $attestation){
                                        if($attestation['att_image'] == ''){
                                ?>
                                <tr>
                                    <td><?= $attestation['etud_prenom']." ".$attestation['etud_nom']?></td>
                                    <td>Attestation</td>
                                </tr>
                                <?php
                                        }
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-12">
                        <div class="text-center pt-3 text-color">
                            <h2 class="pt-4">Réservations des salles</h2>
                            <hr class="hr-width mb-3">
                        </div>
                        <table class="table bg-white mt-4">
                            <thead class="text-center">
                                <tr>
                                    <th scope="col" colspan="9">ALT Nord</th>
                                </tr>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Salle</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Nom</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Telephone</th>
                                    <th scope="col">Message</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                <?php
                                    $i=1;
                                    foreach($reservations as $reservation){
                                ?>
                                <tr>
                                    <th scope="row"><?php echo $i++ ?></th>
                                    <td><?php echo $reservation['sal_nom'];?></td>
                                    <td><?php echo $reservation['res_date']. " ".$reservation['time_debut']." ".$reservation['time_fin'];?></td>
                                    <td><?php echo $reservation['res_nom'];?></td>
                                    <td><?php echo $reservation['res_email'];?></td>
                                    <td><?php echo $reservation['res_telephone'];?></td>
                                    <td><?php echo $reservation['res_commentaire'];?></td>
                                    <td class="row-style">
                                        <form action="" method="POST">
                                            <input type="hidden" name="reservation_id" value="<?php echo $reservation['res_id']?>">
                                            <input type="hidden" name="salle_id" value="<?php echo $reservation['sal_id']?>">
                                            <button type="submit" class="btn-style" name="submit_res" onclick='return confirm("Voulez-vous supprimer cette réservation")'>
                                                <i class="fas fa-trash-alt text-danger awesome-size"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                <?php
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <script>
            const data = {
                labels: 
                    <?php echo json_encode($formation)?>,
                datasets: [{
                    label: 'My First Dataset',
                    data: <?php echo json_encode($nombreEtudiant)?>,
                    backgroundColor: [
                        'rgb(255, 99, 132)',
                        'rgb(54, 162, 235)',
                        'rgb(255, 205, 86)'
                    ],
                    hoverOffset: 4
                }]
            };
            /*const labels = <?php echo json_encode($formation)?>;
            const data = {
                labels: labels,
                datasets: [{
                    label: 'Formation',
                    data: <?php echo json_encode($nombreEtudiant)?>,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(255, 159, 64, 0.2)',
                        'rgba(255, 205, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(201, 203, 207, 0.2)',
                    ],
                    borderColor: [
                        'rgb(255, 99, 132)',
                        'rgb(255, 159, 64)',
                        'rgb(255, 205, 86)',
                        'rgb(75, 192, 192)',
                        'rgb(54, 162, 235)',
                        'rgb(153, 102, 255)',
                        'rgb(201, 203, 207)'
                    ],
                    borderWidth: 1
                }]
            };*/
            const config = {
                type: 'pie',
                data: data,
            };
            /*const config = {
                type: 'bar',
                data: data,
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                },
            };*/
            const myChart = new Chart(
                document.getElementsByClassName('myChart'),
                config
            );
        </script>
        <script>
            var i = 0;
            window.onload = function () {
                if (i == 0) {
                    i = 1;
                    var elem = document.getElementById("myBar");
                    var elem2 = document.getElementById("myBar2");
                    var elem3 = document.getElementById("myBar3");
                    var widthbar = 0;
                    var id = setInterval(frame, 40);
                    var numbetud = <?php echo json_encode($total_etud)?>;
                    var numbforma = <?php echo json_encode($total_forma)?>;
                    var numbprof = <?php echo json_encode($total_prof)?>;
                    function frame(){
                        if(widthbar>=numbetud){
                            clearInterval(id);
                            i = 0;
                        }else if(widthbar<=numbetud){
                            widthbar++;
                            elem.style.width = widthbar + "%";
                        }if(widthbar>=numbforma){
                            clearInterval(id);
                            i = 0;
                        }else if(widthbar<=numbforma){
                            widthbar++;
                            elem2.style.width = widthbar + "%";
                        }if(widthbar>=numbprof){
                            clearInterval(id);
                            i = 0;
                        }else if(widthbar<=numbprof){
                            widthbar++;
                            elem3.style.width = widthbar + "%";
                        }
                    }
                }
            }
        </script>
        <script>
            var numbetud = <?php echo json_encode($total_etud)?>;
            var numbforma = <?php echo json_encode($total_forma)?>;
            var numbprof = <?php echo json_encode($total_prof)?>;
            var numbart = <?php echo json_encode($total_article)?>;
            var numbcom = <?php echo json_encode($com_total)?>;
            var numetuddate = <?php echo json_encode($etudiantdate)?>;
            var sallres = <?php echo json_encode($sallenumb)?>;
            var sallresdate = <?php echo json_encode($salledate)?>;
            function animateValue(obj, start, end, duration){
                let startTimestamp = null;
                const step = (timestamp) =>{
                    if(!startTimestamp) startTimestamp = timestamp;
                    if(numbetud <10){
                        var progress = Math.min((timestamp - startTimestamp) / duration, 0.1);
                    }else if(numbforma){
                        var progress = Math.min((timestamp - startTimestamp) / duration, 0.1);
                    }else if(numbprof){
                        var progress = Math.min((timestamp - startTimestamp) / duration, 0.1);
                    }else if(numbart){
                        var progress = Math.min((timestamp - startTimestamp) / duration, 0.1);
                    }else if(numbcom){
                        var progress = Math.min((timestamp - startTimestamp) / duration, 0.1);
                    }else if(numetuddate){
                        var progress = Math.min((timestamp - startTimestamp) / duration, 0.1);
                    }else if(sallres){
                        var progress = Math.min((timestamp - startTimestamp) / duration, 0.1);
                    }else if(sallresdate){
                        var progress = Math.min((timestamp - startTimestamp) / duration, 0.1);
                    }else{
                        var progress = Math.min((timestamp - startTimestamp) / duration, 1);
                    }
                    obj.innerHTML = Math.floor(progress * (start + end) - end);
                    if(progress < 1){
                        window.requestAnimationFrame(step);
                    }
                };
                window.requestAnimationFrame(step);   
            }
            if(numbetud){
                const obj = document.getElementById("value_etud");
                animateValue(obj, numbetud, 0, 5000);
            }if(numbforma){
                const obj = document.getElementById("value_forma");
                animateValue(obj, numbforma, 0, 5000);
            }if(numbprof){
                const obj = document.getElementById("value_prof");
                animateValue(obj, numbprof, 0, 5000);
            }if(numbart){
                const obj = document.getElementById("value_article");
                animateValue(obj, numbart, 0, 5000);
            }if(numbcom){
                const obj = document.getElementById("value_comm");value_etud_date
                animateValue(obj, numbcom, 0, 5000);
            }if(numetuddate){
                const obj = document.getElementById("value_etud_date");
                animateValue(obj, numetuddate, 0, 5000);
            }if(sallres){
                const obj = document.getElementById("sall_res");
                animateValue(obj, sallres, 0, 5000);
            }if(sallresdate){
                const obj = document.getElementById("sall_res_date");
                animateValue(obj, sallresdate, 0, 5000);
            }
        </script>
    </body>
</html>
<?php
    if(isset($_POST['dip-btn'])){
        $data->updateDiplome();
    }
    if(isset($_POST['att-btn'])){
        $data->updateAttestation();
    }
    if(isset($_POST['submit_res'])){
        $data->deleteReservations($_POST['reservation_id']);
    }
?>