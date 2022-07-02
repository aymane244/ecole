<?php include_once "session.php"; ?>
<?php
if (!isset($_SESSION['username']) && !isset($_SESSION['pwrd'])) {
    echo "<script>window.location.href='login-admin'</script>";
}
$etudiants = $data->getEtudiantFormationID();
$seances = $data->getFormationMatiere();
$formations = $data->getformation();
$states = $data->getabsence();
if (!isset($_GET['id'])) {
    echo "<script>window.location.href='formations'</script>";
}
$id = $_GET['id'];
foreach ($formations as $formations) {
    if ($formations['for_id'] == $id) {
        $formation_nom =  $formations['for_nom'];
        $formation_id =  $formations['for_id'];
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
    <title>Absence</title>
</head>

<body>
    <?php include_once "navbar-admin.php"; ?>
    <div class="main-content">
        <header>
            <?php include 'admin.php' ?>
        </header>
        <div class="container mt-5 py-5">
            <div class="text-center">
                <h2><i class="fas fa-user-check"></i> Marquer l'absence</h2>
            </div>
            <?php
            if (isset($_SESSION['status'])) {
            ?>
                <div class='alert alert-success text-center mt-2' role='alert'><?php echo $_SESSION['status'] ?></div>
            <?php
                unset($_SESSION['status']);
            }
            ?>
            <div class="row justify-content-center my-4">
                <div class="col-md-6">
                    <div class="dropdown">
                        <p class="bg-white p-2 border rounded" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-folder-open"></i> --Choisir votre module-- <i class="fas fa-sort float-right" style="font-size: small; padding-top:5px"></i>
                        </p>
                        <div class="dropdown-menu w-100 m-0 border-top-0" aria-labelledby="dropdownMenuButton">
                            <?php
                            foreach ($seances as $seance) {
                                if ($seance['for_id'] == $id) {
                            ?>
                                <a href="marquer-absence?id=<?php echo $seance['mat_id'] ?>" class="text-dark pl-5" target="blank"><?php echo $seance['mat_nom'] . '<br>' ?></a>
                            <?php
                                }
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-center">
                <h2 class=" pt-3"><i class="fas fa-user-check"></i> Etat d'absence</h2>
            </div>
            <?php
            if (isset($_SESSION['status_error'])) {
            ?>
                <div class='alert alert-danger text-center mt-2' role='alert'><?php echo $_SESSION['status_error'] ?></div>
            <?php
                unset($_SESSION['status_error']);
            }
            ?>
            <form action="" method="POST">
                <div class="row pt-3">
                    <div class="col-md-6">
                        <div class="d-flex">
                            <i class="fas fa-folder-open position-awesome"></i>
                            <select class="custom-select px-5" name="get_matiere">
                                <option selected value="">--Choisir la module--</option>
                                <?php
                                foreach ($seances as $seance) {
                                    if ($seance['for_id'] == $id) {
                                ?>
                                        <option value="<?php echo $seance['mat_id'] ?>"><?php echo $seance['mat_nom'] ?></option>
                                <?php
                                    }
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="d-flex">
                            <i class="fas fa-calendar position-awesome"></i>
                            <input id="absence_date" type="date" class="form-control pl-5" name="absence_date" autofocus>
                            <button type="submit" class="btn btn-primary ml-3" name="absence_submit">Filtrer</button>
                        </div>
                    </div>
                </div>
            </form>
            <hr style="background-color: #DEE2E6;">
            <table class="table table-bordered mt-3 bg-white">
                <thead class="text-center text-white" style="background-color: #11101d;">
                    <tr>
                        <th scope="col" colspan="5">ARTL Nord</th>
                    </tr>
                    <tr>
                        <th scope="col">Stagiaires</th>
                        <th scope="col">Etat d'absence</th>
                        <th scope="col">Date</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    <?php
                    if (isset($_POST['absence_submit'])) {
                        if (is_array($states) || is_object($states)) {
                            foreach ($states as $state) {
                    ?>
                                <tr>
                                    <td><?php echo $state['etud_nom'] . " " . $state['etud_prenom'] ?> </td>
                                    <td><?php echo $state['abs_absence'] ?></td>
                                    <td><?php echo $state['abs_date'] ?></td>
                                </tr>
                        <?php
                            }
                        }
                    } else {
                        ?>
                        <tr>
                            <th scope="col" colspan="5">
                                <h1> Veuillez choisir une date</h1>
                            </th>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>