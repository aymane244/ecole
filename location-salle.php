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
            <div class="container-fluid">
                <div class="text-center pt-3 text-color">
                    <h2 class="pt-4"><?php echo $salle['location'] ?></h2>
                    <hr class="hr-width">
                </div>
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
                                        <div class="col-lg-8">
                                            <p class="text-length-2 text-justify">
                                                <?php 
                                                    if($_SESSION['lang'] =="ar"){
                                                        echo $image['sal_desc_arab'];
                                                    }else{
                                                        echo $image['sal_desc'];
                                                    }
                                                ?>
                                            </p>
                                        </div>
                                        <div class="col-lg-4">
                                            <p>
                                                <?php echo $image['sal_prix']?> <?php echo $salle['dirhams'] ?> <br>
                                                <?php echo $image['sal_personne']?> <?php echo $salle['personne'] ?>
                                            </p>
                                        </div>
                                    </div>
                                    <a href="salle?id=<?php echo $image['sal_id'] ?>" class="btn btn-primary rounded-0"><?php echo $salle['reservez'] ?></a>
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