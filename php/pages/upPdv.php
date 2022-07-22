<?php 
	require_once('../security_admin.php');
	require_once('bd_cnx.php');
	$id =$_POST['id'];
	$a=$_POST['libPv'];

	$verif=$bd->prepare("SELECT * FROM pointvente WHERE libPv=?");
	$verif->execute(array($a));
	if ($don=$verif->fetch()) {
		header('location:pdv.php');
	}else{
		$req1 = $bd->prepare('UPDATE pointvente SET libPv=? WHERE idPv=?');
		$req1->execute(array($a,$id));
		header('location:pdv.php');
	}

		
 ?>
							  