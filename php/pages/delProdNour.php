<?php 
	require_once ('../security_eco.php');
	require_once('bd_cnx.php');
	 $id=$_POST['idSup'];
	 

		$req1 = $bd->prepare('DELETE FROM prodnour WHERE idNour=?');
		$req1->execute(array($id));
		header('location:produitNour.php');
 ?>
							  