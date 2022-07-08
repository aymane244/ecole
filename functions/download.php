<?php
    include_once "traitement.php";
    if(isset($_POST['createpdf'])){
        $id= $_POST['id'];
    foreach ($data->getEtudiantNotesAjax() as $detail) {
        if($detail['etud_id'] == $id){
            $nom = $detail['etud_nom'];
            $prenom = $detail['etud_prenom'];
            $cin = $detail['etud_scan_cin'];
            $permis = $detail['etud_scan_permis'];
            $visite = $detail['etud_scan_visite'];
            //$files = array($cin, $permis, $visite);
            $file = "readme.txt";
            $zip = new ZipArchive;
            $zip_file = "$prenom-$nom.zip";
            $path = "../dossiers-stagiaires/$prenom-$nom";
            if($zip->open($zip_file, ZIPARCHIVE::CREATE)==true){
                file_put_contents($file, "Vous avez bien téléchargé vos fichiers \n".$cin."\n".$permis."\n".$visite);
                $zip->addFile("readme.txt");
                $file_path= "$path/$cin";
                $name =$cin;
                $zip->addFile($file_path, $name);
                $file_path= "$path/$permis";
                $name =$permis;
                $zip->addFile($file_path, $name);
                $file_path= "$path/$visite";
                $name =$visite;
                $zip->addFile($file_path, $name);
                $zip->extractTo($file_path, $name);
                @$zip->close();
            }
            if(file_exists($zip_file))  
            {  
                 // push to download the zip  
                 header("Content-Type: application/zip");
                 header("Content-Transfer-Encoding: Binary");
                 header('Content-Disposition: attachment; filename="'.$zip_file.'"');  
                  readfile($zip_file);  
                 // remove zip file is exists in temp path  
                unlink($zip_file);  
                unlink("readme.txt");  
            }  
        }
    }
    }


?>