<?php 
	require_once ('../security_brmn.php'); 
	require_once('bd_cnx.php');
	$id =$_POST['id'];
	$a=$_POST['idPlat'];
	$b=$_POST['qteAv'];
	$c=$_POST['motif'];
						  
	$req=$bd->prepare('UPDATE avarieplat SET qtePlatAv=?, motifPvPlat=?, idPlat = ? WHERE idPlatAv=?');
	if ($req->execute(array($b,$c,$a,$id)))
		header('location:avariePlat.php');
		
 ?>