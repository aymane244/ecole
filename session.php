<?php
    session_start();
    header('Content-Type: text/html; charset=utf-8');
    require("functions/db.php");
    include_once "includes/lang.php";
    require("functions/etudiant.php");
    // include_once "functions/traitement.php";
    $db = new DBController();
    $data = new Etudiant($db);
    $admin = new Admin($db);
?>