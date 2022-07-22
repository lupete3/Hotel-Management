<?php 
	require_once ('../security_brmn.php'); 
	require_once('bd_cnx.php');
	$id =$_POST['id'];
	$a=$_POST['idBoiss'];
	$b=$_POST['qteCom'];
						  
	$req=$bd->prepare('UPDATE commande SET idBoiss=?, qteCom=? WHERE idCom=?');
	if ($req->execute(array($a,$b,$id)))
		header('location:comBoiss.php');
		
 ?>