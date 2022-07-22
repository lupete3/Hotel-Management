<?php 
	require_once ('../security_eco.php');
	require_once('bd_cnx.php');
	$id =$_POST['id'];
	$a=$_POST['qteComNour'];
						  
	$req=$bd->prepare('UPDATE commandenour SET qteComNour=? WHERE idComNour=?');
	if ($req->execute(array($a,$id)))
		header('location:comListNour.php');
		
 ?>