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
        .card-im {
            min-height: 20rem !important;
        }
        .wrapp {
            overflow: hidden;
            text-overflow: ellipsis;
            display: -webkit-box;
            -webkit-line-clamp: 4;
            /* number of lines to show */
            line-clamp: 4;
            -webkit-box-orient: vertical;
            height: 100px;
        }
    </style>
    <title><?php echo $title['titre'] ?></title>
</head>

<body dir="<?php  $_SESSION['lang'] === 'ar' ? "rtl" : "" ?>">
    <div id="top"></div>
    <?php include_once "navbar.php"; ?>
    <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel" style="position:relative">
        <div class="text-white text-center text-fade text-big div-header">
            <h1 class="h1-size"><?php echo $index['banner_1'] ?> <br> <?php echo $index['banner_2'] ?></h1>
            <h3 class="pt-4 h3-size">
                <?php echo $index['banner_3'] ?> <br> <?php echo $index['banner_4'] ?> <br> <?php echo $index['banner_5'] ?>
            </h3>
            <section id="section07" class="demo">
                <a href="#academie"><span></span><span></span><span></span></a>
            </section>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div style="background-color: black;opacity: 0.5;top: 0;left: 0;width: 100%;height: 100%;position: absolute; z-index:2"></div>
                <img src="images/school1.jpg" class="d-block img-fluid img-height" alt="first" style="width:100%; height:81.3vh">
            </div>
            <div class="carousel-item">
                <div style="background-color: black;opacity: 0.5;top: 0;left: 0;width: 100%;height: 100%;position: absolute; z-index:2"></div>
                <img src="images/school2.jpg" class="d-block img-fluid" alt="second" style="width:100%; height:81.3vh">
            </div>
            <div class="carousel-item">
                <div style="background-color: black;opacity: 0.5;top: 0;left: 0;width: 100%;height: 100%;position: absolute; z-index:2"></div>
                <img src="images/school3.jpg" class="d-block img-fluid" alt="third" style="width:100%; height:81.3vh">
            </div>
        </div>
    </div>
    <div class="div-background">
        <div class="container">
            <div class="text-center pt-3 text-color mt-5">
                <h1><?php echo $index['main_title'] ?></h1>
                <h2 class="pt-4" id="academie"><?php echo $index['academie'] ?></h2>
                <hr class="hr-width">
            </div>
            <div class="bg-white pb-4">
                <div class="container-fluid">
                    <div class="row align-items-center">
                        <div class="col-md-12 mt-4 col-lg-6 text-center">
                            <img src="images/no_image.jpg" alt="" class="img-fluid" style="width:100px">
                        </div>
                        <div class="col-md-12 col-lg-6 mt-4 text-justify d-flex align-items-center">
                            <p>
                                <?php echo $index['text_1'] ?>
                                <br><br>
                                <?php echo $index['text_2'] ?>
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
                    <?php echo $index['text_pourquoi_1'] ?>
                    <br> <br>
                    <?php echo $index['text_pourquoi_2'] ?>
                </p>
                <div class="row mt-5">
                    <div class="col-lg-6 mt-2">
                        <div class="border text-white">
                            <div class="py-3">
                                <i class="fas fa-award awesome-font py-3 px-4 text-white rounded-circle img-thumbnail bg-choisir"></i>
                            </div>
                            <h2><?php echo $index['qualite'] ?></h2>
                            <p class="text-justify px-3">
                                <?php echo $index['qualite_text'] ?>
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-6 mt-2">
                        <div class="border text-white">
                            <div class="py-3"><i class="fas fa-user-tie awesome-font py-3 px-4 text-white rounded-circle img-thumbnail bg-choisir"></i></div>
                            <h2 class="text-font"><?php echo $index['profes'] ?></h2>
                            <p class="text-justify px-3">
                                <?php echo $index['profes_text'] ?>
                            </p>
                        </div>
                    </div>
                    <!--<div class="col-lg-4 mt-2">
                        <div class="border text-white">
                            <div class="py-3"><i class="fas fa-address-card awesome-font py-3 px-4 text-white rounded-circle img-thumbnail bg-choisir"></i></div>
                            <h3><?php echo $index['carte'] ?></h3>
                            <p class="text-justify px-3">
                                <?php echo $index['carte_text'] ?>
                            </p>
                        </div>
                    </div>-->
                    <div class="col-lg-12">
                        <div class="text-center my-5">
                            <a href="about" class="btn-formation rounded-pill py-2"><?php echo $index['plus'] ?> <i class="fas fa-chevron-right arrow-font"></i></a>
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
                        <div class="pb-3 text-center"><i class="fas fa-book awesome-font pt-3"></i></div>
                        <h3 class="text-center"><?php echo $index['formation'] ?></h3>
                        <p class="text-justify px-3 py-3">
                            <?php echo $index['formation_text'] ?>
                        </p>
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <div class="card bg-white rounded" style="box-shadow: 2px 2px 2px 2px rgba(0, 0, 0, 0.2);">
                        <div class="pb-3 text-center"><i class="fa-solid fa-people-roof awesome-font pt-3"></i></div>
                        <h3 class="text-center"><?php echo $index['location'] ?></h3>
                        <p class="text-justify px-3 py-3"><?php echo $index['location_text'] ?></p>
                    </div>
                </div>
                <!--<div class="col-md-6 mb-3">
                    <div class="card bg-white rounded" style="box-shadow: 2px 2px 2px 2px rgba(0, 0, 0, 0.2);">
                        <div class="pb-3 text-center"><i class="fas fa-file awesome-font pt-3"></i></div>
                        <h3 class="text-center"><?php echo $index['certificat'] ?></h3>
                        <?php
                            if($_SESSION['lang'] == 'ar'){
                        ?>
                        <p class="text-justify px-3 py-3" lang="ar" dir="rtl">
                            <?php echo $index['certificat_text'] ?>
                        </p>
                        <?php
                            }else{
                        ?>
                        <p class="text-justify px-3 py-3">
                            <?php echo $index['certificat_text'] ?>
                        </p>
                        <?php       
                            }
                        ?>
                    </div>
                </div>
                <div class="col-md-6 margin-service">
                    <div class="card bg-white rounded" style="box-shadow: 2px 2px 2px 2px rgba(0, 0, 0, 0.2);">
                        <div class="pb-3 text-center"><i class="far fa-file-alt awesome-font pt-3"></i></div>
                        <h3 class="text-center"><?php echo $index['douane'] ?></h3>
                        <?php
                            if($_SESSION['lang'] == 'ar'){
                        ?>
                        <p class="text-justify px-3 py-3" lang="ar" dir="rtl"><?php echo $index['douane_text'] ?></p>
                        <?php
                            }else{
                        ?>
                        <p class="text-justify px-3 py-3"><?php echo $index['douane_text'] ?></p>
                        <?php       
                            }
                        ?>
                    </div>
                </div>-->
            </div>
        </div>
        <div class="text-center pt-3 text-color">
            <h2 class="pt-4"><?php echo $index['nosformation'] ?></h2>
            <hr class="hr-width">
        </div>
        <div class="container">
            <div class="card-list">
                <div class="row justify-content-center">
                    <?php
                    foreach ($formations as $formation) {
                    ?>
                        <div class="col-md-6">
                            <div class="pt-3">
                                <div class="card">
                                    <a class="card-im" href="formation?id=<?php echo $formation['for_id'] ?>" style="background-image: url(images/view/camion_11zon.jpg);position: relative;">
                                        <div style="background-color:rgba(0,0,0,0.4); z-index: 1;  position:absolute; top:0; left:0; width:100%; height:100%;"></div>
                                    </a>
                                    <h1 class="text-white text-center px-3 text-font" style="position: absolute; z-index:4 ; filter: none !important;  margin-top: 50px; margin-left:auto; margin-right:auto; width:100% ">
                                        <a href="formation?titre=<?php echo str_replace(" ", "_", $formation['for_nom']) ?>" class="text-white">
                                            <?php
                                            if ($_SESSION['lang'] == "ar") {
                                                echo $formation['for_nom_arab'];
                                            } else {
                                                echo $formation['for_nom'];
                                            }
                                            ?>
                                        </a>
                                    </h1>
                                    <a class="card-description mx-4 my-4 wrapp" href="formation?titre=<?php echo str_replace(" ", "_", $formation['for_nom']) ?>" target="_blank">
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
                                    <a href="inscription" class="btn btn-dark mx-5 mb-5 "><?php echo $forma['inscrivez'] ?> </a>
                                </div>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
        <div class="text-center pt-3 text-color">
            <h2 class="pt-4"><?php echo $index['partenaires'] ?></h2>
            <hr class="hr-width">
        </div>
        <div class="pb-4">
            <div class="customer-logos slider pt-4">
                <div class="slide"><img src="images/no_image.jpg" class="img-fluid" style="width: 25rem; height:180px"></div>
                <div class="slide"><img src="images/no_image.jpg" class="img-fluid" style="width: 25rem; height:180px"></div>
                <div class="slide"><img src="images/no_image.jpg" class="img-fluid" style="width: 25rem; height:180px"></div>
                <div class="slide"><img src="images/no_image.jpg" class="img-fluid" style="width: 25rem; height:180px"></div>
                <div class="slide"><img src="images/no_image.jpg" class="img-fluid" style="width: 25rem; height:180px"></div>
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