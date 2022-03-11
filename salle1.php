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
    <title>Salle 1</title>
</head>
<body>
    <div class="container-fluid">
        <div class="text-center pt-3 text-color">
            <h2 class="pt-4">Location de la salle 1</h2>
            <hr class="hr-width">
        </div>
        <div class="row">
            <div class="col-md-3">
                <img src="images/library.jpg" alt="" class="img-fluid">
            </div>
            <div class="col-md-3">
                <img src="images/library.jpg" alt="" class="img-fluid">
            </div>
            <div class="col-md-3">
                <img src="images/library.jpg" alt="" class="img-fluid">
            </div>
            <div class="col-md-3">
                <img src="images/library.jpg" alt="" class="img-fluid">
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row div-image-padding">
            <div class="col-md-6">
                <div class="text-center">
                    <img src="images/library.jpg" alt="" class="img-fluid">
                </div>
            </div>
            <div class="col-md-6">
                <div class="text-center">
                    <h4 class="text-color"><u>Description de la salle</u></h4>
                    <p class="text-justify mt-lg-5 pl-lg-5 mt-5">Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit commodi ullam delectus temporibus, blanditiis voluptas qui labore illum placeat amet.
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit commodi ullam delectus temporibus, blanditiis voluptas qui labore illum placeat amet.
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit commodi ullam delectus temporibus, blanditiis voluptas qui labore illum placeat amet.
                    </p>
                </div>
            </div>
        </div>
        <div class="text-center pt-3 text-color">
            <h2 class="pt-4">Services</h2>
            <hr class="hr-width">
        </div>
        <div class="d-flex justify-content-around">
            <div class="font-ckeck-image">
                <p><i class="fas fa-check"></i><span class="pl-3">Tables et chaises</span> </p>
                <p><i class="fas fa-check"></i><span class="pl-3">Connexion haut débit par fibre optique</span></p>
                <p><i class="fas fa-check"></i><span class="pl-3">Tableau blanc et feutres</span></p>
                <p><i class="fas fa-check"></i><span class="pl-3">Paper Board</span></p>
            </div>
            <div class="font-ckeck-image">
                <p><i class="fas fa-check"></i><span class="pl-3">Vidéoprojecteur</span></p>
                <p><i class="fas fa-check"></i><span class="pl-3">Climatisation</span></p>
                <p><i class="fas fa-check"></i><span class="pl-3">Micro + Sonorisation</span></p>
                <p><i class="fas fa-check"></i><span class="pl-3">Prises électriques</span></p>
            </div>
        </div>
        <div class="text-center pt-3 text-color mb-3">
            <h2 class="pt-4">Réservation de la salle 1</h2>
            <hr class="hr-width">
        </div>
        <div class="row">
             <div class="col">
                <div class="form-group">
                    <label for="nom">Nom complet</label>
                    <div class="d-flex">
                        <i class="fas fa-user position-awesome"></i>
                        <input type="text" class="form-control pl-5" name="nom" id="contact_nom" placeholder="Votre nom" required>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="telephone">Numéro de téléphone</label>
                    <div class="d-flex">
                        <i class="fas fa-phone position-awesome"></i>
                        <input type="text" class="form-control pl-5" name="telephone" id="contact_telephone" placeholder="Votre numéro de telephone" required>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Adresse email</label>
            <div class="d-flex">
            <i class="fas fa-envelope position-awesome"></i>
                <input type="email" class="form-control pl-5" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Votre adresse email" required>
            </div>
        </div>
        <div class="form-group">
            <label for="exampleFormControlTextarea1">Votre Commentaire</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" name="commentaire" rows="6" required></textarea>
        </div>
        <div class="text-center">
            <button class="btn btn-primary" id="submit" name="submit_com" style="border-radius:0 !important">Réserver</button>
        </div>
    </div>
    <?php
        include_once "footer.php";
    ?>
</body>
</html>