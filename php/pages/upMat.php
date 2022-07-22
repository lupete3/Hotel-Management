<?php 
	//require_once ('../security_eco.php');
	require_once('bd_cnx.php');
	 $id=$_POST['id'];
	 $a=$_POST['idCatEq'];
	 $b=$_POST['designMat'];
	 $c=$_POST['qnteMat'];
	 $d=$_POST['puMat'];
	 $e=$_POST['marque'];

	$req=$bd->prepare('UPDATE materiel SET idCatEq = ? ,designMat = ?,quantite = ?,prixAchat = ?,marque = ? WHERE idMat = ?');
	$req->execute(array($a,$b,$c,$d,$e,$id));
	header('location:materiel.php');					            
 ?>
							  