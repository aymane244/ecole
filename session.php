<?php
    session_start();
    header('Content-Type: text/html; charset=utf-8');
    require("functions/db.php");
    include_once "lang.php";
    require("functions/etudiant.php");
    $db = new DBController();
    $data = new Etudiant($db);
?>