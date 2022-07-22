<?php 
	require_once('../security_recept.php');
	require_once('bd_cnx.php');
	$id =$_POST['id'];
	$a=$_POST['designation'];
	$b=$_POST['prix'];
    $d=$_POST['typeBl'];
	

	$verif=$bd->prepare("SELECT * FROM  vetement WHERE designation=?");
	$verif->execute(array($i));
	if ($don=$verif->fetch($a)) {
		header('location:vetement.php');
	}else{
		$req1 = $bd->prepare('UPDATE vetement SET designation=?,prix=?,typeBl=? WHERE idVetement=?');
		$req1->execute(array($a,$b,$d,$id));
	    header('location:vetement.php');
	}

		
 ?>
							  