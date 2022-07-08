<?php include_once "session.php"; ?>
<?php
$formations = $data->getformation();
?>
<!DOCTYPE html>
<html lang="ar">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
    include_once "includes/header.php";
    include_once "includes/style.php";
    include_once "includes/scripts.php";
    ?>
    <style>
        .card {
            width: 100% !important;
            font-size: 1rem;
            text-decoration: none;
            overflow: hidden;
            box-shadow: 0 0 3rem -1rem rgba(0, 0, 0, 0.5);
            transition: transform 0.1s ease-in-out, box-shadow 0.1s;
        }
    </style>
    <title><?php echo $title['titre'] ?></title>
</head>

<body>
    <div id="top"></div>
    <?php include_once "navbar.php"; ?>
    <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel" style="position:relative">
        <div class="text-white text-center text-fade text-big div-header">
            <h1 class="h1-size-big"><?php echo $index['banner_1'] ?> <br> <?php echo $index['banner_2'] ?><br>ARTLN</h1>
            <h3 class="pt-4 margin-text">
                Nous sommes spécialisé dans la Formation <br> & le Conseil des entreprises du secteur <br> du Transport et de la Logistique,
            </h3>
            <section id="section07" class="demo">
                <a href="#academie"><span></span><span></span><span></span></a>
            </section>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div style="background-color: black;opacity: 0.5;top: 0;left: 0;width: 100%;height: 100%;position: absolute; z-index:2"></div>
                <img src="images/view/entropot.png" class="d-block img-fluid" alt="first" style="width:100%; max-height:80vh">
            </div>
            <div class="carousel-item">
                <div style="background-color: black;opacity: 0.5;top: 0;left: 0;width: 100%;height: 100%;position: absolute; z-index:2"></div>
                <img src="images/view/seb.jpg" class="d-block img-fluid" alt="second" style="width:100%; max-height:80vh">
            </div>
            <div class="carousel-item">
                <div style="background-color: black;opacity: 0.5;top: 0;left: 0;width: 100%;height: 100%;position: absolute; z-index:2"></div>
                <img src="images/view/camions_group.png" class="d-block img-fluid" alt="third" style="width:100%; max-height:80vh">
            </div>
        </div>
    </div>
    <div class="div-background">
        <div class="container">
            <div class="text-center pt-3 text-color">
                <h1><?php echo $index['main_title'] ?></h1>
                <h2 class="pt-4" id="academie"><?php echo $index['academie'] ?></h2>
                <hr class="hr-width">
            </div>
            <div class="bg-white pb-4">
                <div class="container-fluid">
                    <div class="row align-items-center">
                        <div class="col-md-12 mt-4 col-lg-6 text-center">
                            <img src="images/view/logo.jpeg" alt="" class="img-fluid">
                        </div>
                        <div class="col-md-12 col-lg-6 mt-4 text-justify d-flex align-items-center">
                            <p>
                                L'Académie Régionale du Transport et de la Logistique du Nord (ARTL NORD) est un organisme spécialisé dans 
                                la Formation & le Conseil des entreprises du secteur du Transport et de la Logistique, il soutien votre 
                                équipe en interne et vous propose des solutions rentables selon les besoins ou affectation d’une équipe 
                                dédiée à la réalisation d’un projet d’amélioration logistique et de la chaîne d’approvisionnement, 
                                ainsi il vous accompagne à l’intégration et la mise en place des systèmes de management de la qualité au 
                                Maroc et à l’international.
                                <br><br>
                                Nous Intervenons ainsi sur des thématiques majeures, au coeur des préoccupations opérationnelles et 
                                stratégiques de nos clients : la Supply Chain, le transport, la distribution, l’entreposage, les matières 
                                dangereuses, les échanges internationaux.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="bg-choisir rounded px-3 mt-4 text-center pt-3">
                <h2 class="text-white"><?php echo $index['pourquoi'] ?></h2>
                <p class="text-white">
                    La formation dans le sectuer du transport et de la logistique est notre spécialité, nous assurons que tous les apprentis 
                    exerce bien le metier du conducteur routier, avec une pédagogie active. <br> <br>
                    Ainsi que l'accompagnement des entreprises pour l'obtention de la catégorisation douane et de l'accompagenemnt iso dans 
                    les meilleurs conditions en suivant une politique de qualité trés rigoureuse.
                </p>
                <div class="row">
                    <div class="col-lg-4 mt-2">
                        <div class="border bg-white py-3">
                            <div class="py-3"><i class="fas fa-award awesome-font pt-2"></i></div>
                            <h2><?php echo $index['qualite'] ?></h2>
                            <p class="text-justify px-3 padding-text">
                                Nous suivons une politique de qualité trés rigoureuse pour la certification d'ISO afin d'accompagner les 
                                entreprises dans les bons conditions
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-4 mt-2">
                        <div class="border bg-white py-3">
                            <div class="py-3"><i class="fas fa-user-tie awesome-font pt-2"></i></div>
                            <h2><?php echo $index['profes'] ?></h2>
                            <p class="text-justify px-3 padding-text">
                                Pour la satisfaction de votre service nous assurons de recruter une équipe profesionnelle qui est toujours
                                à jour de tous changement et performante
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-4 mt-2">
                        <div class="border bg-white py-3">
                            <div class="py-3"><i class="fas fa-address-card awesome-font pt-2"></i></div>
                            <h3><?php echo $index['carte'] ?></h3>
                            <p class="text-justify px-3">
                            Nous assurons que nos formations FQIMO et FCO se passent dans les meilleures conditions avec le maximum 
                            d'apprentissage pour les stagiaires, pour bien exercer le metier du conducteur professionnel 
                            et l'obtention de la carte professionelle 
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="text-center my-5">
                            <a href="ARTL-Nord" class="btn-formation rounded-pill py-2"><?php echo $index['plus'] ?> <i class="fas fa-chevron-right arrow-font"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="text-center pt-3 text-color">
                <h2 class="pt-4"><?php echo $index['service'] ?></h2>
                <hr class="hr-width">
            </div>
            <div class="row py-4 px-3">
                <div class="col-md-6 mb-3">
                    <div class="card bg-white rounded" style="box-shadow: 2px 2px 2px 2px rgba(0, 0, 0, 0.2);">
                        <div class="pb-3 text-center"><i class="fas fa-book awesome-font pt-3" style="color: #4A07D7;"></i></div>
                        <h3 class="text-center" style="color: #4A07D7;"><?php echo $index['formation'] ?></h3>
                        <p class="text-justify px-3 py-3">
                            Formation FQIMO pour 10 jours et FCO pour 3 jours, dans des salles bien équipées, des formateurs professionnels 
                            et Cours théorique et pratique.
                        </p>
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <div class="card bg-white rounded" style="box-shadow: 2px 2px 2px 2px rgba(0, 0, 0, 0.2);">
                        <div class="pb-3 text-center"><i class="fas fa-file awesome-font pt-3" style="color: #4A07D7;"></i></div>
                        <h3 class="text-center" style="color: #4A07D7;"><?php echo $index['certificat'] ?></h3>
                        <p class="text-justify px-3 py-3 margin-text">
                            Vous pouvez prendre un rendez-vous avec notre équipe pour vous accompagner de la certification ISO de vos produits.
                        </p>
                    </div>
                </div>
                <div class="col-md-6 margin-service">
                    <div class="card bg-white rounded" style="box-shadow: 2px 2px 2px 2px rgba(0, 0, 0, 0.2);">
                        <div class="pb-3 text-center"><i class="far fa-file-alt awesome-font pt-3" style="color: #4A07D7;"></i></div>
                        <h3 class="text-center" style="color: #4A07D7;"><?php echo $index['douane'] ?></h3>
                        <p class="text-justify px-3 py-3">
                            Vous pouvez prendre un rendez-vous avec notre équipe pour vous prendre le statut d’Opérateur Economique Agréé aux 
                            intervenants  dans  la  chaine du commerce extérieur.
                        </p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card bg-white rounded" style="box-shadow: 2px 2px 2px 2px rgba(0, 0, 0, 0.2);">
                        <div class="pb-3 text-center"><i class="fa-solid fa-people-roof awesome-font pt-3" style="color: #4A07D7;"></i></div>
                        <h3 class="text-center" style="color: #4A07D7;"><?php echo $index['location'] ?></h3>
                        <p class="text-justify px-3 py-3 margin-text">
                            Vous pouvez prendre un rendez-vous pour consulter la disponibilité des nos salles de formation pour 20 personnes,
                            qui ont equipé des vidéosprojecteurs, tableaux magnétiques
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="text-center pt-3 text-color">
            <h2 class="pt-4"><?php echo $index['nosformation'] ?></h2>
            <hr class="hr-width">
        </div>
        <div class="container">
            <ul class="card-list">
                <div class="row">
                    <?php
                    foreach ($formations as $formation) {
                    ?>
                        <div class="col-lg-6 col-md-12">
                            <div class="text-center pt-3">
                                <li class="card" style="height: 700px;">
                                    <a class="card-im" href="formation?id=<?php echo $formation['for_id'] ?>" style="background-image: url(images/view/camion.png);position: relative;">
                                        <div style="background-color:rgba(0,0,0,0.4); z-index: 1;  position:absolute; top:0; left:0; width:100%; height:100%;"></div>
                                    </a>
                                    <h1 class="text-white text-center px-3" style="position: absolute; z-index:4 ; filter: none !important;  margin-top: 80px; margin-left:auto; margin-right:auto; width:100% ">
                                        <a href="formation?id=<?php echo $formation['for_id'] ?>" class="text-white">
                                            <?php
                                            if ($_SESSION['lang'] == "ar") {
                                                echo $formation['for_nom_arab'];
                                            } else {
                                                echo $formation['for_nom'];
                                            }
                                            ?>
                                        </a>
                                    </h1>
                                    <a class="card-description pb-5 mt-2 mx-4" href="formation?id=<?php echo $formation['for_id'] ?>" target="_blank" style="height:700px">
                                        <p>
                                            <?php
                                            if ($_SESSION['lang'] == "ar") {
                                                echo $formation['for_pres_arab'];
                                            } else {
                                                echo $formation['for_pres'];
                                            }
                                            ?>
                                        </p>
                                    </a>
                                    <a href="formation?id=<?php echo $formation['for_id'] ?>" class="btn btn-dark mx-5 mb-5 "><?php echo $forma['inscrivez'] ?> </a>
                                </li>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                </div>
            </ul>
        </div>
        <div class="text-center pt-3 text-color">
            <h2 class="pt-4"><?php echo $index['partenaires'] ?></h2>
            <hr class="hr-width">
        </div>
        <div class="pb-4">
            <div class="customer-logos slider pt-4">
                <div class="slide"><img src="images/view/FTA.png" class="img-fluid" style="width: 25rem; height:180px"></div>
                <div class="slide"><img src="images/view/giz.png" class="img-fluid" style="width: 25rem; height:180px"></div>
                <div class="slide"><img src="images/view/OEA.png" class="img-fluid" style="width: 25rem; height:180px"></div>
                <div class="slide"><img src="images/view/IFMEREE.png" class="img-fluid" style="width: 25rem; height:180px"></div>
                <div class="slide"><img src="images/view/URTL_NOrd.png" class="img-fluid" style="width: 25rem; height:180px"></div>
            </div>
        </div>
    </div>
    <div class="div-btn fixed-bottom mb-2 mx-2" id="div-btn">
                <a href="#top" class="btn-top px-3 float-right py-2 rounded"><i class="fas fa-long-arrow-alt-up text-white"></i></a>
            </div>
    <?php include_once "includes/footer.php"; ?>
    </div>
    <script>
        $(document).ready(function() {
            //carroussel
            $('.customer-logos').slick({
                slidesToShow: 5,
                slidesToScroll: 1,
                autoplay: true,
                autoplaySpeed: 1500,
                arrows: false,
                dots: false,
                pauseOnHover: false,
                responsive: [{
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 4
                    }
                }, {
                    breakpoint: 520,
                    settings: {
                        slidesToShow: 3
                    }
                }]
            });
        });
    </script>
</body>

</html>