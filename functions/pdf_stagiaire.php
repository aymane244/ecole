<?php


require('../includes/fpdf.php');

class PDF extends FPDF
{
// En-tête
function Header()
{
    include_once 'etudiant.php';
    include_once 'db.php';
    $db = new DBController();
    $data = new Etudiant($db);
    $etudiants = $data->getEtudiantFormation();
    foreach ($etudiants as $etudiant) {
        $for_nom=$etudiant['for_nom'];
    }
    // Logo
    $this->Image('../images/view/logo.jpeg',10,6,60);
    // Police Arial gras 15
    $this->SetFont('Arial','B',15);
    // Décalage à droite
    $this->Ln(15);
    $this->Cell(120);
    // Titre

    $this->Cell(40,10,$for_nom,0,0,'C');
    // Saut de ligne
    $this->Ln(20);
}

// Tableau coloré
function FancyTable($header)
{
    include_once 'etudiant.php';
    include_once 'db.php';
    $db = new DBController();
    $data = new Etudiant($db);
    $etudiants = $data->getEtudiantFormation();
    $date= date("Y-m-d");
    // Couleurs, épaisseur du trait et police grasse
    $this->SetFillColor(0,0,0);
    $this->SetTextColor(255);
    $this->SetDrawColor(0,0,0);
    $this->SetLineWidth(.3);
    $this->SetFont('','B');
    // En-tête
    $w = array(5, 38, 7, 17 , 25, 55, 105, 22);
    for($i=0;$i<count($header);$i++)
        $this->Cell($w[$i],7,$header[$i],1,0,'C',true);
    $this->Ln();
    // Restauration des couleurs et de la police
    $this->SetFillColor(224,235,255);
    $this->SetTextColor(0);
    $this->SetFont('');
    // Données
    $fill = false;
    $j = 1;
    foreach ($etudiants as $etudiant) {
        $age = date_diff(date_create($etudiant['etud_naissance']), date_create($date));
        $this->Cell($w[0],6,$j++,'LR',0,'L',$fill);
        $this->Cell($w[1],6,$etudiant['etud_prenom'].' '.$etudiant['etud_nom'],'LR',0,'L',$fill);
        $this->Cell($w[2],6,$age->format('%y'),'LR',0,'L',$fill);
        $this->Cell($w[3],6,$etudiant['etud_cin'],'LR',0,'L',$fill);
        $this->Cell($w[4],6,$etudiant['etud_telephone'],'LR',0,'L',$fill);
        $this->Cell($w[5],6,$etudiant['etud_email'],'LR',0,'L',$fill);
        $this->Cell($w[6],6,$etudiant['for_nom'],'LR',0,'L',$fill);
        $this->Cell($w[7],6,$etudiant['etud_permis'],'LR',0,'L',$fill);
        $this->Ln();
        $fill = !$fill;
    }
    // Trait de terminaison
    $this->Cell(array_sum($w),0,'','T');
}
// Pied de page
function Footer()
{
    // Positionnement à 1,5 cm du bas
    $this->SetY(-15);
    // Police Arial italique 8
    $this->SetFont('Arial','I',8);
    // Numéro de page
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}

$pdf = new PDF();
$pdf->AliasNbPages();
// Titres des colonnes
$header = array('#', 'Nom complet', 'Age', 'CIN', iconv('UTF-8', 'windows-1252', 'Téléphone'), 'Email', 'Formation', 'Permis');
// Chargement des données
$pdf->SetFont('Arial','',10);
$pdf->AddPage('L');
$pdf->FancyTable($header);
$pdf->Output('', 'Stagiaires.pdf');
?>