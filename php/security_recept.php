<?php

	session_start();

	if(!isset($_SESSION['profil']['agent4'])){
		header('location:../index.php');
     }
 ?>