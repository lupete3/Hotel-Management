
<?php 
	require_once ('../security_brmn.php'); 
	require_once('bd_cnx.php');
	$id =$_POST['id'];
	$a=$_POST['qteDivAvar'];
    $b=$_POST['motifDivAvar'];
	$d=$_POST['idDiv'];


	$verif=$bd->prepare("SELECT * FROM avariedivers WHERE idDivAvar=? ");
	$verif->execute(array($i));
	if ($don=$verif->fetch()) {
		header('location:avarieDiversRest.php');
	}else{
		$req1 = $bd->prepare('UPDATE avariedivers SET qteDivAvar=?,motifDivAvar=?,idDiv=? WHERE idDivAvar=?');
		$req1->execute(array($a,$b,$d,$id));
		header('location:avarieDiversRest.php');
	}

		
 ?>
