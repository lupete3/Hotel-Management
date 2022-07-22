<?php 
	//require_once('securityA.php');
	require_once('bd_cnx.php');
	$id =$_POST['id'];
	$a=$_POST['service'];

	$verif=$bd->prepare("SELECT * FROM service WHERE service_name=?");
	$verif->execute(array($a));
	if ($don=$verif->fetch()) {
		header('location:service.php');
	}else{
		$req1 = $bd->prepare('UPDATE service SET service_name=? WHERE id_service=?');
		$req1->execute(array($a,$id));
		header('location:service.php');
	}

		
 ?>
							  