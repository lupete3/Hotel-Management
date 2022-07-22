<?php 
	require_once ('../security_admin.php'); 
	require_once('bd_cnx.php');
	$id =$_POST['id'];
	
		$req1 = $bd->prepare('DELETE FROM configcuisine WHERE idConfCuisine=?');
		$req1->execute(array($id));	
		header('location:confNour.php');	
 ?>
							  