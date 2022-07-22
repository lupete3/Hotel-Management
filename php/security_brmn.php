<?php

	session_start();

	if(!isset($_SESSION['profil']['agent5'])){
		header('location:../index.php');
     }
 ?>