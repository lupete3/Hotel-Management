<?php 
	require_once ('../security_eco.php'); 
	require_once('bd_cnx.php');
	$id =$_POST['id'];
	$a=$_POST['designation'];

	$verif=$bd->prepare("SELECT * FROM catplat WHERE idCatPlat=?");
	$verif->execute(array($a));
	if ($don=$verif->fetch()) {
		header('location:categoriePlat.php');
	}else{
		$req1 = $bd->prepare('UPDATE catplat SET designCatPlat=? WHERE idCatPlat=?');
		$req1->execute(array($a,$id));
		header('location:categoriePlat.php');
	}

		
 ?>
							  