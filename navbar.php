<?php
    include_once "includes/header.php";  
    include_once "includes/style.php";
    include_once "includes/scripts.php";
    $etudiants=$data->getEtudiant();
    $formations = $data->getformation();
?>
<div class="foot-bg text-color pt-3" dir="<?php  $_SESSION['lang'] === 'ar' ? "rtl" : "" ?>">
    <div class="responsive-bar">
        <div class="text-white"><i class="fas fa-home"></i> <?php echo $navbar['adresse'] ?></div>
        <div class="text-white block">
            <b><i class="fas fa-mobile display-2 pr-1"></i> </b><span class="pr-2 display-2 font">+212666666666 </span>
            <b><i class="fas fa-phone pr-1"></i> </b><span class="pr-2">+212666666666 </span>
            <b><i class="fas fa-envelope display pr-1"></i> </b><span class="pr-2 display">example@gmail.com </span>
        </div>
        <!--<div id="google_translate_element"></div>-->
        <div class="">
            <!--<div class="dropdown">
                <h6 class="text-white dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <?php //echo $lang['langue'] ?>
                </h6>-->
                <!--<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">-->
                    <form action="" method="POST">
                        <div class="text-white">
                            <button type="submit" name="fr" class='text-white' style="background-color:transparent; border:none" data-toggle="tooltip" data-placement="bottom" title="<?php echo $lang['francais'] ?>">
                                <!--<img src='images/Flag_of_France.svg.png' style='max-width:40px' class="img-fluid">-->
                                <span class=""> <?php echo $lang['fr'] ?></span>
                            </button> ||
                            <button type="submit" name="ar" class='text-white' style="background-color:transparent; border:none;" data-toggle="tooltip" data-placement="bottom" title="<?php echo $lang['arabe'] ?>">
                                <!--<img src='images/Flag_of_the_Arab_League.svg.png' style='max-width:40px' class="img-fluid">-->
                                <span > <?php echo $lang['ar'] ?></span>
                            </button>
                        </div>
                    </form>
                <!--</div>
            </div>-->
        </div>
    </div>
</div>
<nav class="navbar navbar-expand-lg navbar-light bg-white w-100" id="navbar">
    <?php
        if ($_SESSION['lang'] == "ar") {
    ?>
    <div class="collapse navbar-collapse" id="navbarSupportedContent" lang="ar">
        <div class="form-inline my-2 my-lg-0">
            <ul class="navbar-nav navbar-font">
                <li class="nav-item dropdown mr-4">
                    <?php
                        if(isset($_SESSION['etud_cin']) && isset($_SESSION['etud_motdepasse'])){
                            foreach($etudiants as $etudiant){
                                if($etudiant['etud_id'] == $_SESSION['id']){   
                    ?>
                    <a class="dropdown-toggle text-color btn-etudiant rounded " id="btn-etudiant" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-expanded="false">
                        <?php echo $etudiant['etud_prenom_arabe']." ". $etudiant['etud_nom_arab'] ?> <i class="fas fa-user "></i>
                    </a>
                    <?php
                            }
                        }   
                    ?>
                    <div class="dropdown-menu mt-3" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="espace-stagiaire"><?php echo $navbar['etudiant'] ?></a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="includes/logout"><?php echo $navbar['deconnexion'] ?></a>
                    </div>
                    <?php
                        }else if(isset($_SESSION['username']) && isset($_SESSION['pwd'])){
                    ?>
                    <a class="dropdown-toggle text-color btn-etudiant rounded mr-5" id="btn-etudiant" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-expanded="false">
                        <?php echo $navbar['admin'] ?> <i class="fas fa-user "></i>
                    </a>
                    <div class="dropdown-menu mt-3" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="dashboard"><?php echo $navbar['dashboard'] ?></a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="includes/logout"><?php echo $navbar['deconnexion'] ?></a>
                    </div>
                    <?php
                        }else{
                    ?>
                    <a class="text-color btn-etudiant rounded" id="btn-etudiant" href="espace-stagiaire"> <?php echo $navbar['espace'] ?> <i class="fas fa-user "></i></a>
                    <?php
                        }
                    ?>
                </li>
            </ul>
        </div>
        <ul class="navbar-nav mx-auto">
            <li class="nav-item pr-3 navbar-font">
                <a class="nav-link text-color" href="#contactez-nous"  role="button"><?php echo $navbar['Contact'] ?></a>
            </li>
            <li class="nav-item pr-3 space-link navbar-font">
                <a class="nav-link text-color" href="actualités"><?php echo $navbar['Actualites'] ?></a>
            </li>
            <li class="nav-item pr-3 navbar-font">
                <a class="nav-link text-color" href="location-salle"><?php echo $navbar['salles'] ?></a>
            </li>
            <!--<li class="nav-item dropdown space-link navbar-font">
                <a class="nav-link dropdown-toggle pr-3 text-color" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-expanded="false">
                    <?php echo $navbar['Conseil'] ?>
                </a>
                <div class="dropdown-menu pr-3 navbar-font" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="conseil"><?php echo $navbar['Accompagnement'] ?></a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="douane"><?php echo $navbar['Categorisation'] ?></a>
                </div>
            </li>-->
            <li class="nav-item dropdown navbar-font">
                <a class="nav-link dropdown-toggle pr-3 text-color" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-expanded="false">
                    <?php echo $navbar['Formations'] ?>
                </a>
                <div class="dropdown-menu pr-3" aria-labelledby="navbarDropdown">
                    <?php
                        foreach($formations as $formation){
                    ?>
                    <a class="dropdown-item" href="formation?titre=<?php echo str_replace(" ", "_", $formation['for_nom'])?>" class="pb-2">
                        <?php echo $formation['for_nom_arab'];?>
                    </a>
                    <?php
                        }
                    ?>
                </div>
            </li>
            <li class="nav-item pr-3 space-link navbar-font">
                <a class="nav-link text-color " href="about"><?= $navbar['ARTLN'] ?></a>
            </li>
            <li class="nav-item navbar-font">
                <a class="nav-link pr-3 text-color" href="index"><?php echo $navbar['Accueil'] ?><span class="sr-only">(current)</span></a>
            </li>
        </ul>
    </div>
    <a class="navbar-brand"  href="index" style="width:11rem; height:50px">لوغو</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <?php
        } else {
    ?>   
    <a class="navbar-brand" href="index" style="width:11rem; height:50px">Logo</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mx-auto">
            <li class="nav-item navbar-font">
                <a class="nav-link pr-2 text-color" href="index"><?php echo $navbar['Accueil'] ?><span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item pr-2 space-link navbar-font">
                <a class="nav-link text-color " href="about"><?= $navbar['ARTLN'] ?></a>
            </li>    
            <li class="nav-item dropdown navbar-font">
                <a class="nav-link dropdown-toggle pr-2 text-color" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-expanded="false">
                    <?php echo $navbar['Formations'] ?>
                </a>
                <div class="dropdown-menu pr-2" aria-labelledby="navbarDropdown">
                    <?php
                        foreach($formations as $formation){
                    ?>
                    <a class="dropdown-item" href="formation?titre=<?php echo str_replace(" ", "_", $formation['for_nom'])?>" class="pb-2">
                        <?php echo $formation['for_nom'];?>
                    </a>
                    <?php
                        }
                    ?>
                </div>
            </li>
            <!--<li class="nav-item dropdown space-link navbar-font">
                <a class="nav-link dropdown-toggle pr-2 text-color" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-expanded="false">
                    <?php echo $navbar['Conseil'] ?>
                </a>
                <div class="dropdown-menu pr-2 navbar-font" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="conseil"><?php echo $navbar['Accompagnement'] ?></a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="douane"><?php echo $navbar['Categorisation'] ?></a>
                </div>
            </li>-->
            <li class="nav-item pr-2 navbar-font">
                <a class="nav-link text-color" href="location-salle"><?php echo $navbar['salles'] ?></a>
            </li>
            <li class="nav-item pr-3 space-link navbar-font">
                <a class="nav-link text-color" href="actualités"><?php echo $navbar['Actualites'] ?></a>
            </li>
            <li class="nav-item pr-3 navbar-font">
                <a class="nav-link text-color" href="#contactez-nous"  role="button"><?php echo $navbar['Contact'] ?></a>
            </li>
        </ul>
        <div>
        <?php
                        if(isset($_SESSION['etud_cin']) && isset($_SESSION['etud_motdepasse'])){
                            foreach($etudiants as $etudiant){
                                if($etudiant['etud_id'] == $_SESSION['id']){   
                    ?>
                    <a class="nav-link dropdown-toggle text-color btn-etudiant rounded admin-margin" id="btn-etudiant" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-user"></i> <?php echo $etudiant['etud_prenom']." ". $etudiant['etud_nom'] ?>
                    </a>
                    <?php
                                }
                            }   
                    ?>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="espace-stagiaire"><?php echo $navbar['etudiant'] ?></a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="includes/logout"><?php echo $navbar['deconnexion'] ?></a>
                    </div>
                    <?php
                        }else if(isset($_SESSION['username']) && isset($_SESSION['pwd'])){
                    ?>
                    <a class="nav-link dropdown-toggle text-color btn-etudiant rounded admin-margin" id="btn-etudiant" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-user "></i> <?php echo $navbar['admin'] ?>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="admin/dashboard"><?php echo $navbar['dashboard'] ?></a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="includes/logout"><?php echo $navbar['deconnexion'] ?></a>
                    </div>
                    <?php
                        }else{
                    ?>
                    <a class="text-color btn-etudiant rounded" id="btn-etudiant" href="espace-stagiaire"><i class="fas fa-user "></i> <?php echo $navbar['espace'] ?></a>
                    <?php
                        }
                    ?>
        </div>

    </div>
    <?php
        }
    ?>
</nav>
<script type="text/javascript">// <![CDATA[
    //function googleTranslateElementInit() {
       // new google.translate.TranslateElement({pageLanguage: 'en', layout: google.translate.TranslateElement.InlineLayout.SIMPLE}, 'google_translate_element');
    //}
// ]]>
</script>
<!-- <script src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit" type="text/javascript"></script> -->