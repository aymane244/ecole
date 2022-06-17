<?php include_once "session.php";?>
<?php $images = $data->getImage();?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <?php 
            include_once "header.php";  
            include_once "style.php";
            include_once "scripts.php";
        ?>
        <title><?php echo $title['salle'] ?></title>
    </head>
    <body>
        <?php include_once "navbar.php";?>
        <div class="div-background" id="top">
            <div class="text-white text-center text-big div-header">
                <h2><?php echo $salle['location'] ?></h2>
            </div>
            <div style="height: 100%; position:relative">
                <div style="background-color: black;opacity: 0.5;top: 0;left: 0;width: 100%;height: 100%;position: absolute; z-index:2"></div>
                <img src="images/rooms.png" alt="" class="d-block img-fluid" style="width:100%;">
            </div>
            <div class="container-fluid mt-5">
                <div class="row">
                    <?php
                        foreach($images as $image){
                    ?>
                    <div class="col-md-4 mt-4">
                        <div class="card-deck">
                            <div class="card">
                                <a href="salle?id=<?php echo $image['sal_id'] ?>"><img src="<?php echo $image['sal_image'] ?>" class="card-img-top" alt="..."  style="height: 300px;"></a>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <a href="salle?id=<?php echo $image['sal_id'] ?>">
                                                <h5 class="card-title">
                                                    <?php 
                                                        if($_SESSION['lang'] =="ar"){
                                                            echo $image['sal_nom_arab'];
                                                        }else{
                                                            echo $image['sal_nom'];
                                                        }
                                                    ?>
                                                </h5>
                                            </a>
                                        </div>
                                        <div class="col-lg-8 text-length-2">
                                            <p class="text-justify">
                                                <?php 
                                                    if($_SESSION['lang'] =="ar"){
                                                        echo $image['sal_desc_arab'];
                                                    }else{
                                                        echo $image['sal_desc'];
                                                    }
                                                ?>
                                            </p>
                                        </div>
                                        <div class="col-lg-4 mt-3">
                                            <p>
                                                <?php echo $image['sal_prix']?> <?php echo $salle['dirhams'] ?> <br>
                                                <?php echo $image['sal_personne']?> <?php echo $salle['personne'] ?>
                                            </p>
                                        </div>
                                    </div>
                                    <a href="salle?id=<?php echo $image['sal_id'] ?>" class="btn btn-primary rounded-0 mt-3"><?php echo $salle['reservez'] ?></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                        }
                    ?>
                    <div class="div-btn fixed-bottom mb-2 mx-2" id="div-btn">
                        <a href="#top" class="btn-top px-3 float-right py-2 rounded"><i class="fas fa-long-arrow-alt-up text-white"></i></a>
                    </div>
                </div>
                <?php include_once "footer.php";?>
            </div>
        </div>
    </body>
</html>