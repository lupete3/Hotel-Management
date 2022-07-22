<?php 
	//require_once ('../security_eco.php'); 
	require_once('bd_cnx.php');
	$id =$_POST['id'];
	$a=$_POST['designation'];
	$b=$_POST['taux'];

	$verif=$bd->prepare("SELECT * FROM devise WHERE devise=? AND taux=?");
	$verif->execute(array($a,$b));
	if ($don=$verif->fetch()) {
		header('location:devise.php');
	}else{
		$req1 = $bd->prepare('UPDATE devise SET devise=?, taux=? WHERE idDevise=?');
		$req1->execute(array($a,$b,$id));
		header('location:devise.php');
	}

		
 ?>
							  