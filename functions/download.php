<?php
    include_once "traitement.php";
    $id= $_POST['id'];
    foreach ($data->getEtudiantNotesAjax() as $detail) {
        if($detail['etud_id'] == $id){
            $nom = $detail['etud_nom'];
            $prenom = $detail['etud_prenom'];
            $file_folder ="../dossiers-stagiaires/";
            $cin = $detail['etud_cin_name'];
            $permis = $detail['etud_permis_name'];
            $visite = $detail['etud_visite_name'];
            $file = "readme.txt";
            $zip = new ZipArchive();
            $zip_file = "$prenom-$nom.zip";
            if($zip->open($zip_file, ZIPARCHIVE::CREATE)==true){
                file_put_contents($file, "Vous avez bien télécharger vos fichiers \n".$cin."\n".$permis."\n".$visite);
                $zip->addFile("readme.txt");
                $this_zip = $zip->open($zip_file);
                $path = "../dossiers-stagiaires/$prenom-$nom/";
                $file_path= "$path/$cin";
                $name =$cin;
                $zip->addFile($file_path, $name);
                $file_path= "$path/$permis";
                $name =$permis;
                $zip->addFile($file_path, $name);
                $file_path= "$path/$visite";
                $name =$visite;
                $zip->addFile($file_path, $name);
            }
        }
    }
?>