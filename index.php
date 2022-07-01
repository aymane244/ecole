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
    include_once "header.php";
    include_once "style.php";
    include_once "scripts.php";
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
        .card:hover {
            transform: translateY(-0.5rem) scale(1.0125);
            box-shadow: 0 0.5em 3rem -1rem rgba(0, 0, 0, 0.5);
        }
    </style>
    <title><?php echo $title['titre'] ?></title>
</head>

<body>
    <div id="top"></div>
    <?php include_once "navbar.php"; ?>
    <div class="text-white text-center text-fade text-big div-header">
        <h1 class="h1-size-big"><?php echo $index['banner_1'] ?> <br> <?php echo $index['banner_2'] ?><br>ARTLN</h1>
        <p class="pt-4 margin-text">
            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Facilis, sunt at obcaecati. <br>
            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Facilis, sunt at obcaecati. <br>
            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Facilis, sunt at obcaecati.
        </p>
        <section id="section07" class="demo">
            <a href="#academie"><span></span><span></span><span></span></a>
        </section>
    </div>
    <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel" style="position:relative">
        <div class="carousel-inner">
            <div class="carousel-item active" style="height:100%">
                <div style="background-color: black;opacity: 0.5;top: 0;left: 0;width: 100%;height: 100%;position: absolute; z-index:2"></div>
                <img src="images/entropot.jpg" class="d-block img-fluid" alt="first" style="width:100%; height:500px;">
            </div>
            <div class="carousel-item" style="height:100%">
                <div style="background-color: black;opacity: 0.5;top: 0;left: 0;width: 100%;height: 100%;position: absolute; z-index:2"></div>
                <img src="images/seb.jpg" class="d-block img-fluid" alt="second" style="width:100%; height:500px;">
            </div>
            <div class="carousel-item" style="height:100%">
                <div style="background-color: black;opacity: 0.5;top: 0;left: 0;width: 100%;height: 100%;position: absolute; z-index:2"></div>
                <img src="images/camions.png" class="d-block img-fluid" alt="third" style="width:100%; height:500px;">
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
                    <div class="row">
                        <div class="col-md-12 mt-4 col-lg-6">
                            <img src="images/library.jpg" alt="" class="img-fluid">
                        </div>
                        <div class="col-md-12 col-lg-6 mt-4 text-justify d-flex align-items-center">
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
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="bg-choisir rounded px-3 mt-4 text-center pt-3">
                <h2 class="text-white"><?php echo $index['pourquoi'] ?></h2>
                <p class="text-white">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Commodi, porro dolor quae hic,
                    dolorem excepturi deleniti architecto voluptatum voluptas reiciendis provident aliquid,
                    neque alias maxime repellat corrupti iure? Velit, natus?
                </p>
                <div class="row">
                    <div class="col-lg-4 mt-2">
                        <div class="border bg-white py-3">
                            <div class="py-3"><i class="fas fa-award awesome-font pt-2"></i></div>
                            <h2><?php echo $index['qualite'] ?></h2>
                            <p class="">
                                Consequuntur sunt aut quasi enim aliquam quae harum pariatur laboris nisi ut aliquip
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-4 mt-2">
                        <div class="border bg-white py-3">
                            <div class="py-3"><i class="fas fa-user-tie awesome-font pt-2"></i></div>
                            <h2><?php echo $index['profes'] ?></h2>
                            <p>
                                Consequuntur sunt aut quasi enim aliquam quae harum pariatur laboris nisi ut aliquip
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-4 mt-2">
                        <div class="border bg-white py-3">
                            <div class="py-3"><i class="fas fa-address-card awesome-font pt-2"></i></div>
                            <h3><?php echo $index['carte'] ?></h3>
                            <p>
                                Consequuntur sunt aut quasi enim aliquam quae harum pariatur laboris nisi ut aliquip
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
            <div class="bg-white py-4 px-3">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="pb-3 text-center"><i class="fas fa-leaf awesome-font pt-2"></i></div>
                        <h3 class="text-center"><?php echo $index['formation'] ?></h3>
                        <p class="text-justify">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Commodi, porro dolor quae hic,
                            dolorem excepturi deleniti architecto voluptatum voluptas reiciendis provident aliquid,
                            neque alias maxime repellat corrupti iure? Velit, natus?
                        </p>
                    </div>
                    <div class="col-lg-3">
                        <div class="pb-3 text-center"><i class="fas fa-file awesome-font pt-2"></i></div>
                        <h3 class="text-center"><?php echo $index['certificat'] ?></h3>
                        <?php
                        if ($_SESSION['lang'] == "ar") {
                        ?>
                            <p class="text-justify">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Commodi, porro dolor quae hic,
                                dolorem excepturi deleniti architecto voluptatum voluptas reiciendis provident aliquid,
                                neque alias maxime repellat corrupti iure? Velit, natus?
                            </p>
                        <?php
                        } else {
                        ?>
                            <p class="text-justify text-padding">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Commodi, porro dolor quae hic,
                                dolorem excepturi deleniti architecto voluptatum voluptas reiciendis provident aliquid,
                                neque alias maxime repellat corrupti iure? Velit, natus?
                            </p>
                        <?php
                        }
                        ?>
                    </div>
                    <div class="col-lg-3">
                        <div class="pb-3 text-center"><i class="far fa-file-alt awesome-font pt-2"></i></div>
                        <h3 class="text-center"><?php echo $index['douane'] ?></h3>
                        <p class="text-justify text-padding-2">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Commodi, porro dolor quae hic,
                            dolorem excepturi deleniti architecto voluptatum voluptas reiciendis provident aliquid,
                            neque alias maxime repellat corrupti iure? Velit, natus?
                        </p>
                    </div>
                    <div class="col-lg-3">
                        <div class="pb-3 text-center"><i class="fas fa-laptop awesome-font pt-2"></i></div>
                        <h3 class="text-center"><?php echo $index['location'] ?></h3>
                        <?php
                        if ($_SESSION['lang'] == "ar") {
                        ?>
                            <p class="text-justify">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Commodi, porro dolor quae hic,
                                dolorem excepturi deleniti architecto voluptatum voluptas reiciendis provident aliquid,
                                neque alias maxime repellat corrupti iure? Velit, natus?
                            </p>
                        <?php
                        } else {
                        ?>
                            <p class="text-justify">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Commodi, porro dolor quae hic,
                                dolorem excepturi deleniti architecto voluptatum voluptas reiciendis provident aliquid,
                                neque alias maxime repellat corrupti iure? Velit, natus?
                            </p>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
            <div class="text-center pt-3 text-color">
                <h2 class="pt-4"><?php echo $index['nosformation'] ?></h2>
                <hr class="hr-width">
            </div>
            <div class="container">
                <div class="card-list">
                    <div class="row">
                        <?php
                        foreach ($formations as $formation) {
                        ?>
                            <div class="col-lg-6 col-md-12">
                                <div class="text-center pt-3">
                                    <li class="card">
                                        <a class="card-im"  href="formation?id=<?php echo $formation['for_id']?>" style="background-image: url(images/camion.png);position: relative;">
                                            <div style="background-color:rgba(0,0,0,0.4); z-index: 1;  position:absolute; top:0; left:0; width:100%; height:100%;"></div>
                                        </a>
                                        <h1 class="text-white text-center px-3" style="position: absolute; z-index:4 ; filter: none !important;  margin-top: 80px; margin-left:auto; margin-right:auto; width:100% ">
                                        <a href="formation?id=<?php echo $formation['for_id']?>" class="text-white">
                                           <?php
                                            if ($_SESSION['lang'] == "ar") {
                                                echo $formation['for_nom_arab'];
                                            } else {
                                                echo $formation['for_nom'];
                                            }
                                            ?>
                                            </a>
                                        </h1>
                                        <a class="card-description pb-5" href="formation?id=<?php echo $formation['for_id'] ?>"  target="_blank">
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
                                        <a href="formation?id=<?php echo $formation['for_id']?>" class="btn btn-dark mx-5 mb-5 " >Inscrire</a>
                                    </li>
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
                    <div class="slide"><img src="images/library.jpg" class="img-fluid" style="width: 25rem;"></div>
                    <div class="slide"><img src="images/library.jpg" class="img-fluid" style="width: 25rem;"></div>
                    <div class="slide"><img src="images/library.jpg" class="img-fluid" style="width: 25rem;"></div>
                    <div class="slide"><img src="images/library.jpg" class="img-fluid" style="width: 25rem;"></div>
                    <div class="slide"><img src="images/library.jpg" class="img-fluid" style="width: 25rem;"></div>
                    <div class="slide"><img src="images/library.jpg" class="img-fluid" style="width: 25rem;"></div>
                    <div class="slide"><img src="images/library.jpg" class="img-fluid" style="width: 25rem;"></div>
                    <div class="slide"><img src="images/library.jpg" class="img-fluid" style="width: 25rem;"></div>
                    <div class="slide"><img src="images/library.jpg" class="img-fluid" style="width: 25rem;"></div>
                    <div class="slide"><img src="images/library.jpg" class="img-fluid" style="width: 25rem;"></div>
                    <div class="slide"><img src="images/library.jpg" class="img-fluid" style="width: 25rem;"></div>
                    <div class="slide"><img src="images/library.jpg" class="img-fluid" style="width: 25rem;"></div>
                    <div class="slide"><img src="images/library.jpg" class="img-fluid" style="width: 25rem;"></div>
                </div>
            </div>
        </div>
        <div class="fixed-bottom mb-2 mx-2" id="div-btn" style="display: none;">
            <a href="#top" class="btn-top px-3 float-right py-2 rounded"><i class="fas fa-long-arrow-alt-up text-white"></i></a>
        </div>
        <?php include_once "footer.php"; ?>
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