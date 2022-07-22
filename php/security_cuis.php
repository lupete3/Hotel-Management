<?php

	session_start();

	if(!isset($_SESSION['profil']['agent7'])){
		header('location:../index.php');
     }
 ?>