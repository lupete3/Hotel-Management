<?php 
	require_once ('../security_brmn.php'); 
	require_once('bd_cnx.php');
	$id =$_POST['id'];
	$a=$_POST['idDiv'];
	$b=$_POST['qteComDiv'];
						  
	$req=$bd->prepare('UPDATE comDivers SET idDiv=?, qteComDiv=? WHERE idComDiv=?');
	if ($req->execute(array($a,$b,$id)))
		header('location:comDiv.php');
		
 ?>