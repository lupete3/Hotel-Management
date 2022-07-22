<?php 
	require_once ('../security_eco.php');
	require_once('bd_cnx.php');
	$id =$_POST['id'];
	$a=$_POST['qteDivAvar'];
    $b=$_POST['motifDivAvar'];
	$d=$_POST['idDiv'];


	$verif=$bd->prepare("SELECT * FROM avariedivers WHERE idDivAvar=? ");
	$verif->execute(array($i));
	if ($don=$verif->fetch()) {
		header('location:avarieDivers.php');
	}else{
		$req1 = $bd->prepare('UPDATE avariedivers SET qteDivAvar=?,motifDivAvar=?,idDiv=? WHERE idDivAvar=?');
		$req1->execute(array($a,$b,$d,$id));
		header('location:avarieDivers.php');
	}

		
 ?>
							  