<?php
    include_once "header.php";
    include_once "navbar.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Articles</title>
</head>
<?php
    $articles = $data->getArticleComments();
    $lectures = $data->getArticleLimit();
?>
<body>
    <div class="div-background py-3">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center">
                <h5>Actualités</h5>
                <h6>
                    <a href="index" class="blog-link">Home </a>/
                    <a href="#" class="home-link">Actualités</a>
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
                                    <h5 class="card-title pl-4"><a href="article-lecture?id=<?php echo $article['art_id']?>" style="border-radius:0 !important"><?php echo $article['art_titre']?> </a></h5>
                                    <p class="pt-3 pl-4 text-length text-justify"><?php echo $article['art_texte']?></p>
                                    <div class="d-flex">
                                        <p style="color:#BBBBBB"><i class="fas fa-clock pt-3 pl-4"></i><span> <?php echo date("F j, Y",strtotime($article['art_ajout']))?></span></p> 
                                        <p style="color:#BBBBBB"><i class="fas fa-comment-dots pt-3 pl-4"></i><span> <?php echo $article['commentaires']?></span></p> 
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-4">
                                <a href="article-lecture?id=<?php echo $article['art_id']?>" style="border-radius:0 !important"><img src="<?php echo $article['art_image']?>" class="img-fluid" alt="..." style="height:150px;"></a>
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
                            <h2 class="pt-2">Lire aussi</h2>
                            <hr class="hr-width">
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <?php
                                    foreach($lectures as $lecture){
                                ?>
                                <div class="pb-2">
                                    <a href="article-lecture?id=<?php echo $lecture['art_id']?>"><h4 class="pt-3 px-2"><?php echo $lecture['art_titre']?></h4></a>
                                    <p style="color:#BBBBBB"><i class="fas fa-clock pt-3 pl-4"></i><span> <?php echo (date("F j, Y",strtotime($lecture['art_ajout'])))?></span></p> 
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
    <?php
        include_once "footer.php";
    ?>
    </div>
</body>
</html>