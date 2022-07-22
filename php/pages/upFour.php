<?php 
	require_once ('../security_cpt.php'); 
	require_once('bd_cnx.php');
	$id =$_POST['id'];
	$a=$_POST['nomFour'];
	$b=$_POST['adresseFour'];
	$c=$_POST['telFour'];
						  
	$req=$bd->prepare('UPDATE four SET nomFour=?, adresseFour=?, telFour=? WHERE idFour=?');
	if ($req->execute(array($a,$b,$c,$id)))
		header('location:four.php');
		
 ?>