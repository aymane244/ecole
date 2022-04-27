<?php include_once "session.php";?>
<?php
    $formations = $data->getformation();
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <?php 
            include_once "header.php";  
            include_once "style.php";
            include_once "scripts.php";
        ?>
        <title><?php echo $title['titre'] ?></title>
    </head>
    <body>
        <?php include_once "navbar.php";?>
        <div class="hero" id="top">
            <div class="bg-hero">
                <div class="banner text-white text-center text-fade text-big">
                    <h1 class="h1-size-big"><?php echo $index['banner_1'] ?> <br> <?php echo $index['banner_2'] ?><br>ARTLN</h1>
                    <p class="pt-4 margin-text">
                        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Facilis, sunt at obcaecati. <br>
                        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Facilis, sunt at obcaecati. <br>
                        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Facilis, sunt at obcaecati.
                    </p>
                </div>
                <br><br><br><br><br>
            </div>
        </div>
        <div class="div-background">
            <div class="container">
                <div class="text-center pt-3 text-color">
                    <h1><?php echo $index['main_title'] ?></h1>
                    <h2 class="pt-4"><?php echo $index['academie'] ?></h2>
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
                                <h2><?php echo $index['carte'] ?></h2>
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
                                if($_SESSION['lang'] =="ar"){
                            ?>
                            <p class="text-justify">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Commodi, porro dolor quae hic, 
                                dolorem excepturi deleniti architecto voluptatum voluptas reiciendis provident aliquid, 
                                neque alias maxime repellat corrupti iure? Velit, natus?
                            </p>
                            <?php 
                                }else{
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
                                if($_SESSION['lang'] =="ar"){
                            ?>
                            <p class="text-justify">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Commodi, porro dolor quae hic, 
                                dolorem excepturi deleniti architecto voluptatum voluptas reiciendis provident aliquid, 
                                neque alias maxime repellat corrupti iure? Velit, natus?
                            </p>
                            <?php 
                                }else{
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
                    </div>
                </div>
                <div class="text-center pt-3 text-color">
                    <h2 class="pt-4"><?php echo $index['nosformation'] ?></h2>
                    <hr class="hr-width">
                </div>
                <div class="bg-white pb-4">
                    <div class="container-fluid">
                        <div class="row justify-content-center">
                            <?php
                                foreach($formations as $formation){
                            ?>
                            <div class="col-lg-6 col-md-12">
                                <div class="text-center pt-3 text-color">
                                    <?php 
                                        if($_SESSION['lang'] =="ar"){
                                    ?>
                                    <h2 class="pt-4 text-truncate" data-toggle="tooltip" data-placement="bottom" title="<?php echo $formation['for_nom_arab'] ?>"><?php echo $formation['for_nom_arab'] ?></h2>
                                    <?php 
                                            }else{
                                    ?>
                                    <h2 class="pt-4 text-truncate" data-toggle="tooltip" data-placement="bottom" title="<?php echo $formation['for_nom'] ?>"><?php echo $formation['for_nom'] ?></h2>
                                    <?php         
                                        }
                                    ?>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12 mt-lg-4 col-md-6 col-sm-12">
                                        <img src="<?php echo $formation['for_image']?>" alt="" class="img-fluid" style="width:34rem; height:350px">
                                    </div>
                                    <div class="col-md-6 mt-4 text-justify d-flex col-lg-12 col-sm-12">
                                        <p>
                                        <?php 
                                            if($_SESSION['lang'] =="ar"){
                                                echo $formation['for_pres_arab'];
                                            }else{
                                                echo $formation['for_pres'];
                                            }
                                        ?>
                                        </p>
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
            <div class="div-btn fixed-bottom mb-2 mx-2" id="div-btn">
                <a href="#top" class="btn-top px-3 float-right py-2 rounded"><i class="fas fa-long-arrow-alt-up text-white"></i></a>
            </div>
            <?php include_once "footer.php";?>
        </div>
        <script>
            $(document).ready(function(){
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