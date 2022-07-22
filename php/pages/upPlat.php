<?php 
	require_once ('../security_eco.php');
	require_once('bd_cnx.php');
	$id =$_POST['id'];
	$a=$_POST['designPlat'];
	$b=$_POST['puPlat'];

	$verif=$bd->prepare("SELECT * FROM plat WHERE designPlat=? AND puPlat=? AND idPlat=?");
	$verif->execute(array($a,$b,$id));
	if ($don=$verif->fetch()) {
		header('location:plat.php');
	}else{
		$req1 = $bd->prepare('UPDATE plat SET designPlat=?,puPlat=? WHERE idPlat=?');
		$req1->execute(array($a,$b,$id));
		header('location:plat.php');
	}

		
 ?>
							  