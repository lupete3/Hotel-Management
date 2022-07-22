<?php 
	require_once ('../security_cuis.php');
	require_once('bd_cnx.php');
	 $id=$_POST['idSup'];
	 

		$req1 = $bd->prepare('DELETE FROM stockcuisine WHERE idStockCuis=?');
		$req1->execute(array($id));
		header('location:stockCuisine.php');
 ?>
							  