<?php include_once "../session.php"; ?>
<?php
if (!isset($_SESSION['username']) && !isset($_SESSION['pwrd'])) {
    echo "<script>window.location.href='index'</script>";
}
//$etudiants = $data->getEtudiantForma();
$result = $db->conn->query("SELECT `etud_id` FROM `etudiant` INNER JOIN `formation` ON for_id=etud_formation");

$per_page = 20;
$start = 0;
$current_page = 1;
$record = $result->num_rows;
if (isset($_GET['page'])) {
    $start = $_GET['page'];
    if ($start <= 0) {
        $start = 0;
        $current_page = 1;
    } else {
        $current_page = $start;
        $start--;
        $start = $start * $per_page;
    }
}
$pages = ceil($record / $per_page);
$result = $db->conn->query("SELECT * FROM `etudiant` INNER JOIN `formation` ON for_id=etud_formation LIMIT $start, $per_page");

?>
<!DOCTYPE html>
<html lang="en">
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
    <title>Stagiaires</title>
</head>

<body>
    <?php include_once "navbar-admin.php"; ?>
    <div class="main-content">
        <header>
            <?php include 'admin.php' ?>
        </header>
        <div class="container-fluid mt-5 pt-5">
            <div class="text-center py-3">
                <h2><i class="fas fa-user-graduate"></i> Page stagiaire</h2>
            </div>
            <?php
            if (isset($_SESSION['status'])) {
            ?>
                <div class='alert alert-success text-center mt-2' role='alert'><?php echo $_SESSION['status'] ?></div>
            <?php
                unset($_SESSION['status']);
            }
            ?>
            <div class="d-flex mt-4">
                <i class="fas fa-search position-awesome"></i>
                <input type="text" class="form-control px-5" id="search" placeholder="Chercher un stagiaire" name="nom">
            </div>
            <div class="d-flex mt-5">
                <form action="../functions/download.php" method="post">
                    <button type="submit" class="btn text-success" name="xsl_download_stagiaire" style="font-size: 35px; outline:none"><i class="fa-solid fa-file-excel"></i></button>
                </form>
                <form action="../functions/pdf_stagiaire.php" method="post" target="_blank">
                    <button type="submit" class="btn text-danger" name="pdf_download" style="font-size: 35px; outline:none"><i class="fa-solid fa-file-pdf"></i></button>
                </form>
            </div>
            <table class="table bg-white table-bordered">
                <thead class="text-center text-white" style="background-color: #11101d;">
                    <tr>
                        <th scope="col" colspan="9">ARTL Nord</th>
                    </tr>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Formation</th>
                        <th scope="col">Nom complet</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody class="text-center" id="result">
                    <?php
                    if ($result->num_rows <= 0) {
                    ?>
                        <tr>
                            <th scope="col" colspan="4">
                                <h2>Pas de statgiaire</h2>
                            </th>
                        </tr>
                        <?php
                    } else {
                        $i = 1;
                        while ($etudiant = $result->fetch_assoc()) {
                        ?>
                            <tr>
                                <th scope="row"><?php echo $i++ ?></th>
                                <td><?php echo $etudiant['for_nom']; ?></td>
                                <td><?php echo $etudiant['etud_prenom'] . " " . $etudiant['etud_nom']; ?></td>
                                <td>
                                    <div class="row align-items-center">
                                        <?php
                                            if($etudiant['etud_promos'] == 0 ){
                                        ?>
                                        <div class="col-md-9">
                                            <strong>Merci de saisir la promotion pour le stagiaire dans la section formation</strong>
                                        </div>
                                        <div class="col-md-3">
                                            <form action="" method="POST">
                                                <input type="hidden" name="etudiant_id" value="<?php echo $etudiant['etud_id'] ?>">
                                                <button type="submit" class="btn-style" name="submit_etudiant" onclick='return confirm("Voulez-vous supprimer ce stagiaire")'>
                                                    <i class="fas fa-trash-alt text-danger awesome-size"></i>
                                                </button>
                                            </form>
                                        </div>
                                        <?php     
                                            }else{
                                        ?>
                                        <div class="col-md-3">
                                            <a href="modifier-stagiaire?id=<?php echo $etudiant['etud_id'] ?>" target="_blank">
                                                <i class="fas fa-edit text-success awesome-size"></i>
                                            </a>
                                        </div>
                                        <div class="col-md-3">
                                            <form action="" method="POST">
                                                <input type="hidden" name="etudiant_id" value="<?php echo $etudiant['etud_id'] ?>">
                                                <button type="submit" class="btn-style" name="submit_etudiant" onclick='return confirm("Voulez-vous supprimer ce stagiaire")'>
                                                    <i class="fas fa-trash-alt text-danger awesome-size"></i>
                                                </button>
                                            </form>
                                        </div>
                                        <div class="col-md-4">
                                            <button type="button" class="btn btn-primary btn-id" id="btn-id" data-toggle="modal" data-target="#exampleModal" data-id="<?php echo $etudiant['etud_id'] ?>">Détails</button>
                                        </div>
                                        <?php     
                                            }
                                        ?>
                                    </div>
                                </td>
                            </tr>
                    <?php
                        }
                    }
                    ?>
                </tbody>
            </table>
            <nav aria-label="Page navigation example" class="pb-1">
                <ul class="pagination">
                    <?php
                    for ($n = 1; $n <= $pages; $n++) {
                        $calss = '';
                        if ($current_page == $n) {
                            $calss = "active";
                        }
                    ?>
                        <li class="page-item <?php echo $calss ?> ml-2"><a class="page-link" href="?page=<?php echo $n ?>"><?php echo $n ?></a></li>
                    <?php
                    }
                    ?>
                </ul>
            </nav>
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title text-center" id="exampleModalLabel">Stagiaire</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div id="load_data"></div>
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
                    $.post("../functions/traitement.php", {id: ids, action: "student_detail"
                    }, function(data) {
                        $('#load_data').html(data);
                    })
                });
            })
        </script>
        <script>
            $(document).ready(function() {
                $("#search").keyup(function() {
                    var nom = $("#search").val();
                    $.post("../functions/traitement.php", {
                        nom: nom,
                        action: 'search_student'
                    }, function(result) {
                        $('#result').html(result);
                        $(".btn-id").click(function() {
                            var ids = $(this).data('id');
                            $.post("../functions/traitement.php", {id: ids, action: "student_detail"}, function(data) {
                                $('#load_data').html(data);
                            })
                        });
                    });
                });
            })
        </script>
</body>

</html>
<?php
if (isset($_POST['submit_etudiant'])) {
    $data->deleteEtudiant($_POST['etudiant_id']);
}
?>