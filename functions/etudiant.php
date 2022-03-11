<?php
    class Etudiant{
        public $db = null;
        public function __construct(DBController $db){
            if(!isset($db->conn)) return null;
            $this->db = $db;
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
        public function getEtudiantSearch(){
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
        public function getEtudiantCinPwd(){
            $cin = $_POST['cin'];
            $pwd = md5($_POST['password']);
            $result = $this->db->conn->query("SELECT * FROM `etudiant` WHERE etud_cin = '$cin' AND etud_motdepasse ='$pwd'");
            while($etudiant = mysqli_fetch_assoc($result)){
                $_SESSION['etud_cin'] = $etudiant['etud_cin'];
                $_SESSION['etud_motdepasse'] = $etudiant['etud_motdepasse'];
                $_SESSION['id'] = $etudiant['etud_id'];
                $_SESSION['nom'] = $etudiant['etud_nom'];
                echo "<script>window.location.href='espace_etudiant'</script>";
            }
            $_SESSION['status'] = "CIN ou mot de passe incorrecte";
            return $result;
        }
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
        public function checkEmailCin(){
            $nom = $_POST['nom'];
            $prenom = $_POST['prenom'];
            $email = $_POST['email'];
            $motdepasse = md5($_POST['motdepasse']);
            $cin = $_POST['cin'];
            $telephone = $_POST['telephone'];
            $naissance = $_POST['naissance'];
            $formation = $_POST['formation'];
            $diplome = basename($_FILES['diplome']['name']);
            $allowed = array('jpg', 'png', 'jpeg');
            $allowed2 = array('pdf');
            $image = basename($_FILES['image']['name']);
            $path = "./images/etudiants/";
            $path2 = "./diplomes/";
            $ext = pathinfo($image, PATHINFO_EXTENSION);
            $ext2 = pathinfo($diplome, PATHINFO_EXTENSION);
            $result = $this->db->conn->query("SELECT `etud_email` FROM `etudiant` WHERE etud_email = '$email'");
            $result2 = $this->db->conn->query("SELECT `etud_cin` FROM `etudiant` WHERE etud_cin = '$cin'");
            if(mysqli_num_rows($result)){
                $_SESSION['status'] = "Email exist déja";
            }
            else if(mysqli_num_rows($result2)){
                $_SESSION['status'] = "CIN exist déja";
            }else{
                if(!in_array($ext, $allowed) & $image != ""){
                    echo  "<div class='alert alert-danger text-center mt-3 container' role='alert'>
                            Le fichier que vous avez choisit est de type ".$ext.
                            "<br>Nous supportant juste les fichiers type images 'jpg, png, jpeg'
                            </div>";
                }else if($diplome == ""){
                    echo  "<div class='alert alert-danger text-center mt-3 container' role='alert'>
                        Veuillez charger votre diplôme
                        </div>";
                }else if(!in_array($ext2, $allowed2)){
                    echo  "<div class='alert alert-danger text-center mt-3 container' role='alert'>
                        Le fichier que vous avez choisit est de type ".$ext2.
                        "<br>Nous supportant le fichiers de type pdf
                        </div>";
                }else{
                    move_uploaded_file($_FILES['image']['tmp_name'], $path.$image);
                    move_uploaded_file($_FILES['diplome']['tmp_name'], $diplome);
                    $res = $this->db->conn->query("INSERT INTO `etudiant`
                        (`etud_nom`, `etud_prenom`, `etud_email`, `etud_motdepasse`, `etud_cin`, `etud_telephone`, `etud_naissance`, 
                        `etud_formation`, `etud_diplome`, `etud_image`, `etud_inscription`)
                        VALUES ('$nom','$prenom','$email','$motdepasse','$cin',$telephone,'$naissance',
                        '$formation','$path2$diplome','$path$image',NOW())");
                    if($res){
                        $_SESSION['status_login'] = "Votre inscription a été bien effectué merci de visiter votre email<br><a href='login'>Connectez-vous ici</a>";
                    }
                    return $res;
                }
            }
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
        public function getEtudiantFormation(){
            $result = $this->db->conn->query("SELECT `for_nom`, `for_id`, `etud_id`, `etud_email`, `etud_telephone`, `etud_nom`, `etud_prenom`, `etud_image`, 
                        `etud_cin`, `etud_naissance`, `etud_diplome` FROM `formation` INNER JOIN `etudiant` ON for_id=etud_formation");
            $resultArray = array();
            // fetch product data one by one
            while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                $resultArray[] = $item;
            }
            return $resultArray;
        }
        public function getEtudiantparFormation(){
            $result = $this->db->conn->query("SELECT `for_nom`, COUNT(etud_nom) AS 'nombre_total'
                        FROM `etudiant` INNER JOIN `formation` ON for_id=etud_formation GROUP BY for_nom");
            $resultArray = array();
            // fetch product data one by one
            while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                $resultArray[] = $item;
            }
            return $resultArray;
        }
        public function getEtudiantTotal(){
            $result = $this->db->conn->query("SELECT COUNT(etud_nom) AS 'nombre_total'
                        FROM `etudiant`");
            $resultArray = array();
            // fetch product data one by one
            while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                $resultArray[] = $item;
            }
            return $resultArray;
        }
        public function getFormationTotal(){
            $result = $this->db->conn->query("SELECT COUNT(for_nom) AS 'nombre_total'
                        FROM `formation`");
            $resultArray = array();
            // fetch product data one by one
            while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                $resultArray[] = $item;
            }
            return $resultArray;
        }
        public function getProfTotal(){
            $result = $this->db->conn->query("SELECT COUNT(mat_prof) AS 'nombre_total'
                        FROM `matiere`");
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
        public function getFormationMatiere(){
            $result = $this->db->conn->query("SELECT `mat_id`, `for_nom`, `mat_formation`, `mat_nom`, 
                    `mat_prof`, `mat_duree` FROM `formation` INNER JOIN 
                    `matiere` ON formation.for_id=matiere.mat_formation ORDER BY for_nom");
            $resultArray = array();
            // fetch product data one by one
            while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                $resultArray[] = $item;
            }
            return $resultArray;
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
        public function updateMatiere(){
            $id = $_GET['id'];
            $formation_nom = $_POST['formation_nom'];
            $matiere_nom = $_POST['matiere_nom'];
            $prof_nom = $_POST['prof_nom'];
            $duree = $_POST['duree'];
            $result = $this->db->conn->query("UPDATE `matiere` SET `mat_formation`='$formation_nom',
                    `mat_nom`='$matiere_nom',`mat_duree`='$duree',`mat_prof`='$prof_nom' 
                    WHERE mat_id=$id");
            if($result){
                $_SESSION['status'] = "Matière a été modifier avec success";
                echo "<script>window.location.href='matieres'</script>";
            }else{
                echo $this->db->conn->error;
            }
            return $result;
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
        public function updateFormation(){
            $id = $_GET['id'];
            $formation_nom = mysqli_escape_string($this->db->conn, $_POST['formation_nom']) ;
            $presentation = mysqli_escape_string($this->db->conn, $_POST['presentation']);
            $description = mysqli_escape_string($this->db->conn, $_POST['description']);
            $image = basename($_FILES['image']['name']);
            $path = "./images/etudiants/";
            if(move_uploaded_file($_FILES['image']['tmp_name'], $path.$image)){
                $result = $this->db->conn->query("UPDATE `formation` SET `for_nom`='$formation_nom',
                `for_pres`='$presentation',`for_descr`='$description',`for_image`='$path$image' WHERE for_id=$id");
            }else{
                $result = $this->db->conn->query("UPDATE `formation` SET `for_nom`='$formation_nom',
                `for_pres`='$presentation',`for_descr`='$description' WHERE for_id=$id");
            }
            if($result){
                $_SESSION['status'] = "Formation a été modifier avec success";
                echo "<script>window.location.href='formations'</script>";
            }else{
                echo "not". $this->db->conn->error;
            }
            return $result;
        }
        public function insertArticle(){
            $titre = mysqli_escape_string($this->db->conn, $_POST['titre']);
            $texte = mysqli_escape_string($this->db->conn, $_POST['texte']);
            $image = basename($_FILES['image']['name']);
            $path = "./images/articles/";
            
            if(move_uploaded_file($_FILES['image']['tmp_name'], $path.$image)){
                $result = $this->db->conn->query("INSERT INTO `article`(`art_titre`, `art_texte`, `art_image`, `art_ajout`) 
                        VALUES ('$titre','$texte','$path$image',NOW())");
                if($result){
                    $_SESSION['status'] = "Article a été ajouté avec success";
                    echo "<script>window.location.href='articles'</script>";
                }else{
                    echo "not good ".$this->db->conn->error;
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
        public function insertContact(){
            $nom = $_POST['nom'];
            $email = $_POST['email'];
            $message = mysqli_escape_string($this->db->conn, $_POST['message']);
            $sujet = mysqli_escape_string($this->db->conn, $_POST['sujet']);
            $result = $this->db->conn->query("INSERT INTO `contact`(`con_nom`, `con_email`, `con_sujet`, `con_message`, `con_envoie`)
                    VALUES ('$nom','$email','$sujet','$message',NOW())");
            return $result;
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
                echo  "<div class='alert alert-danger text-center mt-3 container' role='alert'>
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
                    echo "<script>window.location.href='espace_etudiant'</script>";
                }else{
                    echo "not good ".$this->db->conn->error;
                }
                return $result;
            }
        }
        public function insertFormation(){
            //$nom_formation = $_POST['input_name']; => pour ajouter les elements a la base de données
            $nom_formation = $_POST['titre'];
            $presentation = mysqli_escape_string($this->db->conn, $_POST['presentation']);
            $description = mysqli_escape_string($this->db->conn, $_POST['description']);
            $image = $_FILES['image']['name'];
            $path="./images/formation/";
            if(move_uploaded_file($_FILES['image']['tmp_name'], $path.$image)){
                $result = $this->db->conn->query("INSERT INTO `formation`(`for_nom`, `for_pres`, `for_descr`, `for_image`) 
                VALUES ('$nom_formation','$presentation','$description','$path$image')");
                if($result){
                    $_SESSION['status'] = "La formation a été ajouté avec success";
                    echo "<script>window.location.href='formations'</script>";
                }else{
                    echo $this->db->conn->error ;
                } 
                return $result;
            }
        }
        public function insertMatiere(){
            $formation = $_POST['formation'];
            $matiere = $_POST['matiere'];
            $prof = $_POST['prof'];
            $duree = $_POST['duree'];
            $numbers = $_POST['nums'];
            for($i=0;$i<$numbers; $i++){
                $result = $this->db->conn->query("INSERT INTO `matiere`(`mat_formation`, `mat_nom`, `mat_duree`, `mat_prof`) 
                VALUES ('$formation','$matiere[$i]','$duree[$i]','$prof[$i]')");
                if($result){
                    $_SESSION['status'] = "Matière a été ajouté avec success";
                    echo "<script>window.location.href='matieres'</script>";
                }else{
                    echo $this->db->conn->error;
                }
            }
            return $result;
        }
        public function deleteMatieres($matiere_id = null){
            $result= $this->db->conn->query("DELETE FROM `matiere` WHERE mat_id=$matiere_id");
            if($result){
                $_SESSION['status'] = "La matière a été supprimés avec success";
                echo "<script>window.location.href='matieres'</script>";
            }else{
                echo $this->db->conn->error;
            }
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
        public function sasirNotes(){
            $id = $_POST['etudiants'];
            @$formation = $_POST['nameformation'];
            @$matieres = $_POST['matieres'];
            @$note = $_POST['note'];
            $result = $this->db->conn->query("INSERT INTO `note`(`not_formation`, `not_matiere`, `not_etudiant`, `not_note`) 
                    VALUES ('$formation','$matieres','$id','$note')");
            if($result){
                $_SESSION['status'] = "La note a été saisit avec success";
            }else{
                echo $this->db->conn->error;
            }
                return $result;
        }
        public function deleteNotes($note_id = null){
            $result= $this->db->conn->query("DELETE FROM `note` WHERE not_id=$note_id");
            if($result){
                $_SESSION['status'] = "La note a été supprimés avec success";
            }
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
        public function getEtudiantNotes(){
            $result = $this->db->conn->query("SELECT *, AVG(not_note) AS 'notegenerale' FROM `etudiant` LEFT JOIN `formation` ON etud_formation=for_id 
                        LEFT JOIN `note` ON not_etudiant=etud_id GROUP BY not_etudiant");
            $resultArray = array();
            // fetch product data one by one
            while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                $resultArray[] = $item;
            }
            return $resultArray;
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
        public function getEtudiantFormaAjax(){
            $result = $this->db->conn->query("SELECT * FROM `etudiant` INNER JOIN `formation` ON etud_formation=for_id");
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
                echo "<script>window.location.href='etudiant'</script>";
                $_SESSION['status'] = "Note a été modifier avec success";
            }else{
                echo $this->db->conn->error;
            }
            return $result;
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
        public function getArticleTitre(){
            @$id = $_GET['id'];
            $result = $this->db->conn->query("SELECT *, COUNT(com_comentaire) AS 'commentaires' FROM `article` INNER JOIN `commentaire` ON com_article=art_id WHERE art_id=$id");
            $resultArray = array();
            // fetch product data one by one
            while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                $resultArray[] = $item;
            }
            return $resultArray;
        }
        public function getArticleComments(){
            $result = $this->db->conn->query("SELECT *, COUNT(com_comentaire) AS 'commentaires' FROM `article` INNER JOIN `commentaire` ON com_article=art_id GROUP BY art_titre ORDER BY art_ajout DESC");
            $resultArray = array();
            // fetch product data one by one
            while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                $resultArray[] = $item;
            }
            return $resultArray;
        }
        public function getArticleLimit(){
            $result = $this->db->conn->query("SELECT * FROM `article` LIMIT 5");
            $resultArray = array();
            // fetch product data one by one
            while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                $resultArray[] = $item;
            }
            return $resultArray;
        }
        public function insertComment(){
            $nom = $_POST['nom'];
            $prenom = $_POST['prenom'];
            $commentaire = mysqli_escape_string($this->db->conn, $_POST['commentaire']);
            $article_id = $_POST['article_id'];
            $result = $this->db->conn->query("INSERT INTO `commentaire`(`com_nom`, `com_prenom`, `com_comentaire`, `com_article`, `com_time`) VALUES ('$nom','$prenom','$commentaire',
                    '$article_id',NOW())");
            if($result){
                //echo "<script>window.location.href='article-lecture'</script>";
                echo $this->db->conn->error;
                $_SESSION['status'] = "Votre commentaire a été poster avec success";
            }else{
                echo $this->db->conn->error;
            }
            return $result;
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
        public function getComments(){
            @$id = $_GET['id'];
            $result = $this->db->conn->query("SELECT * FROM `commentaire` WHERE com_article =$id");
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
        public function updateArticle(){
            $id = $_GET['id'];
            $titre = $_POST['art_titre'];
            $texte = $_POST['art_texte'];           
            $image = basename($_FILES['image']['name']);
            $path = "./images/etudiants/";
            if(move_uploaded_file($_FILES['image']['tmp_name'], $path.$image)){
                $result = $this->db->conn->query("UPDATE `article` SET `art_titre`='$titre',
                `art_texte`='$texte',`art_image`='$path$image' WHERE art_id=$id");
            }else{
                $result = $this->db->conn->query("UPDATE `article` SET `art_titre`='$titre',
                `art_texte`='$texte' WHERE art_id=$id");
            }
            if($result){
                $_SESSION['status'] = "Article a été modifier avec success";
                echo "<script>window.location.href='articles'</script>";
            }else{
                echo "not". $this->db->conn->error;
            }
            return $result;
        }
        public function deleteArticle($id = null){
            $result= $this->db->conn->query("DELETE FROM `article` WHERE art_id=$id");
            echo $result;
            if($result){
                $_SESSION['status'] = "Le message a été supprimé avec success";
                echo "<script>window.location.href='articles'</script>";
                
            }else{
                echo $this->db->conn->error ; 
            }
        }
        public function getDiplometId($diplomeArray = null, $key = "dip_etudiant"){
            if ($diplomeArray != null){
                $diplome_id = array_map(function ($value) use($key){
                    return $value[$key];
                }, $diplomeArray);
                return $diplome_id;
            }
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
        public function getDataDiplome(){
            $result = $this->db->conn->query("SELECT * FROM `diplome` INNER JOIN `etudiant` ON etud_id=dip_etudiant");
    
            $resultArray = array();
    
            // fetch product data one by one
            while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                $resultArray[] = $item;
            }
            return $resultArray;
        }
        public function addDiplome($etudiant){
            if (isset($etudiant)){
                $params = array(
                    "dip_etudiant" => $etudiant
                );
    
                $result = $this->insertIntoDiplome($params);
                if ($result){
                    $_SESSION['status'] = "Votre demande de diplome a été envoyé avec succes";
                    echo "<script>window.location.href='espace_etudiant'</script>";
                }else{
                    echo $this->db->conn->error;
                }
            }
        }
        public function getAttestationtId($diplomeArray = null, $key = "att_etudiant"){
            if ($diplomeArray != null){
                $diplome_id = array_map(function ($value) use($key){
                    return $value[$key];
                }, $diplomeArray);
                return $diplome_id;
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
        public function getDataAttestation(){
            $result = $this->db->conn->query("SELECT * FROM `attestation` INNER JOIN `etudiant` ON att_etudiant=etud_id");
    
            $resultArray = array();
    
            // fetch product data one by one
            while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                $resultArray[] = $item;
            }
            return $resultArray;
        }
        public function addAttestation($etudiant){
            if (isset($etudiant)){
                $params = array(
                    "att_etudiant" => $etudiant
                );
    
                $result = $this->insertIntoAttestation($params);
                if ($result){
                    $_SESSION['status'] = "Votre demande de d'attestation a été envoyé avec succes";
                    echo "<script>window.location.href='espace_etudiant'</script>";
                }else{
                    echo $this->db->conn->error;
                }
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
        public function updateDiplome(){
            $id = $_POST['dip_etud'];         
            $image = basename($_FILES['dip_image']['name']);
            $path = "./demande/diplomes/";
            if(move_uploaded_file($_FILES['dip_image']['tmp_name'], $path.$image)){
                $result = $this->db->conn->query("UPDATE `diplome` SET `dip_image`='$path$image' WHERE dip_etudiant=$id");
            }
            if($result){
                $_SESSION['status'] = "Diplome envoyé avec success";
                echo "<script>window.location.href='demandes-etduiant'</script>";
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
                echo "<script>window.location.href='demandes-etduiant'</script>";
            }else{
                echo "not". $this->db->conn->error;
            }
            return $result;
        }
        public function insertSalle(){
            $nom_salle = $_POST['nom_salle'];
            $salle_prix = $_POST['salle_prix'];
            $salle_personne = $_POST['salle_personne'];
            $salle_service1 = $_POST['salle_service1'];
            $salle_service2 = $_POST['salle_service2'];
            $salle_service3 = $_POST['salle_service3'];
            $salle_service4 = $_POST['salle_service4'];
            $salle_service5 = $_POST['salle_service5'];
            $salle_service6 = $_POST['salle_service6'];
            $salle_service7 = $_POST['salle_service7'];
            $salle_service8 = $_POST['salle_service8'];
            $salle_desc = mysqli_escape_string($this->db->conn, $_POST['salle_desc']);
            $image = basename($_FILES['salle_image']['name']);
            $path = "./images/salles/";
            if(move_uploaded_file($_FILES['salle_image']['tmp_name'], $path.$image)){
                $result = $this->db->conn->query("INSERT INTO `salle`(`sal_nom`, `sal_desc`, `sal_prix`, `sal_personne`, `sal_image`, `sal_service`, `sal_service2`, 
                `sal_service3`, `sal_service4`, `sal_service5`, `sal_service6`, `sal_service7`, `sal_service8`) VALUES ('$nom_salle','$salle_desc','$salle_prix','$salle_personne',
                '$path$image','$salle_service1','$salle_service2','$salle_service3','$salle_service4','$salle_service5','$salle_service6',
                '$salle_service7','$salle_service8')");
                if($result){
                    $_SESSION['status'] = "Salle a été ajouté avec success";
                    echo "<script>window.location.href='salles'</script>";
                }else{
                    echo "not good ".$this->db->conn->error;
                }
                return $result;
            }
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
        public function updateSalle(){
            $id = $_GET['id'];
            $salle_prix = $_POST['salle_prix'];
            $salle_personne = $_POST['salle_personne'];
            $salle_service1 = $_POST['salle_service1'];
            $salle_service2 = $_POST['salle_service2'];
            $salle_service3 = $_POST['salle_service3'];
            $salle_service4 = $_POST['salle_service4'];
            $salle_service5 = $_POST['salle_service5'];
            $salle_service6 = $_POST['salle_service6'];
            $salle_service7 = $_POST['salle_service7'];
            $salle_service8 = $_POST['salle_service8'];
            $nom_salle = $_POST['nom_salle'];
            $salle_desc = mysqli_escape_string($this->db->conn, $_POST['salle_descr']);          
            $image = basename($_FILES['salle_image']['name']);
            $path = "./images/salles/";
            if(move_uploaded_file($_FILES['salle_image']['tmp_name'], $path.$image)){
                $result = $this->db->conn->query("UPDATE `salle` SET `sal_nom`='$nom_salle',
                `sal_desc`='$salle_desc',`sal_prix`='$salle_prix',`sal_personne`='$salle_personne',`sal_image`='$path$image',`sal_service`='$salle_service1',`sal_service2`='$salle_service2',`sal_service3`='$salle_service3', `sal_service4`='$salle_service4',
                `sal_service5`='$salle_service5',`sal_service6`='$salle_service6',`sal_service7`='$salle_service7', `sal_service8`='$salle_service8' WHERE sal_id=$id");
            }else{
                $result = $this->db->conn->query("UPDATE `salle` SET `sal_nom`='$nom_salle',
                `sal_desc`='$salle_desc',`sal_prix`='$salle_prix',`sal_personne`='$salle_personne',`sal_service`='$salle_service1',`sal_service2`='$salle_service2',`sal_service3`='$salle_service3', `sal_service4`='$salle_service4',
                `sal_service5`='$salle_service5',`sal_service6`='$salle_service6',`sal_service7`='$salle_service7', `sal_service8`='$salle_service8' WHERE sal_id=$id");
            }
            if($result){
                $_SESSION['status'] = "Salle a été modifier avec success";
                echo "<script>window.location.href='salles'</script>";
            }else{
                echo "not". $this->db->conn->error;
            }
            return $result;
        }
        public function deleteSalle($salle_id = null){
            $result= $this->db->conn->query("DELETE FROM `salle` WHERE sal_id=$salle_id");
            if($result){
                $_SESSION['status'] = "La salle a été supprimé avec success";
                echo "<script>window.location.href='salles'</script>";
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
        public function getImage(){
            $result = $this->db->conn->query("SELECT * FROM `img_salle` INNER JOIN `salle` ON sal_id=img_salle");
            $resultArray = array();
            // fetch product data one by one
            while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                $resultArray[] = $item;
            }
            return $resultArray;
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
        public function insertReservation(){
            $reservation_nom = $_POST['reservation_nom'];
            $email_reservation = $_POST['email_reservation'];
            $reservation_telephone = $_POST['reservation_telephone'];
            $salle_id = $_POST['salle_id'];
            $commentaire_reservation = mysqli_escape_string($this->db->conn, $_POST['commentaire_reservation']);
            $result = $this->db->conn->query("INSERT INTO `reservation`(`res_nom`, `res_telephone`, `res_email`, `res_salle`, `res_commentaire`) 
            VALUES ('$reservation_nom','$reservation_telephone','$email_reservation','$salle_id','$commentaire_reservation')");
            return $result;
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
        public function deleteReservations($reservation_id = null){
            $result= $this->db->conn->query("DELETE FROM `reservation` WHERE res_id=$reservation_id");
            if($result){
                $_SESSION['status'] = "La réservation a été supprimé avec success";
                echo "<script>window.location.href='dashboard'</script>";
            }
        }
        public function deleteDiplome($diplome_id = null){
            $result= $this->db->conn->query("DELETE FROM `diplome` WHERE dip_id=$diplome_id");
            if($result){
                $_SESSION['status'] = "La demande a été supprimé avec success";
                echo "<script>window.location.href='demandes-etduiant'</script>";
            }
        }
        public function deleteAttestation($attestation_id = null){
            $result= $this->db->conn->query("DELETE FROM `attestation` WHERE att_id=$attestation_id");
            if($result){
                $_SESSION['status'] = "La demande a été supprimé avec success";
                echo "<script>window.location.href='demandes-etduiant'</script>";
            }
        }
        public function insertiso(){
            $iso_nom = $_POST['iso_nom'];
            $iso_email = $_POST['iso_email'];
            $iso_message = mysqli_escape_string($this->db->conn, $_POST['iso_message']);
            $iso_categorie= $_POST['iso_categorie'];
            $result = $this->db->conn->query("INSERT INTO `iso`(`iso_nom`, `iso_res_nom`, `iso_res_email`, `iso_res_message`) 
                    VALUES ('$iso_categorie','$iso_nom','$iso_email','$iso_message')");
            if($result){
                $_SESSION['status'] = "Votre demande d'accompagnement ISO a été envoyée avec success";
            }else{
                echo'not god';
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
        public function insertdouane(){
            $douane_nom = $_POST['douane_nom'];
            $douane_email = $_POST['douane_email'];
            $douane_message = mysqli_escape_string($this->db->conn, $_POST['douane_message']);
            $douane_categorie= $_POST['douane_categorie'];
            $result = $this->db->conn->query("INSERT INTO `douane`(`dou_nom`, `dou_res_nom`, `dou_res_email`, `dou_res_message`) 
                    VALUES ('$douane_categorie','$douane_nom','$douane_email','$douane_message')");
            if($result){
                $_SESSION['status'] = "Votre demande de catégorisation douane a été envoyée avec success";
            }else{
                echo'not god';
            }
            return $result;
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
                echo "<script>window.location.href='login_admin'</script>";
            }
        }
    }
?>