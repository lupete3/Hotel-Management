<?php 
	require_once ('../security_eco.php');
	require_once('bd_cnx.php');
	 $id=$_POST['idSup'];
	 

		$req1 = $bd->prepare('DELETE FROM diverscuisine WHERE idDivCuis=?');
		$req1->execute(array($id));
		header('location:stockDivCuis.php');
 ?>
							  