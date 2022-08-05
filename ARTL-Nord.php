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
                <img src="images/view/office_11zon.jpg" alt="" class="d-block img-fluid" style="width:100%;">
            </div>
            <div class="container mt-5">
                <div class="text-center pt-3 text-color">
                    <h2 class="pt-4"><?php echo $ARTLN['historique'] ?></h2>
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
                        <div class="row align-items-center">
                            <?php
                                if($_SESSION['lang'] == 'ar'){
                            ?>
                            <div class="col-md-12 col-lg-6 mt-4 text-justify">
                                <p class="text-right" dir='rtl' lang='ar'>
                                    <?php echo $ARTLN['historique_text_1'] ?>
                                    <br><br>
                                    <?php echo $ARTLN['historique_text_2'] ?>
                                </p>
                            </div>
                            <div class="col-md-12 mt-4 col-lg-6">
                                <img src="images/view/logo.jpeg" alt="" class="img-fluid">
                            </div>
                            <?php
                                }else{
                            ?>
                            <div class="col-md-12 mt-4 col-lg-6">
                                <img src="images/view/logo.jpeg" alt="" class="img-fluid">
                            </div>
                            <div class="col-md-12 col-lg-6 mt-4 text-justify">                             
                                <p>
                                    <?php echo $ARTLN['historique_text_1'] ?>
                                    <br><br>
                                    <?php echo $ARTLN['historique_text_2'] ?>
                                </p>
                            </div>
                            <?php       
                                }
                            ?>
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
                                        <?php
                                            if($_SESSION['lang'] == 'ar'){
                                        ?>
                                        <p class="text-right" dir='rtl' lang='ar'>
                                            <?php echo $ARTLN['missions_text_1'] ?>
                                            <br><br>
                                            <?php echo $ARTLN['missions_text_2'] ?>
                                        </p>
                                        <?php
                                            }else{
                                        ?>
                                        <p>
                                            <?php echo $ARTLN['missions_text_1'] ?>
                                            <br><br>
                                            <?php echo $ARTLN['missions_text_2'] ?>
                                        </p>
                                        <?php       
                                            }
                                        ?>
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
                                        <?php
                                            if($_SESSION['lang'] == 'ar'){
                                        ?>
                                        <p class="text-right" dir='rtl' lang='ar' style="line-height: 1.7em">
                                            <?php echo $ARTLN['objectifs_text_1'] ?>
                                        </p>
                                        <?php
                                            }else{
                                        ?>
                                        <p style="line-height: 1.7em">
                                            <?php echo $ARTLN['objectifs_text_1'] ?>
                                        </p>
                                        <?php       
                                            }
                                        ?>
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
                                        <?php
                                            if($_SESSION['lang'] == 'ar'){
                                        ?>
                                        <ul dir='rtl' lang='ar'>
                                            <li><?php echo $ARTLN['valeurs_text_1'] ?></li>
                                            <li><?php echo $ARTLN['valeurs_text_2'] ?></li>
                                            <li><?php echo $ARTLN['valeurs_text_3'] ?></li>
                                        </ul>
                                        <?php
                                            }else{
                                        ?>
                                        <ul>
                                            <li><?php echo $ARTLN['valeurs_text_1'] ?></li>
                                            <li><?php echo $ARTLN['valeurs_text_2'] ?></li>
                                            <li><?php echo $ARTLN['valeurs_text_3'] ?></li>
                                        </ul>
                                        <?php       
                                            }
                                        ?>
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
                                        <?php
                                            if($_SESSION['lang'] == 'ar'){
                                        ?>
                                        <p class="text-right" dir='rtl' lang='ar'style="line-height:1.7em ">
                                            <?php echo $ARTLN['vision_text_1'] ?>
                                        </p>
                                        <?php
                                            }else{
                                        ?>
                                        <p>
                                            <?php echo $ARTLN['vision_text_1'] ?>
                                        </p>
                                        <?php       
                                            }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="text-center pt-3 text-color">
                    <h2 class="pt-4"><?php echo $ARTLN['qualite'] ?></h2>
                    <hr class="hr-width">
                </div>
                <div class="bg-white pb-4">
                    <div class="container-fluid">
                        <div class="row align-items-center">
                            <div class="col-md-12 mt-4 col-lg-6">
                                <img src="images/view/iso-certification.png" alt="" class="img-fluid">
                            </div>
                            <div class="col-md-12 col-lg-6 mt-4 text-justify">
                                <?php
                                    if($_SESSION['lang'] == 'ar'){
                                ?>
                                <p class="text-right" dir='rtl' lang='ar'>
                                    <?php echo $ARTLN['qualite_text_1'] ?>
                                    <br><br>
                                    <?php echo $ARTLN['qualite_text_2'] ?>
                                </p>
                                <?php
                                    }else{
                                ?>
                                <p>
                                    <?php echo $ARTLN['qualite_text_1'] ?>
                                    <br><br>
                                    <?php echo $ARTLN['qualite_text_2'] ?>
                                </p>
                                <?php       
                                    }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="text-center pt-3 text-color organigram">
                    <h2 class="pt-4"><?php echo $ARTLN['organigramme'] ?></h2>
                    <hr class="hr-width">
                </div>
                <div class="bg-white pb-4 pt-2 text-center organigram">
                    <?php
                        if($_SESSION['lang'] == 'ar'){
                    ?>
                    <img src="images/view/translation.png" alt="" class="img-fluid">
                    <?php
                        }else{
                    ?>
                    <img src="images/view/organigramme.png" alt="" class="img-fluid">
                    <?php       
                        }
                    ?>
                </div>
            </div>
            <div class="div-btn fixed-bottom mb-2 mx-2" id="div-btn">
                <a href="#top" class="btn-top px-3 float-right py-2 rounded"><i class="fas fa-long-arrow-alt-up text-white"></i></a>
            </div>
            <?php include_once "includes/footer.php";?>
        </div>
    </body>
</html>