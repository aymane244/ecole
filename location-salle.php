<?php include_once "session.php"; ?>
<?php $images = $data->getImage(); ?>
<!DOCTYPE html>
<html lang="en">

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
            min-height: 17rem !important;
        }
        .wrapp {
            overflow: hidden;
            text-overflow: ellipsis;
            display: -webkit-box;
            -webkit-line-clamp: 3;
            /* number of lines to show */
            line-clamp: 3;
            -webkit-box-orient: vertical;
            height: 70px;
        }
    </style>
    <title><?php echo $title['salle'] ?></title>
</head>

<body>
    <?php include_once "navbar.php"; ?>
    <div class="div-background" id="top">
        <div class="text-white text-center text-big div-header">
            <h2><?php echo $salle['location'] ?></h2>
        </div>
        <div style="position:relative">
            <div style="background-color: black;opacity: 0.5;top: 0;left: 0;width: 100%;height: 100%;position: absolute; z-index:2"></div>
            <img src="images/view/classroom.png" alt="" class="d-block img-fluid" style="width:100%;">
        </div>
        <div class="container-fluid mt-5">
            <ul class="card-list">
                <div class="row">
                    <?php
                    foreach ($images as $image) {
                    ?>
                        <div class="col-lg-4 col-md-12">
                            <div class="text-center pt-3">
                                <li class="card">
                                    <a class="card-im" href="salle?nom=<?php echo str_replace(" ", "_", $image['sal_nom'] )?>" style="background-image: url(images/salles/<?php echo $image['sal_image'] ?>);position: relative;">
                                        <div style="background-color:rgba(0,0,0,0.4); z-index: 1;  position:absolute; top:0; left:0; width:100%; height:100%;"></div>
                                    </a>
                                    <h1 class="text-white text-center px-3" style="position: absolute; z-index:4 ; filter: none !important;  margin-top: 100px; margin-left:auto; margin-right:auto; width:100% ">
                                        <a href="salle?nom=<?php echo str_replace(" ", "_", $image['sal_nom']) ?>" class="text-white">
                                            <?php
                                            if ($_SESSION['lang'] == "ar") {
                                                echo $image['sal_nom_arab'];
                                            } else {
                                                echo $image['sal_nom'];
                                            }
                                            ?>
                                        </a>
                                    </h1>
                                    <div class="mt-2 card-description">
                                        <?php
                                            if ($_SESSION['lang'] == "ar") {
                                        ?>
                                        <div class="row align-items-center justify-content-around">
                                            <div dir="rtl" lang="ar" class="col-md-4">
                                                <strong>
                                                    <?php echo $image['sal_prix'] ?> <?php echo $salle['dirhams'] ?> <br>
                                                    <?php echo $image['sal_personne'] ?> <?php echo $salle['personne'] ?>
                                                </strong>
                                            </div>
                                            <div class="wrapp col-md-8" dir="rtl" lang="ar">
                                                <?php echo $image['sal_desc_arab'];?>
                                            </div>              
                                        </div>                     
                                        <?php
                                            } else {
                                        ?>
                                        <div class="row justify-content-around align-items-center">
                                            <div class="wrapp col-md-8">
                                                <?php echo $image['sal_desc'];?>
                                            </div>        
                                            <div class="col-md-4">
                                                <strong>
                                                    <?php echo $image['sal_prix'] ?> <?php echo $salle['dirhams'] ?> <br>
                                                    <?php echo $image['sal_personne'] ?> <?php echo $salle['personne'] ?>
                                                </strong>
                                            </div>
                                        </div>
                                        <?php
                                            }
                                        ?>
                                    </div>
                                    <a href="salle?nom=<?php echo str_replace(" ", "_", $image['sal_nom']) ?>" class="btn btn-dark mx-5 mb-5 "><?php echo $salle['reservez'] ?> </a>
                                </li>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                </div>
            </ul>
            <div class="div-btn fixed-bottom mb-2 mx-2" id="div-btn">
                <a href="#top" class="btn-top px-3 float-right py-2 rounded"><i class="fas fa-long-arrow-alt-up text-white"></i></a>
            </div>
        </div>
        <?php include_once "includes/footer.php"; ?>
    </div>
    </div>
</body>

</html>