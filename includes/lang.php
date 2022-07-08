<?php
	if(!isset($_SESSION['lang'])){
		$_SESSION['lang'] = "fr";
	}else if(isset($_SESSION['lang'])){
		if(isset($_POST['ar'])){
			$_SESSION['lang'] ="ar";
		}else if(isset($_POST['fr'])){
			$_SESSION['lang'] ="fr";
		}
	}
	require_once $_SESSION['lang'] . ".php";
?>