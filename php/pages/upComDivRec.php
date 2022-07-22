<?php 
	require_once ('../security_recept.php'); 
	require_once('bd_cnx.php');
	$id =$_POST['id'];
	$a=$_POST['idDiv'];
	$b=$_POST['qteComDiv'];
						  
	$req=$bd->prepare('UPDATE comDivers SET idDiv=?, qteComDiv=? WHERE idComDiv=?');
	if ($req->execute(array($a,$b,$id)))
		header('location:comDivRec.php');
		
 ?>