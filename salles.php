<?php include_once "session.php";?>
<?php
    if(!isset($_SESSION['username']) && !isset($_SESSION['pwrd'])){
        echo "<script>window.location.href='login-admin'</script>";
    }
    $salles = $data->getSalle();
    $images = $data->getImage();
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
        <title>Salles</title>
    </head>
    <body>
        <?php include_once "navbar-admin.php";?>
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
            <div class="mt-4 align-items-center d-flex justify-content-center">
                <input type="button" value="Français" class="btn btn-primary" onclick="frensh()">
                <input type="button" value="Arabe" class="btn btn-primary ml-3" onclick="arabe()">
            </div>
            <div id="frensh">
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
                                        <a href="modifier-salle?id=<?php echo $salle['sal_id'] ?>" target="_blank">
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
                                        <a href="ajouter-images?id=<?php echo $salle['sal_id'] ?>" target="_blank">
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
            </div>
            <div id="arabe" style="display:none">
                <table class="table table-hover mt-5">
                    <thead class="text-center">
                        <tr>
                        <th scope="col" colspan="9">الأكاديمية الجهوية للنقل واللوجستيك بجهة طنجة</th>
                        </tr>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">قاعة</th>
                            <th scope="col">وصف القاعة</th>
                            <th scope="col"> الثمن</th>
                            <th scope="col"> الأشخاص</th>
                            <th scope="col">صور</th>
                            <th scope="col">إجراءات</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        <?php
                            $i=1;
                            foreach($salles as $salle){
                        ?>
                        <tr>
                            <th scope="row"><?php echo $i++ ?></th>
                            <td class="row-style"><?php echo $salle['sal_nom_arab'];?></td>
                            <td class="text-length2"><?php echo $salle['sal_desc_arab'];?></td>
                            <td class="row-style"><?php echo $salle['sal_prix'];?> درهم</td>
                            <td class="row-style"><?php echo $salle['sal_personne'];?> شخص</td>
                            <td> <img src="<?php echo $salle['sal_image']?>" alt="" class="img-fluid" class="img-fluid" style="width:12rem; height:180px"> </td>
                            <td class="row-style">
                                <div class="row">
                                    <div class="col-md-4">
                                        <a href="modifier-salle?id=<?php echo $salle['sal_id'] ?>" target="_blank">
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
                                        <a href="ajouter-images?id=<?php echo $salle['sal_id'] ?>" target="_blank">
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
            </div>
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
                            <a href="modifier-image?id=<?php echo $image['img_id'] ?>" target="_blank">
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