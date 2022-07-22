<?php 
	require_once ('../security_eco.php');
	require_once('bd_cnx.php');
	$id =$_POST['id'];
	$a=$_POST['qteCom'];
						  
	$req=$bd->prepare('UPDATE commande SET qteCom=? WHERE idCom=?');
	if ($req->execute(array($a,$id)))
		header('location:comListBoiss.php');
		
 ?>