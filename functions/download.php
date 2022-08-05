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
                if(file_exists($zip_file))  {  
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
    $output = "";
    if(isset($_POST['xsl_download'])){
        $id = $_POST['for_id'];
        $etudiants = $data->getEtudiantNotesAjax();
        $date= date("Y-m-d");
        foreach ($etudiants as $etudiant) {
            if ($etudiant['for_id'] == $id) {
                $for_nom=$etudiant['for_nom'];
            }
        }
        $output .='<table class="table border">
            <thead>
                <tr>
                    <th scope="col" colspan="11">ARTL Nord</th>
                </tr>
                <tr>
                    <th scope="col" colspan="11">'.$for_nom.'</th>
                </tr>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nom complet</th>
                    <th scope="col">Age</th>
                    <th scope="col">CIN</th>
                    <th scope="col">'.mb_convert_encoding("Téléphone", "UTF-16LE", "UTF-8").'</th>
                    <th scope="col">Email</th>
                    <th scope="col">Adresse</th>
                    <th scope="col">Permis</th>
                    <th scope="col">'.mb_convert_encoding("Catégorie", "UTF-16LE", "UTF-8").' de permis</th>
                    <th scope="col">Date d\'obtention</th>
                </tr>
            </thead>
            <tbody class="text-center">';
                $i = 1;
                foreach ($etudiants as $etudiant) {
                    $naissance = date("Y-m-d", strtotime($etudiant['etud_naissance']));
                    $age = date_diff(date_create($etudiant['etud_naissance']), date_create($date));
                    if ($etudiant['for_id'] == $id) {
                        $output .='<tr>
                            <th scope="row">'.$i++.'</th>
                            <td>'.$etudiant['etud_prenom'] . " " . $etudiant['etud_nom'].'</td>
                            <td>'.$age->format('%y').'</td>
                            <td>'.$etudiant['etud_cin'].'</td>
                            <td>'.$etudiant['etud_telephone'].'</td>
                            <td>'.$etudiant['etud_email'].'</td>
                            <td>'.$etudiant['etud_adress'].'</td>
                            <td>'.$etudiant['etud_permis'].'</td>
                            <td>'.$etudiant['etud_cat_permis'].'</td>
                            <td>'.$etudiant['etud_permis_obt'].'</td>
                        </tr>';
                    }
                }
            $output .='</tbody>
        </table>';
        header('Content-Type:application/xls;');
        header('Content-Disposition: attachment; filename=stagiaires.xls');  
        echo $output;
        // unlink('stagiaires.xls');
    }
    if(isset($_POST['xsl_download_stagiaire'])){
        $etudiants = $data->getEtudiantFormation();
        $date= date("Y-m-d");
        $output .='<table class="table border">
            <thead>
                <tr>
                    <th scope="col" colspan="11">ARTL Nord</th>
                </tr>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nom complet</th>
                    <th scope="col">Age</th>
                    <th scope="col">CIN</th>
                    <th scope="col">'.mb_convert_encoding("Téléphone", "UTF-16LE", "UTF-8").'</th>
                    <th scope="col">Email</th>
                    <th scope="col">Adresse</th>
                    <th scope="col">Formtaion</th>
                    <th scope="col">Permis</th>
                    <th scope="col">'.mb_convert_encoding("Catégorie", "UTF-16LE", "UTF-8").' de permis</th>
                    <th scope="col">Date d\'obtention</th>
                </tr>
            </thead>
            <tbody class="text-center">';
                $i = 1;
                foreach ($etudiants as $etudiant) {
                    $naissance = date("Y-m-d", strtotime($etudiant['etud_naissance']));
                    $age = date_diff(date_create($etudiant['etud_naissance']), date_create($date));
                        $output .='<tr>
                            <th scope="row">'.$i++.'</th>
                            <td>'.$etudiant['etud_prenom'] . " " . $etudiant['etud_nom'].'</td>
                            <td>'.$age->format('%y').'</td>
                            <td>'.$etudiant['etud_cin'].'</td>
                            <td>'.$etudiant['etud_telephone'].'</td>
                            <td>'.$etudiant['etud_email'].'</td>
                            <td>'.$etudiant['etud_adress'].'</td>
                            <td>'.$etudiant['for_nom'].'</td>
                            <td>'.$etudiant['etud_permis'].'</td>
                            <td>'.$etudiant['etud_cat_permis'].'</td>
                            <td>'.$etudiant['etud_permis_obt'].'</td>
                        </tr>';
                }
            $output .='</tbody>
        </table>';
        header('Content-Type:application/xls;');
        header('Content-Disposition: attachment; filename=stagiaires.xls');  
        echo $output;
        // unlink('stagiaires.xls');
    }
?> 