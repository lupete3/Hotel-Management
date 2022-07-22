<?php 
	require_once ('../security_brmn.php');  
	require_once('bd_cnx.php');
	
    
	$id =$_POST['id'];
	$mt = $_POST['mtDep'];
	$mtD = $_POST['motifDep'];
	$mode=$_POST['modePaie'];

	$franc=$bd->query("SELECT * FROM devise WHERE idDevise=1");
		$fc = $franc->fetch(PDO::FETCH_ASSOC);
	$devise=$fc['devise'];
	$taux=$fc['taux'];
	$montant =(($mode=='USD')?$mt:number_format($mt/$taux,2));
	
					          
	$add = $bd->prepare('UPDATE depensepdv SET montantDp = ?, motifDp =?  WHERE idDep= ?');
	$add->execute(array($montant,$mtD,$id));
    header('location:depensePdv2.php');
	
 ?>
							  