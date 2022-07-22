<?php

	session_start();

	if(!isset($_SESSION['profil']['agent3'])){
		header('location:../index.php');
     }
 ?>