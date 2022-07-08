<?php include_once "session.php";?>
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

        <title><?php echo $title['titre'] ?></title>
    </head>
    <body>
        <div id="top"></div>
        <?php include_once "navbar.php";?>
        <div class="div-background">
            <div class="text-white text-center text-big div-header">
                <h1 class="h1-size-big"><?php echo $index['banner_1'] ?> <br> <?php echo $index['banner_2'] ?><br>ARTLN</h1>
            </div>
            <div style="position:relative">
                <div style="background-color: black;opacity: 0.5;top: 0;left: 0;width: 100%;height: 100%;position: absolute; z-index:2"></div>
                <img src="images/view/office_work.png" alt="" class="d-block img-fluid" style="width:100%;">
            </div>
            <div class="container mt-5">
                <div class="text-center pt-3 text-color">
                    <h2 class="pt-4"><?php echo $ARTLN['presentation'] ?></h2>
                    <hr class="hr-width">
                </div>
                <div class="bg-white pb-4">
                    <div class="container-fluid">
                        <!-- <div class="row">
                            <div class="col-lg-12 mt-3">
                                <h1 class="text-center"><?php echo $ARTLN['directeur'] ?></h1>
                            </div>
                        </div>
                        <div class="row align-items-center">
                            <div class="col-md-12 col-lg-12 mt-4 text-justify px-5">
                                <p>
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Commodi, porro dolor quae hic, 
                                    dolorem excepturi deleniti architecto voluptatum voluptas reiciendis provident aliquid, 
                                    neque alias maxime repellat corrupti iure? Velit, natus?
                                    <br><br>
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Commodi, porro dolor quae hic, 
                                    dolorem excepturi deleniti architecto voluptatum voluptas reiciendis provident aliquid, 
                                    neque alias maxime repellat corrupti iure? Velit, natus?
                                </p>
                            </div>
                        </div> -->
                        <div class="row">
                            <div class="col-lg-12 mt-3">
                                <h1 class="text-center"><?php echo $ARTLN['historique'] ?></h1>
                            </div>
                        </div>
                        <div class="row align-items-center">
                            <div class="col-md-12 mt-4 col-lg-6">
                                <img src="images/view/logo.jpeg" alt="" class="img-fluid">
                            </div>
                            <div class="col-md-12 col-lg-6 mt-4 text-justify">
                                <p>
                                    L'Académie Régionale du Transport et de la Logistique du Nord (ARTL NORD), a été cérée le 21/12/2017 nous
                                    sommes spécialisé dans la Formation & le Conseil des entreprises du secteur du Transport et de la 
                                    Logistique, il soutien votre équipe en interne et vous propose des solutions rentables selon les besoins 
                                    ou affectation d’une équipe dédiée à la réalisation d’un projet d’amélioration logistique et de la chaîne 
                                    d’approvisionnement, ainsi il vous accompagne à l’intégration et la mise en place des systèmes de management
                                    de la qualité au Maroc et à l’international.
                                    <br><br>
                                    Nous Intervenons ainsi sur des thématiques majeures, au coeur des préoccupations opérationnelles et 
                                    stratégiques de nos clients : la Supply Chain, le transport, la distribution, l’entreposage, les matières 
                                    dangereuses, les échanges internationaux.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="text-center pt-3 text-color">
                    <h2 class="pt-4"><?php echo $ARTLN['notreAcademi'] ?></h2>
                    <hr class="hr-width">
                </div>
                <div class="bg-white pb-4">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-6 col-md-12">
                                <div class="text-center pt-3 text-color">
                                    <h2 class="pt-4"><?php echo $ARTLN['missions'] ?></h2>
                                    <hr class="hr-width">
                                </div>
                                <div class="row">
                                    <div class="col-lg-12 mt-lg-4 col-md-6 col-sm-12">
                                        <img src="images/view/missions.jpg" alt="" class="img-fluid" style="height:400px">
                                    </div>
                                    <div class="col-md-6 mt-4 text-justify d-flex col-lg-12 col-sm-12">
                                        <p>
                                            ARTL Nord est dans le coeur du développement de la région du nord surtout dans le secteur du 
                                            transport et la logistque, où nous misons sur un potentiel humain et matériel énorme pour 
                                            atteindre nos objectifs.
                                            <br><br>
                                            Nous prenons la cause enviromentale au sérieux où on essayons de mettre en place un programme 
                                            pédagogique adéquat avec le e-conduite
                                        </p>
                                    </div>  
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="text-center pt-3 text-color">
                                    <h2 class="pt-4"><?php echo $ARTLN['objectifs'] ?></h2>
                                    <hr class="hr-width">
                                </div>
                                <div class="row">
                                    <div class="col-lg-12 mt-lg-4 col-md-6 col-sm-12">
                                        <img src="images/view/objectifs.jpg" alt="" class="img-fluid" style="height:400px">
                                    </div>
                                    <div class="col-md-6 mt-4 text-justify d-flex col-lg-12 col-sm-12">
                                        <p>
                                            Notre objectif est de rationalisé la conduite dans la région vue l'énorme utilisation des véhicules 
                                            dans la région et plus précisement les conducteurs professionnels, et de former des stagiaires 
                                            <br><br>
                                            qui sont capable d'exercer le metier en respectant les normes
                                            de conduite et d'environnement avec l'ensemble de notre équipe et les parties prenantes
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="text-center pt-3 text-color">
                                    <h2 class="pt-4"><?php echo $ARTLN['valeurs'] ?></h2>
                                    <hr class="hr-width">
                                </div>
                                <div class="row">
                                    <div class="col-lg-12 mt-lg-4 col-md-6 col-sm-12">
                                        <img src="images/view/valeurs.jpg" alt="" class="img-fluid" style="height:400px">
                                    </div>
                                    <div class="col-md-6 mt-4 text-justify d-flex col-lg-12 col-sm-12">
                                        <ul>
                                            <li>Responsabilité: Avoir des conducteurs responsables qui pratiques les normes de conduite, 
                                                ce que nous pousse aussi d'être plus responsable envers les stagiaires.
                                            </li>
                                            <li>
                                                Poursuivre notre mission :nous sommes tous motivés par la poursuite d’un objectif commun, 
                                                une mission qui fait partie intégrante de nos valeurs. 
                                            </li>
                                            <li>
                                                Pratiquer la pleine conscience:nous nous concentrons sur le présent et prenons le 
                                                temps nécessaire à la réflexion et à l’intégration des nouveaux savoirs. 
                                                Ces pratiques permettent un apprentissage collectif partagé. Ainsi, nous nous améliorons 
                                                ensemble et faisons évoluer continuellement notre culture.
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="text-center pt-3 text-color">
                                    <h2 class="pt-4"><?php echo $ARTLN['vision'] ?></h2>
                                    <hr class="hr-width">
                                </div>
                                <div class="row">
                                    <div class="col-lg-12 mt-lg-4 col-md-6 col-sm-12">
                                        <img src="images/view/visiion.jpg" alt="" class="img-fluid" style="height:400px">
                                    </div>
                                    <div class="col-md-6 mt-4 text-justify d-flex col-lg-12 col-sm-12">
                                        <p>
                                            La vision de l'Académie est de mettre la région du nord comme étant un exemple de la bonne conduite 
                                            dans tous le Maroc en collaboration avec tous les parties prenantes,
                                            <br><br>
                                            et de mettre en place un livret pour avoir le bon comportement de la conduite auprès du 
                                            conducteurs profesionnels, afin de minimiser les accidents et le respect de l'environement
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 mt-3">
                        <h1 class="text-center">La Politique qualité</h1>
                    </div>
                </div>
                <div class="bg-white pb-4">
                    <div class="container-fluid">
                        <div class="row align-items-center">
                            <div class="col-md-12 mt-4 col-lg-6">
                                <img src="images/view/iso-certification.png" alt="" class="img-fluid">
                            </div>
                            <div class="col-md-12 col-lg-6 mt-4 text-justify">
                                <p>
                                    La Politique Qualité est un document synthétique (une page suffit) qui définit de quelle manière votre 
                                    démarche qualité s’inscrit dans votre stratégie globale d’entreprise.
                                    <br><br>
                                    Elle est destinée à être communiquée en interne, mais peut l’être aussi en externe, auprès de vos prospects, 
                                    clients et autres partenaires. Certaines entreprises la publient sur leur site internet.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="text-center pt-3 text-color organigram">
                    <h2 class="pt-4"><?php echo $ARTLN['organigramme'] ?></h2>
                    <hr class="hr-width">
                </div>
                <div class="bg-white pb-4 pt-2 text-center">
                    <img src="images/view/organigramme.png" alt="" class="img-fluid">
                </div>
            </div>
            <div class="div-btn fixed-bottom mb-2 mx-2" id="div-btn">
                <a href="#top" class="btn-top px-3 float-right py-2 rounded"><i class="fas fa-long-arrow-alt-up text-white"></i></a>
            </div>
            <?php include_once "includes/footer.php";?>
        </div>
    </body>
</html>