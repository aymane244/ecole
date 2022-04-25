<?php 
session_start();
include_once 'etudiant.php';
include_once 'db.php';
$db = new DBController();
$data = new Etudiant($db);
if(isset($_POST['action'])){
    if ($_POST['action']=='add_comment') {
        $data->insertComment();
        foreach ($data->getCommentsAjax() as $comment) {
            echo '<p class="pl-3 mt-3">
            <b>'.$comment['com_prenom'].' '.$comment['com_nom'].' </b> <br>
            <span style="color:#BBBBBB"> '.date("F j, Y",strtotime($comment['com_time'])).' </span> <br>
            <span class="pl-3"> '.$comment['com_comentaire'].'</span> </p>';
        }
    }
    if ($_POST['action']=='student_id') {
        $id = $_POST['id'];
        foreach ($data->getEtudiantNotesAjax() as $detail) {
            if($detail['etud_id'] == $id){
                $date= date("Y-m-d");
                $naissance = date("Y-m-d", strtotime($detail['etud_naissance']));
                $age = date_diff(date_create($detail['etud_naissance']), date_create($date));
                echo '<div class="container-fluid">
                        <div class="text-center">';
                            if($detail['etud_image'] === "./images/etudiants/"){
                                echo '<img src="images/etudiants/unknown_person.jpg"  class="card-image-2">';
                            }else{
                                echo '<img src="'.$detail['etud_image'].'" class="card-image-2">';
                            };
                        echo '</div>
                        <div class="text-center mt-5 mb-4 font-style">
                            <p>Formation: '.$detail['for_nom'].'</p>
                        </div>
                        <table class="table table-hover mt-5 font-style">
                            <tr>
                                <td>Nom</td>
                                <td>'.$detail['etud_nom'].'</td>
                            </tr>
                            <tr>
                                <td>Prénom</td>
                                <td>'.$detail['etud_prenom'].'</td>
                            </tr>
                            <tr>
                                <td>Age</td>
                                <td>'.$age->format('%y').'</td>
                            </tr>
                            <tr>
                                <td>CIN</td>
                                <td>'.$detail['etud_cin'].'</td>
                            </tr>
                            <tr>
                                <td>Téléphone</td>
                                <td>'.$detail['etud_telephone'].'</td>
                            </tr>
                            <tr>
                                <th>Note Générale</th>';
                                if(!$detail['not_id']){
                                    echo '<th>0</th>';
                                }else{
                                    echo '<th>'.$detail['notegenerale'].'</th>';
                                };
                            echo '</tr>
                        </tr>
                        </table>
                        <div class="text-center font-style mt-4">
                            <a href="saisir_notes?id='.$detail['etud_id'].'" target="_blank" class="btn btn-primary">Saisir les notes</a>
                        </div>
                        <br>
                    </div>';
            }
        }
    }
    if ($_POST['action']=='student_detail') {
        $id = $_POST['id'];
        foreach ($data->getEtudiantNotesAjax() as $detail) {
            if($detail['etud_id'] == $id){
                $date= date("Y-m-d");
                $naissance = date("Y-m-d", strtotime($detail['etud_naissance']));
                $age = date_diff(date_create($detail['etud_naissance']), date_create($date));
                echo '<br>';
                echo '<div class="container-fluid">
                    <hr>
                    <div class="row align-items-center justify-content-center">
                        <div class="col-md-12 font-style">
                        <h4 class="text-center pb-2">Information personnelle</h4>
                            <div class="d-flex align-items-center justify-content-between">';
                                if($detail['etud_image'] === "./images/etudiants/"){
                                    echo '<img src="images/etudiants/unknown_person.jpg"  class="card-image-2">';
                                }else{
                                    echo '<img src="'.$detail['etud_image'].'" class="card-image-2">';
                                };
                                echo '<p>
                                    Nom complet: '.$detail['etud_prenom'].' '.$detail['etud_nom'].' <br>
                                    Age: '.$age->format('%y').' <br>
                                    CIN: '.$detail['etud_cin'].' <br>
                                    Téléphone: '.$detail['etud_telephone'].' <br>
                                    Email: '.$detail['etud_email'].'
                                </p>
                                <p>
                                    Adresse: '.$detail['etud_adress'].' <br>
                                    Permis: '.$detail['etud_permis'].' <br>
                                    Catégorie de permis: '.$detail['etud_cat_permis'].' <br>
                                    Date d\'obtention: '.$detail['etud_permis_obt'].' <br>
                                    Carte Professionnelle: ';
                                    if($detail['etude_carte_pro'] == ''){
                                        echo 'Pas encore obtenue';
                                    }else{
                                        echo $detail['etude_carte_pro'];
                                    };
                                echo '</p>
                            </div>
                        </div>  
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-12 font-style">
                            <h4 class="text-center pb-2">Documents scanés</h4>
                            <div class="d-flex align-items-center justify-content-around">
                                <p>
                                    <a download="'.$detail['etud_scan_cin'].'" href="'.$detail['etud_scan_cin'].'">
                                        CIN <br> <img src="images/PDF_file_icon.svg" style="width:30px" class="img-fluid">
                                    </a>
                                </p>
                                <p>
                                    <a download="'.$detail['etud_scan_permis'].'" href="'.$detail['etud_scan_permis'].'">
                                        Permis <br> <img src="images/PDF_file_icon.svg" style="width:30px; margin-left:12px" class="img-fluid">
                                    </a>
                                </p>
                                <p>
                                    <a download="'.$detail['etud_scan_visite'].'" href="'.$detail['etud_scan_visite'].'">
                                        Visite médicale <br> <img src="images/PDF_file_icon.svg" style="width:30px; margin-left:40px" class="img-fluid">
                                    </a>
                                </p>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <br>
                </div>';
            }
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
                                    <option value="'.$detail['pro_id'].'">'.$detail['pro_année'].'</option>';            
                                        foreach($promos as $promo){
                                    echo '<option value="'.$promo['pro_id'].'">'.$promo['pro_année'].'</option>';
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
        $reservation_salle = $_POST['reservation_salle'];
        $date = date("Y-m-d");
        if($date_salle === ""){
            echo '<div class="alert alert-danger text-center mt-2" role="alert">
                Veuillez choisir votre date
            </div>';
        }else if($date_salle < $date){
            echo '<div class="alert alert-danger text-center mt-2" role="alert">
                Date invalide
            </div>';
        }else if($time_fin === $time_debut){
            echo "<div class='alert alert-danger text-center mt-2' role='alert'>
            Heure incorrect merci de réessayé une nouvelle fois
            </div>";
        }else if($time_fin < $time_debut){
                echo "<div class='alert alert-danger text-center mt-2' role='alert'>
                        L'heure de fin doit toujours être supérieure à la date de début
                    </div>";
        }else{
            $result = $db->conn->query("SELECT * FROM `reservation` WHERE res_salle=$reservation_salle AND res_date='$date_salle' AND (time_debut>='$time_debut' AND time_debut <'$time_fin')");
           // $result2 = $db->conn->query("SELECT * FROM `reservation` WHERE res_salle=$reservation_salle AND time_fin BETWEEN '$time_debut' AND '$time_fin'");
            //$result3 = $db->conn->query("SELECT * FROM `reservation` WHERE res_salle=$reservation_salle AND time_debut BETWEEN '$time_debut' AND '$time_fin'");
            $result2 = $db->conn->query("SELECT * FROM `reservation` WHERE res_salle=$reservation_salle ");
            if(mysqli_num_rows($result)){
                echo "<div class='alert alert-danger text-center mt-2' role='alert'>
                        Heure réservée, Merci de prendre une nouvelle heure
                </div>";
            }else{
                echo '<div class="alert alert-success text-center mt-2" role="alert">
                        Date et heure disponible, vous pouvez prendre votre rendez-vous
                </div>';
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
        $data->getEtudiantNotesSearch();
        $i=1;
        foreach($data->getEtudiantNotesSearch() as $search){
            echo "<tr>
                <td>".$i++."</td>
                <td>".$search['for_nom']."</td>
                <td>".$search['etud_prenom']." ".$search['etud_nom']."</td>
                <td>
                    <div class='row align-items-center'>
                        <div class='col-md-4'>
                            <a href='modifier-stagiaire?id=".$search['etud_id']."' target='_blank'> 
                                <i class='fas fa-edit text-success awesome-size'></i>
                            </a>
                        </div>
                        <div class='col-md-8'>
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
?>