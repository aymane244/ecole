<?php include_once "../session.php"; ?>
<?php
if (!isset($_SESSION['username']) && !isset($_SESSION['pwrd'])) {
    echo "<script>window.location.href='login-admin'</script>";
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../images/view/logo.png" type="image/x-icon">
    <?php
        include_once "../includes/header.php";  
        include_once "../includes/style.php";
        include_once "../includes/scripts.php";
    ?>
    <title>Gérer les promotions</title>
</head>
<?php
$etudiants = $data->getEtudiantPromotion();
$promos = $data->getPromotion();
?>

<body>
    <?php include_once "navbar-admin.php"; ?>
    <div class="main-content">
        <header>
            <?php include 'admin.php' ?>
        </header>
        <div class="container mt-5 pt-5">
            <div class="text-center pt-3 mb-4">
                <h2>Gestion de la promotion</h2>
            </div>
            <?php
            if (isset($_SESSION['status'])) {
            ?>
                <div class="alert alert-success text-center" role="alert"><?php echo $_SESSION['status'] ?></div>
            <?php
                unset($_SESSION['status']);
            }
            ?>
            <div class="mt-4 text-center">
                <a href="ajouter-promotion" target="_blank" class="btn btn-primary"><i class="fas fa-plus-square"></i> Ajouter une promotion</a>
            </div>
            <table class="table table-hover mt-5 bg-white">
                <thead class="text-center text-white" style="background-color: #11101d;">
                    <tr>
                        <th scope="col" colspan="4">ARTL Nord</th>
                    </tr>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Promos</th>
                        <th scope="col">Nombre d'étudiants</th>
                        <!--<th scope="col">Actions</th>-->
                    </tr>
                </thead>
                <tbody class="text-center">
                    <?php
                    $i = 1;
                    foreach ($etudiants as $etudiant) {
                        if ($etudiant['pro_id'] == '') {
                    ?>
                            <th scope="row" colspan="4">
                                <h1>Pas de promotion</h1>
                            </th>
                        <?php
                        } else {
                        ?>
                            <tr>
                                <th scope="row"><?php echo $i++ ?></th>
                                <td>Promotion <?php echo $etudiant['pro_groupe']; ?></td>
                                <td><?php echo $etudiant['total']; ?></td>
                                <!--<td>
                            <form action="" method="POST">
                                <button type="submit" class="btn-style" name="submit" onclick='return confirm("Voulez-vous supprimer cette matière")'>
                                    <i class="fas fa-trash-alt text-danger awesome-size"></i>
                                </button>
                            </form>
                        </td>-->
                            </tr>
                    <?php
                        }
                    }
                    ?>
                </tbody>
            </table>
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title text-center" id="exampleModalLabel">Choisir la promotion</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="" method="POST">
                                <div id="load_data"></div>
                                <div class="text-center font-style mt-4">
                                    <button type="submit" class="btn btn-primary mb-3" name="submit_promos">Valider</button>
                                </div>
                            </form>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>
            $(document).ready(function() {
                $(".btn-id").click(function() {
                    var ids = $(this).data('id');
                    $.post("functions/traitement.php", {
                        id: ids,
                        action: "promotion"
                    }, function(data) {
                        $('#load_data').html(data);
                    })
                });
            })
        </script>
</body>

</html>
<?php
if (isset($_POST['submit_promos'])) {
    $data->updatePromotion();
}
?>