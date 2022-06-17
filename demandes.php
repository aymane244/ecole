<?php include_once "session.php"; ?>
<?php
if (!isset($_SESSION['username']) && !isset($_SESSION['pwrd'])) {
    echo "<script>window.location.href='login-admin'</script>";
}
$diplomes = $data->getDiplome();
$attestations = $data->getAttestation();
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
    <title>Les demandes</title>
</head>

<body>
    <?php include_once "navbar-admin.php"; ?>
    <div class="main-content">
        <header>
            <?php include 'admin.php' ?>
        </header>
        <div class="container mt-5 pt-5">
            <div class="text-center py-3">
                <h2><i class="fas fa-graduation-cap"></i> Page Demandes</h2>
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
                <input type="button" class="btn btn-primary" onclick="diplome()" value="Demande Document 1">
                <input type="button" class="btn btn-primary ml-3" onclick="attestation()" value="Demande Document 2">
            </div>
            <div class="row">
                <div class="col-md-12" id="diplome">
                    <table class="table bg-white table-bordered">
                        <thead class="text-center">
                            <tr>
                                <th scope="col" colspan="5">Demande document 1</th>
                            </tr>
                            <tr>
                                <th>#</th>
                                <th>Nom et prénom</th>
                                <th>Envoie</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            <?php
                            if (empty($diplomes)) {
                            ?>
                                <tr>
                                    <th scope="row" colspan="5">
                                        <h2>Pas de demande</h2>
                                    </th>
                                </tr>
                                <?php
                            } else {
                                $i = 1;
                                foreach ($diplomes as $diplome) {
                                ?>
                                    <tr>
                                        <td><?= $i++ ?></td>
                                        <td><?= $diplome['etud_prenom'] . " " . $diplome['etud_nom'] ?></td>
                                        <td>
                                            <form action="" method="POST" enctype="multipart/form-data">
                                                <input type="hidden" name="dip_etud" value="<?= $diplome['etud_id'] ?>">
                                                <input type="file" name="dip_image" id="">
                                                <input type="submit" value="Envoyer" class="btn btn-primary" name="dip-btn">
                                            </form>
                                        </td>
                                        <td>
                                            <?php
                                            if ($diplome['dip_image'] == '') {
                                                echo '<p class="text-primary">Demande reçue</p>';
                                            } else if ($diplome['dip_image'] == $diplome['dip_image']) {
                                                echo '<p class="text-success">Document 1 envoyé</p>';
                                            }
                                            ?>
                                        </td>
                                        <td class="row-style">
                                            <form action="" method="POST">
                                                <input type="hidden" name="diplome_id" value="<?php echo $diplome['dip_id'] ?>">
                                                <button type="submit" class="btn-style" name="submit_diplome" onclick='return confirm("Voulez-vous supprimer cette demande")'>
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
                <div class="col-md-12" style='display:none' id='attestation'>
                    <table class="table table-hover bg-white table-bordered">
                        <thead class="text-center">
                            <tr>
                                <th scope="col" colspan="5">Demande document 2</th>
                            </tr>
                            <tr>
                                <th>#</th>
                                <th>Nom et prénom</th>
                                <th>Envoie</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            <?php
                            if (empty($attestations)) {
                            ?>
                                <tr>
                                    <th scope="row" colspan="5">
                                        <h2>Pas de demande</h2>
                                    </th>
                                </tr>
                                <?php
                            } else {
                                $i = 1;
                                foreach ($attestations as $attestation) {
                                ?>
                                    <tr>
                                        <td><?= $i++ ?></td>
                                        <td><?= $attestation['etud_prenom'] . " " . $attestation['etud_nom'] ?></td>
                                        <td>
                                            <form action="" method="POST" enctype="multipart/form-data">
                                                <input type="hidden" name="att_etud" value="<?= $attestation['etud_id'] ?>">
                                                <input type="file" name="att_image" id="">
                                                <input type="submit" value="Envoyer" name="att-btn" class="btn btn-primary">
                                            </form>
                                        </td>
                                        <td>
                                            <?php
                                            if ($attestation['att_image'] == '') {
                                                echo '<p class="text-primary">Demande reçu</p>';
                                            } else if ($attestation['att_image'] == $attestation['att_image']) {
                                                echo '<p class="text-success">Document 2 envoyé</p>';
                                            }
                                            ?>
                                        </td>
                                        <td class="row-style">
                                            <form action="" method="POST">
                                                <input type="hidden" name="attestation_id" value="<?php echo $attestation['att_id'] ?>">
                                                <button type="submit" class="btn-style" name="submit_att" onclick='return confirm("Voulez-vous supprimer cette demande")'>
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
    </div>
</body>

</html>
<?php
if (isset($_POST['submit_diplome'])) {
    $data->deleteDiplome($_POST['diplome_id']);
}
if (isset($_POST['submit_att'])) {
    $data->deleteAttestation($_POST['attestation_id']);
}
if (isset($_POST['dip-btn'])) {
    $data->updateDiplome();
}
if (isset($_POST['att-btn'])) {
    $data->updateAttestation();
}
?>