<?php
    include_once "header.php";
    include_once "navbar.php";
    setlocale(LC_TIME, "fr_FR");
    $articles = $data->getArticleTitre();
    $lectures = $data->getArticleLimit();
    $commentaires = $data->getComments();
    $id= $_GET['id'];
    foreach($articles as $article){
        if($article['art_id'] == $id){
            $name = $article['art_titre'];
            $text = $article['art_texte'];
            $image = $article['art_image'];
            $date = $article['art_ajout'];
            $number = $article['commentaires'];
            $art_id = $article['art_id'];
        }
    }
?>
<?php
    if(isset($_POST['submit_com'])){
        $data->insertComment();
    }
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?php echo $name?>
    </title>
</head>
<body>
    <div class="div-background py-3">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center">
                <h5>Actualités</h5>
                <h6>
                    <a href="index" class="blog-link">Home </a>/
                    <a href="article" class="blog-link">Actualités </a>/
                    <a href="article" class="home-link"><?php echo $name?></a>
                </h6>
            </div>
        </div>
        <div class="container mt-3">
            <div class="row">
                <div class="col-md-8">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card mt-3 border-0">
                                <h2 class="pt-3 pl-4"><?= $name ?></h2>
                                <p style="color:#BBBBBB" class="pl-4"><i class="fas fa-clock py-3"></i><span> Publié le: <?php echo date("F j, Y",strtotime($date))?></span></p>
                                <div class="text-center mb-3">
                                    <img src="<?php echo $image?>" alt="" class="img-fluid img-article">
                                </div>
                                <p class="pt-3 px-3 text-justify bg-text"><?php echo $text?></p>
                            </div>
                        </div>
                        <div class="col-md-12 mt-3">
                            <h2 class="pl-4 text-center">Les Commentaires</h2>
                            <hr class="hr-width">
                            <div class="pl-5 bg-white py-3">
                                <h4 class=""><?php echo $number ?> Commentaires</h4>
                                <div id="list_comments">
                                    <?php
                                        foreach($commentaires as $commentaire){
                                    ?>
                                    <p class="pl-4 mt-3">
                                        <b><?php echo $commentaire['com_prenom']." ".$commentaire['com_nom']; ?></b> <br>
                                        <span style="color:#BBBBBB"><?php echo date("F j, Y",strtotime($commentaire['com_time']))?></span> <br>
                                        <span class="pl-3"><?php echo $commentaire['com_comentaire'] ?></span>
                                    </p>
                                    <?php
                                        }
                                    ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 mt-3">
                        <div class="text-center pt-3 text-color">
                            <h2 class="text-center">Laissez un commentaire</h2>
                            <hr class="hr-width">
                        </div>
                        <div class="container bg-white py-3">
                            <div class="row justify-content-center">
                                <div class="col-md-8">
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="exampleInputSuje1">Votre Prénom</label>
                                                <div class="d-flex">
                                                    <i class="fas fa-user position-awesome"></i>
                                                    <input type="text" class="form-control pl-5" name="nom" id="contact_noms" placeholder="Votre nom" required>
                                                </div>
                                            </div>
                                        </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="exampleInputSuje1">Votre Nom</label>
                                            <div class="d-flex">
                                                <i class="fas fa-user position-awesome"></i>
                                                <input type="text" class="form-control pl-5" name="prenom" id="contact_prenom" placeholder="Votre prenom" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Votre Commentaire</label>
                                    <textarea class="form-control" id="comments" name="commentaire" rows="6" required></textarea>
                                </div>
                                <div class="text-center">
                                    <input type="hidden" name="article_id" id="article_id" value="<?php echo $art_id ?>">
                                    <button class="btn btn-primary" id="submit" name="submit_com" style="border-radius:0 !important">Ecrire votre commentaire</button>
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
    <script>
        $(document).ready(function(){
            $( "#submit" ).click(function() {
                var nom = $("#contact_noms").val();
                var prenom = $("#contact_prenom").val();
                var article_id = $("#article_id").val();
                var commentaire = $("#comments").val();
                /*$.ajax({url: "demo_test.txt", success: function(result){
                    $("#div1").html(result);
                }});*/
                $.post( "functions/traitement.php",{ article_id:article_id ,nom: nom, prenom: prenom, commentaire:commentaire,action:'add_comment' }, function( result ) {
                    $('#list_comments').html(result);
                });
                /*$("#contact_nom").val('');
                $("#contact_prenom").val('');
                $("#article_id").val('');
                $("#exampleFormControlTextarea1").val('');*/
            });
        })
    </script>
</body>
</html>
