<?php 
	require_once ('../security_eco.php');
	require_once('bd_cnx.php');
	$id =$_POST['id'];
	$a=$_POST['idCatBoiss'];
	$b=$_POST['qnteBoiss'];
	$c=$_POST['designBoiss'];
	$d=$_POST['nbUniteBoiss'];
	$e=$_POST['puBoiss'];
	$f=$b*$d;

	$verif=$bd->prepare("SELECT * FROM prodboiss WHERE designBoiss=?");
	$verif->execute(array($c));
	if ($don=$verif->fetch()) {
		header('location:produit.php');
	}else{
		$req1 = $bd->prepare('UPDATE prodboiss SET idCatBoiss=?,qnteBoiss=?,designBoiss=?,nbUniteBoiss=?,puBoiss=?,valUnitBoiss=? WHERE idBoiss=?');
		$req1->execute(array($a,$b,$c,$d,$e,$f,$id));
		header('location:produit.php');
	}

		
 ?>
							  