<?php
    include_once "header.php";
    include_once "navbar_admin.php";
    $data = new Etudiant($db);
    if(!isset($_SESSION['username']) && !isset($_SESSION['pwrd'])){
        echo "<script>window.location.href='login_admin'</script>";
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Salles</title>
</head>
<?php
    $salles = $data->getSalle();
    $images = $data->getImage();
?>
<body>
    <div class="container" id="div-push">
        <?php
            if(isset($_SESSION['status'])){
        ?>
        <div class='alert alert-success text-center mt-2' role='alert'><?php echo $_SESSION['status']?></div>
        <?php
                unset($_SESSION['status']);
            }
        ?>
        <div class="text-center my-3">
            <h2><i class="fas fa-chalkboard-teacher"></i> Page Salles</h2>
        </div>
        <div class="text-center">
            <a href="ajouter-salle" target="_blank" class="btn btn-primary"><i class="fas fa-plus-square"></i> Ajouter une salle</a>
        </div>
        <table class="table table-hover mt-5">
            <thead class="text-center">
                <tr>
                    <th scope="col" colspan="9">ARTL Nord</th>
                </tr>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Salle</th>
                    <th scope="col">Déscription</th>
                    <th scope="col">Prix</th>
                    <th scope="col">Personnes</th>
                    <th scope="col">Image</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody class="text-center">
                <?php
                    $i=1;
                    foreach($salles as $salle){
                ?>
                <tr>
                    <th scope="row"><?php echo $i++ ?></th>
                    <td class="row-style"><?php echo $salle['sal_nom'];?></td>
                    <td class="text-length2"><?php echo $salle['sal_desc'];?></td>
                    <td class="row-style"><?php echo $salle['sal_prix'];?> Dhs</td>
                    <td class="row-style"><?php echo $salle['sal_personne'];?> Personnes</td>
                    <td> <img src="<?php echo $salle['sal_image']?>" alt="" class="img-fluid" class="img-fluid" style="width:12rem; height:180px"> </td>
                    <td class="row-style">
                        <div class="row">
                            <div class="col-md-4">
                                <a href="modifier_salle?id=<?php echo $salle['sal_id'] ?>" target="_blank">
                                    <i class="fas fa-edit text-success awesome-size"></i>
                                </a>
                            </div>
                            <div class="col-md-4">
                                <form action="" method="POST">
                                    <input type="hidden" name="id" value="<?php echo $salle['sal_id']?>">
                                    <button type="submit" class="btn-style" name="submit_salle" onclick='return confirm("Voulez-vous supprimer ce message")'>
                                        <i class="fas fa-trash-alt text-danger awesome-size"></i>
                                    </button>
                                </form>
                            </div>
                            <div class="col-md-4">
                                <a href="ajouter_images?id=<?php echo $salle['sal_id'] ?>" target="_blank">
                                    <i class="fas fa-plus text-success awesome-size"></i>
                                </a>
                            </div>
                        </div>
                    </td>
                </tr>
                <?php
                    }
                ?>
            </tbody>
        </table>
        <h2 class="text-center mt-5">Les images</h2>
        <table class="table table-hover mt-5">
            <thead class="text-center">
                <tr>
                    <th scope="col" colspan="9">ARTL Nord</th>
                </tr>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Salle</th>
                    <th scope="col">Image 1</th>
                    <th scope="col">Image 2</th>
                    <th scope="col">Image 3</th>
                    <th scope="col">Image 4</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody class="text-center">
                <?php
                    $i=1;
                    foreach($images as $image){
                ?>
                <tr>
                    <th scope="row" class="row-style"><?php echo $i++ ?></th>
                    <td class="row-style"><?php echo $image['sal_nom'];?></td>
                    <td><img src="<?php echo $image['img1']?>" alt="" class="img-fluid" style="width:12rem; height:180px"> </td>
                    <td> <img src="<?php echo $image['img2']?>" alt="" class="img-fluid" style="width:12rem; height:180px"> </td>
                    <td> <img src="<?php echo $image['img3']?>" alt="" class="img-fluid" style="width:12rem; height:180px"> </td>
                    <td> <img src="<?php echo $image['img4']?>" alt="" class="img-fluid" style="width:12rem; height:180px"> </td>
                    <td class="row-style">
                        <a href="modifier_image?id=<?php echo $image['img_id'] ?>" target="_blank">
                            <i class="fas fa-edit text-success awesome-size"></i>
                        </a>
                    </td>
                </tr>
                <?php
                    }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>