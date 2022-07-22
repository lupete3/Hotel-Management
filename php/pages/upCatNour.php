<?php 
	require_once ('../security_eco.php'); 
	require_once('bd_cnx.php');
	$id =$_POST['id'];
	$a=$_POST['designCatBoiss'];

	$verif=$bd->prepare("SELECT * FROM catnour WHERE idCatNour=?");
	$verif->execute(array($a));
	if ($don=$verif->fetch()) {
		header('location:categorieNour.php');
	}else{
		$req1 = $bd->prepare('UPDATE catnour SET designCatNour=? WHERE idCatNour=?');
		$req1->execute(array($a,$id));
		header('location:categorieNour.php');
	}

		
 ?>
		