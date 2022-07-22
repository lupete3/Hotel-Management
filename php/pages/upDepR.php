<?php 
	require_once ('../security_recept.php'); 
	require_once('bd_cnx.php');
	
    
	$id =$_POST['id'];
	$mt = $_POST['mtDep'];
	$mtD = $_POST['motifDep'];
	
					          
	$add = $bd->prepare('UPDATE depensepdv SET montantDp = ?, motifDp =?  WHERE idDep= ?');
	$add->execute(array($mt,$mtD,$id));
    header('location:depensePdv.php');
	
 ?>
							  