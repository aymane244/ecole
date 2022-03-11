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
    <title>Location des salles</title>
</head>
<?php
    $images = $data->getImage();
?>
<body>
    <div class="div-background">
        <div class="container-fluid">
            <div class="text-center pt-3 text-color">
                <h2 class="pt-4">Location des salles de formation</h2>
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
                                <a href="salle?id=<?php echo $image['sal_id'] ?>"><h5 class="card-title"><?php echo $image['sal_nom']?></h5></a>
                                <div class="d-flex justify-content-between">
                                    <p class="w-75 text-length-2"><?php echo $image['sal_desc']?></p>
                                    <p>
                                        <?php echo $image['sal_prix']?> dhs/jour <br>
                                        <?php echo $image['sal_personne']?> Personnes
                                    </p>
                                </div>
                                <a href="salle?id=<?php echo $image['sal_id'] ?>" class="btn btn-primary rounded-0">Réservez</a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                    }
                ?>
            </div>
            <?php
                include_once "footer.php";
            ?>
        </div>
    </div>
</body>
</html>