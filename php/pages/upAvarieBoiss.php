<?php 
	require_once ('../security_eco.php');
	require_once('bd_cnx.php');
	$id =$_POST['id'];
	$a=$_POST['idBoiss'];
	$b=$_POST['qteAv'];
	$c=$_POST['motif'];
						  
	$req=$bd->prepare('UPDATE avarieboiss SET qteBoissAv=?, motifPvBoiss=?, idBoiss = ? WHERE idBoissAv=?');
	if ($req->execute(array($b,$c,$a,$id)))
		header('location:avarieBoiss.php');
		
 ?>