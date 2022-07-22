<?php 
	require_once ('../security_admin.php');
	require_once('bd_cnx.php');
	$id =$_POST['id'];
	$a=$_POST['qteComNour'];
						  
	$req=$bd->prepare('UPDATE commandenour SET qteComNour=? WHERE idComNour=?');
	if ($req->execute(array($a,$id)))
		header('location:comListNourA.php');
		
 ?>