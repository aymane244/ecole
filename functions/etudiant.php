<?php
    class Etudiant{
        public $db = null;
        public function __construct(DBController $db){
            if(!isset($db->conn)) return null;
            $this->db = $db;
        }
        public function getImage(){
            $result = $this->db->conn->query("SELECT * FROM `salle`");
            $resultArray = array();
            // fetch product data one by one
            while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                $resultArray[] = $item;
            }
            return $resultArray;
        }
        public function getSalle(){
            $result = $this->db->conn->query("SELECT * FROM `salle`");
            $resultArray = array();
            // fetch product data one by one
            while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                $resultArray[] = $item;
            }
            return $resultArray;
        }
        public function sasirNotes(){
            $id_get = $_GET['id'];
            $id = $_POST['etudiants'];
            $formation = $_POST['nameformation'];
            $matieres = $_POST['matieres'];
            $note = $_POST['note'];
            if($matieres == ''){
                $_SESSION['status_error'] ="Veuillez choisir un module";
                echo "<script>window.location.href='saisir-notes?id=$id_get'</script>";
            }else{
                $result = $this->db->conn->query("INSERT INTO `note`(`not_formation`, `not_matiere`, 
                `not_etudiant`, `not_note`) VALUES ('$formation','$matieres','$id','$note')");
                if($result){
                    $_SESSION['status'] = "La note a été bien ajoutée";
                    echo "<script>window.location.href='saisir-notes?id=$id_get'</script>";
                }
                return $result;
            }
        }
        public function insertEtudiant(){
            $id = $_SESSION['id'];
            $profesionnel = $_POST['profesionnel'];
            $for_id = $_POST['for_id'];
            $result = $this->db->conn->query("INSERT INTO `etudiant`(`etud_nom`, `etud_nom_arab`, `etud_prenom`, `etud_prenom_arabe`, 
                `etud_email`, `etud_telephone`, `etud_motdepasse`, `etud_cin`, `etud_formation`, `etud_naissance`, `etud_lieu_naissance`, 
                `etud_adress`, `etud_permis`, `etud_cat_permis`, `etude_carte_pro`, `etud_permis_obt`, `etud_scan_cin`, `etud_scan_permis`,
                `etud_scan_visite`, `etud_promos`, `etud_image`, `etud_inscription`) SELECT `etud_nom`, `etud_nom_arab`, `etud_prenom`, 
                `etud_prenom_arabe`, `etud_email`, `etud_telephone`, `etud_motdepasse`, `etud_cin`, '$for_id', `etud_naissance`, 
                `etud_lieu_naissance`, `etud_adress`, `etud_permis`, `etud_cat_permis`, '$profesionnel', `etud_permis_obt`, 
                `etud_scan_cin`, `etud_scan_permis`,`etud_scan_visite`, '', `etud_image`, NOW() FROM `etudiant` 
                WHERE etud_id=$id");
            if($result){
                $_SESSION['status'] = "Inscription bien effectuée";
                echo "<script>window.location.href='espace-stagiaire'</script>";
            }else{
                echo $this->db->conn->error;
            }
            return $result;
        }
        public function getEtudiantFormation(){
            $result = $this->db->conn->query("SELECT * FROM `formation` INNER JOIN `etudiant` ON for_id=etud_formation ORDER BY etud_prenom ASC");
            $resultArray = array();
            // fetch product data one by one
            while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                $resultArray[] = $item;
            }
            return $resultArray;
        }
        public function getForMat(){
            $id = $_GET['id'];
            $result = $this->db->conn->query("SELECT `for_nom`, `for_id`, `mat_id`, `mat_nom`
                FROM `formation` INNER JOIN `matiere` ON for_id=mat_formation INNER JOIN `etudiant` ON for_id=etud_formation
                WHERE etud_id=$id");
            $resultArray = array();
            // fetch product data one by one
            while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                $resultArray[] = $item;
            }
            return $resultArray;
        }
        public function getForMatEtud(){
            $id = $_SESSION['id'];
            $result = $this->db->conn->query("SELECT `for_nom`, `for_id`, `mat_id`, `mat_nom`, `etud_id`
                FROM `formation` INNER JOIN `matiere` ON for_id=mat_formation INNER JOIN `etudiant` ON for_id=etud_formation WHERE etud_id=$id ORDER BY mat_id ASC
                ");
            $resultArray = array();
            // fetch product data one by one
            while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                $resultArray[] = $item;
            }
            return $resultArray;
        }
        public function getNotes(){
            $id = $_GET['id'];
            $result = $this->db->conn->query("SELECT * FROM `note` INNER JOIN etudiant ON etud_id=not_etudiant WHERE etud_id=$id");
            $resultArray = array();
            // fetch product data one by one
            while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                $resultArray[] = $item;
            }
            return $resultArray;
        }
        public function getNotesEtud(){
            $id = $_SESSION['id'];
            $result = $this->db->conn->query("SELECT * FROM `note` INNER JOIN etudiant ON etud_id=not_etudiant WHERE etud_id=$id ORDER BY not_matiere ASC");
            $resultArray = array();
            // fetch product data one by one
            while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                $resultArray[] = $item;
            }
            return $resultArray;
        }
        public function getEtudiantMatiereFormation(){
            $result = $this->db->conn->query("SELECT * FROM `note` INNER JOIN `matiere` ON not_matiere=mat_id
                INNER JOIN `etudiant` ON not_etudiant=etud_id INNER JOIN `formation` ON not_formation=for_id");
            $resultArray = array();
            // fetch product data one by one
            while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                $resultArray[] = $item;
            }
            return $resultArray;
        }
        public function noteGenerale(){
            $result = $this->db->conn->query("SELECT *, AVG(not_note) AS 'notegenerale' FROM `note` INNER JOIN `etudiant` 
                ON not_etudiant=etud_id GROUP BY not_etudiant");
            $resultArray = array();
            // fetch product data one by one
            while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                $resultArray[] = $item;
            }
            return $resultArray;
        }
        public function getMatiereFormation(){
            $result = $this->db->conn->query("SELECT * FROM `formation` INNER JOIN `matiere` ON for_id=mat_formation");
            $resultArray = array();
            // fetch product data one by one
            while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                $resultArray[] = $item;
            }
            return $resultArray;
        }
        public function getEtudiantMatiereFormations(){
            $etudiant = $_POST['etudiants'];
            $result = $this->db->conn->query("SELECT * FROM `note` INNER JOIN `matiere` ON not_matiere=mat_id
                INNER JOIN `etudiant` ON not_etudiant=etud_id WHERE etud_id=$etudiant");
            $resultArray = array();
            // fetch product data one by one
            while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                $resultArray[] = $item;
            }
            return $resultArray;
        }
        public function getEtudiantId(){
            $etudiant = $_POST['etudiants'];
            $result = $this->db->conn->query("SELECT *, AVG(not_note) AS 'noteglobal' FROM `etudiant` INNER JOIN `note` ON not_etudiant=etud_id
                WHERE etud_id=$etudiant");
            $resultArray = array();
            // fetch product data one by one
            while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                $resultArray[] = $item;
            }
            return $resultArray;
        }
        public function getformationUser(){
            $id = $_GET['id'];
            $result = $this->db->conn->query("SELECT * FROM `formation` WHERE for_id=$id");
            $resultArray = array();
            // fetch product data one by one
            while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                $resultArray[] = $item;
            }
            return $resultArray;
        }
        public function getFormationMatiere(){
            $result = $this->db->conn->query("SELECT `mat_id`, `for_nom`, `for_nom_arab`, `mat_formation`, `mat_nom`, `mat_nom_arab`, 
            `mat_prof`, `mat_prof_arab`, `mat_duree`, `for_id` FROM `formation` INNER JOIN `matiere` ON 
            formation.for_id=matiere.mat_formation ORDER BY for_nom");
            $resultArray = array();
            // fetch product data one by one
            while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                $resultArray[] = $item;
            }
            return $resultArray;
        }
        public function getEtudiant(){
            $result = $this->db->conn->query("SELECT * FROM `etudiant`");
            $resultArray = array();
            // fetch product data one by one
            while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                $resultArray[] = $item;
            }
            return $resultArray;
        }
        public function getEtudiantPromos(){
            $result = $this->db->conn->query("SELECT * FROM `etudiant` INNER JOIN `promos` ON etud_promos=pro_id");
            $resultArray = array();
            // fetch product data one by one
            while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                $resultArray[] = $item;
            }
            return $resultArray;
        }
        public function getformation(){
            $result = $this->db->conn->query("SELECT * FROM `formation`");
            $resultArray = array();
            // fetch product data one by one
            while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                $resultArray[] = $item;
            }
            return $resultArray;
        }
        public function getEtudForm(){
            $id = $_GET['id'];
            $result = $this->db->conn->query("SELECT `for_nom`, `for_id`, `etud_id`, `etud_nom`, `etud_prenom`,`etud_telephone`
                    FROM `formation` INNER JOIN `etudiant` ON for_id=etud_formation
                    WHERE for_id=$id");
            $resultArray = array();
            // fetch product data one by one
            while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                $resultArray[] = $item;
            }
            return $resultArray;
        }
        public function updateNote(){
            $id = $_GET['id'];
            $note = $_POST['note'];
            $result = $this->db->conn->query("UPDATE `note` SET `not_note`='$note' WHERE not_id=$id");
            if($result){
                echo "<script>window.location.href='modifier-note?id=$id'</script>";
                $_SESSION['status'] = "La note a été bien modifiée";
            }else{
                echo $this->db->conn->error;
            }
            return $result;
        }
        public function updateEtudFormation(){
            $id = $_SESSION['id'];
            $profesionnel = $_POST['profesionnel'];
            $for_id = $_POST['for_id'];
            $result = $this->db->conn->query("UPDATE `etudiant` SET `etud_formation`='$for_id', `etude_carte_pro`='$profesionnel' WHERE etud_id=$id");
            if($result){
                echo "<script>window.location.href='espace-stagiaire'</script>";
                $_SESSION['status'] = "Vous êtes bien inscrit";
            }else{
                echo $this->db->conn->error;
            }
            return $result;
        }
        public function updateMatiere(){
            $id = $_GET['id'];
            $formation_nom = $_POST['formation_nom'];
            $matiere_nom = $_POST['matiere_nom'];
            $prof_nom = $_POST['prof_nom'];
            $matiere_nom_arab = $_POST['matiere_nom_arab'];
            $prof_nom_arab = $_POST['prof_nom_arab'];
            $duree = $_POST['duree'];
            $result = $this->db->conn->query("UPDATE `matiere` SET `mat_formation`='$formation_nom',`mat_nom`='$matiere_nom',
            `mat_nom_arab`='$matiere_nom_arab',`mat_duree`='$duree',`mat_prof`='$prof_nom',`mat_prof_arab`='$prof_nom_arab' WHERE mat_id=$id");
            if($result){
                $_SESSION['status'] = "Le module a été bien modifié";
                echo "<script>window.location.href='module'</script>";
            }else{
                echo $this->db->conn->error;
            }
            return $result;
        }
        public function updateFormation(){
            $id = $_GET['id'];
            $formation_nom = mysqli_escape_string($this->db->conn, $_POST['formation_nom']) ;
            $presentation = mysqli_escape_string($this->db->conn, $_POST['presentation']);
            $description = mysqli_escape_string($this->db->conn, $_POST['description']);
            $formation_nom_arab = mysqli_escape_string($this->db->conn, $_POST['formation_nom_arab']) ;
            $presentation_arab = mysqli_escape_string($this->db->conn, $_POST['presentation_arab']);
            $description_arab = mysqli_escape_string($this->db->conn, $_POST['description_arab']);
            // $image = basename($_FILES['image']['name']);
            // $allowed = array('jpg', 'png', 'jpeg');
            // $ext = pathinfo($image, PATHINFO_EXTENSION); 
            // $path = "./images/etudiants/";
            $result = $this->db->conn->query("UPDATE `formation` SET `for_nom`='$formation_nom',`for_nom_arab`='$formation_nom_arab',
            `for_pres`='$presentation',`for_pres_arab`='$presentation_arab',`for_descr`='$description',`for_desc_arab`='$description_arab'
            WHERE for_id=$id");
            if($result){
                $_SESSION['status'] = "La formation a été bien modifiée";
                echo "<script>window.location.href='formations'</script>";
            }else{
                echo "not". $this->db->conn->error;
            }
            return $result;
        }
        public function updateSalle(){
            $id = $_GET['id'];
            $salle_prix = $_POST['salle_prix'];
            $salle_personne = $_POST['salle_personne'];
            $salle_service1 = $_POST['salle_service1'];
            $salle_service2 = $_POST['salle_service2'];
            $salle_service3 = $_POST['salle_service3'];
            $salle_service4 = $_POST['salle_service4'];
            $salle_service1_arab = $_POST['salle_service1_arab'];
            $salle_service2_arab = $_POST['salle_service2_arab'];
            $salle_service3_arab = $_POST['salle_service3_arab'];
            $salle_service4_arab = $_POST['salle_service4_arab'];
            $nom_salle = $_POST['nom_salle'];
            $nom_salle_arab = $_POST['nom_salle_arab'];
            $salle_desc = mysqli_escape_string($this->db->conn, $_POST['salle_descr']);
            $salle_desc_arab = mysqli_escape_string($this->db->conn, $_POST['salle_descr_arab']);            
            $image = basename($_FILES['salle_image']['name']);
            $allowed = array('jpg', 'png', 'jpeg');
            $ext = pathinfo($image, PATHINFO_EXTENSION); 
            $path = "./images/salles/";
            if(!in_array($ext, $allowed) && $image != ""){
                echo "<div class='alert alert-danger text-center mt-3 container' role='alert'>
                    L'image que vous avez choisit ".$image." est de type ".$ext.
                    "<br>Nous supportons juste les images de type 'jpg, png, jpeg'
                </div>";
            }else{
                if(move_uploaded_file($_FILES['salle_image']['tmp_name'], $path.$image)){
                    $result = $this->db->conn->query("UPDATE `salle` SET `sal_nom`='$nom_salle',`sal_nom_arab`='$nom_salle_arab',
                    `sal_desc`='$salle_desc',`sal_desc_arab`='$salle_desc_arab',`sal_prix`='$salle_prix',`sal_personne`='$salle_personne',
                    `sal_image`='$path$image',`sal_service`='$salle_service1',`sal_service2`='$salle_service2',`sal_service3`='$salle_service3',
                    `sal_service4`='$salle_service4',`sal_service_arab`='$salle_service1_arab',`sal_service2_arab`='$salle_service2_arab',
                    `sal_service3_arab`='$salle_service3_arab', `sal_service4_arab`='$salle_service4_arab' WHERE sal_id=$id");
                }else{
                    $result = $this->db->conn->query("UPDATE `salle` SET `sal_nom`='$nom_salle',`sal_nom_arab`='$nom_salle_arab',
                    `sal_desc`='$salle_desc',`sal_desc_arab`='$salle_desc_arab',`sal_prix`='$salle_prix',`sal_personne`='$salle_personne',
                    `sal_service`='$salle_service1',`sal_service2`='$salle_service2',`sal_service3`='$salle_service3',
                    `sal_service4`='$salle_service4',`sal_service_arab`='$salle_service1_arab',`sal_service2_arab`='$salle_service2_arab',
                    `sal_service3_arab`='$salle_service3_arab', `sal_service4_arab`='$salle_service4_arab' WHERE sal_id=$id");
                }
                if($result){
                    $_SESSION['status'] = "La salle a été bien modifiée";
                    echo "<script>window.location.href='salles'</script>";
                }else{
                    echo "not". $this->db->conn->error;
                }
                return $result;
            }
        }
        public function updateEtudiant(){
            $id = $_GET['id'];
            $nom = $_POST['nom'];
            $prenom = $_POST['prenom'];
            $prenom_arab = $_POST['prenom_arab'];
            $nom_arab = $_POST['nom_arab'];
            $cin = $_POST['cin'];
            $phone = $_POST['phone'];
            $email = $_POST['email'];
            $adress = $_POST['adress'];
            $lieu = $_POST['lieu'];
            $permis = $_POST['permis'];
            $obtenue = $_POST['obtenue'];
            $naissance = $_POST['naissance'];
            $categorie = $_POST['categorie'];
            $pro = $_POST['pro'];
            $image = basename($_FILES['image']['name']);
            $path = "./images/etudiants/";
            $allowed = array('jpg', 'png', 'jpeg');
            $ext = pathinfo($image, PATHINFO_EXTENSION); 
            if(!in_array($ext, $allowed) && $image != ""){
                echo "<div class='alert alert-danger text-center mt-3 container' role='alert'>
                        L'image que vous avez choisit est de type ".$ext.
                        "<br>Nous supportons juste les images de type 'jpg, png, jpeg'
                    </div>";
            }else{
                if(move_uploaded_file($_FILES['image']['tmp_name'], $path.$image)){
                    $result = $this->db->conn->query("UPDATE `etudiant` SET `etud_nom`='$nom',`etud_nom_arab`='$nom_arab',
                    `etud_prenom`='$prenom',`etud_prenom_arabe`='$prenom_arab',`etud_email`='$email',`etud_telephone`='$phone',
                    `etud_cin`='$cin',`etud_naissance`='$naissance',`etud_lieu_naissance`='$lieu',`etud_adress`='$adress',
                    `etud_permis`='$permis',`etud_cat_permis`='$categorie',`etude_carte_pro`='$pro',`etud_permis_obt`='$obtenue',
                    `etud_image`='$image' WHERE etud_id=$id");
                }else{
                    $result = $this->db->conn->query("UPDATE `etudiant` SET `etud_nom`='$nom',`etud_nom_arab`='$nom_arab',
                    `etud_prenom`='$prenom',`etud_prenom_arabe`='$prenom_arab',`etud_email`='$email',`etud_telephone`='$phone',
                    `etud_cin`='$cin',`etud_naissance`='$naissance',`etud_lieu_naissance`='$lieu',`etud_adress`='$adress',
                    `etud_permis`='$permis',`etud_cat_permis`='$categorie',`etude_carte_pro`='$pro',`etud_permis_obt`='$obtenue'
                    WHERE etud_id=$id");
                }
                if($result){
                    $_SESSION['status'] = "Le profile a été bien modifié";
                    echo "<script>window.location.href='stagiaire'</script>";
                }else{
                    echo "not good ".$this->db->conn->error;
                }
                return $result;
            }
        }
        public function updateImage(){
            $id = $_GET['id'];
            $salle_nom = $_POST['salle_id'];
            $image1 = basename($_FILES['image1']['name']);
            $image2 = basename($_FILES['image2']['name']);
            $image3 = basename($_FILES['image3']['name']);      
            $image4 = basename($_FILES['image4']['name']);
            $allowed = array('jpg', 'png', 'jpeg');
            $ext_image1 = pathinfo($image1, PATHINFO_EXTENSION);
            $ext_image2 = pathinfo($image2, PATHINFO_EXTENSION);
            $ext_image3 = pathinfo($image3, PATHINFO_EXTENSION);
            $ext_image4 = pathinfo($image4, PATHINFO_EXTENSION);   
            $path = "./images/salles/";
            if(!in_array($ext_image1, $allowed) & $image1 != ""){
                echo "<div class='alert alert-danger text-center mt-3 container' role='alert'>
                    L'image que vous avez choisit ".$image1." est de type ".$ext_image1.
                    "<br>Nous supportons juste les images de type 'jpg, png, jpeg'
                </div>";
            }else if(!in_array($ext_image2, $allowed) & $image2 != ""){
                echo "<div class='alert alert-danger text-center mt-3 container' role='alert'>
                    L'image que vous avez choisit ".$image2." est de type ".$ext_image2.
                    "<br>Nous supportons juste les images de type 'jpg, png, jpeg'
                </div>";
            }else if(!in_array($ext_image3, $allowed) & $image3 != ""){
                echo "<div class='alert alert-danger text-center mt-3 container' role='alert'>
                    L'image que vous avez choisit ".$image3." est de type ".$ext_image3.
                    "<br>Nous supportons juste les images de type 'jpg, png, jpeg'
                </div>";
            }else if(!in_array($ext_image4, $allowed) & $image4 != ""){
                echo "<div class='alert alert-danger text-center mt-3 container' role='alert'>
                    L'image que vous avez choisit ".$image4." est de type ".$ext_image4.
                    "<br>Nous supportons juste les images de type 'jpg, png, jpeg'
                </div>";
            }else{
                if(move_uploaded_file($_FILES['image1']['tmp_name'], $path.$image1)){
                    $result = $this->db->conn->query("UPDATE `img_salle` SET `img_salle`='$salle_nom',`img1`='$path$image1' WHERE img_id=$id");
                }else if(move_uploaded_file($_FILES['image2']['tmp_name'], $path.$image2)){
                    $result = $this->db->conn->query("UPDATE `img_salle` SET `img_salle`='$salle_nom',`img2`='$path$image2' WHERE img_id=$id");
                }else if(move_uploaded_file($_FILES['image3']['tmp_name'], $path.$image3)){
                    $result = $this->db->conn->query("UPDATE `img_salle` SET `img_salle`='$salle_nom',`img3`='$path$image3' WHERE img_id=$id");
                }else if(move_uploaded_file($_FILES['image4']['tmp_name'], $path.$image4)){
                    $result = $this->db->conn->query("UPDATE `img_salle` SET `img_salle`='$salle_nom',`img4`='$path$image4' WHERE img_id=$id");
                }else{
                    echo "<div class='alert alert-danger text-center mt-3 container' role='alert'>
                        Opération échouée
                    </div>";
                    $result = '';
                }
                if($result){
                    $_SESSION['status_image'] = "L'image a été bien modifiée";
                    echo '<script>window.location.href="salles"</script>';
                }
                return $result;
            }
        }
        public function getArticle(){
            $result = $this->db->conn->query("SELECT * FROM `article`");
            $resultArray = array();
            // fetch product data one by one
            while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                $resultArray[] = $item;
            }
            return $resultArray;
        }
        public function updateArticle(){
            $id = $_GET['id'];
            $titre = $_POST['art_titre'];
            $texte = $_POST['art_texte'];
            $titre_arab = $_POST['art_titre_arab'];
            $texte_arab = $_POST['art_texte_arab'];            
            $image = basename($_FILES['image']['name']);
            $allowed = array('jpg', 'png', 'jpeg');
            $ext = pathinfo($image, PATHINFO_EXTENSION);
            $path = "./images/etudiants/";
            if(!in_array($ext, $allowed) && $image != ''){
                echo "<div class='alert alert-danger text-center mt-3 container' role='alert'>
                    L'image que vous avez choisit ".$image." est de type ".$ext.
                    "<br>Nous supportons juste les images de type 'jpg, png, jpeg'
                </div>";
            }else{
                if(move_uploaded_file($_FILES['image']['tmp_name'], $path.$image)){
                    $result = $this->db->conn->query("UPDATE `article` SET `art_titre`='$titre',`art_titre_arab`='$titre_arab',`art_texte`='$texte',
                        `art_texte_arab`='$texte_arab',`art_image`='$path$image' WHERE art_id=$id");
                }else{
                    $result = $this->db->conn->query("UPDATE `article` SET `art_titre`='$titre',`art_titre_arab`='$titre_arab',`art_texte`='$texte',
                        `art_texte_arab`='$texte_arab' WHERE art_id=$id");
                }
                if($result){
                    $_SESSION['status'] = "L'article a été bien modifié";
                    echo "<script>window.location.href='articles'</script>";
                }else{
                    echo "not". $this->db->conn->error;
                }
                return $result;
            }
        }
        public function getDiplome(){
            $result = $this->db->conn->query("SELECT * FROM `diplome` INNER JOIN `etudiant` ON etud_id=dip_etudiant");
            $resultArray = array();
            // fetch product data one by one
            while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                $resultArray[] = $item;
            }
            return $resultArray;
        }
        public function getAttestation(){
            $result = $this->db->conn->query("SELECT * FROM `attestation` INNER JOIN `etudiant` ON etud_id=att_etudiant");
            $resultArray = array();
            // fetch product data one by one
            while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                $resultArray[] = $item;
            }
            return $resultArray;
        }
        public function countNotes(){
            $result = $this->db->conn->query("SELECT *, COUNT(not_id) AS 'total_not' FROM `note` INNER JOIN `etudiant` ON etud_id=not_etudiant");
            $resultArray = array();
            // fetch product data one by one
            while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                $resultArray[] = $item;
            }
            return $resultArray;
        }
        public function deleteMatieres($matiere_id = null){
            $result= $this->db->conn->query("DELETE FROM `matiere` WHERE mat_id=$matiere_id");
            if($result){
                $_SESSION['status'] = "Le module a été bien supprimé";
                echo "<script>window.location.href='module'</script>";
            }else{
                echo $this->db->conn->error;
            }
        }
        public function deleteNote($note_id = null){
            $count = $_POST['not_count'];
            for($i=0;$i<$count; $i++){
                $result= $this->db->conn->query("DELETE FROM `note` WHERE not_id=$note_id[$i]");
                if($result){
    
                }else{
                    echo $this->db->conn->error;
                }
            }

        }
        public function deleteIso($iso_id = null){
            $result= $this->db->conn->query("DELETE FROM `iso` WHERE iso_id=$iso_id");
            if($result){
                $_SESSION['status'] = "La demande de l'accompagenement ISO a été bien supprimé";
                echo "<script>window.location.href='accompagnement-conseil'</script>";
            }else{
                echo $this->db->conn->error;
            }
        }
        public function deleteDouane($douane_id = null){
            $result= $this->db->conn->query("DELETE FROM `douane` WHERE dou_id=$douane_id");
            if($result){
                $_SESSION['status'] = "La demande de la catégorisation douane a été bien supprimé";
                echo "<script>window.location.href='accompagnement-conseil'</script>";
            }else{
                echo $this->db->conn->error;
            }
        }
        public function deleteSalle($salle_id = null){
            $result= $this->db->conn->query("DELETE FROM `salle` WHERE sal_id=$salle_id");
            if($result){
                $_SESSION['status'] = "La salle a été bien supprimée";
                echo "<script>window.location.href='salles'</script>";
            }else{
                echo $this->db->conn->error;
            }
        }
        public function deleteCommentaires($comment_id = null){
            $id = $_GET['id'];
            $result= $this->db->conn->query("DELETE FROM `commentaire` WHERE com_id=$comment_id");
            if($result){
                $_SESSION['status'] = "Le Commentaire a été bien supprimé";
                echo "<script>window.location.href='article?id=$id'</script>";
            }else{
                echo $this->db->conn->error;
            }
        }
        public function getEtudiantCinPwd(){
            $cin = $_POST['cin'];
            $pwd = md5($_POST['password']);
            $result = $this->db->conn->query("SELECT * FROM `etudiant` WHERE etud_cin = '$cin' AND etud_motdepasse ='$pwd'");
            while($etudiant = mysqli_fetch_assoc($result)){
                $_SESSION['etud_cin'] = $etudiant['etud_cin'];
                $_SESSION['etud_motdepasse'] = $etudiant['etud_motdepasse'];
                $_SESSION['id'] = $etudiant['etud_id'];
                $_SESSION['nom'] = $etudiant['etud_nom'];
                echo "<script>window.location.href='espace-stagiaire'</script>";
            }
            if($_SESSION['lang'] == 'ar'){
                $_SESSION['status'] = "رقم البطاقة الوطنية أو القن السري غير صحيح";
            }else{
                $_SESSION['status'] = "CIN ou mot de passe incorrecte";
            }
            return $result;
        }
        public function getEtudiantNotes(){
            $result = $this->db->conn->query("SELECT * FROM `etudiant` RIGHT JOIN `formation` ON etud_formation=for_id LEFT JOIN `promos`
                        ON etud_promos=pro_id");
            $resultArray = array();
            // fetch product data one by one
            while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                $resultArray[] = $item;
            }
            return $resultArray;
        }
        public function checkEmailCin(){
            $date = date("Y-m-d");
            $nom = $_POST['nom'];
            $nom_arab = $_POST['nom_arab'];
            $prenom = $_POST['prenom'];
            $prenom_arab = $_POST['prenom_arab'];
            $email = $_POST['email'];
            $motdepasse = md5($_POST['motdepasse']);
            $cin = $_POST['cin'];
            $telephone = $_POST['telephone'];
            $naissance = $_POST['naissance'];
            $lieu = $_POST['lieu'];
            $adresse = $_POST['adresse'];
            $formation = $_POST['formation'];
            $permis = $_POST['permis'];
            $categorie = $_POST['categorie'];
            $obtenir = $_POST['obtenir'];
            $profesionnel = $_POST['profesionnel'];
            // @$promos = $_POST['promos'];
            $scan_cin = basename($_FILES['scan_cin']['name']);
            $scan_permis = basename($_FILES['scan_permis']['name']);
            $scan_visite = basename($_FILES['scan_visite']['name']);
            $image = basename($_FILES['image']['name']);
            $allowed = array('jpg', 'png', 'jpeg');
            $allowed2 = array('pdf');
            $ext = pathinfo($image, PATHINFO_EXTENSION);
            $ext_cin = pathinfo($scan_cin, PATHINFO_EXTENSION);
            $ext_permis = pathinfo($scan_permis, PATHINFO_EXTENSION);
            $ext_visite = pathinfo($scan_visite, PATHINFO_EXTENSION);
            $age = date_diff(date_create($naissance), date_create($date));
            $result = $this->db->conn->query("SELECT `etud_email` FROM `etudiant` WHERE etud_email = '$email'");
            $result2 = $this->db->conn->query("SELECT `etud_cin` FROM `etudiant` WHERE etud_cin = '$cin'");
            if($result->num_rows){
                $_SESSION['status_error'] = "Email existe déja";
            }
            else if($result2->num_rows){
                $_SESSION['status_error'] = "CIN existe déja";
            }else{
                if($prenom == ''){
                    if($_SESSION['lang'] == 'ar'){
                        echo "<div class='alert alert-danger text-center mt-3 container' role='alert'>الرجاء إدخال اسمك الأول بالفرنسية</div>";
                    }else{
                        echo "<div class='alert alert-danger text-center mt-3 container' role='alert'>Veuillez saisir votre prénom en français</div>";
                    }

                }else if($nom == ''){
                    if($_SESSION['lang'] == 'ar'){
                        echo "<div class='alert alert-danger text-center mt-3 container' role='alert'>الرجاء إدخال اسمك بالفرنسية</div>";
                    }else{
                        echo "<div class='alert alert-danger text-center mt-3 container' role='alert'>Veuillez saisir votre nom en français</div>";
                    }
                }else if($prenom_arab == ''){
                    if($_SESSION['lang'] == 'ar'){
                        echo "<div class='alert alert-danger text-center mt-3 container' role='alert'>الرجاء إدخال اسمك الأول باللغة العربية</div>";
                    }else{
                        echo "<div class='alert alert-danger text-center mt-3 container' role='alert'>Veuillez saisir votre prénom en arabe</div>";
                    }
                }else if($nom_arab == ''){
                    if($_SESSION['lang'] == 'ar'){
                        echo "<div class='alert alert-danger text-center mt-3 container' role='alert'>الرجاء إدخال اسمك باللغة العربية</div>";
                    }else{
                        echo "<div class='alert alert-danger text-center mt-3 container' role='alert'>Veuillez saisir votre nom en arabe</div>";
                    }
                }else if($email == ''){
                    if($_SESSION['lang'] == 'ar'){
                        echo "<div class='alert alert-danger text-center mt-3 container' role='alert'>رجاءا أدخل بريدك الإلكتروني</div>";
                    }else{
                        echo "<div class='alert alert-danger text-center mt-3 container' role='alert'>Veuillez saisir votre email</div>";
                    }
                }else if($_POST['motdepasse'] == ''){
                    if($_SESSION['lang'] == 'ar'){
                        echo "<div class='alert alert-danger text-center mt-3 container' role='alert'>الرجاء إدراج كلمة المرور الخاصة بك</div>";
                    }else{
                        echo "<div class='alert alert-danger text-center mt-3 container' role='alert'>Veuillez saisir votre mot de passe</div>";
                    }
                }else if($naissance == ''){
                    if($_SESSION['lang'] == 'ar'){
                        echo "<div class='alert alert-danger text-center mt-3 container' role='alert'>الرجاء ادخال تاريخ ميلادك</div>";
                    }else{
                        echo "<div class='alert alert-danger text-center mt-3 container' role='alert'>Veuillez saisir votre date de naissance</div>";
                    }
                }else if($date < $naissance){
                    if($_SESSION['lang'] == 'ar'){
                        echo "<div class='alert alert-danger text-center mt-3 container' role='alert'>الرجاء إدخال تاريخ الميلاد الصحيح</div>";
                    }else{
                        echo "<div class='alert alert-danger text-center mt-3 container' role='alert'>Veuillez saisir une date de naissance correcte</div>";
                    }
                }else if((int)$age->format('%y') < 18){
                    if($_SESSION['lang'] == 'ar'){
                        echo "<div class='alert alert-danger text-center mt-3 container' role='alert'>يجب أن يتجاوز عمرك 18 عامًا ، يرجى التحقق من تاريخ الميلاد</div>";
                    }else{
                        echo "<div class='alert alert-danger text-center mt-3 container' role='alert'>Votre age doit dépasser 18 ans veuillez vérifier la date de naissance</div>";
                    }
                }else if($lieu == ''){
                    if($_SESSION['lang'] == 'ar'){
                        echo "<div class='alert alert-danger text-center mt-3 container' role='alert'>الرجاء إدخال مسقط رأسك</div>";
                    }else{
                        echo "<div class='alert alert-danger text-center mt-3 container' role='alert'>Veuillez saisir votre lieu de naissance</div>";
                    }
                }else if($cin == ''){
                    if($_SESSION['lang'] == 'ar'){
                        echo "<div class='alert alert-danger text-center mt-3 container' role='alert'>المرجو إدخال رقم البطاقة الوطنية</div>";
                    }else{
                        echo "<div class='alert alert-danger text-center mt-3 container' role='alert'>Veuillez saisir votre CIN</div>";
                    }
                }else if($telephone == ''){
                    if($_SESSION['lang'] == 'ar'){
                        echo "<div class='alert alert-danger text-center mt-3 container' role='alert'>يرجى إدخال رقم الهاتف الخاص بك</div>";
                    }else{
                        echo "<div class='alert alert-danger text-center mt-3 container' role='alert'>Veuillez saisir votre numéro de téléphone</div>";
                    }
                }else if($adresse == ''){
                    echo "<div class='alert alert-danger text-center mt-3 container' role='alert'>
                        Veuillez saisir votre adresse
                    </div>";
                }else if($formation == ""){
                    if($_SESSION['lang'] == 'ar'){
                        echo "<div class='alert alert-danger text-center mt-3 container' role='alert'>الرجاء اختيار التكوين</div>";
                    }else{
                        echo "<div class='alert alert-danger text-center mt-3 container' role='alert'>Veuillez choisir une formation</div>";
                    }
                }else if($permis == ''){
                    if($_SESSION['lang'] == 'ar'){
                        echo "<div class='alert alert-danger text-center mt-3 container' role='alert'>الرجاء إدخال رقم رخصة السياقة</div>";
                    }else{
                        echo "<div class='alert alert-danger text-center mt-3 container' role='alert'>Veuillez saisir votre numéro de permis</div>";
                    }
                }else if($categorie == ""){
                    if($_SESSION['lnag'] == 'ar'){
                        echo "<div class='alert alert-danger text-center mt-3 container' role='alert'>الرجاء اختيار فئة رخصة السياقة</div>";
                    }else{
                        echo "<div class='alert alert-danger text-center mt-3 container' role='alert'>Veuillez choisir une catégorie de permis</div>";
                    }
                }else if($obtenir == ''){
                    if($_SESSION['lang'] == 'ar'){
                        echo "<div class='alert alert-danger text-center mt-3 container' role='alert'>الرجاء إدخال تاريخ الحصول على رخصة السياقة</div>";
                    }else{
                        echo "<div class='alert alert-danger text-center mt-3 container' role='alert'>Veuillez saisir la date d'obtention de votre permis</div>";
                    }
                }else if($date < $obtenir){
                    if($_SESSION['lang'] == 'ar'){
                        echo "<div class='alert alert-danger text-center mt-3 container' role='alert'>".date("d/m/Y")." يجب ألا يتجاوز تاريخ الحصول على رخصة السياقة على تاريخ اليوم  </div>";
                    }else{
                        echo "<div class='alert alert-danger text-center mt-3 container' role='alert'>La date d'obtention du permis ne dois pas dépasser la date d'aujourd'hui ".date("d/m/Y")." </div>";
                    }
                }else if($scan_cin == ''){
                    if($_SESSION['lang'] == 'ar'){
                        echo "<div class='alert alert-danger text-center mt-3 container' role='alert'>الرجاء تحميل مسح بطاقاكم الوطنية</div>";
                    }else{
                        echo "<div class='alert alert-danger text-center mt-3 container' role='alert'>Veuillez charger un scan de votre CIN</div>";
                    }
                }else if(!in_array($ext_cin, $allowed2)){
                    if($_SESSION['lang'] == 'ar'){
                        echo "<div class='alert alert-danger text-center mt-3 container' role='alert'>
                        ".$ext." الملف الذي قمت باسمه هو من النوع
                            <br>'pdf' نحن فقط ندعم الملفات
                        </div>";
                    }else{
                        echo "<div class='alert alert-danger text-center mt-3 container' role='alert'>
                            Le fichier que vous avez chargé ".$scan_cin." est de type ".$ext.
                            "<br>Nous supportons juste les fichiers de type 'pdf'
                        </div>";
                    }
                }else if($scan_permis == ''){
                    if($_SESSION['lang'] == 'ar'){
                        echo "<div class='alert alert-danger text-center mt-3 container' role='alert'>الرجاء تحميل مسح رخصة سياقتكم</div>";
                    }else{
                        echo "<div class='alert alert-danger text-center mt-3 container' role='alert'>Veuillez charger un scan de votre permis</div>";
                    }
                }else if(!in_array($ext_permis, $allowed2)){
                    if($_SESSION['lang'] == 'ar'){
                        echo "<div class='alert alert-danger text-center mt-3 container' role='alert'>
                        ".$ext." الملف الذي قمت باسمه هو من النوع
                            <br>'pdf' نحن فقط ندعم الملفات
                        </div>";
                    }else{
                        echo "<div class='alert alert-danger text-center mt-3 container' role='alert'>
                            Le fichier que vous avez chargé ".$scan_permis." est de type ".$ext.
                            "<br>Nous supportons juste les fichiers de type 'pdf'
                        </div>";
                    }
                }else if($scan_visite == ''){
                    if($_SESSION['lang'] == 'ar'){
                        echo "<div class='alert alert-danger text-center mt-3 container' role='alert'الرجاء تحميل مسح فحصكم الطبي</div>";
                    }else{
                        echo "<div class='alert alert-danger text-center mt-3 container' role='alert'>Veuillez charger un scan de votre visite médicale</div>";
                    }
                }else if(!in_array($ext_visite, $allowed2)){
                    if($_SESSION['lang'] == 'ar'){
                        echo  "<div class='alert alert-danger text-center mt-3 container' role='alert'>
                        ".$ext." الملف الذي قمت باسمه هو من النوع 
                            <br>'pdf' نحن فقط ندعم الملفات
                        </div>";
                    }else{
                        echo  "<div class='alert alert-danger text-center mt-3 container' role='alert'>
                            Le fichier que vous avez chargé ".$scan_visite." est de type ".$ext.
                            "<br>Nous supportons juste les fichiers de type 'pdf'
                        </div>";
                    }
                }else if(!in_array($ext, $allowed) & $image != ""){
                    if($_SESSION['lang'] == 'ar'){
                        echo  "<div class='alert alert-danger text-center mt-3 container' role='alert'>
                        ".$ext." الصورة التي قمت بتحميلها من النوع
                            <br>'jpg, png, jpeg' نحن فقط ندعم الصور نوع
                        </div>";
                    }else{
                        echo  "<div class='alert alert-danger text-center mt-3 container' role='alert'>
                        L'image que vous avez chargé ".$image." est de type ".$ext.
                        "<br>Nous supportons juste les images de type 'jpg, png, jpeg'
                    </div>";
                    }
                }else{
                    @mkdir("dossiers-stagiaires/".$prenom."-".$nom,0777,true);
                    $path = "./dossiers-stagiaires/$prenom-$nom/";
                    $imagelink = "image-";
                    $cinlink = "cin-";
                    $permislink = "permis-";
                    $visitelink = "visite-";
                    if($path){
                        move_uploaded_file($_FILES['image']['tmp_name'], $path."image-".$image);
                        move_uploaded_file($_FILES['scan_cin']['tmp_name'], $path."cin-".$scan_cin);
                        move_uploaded_file($_FILES['scan_permis']['tmp_name'], $path."permis-".$scan_permis);
                        move_uploaded_file($_FILES['scan_visite']['tmp_name'], $path."visite-".$scan_visite);   
                    }
                    $res = $this->db->conn->query("INSERT INTO `etudiant`(`etud_nom`, `etud_nom_arab`, `etud_prenom`, `etud_prenom_arabe`, 
                        `etud_email`, `etud_telephone`, `etud_motdepasse`, `etud_cin`, `etud_formation`, `etud_naissance`, 
                        `etud_lieu_naissance`, `etud_adress`, `etud_permis`, `etud_cat_permis`, `etude_carte_pro`, `etud_permis_obt`, 
                        `etud_scan_cin`, `etud_cin_name`, `etud_scan_permis`, `etud_permis_name`, `etud_scan_visite`, `etud_visite_name`, `etud_image`, `etud_inscription`) VALUES ('$nom','$nom_arab',
                        '$prenom','$prenom_arab','$email','$telephone','$motdepasse','$cin','$formation','$naissance','$lieu','$adresse',
                        '$permis','$categorie','$profesionnel','$obtenir','$path$cinlink$scan_cin','$cinlink$scan_cin','$path$permislink$scan_permis',
                        '$permislink$scan_permis','$path$visitelink$scan_visite','$visitelink$scan_visite','$path$imagelink$image',NOW())");
                        /*$to = $_POST['email'];
                        $subject = "Confirmation d'inscription";
                        $headers = 'Content-type: text/html';
                        $msg = "<img class='img-fluid' src='http://localhost/ecole/images/logo.jpeg' 
                                style='width:16rem; height:60px' alt='logo'>
                                <div style='text-align:center; align-items:center;'>
                                    <h1>Confirmation d'inscription</h1><br>
                                    <p><b>Merci d'avoir choisit notre institut.<b></p><br>
                                    Veuillez trouvez ci-dessous vos identifiants:
                                    <ul>
                                        <li>idenatidiant: ".$_POST['cin']."</li>
                                        <li>Mot de passe: ".$_POST['motdepasse']."</li>
                                    </ul>
                                    Pour plus d'information merci de visiter notre .<br>    
                                    <a href='http://localhost/ecole/'>Click here</a>
                                </div>";
                        mail($to, $subject, $msg, $headers);*/
                        echo "<script>window.location.href='login'</script>";
                        $_SESSION['status_login'] = "Votre inscription a été bien effectué Veuillez ce connecter";
                    return $res;
                } 
            }
        }
        public function deleteEtudiant($etudiant_id = null){
            $result= $this->db->conn->query("DELETE FROM `etudiant` WHERE etud_id=$etudiant_id");
            if($result){
                $_SESSION['status'] = "Le stagiaire a été bien supprimé";
                echo "<script>window.location.href='stagiaire'</script>";
            }else{
                echo $this->db->conn->error;
            }
        }
        public function getFormationMatiereEtudiant(){
            @$promotion = $_POST['promotion'];
            if(isset($_POST['submit_promotion'])){
                if($promotion == ''){
                    $_SESSION['status_error'] = "Merci de choisir une promotion pour poursuivre";
                }else{
                    echo $promotion;
                    $result = $this->db->conn->query("SELECT * FROM `formation` INNER JOIN `matiere` ON formation.for_id=matiere.mat_formation 
                    INNER JOIN `etudiant` ON formation.for_id=etudiant.etud_formation  INNER JOIN `promos` ON pro_id=etud_promos WHERE etud_promos = '$promotion' ORDER BY pro_groupe");
                    $resultArray = array();
                    // fetch product data one by one
                    while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                        $resultArray[] = $item;
                    }
                    return $resultArray;
                }
            }
        }
        public function getEtudiantFormationPromotion(){
            $result = $this->db->conn->query("SELECT * FROM `formation` INNER JOIN `matiere` ON formation.for_id=matiere.mat_formation 
                INNER JOIN `etudiant` ON formation.for_id=etudiant.etud_formation ORDER BY mat_nom");
            $resultArray = array();
            // fetch product data one by one
            while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                $resultArray[] = $item;
            }
            return $resultArray;
        }
        public function etudiantTotal(){
            $id = $_GET['id'];
            $result = $this->db->conn->query("SELECT *, COUNT(etud_nom) AS 'total_etudiant' FROM `formation` INNER JOIN `matiere` ON formation.for_id=matiere.mat_formation 
            INNER JOIN `etudiant` ON formation.for_id=etudiant.etud_formation INNER JOIN `promos` ON etud_promos=pro_id WHERE mat_id =$id GROUP BY mat_nom");
            $resultArray = array();
            // fetch product data one by one
            while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                $resultArray[] = $item;
            }
            return $resultArray;
        }
        public function insertAbsence(){
            $id = $_GET['id'];
            $date = date("Y-m-d");
            $absence_formation = $_POST['absence_formation'];
            $absence_matiere = $_POST['absence_matiere'];
            $absence_date = $_POST['absence_date'];
            $absence_etudiant = $_POST['absence_etudiant'];
            $absence = $_POST['absence'];
            $number_etudiant = $_POST['number_etudiant'];
            $checkdate = $this->db->conn->query("SELECT `abs_date`, `abs_formation` FROM `absence` WHERE abs_date='$absence_date' AND 
                        abs_formation='$absence_formation'");
            if($absence_date == ''){
                $_SESSION['status_error'] = 'Veuillez choisir une date';
                echo "<script>window.location.href='marquer-absence?id=$id'</script>";
            }else if($absence_date > $date){
                $_SESSION['status_error'] = "La date saisit ne doit pas être supérieure à la date d'ajourd'hui";
                echo "<script>window.location.href='marquer-absence?id=$id'</script>";
            }else if($checkdate->num_rows){
                $_SESSION['status_error'] = "Date déjà saisit veuillez choisir une autre";
                echo "<script>window.location.href='marquer-absence?id=$id'</script>";
            }else{
                for($i=0;$i<$number_etudiant; $i++){
                    $result = $this->db->conn->query("INSERT INTO `absence`(`abs_etudiant`, `abs_date`, `abs_formation`, `abs_matiere`, `abs_absence`) 
                    VALUES ('$absence_etudiant[$i]','$absence_date','$absence_formation','$absence_matiere','$absence[$i]')");
                    if($result){
                        $_SESSION['status'] = "Les données sont bien enregistrées";
                        echo "<script>window.location.href='marquer-absence?id=$id'</script>";
                    }else{
                        echo $this->db->conn->error;
                    }
                    return $result;
                }

            }

        }
        public function insertPromotion(){
            $promotion_name =  mysqli_escape_string($this->db->conn, $_POST['promotion_name']);
            $checkresult = $this->db->conn->query("SELECT `pro_année` FROM `promos` WHERE pro_group='$promotion_name'");
            if($checkresult->num_rows){
                $_SESSION['status_danger'] = "Nom existe déjà veuillez choisir un autre";
                echo "<script>window.location.href='ajouter-promotion'</script>";
            }else{
                $result = $this->db->conn->query("INSERT INTO `promos`(`pro_group`) VALUES ('$promotion_name')");
                if($result){
                    $_SESSION['status'] = "La promotion a été bien ajoutée";
                    echo "<script>window.location.href='ajouter-promotion'</script>";
                }else{
                    echo $this->db->conn->error;
                }
                return $result;
            }
        }
        public function getEtudiantForma(){
            $result = $this->db->conn->query("SELECT * FROM `etudiant` INNER JOIN `formation` ON etud_formation=for_id");
            $resultArray = array();
            // fetch product data one by one
            while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                $resultArray[] = $item;
            }
            return $resultArray;
        }
        public function getDataDiplome(){
            $result = $this->db->conn->query("SELECT * FROM `diplome` INNER JOIN `etudiant` ON etud_id=dip_etudiant");
            $resultArray = array();    
            // fetch product data one by one
            while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                $resultArray[] = $item;
                
            }
            return $resultArray;
        }
        public function getDiplometId($diplomeArray = null, $key = "dip_etudiant"){
            if ($diplomeArray != null){
                    $diplome_id = array_map(function ($value) use($key){
                    return $value[$key];
                }, $diplomeArray);
                return $diplome_id;
            }
        }
        public function getAttestationtId($attestationArray = null, $key = "att_etudiant"){
          if ($attestationArray != null){
            $attestation_id = array_map(function ($value) use($key){
                return $value[$key];
            }, $attestationArray);
                return $attestation_id;
            }
        }
        public function getDataAttestation(){
            $result = $this->db->conn->query("SELECT * FROM `attestation` INNER JOIN `etudiant` ON att_etudiant=etud_id");
            $resultArray = array();
            // fetch product data one by one
            while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                $resultArray[] = $item;
            }
            return $resultArray;
        }
        public  function insertIntoDiplome($params = null, $table = "diplome"){
            if ($this->db->conn != null){
                if ($params != null){
                    // "Insert into diplome(etudiant) values (0)"
                    // get table columns
                    $columns = implode(',', array_keys($params));
                    $values = implode(',' , array_values($params));
                    // create sql query
                    $query_string = sprintf("INSERT INTO %s(%s) VALUES(%s)", $table, $columns, $values);
                    // execute query
                    $result = $this->db->conn->query($query_string);
                    return $result;
                }
            }
        }
        public function addDiplome($etudiant){
            if (isset($etudiant)){
                $params = array(
                    "dip_etudiant" => $etudiant
                );
                $result = $this->insertIntoDiplome($params);
                if ($result){
                    $_SESSION['status'] = "Votre demande de document 1 a été bien envoyée";
                    echo "<script>window.location.href='espace-stagiaire'</script>";
                }else{
                    echo $this->db->conn->error;
                }
            }
        }
        public  function insertIntoAttestation($params = null, $table = "attestation"){
            if ($this->db->conn != null){
                if ($params != null){
                    // get table columns
                    $columns = implode(',', array_keys($params));
                    $values = implode(',' , array_values($params));
                    // create sql query
                    $query_string = sprintf("INSERT INTO %s(%s) VALUES(%s)", $table, $columns, $values);
                    // execute query
                    $result = $this->db->conn->query($query_string);
                    return $result;
                }
            }
        }
        public function addAttestation($etudiant){
            if (isset($etudiant)){
                $params = array(
                    "att_etudiant" => $etudiant
                );
                $result = $this->insertIntoAttestation($params);
                if ($result){
                    $_SESSION['status'] = "Votre demande de document 2 a été bien envoyée";
                    echo "<script>window.location.href='espace-stagiaire'</script>";
                }else{
                    echo $this->db->conn->error;
                }
            }
        }
        public function insertdouane(){
            $douane_nom = $_POST['douane_nom'];
            $douane_email = $_POST['douane_email'];
            $douane_message = mysqli_escape_string($this->db->conn, $_POST['douane_message']);
            $douane_categorie= $_POST['douane_categorie'];
            $result = $this->db->conn->query("INSERT INTO `douane`(`dou_nom`, `dou_res_nom`, `dou_res_email`, `dou_res_message`, `dou_res_date`) 
                VALUES ('$douane_categorie','$douane_nom','$douane_email','$douane_message', NOW())");
            if($result){
                if($_SESSION['lang'] == 'ar'){
                    $_SESSION['status'] = "تم إرسال طلب تصنيف الجمارك بشكل جيد";
                }else{
                    $_SESSION['status'] = "Votre demande de catégorisation douane a été bien envoyée";
                }
                echo "<script>window.location.href='douane'</script>";
            }
            return $result;
        }
        public function deleteDiplome($diplome_id = null){
            $result= $this->db->conn->query("DELETE FROM `diplome` WHERE dip_id=$diplome_id");
            if($result){
                $_SESSION['status'] = "La demande de document 1 a été bien supprimée";
                echo "<script>window.location.href='demandes'</script>";
            }
        }
        public function deleteAttestation($attestation_id = null){
            $result= $this->db->conn->query("DELETE FROM `attestation` WHERE att_id=$attestation_id");
            if($result){
                $_SESSION['status'] = "La demande de document 2 a été bien supprimée";
                echo "<script>window.location.href='demandes'</script>";
            }
        }
        public function updateDiplome(){
            $id = $_POST['dip_etud'];         
            $image = basename($_FILES['dip_image']['name']);
            $path = "./demande/diplomes/";
            if(move_uploaded_file($_FILES['dip_image']['tmp_name'], $path.$image)){
                $result = $this->db->conn->query("UPDATE `diplome` SET `dip_image`='$path$image' WHERE dip_etudiant=$id");
            }
            if($result){
                $_SESSION['status'] = "Le document a été bien envoyé";
                echo "<script>window.location.href='demandes'</script>";
            }else{
                echo "not". $this->db->conn->error;
            }
            return $result;
        }
        public function updateAttestation(){
            $id = $_POST['att_etud'];         
            $image = basename($_FILES['att_image']['name']);
            $path = "./demande/attestation/";
            if(move_uploaded_file($_FILES['att_image']['tmp_name'], $path.$image)){
                $result = $this->db->conn->query("UPDATE `attestation` SET `att_image`='$path$image' WHERE att_etudiant=$id");
            }
            if($result){
                $_SESSION['status'] = "Le document a été bien envoyé";
                echo "<script>window.location.href='demandes'</script>";
            }else{
                echo "not". $this->db->conn->error;
            }
            return $result;
        }
        public function getEtudiantparFormation(){
            $result = $this->db->conn->query("SELECT `for_nom`, COUNT(etud_nom) AS 'nombre_total'FROM `etudiant` INNER JOIN `formation` 
                ON for_id=etud_formation GROUP BY for_nom");
            $resultArray = array();
            // fetch product data one by one
            while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                $resultArray[] = $item;
            }
            return $resultArray;
        }
        public function getEtudiantTotal(){
            $result = $this->db->conn->query("SELECT COUNT(etud_nom) AS 'nombre_total' FROM `etudiant`");
            $resultArray = array();
            // fetch product data one by one
            while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                $resultArray[] = $item;
            }
            return $resultArray;
        }
        public function getEtudiantTotalDate(){
            $date = date("Y-m-d");
            $result = $this->db->conn->query("SELECT COUNT(etud_nom) AS 'nombre_total' FROM `etudiant` WHERE etud_inscription='$date'");
            $resultArray = array();
            // fetch product data one by one
            while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                $resultArray[] = $item;
            }
            return $resultArray;
        }
        public function getFormationTotal(){
            $result = $this->db->conn->query("SELECT COUNT(for_nom) AS 'nombre_total' FROM `formation`");
            $resultArray = array();
            // fetch product data one by one
            while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                $resultArray[] = $item;
            }
            return $resultArray;
        }
        public function getProfTotal(){
            $result = $this->db->conn->query("SELECT COUNT(mat_prof) AS 'nombre_total' FROM `matiere`");
            $resultArray = array();
            // fetch product data one by one
            while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                $resultArray[] = $item;
            }
            return $resultArray;
        }
        public function getEtudiantInscri(){
            $result = $this->db->conn->query("SELECT `etud_nom`, `etud_prenom`, `etud_email`, `etud_telephone`,
                `etud_formation`, `etud_inscription`, `for_nom` FROM `etudiant` INNER JOIN `formation` 
                ON for_id=etud_formation ORDER BY `etud_inscription` DESC LIMIT 10");
            $resultArray = array();
            // fetch product data one by one
            while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                $resultArray[] = $item;
            }
            return $resultArray;
        }
        public function getTotalArtciles(){
            $result = $this->db->conn->query("SELECT COUNT(art_titre) AS 'total_article'FROM `article`");
            $resultArray = array();
            // fetch product data one by one
            while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                $resultArray[] = $item;
            }
            return $resultArray;
        }
        public function getTotalComments(){
            $result = $this->db->conn->query("SELECT *, COUNT(com_comentaire) AS 'commentaires' FROM `article` INNER JOIN `commentaire` ON com_article=art_id");
            $resultArray = array();
            // fetch product data one by one
            while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                $resultArray[] = $item;
            }
            return $resultArray;
        }
        public function getReservations(){
            $result = $this->db->conn->query("SELECT * FROM `reservation` INNER JOIN `salle` ON sal_id=res_salle");
            $resultArray = array();
            // fetch product data one by one
            while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                $resultArray[] = $item;
            }
            return $resultArray;
        }
        public function getReservationsCount(){
            $result = $this->db->conn->query("SELECT COUNT(res_id) AS 'reservations' FROM `reservation` INNER JOIN `salle` 
                ON sal_id=res_salle");
            $resultArray = array();
            // fetch product data one by one
            while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                $resultArray[] = $item;
            }
            return $resultArray;
        }
        public function getReservationsDate(){
            $date = date("Y-m-d");
            $result = $this->db->conn->query("SELECT COUNT(res_id) AS 'reservations_date' FROM `reservation` INNER JOIN `salle` 
                ON sal_id=res_salle WHERE res_ajout='$date'");
            $resultArray = array();
            // fetch product data one by one
            while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                $resultArray[] = $item;
            }
            return $resultArray;
        }
        public function deleteReservations($reservation_id = null){
            $result= $this->db->conn->query("DELETE FROM `reservation` WHERE res_id=$reservation_id");
            if($result){
                $_SESSION['status'] = "La réservation de la salle a été bien supprimée";
                echo "<script>window.location.href='salles'</script>";
            }
        }
        public function getContacts(){
            $result = $this->db->conn->query("SELECT * FROM `contact`");
            $resultArray = array();
            // fetch product data one by one
            while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                $resultArray[] = $item;
            }
            return $resultArray;
        }
        public function deleteContacts($contact_id = null){
            $result= $this->db->conn->query("DELETE FROM `contact` WHERE con_id=$contact_id");
            if($result){
                $_SESSION['status'] = "Le message a été bien supprimé";
                echo "<script>window.location.href='contacts'</script>";
            }
        }
        public function insertiso(){
            $iso_nom = $_POST['iso_nom'];
            $iso_email = $_POST['iso_email'];
            $iso_message = mysqli_escape_string($this->db->conn, $_POST['iso_message']);
            $iso_categorie= $_POST['iso_categorie'];
                $result = $this->db->conn->query("INSERT INTO `iso`(`iso_nom`, `iso_res_nom`, `iso_res_email`, `iso_res_message`, `iso_res_date`) 
                VALUES ('$iso_categorie','$iso_nom','$iso_email','$iso_message', NOW())");
                if($result){
                    if($_SESSION['lang'] == 'ar'){
                        $_SESSION['status'] = "ISO تم إرسال طلب المصاحبة";
                    }else{
                        $_SESSION['status'] = "Votre demande d'accompagnement ISO a été bien envoyée";
                    }
                    echo "<script>window.location.href='conseil'</script>";
                }
                return $result;
            
        }
        public function deleteArticle($id = null){
            $result= $this->db->conn->query("DELETE FROM `article` WHERE art_id=$id");
            if($result){
                $_SESSION['status'] = "L'article a été bien supprimé";
                echo "<script>window.location.href='articles'</script>";
            }else{
                echo $this->db->conn->error ; 
            }
        }
        public function getArticleComments(){
            $result = $this->db->conn->query("SELECT *, COUNT(com_comentaire) AS 'commentaires' FROM `article` LEFT JOIN `commentaire` 
                ON com_article=art_id GROUP BY art_titre ORDER BY art_ajout DESC");
            $resultArray = array();
            // fetch product data one by one
            while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                $resultArray[] = $item;
            }
            return $resultArray;
        }
        public function getArticleLimit(){
            $result = $this->db->conn->query("SELECT * FROM `article` LIMIT 10");
            $resultArray = array();
            // fetch product data one by one
            while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                $resultArray[] = $item;
            }
            return $resultArray;
        }
        public function getArticleTitre(){
            $id = $_GET['id'];
            $result = $this->db->conn->query("SELECT *, COUNT(com_comentaire) AS 'commentaires' FROM `article` INNER JOIN `commentaire` ON com_article=art_id WHERE art_id=$id");
            $resultArray = array();
            // fetch product data one by one
            while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                $resultArray[] = $item;
            }
            return $resultArray;
        }
        public function getComments(){
            $id = $_GET['id'];
            $result = $this->db->conn->query("SELECT * FROM `commentaire` WHERE com_article =$id");
            $resultArray = array();
            // fetch product data one by one
            while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                $resultArray[] = $item;
            }
            return $resultArray;
        }
        public function insertSalle(){
            $nom_salle = $_POST['nom_salle'];
            $nom_salle_arab = $_POST['nom_salle_arab'];
            $salle_prix = $_POST['salle_prix'];
            $salle_personne = $_POST['salle_personne'];
            $salle_service1 = $_POST['salle_service1'];
            $salle_service2 = $_POST['salle_service2'];
            $salle_service3 = $_POST['salle_service3'];
            $salle_service4 = $_POST['salle_service4'];
            $salle_service1_arab = $_POST['salle_service1_arab'];
            $salle_service2_arab = $_POST['salle_service2_arab'];
            $salle_service3_arab = $_POST['salle_service3_arab'];
            $salle_service4_arab = $_POST['salle_service4_arab'];
            $salle_desc = mysqli_escape_string($this->db->conn, $_POST['salle_desc']);
            $salle_desc_arab = mysqli_escape_string($this->db->conn, $_POST['salle_desc_arab']);
            $image = basename($_FILES['salle_image']['name']);
            $allowed = array('jpg', 'png', 'jpeg');
            $ext = pathinfo($image, PATHINFO_EXTENSION);
            $path = "./images/salles/";
            if($nom_salle == ''){
                echo "<div class='alert alert-danger text-center mt-3 container' role='alert'>
                        Veuillez saisir un nom en français pour la salle
                    </div>";
            }else if($nom_salle_arab == ''){
                echo "<div class='alert alert-danger text-center mt-3 container' role='alert'>
                        Veuillez saisir un nom en arabe pour la salle
                    </div>";
            }else if($salle_desc == ''){
                echo "<div class='alert alert-danger text-center mt-3 container' role='alert'>
                        Veuillez saisir une description en français pour la salle
                    </div>";
            }else if($salle_desc_arab == ''){
                echo "<div class='alert alert-danger text-center mt-3 container' role='alert'>
                        Veuillez saisir une description en arabe pour la salle
                    </div>";
            }else if($salle_prix == ''){
                echo "<div class='alert alert-danger text-center mt-3 container' role='alert'>
                        Veuillez saisir un prix pour la salle
                    </div>";
            }else if($salle_personne == ''){
                echo "<div class='alert alert-danger text-center mt-3 container' role='alert'>
                        Veuillez saisir le nombre maximum de personne pour la salle
                    </div>";
            }else if($salle_service1 == ''){
                echo "<div class='alert alert-danger text-center mt-3 container' role='alert'>
                        Veuillez saisir le service 1 de la salle
                    </div>";
            }else if($salle_service2 == ''){
                echo "<div class='alert alert-danger text-center mt-3 container' role='alert'>
                        Veuillez saisir le service 2 de la salle
                    </div>";
            }else if($salle_service3 == ''){
                echo "<div class='alert alert-danger text-center mt-3 container' role='alert'>
                        Veuillez saisir le service 3 de la salle
                    </div>";
            }else if($salle_service4 == ''){
                echo "<div class='alert alert-danger text-center mt-3 container' role='alert'>
                        Veuillez saisir le service 4 de la salle
                    </div>";
            }else if($salle_service1_arab == ''){
                echo "<div class='alert alert-danger text-center mt-3 container' role='alert'>
                        Veuillez saisir le service 1 en arabe de la salle
                    </div>";
            }else if($salle_service2_arab == ''){
                echo "<div class='alert alert-danger text-center mt-3 container' role='alert'>
                        Veuillez saisir le service 2 en arabe de la salle
                    </div>";
            }else if($salle_service3_arab == ''){
                echo "<div class='alert alert-danger text-center mt-3 container' role='alert'>
                        Veuillez saisir le service 3 en arabe de la salle
                    </div>";
            }else if($salle_service4_arab == ''){
                echo "<div class='alert alert-danger text-center mt-3 container' role='alert'>
                        Veuillez saisir le service 4 en arabe de la salle
                    </div>";
            }else if($image == ''){
                echo "<div class='alert alert-danger text-center mt-3 container' role='alert'>
                        Veuillez choisir une image pour la salle
                    </div>";
            }else if(!in_array($ext, $allowed)){
                echo  "<div class='alert alert-danger text-center mt-3 container' role='alert'>
                    L'image que vous avez choisit ".$image." est de type ".$ext.
                    "<br>Nous supportons juste les images de type 'jpg, png, jpeg'
                    </div>";
            }else if(move_uploaded_file($_FILES['salle_image']['tmp_name'], $path.$image)){
                $result = $this->db->conn->query("INSERT INTO `salle`(`sal_nom`, `sal_nom_arab`, `sal_desc`, `sal_desc_arab`, `sal_prix`, 
                `sal_personne`, `sal_image`, `sal_service`, `sal_service2`, `sal_service3`, `sal_service4`, `sal_service_arab`, 
                `sal_service2_arab`, `sal_service3_arab`, `sal_service4_arab`) VALUES ('$nom_salle','$nom_salle_arab','$salle_desc','$salle_desc_arab',
                '$salle_prix','$salle_personne','$path$image','$salle_service1','$salle_service2','$salle_service3','$salle_service4',
                '$salle_service1_arab','$salle_service2_arab','$salle_service3_arab','$salle_service4_arab')");
                if($result){
                    $_SESSION['status'] = "La Salle a été bien ajoutée";
                    echo "<script>window.location.href='salles'</script>";
                }else{
                    echo "not good ".$this->db->conn->error;
                }
                return $result;
            }
        }
        public function insertMatiere(){
            $formation = $_POST['formation'];
            $matiere = $_POST['matiere'];
            $prof = $_POST['prof'];
            $matiere_arab = $_POST['matiere_arab'];
            $prof_arab = $_POST['prof_arab'];
            $duree = $_POST['duree'];
            $numbers = $_POST['nums'];
            for($i=0;$i<$numbers; $i++){
                $result = $this->db->conn->query("INSERT INTO `matiere`(`mat_formation`, `mat_nom`, `mat_nom_arab`, `mat_duree`, `mat_prof`, 
                `mat_prof_arab`) VALUES ('$formation','$matiere[$i]','$matiere_arab[$i]','$duree[$i]','$prof[$i]','$prof_arab[$i]')");
                if($result){
                    $_SESSION['status'] = "Le module a été bien ajouté";
                    echo "<script>window.location.href='module'</script>";
                }else{
                    echo $this->db->conn->error;
                }
            }
            return $result;
        }
        public function insertFormation(){
            $nom_formation = $_POST['titre'];
            $presentation = mysqli_escape_string($this->db->conn, $_POST['presentation']);
            $description = mysqli_escape_string($this->db->conn, $_POST['description']);
            $nom_formation_arabe = $_POST['titre_arabe'];
            $presentation_arabe = mysqli_escape_string($this->db->conn, $_POST['presentation_arabe']);
            $description_arabe = mysqli_escape_string($this->db->conn, $_POST['description_arabe']);
            if($nom_formation == ''){
                echo "<div class='alert alert-danger text-center mt-3 container' role='alert'>
                        Veuillez saisir un nom de formation en français
                    </div>";
            }else if($presentation == ''){
                echo "<div class='alert alert-danger text-center mt-3 container' role='alert'>
                        Veuillez saisir une présentation de la formation en français
                    </div>";
            }else if($description == ''){
                echo "<div class='alert alert-danger text-center mt-3 container' role='alert'>
                        Veuillez saisir une description de la formation en français
                    </div>";
            }else if($nom_formation_arabe == ''){
                echo "<div class='alert alert-danger text-center mt-3 container' role='alert'>
                        Veuillez saisir un nom de formation en arabe
                    </div>";
            }else if($presentation_arabe == ''){
                echo "<div class='alert alert-danger text-center mt-3 container' role='alert'>
                        Veuillez saisir une présentation de la formation en arabe
                    </div>";
            }else if($description_arabe == ''){
                echo "<div class='alert alert-danger text-center mt-3 container' role='alert'>
                        Veuillez saisir une description de la formation en arabe
                    </div>";
            }else{
                $result = $this->db->conn->query("INSERT INTO `formation`(`for_nom`, `for_nom_arab`, `for_pres`, `for_pres_arab`, `for_descr`, 
                    `for_desc_arab`) VALUES ('$nom_formation','$nom_formation_arabe','$presentation','$presentation_arabe',
                    '$description','$description_arabe')");
                if($result){
                    $_SESSION['status'] = "La formation a été bien ajouté";
                    echo "<script>window.location.href='formations'</script>";
                }else{
                    echo $this->db->conn->error ;
                } 
                return $result;
            }
        }
        public function insertArticle(){
            $titre = mysqli_escape_string($this->db->conn, $_POST['titre']);
            $titre_arab = mysqli_escape_string($this->db->conn, $_POST['titre_arab']);
            $texte = mysqli_escape_string($this->db->conn, $_POST['texte']);
            $texte_arab = mysqli_escape_string($this->db->conn, $_POST['texte_arab']);
            $image = basename($_FILES['image']['name']);
            $allowed = array('jpg', 'png', 'jpeg');
            $ext = pathinfo($image, PATHINFO_EXTENSION);
            $path = "./images/articles/";
            if($titre == ''){
                echo "<div class='alert alert-danger text-center mt-3 container' role='alert'>
                    Veuillez saisir le nom de l'article
                </div>";
            }else if($texte == ''){
                echo "<div class='alert alert-danger text-center mt-3 container' role='alert'>
                    Veuillez saisir l'article
                </div>";
            }else if($titre_arab == ''){
                echo "<div class='alert alert-danger text-center mt-3 container' role='alert'>
                    Veuillez saisir le nom de l'article en arabe
                </div>";
            }else if($texte_arab == ''){
                echo "<div class='alert alert-danger text-center mt-3 container' role='alert'>
                    Veuillez saisir l'article en arabe
                </div>";
            }else if($image == ''){
                echo "<div class='alert alert-danger text-center mt-3 container' role='alert'>
                    Veuillez choisir une image
                </div>";
            }else if(!in_array($ext, $allowed)){
                echo  "<div class='alert alert-danger text-center mt-3 container' role='alert'>
                    Le fichier que vous avez choisit ".$image." est de type ".$ext.
                    "<br>Nous supportant juste les images de type 'jpg, png, jpeg'
                </div>";
            }else{
                if(move_uploaded_file($_FILES['image']['tmp_name'], $path.$image)){
                    $result = $this->db->conn->query("INSERT INTO `article`(`art_titre`, `art_titre_arab`, `art_texte`, `art_texte_arab`, 
                    `art_image`, `art_ajout`) VALUES ('$titre','$titre_arab','$texte','$texte_arab','$path$image',NOW())");
                    if($result){
                        $_SESSION['status'] = "L'article a été bien ajouté";
                        echo "<script>window.location.href='articles'</script>";
                    }else{
                        echo "not good ".$this->db->conn->error;
                    }
                    return $result;
                }
            }
        } 
        public function insertImages(){
            $nom_salle = $_POST['salle_id'];
            $image1 = basename($_FILES['image1']['name']);
            $image2 = basename($_FILES['image2']['name']);
            $image3 = basename($_FILES['image3']['name']);         
            $image4 = basename($_FILES['image4']['name']);
            $allowed = array('jpg', 'png', 'jpeg');
            $ext_image1 = pathinfo($image1, PATHINFO_EXTENSION);
            $ext_image2 = pathinfo($image2, PATHINFO_EXTENSION);
            $ext_image3 = pathinfo($image3, PATHINFO_EXTENSION);
            $ext_image4 = pathinfo($image4, PATHINFO_EXTENSION);
            $path = "./images/salles/";
            if($image1 == '' && $image2 == '' && $image3 == '' && $image4 == ''){
                echo  "<div class='alert alert-danger text-center mt-3 container' role='alert'>
                            Veuillez choisir une image
                        </div>";
            }else if(!in_array($ext_image1, $allowed)){
                echo  "<div class='alert alert-danger text-center mt-3 container' role='alert'>
                            Le fichier que vous avez choisit ".$image1." est de type ".$ext_image1.
                            "<br>Nous supportant juste les images de type 'jpg, png, jpeg'
                        </div>";
            }else if(!in_array($ext_image2, $allowed)){
                echo  "<div class='alert alert-danger text-center mt-3 container' role='alert'>
                            Le fichier que vous avez choisit ".$image2."  est de type ".$ext_image2.
                            "<br>Nous supportant juste les images de type 'jpg, png, jpeg'
                        </div>";
            }else if(!in_array($ext_image3, $allowed)){
                echo  "<div class='alert alert-danger text-center mt-3 container' role='alert'>
                            Le fichier que vous avez choisit ".$image3."  est de type ".$ext_image3.
                            "<br>Nous supportant juste les images de 'jpg, png, jpeg'
                        </div>";
            }else if(!in_array($ext_image4, $allowed)){
                echo  "<div class='alert alert-danger text-center mt-3 container' role='alert'>
                            Le fichier que vous avez choisit ".$image4."  est de type ".$ext_image4.
                            "<br>Nous supportant juste les images de type 'jpg, png, jpeg'
                        </div>";
            }else{
                move_uploaded_file($_FILES['image1']['tmp_name'], $path.$image1);
                move_uploaded_file($_FILES['image2']['tmp_name'], $path.$image2);
                move_uploaded_file($_FILES['image3']['tmp_name'], $path.$image3);
                move_uploaded_file($_FILES['image4']['tmp_name'], $path.$image4);
                    $result = $this->db->conn->query("INSERT INTO `img_salle`(`img_salle`, `img1`, `img2`, `img3`, `img4`) VALUES 
                        ('$nom_salle','$path$image1','$path$image2','$path$image3','$path$image4')"); 
                if($result){
                    $_SESSION['status'] = "L'image a été bien insérée";
                    echo "<script>window.location.href='salles'</script>";
                }else{
                    echo "not". $this->db->conn->error;
                }
                return $result;
            }
        }
        public function getiso(){
            $result = $this->db->conn->query("SELECT * FROM `iso`");
            $resultArray = array();
            // fetch product data one by one
            while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                $resultArray[] = $item;
            }
            return $resultArray;
        }
        public function getisoTotal(){
            $result = $this->db->conn->query("SELECT COUNT(iso_id) AS 'total_iso' FROM `iso`");
            $resultArray = array();
            // fetch product data one by one
            while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                $resultArray[] = $item;
            }
            return $resultArray;
        }
        public function getisoDate(){
            $date = date("Y-m-d");
            $result = $this->db->conn->query("SELECT COUNT(iso_id) AS 'total_iso_date' FROM `iso` WHERE iso_res_date='$date'");
            $resultArray = array();
            // fetch product data one by one
            while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                $resultArray[] = $item;
            }
            return $resultArray;
        }
        public function getdouane(){
            $result = $this->db->conn->query("SELECT * FROM `douane`");
            $resultArray = array();
            // fetch product data one by one
            while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                $resultArray[] = $item;
            }
            return $resultArray;
        }
        public function getdouaneTotal(){
            $result = $this->db->conn->query("SELECT COUNT(dou_id) AS 'Total_douane' FROM `douane`");
            $resultArray = array();
            // fetch product data one by one
            while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                $resultArray[] = $item;
            }
            return $resultArray;
        }
        public function getdouaneDate(){
            $date = date("Y-m-d");
            $result = $this->db->conn->query("SELECT COUNT(dou_id) AS 'Total_douane_date' FROM `douane` WHERE dou_res_date='$date'");
            $resultArray = array();
            // fetch product data one by one
            while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                $resultArray[] = $item;
            }
            return $resultArray;
        }
        public function getEtudiantFormationID(){
            $result = $this->db->conn->query("SELECT * FROM `etudiant` INNER JOIN  `formation` ON for_id=etud_formation");
            $resultArray = array();
            // fetch product data one by one
            while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                $resultArray[] = $item;
            }
            return $resultArray;
        }
        public function getabsence(){
            @$get_matiere = $_POST['get_matiere'];
            @$absence_date = $_POST['absence_date'];
            if(isset($_POST['absence_submit'])){
                if($get_matiere == ''){
                    $_SESSION['status_error'] = "Veuillez saisir un module";
                }else if($absence_date == ''){
                    $_SESSION['status_error'] = "Veuillez saisir une date";
                }else{
                    $checkresdate = $this->db->conn->query("SELECT `abs_date`,`abs_matiere` FROM `absence` WHERE abs_date !='$absence_date' AND abs_matiere='$get_matiere'");
                    $checkresmodule = $this->db->conn->query("SELECT `abs_date`,`abs_matiere` FROM `absence` WHERE abs_date ='$absence_date' AND abs_matiere!='$get_matiere'");
                    $checkresmoduledate = $this->db->conn->query("SELECT `abs_date`,`abs_matiere` FROM `absence` WHERE abs_date !='$absence_date' AND abs_matiere!='$get_matiere'");
                    if($checkresdate->num_rows){
                        $_SESSION['status_error'] = "La date que vous avez saisit ne corresponds à aucune date de cours";
                    }else if($checkresmodule->num_rows){
                        $_SESSION['status_error'] = "Le module que vous avez saisit ne correspands pas à cette date d'absence ".$absence_date;
                    }/*else if($checkresmoduledate->num_rows){
                        $_SESSION['status_error'] = "Aucune donnée ne correspand à votre recherche";
                    }*/else{
                        $result = $this->db->conn->query("SELECT * FROM `absence` INNER JOIN `etudiant` 
                        ON absence.abs_etudiant=etudiant.etud_id INNER JOIN `formation` ON absence.abs_formation=formation.for_id 
                        WHERE abs_matiere='$get_matiere' AND abs_date='$absence_date' GROUP BY etud_id, abs_date");  
                        $resultArray = array();
                        // fetch product data one by one
                        while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                            $resultArray[] = $item;
                        }
                        return $resultArray;
                    }
                }
            }
            
        }
        public function getabsenceetudiant(){
            $id = $_SESSION['id'];
            $result = $this->db->conn->query("SELECT *, COUNT(abs_absence) AS 'Total_absence' FROM `absence` INNER JOIN `etudiant` 
                ON absence.abs_etudiant=etudiant.etud_id WHERE abs_absence='Présent' AND etud_id=$id");
            $resultArray = array();
            // fetch product data one by one
            while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                $resultArray[] = $item;
            }
            return $resultArray;
        }
        public function getTotalAbsence(){
            $id = $_SESSION['id'];
            $result = $this->db->conn->query("SELECT *, COUNT(abs_id) AS 'Total' FROM `absence` INNER JOIN `etudiant` 
            ON absence.abs_etudiant=etudiant.etud_id WHERE etud_id=$id");
            $resultArray = array();
            // fetch product data one by one
            while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                $resultArray[] = $item;
            }
            return $resultArray;
        }
        public function getTotalAbsenceAdmin(){
            $id = $_POST['id'];
            $result = $this->db->conn->query("SELECT *, COUNT(abs_id) AS 'Total' FROM `absence` INNER JOIN `etudiant` 
            ON absence.abs_etudiant=etudiant.etud_id WHERE abs_absence='Absent' AND etud_id='$id'");
            $resultArray = array();
            // fetch product data one by one
            while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                $resultArray[] = $item;
            }
            return $resultArray;
        }
        public function getCommentsAjax(){
            $article_id = $_POST['article_id'];
            $result = $this->db->conn->query("SELECT * FROM `commentaire` WHERE com_article =$article_id");
            $resultArray = array();
            // fetch product data one by one
            while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                $resultArray[] = $item;
            }
            return $resultArray;
        }
        public function getEtudiantNotesAjax(){
            $result = $this->db->conn->query("SELECT *, AVG(not_note) AS 'notegenerale' FROM `etudiant` LEFT JOIN `note` ON not_etudiant=etud_id 
                LEFT JOIN `formation` ON etud_formation=for_id GROUP BY etud_id");
            $resultArray = array();
            // fetch product data one by one
            while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                $resultArray[] = $item;
            }
            return $resultArray;
        }
        public function getEtudiantsSearch(){
            $result = $this->db->conn->query("SELECT * FROM `etudiant` LEFT JOIN `note` ON not_etudiant=etud_id 
                INNER JOIN `formation` ON etud_formation=for_id GROUP BY not_etudiant");
            $resultArray = array();
            // fetch product data one by one
            while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                $resultArray[] = $item;
            }
            return $resultArray;
        }
        public function insertContact(){
            $nom = $_POST['nom'];
            $email = $_POST['email'];
            $message = mysqli_escape_string($this->db->conn, $_POST['message']);
            $sujet = mysqli_escape_string($this->db->conn, $_POST['sujet']);
            $result = $this->db->conn->query("INSERT INTO `contact`(`con_nom`, `con_email`, `con_sujet`, `con_message`, `con_envoie`)
                VALUES ('$nom','$email','$sujet','$message',NOW())");
            if($_SESSION['lang'] =="ar"){
                echo '<div class="alert alert-success text-center mt-2" role="alert" id="btn-fermer">تم ارسال رسالتك بنجاح <i class="fas fa-times font-close" onclick="fermer()"></i></div>'; 
            }else{
                echo '<div class="alert alert-success text-center mt-2" role="alert" id="btn-fermer">Votre message a été envoyé avec succes <i class="fas fa-times font-close" onclick="fermer()"></i></div>'; 
            }
            return $result;
        }
        public function insertReservation(){
            $reservation_nom = $_POST['reservation_nom'];
            $email_reservation = $_POST['email_reservation'];
            $reservation_telephone = $_POST['reservation_telephone'];
            $salle_id = $_POST['salle_id'];
            $date_salle = $_POST['date_salle'];
            $time_debut = $_POST['time_debut'];
            $time_fin = $_POST['time_fin'];
            $commentaire_reservation = mysqli_escape_string($this->db->conn, $_POST['commentaire_reservation']);
            $date = date("Y-m-d");
            $result = $this->db->conn->query("SELECT * FROM `reservation` WHERE res_salle='$salle_id' AND res_date='$date_salle' AND (time_fin>'$time_debut' AND time_debut <'$time_fin')");
            //$result2 = $this->db->conn->query("SELECT * FROM `reservation` WHERE res_salle=$salle_id AND time_debut>='$time_debut' AND time_debut <'$time_fin'");
            if($date_salle < $date){
                if($_SESSION['lang'] == 'ar'){
                    echo '<div class="alert alert-danger text-center mt-2" role="alert">
                        يرجى التحقق من البيانات 
                    </div>';
                }else{
                    echo '<div class="alert alert-danger text-center mt-2" role="alert">
                        Réservation échouée svp vérifier les données entrées
                    </div>';
                }
            }else if($result->num_rows){
                if($_SESSION['lang'] == 'ar'){
                    echo "<div class='alert alert-danger text-center mt-2' role='alert'>
                        وقت محجوز ، يرجى أخذ ساعة جديدة
                    </div>";
                }else{
                    echo "<div class='alert alert-danger text-center mt-2' role='alert'>
                        Heure réservée, Merci de prendre une nouvelle heure
                    </div>";
                }
            }else if($time_fin < $time_debut){
                if($_SESSION['lang'] == 'ar'){
                    echo "<div class='alert alert-danger text-center mt-2' role='alert'>
                        يجب أن يكون وقت النهاية دائمًا أكبر من تاريخ البدء
                    </div>";
                }else{
                    echo "<div class='alert alert-danger text-center mt-2' role='alert'>
                        L'heure de fin doit toujours être supérieure à la date de début
                    </div>";
                }
            }else{
                $result3 = $this->db->conn->query("INSERT INTO `reservation`(`res_nom`, `res_telephone`, `res_email`, `res_salle`, 
                `res_commentaire`, `res_date`, `time_debut`, `time_fin`) 
                VALUES ('$reservation_nom','$reservation_telephone','$email_reservation','$salle_id','$commentaire_reservation'
                ,'$date_salle','$time_debut','$time_fin')");
                echo '<div class="alert alert-success text-center mt-2" role="alert" id="btn-fermer">Votre réservation a été effectuée avec succès <i class="fas fa-times font-close2" onclick="fermer()"></i></div>';   
                return $result3;
            }
        }
        public function getEtudiantNotesSearch(){
            if(isset($_POST['nom'])){
                $nom = $_POST['nom'];
                $result = $this->db->conn->query("SELECT *, AVG(not_note) AS 'notegenerale' FROM `etudiant` LEFT JOIN `note` ON not_etudiant=etud_id 
                    LEFT JOIN `formation` ON etud_formation=for_id GROUP BY not_etudiant HAVING etud_nom LIKE '%".$nom."%' OR etud_prenom LIKE '%".$nom."%'");
                $resultArray = array();
                // fetch product data one by one
                while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                    $resultArray[] = $item;
                }
                return $resultArray;
            }else{
                $result = $this->db->conn->query("SELECT *, AVG(not_note) AS 'notegenerale' FROM `etudiant` LEFT JOIN `note` ON not_etudiant=etud_id 
                    INNER JOIN `formation` ON etud_formation=for_id GROUP BY etud_nom");
                $resultArray = array();
                // fetch product data one by one
                while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                    $resultArray[] = $item;
                }
                return $resultArray;
            }
        }
        public function insertComment(){
            $nom = $_POST['nom'];
            $prenom = $_POST['prenom'];
            $commentaire = mysqli_escape_string($this->db->conn, $_POST['commentaire']);
            $article_id = $_POST['article_id'];
            $result = $this->db->conn->query("INSERT INTO `commentaire`(`com_nom`, `com_prenom`, `com_comentaire`, `com_article`, `com_time`) VALUES ('$nom','$prenom','$commentaire',
                '$article_id',NOW())");
            if($result){
                $_SESSION['status'] = "Votre commentaire a été publié avec succès";
            }else{
                echo $this->db->conn->error;
            }
            return $result;
        }
        public function updatePassword(){
            $password = md5($_POST['password']);
            $email =  $_POST['email'];
            $result = $this->db->conn->query("UPDATE `etudiant` SET `etud_motdepasse`='$password' WHERE etud_email='$email'");
            $to = $_POST['email'];
            $subject = "Nouveau mot de passe";
            $headers = 'Content-type: text/html';
            $msg = "<img class='img-fluid' src='http://localhost/ecole/images/logo.jpeg' 
                    style='width:16rem; height:60px' alt='logo'>
                    <div style='text-align:center; align-items:center;'>
                        <h1>Changement de mot de passe</h1><br>
                        <p><b>Veuillez trouvez ci-dessous le nouveau mot de passe de votre compte.<b></p><br>
                        <ul>
                            <li>Mot de passe: ".$_POST['password']."</li>
                        </ul>
                        <p><b>Veuillez ne communiquer ce mot de passe à perseonne .<b></p><br>
                    </div>";
            mail($to, $subject, $msg, $headers);
            if($result){
                $_SESSION['status_arab'] = "تم تغيير كلمة المرور الخاصة بك بنجاح تم إرسال كلمة المرور الجديدة إلى مربع بريدك الإلكتروني";
                $_SESSION['status'] = "Votre mot de passe à été modifié avec succès Le nouveau mot de passe a été envoyé à votre boite email";
            }
            return $result;
        }
        public function getEtudiantPromotion(){
            $result = $this->db->conn->query("SELECT `etud_id`, `etud_nom`, `etud_prenom`, `pro_id`, `pro_groupe`, COUNT(etud_promos) AS 'total' FROM `promos` 
                    LEFT JOIN `etudiant` ON pro_id=etud_promos GROUP BY pro_groupe ORDER BY pro_groupe ASC");
            $resultArray = array();
            while($item = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                $resultArray [] = $item;
            }
            return $resultArray;
        }
        public function getPromotion(){
            $result = $this->db->conn->query("SELECT * FROM `promos`");
            $resultArray = array();
            while($item = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                $resultArray[] = $item; 
            }
            return $resultArray;
        }
        public function updatePromotion(){
            $id_for = $_GET['id'];
            $promotion = $_POST['promotion'];
            $id = $_POST['etudiant'];
            $result =$this->db->conn->query("UPDATE `etudiant` SET `etud_promos`='$promotion' WHERE etud_id='$id'");
            if($result){
                echo "<script>window.location.href='gestion-formation?id=$id_for'</script>";
                $_SESSION['status'] = "La promotion a été bien saisit";
            }else{
                echo $this->db->conn->error;
            }
            return $result;
        }
        public function deleteFormation($formation_id = null){
            $result= $this->db->conn->query("DELETE FROM `formation` WHERE for_id=$formation_id");
            if($result){
                $_SESSION['status'] = "La formation a été bien supprimée";
                echo "<script>window.location.href='formations'</script>";
            }
        }
        /*public function getEtudiantSearch(){
            $nom = $_POST['nom'];
            $result = $this->db->conn->query("SELECT * FROM `etudiant` INNER JOIN `formation` ON etud_formation=for_id 
                    WHERE etud_nom LIKE '%".$nom."%'");
            $resultArray = array();
            // fetch product data one by one
            while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                $resultArray[] = $item;
            }
            return $resultArray;
        }
        // pour Login etduiant
        public function insertEtudiant(){
            $nom = mysqli_escape_string($this->db->conn, $_POST['nom']);
            $prenom = mysqli_escape_string($this->db->conn, $_POST['prenom']);
            $email = mysqli_escape_string($this->db->conn, $_POST['email']);
            $motdepasse = md5($_POST['motdepasse']);
            $cin = $_POST['cin'];
            $telephone = $_POST['telephone'];
            $naissance = $_POST['naissance'];
            $formation = $_POST['formation'];
            $allowed = array('jpg', 'png', 'jpeg');
            $image = basename($_FILES['image']['name']);
            $path = "./images/etudiants/";
            $ext = pathinfo($image, PATHINFO_EXTENSION);

            if(!in_array($ext, $allowed) & $image != ""){
                echo  "<div class='alert alert-danger text-center mt-3 container' role='alert'>
                            Le fichier que vous avez choisit est de type ".$ext.
                            "<br>Nous supportant juste les fichiers type images 'jpg, png, jpeg'
                        </div>";
            }else{
                move_uploaded_file($_FILES['image']['tmp_name'], $path.$image);
                $result = $this->db->conn->query("INSERT INTO `etudiant`
                    (`etud_nom`, `etud_prenom`, `etud_email`, `etud_telephone`, `etud_motdepasse`, `etud_cin`, `etud_naissance`, 
                    `etud_formation`, `etud_image`, `etud_inscription`)
                    VALUES ('$nom','$prenom','$email','$telephone','$motdepasse','$cin','$naissance',
                    '$formation','$path$image', NOW())");
                    return $result;
            }
        }
        public function getMatiere(){
            $result = $this->db->conn->query("SELECT * FROM `matiere`");
            $resultArray = array();
            // fetch product data one by one
            while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                $resultArray[] = $item;
            }
            return $resultArray;
        }
        public function getTotalFormationMatieres(){
            $result = $this->db->conn->query("SELECT `for_nom`, `for_id`,`for_pres`, `for_descr`, `for_image`, COUNT(mat_prof) as 'prof_total', 
                    COUNT(mat_nom) as 'matiere_total', SUM(mat_duree) as 'duree_total' FROM `formation`
                    LEFT JOIN `matiere` ON formation.for_id=matiere.mat_formation GROUP BY for_nom");
            $resultArray = array();
            // fetch product data one by one
            while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                $resultArray[] = $item;
            }
            return $resultArray;
        }
        public function getEtudiantFormations(){
            $result = $this->db->conn->query("SELECT *, AVG(not_note) AS 'noteG' FROM `etudiant` INNER JOIN `matiere` ON not_matiere=mat_id
                    INNER JOIN `note` ON not_etudiant=etud_id INNER JOIN `formation` ON not_formation=for_id");
            $resultArray = array();
            // fetch product data one by one
            while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                $resultArray[] = $item;
            }
            return $resultArray;
        }
        public function deleteNotes($note_id = null){
            $result= $this->db->conn->query("DELETE FROM `note` WHERE not_id=$note_id");
            if($result){
                $_SESSION['status'] = "La note a été supprimés avec success";
            }
        }
        public function getEtudiantFormaAjax(){
            $result = $this->db->conn->query("SELECT * FROM `etudiant` INNER JOIN `formation` ON etud_formation=for_id");
            $resultArray = array();
            // fetch product data one by one
            while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                $resultArray[] = $item;
            }
            return $resultArray;
        }
        public  function insertIntoDiplome($params = null, $table = "diplome"){
            if ($this->db->conn != null){
                if ($params != null){
                    // "Insert into diplome(etudiant) values (0)"
                    // get table columns
                    $columns = implode(',', array_keys($params));
    
                    $values = implode(',' , array_values($params));
    
                    // create sql query
                    $query_string = sprintf("INSERT INTO %s(%s) VALUES(%s)", $table, $columns, $values);
    
                    // execute query
                    $result = $this->db->conn->query($query_string);
                    return $result;
                }
            }
        }
        public function getSeance(){
            $result = $this->db->conn->query("SELECT * FROM `seance`");
            $resultArray = array();
            // fetch product data one by one
            while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                $resultArray[] = $item;
            }
            return $resultArray;
        }
        public function deleteSalle($salle_id = null){
            $result= $this->db->conn->query("DELETE FROM `salle` WHERE sal_id=$salle_id");
            if($result){
                $_SESSION['status'] = "La salle a été supprimé avec success";
                echo "<script>window.location.href='salles'</script>";
            }
        }
        public function getReservationsId(){
            $result = $this->db->conn->query("SELECT * FROM `reservation`");
            $resultArray = array();
            // fetch product data one by one
            while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                $resultArray[] = $item;
            }
            return $resultArray;
        } 
         
        */
    }
    class Admin{
        public function loginAdmin(){
            $username = $_POST['username'];
            $password = $_POST['pwrd'];
            if($username == "aymane" && $password == "aymane"){
                $_SESSION['username'] = $username;
                $_SESSION['pwd'] = $password;
                echo "<script>window.location.href='dashboard'</script>";
                
            }else{
                $_SESSION['status'] = "Mot de passe ou nom d'utilsateur incorrecte";
                echo "<script>window.location.href='login-admin'</script>";
            }
        }
    }
?>