<?php 
	require_once ('../security_recept.php');
	require_once('bd_cnx.php');
	$id =$_POST['id'];
	$a=$_POST['nomOrg'];
	$b=$_POST['adresse'];
	$c=$_POST['tel'];
	$d=$_POST['emailOrg'];

	$verif=$bd->prepare("SELECT * FROM organisation WHERE nomOrg=?");
	$verif->execute(array($a));
	if ($don=$verif->fetch()) {
		$req1 = $bd->prepare('UPDATE organisation SET adresse=?,tel=?,emailOrg=? WHERE idOrg=?');
		$req1->execute(array($b,$c,$d,$id));
		header('location:organisation.php');
	}else{
		$req1 = $bd->prepare('UPDATE organisation SET nomOrg=?,adresse=?,tel=?,emailOrg=? WHERE idOrg=?');
		$req1->execute(array($a,$b,$c,$d,$id));
		header('location:organisation.php');
	}

		
 ?>
							  