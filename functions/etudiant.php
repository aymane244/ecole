<?php
    class Etudiant{
        public $db = null;
        public function __construct(DBController $db){
            if(!isset($db->conn)) return null;
            $this->db = $db;
        }
        public function getImage(){
            $result = $this->db->conn->query("SELECT * FROM `img_salle` INNER JOIN `salle` ON sal_id=img_salle");
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
            $result = $this->db->conn->query("INSERT INTO `note`(`not_formation`, `not_matiere`, 
                `not_etudiant`, `not_note`) VALUES ('$formation','$matieres','$id','$note')");
            if($result){
                $_SESSION['status'] = "La note a été ajouté avec success";
                echo "<script>window.location.href='saisir-notes?id=$id_get'</script>";
            }
            return $result;
        }
        public function getEtudiantFormation(){
            $result = $this->db->conn->query("SELECT * FROM `formation` INNER JOIN `etudiant` ON for_id=etud_formation");
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
                $_SESSION['status'] = "Note a été modifier avec success";
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
                $_SESSION['status'] = "Matière a été modifier avec success";
                echo "<script>window.location.href='matières'</script>";
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
            $image = basename($_FILES['image']['name']);
            $path = "./images/etudiants/";
            if(move_uploaded_file($_FILES['image']['tmp_name'], $path.$image)){
                $result = $this->db->conn->query("UPDATE `formation` SET `for_nom`='$formation_nom',`for_nom_arab`='$formation_nom_arab',
                `for_pres`='$presentation',`for_pres_arab`='$presentation_arab',`for_descr`='$description',`for_desc_arab`='$description_arab',
                `for_image`='$path$image' WHERE for_id=$id");
            }else{
                $result = $this->db->conn->query("UPDATE `formation` SET `for_nom`='$formation_nom',`for_nom_arab`='$formation_nom_arab',
                `for_pres`='$presentation',`for_pres_arab`='$presentation_arab',`for_descr`='$description',`for_desc_arab`='$description_arab'
                WHERE for_id=$id");
            }
            if($result){
                $_SESSION['status'] = "Formation a été modifier avec success";
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
            $path = "./images/salles/";
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
                $_SESSION['status'] = "Salle a été modifier avec success";
                echo "<script>window.location.href='salles'</script>";
            }else{
                echo "not". $this->db->conn->error;
            }
            return $result;
        }
        public function updateEtudiant(){
            $id = $_GET['id'];
            $nom = $_POST['nom'];
            $prenom = $_POST['prenom'];
            $phone = $_POST['phone'];
            $naissance = $_POST['naissance'];
            $image = basename($_FILES['image']['name']);
            $path = "./images/etudiants/";
            $allowed = array('jpg', 'png', 'jpeg');
            $ext = pathinfo($image, PATHINFO_EXTENSION); 
            if(!in_array($ext, $allowed) & $image != ""){
                echo "<div class='alert alert-danger text-center mt-3 container' role='alert'>
                        Le fichier que vous avez choisit est de type ".$ext.
                        "<br>Nous supportant juste les fichiers type images 'jpg, png, jpeg'
                    </div>";
            }else{
                if(move_uploaded_file($_FILES['image']['tmp_name'], $path.$image)){
                    $result = $this->db->conn->query("UPDATE `etudiant` SET `etud_nom`='$nom',`etud_prenom`='$prenom',`etud_naissance`='$naissance',
                    `etud_telephone`='$phone',`etud_image`='$path$image' WHERE etud_id=$id");
                }else{
                    $result = $this->db->conn->query("UPDATE `etudiant` SET `etud_nom`='$nom',`etud_prenom`='$prenom',`etud_naissance`='$naissance',
                    `etud_telephone`='$phone' WHERE etud_id=$id");
                }
                if($result){
                    $_SESSION['status'] = "Votre profile a été modifié avec success";
                    echo "<script>window.location.href='espace-etudiant'</script>";
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
            $path = "./images/salles/";
            if(move_uploaded_file($_FILES['image1']['tmp_name'], $path.$image1)){
                $result = $this->db->conn->query("UPDATE `img_salle` SET `img_salle`='$salle_nom', `img1`='$path$image1' WHERE img_id=$id");
            }else if(move_uploaded_file($_FILES['image2']['tmp_name'], $path.$image2)){
                $result = $this->db->conn->query("UPDATE `img_salle` SET `img_salle`='$salle_nom',`img2`='$path$image2' WHERE img_id=$id");
            }else if(move_uploaded_file($_FILES['image3']['tmp_name'], $path.$image3)){
                $result = $this->db->conn->query("UPDATE `img_salle` SET `img_salle`='$salle_nom',`img3`='$path$image3' WHERE img_id=$id");
            }else if(move_uploaded_file($_FILES['image4']['tmp_name'], $path.$image4)){
                $result = $this->db->conn->query("UPDATE `img_salle` SET `img_salle`='$salle_nom',`img4`='$path$image4' WHERE img_id=$id");
            }
            if($result){
                $_SESSION['status'] = "Image a été modifier avec success";
                echo "<script>window.location.href='salles'</script>";
            }else{
                echo "not". $this->db->conn->error;
            }
            return $result;
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
            $path = "./images/etudiants/";
            if(move_uploaded_file($_FILES['image']['tmp_name'], $path.$image)){
                $result = $this->db->conn->query("UPDATE `article` SET `art_titre`='$titre',`art_titre_arab`='$titre_arab',`art_texte`='$texte',
                    `art_texte_arab`='$texte_arab',`art_image`='$path$image' WHERE art_id=$id");
            }else{
                $result = $this->db->conn->query("UPDATE `article` SET `art_titre`='$titre',`art_titre_arab`='$titre_arab',`art_texte`='$texte',
                    `art_texte_arab`='$texte_arab' WHERE art_id=$id");
            }
            if($result){
                $_SESSION['status'] = "Article a été modifier avec success";
                echo "<script>window.location.href='articles'</script>";
            }else{
                echo "not". $this->db->conn->error;
            }
            return $result;
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
        public function deleteMatieres($matiere_id = null){
            $result= $this->db->conn->query("DELETE FROM `matiere` WHERE mat_id=$matiere_id");
            if($result){
                $_SESSION['status'] = "La matière a été supprimée avec success";
                echo "<script>window.location.href='matières'</script>";
            }else{
                echo $this->db->conn->error;
            }
        }
        public function deleteCommentaires($comment_id = null){
            $id = $_GET['id'];
            $result= $this->db->conn->query("DELETE FROM `commentaire` WHERE com_id=$comment_id");
            if($result){
                $_SESSION['status'] = "Le Commentaire a été supprimé avec success";
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
                echo "<script>window.location.href='espace-etudiant'</script>";
            }
            $_SESSION['status'] = "CIN ou mot de passe incorrecte";
            return $result;
        }
        public function getEtudiantNotes(){
            $result = $this->db->conn->query("SELECT * FROM `etudiant` RIGHT JOIN `formation` ON etud_formation=for_id ");
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
            $promos = $_POST['promos'];
            $scan_cin = basename($_FILES['scan_cin']['name']);
            $scan_permis = basename($_FILES['scan_permis']['name']);
            $scan_visite = basename($_FILES['scan_visite']['name']);
            $image = basename($_FILES['image']['name']);
            
            //$ext = pathinfo($image, PATHINFO_EXTENSION);
            //$ext2 = pathinfo($scan_cin, PATHINFO_EXTENSION);
            $age = date_diff(date_create($naissance), date_create($date));
            $result = $this->db->conn->query("SELECT `etud_email` FROM `etudiant` WHERE etud_email = '$email'");
            $result2 = $this->db->conn->query("SELECT `etud_cin` FROM `etudiant` WHERE etud_cin = '$cin'");
            if(mysqli_num_rows($result)){
                $_SESSION['status'] = "Email exist déja";
            }
            else if(mysqli_num_rows($result2)){
                $_SESSION['status'] = "CIN exist déja";
            }else{
                if($formation == ""){
                    echo "<div class='alert alert-danger text-center mt-3 container' role='alert'>
                            Veuillez choisir une formation
                        </div>";
                }else if($categorie == ""){
                    echo "<div class='alert alert-danger text-center mt-3 container' role='alert'>
                            Veuillez choisir une catégorie de permis
                        </div>";
                }else if($date < $naissance){
                    echo "<div class='alert alert-danger text-center mt-3 container' role='alert'>
                            Veuillez saisir une date de naissance correcte
                        </div>";
                }else if((int)$age->format('%y') < 18){
                    echo "<div class='alert alert-danger text-center mt-3 container' role='alert'>
                            Votre age doit dépasser 18 ans veuillez vérifier la date de naissance
                        </div>";
                }else if($date < $obtenir){
                    echo "<div class='alert alert-danger text-center mt-3 container' role='alert'>
                            La date d'obtention ne dois pas dépasser la date d'aujourd'hui ".$date." 
                        </div>";
                }else{
                    mkdir("dossiers-stagiaires/".$prenom."-".$nom,0777,true);
                    $path = "./dossiers-stagiaires/$prenom-$nom/";
                    if($path){
                        move_uploaded_file($_FILES['image']['tmp_name'], $path."image-".$image);
                        move_uploaded_file($_FILES['scan_cin']['tmp_name'], $path."cin-".$scan_cin);
                        move_uploaded_file($_FILES['scan_permis']['tmp_name'], $path."permis-".$scan_permis);
                        move_uploaded_file($_FILES['scan_visite']['tmp_name'], $path."visite-".$scan_visite);   
                    }
                    $res = $this->db->conn->query("INSERT INTO `etudiant`(`etud_nom`, `etud_nom_arab`, `etud_prenom`, `etud_prenom_arabe`, 
                        `etud_email`, `etud_telephone`, `etud_motdepasse`, `etud_cin`, `etud_formation`, `etud_naissance`, 
                        `etud_lieu_naissance`, `etud_adress`, `etud_permis`, `etud_cat_permis`, `etude_carte_pro`, `etud_permis_obt`, 
                        `etud_scan_cin`, `etud_scan_permis`, `etud_scan_visite`, `etud_promos`, `etud_image`, `etud_inscription`) VALUES ('$nom','$nom_arab',
                        '$prenom','$prenom_arab','$email','$telephone','$motdepasse','$cin','$formation','$naissance','$lieu','$adresse',
                        '$permis','$categorie','$profesionnel','$obtenir','$path$scan_cin','$path$scan_permis','$path$scan_visite','$promos','$path$image',NOW())");
                    if($res){
                        $_SESSION['status_login'] = "Votre inscription a été bien effectué merci de visiter votre email<br><a href='login'>Connectez-vous ici</a>";
                    }
                    return $res;
                }
            }
        }
        public function getFormationMatiereEtudiant(){
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
            $result = $this->db->conn->query("SELECT *, COUNT(etud_nom) AS 'total_etudiant' FROM `formation` INNER JOIN `matiere` ON formation.for_id=matiere.mat_formation 
            INNER JOIN `etudiant` ON formation.for_id=etudiant.etud_formation GROUP BY mat_nom");
            $resultArray = array();
            // fetch product data one by one
            while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                $resultArray[] = $item;
            }
            return $resultArray;
        }
        public function insertAbsence(){
            $absence_formation = $_POST['absence_formation'];
            $absence_matiere = $_POST['absence_matiere'];
            $absence_date = $_POST['absence_date'];
            $absence_etudiant = $_POST['absence_etudiant'];
            $absence = $_POST['absence'];
            $number_etudiant = $_POST['number_etudiant'];
            for($i=0;$i<$number_etudiant; $i++){
                $result = $this->db->conn->query("INSERT INTO `absence`(`abs_etudiant`, `abs_date`, `abs_formation`, `abs_matiere`, `abs_absence`) 
                VALUES ('$absence_etudiant[$i]','$absence_date','$absence_formation','$absence_matiere','$absence[$i]')");
                if($result){
                    $_SESSION['status'] = "Les données sont bien enregistrées";
                    //echo "<script>window.location.href='absence'</script>";
                }else{
                    echo $this->db->conn->error;
                }
            }
            return $result;
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
                    $_SESSION['status'] = "Votre demande de diplome a été envoyé avec succes";
                    echo "<script>window.location.href='espace-etudiant'</script>";
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
                    $_SESSION['status'] = "Votre demande de d'attestation a été envoyé avec succes";
                    echo "<script>window.location.href='espace-etudiant'</script>";
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
                $_SESSION['status'] = "Votre demande de catégorisation douane a été envoyée avec success";
                echo "<script>window.location.href='douane'</script>";
            }
            return $result;
        }
        public function deleteDiplome($diplome_id = null){
            $result= $this->db->conn->query("DELETE FROM `diplome` WHERE dip_id=$diplome_id");
            if($result){
                $_SESSION['status'] = "La demande a été supprimé avec success";
                echo "<script>window.location.href='demandes-etudiant'</script>";
            }
        }
        public function deleteAttestation($attestation_id = null){
            $result= $this->db->conn->query("DELETE FROM `attestation` WHERE att_id=$attestation_id");
            if($result){
                $_SESSION['status'] = "La demande a été supprimé avec success";
                echo "<script>window.location.href='demandes-etudiant'</script>";
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
                $_SESSION['status'] = "Diplome envoyé avec success";
                echo "<script>window.location.href='demandes-etudiant'</script>";
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
                $_SESSION['status'] = "Attestation envoyé avec success";
                echo "<script>window.location.href='demandes-etudiant'</script>";
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
                ON sal_id=res_salle WHERE res_date='$date'");
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
                $_SESSION['status'] = "La réservation a été supprimé avec success";
                echo "<script>window.location.href='dashboard'</script>";
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
                $_SESSION['status'] = "Le message a été supprimé avec success";
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
                $_SESSION['status'] = "Votre demande d'accompagnement ISO a été envoyée avec success";
                echo "<script>window.location.href='conseil'</script>";
            }
            return $result;
        }
        public function deleteArticle($id = null){
            $result= $this->db->conn->query("DELETE FROM `article` WHERE art_id=$id");
            if($result){
                $_SESSION['status'] = "Le message a été supprimé avec success";
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
            $path = "./images/salles/";
            if(move_uploaded_file($_FILES['salle_image']['tmp_name'], $path.$image)){
                $result = $this->db->conn->query("INSERT INTO `salle`(`sal_nom`, `sal_nom_arab`, `sal_desc`, `sal_desc_arab`, `sal_prix`, 
                `sal_personne`, `sal_image`, `sal_service`, `sal_service2`, `sal_service3`, `sal_service4`, `sal_service_arab`, 
                `sal_service2_arab`, `sal_service3_arab`, `sal_service4_arab`) VALUES ('$nom_salle','$nom_salle_arab','$salle_desc','$salle_desc_arab',
                '$salle_prix','$salle_personne','$path$image','$salle_service1','$salle_service2','$salle_service3','$salle_service4',
                '$salle_service1_arab','$salle_service2_arab','$salle_service3_arab','$salle_service4_arab')");
                if($result){
                    $_SESSION['status'] = "Salle a été ajouté avec success";
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
                    $_SESSION['status'] = "Matière a été ajouté avec success";
                    echo "<script>window.location.href='matières'</script>";
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
            $image = $_FILES['image']['name'];
            $path="./images/formation/";
            if(move_uploaded_file($_FILES['image']['tmp_name'], $path.$image)){
                $result = $this->db->conn->query("INSERT INTO `formation`(`for_nom`, `for_nom_arab`, `for_pres`, `for_pres_arab`, `for_descr`, 
                    `for_desc_arab`, `for_image`) VALUES ('$nom_formation','$nom_formation_arabe','$presentation','$presentation_arabe',
                    '$description','$description_arabe','$path$image')");
                if($result){
                    $_SESSION['status'] = "La formation a été ajouté avec success";
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
            $path = "./images/articles/";
            if(move_uploaded_file($_FILES['image']['tmp_name'], $path.$image)){
                $result = $this->db->conn->query("INSERT INTO `article`(`art_titre`, `art_titre_arab`, `art_texte`, `art_texte_arab`, 
                `art_image`, `art_ajout`) VALUES ('$titre','$titre_arab','$texte','$texte_arab','$path$image',NOW())");
                if($result){
                    $_SESSION['status'] = "Article a été ajouté avec success";
                    echo "<script>window.location.href='articles'</script>";
                }else{
                    echo "not good ".$this->db->conn->error;
                }
                return $result;
            }
        } 
        public function insertImages(){
            $nom_salle = $_POST['salle_id'];
            $image1 = basename($_FILES['image1']['name']);
            $image2 = basename($_FILES['image2']['name']);
            $image3 = basename($_FILES['image3']['name']);         
            $image4 = basename($_FILES['image4']['name']);
            $path = "./images/salles/";
            move_uploaded_file($_FILES['image1']['tmp_name'], $path.$image1);
            move_uploaded_file($_FILES['image2']['tmp_name'], $path.$image2);
            move_uploaded_file($_FILES['image3']['tmp_name'], $path.$image3);
            move_uploaded_file($_FILES['image4']['tmp_name'], $path.$image4);
                $result = $this->db->conn->query("INSERT INTO `img_salle`(`img_salle`, `img1`, `img2`, `img3`, `img4`) VALUES 
                    ('$nom_salle','$path$image1','$path$image2','$path$image3','$path$image4')"); 
            if($result){
                $_SESSION['status'] = "Images a été modifier avec success";
                echo "<script>window.location.href='salles'</script>";
            }else{
                echo "not". $this->db->conn->error;
            }
            return $result;
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
            $result = $this->db->conn->query("SELECT * FROM `reservation` WHERE res_salle=$salle_id AND res_date='$date_salle'");
            $result2 = $this->db->conn->query("SELECT * FROM `reservation` WHERE res_salle=$salle_id AND time_debut>='$time_debut' AND time_debut <'$time_fin'");
            if($date_salle === ""){
                echo '<div class="alert alert-danger text-center mt-2" role="alert">
                        Réservation échouée svp vérifier les données entrées
                    </div>';
            }else if($date_salle < $date){
                echo '<div class="alert alert-danger text-center mt-2" role="alert">
                        Réservation échouée svp vérifier les données entrées
                    </div>';
            }else if(mysqli_num_rows($result) && mysqli_num_rows($result2)){
                echo "<div class='alert alert-danger text-center mt-2' role='alert'>
                        Heure réservée, Merci de prendre une nouvelle heure
                    </div>";
            }else if($time_fin < $time_debut){
                echo "<div class='alert alert-danger text-center mt-2' role='alert'>
                        L'heure de fin doit toujours être supérieur à la date de début
                    </div>";
            }else{
                $result3 = $this->db->conn->query("INSERT INTO `reservation`(`res_nom`, `res_telephone`, `res_email`, `res_salle`, 
                `res_commentaire`, `res_date`, `time_debut`, `time_fin`) 
                VALUES ('$reservation_nom','$reservation_telephone','$email_reservation','$salle_id','$commentaire_reservation'
                ,'$date_salle','$time_debut','$time_fin')");
                echo '<div class="alert alert-success text-center mt-2" role="alert" id="btn-fermer">Votre réservation a été envoyé avec succes <i class="fas fa-times font-close2" onclick="fermer()"></i></div>';   
                return $result3;
            }
        }
        public function getEtudiantNotesSearch(){
            if(isset($_POST['nom'])){
                $nom = $_POST['nom'];
                $result = $this->db->conn->query("SELECT *, AVG(not_note) AS 'notegenerale' FROM `etudiant` LEFT JOIN `note` ON not_etudiant=etud_id 
                    INNER JOIN `formation` ON etud_formation=for_id GROUP BY not_etudiant HAVING etud_nom LIKE '%".$nom."%' OR etud_prenom LIKE '%".$nom."%'");
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
                $_SESSION['status'] = "Votre commentaire a été poster avec success";
            }else{
                echo $this->db->conn->error;
            }
            return $result;
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
            if($username == "aymane" && $password == "aymane" || 
            $username == "chaimae" && $password == "chaimae" ||
            $username == "yasmina" && $password == "yasmina"){
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