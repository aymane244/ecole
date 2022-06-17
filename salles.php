<?php include_once "session.php"; ?>
<?php
if (!isset($_SESSION['username']) && !isset($_SESSION['pwrd'])) {
    echo "<script>window.location.href='login-admin'</script>";
}
$salles = $data->getSalle();
$images = $data->getImage();
$reservations = $data->getReservations();
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
    <?php include_once "navbar-admin.php"; ?>
    <div class="main-content">
        <header>
            <?php include 'admin.php' ?>
        </header>
        <div class="container-fluid mt-5 pt-5">
            <div class="text-center py-3">
                <h2><i class="fas fa-chalkboard-teacher"></i> Page Salles</h2>
            </div>
            <?php
            if (isset($_SESSION['status'])) {
            ?>
                <div class='alert alert-success text-center mt-2' role='alert'><?php echo $_SESSION['status'] ?></div>
            <?php
                unset($_SESSION['status']);
            }
            ?>
            <?php
            if (isset($_SESSION['status_image'])) {
            ?>
                <div class='alert alert-success text-center mt-2' role='alert'><?php echo $_SESSION['status_image'] ?></div>
            <?php
                unset($_SESSION['status_image']);
            }
            ?>
            <div class="text-center mt-4 d-flex justify-content-center">
                <a href="ajouter-salle" target="_blank" class="btn btn-primary"><i class="fas fa-plus-square"></i> Ajouter une salle</a>
                <!-- <input type="button" value="Réseravtions" class="btn btn-primary ml-3" onclick="reservation()"> -->
            </div>
            <div class="mt-4 align-items-center d-flex justify-content-center">
                <input type="button" value="Français" class="btn btn-primary" onclick="frensh()">
                <input type="button" value="Arabe" class="btn btn-primary ml-3" onclick="arabe()">
            </div>
            <div id="frensh">
                <h2 class="text-center mt-5">Les salles</h2>
                <table class="table bg-white table-bordered">
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
                        if (empty($images)) {
                        ?>
                            <tr>
                                <th scope="row" colspan="9">
                                    <h2>Pas de salles enregistrées veuillez ajouter une salle</h2>
                                </th>
                            </tr>
                            <?php
                        } else {
                            $i = 1;
                            foreach ($images as $image) {
                            ?>
                                <tr>
                                    <th scope="row"><?php echo $i++ ?></th>
                                    <td class="row-style"><?php echo $image['sal_nom']; ?></td>
                                    <td class="text-length2"><?php echo $image['sal_desc']; ?></td>
                                    <td class="row-style"><?php echo $image['sal_prix']; ?> Dhs</td>
                                    <td class="row-style"><?php echo $image['sal_personne']; ?> Personnes</td>
                                    <td> <img src="<?php echo $image['sal_image'] ?>" alt="" class="img-fluid" class="img-fluid" style="width:12rem; height:180px"> </td>
                                    <td class="row-style">
                                        <div class="row">
                                            <div class="col-md-5">
                                                <a href="modifier-salle?id=<?php echo $image['sal_id'] ?>" target="_blank">
                                                    <i class="fas fa-edit text-success awesome-size"></i>
                                                </a>
                                            </div>
                                            <div class="col-md-5">
                                                <form action="" method="POST">
                                                    <input type="hidden" name="id" value="<?php echo $image['sal_id'] ?>">
                                                    <button type="submit" class="btn-style" name="submit_salle" onclick='return confirm("Voulez-vous supprimer cette salle \nATTENTION!! toutes les réservations seront supprimées")'>
                                                        <i class="fas fa-trash-alt text-danger awesome-size"></i>
                                                    </button>
                                                </form>
                                            </div>
                                            <!-- <div class="col-md-4">
                                                <?php
                                                if ($image['sal_id'] == $image['img_salle']) {
                                                    echo '';
                                                } else {
                                                ?>
                                                    <a href="ajouter-images?id=<?php echo $image['sal_id'] ?>" target="_blank">
                                                        <i class="fas fa-plus text-success awesome-size"></i>
                                                    </a>
                                                <?php
                                                }
                                                ?>
                                            </div> -->
                                        </div>
                                    </td>
                                </tr>
                        <?php
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
            <div id="arabe" style="display:none">
                <h2 class="text-center mt-5">Les salles</h2>
                <table class="table bg-white table-bordered">
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
                        if (empty($images)) {
                        ?>
                            <tr>
                                <th scope="row" colspan="9">
                                    <h2>لا توجد غرف مسجلة يرجى إضافة غرفة جديدة</h2>
                                </th>
                            </tr>
                            <?php
                        } else {
                            $i = 1;
                            foreach ($images as $image) {
                            ?>
                                <tr>
                                    <th scope="row"><?php echo $i++ ?></th>
                                    <td class="row-style"><?php echo $image['sal_nom_arab']; ?></td>
                                    <td class="text-length2"><?php echo $image['sal_desc_arab']; ?></td>
                                    <td class="row-style"><?php echo $image['sal_prix']; ?> درهم</td>
                                    <td class="row-style"><?php echo $image['sal_personne']; ?> شخص</td>
                                    <td> <img src="<?php echo $image['sal_image'] ?>" alt="" class="img-fluid" class="img-fluid" style="width:12rem; height:180px"> </td>
                                    <td class="row-style">
                                        <div class="row">
                                            <div class="col-md-5">
                                                <a href="modifier-salle?id=<?php echo $image['sal_id'] ?>" target="_blank">
                                                    <i class="fas fa-edit text-success awesome-size"></i>
                                                </a>
                                            </div>
                                            <div class="col-md-5">
                                                <form action="" method="POST">
                                                    <input type="hidden" name="id" value="<?php echo $image['sal_id'] ?>">
                                                    <button type="submit" class="btn-style" name="submit_salle" onclick='return confirm("Voulez-vous supprimer cette salle \nATTENTION!! toutes les réservations seront supprimées")'>
                                                        <i class="fas fa-trash-alt text-danger awesome-size"></i>
                                                    </button>
                                                </form>
                                            </div>
                                            <!-- <div class="col-md-4">
                                                <?php
                                                if ($image['sal_id'] == $image['img_salle']) {
                                                    echo '';
                                                } else {
                                                ?>
                                                    <a href="ajouter-images?id=<?php echo $image['sal_id'] ?>" target="_blank">
                                                        <i class="fas fa-plus text-success awesome-size"></i>
                                                    </a>
                                                <?php
                                                }
                                                ?>
                                            </div> -->
                                        </div>
                                    </td>
                                </tr>
                        <?php
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
            <div id="reservation">
                <h2 class="text-center mt-5">Les réservations</h2>
                <table class="table bg-white">
                    <thead class="text-center">
                        <tr>
                            <th scope="col" colspan="9">ALT Nord</th>
                        </tr>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Salle</th>
                            <th scope="col">Date</th>
                            <th scope="col">Nom</th>
                            <th scope="col">Email</th>
                            <th scope="col">Telephone</th>
                            <th scope="col">Message</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        <?php
                        if (empty($reservations)) {
                        ?>
                            <tr>
                                <th scope="row" colspan="7">
                                    <h2>Aucune réservation est effectuée</h2>
                                </th>
                            </tr>
                            <?php
                        } else {
                            $i = 1;
                            foreach ($reservations as $reservation) {
                            ?>
                                <tr>
                                    <th scope="row"><?php echo $i++ ?></th>
                                    <td><?php echo $reservation['sal_nom']; ?></td>
                                    <td><?php echo $reservation['res_date'] . " " . $reservation['time_debut'] . " " . $reservation['time_fin']; ?></td>
                                    <td><?php echo $reservation['res_nom']; ?></td>
                                    <td><?php echo $reservation['res_email']; ?></td>
                                    <td><?php echo $reservation['res_telephone']; ?></td>
                                    <td><?php echo $reservation['res_commentaire']; ?></td>
                                    <td class="row-style">
                                        <form action="" method="POST">
                                            <input type="hidden" name="reservation_id" value="<?php echo $reservation['res_id'] ?>">
                                            <input type="hidden" name="salle_id" value="<?php echo $reservation['sal_id'] ?>">
                                            <button type="submit" class="btn-style" name="submit_res" onclick='return confirm("Voulez-vous supprimer cette réservation")'>
                                                <i class="fas fa-trash-alt text-danger awesome-size"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                        <?php
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
            <!-- <div id="images">
                <h2 class="text-center mt-5">Les images</h2>
                <table class="table bg-white table-bordered">
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
                        if (empty($images)) {
                        ?>
                            <tr>
                                <th scope="row" colspan="7">
                                    <h2>Aucune image est ajoutée veuillez ajouter les images des salles</h2>
                                </th>
                            </tr>
                            <?php
                        } else {
                            $i = 1;
                            foreach ($images as $image) {
                            ?>
                                <tr>
                                    <?php
                                    if ($image['img_salle'] == $image['sal_id']) {
                                    ?>
                                        <th scope="row" class="row-style"><?php echo $i++ ?></th>
                                        <td class="row-style"><?php echo $image['sal_nom']; ?></td>
                                        <td><img src="<?php echo $image['img1'] ?>" alt="" class="img-fluid" style="width:12rem; height:180px"> </td>
                                        <td> <img src="<?php echo $image['img2'] ?>" alt="" class="img-fluid" style="width:12rem; height:180px"> </td>
                                        <td> <img src="<?php echo $image['img3'] ?>" alt="" class="img-fluid" style="width:12rem; height:180px"> </td>
                                        <td> <img src="<?php echo $image['img4'] ?>" alt="" class="img-fluid" style="width:12rem; height:180px"> </td>
                                        <td class="row-style">
                                            <a href="modifier-image?id=<?php echo $image['img_id'] ?>" target="_blank">
                                                <i class="fas fa-edit text-success awesome-size"></i>
                                            </a>
                                        </td>
                                    <?php
                                    } else {
                                    ?>
                                        <th scope="row" class="row-style"><?php echo $i++ ?></th>
                                        <td class="row-style"><?php echo $image['sal_nom']; ?></td>
                                        <th scope="row" colspan="6">Aucune image insérer</th>
                                    <?php
                                    }
                                    ?>
                                </tr>
                        <?php
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div> -->
        </div>
    </div>
</body>

</html>
<?php
if (isset($_POST['submit_salle'])) {
    $data->deleteSalle($_POST['id']);
}
if (isset($_POST['submit_res'])) {
    $data->deleteReservations($_POST['reservation_id']);
}
?>