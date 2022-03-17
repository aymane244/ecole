<?php
    session_start();
    header('Content-Type: text/html; charset=utf-8');
    require("functions/db.php");
    require("functions/etudiant.php");
    include_once "style.php";
    include_once "scripts.php";
    include_once "lang.php";
    $db = new DBController();
    $data = new Etudiant($db);
    $etudiants=$data->getEtudiant();
    $formations = $data->getformation();
?>
<?php
    /*$fr_select="";
    $ar_select="";
    $langue = '';
    if((isset($_GET['lang']) && $_GET['lang']=='fr') || !isset($_GET['lang'])){
        $fr_select= "selected"; 
        $langue = "fr";
    }else{
        $ar_select= "selected";
        $langue = "ar";
    }*/
?>
    <div class="foot-bg text-color text-center pt-3">
        <div class="d-flex justify-content-around">
            <div class="text-white"><i class="fas fa-home"></i> <?php echo $navbar['adresse'] ?></div>
            <div class="text-white">
                <b><i class="fas fa-mobile"></i> </b><span class="pr-2">+212664159137 </span> 
                <b><i class="fas fa-phone"></i> </b><span class="pr-2">+212539320395 </span> 
                <b><i class="fas fa-phone"></i> </b><span class="pr-2">+212539320395</span> 
            </div>
            <div class="text-white"><i class="fas fa-envelope"></i> artl.nord.tanger@gmail.com</div>
            <!--<div id="google_translate_element"></div>-->
            <div>
            <!--<span class="text-white">Choisir votre langue: </span> 
            <select name="lang" id="lang" onchange="languige()">
                <option value="fr" <?php //echo $fr_select ?>>Français</option>
                <option value="ar" <?php //echo $ar_select ?>>Arabe</option>
            </select>-->
            <a href="index?lang=fr"><?php echo $lang['lang_fr'] ?></a>
        |   <a href="index?lang=ar"><?php echo $lang['lang_ar'] ?></a>
            </div>

        </div>

    </div>
<nav class="navbar navbar-expand-lg navbar-light bg-white w-100" id="navbar">
    
    <a class="navbar-brand pl-3"  href="index" ><img class="img-fluid" src="images/artl/logo.jpeg" style="width:16rem; height:60px"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse " id="navbarSupportedContent">
        <ul class="navbar-nav mx-auto">
            <li class="nav-item">
                <a class="nav-link pr-3 text-color" href="index"><?php echo $navbar['Accueil'] ?><span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item pr-3 space-link">
                <a class="nav-link text-color " href="ARTL-Nord"><?php echo $navbar['ARTLN'] ?></a>
            </li>    
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle pr-3 text-color" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-expanded="false">
                <?php echo $navbar['Formations'] ?>
                </a>
                <div class="dropdown-menu pr-3" aria-labelledby="navbarDropdown">
                    <?php
                        foreach($formations as $formation){
                    ?>
                    <a class="dropdown-item" href="nos-formations?id=<?php echo $formation['for_id']?>" class="pb-2">
                        <?php 
                            if(@$_GET['lang'] == "ar"){
                                echo $formation['for_nom_arab'];
                            }else{
                                echo $formation['for_nom'];
                            }
                        ?>
                    </a>
                    <?php
                        }
                    ?>
                </div>
            </li>
            <li class="nav-item dropdown space-link">
                <a class="nav-link dropdown-toggle pr-3 text-color" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-expanded="false">
                <?php echo $navbar['Conseil'] ?>
                </a>
                <div class="dropdown-menu pr-3" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="conseil"><?php echo $navbar['Accompagnement'] ?></a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="douane"><?php echo $navbar['Categorisation'] ?></a>
                </div>
            </li>
            <li class="nav-item pr-3">
                <a class="nav-link text-color" href="salle-reservation"><?php echo $navbar['salles'] ?></a>
            </li>
            <li class="nav-item pr-3 space-link">
                <a class="nav-link text-color" href="article"><?php echo $navbar['Actualites'] ?></a>
            </li>
            <li class="nav-item pr-3">
                <a class="nav-link text-color" href="#contactez-nous"  role="button"><?php echo $navbar['Contact'] ?></a>
            </li>
        </ul>
        <div class="form-inline my-2 my-lg-0">
            <ul class="navbar-nav">
                <li class="nav-item dropdown mr-4">
                    <?php
                        if(isset($_SESSION['etud_cin']) && isset($_SESSION['etud_motdepasse'])){
                            foreach($etudiants as $etudiant){
                                if($etudiant['etud_id'] == $_SESSION['id']){   
                    ?>
                    <a class="dropdown-toggle text-color btn-etudiant rounded" id="btn-etudiant" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-user "></i> <?php echo $etudiant['etud_prenom']." ". $etudiant['etud_nom'] ?>
                    </a>
                    <?php
                                }
                            }   
                    ?>
                    <div class="dropdown-menu mt-3" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="espace_etudiant"><?php echo $navbar['etudiant'] ?></a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="logout"><?php echo $navbar['deconnexion'] ?></a>
                    </div>
                    <?php
                        }else if(isset($_SESSION['username']) && isset($_SESSION['pwd'])){
                    ?>
                    <a class="dropdown-toggle text-color btn-etudiant mr-3 rounded" id="btn-etudiant" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-user "></i> <?php echo $navbar['admin'] ?>
                    </a>
                    <div class="dropdown-menu mt-3 menu-padding" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="dashboard"><?php echo $navbar['dashboard'] ?></a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="logout"><?php echo $navbar['deconnexion'] ?></a>
                    </div>
                    <?php
                        }else{
                    ?>
                    <a class="text-color btn-etudiant rounded" id="btn-etudiant" href="espace_etudiant"><i class="fas fa-user "></i></i> <?php echo $navbar['espace'] ?></a>
                    <?php
                        }
                    ?>
                </li>
            </ul>
        </div>
    </div>
</nav>
<script type="text/javascript">// <![CDATA[
    //function googleTranslateElementInit() {
       // new google.translate.TranslateElement({pageLanguage: 'en', layout: google.translate.TranslateElement.InlineLayout.SIMPLE}, 'google_translate_element');
    //}
// ]]>
</script>
<script src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit" type="text/javascript"></script>
<script>
    function languige(){
        var lang= $("#lang").val();
        window.location.href='http://localhost/ecole/?lang='+lang
    }             
</script>