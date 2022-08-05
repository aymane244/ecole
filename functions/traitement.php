<?php 
session_start();
include_once 'etudiant.php';
include_once 'db.php';
$db = new DBController();
$data = new Etudiant($db);
include_once "../includes/lang.php";
if(isset($_POST['action'])){
    if ($_POST['action']=='add_comment') {
        $data->insertComment();
        $id = $_POST['article_id'];
        foreach ($data->getCommentsAjax() as $comment) {
            if ($_SESSION['lang'] == "ar") {
                echo '<div class="row">
                    <div class="col-md-3 bg-light rounded-left py-2 mt-3 my-2">';
                    if(isset($_SESSION['username']) && isset($_SESSION['pwd'])){
                        echo '<form action="" method="POST">
                            <input type="hidden" name="comment_id" value="'.$id.'">
                            <button type="submit" name="submit_comment" class="btn-style">
                                <i class="fas fa-times" style="font-size:20px"></i>
                            </button>
                        </form>';
                    }
                    echo '</div>
                    <div class="col-md-8 mt-3 text-right bg-light rounded-right py-2 my-2" dir="rtl" lang="ar">
                        <b><span style="font-size: 17px;" dir="rtl" lang="ar">'.$comment['com_nom'].' '.$comment['com_prenom'].' </span></b> <br>
                        <span class="pr-3"> '.$comment['com_comentaire'].'</span> <br>
                        <span style="color:#BBBBBB; font-size: 14px;" class="pr-3"> '.date_in_arabic($comment['com_time']).' </span>
                    </div>
                </div>';
            }else{
                echo '<div class="row">
                    <div class="col-md-8 pl-4 bg-light rounded-left py-2 my-2">
                        <b>'.$comment['com_prenom'].' '.$comment['com_nom'].' </b> <br>
                        <span style="color:#BBBBBB"> '.date_in_french($comment['com_time']).' </span> <br>
                        <span class="pl-3"> '.$comment['com_comentaire'].'</span> 
                    </div>
                    <div class="col-md-3 bg-light py-2 rounded-right my-2">';
                        if(isset($_SESSION['username']) && isset($_SESSION['pwd'])){
                            echo '<form action="" method="POST" class="float-right">
                                <input type="hidden" name="comment_id" value="'.$id.'">
                                <button type="submit" name="submit_comment" class="btn-style">
                                    <i class="fas fa-times" style="font-size:20px"></i>
                                </button>
                            </form>';
                        }
                    echo'</div>
                </div>';
            }
        }
    }
    if ($_POST['action']=='modifier_note') {
        $id = $_POST['id'];
        $formations = $data->getEtudiantMatiereFormation();
        foreach ($formations as $formation) {
            if ($formation['not_id'] == $id) {
                $for_nom = $formation['for_nom'];
                $for_id = $formation['for_id'];
                $mat_id = $formation['mat_id'];
                $mat_nom = $formation['mat_nom'];
                $etud_id = $formation['etud_id'];
                $etud_nom = $formation['etud_nom'];
                $etud_prenom = $formation['etud_prenom'];
                $note = $formation['not_note'];
            }
        }
        echo '<form action="" method="POST">
            <div class="row mb-3">
                <label for="note" class="col-md-4 col-form-label text-md-end">Saisir la note</label>
                <div class="col-md-12">
                    <div class="d-flex">
                        <i class="fas fa-poll position-awesome"></i>
                        <input id="note" type="number" class="form-control pl-5" min="0" max="20" name="note" value="'.$note.'" autocomplete="note" size="2" required>
                        <input id="etudiants" type="hidden" class="form-control pl-5" name="etudiants" value="'.$etud_id.'" autocomplete="note">
                        <input id="note_id" type="hidden" class="form-control pl-5" name="note_id" value="'.$id.'" autocomplete="note">
                        </div>
                </div>
            </div>
            <div class="row mb-0">
                <div class="col-md-12 text-center mt-3">
                    <button type="submit" name="submit_note" class="btn btn-primary">Modifier la note</button>
                </div>
            </div>
        </form>';
    }
    if ($_POST['action']=='student_id') {
        $id = $_POST['id'];
        $absences = $data->getTotalAbsenceAdmin();
        foreach ($data->getEtudiantNotesAjax() as $detail) {
            if($detail['etud_id'] == $id){
                $date= date("Y-m-d");
                $naissance = date("Y-m-d", strtotime($detail['etud_naissance']));
                $age = date_diff(date_create($detail['etud_naissance']), date_create($date));
                $nom = $detail['etud_nom'];
                $prenom = $detail['etud_prenom'];
                echo '<br>';
                echo '<div class="container-fluid">
                    <div class="row align-items-center justify-content-center">
                        <div class="col-md-12">
                            <h4 class="text-center pb-3">Information personnelle</h4>
                            <div class="d-flex align-items-center justify-content-around">';
                                if($detail['etud_image'] == ""){
                                    echo '<img src="../images/unknown.jpg" class="card-image-detail">';
                                }else{
                                    echo '<img src="../dossiers-stagiaires/'.$prenom.'-'.$nom.'/'.$detail['etud_image'].'" class="card-image-detail">';
                                };
                                echo '<p>
                                    <strong>Nom complet:</strong> '.$detail['etud_prenom'].' '.$detail['etud_nom'].' <br>
                                    <strong>Age:</strong> '.$age->format('%y').' <br>
                                    <strong>CIN:</strong> '.$detail['etud_cin'].' <br>
                                    <strong>Téléphone:</strong> '.$detail['etud_telephone'].' <br>
                                    <strong>Email:</strong> '.$detail['etud_email'].'
                                </p>
                                <p>
                                    <strong>Adresse:</strong> '.$detail['etud_adress'].' <br>
                                    <strong>Permis:</strong> '.$detail['etud_permis'].' <br>
                                    <strong>Catégorie de permis:</strong> '.$detail['etud_cat_permis'].' <br>
                                    <strong>Date d\'obtention:</strong> '.$detail['etud_permis_obt'].' <br>
                                    <strong>Carte Professionnelle:</strong> ';
                                    if($detail['etude_carte_pro'] == ''){
                                        echo 'Pas encore obtenue';
                                    }else{
                                        echo $detail['etude_carte_pro'];
                                    };
                                echo '</p>
                            </div>
                        </div>
                    </div>
                    <hr class="bg-light">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <h4 class="text-center pb-3">Information formation</h4>
                            <div class="d-flex align-items-center justify-content-center">
                                <p>
                                    <strong>Absences:</strong> ';
                                    foreach($absences as $absence){
                                        echo $absence['Total'];
                                        if($absence['Total'] == 1 || $absence['Total'] == 0){
                                            echo " Absence";
                                        }else{
                                            echo " Absences";
                                        }
                                    }  
                                echo '</p>
                                <p class="ml-3">
                                    <strong>Note générale:</strong> ';
                                    if(!$detail['not_id']){
                                        echo '0';
                                    }else{
                                        echo $detail['notegenerale'];
                                    };
                                echo '</p>
                            </div>
                            <div class="text-center font-style ">
                                <a href="saisir-notes?id='.$detail['etud_id'].'" target="_blank" class="btn btn-primary">Saisir les notes</a>
                            </div>
                        </div>
                    </div>
                    <hr class="bg-light">
                    <div class="row">
                        <div class="col-md-12 font-style">
                            <h4 class="text-center pb-3">Documents scanés</h4>
                            <div class="d-flex align-items-center justify-content-around">
                                <p>
                                    <a download="'.$detail['etud_scan_cin'].'" href="../dossiers-stagiaires/'.$prenom.'-'.$nom.'/'.$detail['etud_scan_cin'].'">
                                        CIN <br> <img src="../images/view/PDF_file_icon.svg" style="width:30px" class="img-fluid">
                                    </a>
                                </p>
                                <p>
                                    <a download="'.$detail['etud_scan_permis'].'" href="../dossiers-stagiaires/'.$prenom.'-'.$nom.'/'.$detail['etud_scan_permis'].'">
                                        Permis <br> <img src="../images/view/PDF_file_icon.svg" style="width:30px; margin-left:12px" class="img-fluid">
                                    </a>
                                </p>
                                <p>
                                    <a download="'.$detail['etud_scan_visite'].'" href="../dossiers-stagiaires/'.$prenom.'-'.$nom.'/'.$detail['etud_scan_visite'].'">
                                        Visite médicale <br> <img src="../images/view/PDF_file_icon.svg" style="width:30px; margin-left:45px" class="img-fluid">
                                    </a>
                                </p>
                            </div>
                            <hr class="bg-light">
                            <div class="text-center">
                                <form action="../functions/download.php" method="POST">
                                    <input type="hidden" name="id" value="'.$detail['etud_id'].'">
                                    <button type="submit" name="createpdf" style="background-color:transparent; border:none; color:#0056B3">
                                        <b>Télécharger tous</b> <br> <img src="../images/view/winrar.png" style="width:40px; " class="img-fluid">
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>';
            }
        }
    }
    if($_POST['action'] == 'student_promotion'){
        $etudiants = $data->getEtudiantNotes();
        $id = $_POST['id'];
        $promos = $data->getPromotion();
        foreach ($etudiants as $etudiant) {
            if ($etudiant['etud_id'] == $id) {
                $fornom = $etudiant['for_nom'];
                $for_id = $etudiant['for_id'];
                $etud_nom = $etudiant['etud_nom'];
                $etud_prenom = $etudiant['etud_prenom'];
                $etud_id = $etudiant['etud_id'];
                
                echo '<h6 class="my-3">Veuillez choisir la promotion de l\'étudiant '.$etud_prenom." ".$etud_nom.'</h6>';
            }
        }
        echo'<form action="" method="post">
            <div class="d-flex">
                <i class="fas fa-folder-open position-awesome"></i>
                <select class="custom-select pl-5" name="promotion">
                    <option selected value="">--Choisir promotion--</option>';
                    foreach($promos as $promo){
                        if($for_id == $promo['pro_formation']){
                            echo '<option value="'.$promo['pro_id'].'">'.$promo['pro_groupe'].'</option>';
                        }
                    }
                echo '</select>
            </div>
            <div class="row justify-content-center my-3">
                <div class="col-md-12 text-center">
                    <input type="hidden" name="etudiant" id="" value="'.$etud_id.'">
                    <button type="submit" class="btn btn-primary" name="submit_promos">Saisir</button>
                </div>
            </div>
        </form>';
    }
    if ($_POST['action']=='student_detail') {
        $id = $_POST['id'];
        foreach ($data->getEtudiantNotesAjax() as $detail) {
            if($detail['etud_id'] == $id){
                $date= date("Y-m-d");
                $naissance = date("Y-m-d", strtotime($detail['etud_naissance']));
                $age = date_diff(date_create($detail['etud_naissance']), date_create($date));
                $nom = $detail['etud_nom'];
                $prenom = $detail['etud_prenom'];
                // $cin = $detail['etud_cin_name'];
                // $permis = $detail['etud_permis_name'];
                // $visite = $detail['etud_visite_name'];
                // //$files = array($cin, $permis, $visite);
                // $file = "readme.txt";
                // $zip = new ZipArchive();
                // $zip_file = "$prenom-$nom.zip";
                // $path = "../dossiers-stagiaires/$prenom-$nom";
                // if($zip->open($zip_file, ZIPARCHIVE::CREATE)==true){
                //     file_put_contents($file, "Vous avez bien téléchargé vos fichiers \n".$cin."\n".$permis."\n".$visite);
                //     $zip->addFile("readme.txt");
                //     $file_path= "$path/$cin";
                //     $name =$cin;
                //     $zip->addFile($file_path, $name);
                //     $file_path= "$path/$permis";
                //     $name =$permis;
                //     $zip->addFile($file_path, $name);
                //     $file_path= "$path/$visite";
                //     $name =$visite;
                //     $zip->addFile($file_path, $name);
                //     $zip->extractTo($file_path, $name);
                //     //$zip->close();
                // }
                echo '<br>';
                echo '<div class="container-fluid">
                    <div class="row align-items-center justify-content-center">
                        <div class="col-md-12">
                            <h4 class="text-center pb-2">Information personnelle</h4>
                            <div class="d-flex align-items-center justify-content-around">';
                                if($detail['etud_image'] === ""){
                                    echo '<img src="../images/unknown.jpg"  class="card-image-detail">';
                                }else{
                                    echo '<img src="../dossiers-stagiaires/'.$prenom.'-'.$nom.'/'.$detail['etud_image'].'" class="card-image-detail">';
                                };
                                echo '<p>
                                    <strong>Nom complet:</strong> '.$detail['etud_prenom'].' '.$detail['etud_nom'].' <br>
                                    <strong>Age:</strong> '.$age->format('%y').' <br>
                                    <strong>CIN:</strong> '.$detail['etud_cin'].' <br>
                                    <strong>Téléphone:</strong> '.$detail['etud_telephone'].' <br>
                                    <strong>Email:</strong> '.$detail['etud_email'].'
                                </p>
                                <p>
                                    <strong>Adresse:</strong> '.$detail['etud_adress'].' <br>
                                    <strong>Permis:</strong> '.$detail['etud_permis'].' <br>
                                    <strong>Catégorie de permis:</strong> '.$detail['etud_cat_permis'].' <br>
                                    <strong>Date d\'obtention:</strong> '.$detail['etud_permis_obt'].' <br>
                                    <strong>Carte Professionnelle:</strong> ';
                                    if($detail['etude_carte_pro'] == ''){
                                        echo 'Pas encore obtenue';
                                    }else{
                                        echo $detail['etude_carte_pro'];
                                    };
                                echo '</p>
                            </div>
                        </div>  
                    </div>
                    <hr class="bg-light">
                    <div class="row">
                        <div class="col-md-12 font-style">
                            <h4 class="text-center pb-2">Documents scanés</h4>
                            <div class="d-flex align-items-center justify-content-around">
                                <p>
                                    <a download="'.$detail['etud_scan_cin'].'" href="../dossiers-stagiaires/'.$prenom.'-'.$nom.'/'.$detail['etud_scan_cin'].'">
                                        CIN <br> <img src="../images/view/PDF_file_icon.svg" style="width:30px" class="img-fluid">
                                    </a>
                                </p>
                                <p>
                                    <a download="'.$detail['etud_scan_permis'].'" href="../dossiers-stagiaires/'.$prenom.'-'.$nom.'/'.$detail['etud_scan_permis'].'">
                                        Permis <br> <img src="../images/view/PDF_file_icon.svg" style="width:30px; margin-left:12px" class="img-fluid">
                                    </a>
                                </p>
                                <p>
                                    <a download="'.$detail['etud_scan_visite'].'" href="../dossiers-stagiaires/'.$prenom.'-'.$nom.'/'.$detail['etud_scan_visite'].'">
                                        Visite médicale <br> <img src="../images/view/PDF_file_icon.svg" style="width:30px; margin-left:45px" class="img-fluid">
                                    </a>
                                </p>
                            </div>
                            <hr class="bg-light">
                            <div class="text-center">
                                <form action="../functions/download.php" method="POST">
                                    <input type="hidden" name="id" value="'.$detail['etud_id'].'">
                                    <button type="submit" name="createpdf" style="background-color:transparent; border:none; color:#0056B3">
                                        <b>Télécharger tous</b> <br> <img src="../images/view/winrar.png" style="width:40px; " class="img-fluid">
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <br>
                </div>';
            }
        }
    }
    if($_POST['action'] == 'module_submit'){
        $seances = $data->getFormationMatiere();
        $total_etudiants = $data->etudiantTotal();
        $etudiants = $data->getFormationMatiereEtudiant();
        $module = $_POST['module'];
        $promotion = $_POST['promo'];
        foreach ($seances as $seance) {
            if ($seance['mat_id'] == $module) {
                $matiere_nom =  $seance['mat_nom'];
                $matiere_id =  $seance['mat_id'];
                $formation_nom =  $seance['for_nom'];
                $for_id =  $seance['for_id'];
            }
        }
        foreach ($total_etudiants as $total_etudiant) {
            if ($total_etudiant['mat_id'] == $module) {
                $total = $total_etudiant['total_etudiant'];
            }
        }
        echo '<div class="container">
            <form action="" method="POST">
                <div class="text-center py-3">
                    <input type="hidden" value="'.$for_id.'" name="absence_formation">
                </div>

                <div class="d-flex justify-content-around mt-3">
                    <h2>'.$matiere_nom.'</h2>
                    <input type="hidden" value="'.$matiere_id.'" name="absence_matiere">
                    <div class="d-flex">
                        <i class="fas fa-calendar position-awesome"></i>
                        <input id="absence_date" type="date" class="form-control pl-5" name="absence_date">
                    </div>
                </div>
                <div id="errors"></div>
                <table class="table table-bordered mt-5 bg-white">
                    <thead class="text-center text-white" style="background-color: #11101d;">
                        <tr>
                            <th scope="col" colspan="5">ARTL Nord</th>
                        </tr>
                        <tr>
                            <th scope="col" colspan="5">'; 
                                foreach ($total_etudiants as $total_etudiant) {
                                    if($total_etudiant['etud_promos'] == $_POST['promo'] ){
                                        echo 'Total etudiants: '.$total.'
                                        <input type="hidden" value="'.$total.'" name="number_etudiant">';
                                    }else{
                                        echo 'Total etudiants : 0
                                        <input type="hidden" value="'.$total.'" name="number_etudiant">'; 
                                    }
                                }
                            echo '</th>
                        </tr>
                        <tr>
                            <th scope="col">Etudiants</th>
                            <th scope="col">Promotion</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">';   
                        foreach ($etudiants as $etudiant) {
                            if ($etudiant['mat_id'] == $module) {
                                echo '<tr>
                                    <td>
                                        '.$etudiant['etud_nom'] . " " . $etudiant['etud_prenom'].'
                                        <input type="hidden" value="'.$etudiant['etud_id'].'" name="absence_etudiant[]">
                                    </td>
                                    <td>'.$etudiant['pro_groupe'].'</td>
                                    <td>
                                        <div class="row justify-content-center">
                                            <div class="col-md-8">
                                                <div class="d-flex">
                                                    <i class="fas fa-user-check position-awesome"></i>
                                                    <select class="custom-select pl-5" name="absence[]" id="absence">
                                                        <option selected value="Présent">Présent</option>
                                                        <option value="Absent">Absent</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>';
                            }
                        }
                    echo '</tbody>
                </table>
                <div class="text-center py-3">
                    <button class="btn btn-primary" type="submit" name="absence_submit" id="submit">Valider</button>
                </div>
            </form>
        </div>';
        if (isset($_POST['absence_submit'])) {
            $data->insertAbsence();
        }
    }
    if ($_POST['action']=='promotion') {
        $etudiants = $data->getEtudiantPromotion();
        $promos = $data->getPromotion();
        $id = $_POST['id'];
        foreach ($etudiants as $detail) {
            if($detail['etud_id'] == $id){
                echo '<div class="container-fluid">
                    <table class="table table-hover mt-5 font-style">
                        <tr>
                            <td>Nom</td>
                            <td>'.$detail['etud_nom'].'</td>
                            <td><input type="hidden" name="id_etud" value="'.$detail['etud_id'].'"></td>
                        </tr>
                        <tr>
                            <td>Prénom</td>
                            <td>'.$detail['etud_prenom'].'</td>
                        </tr>
                        <tr>
                            <th>Promotion</th>
                            <th>
                                <select name="promotion" id="promotion" class="custom-select w-75">
                                    <option value="'.$detail['pro_id'].'">'.$detail['pro_groupe'].'</option>';            
                                        foreach($promos as $promo){
                                    echo '<option value="'.$promo['pro_id'].'">'.$promo['pro_groupe'].'</option>';
                                    }
                                echo '</select>
                            </th>
                        </tr>
                        </tr>
                    </table>
                </div>';
            }
        }
    }
    if (($_POST['action'] == 'verifier_reservation')) {
        $date_salle = $_POST['date_salle'];
        $time_debut = $_POST['time_debut'];
        $time_fin = $_POST['time_fin'];
        $reservation_salle = $_POST['reservaion_salle'];
        $date = date("Y-m-d");
        if($reservation_salle === ""){
            if($_SESSION['lang'] == 'ar'){
                echo '<div class="alert alert-danger text-center mt-2" role="alert">الرجاء اختيار تاريخك</div>';
            }else{
                echo '<div class="alert alert-danger text-center mt-2" role="alert">Veuillez choisir une salle</div>';
            }
        }else if($date_salle === ""){
            if($_SESSION['lang'] == 'ar'){
                echo '<div class="alert alert-danger text-center mt-2" role="alert">الرجاء اختيار قاعة الدرس</div>';
            }else{
                echo '<div class="alert alert-danger text-center mt-2" role="alert">Veuillez choisir votre date</div>';
            }
        }else if($date_salle < $date){
            if($_SESSION['lang'] == 'ar'){
                echo '<div class="alert alert-danger text-center mt-2" role="alert">تاريخ غير صالح</div>';
            }else{
                echo '<div class="alert alert-danger text-center mt-2" role="alert">Date invalide</div>';
            }
        }else if($time_fin === $time_debut){
            if($_SESSION['lang'] == 'ar'){
                echo "<div class='alert alert-danger text-center mt-2' role='alert'>ساعة غير صحيحة ، شكرًا لك على المحاولة مرة أخرى</div>";
            }else{
                echo "<div class='alert alert-danger text-center mt-2' role='alert'>Heure incorrect merci de réessayé une nouvelle fois</div>";
            }
        }else if($time_fin < $time_debut){
            if($_SESSION['lang'] == 'ar'){
                echo "<div class='alert alert-danger text-center mt-2' role='alert'>يجب أن يكون وقت النهاية دائمًا أكبر من تاريخ البدء</div>";
            }else{
                echo "<div class='alert alert-danger text-center mt-2' role='alert'>L'heure de fin doit toujours être supérieure à la date de début</div>";
            }
        }else{
            $result = $db->conn->query("SELECT * FROM `reservation` WHERE res_salle='$reservation_salle' AND res_date='$date_salle' AND (time_fin>'$time_debut' AND time_debut <'$time_fin')");
           // $result2 = $db->conn->query("SELECT * FROM `reservation` WHERE res_salle=$reservation_salle AND time_fin BETWEEN '$time_debut' AND '$time_fin'");
            //$result3 = $db->conn->query("SELECT * FROM `reservation` WHERE res_salle=$reservation_salle AND time_debut BETWEEN '$time_debut' AND '$time_fin'");
            //$result2 = $db->conn->query("SELECT * FROM `reservation` WHERE res_salle=$reservation_salle ");
            if(mysqli_num_rows($result)){
                if($_SESSION["lang"] == 'ar'){
                    echo "<div class='alert alert-danger text-center mt-2' role='alert'>
                        وقت محجوز ، يرجى أخذ ساعة جديدة
                    </div>";
                }else{
                    echo "<div class='alert alert-danger text-center mt-2' role='alert'>
                        Heure réservée, Merci de prendre une nouvelle heure
                    </div>";
                }
            }else{
                if($_SESSION['lang'] == 'ar'){
                    echo '<div class="alert alert-success text-center mt-2" role="alert">
                        التاريخ والوقت متاحين ، يمكنك تحديد موعدك
                    </div>';
                }else{
                    echo '<div class="alert alert-success text-center mt-2" role="alert">
                        Date et heure disponible, vous pouvez prendre votre rendez-vous
                    </div>';
                }
            }
            $resultArray = array();
            // fetch product data one by one
            while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                /*if($time_debut >= $item['time_debut'] && $time_debut <= $item['time_fin']){
                    echo "reserved";
                }else if($time_debut >= $item['time_fin'] && $time_debut > $item['time_debut']){
                    echo "not reserved";
                }*/
                $resultArray[] = $item;
            }
            return $resultArray;
        }
    }
    if ($_POST['action']=='add_message') {
        $data->insertContact();
    }
    if ($_POST['action']=='add_iso') {
        $data->insertiso();
    }
    if ($_POST['action']=='login') {
        $data->getEtudiantCinPwd();
    }
    if ($_POST['action']=='add_douane') {
        $data->insertdouane();
    }
    if ($_POST['action']=='add_reservation') {
       $data->insertReservation();
    }
    if ($_POST['action']=='search_student') {
        $i=1;
        foreach($data->getEtudiantNotesSearch() as $search){
            echo "<tr>
                <td>".$i++."</td>
                <td>".$search['for_nom']."</td>
                <td>".$search['etud_prenom']." ".$search['etud_nom']."</td>
                <td>
                    <div class='row align-items-center'>
                        <div class='col-md-3'>
                            <a href='modifier-stagiaire?id=".$search['etud_id']."' target='_blank'> 
                                <i class='fas fa-edit text-success awesome-size'></i>
                            </a>
                        </div>
                        <div class='col-md-3'>
                        <form action='' method='POST'>
                            <input type='hidden' name='etudiant_id' value='".$search['etud_id']."'>
                            <button type='submit' class='btn-style' name='submit_etudiant' onclick='return supprimer()'> 
                                <i class='fas fa-trash-alt text-danger awesome-size'></i>
                            </button>
                        </form>
                    </div>
                        <div class='col-md-4'>
                            <button type='button' class='btn btn-primary btn-id' id='btn-id' data-toggle='modal' data-target='#exampleModal' data-id=".$search['etud_id'].">Détails</button>
                        </div>
                    </div>
                </td>
            </tr>";
        }
    }
}
/*if(isset($_GET['action'])){

}*/
function date_in_french ($date){
    $month_name=array("","Janvier","Février","Mars","Avril","Mai","Juin","Juillet","Août","Septembre","Octobre","Novembre","Décembre");
    $split = preg_split('/-/', $date);
    $year = $split[0];
    $month = round($split[1]);
    $day = round($split[2]);
    return $day .' '. $month_name[$month] .' '. $year;
}
function date_in_arabic ($date){
    $month_name=array("","يناير","فبراير","مارس","أبريل","ماي","يونيو","يوليوز","غشت","شتنبر","أكتوبر","نونبر","دجنبر");
    $split = preg_split('/-/', $date);
    $year = $split[0];
    $month = round($split[1]);
    $day = round($split[2]);
    return $day .' '. $month_name[$month] .' '. $year;
}
?>
<script>
    function supprimer(){
        return confirm('Voulez-vous supprimer cet étudiant');
    }
</script>
<script>
        $(document).ready(function(){
            $("#submit").click(function(e){
                var date = $("#absence_date").val();
                var today = new Date();
                var dd = String(today.getDate()).padStart(2, '0');
                var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
                var yyyy = today.getFullYear();
                today = yyyy + '-' + mm + '-' + dd;
                if(date == ''){
                    e.preventDefault();
                    $('#errors').html('<div class="alert alert-danger text-center mt-2" role="alert" id="btn-fermer">Veuillez saisir une date</div>');
                }else if(date > today){
                    e.preventDefault();
                    $('#errors').html('<div class="alert alert-danger text-center mt-2" role="alert" id="btn-fermer">La date saisit ne doit pas être supérieure à la date d\'ajourd\'hui</div>');
                }
            })
        })
    </script>