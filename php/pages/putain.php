<?php 
	require_once ('../security_brmn.php'); 
	require_once('bd_cnx.php');
	$id =$_POST['id'];
	$b=$_POST['qteCom'];
	//$b=$_POST['prixdevente'];
						  
	$req=$bd->prepare('UPDATE stockpv SET qtStock=? WHERE idstock=?');
	if ($req->execute(array($b,$id)))
		header('location:stockPV.php');
		
 ?>