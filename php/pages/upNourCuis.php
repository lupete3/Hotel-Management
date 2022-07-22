<?php 
	require_once ('../security_cuis.php');
	require_once('bd_cnx.php');
	 $id=$_POST['id'];
	 $qnte=$_POST['qnte'];
	 

		$req1 = $bd->prepare('UPDATE stockcuisine SET qtStockCuis=? WHERE idStockCuis=?');
		$req1->execute(array($qnte,$id));
		header('location:stockCuisine.php');
 ?>
							  