<?php 
	require_once ('../security_recept.php'); 
	require_once('bd_cnx.php');
	

	$id =$_POST['id'];
	$mt = $_POST['sortieCaisse'];
	$mtC = $_POST['mtCaisse'];
	$motif = $_POST['motifSortieCaisse'];
	$agent = $_POST['agent'];

	$req = $bd->query('SELECT * FROM caisse');
	$don=$req->fetch(PDO::FETCH_ASSOC);
	$qteStock = $don['montantCaisse'];
	$seuil = $don['seuil'];
	$limit = (($qteStock - $seuil) + $mtC);

	if ($mt <= $limit ) {
					          
		$add = $bd->prepare('UPDATE sortiecaisse SET montantSortie = ?, motifSortie =? , agent = ? WHERE idSortiecaiss= ?');
		$add->execute(array($mt,$motif,$agent,$id));


		if ($add) {
			$req = $bd->query('SELECT montantCaisse FROM caisse');
			$don=$req->fetch(PDO::FETCH_ASSOC);
			$a=$don['montantCaisse']+$mtC-$mt;

			$req = $bd->prepare('UPDATE  caisse SET montantCaisse=?');
			$req->execute(array($a));

				header('location:sortieCaisse.php');
		}
	}else{
		header('location:sortieCaisse.php?msg=2');
	}
 ?>
							  