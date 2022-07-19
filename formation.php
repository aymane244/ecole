<?php include_once "session.php";?>
<?php
    if(!isset($_GET['titre'])){
        echo "<script>window.location.href='index'</script>";
    }
    $formations = $data->getformationUser();
    $matieres = $data->getFormationMatiere();
    $id =$_GET['titre'];
    foreach($formations as $formation){
            $for_nom = $formation['for_nom'];
            $for_pres = $formation['for_pres'];
            $for_desc = $formation['for_descr'];
            $for_nom_arab = $formation['for_nom_arab'];
            $for_pres_arab = $formation['for_pres_arab'];
            $for_desc_arab = $formation['for_desc_arab'];
            $for_id = $formation['for_id'];
    }
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <?php 
            include_once "includes/header.php";  
            include_once "includes/style.php";
            include_once "includes/scripts.php";
        ?>
        <title>
            <?php 
                if($_SESSION['lang'] =="ar"){
                    echo $for_nom_arab;
                }else{
                    echo $for_nom;
                }
            ?>
        </title>
    </head>
    <body>
        <div id="top"></div>
        <?php include_once "navbar.php";?>
        <div class="div-background">
            <div class="text-white text-center text-big div-header">
                <h1 class="text-center pt-3" id="top">
                    <?php
                        if($_SESSION['lang'] =="ar"){
                            echo $for_nom_arab;
                        }else{
                            echo $for_nom;
                        }
                    ?>
                </h1>
            </div>
            <div style="position:relative">
                <div style="background-color: black;opacity: 0.5;top: 0;left: 0;width: 100%;height: 100%;position: absolute; z-index:2"></div>
                <img src="images/view/school_11zon.jpg" alt="" class="d-block img-fluid" style="width:100%;">
            </div>
            <div class="container mt-5">
                <div class="row">
                    <?php
                        if($_SESSION['lang'] == 'ar'){
                    ?>
                    <div class="col-lg-6 text-right">
                        <div class="py-4 px-3 mt-5 border bg-white">
                            <h4 class="text-color pb-3" lang="ar"><u><?php echo $forma['cursus'] ?></u></h4>
                            <table class="table table-hover">
                                <thead lang="ar">
                                    <tr>
                                        <th scope="col"><?php echo $forma['durée'] ?></th>
                                        <th scope="col"><?php echo $forma['matieres'] ?></th>
                                        <th scope="col">#</th>
                                    </tr>
                                </thead>
                                <tbody lang="ar">
                                    <?php
                                        $i=1;
                                        foreach($matieres as $matiere){

                                            if($matiere['mat_formation'] == $for_id){
                                    ?>
                                    <tr>
                                        <td><?php echo $matiere['mat_duree'];?></td>
                                        <td><?php echo $matiere['mat_nom_arab'] ;?></td>
                                        <th scope="row"><?= $i++ ?></th>
                                    </tr>
                                    <?php
                                            }
                                        }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="my-4 float-right mx-3">
                        <a href="inscription" target="_blank" rel="noopener noreferrer" class="link"><i class="fas fa-share"></i> <?php echo $forma['inscrivez'] ?></a>
                        </div>
                    </div>
                    <div class="col-lg-6" lang="ar">
                        <div class="py-4 px-3 mt-5 mb-lg-4 border text-justify bg-white">
                            <h4 class="text-color text-right"><u><?php echo $forma['presentation'] ?></u></h4>
                            <div class="mx-3 mt-3" style="font-size: 20px;">
                                <?php echo $for_pres_arab;?>
                            </div>
                            <h4 class="text-color text-right" ><u><?php echo $forma['description'] ?></u></h4>
                            <div class="mx-3 mt-3" dir="rtl" style="font-size: 20px;">
                                <?php echo $for_desc_arab;?>
                            </div>
                        </div>
                    </div>
                    <?php
                        }else{
                    ?>
                    <div class="col-lg-6">
                        <div class="py-4 px-3 mt-5 mb-lg-4 border text-justify bg-white">
                            <h4 class="text-color"><u><?php echo $forma['presentation'] ?></u></h4>
                            <div class="mx-3 mt-3" style="font-size: 20px;">
                                <?php echo $for_pres;?>
                            </div>
                            <h4 class="text-color" style="white-space: pre-line"><u><?php echo $forma['description'] ?></u></h4>
                            <div class="ml-3 mt-3" style="font-size: 20px;">
                                <?php echo $for_desc;?>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="py-4 px-3 mt-5 border bg-white">
                            <h4 class="text-color pb-3"><u><?php echo $forma['cursus'] ?></u></h4>
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col"><?php echo $forma['matieres'] ?></th>
                                        <th scope="col"><?php echo $forma['durée'] ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $i=1;
                                        foreach($matieres as $matiere){
                                            if($matiere['mat_formation'] == $for_id){
                                    ?>
                                    <tr>
                                        <th scope="row"><?= $i++ ?></th>
                                        <td><?php echo $matiere['mat_nom'] ;?></td>
                                        <td><?php echo $matiere['mat_duree'];?></td>
                                    </tr>
                                    <?php
                                            }
                                        }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="my-4 float-right mx-3">
                            <a href="inscription" target="_blank" rel="noopener noreferrer" class="link"><?php echo $forma['inscrivez'] ?><i class="fas fa-share"></i></a>
                        </div>
                    </div>
                    <?php       
                        }
                    ?>
                </div>
            </div>
            <div class="div-btn fixed-bottom mb-2 mx-2" id="div-btn">
                <a href="#top" class="btn-top px-3 float-right py-2 rounded"><i class="fas fa-long-arrow-alt-up text-white"></i></a>
            </div>
            <?php include_once "includes/footer.php";?>
        </div>
    </body>
</html>