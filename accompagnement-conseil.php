<?php include_once "session.php"; ?>
<?php
if (!isset($_SESSION['username']) && !isset($_SESSION['pwrd'])) {
    echo "<script>window.location.href='login-admin'</script>";
}
$iso = $data->getiso();
$douane = $data->getdouane();
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
    <title>Accompagnemet & Conseil</title>
</head>

<body>
    <?php include_once "navbar-admin.php"; ?>
    <div class="main-content">
        <header>
            <?php include 'admin.php' ?>
        </header>
        <div class="m-5 pt-5">
            <div class="text-center py-3">
                <h2><i class="fas fa-question"></i> Page Accompagenment & conseil</h2>
            </div>
            <?php
            if (isset($_SESSION['status'])) {
            ?>
                <div class='alert alert-success text-center mt-2' role='alert'><?php echo $_SESSION['status'] ?></div>
            <?php
                unset($_SESSION['status']);
            }
            ?>
            <div class="mt-4 align-items-center d-flex justify-content-center mb-4">
                <input type="button" class="btn btn-primary" onclick="ISO()" value=" Accompagenement ISO">
                <input type="button" class="btn btn-primary ml-3" onclick="douane()" value="Catégorisation Douane">
            </div>
            <div id="iso">
                <!--<div class="mt-4 align-items-center">
                        <a href="ajouter-article" target="_blank" class="btn btn-primary">
                            <i class="far fa-share-square"></i> Envoyer un email
                        </a>
                    </div>-->
                <table class="table bg-white mt-5 table-bordered">
                    <thead class="text-center text-white" style="background-color: #11101d;">
                        <tr>
                            <th scope="col" colspan="9">ARTL Nord</th>
                        </tr>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nom</th>
                            <th scope="col">Email</th>
                            <th scope="col">ISO</th>
                            <th scope="col">Message</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        <?php
                        if (empty($iso)) {
                        ?>
                            <tr>
                                <th scope="row" colspan="6">
                                    <h2>Pas de demande</h2>
                                </th>
                            </tr>
                            <?php
                        } else {
                            $i = 1;
                            foreach ($iso as $item) {
                            ?>
                                <tr>
                                    <th scope="row"><?php echo $i++ ?></th>
                                    <td><?php echo $item['iso_res_nom']; ?></td>
                                    <td><?php echo $item['iso_res_email']; ?></td>
                                    <td><?php echo $item['iso_nom']; ?></td>
                                    <td><?php echo $item['iso_res_message']; ?></td>
                                    <td>
                                        <form action="" method="POST">
                                            <input type="hidden" name="iso_id" value="<?php echo $item['iso_id'] ?>">
                                            <button type="submit" class="btn-style" name="submit_iso" onclick='return confirm("Voulez-vous supprimer cette demande")'>
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
            <div id="douane" style="display:none;">
                <!--<div class="mt-4 align-items-center">
                        <a href="ajouter-article" target="_blank" class="btn btn-primary">
                            <i class="far fa-share-square"></i> Envoyer un email
                        </a>
                    </div>-->
                <table class="table bg-white mt-5 table-bordered">
                    <thead class="text-center text-white" style="background-color: #11101d;">
                        <tr>
                            <th scope="col" colspan="9">ARTL Nord</th>
                        </tr>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nom</th>
                            <th scope="col">Email</th>
                            <th scope="col">Douane</th>
                            <th scope="col">Message</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        <?php
                        if (empty($douane)) {
                        ?>
                            <tr>
                                <th scope="row" colspan="6">
                                    <h2>Pas de demande</h2>
                                </th>
                            </tr>
                            <?php
                        } else {
                            $i = 1;
                            foreach ($douane as $item) {
                            ?>
                                <tr>
                                    <th scope="row"><?php echo $i++ ?></th>
                                    <td><?php echo $item['dou_res_nom']; ?></td>
                                    <td><?php echo $item['dou_res_email']; ?></td>
                                    <td><?php echo $item['dou_nom']; ?></td>
                                    <td><?php echo $item['dou_res_message']; ?></td>
                                    <td class="row-style">
                                        <form action="" method="POST">
                                            <input type="hidden" name="douane_id" value="<?php echo $item['dou_id'] ?>">
                                            <button type="submit" class="btn-style" name="submit_douane" onclick='return confirm("Voulez-vous supprimer cette demande")'>
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
        </div>
    </div>
</body>

</html>
<?php
if (isset($_POST['submit_iso'])) {
    $data->deleteIso($_POST['iso_id']);
}
if (isset($_POST['submit_douane'])) {
    $data->deleteDouane($_POST['douane_id']);
}
?>