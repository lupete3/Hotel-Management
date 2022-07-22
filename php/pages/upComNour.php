<?php 
	require_once ('../security_brmn.php'); 
	require_once('bd_cnx.php');
	$id =$_POST['id'];
	$a=$_POST['idNour'];
	$b=$_POST['qteComNour'];
						  
	$req=$bd->prepare('UPDATE commandenour SET idNour=?, qteComNour=? WHERE idComNour=?');
	if ($req->execute(array($a,$b,$id)))
		header('location:comNour.php');
		
 ?>