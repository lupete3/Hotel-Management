<?php 
	require_once ('../security_brmn.php'); 
	require_once('bd_cnx.php');
	$id =$_POST['id'];
	$a=$_POST['nomSalle'];
	$b=$_POST['prixSalle'];
						  
	$req=$bd->prepare('UPDATE salle SET nomSalle=?, prixSalle=? WHERE idSalle=?');
	if ($req->execute(array($a,$b,$id)))
		header('location:salle.php');
		
 ?>