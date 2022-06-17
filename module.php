<?php include_once "session.php"; ?>
<?php
if (!isset($_SESSION['username']) && !isset($_SESSION['pwrd'])) {
    echo "<script>window.location.href='login-admin'</script>";
}
$formations = $data->getFormationMatiere();
$arr = array();
$matieres = array();
$formationame = array();
$prof = array();
$duree = array();
$mat_id = array();
foreach ($formations as $row) {
    array_push($formationame, $row['for_nom']);
    array_push($matieres, $row['mat_nom']);
    array_push($prof, $row['mat_prof']);
    array_push($duree, $row['mat_duree']);
    array_push($mat_id, $row['mat_id']);
    if (!isset($arr[$row['for_nom']])) {
        $arr[$row['for_nom']]['rowspan'] = 0;
    }
    $arr[$row['for_nom']]['printed'] = 'no';
    $arr[$row['for_nom']]['rowspan'] += 1;
}
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
    <title>Modules</title>
</head>

<body>
    <?php include_once "navbar-admin.php"; ?>
    <div class="main-content">
        <header>
            <?php include 'admin.php' ?>
        </header>
        <div class="container-fluid mt-5 pt-5">
            <div class="text-center py-3">
                <h2><i class="fas fa-book-open"></i> Page Modules</h2>
            </div>
            <?php
            if (isset($_SESSION['status'])) {
            ?>
                <div class='alert alert-success text-center mt-2' role='alert'><?php echo $_SESSION['status'] ?></div>
            <?php
                unset($_SESSION['status']);
            }
            ?>
            <div class="mt-4 text-center">
                <a href="ajouter-module" target="_blank" class="btn btn-primary"><i class="fas fa-plus-square"></i> Ajouter un module</a>
            </div>
            <div class="mt-4 align-items-center d-flex justify-content-center">
                <input type="button" value="Français" class="btn btn-primary" onclick="frensh()">
                <input type="button" value="Arabe" class="btn btn-primary ml-3" onclick="arabe()">
            </div>
            <div id="frensh">
                <table class="table table-bordered mt-5 bg-white">
                    <thead class="text-center">
                        <tr>
                            <th scope="col" colspan="5">ARTL Nord</th>
                        </tr>
                        <tr>
                            <th scope="col">Formation</th>
                            <th scope="col">Modules</th>
                            <th scope="col">Formateur</th>
                            <th scope="col">Durée globale</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        <?php
                        if (empty($formations)) {
                        ?>
                            <tr>
                                <th scope="row" colspan="7">
                                    <h2>Aucun module n'est enregistrée veuillez ajouter un module</h2>
                                </th>
                            </tr>
                            <?php
                        } else {
                            for ($i = 0; $i < sizeof($matieres); $i++) {
                                $formationom = $formationame[$i];
                            ?>
                                <tr>
                                    <?php
                                    if ($arr[$formationom]['printed'] == 'no') {
                                    ?>
                                        <td class="row-style" rowspan="<?php echo $arr[$formationom]['rowspan'] ?>"><?php echo $formationom ?></td>
                                    <?php
                                        $arr[$formationom]['printed'] = 'yes';
                                    }
                                    ?>
                                    <td><?php echo $matieres[$i] ?> </td>
                                    <td><?php echo $prof[$i] ?></td>
                                    <td><?php echo $duree[$i] ?>h</td>
                                    <td>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <a href="modifier-module?id=<?php echo $mat_id[$i] ?>" target="_blank">
                                                    <i class="fas fa-edit text-success awesome-size"></i>
                                                </a>
                                            </div>
                                            <div class="col-md-6">
                                                <form action="" method="POST">
                                                    <input type="hidden" name="matiere_id" value="<?php echo $mat_id[$i] ?>">
                                                    <button type="submit" class="btn-style" name="submit" onclick='return confirm("Voulez-vous supprimer ce module")'>
                                                        <i class="fas fa-trash-alt text-danger awesome-size"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                        <?php
                            }
                        }
                        ?>
                    </tbody>
                </table>
                <br>
            </div>
            <?php
            $arr_arab = array();
            $matieres_arab = array();
            $formationame_arab = array();
            $prof_arab = array();
            foreach ($formations as $row) {
                array_push($formationame_arab, $row['for_nom_arab']);
                array_push($matieres_arab, $row['mat_nom_arab']);
                array_push($prof_arab, $row['mat_prof_arab']);
                if (!isset($arr_arab[$row['for_nom_arab']])) {
                    $arr_arab[$row['for_nom_arab']]['rowspan'] = 0;
                }
                $arr_arab[$row['for_nom_arab']]['printed'] = 'no';
                $arr_arab[$row['for_nom_arab']]['rowspan'] += 1;
            }
            ?>
            <div id="arabe" style="display:none">
                <table class="table table-bordered bg-white mt-5">
                    <thead class="text-center">
                        <tr>
                            <th scope="col" colspan="5">الأكاديمية الجهوية للنقل واللوجستيك بجهة طنجة</th>
                        </tr>
                        <tr>
                            <th scope="col">اسم التكوين</th>
                            <th scope="col">اسم الوحدة</th>
                            <th scope="col">اسم المؤطر</th>
                            <th scope="col">مدة دراسة الوحدة</th>
                            <th scope="col">إجراءات</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        <?php
                        if (empty($formations)) {
                        ?>
                            <tr>
                                <th scope="row" colspan="7">
                                    <h2>لم يتم حفظ أي وحدة يرجى إضافة وحدة جديدة</h2>
                                </th>
                            </tr>
                            <?php
                        } else {
                            for ($i = 0; $i < sizeof($matieres_arab); $i++) {
                                $formationom_arab = $formationame_arab[$i];
                            ?>
                                <tr>
                                    <?php
                                    if ($arr_arab[$formationom_arab]['printed'] == 'no') {
                                    ?>
                                        <td class="row-style" rowspan="<?php echo $arr_arab[$formationom_arab]['rowspan'] ?>"><?php echo $formationom_arab ?></td>
                                    <?php
                                        $arr_arab[$formationom_arab]['printed'] = 'yes';
                                    }
                                    ?>
                                    <td><?php echo $matieres_arab[$i] ?> </td>
                                    <td><?php echo $prof_arab[$i] ?></td>
                                    <td><?php echo $duree[$i] ?>h</td>
                                    <td>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <a href="modifier-module?id=<?php echo $mat_id[$i] ?>" target="_blank">
                                                    <i class="fas fa-edit text-success awesome-size"></i>
                                                </a>
                                            </div>
                                            <div class="col-md-6">
                                                <form action="" method="POST">
                                                    <input type="hidden" name="matiere_id" value="<?php echo $mat_id[$i] ?>">
                                                    <button type="submit" class="btn-style" name="submit" onclick='return confirm("Voulez-vous supprimer ce module")'>
                                                        <i class="fas fa-trash-alt text-danger awesome-size"></i>
                                                    </button>
                                                </form>
                                            </div>
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
        </div>
    </div>
</body>

</html>
<?php
if (isset($_POST['submit'])) {
    $data->deleteMatieres($_POST['matiere_id']);
}
?>