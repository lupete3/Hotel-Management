<?php 
	require_once ('../security_eco.php');
	require_once('bd_cnx.php');
	$id =$_POST['id'];
	$a=$_POST['qnteDiv'];
	$b=$_POST['designation'];
	$c=$_POST['pu'];
						  
	$verif=$bd->prepare("SELECT * FROM stockdivers WHERE designation=?");
	$verif->execute(array($b));
	if ($don=$verif->fetch()) {
		$req1 = $bd->prepare('UPDATE stockdivers SET qnteDiv=?,pu=? WHERE idDiv=?');
		$req1->execute(array($a,$c,$id));
		header('location:stockDivers.php');
	}else{
		$req1 = $bd->prepare('UPDATE stockdivers SET qnteDiv=?,designation=?,pu=? WHERE idDiv=?');
		$req1->execute(array($a,$b,$c,$id));
		header('location:stockDivers.php');
	}

		
 ?>