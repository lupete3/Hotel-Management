<?php 
	require_once ('../security_admin.php'); 
	require_once('bd_cnx.php');
	$id =$_POST['id'];
	$qte =$_POST['qnteSortie'];
	$unite =$_POST['unite'];
	
		$req1 = $bd->prepare('UPDATE configcuisine SET qteSortie=?,unite=? WHERE idConfCuisine=?');
		$req1->execute(array($qte,$unite,$id));	
		header('location:confNour.php');	
 ?>
							  