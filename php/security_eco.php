<?php

	session_start();

	if(!isset($_SESSION['profil']['agent2'])){
		header('location:../index.php');
     }
 ?>