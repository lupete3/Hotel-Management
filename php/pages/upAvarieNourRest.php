<?php 
	require_once ('../security_cuis.php'); 
	require_once('bd_cnx.php');
	$id =$_POST['id'];
	$a=$_POST['idNour'];
	$b=$_POST['qteAv'];
	$c=$_POST['motif'];
						  
	$req=$bd->prepare('UPDATE avarienour SET qteNourAv=?, motifPvNour=?, idNour = ? WHERE idNourAv=?');
	if ($req->execute(array($b,$c,$a,$id)))
		header('location:avarieNourCuis.php');
		
 ?>