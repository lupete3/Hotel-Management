<?php

	session_start();

	if(!isset($_SESSION['profil']['agent1'])){
		header('location:../index.php');
     }
 ?>