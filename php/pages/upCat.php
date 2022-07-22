<?php 
	require_once ('../security_eco.php'); 
	require_once('bd_cnx.php');
	$id =$_POST['id'];
	$a=$_POST['designCatBoiss'];

	$verif=$bd->prepare("SELECT * FROM catBoiss WHERE idCatBoiss=?");
	$verif->execute(array($a));
	if ($don=$verif->fetch()) {
		header('location:categorie.php');
	}else{
		$req1 = $bd->prepare('UPDATE catBoiss SET designCatBoiss=? WHERE idCatBoiss=?');
		$req1->execute(array($a,$id));
		header('location:categorie.php');
	}

		
 ?>
							  