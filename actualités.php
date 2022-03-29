<?php include_once "session.php";?>
<?php
    $articles = $data->getArticleComments();
    $lectures = $data->getArticleLimit();
?>
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
        <title><?php echo $title['article'] ?></title>
    </head>
    <body>
        <?php include_once "navbar.php";?>
        <div class="div-background py-3" id="top">
            <div class="container">
                <div class="d-flex justify-content-between align-items-center">
                    <h5><?php echo $artic['actualites'] ?></h5>
                    <h6>
                        <a href="index" class="blog-link"><?php echo $artic['accueil'] ?> </a>/
                        <a href="#" class="home-link"><?php echo $artic['actualites'] ?></a>
                    </h6>
                </div>
            </div>
            <div class="container bg-white py-3 mt-3">
                <hr class="hr-thick">
                <div class="row">
                    <div class="col-md-8">
                        <?php
                            foreach($articles as $article){
                        ?>
                        <div class="card mt-3 border-0">
                            <div class="row align-items-center">
                                <div class="col-md-8 col-sm-8">
                                    <div class="card-body">
                                        <h5 class="card-title pl-4">
                                            <a href="article?id=<?php echo $article['art_id']?>" style="border-radius:0 !important">
                                                <?php 
                                                    if($_SESSION['lang'] =="ar"){
                                                        echo $article['art_titre_arab'];
                                                    }else{
                                                        echo $article['art_titre'];
                                                    } 
                                                ?> 
                                            </a>
                                        </h5>
                                        <p class="pt-3 pl-4 text-length text-justify">
                                            <?php 
                                                if($_SESSION['lang'] =="ar"){
                                                    echo $article['art_texte_arab'];
                                                }else{
                                                    echo $article['art_texte'];
                                                } 
                                            ?>
                                        </p>
                                        <div class="d-flex">
                                            <p style="color:#BBBBBB"><i class="fas fa-clock pt-3 pl-4"></i><span> <?php echo date("F j, Y",strtotime($article['art_ajout']))?></span></p> 
                                            <p style="color:#BBBBBB"><i class="fas fa-comment-dots pt-3 pl-4"></i><span> <?php echo $article['commentaires']?></span></p> 
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-4">
                                    <a href="article?id=<?php echo $article['art_id']?>" style="border-radius:0 !important">
                                        <img src="<?php echo $article['art_image']?>" class="img-fluid" alt="..." style="height:150px;">
                                    </a>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <?php
                            }
                        ?>
                    </div>
                    <div class="col-md-3 ml-5">
                        <div class="div-background">
                            <hr class="hr-thick">
                            <div class="text-center text-color">
                                <h2 class="pt-2"><?php echo $artic['lire'] ?></h2>
                                <hr class="hr-width">
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <?php
                                        foreach($lectures as $lecture){
                                    ?>
                                    <div class="pb-2">
                                        <a href="article?id=<?php echo $lecture['art_id']?>">
                                            <h4 class="pt-3 px-2">
                                                <?php 
                                                    if($_SESSION['lang'] =="ar"){
                                                        echo $lecture['art_titre_arab'];
                                                    }else{
                                                        echo $lecture['art_titre'];
                                                    } 
                                                ?>
                                            </h4>
                                        </a>
                                        <p style="color:#BBBBBB"><i class="fas fa-clock pt-3 pl-4"></i>
                                            <span> <?php echo (date("F j, Y",strtotime($lecture['art_ajout'])))?></span>
                                        </p> 
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
        </div>
        <div class="div-btn fixed-bottom mb-2 mx-2" id="div-btn">
            <a href="#top" class="btn-top px-3 float-right py-2 rounded"><i class="fas fa-long-arrow-alt-up text-white"></i></a>
        </div>
        <?php include_once "footer.php";?>
    </body>
</html>