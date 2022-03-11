<?php
    include_once "header.php";
    include_once "navbar.php";
    $formations = $data->getformationUser();
    $matieres = $data->getFormationMatiere();
    $id =$_GET['id'];
    foreach($formations as $formation){
        if($formation['for_id'] == $id){
            $for_nom = $formation['for_nom'];
            $for_pres = $formation['for_pres'];
            $for_desc = $formation['for_descr'];
            $for_image = $formation['for_image'];
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $for_nom ?></title>
</head>
<body>
    <div class="div-background">
        <h1 class="text-center pt-3 text-color" id="top"><?php echo $for_nom ?></h1>
        <div class="text-center mt-5">
            <p><img src="<?php echo $for_image ?>" alt="" class="img-fluid" style="width:34rem; height:350px"></p>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">
                    <div class="py-4 px-3 mt-5 mb-lg-4 border text-justify bg-white">
                        <h4 class="text-color"><u>Présentation de la formation</u></h4>
                        <p class="ml-3 mt-3 text-font"><?php echo $for_pres ?></p>
                        <h4 class="text-color" style="white-space: pre-line"><u>Description et objectif de cette formation</u></h4>
                        <p class="ml-3 mt-3 text-font"><?php echo $for_desc ?></p>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="py-4 px-3 mt-5 border bg-white">
                        <h4 class="text-color pb-3"><u>Cursus de la formation</u></h4>
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Matières</th>
                                    <th scope="col">Durée/h</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $i=1;
                                    foreach($matieres as $matiere){
                                        if($matiere['mat_formation'] == $id){
                                ?>
                                <tr>
                                    <th scope="row"><?= $i++ ?></th>
                                    <td><?= $matiere['mat_nom'] ?></td>
                                    <td><?= $matiere['mat_duree'] ?></td>
                                </tr>
                                <?php
                                        }
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="my-4 float-right mx-3">
                        <a href="inscription" target="_blank" rel="noopener noreferrer" class="link">Inscrivez-vous ici <i class="fas fa-share"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="div-btn fixed-bottom mb-2 mx-2" id="div-btn">
            <a href="#top" class="btn-top px-3 float-right py-2 rounded"><i class="fas fa-long-arrow-alt-up text-white"></i></a>
        </div>
        <?php
            include_once "footer.php";
        ?>
    </div>
</body>
</html>