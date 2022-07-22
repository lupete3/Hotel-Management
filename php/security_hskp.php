<?php

	session_start();

	if(!isset($_SESSION['profil']['agent6'])){
		header('location:../index.php');
     }
 ?>