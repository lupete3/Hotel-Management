<?php 
	require_once('../security_admin.php');
	require_once('bd_cnx.php');
	$id =$_POST['id'];
	$a=$_POST['room_prix'];

	$req1 = $bd->prepare('UPDATE rooms SET room_prix=? WHERE id_room=?');
	$req1->execute(array($a,$id));
	header('location:chambre.php');	
 ?>
							  