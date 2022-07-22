<?php 
	require_once ('../security_eco.php');
	require_once('bd_cnx.php');
	$id =$_POST['id'];
	$a=$_POST['qnteDiv'];
	$b=$_POST['designation'];
	$c=$_POST['unite'];
						  
	$verif=$bd->prepare("SELECT * FROM diverscuisine WHERE designDivCuis=?");
	$verif->execute(array($b));
	if ($don=$verif->fetch()) {
		$req1 = $bd->prepare('UPDATE diverscuisine SET qteDivCuis=?,unite=? WHERE idDivCuis=?');
		$req1->execute(array($a,$c,$id));
		header('location:stockDivCuis.php');
	}else{
		$req1 = $bd->prepare('UPDATE diverscuisine SET qteDivCuis=?,designDivCuis=?,unite=? WHERE idDivCuis=?');
		$req1->execute(array($a,$b,$c,$id));
		header('location:stockDivCuis.php');
	}

		
 ?>