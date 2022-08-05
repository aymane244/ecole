<?php include_once "session.php";?>
<?php
    if(!isset($_GET['titre'])){
        echo "<script>window.location.href='actualités'</script>";
    }
    $articles = $data->getArticleTitre();
    $lectures = $data->getArticleLimit();
    $commentaires = $data->getComments();
    $id= $_GET['titre'];
    foreach($articles as $article){
        $name = $article['art_titre'];
        $text = $article['art_texte'];
        $name_arab = $article['art_titre_arab'];
        $text_arab = $article['art_texte_arab'];
        $image = $article['art_image'];
        $date = $article['art_ajout'];
        $number = $article['commentaires'];
        $art_id = $article['art_id'];
    }
    function date_in_french ($dates){
        $month_name=array("","Janvier","Février","Mars","Avril","Mai","Juin","Juillet","Août","Septembre","Octobre","Novembre","Décembre");
        $split = preg_split('/-/', $dates);
        $year = $split[0];
        $month = round($split[1]);
        $day = round($split[2]);
        return $day .' '. $month_name[$month] .' '. $year;
    }
    function date_in_arabic ($dates){
        $month_name=array("","يناير","فبراير","مارس","أبريل","ماي","يونيو","يوليوز","غشت","شتنبر","أكتوبر","نونبر","دجنبر");
        $split = preg_split('/-/', $dates);
        $year = $split[0];
        $month = round($split[1]);
        $day = round($split[2]);
        return $day .' '. $month_name[$month]. ' '.$year ;
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
        <title>
            <?php 
                if($_SESSION['lang'] =="ar"){
                    echo $name_arab;
                }else{
                    echo $name;
                }
            ?>
        </title>
    </head>
    <body>
        <?php include_once "navbar.php";?>
        <div class="div-background py-3" id='top'>
            <div class="container">
                <div class="d-flex justify-content-between align-items-center">
                    <?php
                        if ($_SESSION['lang'] == "ar") {
                    ?>
                    <h6 dir="rtl" lang="ar">
                        <a href="index" class="blog-link"><?php echo $artic['accueil'] ?> </a>/
                        <a href="actualités" class="blog-link"><?php echo $artic['actualites'] ?> </a>/
                        <a href="article" class="home-link"><?php echo $name_arab; ?></a>
                    </h6>
                    <h5><?php echo $artic['actualites'] ?></h5>
                    <?php
                        } else {
                    ?>
                    <h5><?php echo $artic['actualites'] ?></h5>
                    <h6>
                        <a href="index" class="blog-link"><?php echo $artic['accueil'] ?> </a>/
                        <a href="actualités" class="blog-link"><?php echo $artic['actualites'] ?> </a>/
                        <a href="article" class="home-link"><?php echo $name; ?></a>.
                    </h6>
                    <?php
                        }
                    ?>
                </div>
                <?php
                    if(isset($_SESSION['status'])){
                ?>
                <div class='alert alert-success text-center mt-2' role='alert'><?php echo $_SESSION['status']?></div>
                <?php
                    unset($_SESSION['status']);
                    }
                ?>
            </div>
            <div class="container mt-3">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card mt-3">
                                    <?php
                                        if ($_SESSION['lang'] == "ar") {
                                    ?> 
                                    <h2 class="pt-3 px-4 text-right" dir="rtl" lang="ar"><?php echo $name_arab; ?></h2>
                                    <p style="color:#BBBBBB" class="pr-4 text-right"><span> <?php echo $artic['publie'] ?>: <?php echo date_in_arabic($article['art_ajout'])?></span> <i class="fas fa-clock py-3"></i></p>
                                    <?php
                                        } else {
                                    ?>
                                    <h2 class="pt-3 px-4"><?php echo $name; ?></h2>
                                    <p style="color:#BBBBBB" class="pl-4"><i class="fas fa-clock py-3"></i><span> <?php echo $artic['publie'] ?>: <?php echo date_in_french($article['art_ajout'])?></span></p>
                                    <?php
                                        }
                                    ?>
                                    <div class="text-center mb-3">
                                        <img src="images/articles/<?php echo $image?>" alt="" class="img-fluid img-article">
                                    </div>
                                    <div class="text-justify px-4 bg-text">
                                        <p>
                                            <?php 
                                                if($_SESSION['lang'] =="ar"){
                                                    echo $text_arab;
                                                }else{
                                                    echo $text;
                                                }
                                            ?>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 bg-white py-3 mt-3 card" style="border-radius: 10px; height:100%">
                        <div style="overflow-y: auto; overflow-x:hidden">
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
                                        <a href="article?titre=<?php echo str_replace(" ", "_", $article['art_titre']) ?>">
                                            <?php
                                                if ($_SESSION['lang'] == "ar") {
                                            ?>
                                            <h6 class="pt-3 px-2 text-right" dir="rtl" lang="ar">
                                                <?php echo $lecture['art_titre_arab'];?>
                                            </h6>
                                            <?php
                                                } else {
                                            ?>
                                            <h6 class="pt-3 px-2">
                                                <?php echo $lecture['art_titre'];?>
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
                    <div class="col-md-10 mt-3">
                        <h2 class="pl-4 text-center"><?php echo $artic['Commentaire'] ?></h2>
                        <hr class="hr-width">
                        <div class="pl-5 bg-white py-3">
                            <?php
                                if ($_SESSION['lang'] == "ar") {
                            ?>
                            <h4 dir="rtl" lang="ar" class="text-right pr-3"><?php echo $number ?> <?php echo $artic['Commentaires'] ?> </h4>
                            <?php
                                } else {
                            ?>
                            <h4><?php echo $number ?> <?php echo $artic['Commentaires'] ?></h4>
                            <?php
                                }
                            ?>
                            <div id="list_comments">
                                <?php
                                    if ($_SESSION['lang'] == "ar") {
                                ?>
                                    <?php
                                        foreach($commentaires as $commentaire){
                                    ?>
                                    <div class="row">
                                        <div class="col-md-3 bg-light rounded-left py-2 mt-3 my-2">
                                            <?php
                                                if(isset($_SESSION['username']) && isset($_SESSION['pwd'])){
                                            ?>
                                            <form action="" method="POST">
                                                <input type="hidden" name="comment_id" value="<?php echo $commentaire['com_id'] ?>">
                                                <button type="submit" name="submit_comment" onclick='return confirm("هل تريدون إزالة هذا التعليق")' class="btn-style">
                                                    <i class="fas fa-times" style="font-size:20px"></i>
                                                </button>
                                            </form>
                                            <?php
                                                }
                                            ?>
                                        </div>
                                        <div class="col-md-8 mt-3 text-right bg-light rounded-right py-2 my-2" dir="rtl" lang="ar">
                                            <b><span style="font-size: 17px;" dir="rtl" lang='ar'><?php echo $commentaire['com_nom']." ".$commentaire['com_prenom']; ?></span></b> <br>
                                            <span class="pr-3"><?php echo $commentaire['com_comentaire'] ?></span> <br>
                                            <span style="color:#BBBBBB; font-size: 14px;" class="pr-3"><?php echo date_in_arabic($commentaire['com_time'])?></span>
                                        </div>
                                    </div>
                                    <?php
                                        }
                                    ?>
                                    <?php
                                        } else {
                                    ?>
                                    <?php
                                        foreach($commentaires as $commentaire){
                                    ?>  
                                    <div class="row mr-5">
                                        <div class="col-md-8 bg-light rounded-left py-2 my-2">
                                            <b><span style="font-size: 17px;"><?php echo $commentaire['com_prenom']." ".$commentaire['com_nom']; ?></span></b> <br>
                                            <span class="pl-3"><?php echo $commentaire['com_comentaire'] ?></span> <br>
                                            <span style="color:#BBBBBB; font-size: 14px;" class="pl-3"><?php echo date_in_french($commentaire['com_time'])?></span>
                                        </div>
                                        <div class="col-md-3 bg-light py-2 rounded-right my-2 form-display">
                                            <?php
                                                if(isset($_SESSION['username']) && isset($_SESSION['pwd'])){
                                            ?>
                                            <form action="" method="POST" class="float-right">
                                                <input type="hidden" name="comment_id" value="<?php echo $commentaire['com_id'] ?>">
                                                <button type="submit" name="submit_comment" onclick='return confirm("Voulez-vous supprimer ce commentaire")' class="btn-style">
                                                    <i class="fas fa-times" style="font-size:20px"></i>
                                                </button>
                                            </form>
                                            <?php
                                                }
                                            ?>
                                        </div>
                                    </div>
                                    <?php
                                        }
                                    ?>
                                <?php
                                    }
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-10 mt-3">
                        <div class="text-center pt-3 text-color">
                            <h2 class="text-center"><?php echo $artic['laissez'] ?></h2>
                            <hr class="hr-width">
                        </div>
                        <div class="container bg-white py-3">
                            <?php
                                if($_SESSION['lang'] == 'ar'){
                            ?>
                            <div id='error_arab' lang="ar" dir="rtl"></div>
                            <?php
                                }else{
                            ?>
                            <div id='error'></div>
                            <?php
                                }
                            ?>
                            <?php
                                if($_SESSION['lang'] == 'ar'){
                            ?>
                            <div id="success_arab" dir="rtl" lang="ar"></div>
                            <?php
                                }else{
                            ?>
                            <div id="success"></div>
                            <?php
                                }
                            ?>
                            <div class="row justify-content-center">
                                <div class="col-md-8">
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <?php
                                                    if($_SESSION['lang'] == 'ar'){
                                                ?>
                                                <div lang="ar" dir="rtl" class="text-right">
                                                    <label for="exampleInputSuje1"><?php echo $artic['prenom'] ?></label>
                                                </div>
                                                <div class="float-right">
                                                    <i class="fas fa-user position-awesome-arab"></i>
                                                </div>
                                                <input type="text" class="form-control pr-5 text-right" lang="ar" dir="rtl" name="prenom" id="prenom_comment" placeholder="اسمك الشخصي">
                                                <?php
                                                    }else{
                                                ?>
                                                <label for="exampleInputSuje1"><?php echo $artic['prenom'] ?></label>
                                                <div class="d-flex">
                                                    <i class="fas fa-user position-awesome"></i>
                                                    <input type="text" class="form-control pl-5" name="prenom" id="prenom_comment" placeholder="Votre prenom">
                                                </div>
                                                <?php
                                                    }
                                                ?>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <?php
                                                    if($_SESSION['lang'] == 'ar'){
                                                ?>
                                                <div class="text-right" dir="rtl" lang="ar">
                                                    <label for="exampleInputSuje1"><?php echo $artic['nom'] ?></label>
                                                </div>
                                                <div class="float-right">
                                                    <i class="fas fa-user position-awesome-arab"></i>
                                                </div>
                                                <input type="text" class="form-control pr-5 text-right" dir="rtl" lang="ar" name="nom" id="nom_comment" placeholder="اسمك العائلي">
                                                <?php
                                                    }else{
                                                ?>
                                                <label for="exampleInputSuje1"><?php echo $artic['nom'] ?></label>
                                                <div class="d-flex">
                                                    <i class="fas fa-user position-awesome"></i>
                                                    <input type="text" class="form-control pl-5" name="nom" id="nom_comment" placeholder="Votre nom">
                                                </div>
                                                <?php
                                                    }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <?php
                                            if($_SESSION['lang'] == 'ar'){
                                        ?>
                                        <div class="text-right" dir="rtl" lang="ar">
                                            <label for="exampleFormControlTextarea1"><?php echo $artic['comment'] ?></label>
                                        </div>
                                        <textarea class="form-control text-right" id="comments" name="commentaire" rows="6"></textarea>
                                        <?php
                                            }else{
                                        ?>
                                        <label for="exampleFormControlTextarea1"><?php echo $artic['comment'] ?></label>
                                        <textarea class="form-control" id="comments" name="commentaire" rows="6"></textarea>
                                        <?php
                                            }
                                        ?>
                                    </div>
                                    <div class="text-center">
                                        <input type="hidden" name="article_id" id="article_id" value="<?php echo $art_id ?>">
                                        <button class="btn btn-primary" id="submit_comment" name="submit_com" style="border-radius:0 !important"><?php echo $artic['Ecrire'] ?></button>
                                    </div>
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
        <?php
            include_once "includes/footer.php";
        ?>
        <script>
            $(document).ready(function(){
                $( "#submit_comment" ).click(function() {
                    var nom = $("#nom_comment").val();
                    var prenom = $("#prenom_comment").val();
                    var article_id = $("#article_id").val();
                    var commentaire = $("#comments").val();
                    if(nom == '' && prenom == '' && commentaire == ''){
                        $('#error').show();
                        $('#error_arab').show();
                        $('#error').html('<div class="alert alert-danger text-center mt-2" role="alert">Veuillez remplir tous les champs</div>');
                        $('#error_arab').html('<div class="alert alert-danger text-center mt-2" role="alert">المرجو ملئ جميع الحقول</div>');
                    }else if(nom == ''){
                        $('#error').show();
                        $('#error_arab').show();
                        $('#error').html('<div class="alert alert-danger text-center mt-2" role="alert">Veuillez saisir votre nom</div>');
                        $('#error_arab').html('<div class="alert alert-danger text-center mt-2" role="alert">المرجو إدخال اسمك العائلي</div>');
                    }else if(prenom == ''){
                        $('#error').show();
                        $('#error_arab').show();
                        $('#error').html('<div class="alert alert-danger text-center mt-2" role="alert">Veuillez saisir votre prenom</div>');
                        $('#error_arab').html('<div class="alert alert-danger text-center mt-2" role="alert">المرجو إدخال اسمك الشخصي</div>');
                    }else if(commentaire == ''){
                        $('#error').show();
                        $('#error_arab').show();
                        $('#error').html('<div class="alert alert-danger text-center mt-2" role="alert">Veuillez laisser votre commentaire</div>');
                        $('#error_arab').html('<div class="alert alert-danger text-center mt-2" role="alert">المرجو ترك تعليقكم</div>');
                    }else{
                        $.post( "functions/traitement.php",{ article_id:article_id ,nom: nom, prenom: prenom, commentaire:commentaire,
                            action:'add_comment' }, function( result ) {
                            $('#list_comments').html(result);
                            $('#success').html('<div class="alert alert-success text-center mt-2" role="alert">Commentaire bien enregistré</div>')
                            $('#success_arab').html('<div class="alert alert-success text-center mt-2" role="alert">لقد تم تسجيل تعليقكم</div>')
                            $("#nom_comment").val('');
                            $("#prenom_comment").val('');
                            $("#comments").val('');
                            $('#error').hide();
                            $('#error_arab').hide();
                            setTimeout(cacher, 3000);
                            function cacher(){
                                $('#success').fadeOut()
                            }
                        });
                    }
                });
            })
        </script>
    </body>
</html>
<?php
    if(isset($_POST['submit_comment'])){
        $data->deleteCommentaires($_POST['comment_id']);
    }
?>