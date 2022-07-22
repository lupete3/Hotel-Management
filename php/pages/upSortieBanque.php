<?php 
	require_once ('../security_recept.php'); 
	require_once('bd_cnx.php');
	

	$id =$_POST['id'];
	$mt = $_POST['mtBanque'];
	$mtC = $_POST['mSortieBanque'];
	$agent = $_POST['agent'];
	$motif = $_POST['motifSortieBanque'];


	$req = $bd->query('SELECT * FROM banque');
	$don=$req->fetch(PDO::FETCH_ASSOC);
	$qteStock = $don['montantBanque'];
	$seuil = $don['seuil'];
	$limit = (($qteStock - $seuil) + $mt);

	if ($mt <= $limit ) {
					          
		$add = $bd->prepare('UPDATE sortiebanque SET agent=?, montantSortieBanque = ?, motifSortieBanque =? WHERE idSortieBanque= ?');
		$add->execute(array($agent,$mtC,$motif,$id));


		if ($add) {
			$req = $bd->query('SELECT montantBanque FROM banque');
			$don=$req->fetch(PDO::FETCH_ASSOC);
			$a=$don['montantBanque']+$mt-$mtC;

			$req = $bd->prepare('UPDATE  banque SET montantBanque=?');
			$req->execute(array($a));

				header('location:sortieBanque.php');
		}
	}else{
		header('location:sortieBanque.php?msg=2');
	}
 ?>
							  