<?php include_once "session.php";?>
<?php
    if(!isset($_GET['id'])){
        echo "<script>window.location.href='actualités'</script>";
    }
    setlocale(LC_TIME, "fr_FR");
    $articles = $data->getArticleTitre();
    $lectures = $data->getArticleLimit();
    $commentaires = $data->getComments();
    $id= $_GET['id'];
    foreach($articles as $article){
        if($article['art_id'] == $id){
            $name = $article['art_titre'];
            $text = $article['art_texte'];
            $name_arab = $article['art_titre_arab'];
            $text_arab = $article['art_texte_arab'];
            $image = $article['art_image'];
            $date = $article['art_ajout'];
            $number = $article['commentaires'];
            $art_id = $article['art_id'];
        }
    }
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
                    <h5><?php echo $artic['actualites'] ?></h5>
                    <h6>
                        <a href="index" class="blog-link"><?php echo $artic['actualites'] ?> </a>/
                        <a href="article" class="blog-link"><?php echo $artic['accueil'] ?> </a>/
                        <a href="article" class="home-link">
                            <?php 
                                if($_SESSION['lang'] =="ar"){
                                    echo $name_arab;
                                }else{
                                    echo $name;
                                }
                            ?>
                        </a>
                    </h6>
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
                <div class="row">
                    <div class="col-md-8">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card mt-3 border-0">
                                    <h2 class="pt-3 pl-4">
                                        <?php 
                                            if($_SESSION['lang'] =="ar"){
                                                echo $name_arab;
                                            }else{
                                                echo $name;
                                            }
                                        ?>
                                    </h2>
                                    <p style="color:#BBBBBB" class="pl-4"><i class="fas fa-clock py-3"></i><span> <?php echo $artic['publie'] ?>: <?php echo date("F j, Y",strtotime($date))?></span></p>
                                    <div class="text-center mb-3">
                                        <img src="<?php echo $image?>" alt="" class="img-fluid img-article">
                                    </div>
                                    <div class="text-justify px-3 bg-text">
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
                            <div class="col-md-12 mt-3">
                                <h2 class="pl-4 text-center"><?php echo $artic['Commentaire'] ?></h2>
                                <hr class="hr-width">
                                <div class="pl-5 bg-white py-3">
                                    <h4 class=""><?php echo $number ?> <?php echo $artic['Commentaires'] ?></h4>
                                    <div id="list_comments">
                                        <?php
                                            foreach($commentaires as $commentaire){
                                        ?>
                                        <div class="d-flex justify-content-between">
                                            <div class="pl-4 mt-3">
                                                <b><?php echo $commentaire['com_prenom']." ".$commentaire['com_nom']; ?></b> <br>
                                                <span style="color:#BBBBBB"><?php echo date("F j, Y",strtotime($commentaire['com_time']))?></span> <br>
                                                <span class="pl-3"><?php echo $commentaire['com_comentaire'] ?></span>
                                            </div>
                                            <div class="pr-4">
                                                <?php
                                                    if(isset($_SESSION['username']) && isset($_SESSION['pwd'])){
                                                ?>
                                                <form action="" method="POST">
                                                    <input type="hidden" name="comment_id" value="<?php echo $commentaire['com_id'] ?>">
                                                   <button type="submit" name="submit_comment" onclick='return confirm("Voulez-vous supprimer ce commentaire")' class="btn-style">
                                                        <i class="fas fa-times"></i>
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
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 mt-3">
                                <div class="text-center pt-3 text-color">
                                    <h2 class="text-center"><?php echo $artic['laissez'] ?></h2>
                                    <hr class="hr-width">
                                </div>
                                <div class="container bg-white py-3">
                                    <div class="row justify-content-center">
                                        <div class="col-md-8">
                                            <div class="row">
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label for="exampleInputSuje1"><?php echo $artic['prenom'] ?></label>
                                                        <div class="d-flex">
                                                            <i class="fas fa-user position-awesome"></i>
                                                            <input type="text" class="form-control pl-5" name="nom" id="nom_comment" placeholder="Votre nom" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label for="exampleInputSuje1"><?php echo $artic['nom'] ?></label>
                                                        <div class="d-flex">
                                                            <i class="fas fa-user position-awesome"></i>
                                                            <input type="text" class="form-control pl-5" name="prenom" id="prenom_comment" placeholder="Votre prenom" required>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleFormControlTextarea1"><?php echo $artic['comment'] ?></label>
                                                <textarea class="form-control" id="comments" name="commentaire" rows="6" required></textarea>
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
                    <div class="col-md-3 bg-white py-3 mt-3">
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
                                        <a href="article-lecture?id=<?php echo $lecture['art_id']?>">
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
        </div>
        <div class="div-btn fixed-bottom mb-2 mx-2" id="div-btn">
            <a href="#top" class="btn-top px-3 float-right py-2 rounded"><i class="fas fa-long-arrow-alt-up text-white"></i></a>
        </div>      
        <?php
            include_once "footer.php";
        ?>
        <script>
            $(document).ready(function(){
                $( "#submit_comment" ).click(function() {
                    var nom = $("#nom_comment").val();
                    var prenom = $("#prenom_comment").val();
                    var article_id = $("#article_id").val();
                    var commentaire = $("#comments").val();
                    $.post( "functions/traitement.php",{ article_id:article_id ,nom: nom, prenom: prenom, commentaire:commentaire,action:'add_comment' }, function( result ) {
                        $('#list_comments').html(result);
                    });
                    $("#nom_comment").val('');
                    $("#prenom_comment").val('');
                    $("#article_id").val('');
                    $("#comments").val('');
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