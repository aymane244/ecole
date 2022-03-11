<?php
    include_once "header.php";
    include_once "navbar.php";
    include_once "functions/calendar.php";
    $calendar = new Calendar();
    $images = $data->getImage();
    $id= $_GET['id'];
    foreach($images as $image){
        if($image['sal_id'] == $id){
            $sal_id =$image['sal_id'];
            $sal_nom =$image['sal_nom'];
            $sal_description =$image['sal_desc'];
            $salle_image = $image['sal_image'];
            $salle_service1 = $image['sal_service'];
            $salle_service2 = $image['sal_service2'];
            $salle_service3 = $image['sal_service3'];
            $salle_service4 = $image['sal_service4'];
            $image1 = $image['img1'];
            $image2 = $image['img2'];
            $image3 = $image['img3'];
            $image4 = $image['img4'];
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $sal_nom?></title>
</head>
<body>
    <div class="div-background">
        <div class="container">
            <?php
                echo $calendar->years();
                echo $calendar->months();
                if(isset($_SESSION['status'])){
            ?>
            <div class='alert alert-success text-center mt-2' role='alert'><?php echo $_SESSION['status']?></div>
            <?php
                unset($_SESSION['status']);
                }
            ?>
            <div class="text-center pt-3 text-color">
                <h2 class="pt-4">Location de la <?= $sal_nom?></h2>
                <hr class="hr-width">
            </div>
        </div>
        <div class="container">
            <div class="row mt-4 align-items-center bg-white">
                <div class="col-md-6 py-3">
                    <div class="text-center">
                        <img src="<?= $salle_image?>" alt="" class="img-fluid">
                    </div>
                </div>
                <div class="col-md-6 bg-white py-3">
                    <div class="text-center">
                        <h4 class="text-color"><u>Description de la salle</u></h4>
                        <p class="text-justify mt-3"><?= $sal_description?></p>
                    </div>
                </div>
            </div>
            <div class="text-center pt-3 text-color">
                <h2 class="pt-4">Services</h2>
                <hr class="hr-width">
            </div>
            <div class="d-flex justify-content-around bg-white py-3">
                <div class="font-ckeck-image">
                    <p><i class="fas fa-check"></i><span class="pl-3"><?= $salle_service1?></span> </p>
                    <p><i class="fas fa-check"></i><span class="pl-3"><?= $salle_service2?></span></p>
                </div>
                <div class="font-ckeck-image">
                    <p><i class="fas fa-check"></i><span class="pl-3"><?= $salle_service3?></span></p>
                    <p><i class="fas fa-check"></i><span class="pl-3"><?= $salle_service4?></span></p>
                </div>
            </div>
        </div>
        <div class="container">
            <div id="gallery" class="Gallery">
                <div class="text-center pt-3 text-color mb-3">
                    <h2 class="pt-4">Nos images</h2>
                    <hr class="hr-width">
                </div>
                <div class="row">
                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12">
                        <div class="Gallery-box">
                            <figure>
                                <a href="<?= $image1?>" class="fancybox" rel="ligthbox">
                                    <img src="<?= $image1?>" alt="" class="img-fluid img-width">
                                </a>
                                <span class="hoverle">
                                    <a href="<?= $image1?>" class="fancybox" rel="ligthbox">View</a>
                                </span>
                            </figure>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 thumb">
                        <div class="Gallery-box">
                            <figure>
                                <a href="<?= $image2?>" class="fancybox" rel="ligthbox">
                                    <img src="<?= $image2?>" alt="" class="img-fluid img-width">
                                </a>
                                <span class="hoverle">
                                    <a href="<?= $image2?>" class="fancybox" rel="ligthbox">View</a>
                                </span>
                            </figure>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 thumb">
                        <div class="Gallery-box">
                            <figure>
                                <a href="<?= $image3?>" class="fancybox" rel="ligthbox">
                                    <img src="<?= $image3?>" alt="" class="img-fluid img-width">
                                </a>
                                <span class="hoverle">
                                    <a href="<?= $image3?>" class="fancybox" rel="ligthbox">View</a>
                                </span>
                            </figure>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 thumb">
                        <div class="Gallery-box">
                            <figure>
                                <a href="<?= $image4?>" class="fancybox" rel="ligthbox">
                                    <img src="<?= $image4?>" alt="" class="img-fluid img-width">
                                </a>
                                <span class="hoverle">
                                    <a href="<?= $image4?>" class="fancybox" rel="ligthbox">View</a>
                                </span>
                            </figure>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="text-center pt-3 text-color mb-3">
                <h2 class="pt-4">Réservation de la <?= $sal_nom?></h2>
                <hr class="hr-width">
            </div>
            <div class="container">
                <div id="result"></div>
            </div>
            <div class="row justify-content-center bg-white py-3">
                <div class="col-md-8">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nom">Nom complet</label>
                                <div class="d-flex">
                                    <i class="fas fa-user position-awesome"></i>
                                    <input type="text" class="form-control pl-5" name="reservation_nom" id="reservation_nom" placeholder="Votre nom" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="telephone">Numéro de téléphone</label>
                                <div class="d-flex">
                                    <i class="fas fa-phone position-awesome"></i>
                                    <input type="text" class="form-control pl-5" name="reservation_telephone" id="reservation_telephone" placeholder="Votre numéro de telephone" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Adresse email</label>
                        <div class="d-flex">
                            <i class="fas fa-envelope position-awesome"></i>
                            <input type="email" class="form-control pl-5" id="email_reservation" name="email_reservation" aria-describedby="emailHelp" placeholder="Votre adresse email" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Date de location</label>
                        <div class="d-flex">
                            <i class="fas fa-calendar position-awesome"></i>
                            <input type="datetime-local" class="form-control pl-5" id="date_salle" name="date_salle" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="commentaire_reservation">Votre Commentaire</label>
                        <textarea class="form-control" id="commentaire_reservation" name="commentaire_reservation" rows="6" required></textarea>
                    </div>
                    <div class="text-center">
                        <input type="hidden" name="salle_id" id="salle_id" value="<?= $sal_id?>">
                        <button class="btn btn-primary" id="submit_salle" name="submit_salle" style="border-radius:0 !important">Réserver</button>
                    </div>
                </div>
            </div>
        </div>
        <?php
            include_once "footer.php";
        ?>
    </div>
    <script>
        $(document).ready(function(){
            $("#submit_salle").click(function() {
                var reservation_nom = $("#reservation_nom").val();
                var email_reservation = $("#email_reservation").val();
                var reservation_telephone = $("#reservation_telephone").val();
                var commentaire_reservation = $("#commentaire_reservation").val();
                var salle_id = $("#salle_id").val();
                $.post( "functions/traitement.php",{reservation_nom: reservation_nom, email_reservation: email_reservation, 
                    commentaire_reservation:commentaire_reservation, reservation_telephone:reservation_telephone, salle_id:salle_id, action:'add_reservation'}, function( result ) {
                    $('#result').html(result);
                });
                $("#reservation_nom").val('');
                $("#email_reservation").val('');
                $("#reservation_telephone").val('');
                $("#commentaire_reservation").val('');
            });
        })
    </script>
    <script>
        $(document).ready(function (){
            $(".fancybox").fancybox({
		        maxWidth: 1200,
		        maxHeight: 600,
		        width: '70%',
		        height: '70%',
	        });
        })
    </script>
    <script>
        $(document).ready(function(){
            $(".fancybox").fancybox({
                openEffect: "none",
                closeEffect: "none"
            });
            $(".zoom").hover(function(){
                $(this).addClass('transition');
            },
            function(){
                $(this).removeClass('transition');
            });
        });
    </script>
</body>
</html>
