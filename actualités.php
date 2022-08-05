<?php include_once "session.php"; ?>
<?php
$articles = $data->getArticleComments();
$lectures = $data->getArticleLimit();
function date_in_french ($date){
    $month_name=array("","Janvier","Février","Mars","Avril","Mai","Juin","Juillet","Août","Septembre","Octobre","Novembre","Décembre");
    $split = preg_split('/-/', $date);
    $year = $split[0];
    $month = round($split[1]);
    $day = round($split[2]);
    return $day .' '. $month_name[$month] .' '. $year;
}
function date_in_arabic ($date){
    $month_name=array("","يناير","فبراير","مارس","أبريل","ماي","يونيو","يوليوز","غشت","شتنبر","أكتوبر","نونبر","دجنبر");
    $split = preg_split('/-/', $date);
    $year = $split[0];
    $month = round($split[1]);
    $day = round($split[2]);
    return $year .' '. $month_name[$month] .' '. $day;
}
?>
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
    <style>
        .card {
            width: 100% !important;
            font-size: 1rem;
            text-decoration: none;
            overflow: hidden;
        }
        .card-im {
            min-height: 17rem !important;
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
    <title><?php echo $title['article'] ?></title>
</head>

<body>
    <?php include_once "navbar.php"; ?>
    <div class="div-background pb-3" id="top">
        <div class="text-white text-center text-big div-header">
            <h1><?php echo $artic['actualites'] ?></h1>
        </div>
        <div style=" position:relative">
            <div style="background-color: black;opacity: 0.7;top: 0;left: 0;width: 100%;height: 100%;position: absolute; z-index:2"></div>
            <img src="images/view/actualite.png" alt="" class="d-block img-fluid" style="width:100%;">
        </div>
        <div class="container mt-5">
            <div class="d-flex justify-content-between align-items-center">
                <?php
                    if ($_SESSION['lang'] == "ar") {
                ?>
                <h6 dir="rtl" lang="ar">
                    <a href="index" class="blog-link"><?php echo $artic['accueil'] ?> </a>/
                    <a href="#" class="home-link"><?php echo $artic['actualites'] ?></a>
                </h6>
                <h5><?php echo $artic['actualites'] ?></h5>
                <?php
                    }else{
                ?>
                <h5><?php echo $artic['actualites'] ?></h5>
                <h6>
                    <a href="index" class="blog-link"><?php echo $artic['accueil'] ?> </a>/
                    <a href="#" class="home-link"><?php echo $artic['actualites'] ?></a>
                </h6>
                <?php 
                    }
                ?>
            </div>
        </div>
        <div class="container py-3 mt-3">
            <div class="row">
                <div class="col-md-8 mt-3">
                    <div class="card-list">
                        <div class="row justify-content-center">
                            <?php
                                foreach ($articles as $article) {
                            ?>
                            <div class="col-md-6 mb-2">
                                <div class="card pb-4">
                                    <a class="card-im" href="article?titre=<?php echo str_replace(" ", "_", $article['art_titre']) ?>" style="background-image: url(images/articles/<?php echo $article['art_image'] ?>);position: relative;">
                                        <!-- <div style="background-color:rgba(0,0,0,0.4); z-index: 1;  position:absolute; top:0; left:0; width:100%; height:100%;"></div> -->
                                    </a>
                                    <a href="article?titre=<?php echo str_replace(" ", "_", $article['art_titre']) ?>" class="text-white">
                                    <p class="text-white py-3 w-100 text-truncate px-2 position-margin" style="position: absolute; z-index:4 ; background-color:rgba(000,000,000,0.5);">
                                        <strong>
                                        <?php
                                            if ($_SESSION['lang'] == "ar") {
                                                echo $article['art_titre_arab'];
                                            } else {
                                                echo $article['art_titre'];
                                            }
                                        ?>
                                        </strong>
                                    </p>
                                    </a>
                                    <div class="card-description px-3 wrapp mt-2">
                                        <?php
                                            if ($_SESSION['lang'] == "ar") {
                                        ?>
                                        <p class="">
                                            <a href="article?titre=<?php echo str_replace(" ", "_", $article['art_titre']) ?>" style="color: black;">
                                                <?php echo $article['art_texte_arab']; ?>
                                            </a>
                                        </p>
                                        <?php
                                            } else {
                                        ?>
                                        <p>
                                            <a href="article?titre=<?php echo str_replace(" ", "_", $article['art_titre']) ?>" style="color: black;">
                                                <?php echo $article['art_texte']; ?>
                                            </a>
                                        </p>
                                        <?php
                                            }
                                        ?>
                                    </div>
                                    <!-- <?php
                                        if ($_SESSION['lang'] == "ar") {
                                    ?>
                                    <div class="d-flex">
                                        <p style="color:#BBBBBB"><i class="fas fa-clock pl-3"></i><span> <?php echo date_in_arabic($article['art_ajout']) ?></span></p>
                                        <p style="color:#BBBBBB"><i class="fas fa-comment-dots pl-3"></i><span> <?php echo $article['commentaires'] ?></span></p>
                                    </div>
                                    <?php
                                        } else {
                                    ?>
                                    <div class="d-flex">
                                        <p style="color:#BBBBBB"><i class="fas fa-clock pl-3"></i><span> <?php echo date_in_french($article['art_ajout']) ?></span></p>
                                        <p style="color:#BBBBBB"><i class="fas fa-comment-dots pl-3"></i><span> <?php echo $article['commentaires'] ?></span></p>
                                    </div>
                                    <?php
                                        }
                                    ?> -->
                                </div>
                            </div>
                            <?php
                                }
                            ?>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 bg-white border mt-3" style="border-radius: 10px; height:406px; overflow-y: auto; overflow-x:hidden;">
                    <div class="mt-4" style=" height:100%">
                        <div class="text-center text-color">
                            <h2 class="pt-2"><?php echo $artic['lire'] ?></h2>
                            <hr class="hr-width">
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <?php
                                    foreach ($lectures as $lecture) {
                                ?>
                                <div class="pb-2">
                                    <a href="article?titre=<?php echo str_replace(" ", "_", $article['art_titre']) ?>">
                                        <?php
                                            if ($_SESSION['lang'] == "ar") {
                                        ?>
                                        <h6 class="pt-3 px-2 text-right" dir="rtl" lang="ar">
                                            <?php echo $lecture['art_titre_arab']; ?>
                                        </h6>
                                        <?php
                                            } else {
                                        ?>
                                        <h6 class="pt-3 px-2">
                                            <?php echo $lecture['art_titre']; ?>
                                        </h6>
                                        <?php
                                            }
                                        ?>
                                    </a>
                                </div>
                                <hr class="w-75">
                                <?php
                                    }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="div-btn fixed-bottom mb-2 mx-2" id="div-btn">
            <a href="#top" class="btn-top px-3 float-right py-2 rounded"><i class="fas fa-long-arrow-alt-up text-white"></i></a>
        </div>
        <?php include_once "includes/footer.php"; ?>
    </div>
</body>

</html>