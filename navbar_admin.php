<?php
    session_start();
    header('Content-Type: text/html; charset=utf-8');
    require("functions/db.php");
    require("functions/etudiant.php");
    include_once "style.php";
    include_once "scripts.php";
    $db = new DBController();
    $data = new Etudiant($db);
    $formations = $data->getformation();
?>
<div class="container-fluid">
    <div class="row mt-2">
        <div class="position-fixed mt-5 menu-show-admin">
            <h3 class="mt-3 pl-3 float-right bg-white" id="menu"><i class="fas fa-bars pr-lg-4 font-pointer" id="bar-toggle" onclick="menudisplay()"></i></h3>
            <div class="col-md-2 col-sm-2 position-fixed bg-dark div-menu" id="div-show">
                <h3 id="menu-show" class="show-this text-dark">Menu</h3>
                <div class="mt-4 ml-lg-5 pt-4 div-menu-width">
                    <p><a href="dashboard" class="link-color">Dashboard <i class="fas fa-tachometer-alt awesome-padding float-right"></i></a></p>
                    <p><a href="formations" class="link-color">Formations<i class="fas fa-school awesome-padding float-right"></i></a></p>
                    <p><a href="matieres" class="link-color">Matières<i class="fas fa-book-open awesome-padding float-right"></i></a></p>
                    <p><a href="etudiant" class="link-color">Etduiants<i class="fas fa-user-graduate awesome-padding float-right"></i></a></p>
                    <p><a href="demandes-etduiant" class="link-color">Demandes<i class="fas fa-graduation-cap awesome-padding float-right"></i></a></p>
                    <p><a href="salles" class="link-color">Salles<i class="fas fa-chalkboard-teacher awesome-padding float-right"></i></a></p>
                    <p><a href="acomagnement-conseil" class="link-color">Acompa. & conseil<i class="fas fa-question awesome-padding float-right"></i></a></p>
                    <p><a href="articles" class="link-color">Articles<i class="fas fa-newspaper awesome-padding float-right"></i></a></p>
                    <p><a href="contacts" class="link-color">Contacts<i class="fas fa-address-card awesome-padding float-right"></i></a></p>
                    <p><a href="index" class="link-color">Accueil<i class="fas fa-home awesome-padding float-right"></i></a></p>
                    <p><a href="logout" class="link-color">Logout<i class="fas fa-sign-out-alt awesome-padding float-right"></i></a></p>
                </div>
            </div>
        </div>
    </div>
</div>