<?php include_once "session.php";?>
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
        <div class="div-background">
            <div class="container">
                <div class="text-center pt-3 text-color">
                    <h2 class="pt-4"><?php echo $ARTLN['presentation'] ?></h2>
                    <hr class="hr-width">
                </div>
                <div class="bg-white pb-4">
                    <div class="container-fluid">
                        <div class="row">
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
                        </div>
                        <div class="row">
                            <div class="col-lg-12 mt-3">
                                <h1 class="text-center"><?php echo $ARTLN['historique'] ?></h1>
                            </div>
                        </div>
                        <div class="row align-items-center">
                            <div class="col-md-12 mt-4 col-lg-6">
                                <img src="images/library.jpg" alt="" class="img-fluid">
                            </div>
                            <div class="col-md-12 col-lg-6 mt-4 text-justify">
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
                                        <img src="images/missions.jpg" alt="" class="img-fluid" style="height:400px">
                                    </div>
                                    <div class="col-md-6 mt-4 text-justify d-flex col-lg-12 col-sm-12">
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
                            <div class="col-lg-6 col-md-12">
                                <div class="text-center pt-3 text-color">
                                    <h2 class="pt-4"><?php echo $ARTLN['objectifs'] ?></h2>
                                    <hr class="hr-width">
                                </div>
                                <div class="row">
                                    <div class="col-lg-12 mt-lg-4 col-md-6 col-sm-12">
                                        <img src="images/objectifs.jpg" alt="" class="img-fluid" style="height:400px">
                                    </div>
                                    <div class="col-md-6 mt-4 text-justify d-flex col-lg-12 col-sm-12">
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
                            <div class="col-lg-6 col-md-12">
                                <div class="text-center pt-3 text-color">
                                    <h2 class="pt-4"><?php echo $ARTLN['valeurs'] ?></h2>
                                    <hr class="hr-width">
                                </div>
                                <div class="row">
                                    <div class="col-lg-12 mt-lg-4 col-md-6 col-sm-12">
                                        <img src="images/valeurs.jpg" alt="" class="img-fluid" style="height:400px">
                                    </div>
                                    <div class="col-md-6 mt-4 text-justify d-flex col-lg-12 col-sm-12">
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
                            <div class="col-lg-6 col-md-12">
                                <div class="text-center pt-3 text-color">
                                    <h2 class="pt-4"><?php echo $ARTLN['vision'] ?></h2>
                                    <hr class="hr-width">
                                </div>
                                <div class="row">
                                    <div class="col-lg-12 mt-lg-4 col-md-6 col-sm-12">
                                        <img src="images/visiion.jpg" alt="" class="img-fluid" style="height:400px">
                                    </div>
                                    <div class="col-md-6 mt-4 text-justify d-flex col-lg-12 col-sm-12">
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
                </div>
                <div class="text-center pt-3 text-color">
                    <h2 class="pt-4"><?php echo $ARTLN['organigramme'] ?></h2>
                    <hr class="hr-width">
                </div>
                <div class="bg-white pb-4 bg-height">
                    <div class="content">
                        <figure class="org-chart cf">
                            <ul class="administration">
                                <li>					
                                    <ul class="director">
                                <li>
                                <a href="#" class="organi"><span><?php echo $ARTLN['director'] ?></span></a>
                                <ul class="subdirector">
                                    <li><a href="#" class="organi"><span><?php echo $ARTLN['assistante'] ?></span></a></li>
                                </ul>
                                <ul class="departments cf">								
                                    <li><a href="#" class="organi"><span><?php echo $ARTLN['administration'] ?></span></a></li>
                                    <li class="department dep-a">
                                        <a href="#" class="organi"><span><?php echo $ARTLN['department_a'] ?></span></a>
                                        <ul class="sections">
                                            <li class="section"><a href="#" class="organi"><span><?php echo $ARTLN['section_A1'] ?></span></a></li>
                                            <li class="section"><a href="#" class="organi"><span><?php echo $ARTLN['section_A2'] ?></span></a></li>
                                            <li class="section"><a href="#" class="organi"><span><?php echo $ARTLN['section_A3'] ?></span></a></li>
                                        </ul>
                                    </li>
                                    <li class="department dep-b">
                                        <a href="#" class="organi"><span><?php echo $ARTLN['department_b'] ?></span></a>
                                        <ul class="sections">
                                            <li class="section"><a href="#" class="organi"><span><?php echo $ARTLN['section_B1'] ?></span></a></li>
                                            <li class="section"><a href="#" class="organi"><span><?php echo $ARTLN['section_B2'] ?></span></a></li>
                                            <li class="section"><a href="#" class="organi"><span><?php echo $ARTLN['section_B3'] ?></span></a></li>
                                        </ul>
                                    </li>
                                    <li class="department dep-c">
                                        <a href="#" class="organi"><span><?php echo $ARTLN['department_c'] ?></span></a>
                                        <ul class="sections">
                                            <li class="section"><a href="#" class="organi"><span><?php echo $ARTLN['section_C1'] ?></span></a></li>
                                            <li class="section"><a href="#" class="organi"><span><?php echo $ARTLN['section_C2'] ?></span></a></li>
                                            <li class="section"><a href="#" class="organi"><span><?php echo $ARTLN['section_C3'] ?></span></a></li>
                                        </ul>
                                    </li>
                                    <li class="department dep-d">
                                        <a href="#" class="organi"><span><?php echo $ARTLN['department_d'] ?></span></a>
                                        <ul class="sections">
                                            <li class="section"><a href="#" class="organi"><span><?php echo $ARTLN['section_D1'] ?></span></a></li>
                                            <li class="section"><a href="#" class="organi"><span><?php echo $ARTLN['section_D2'] ?></span></a></li>
                                            <li class="section"><a href="#" class="organi"><span><?php echo $ARTLN['section_D3'] ?></span></a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </ul>
                        </figure>	
                    </div>
                </div>
            </div>
            <div class="div-btn fixed-bottom mb-2 mx-2" id="div-btn">
                <a href="#top" class="btn-top px-3 float-right py-2 rounded"><i class="fas fa-long-arrow-alt-up text-white"></i></a>
            </div>
            <?php include_once "footer.php";?>
        </div>
    </body>
</html>