<?php
    include_once "header.php";
    include_once "navbar.php";
    if(!isset($_SESSION['etud_cin']) && !isset($_SESSION['etud_motdepasse'])){
        echo "<script>window.location.href='login'</script>";
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mes documents</title>
</head>
<?php
    $diplomes = $data->getDiplome();
    $attestations = $data->getAttestation();
    foreach($diplomes as $diplome){
        if($_SESSION['id'] == $diplome['etud_id']){
            echo '<embed  src="'.$diplome['dip_image'].'" type="application/pdf" loading="lazy" style="width:100%; height:1200px">';
        }
    }
    foreach($attestations as $attestation){
        if($_SESSION['id'] == $attestation['etud_id']){
            echo '<embed  src="'.$attestation['att_image'].'" type="application/pdf" loading="lazy" style="width:100%; height:1200px">';
        }
    }
?>
<body>
    
</body>
</html>