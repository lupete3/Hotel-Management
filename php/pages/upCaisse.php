<?php 
	require_once ('../security_recept.php'); 
	require_once('bd_cnx.php');
	

	$id =$_POST['id'];
	$mt = $_POST['mEntreCaisse'];
	$mtC = $_POST['mtCaisse'];
	$motif = $_POST['motifEntreCaisse'];
	
	$add = $bd->prepare('UPDATE entreecaisse SET montantEntree = ?, motifEntree =? WHERE idEntreecaiss= ?');
	$add->execute(array($mt,$motif,$id));


	if ($add) {
		$req = $bd->query('SELECT montantCaisse FROM caisse');
		$don=$req->fetch(PDO::FETCH_ASSOC);
		$a=$don['montantCaisse']-$mtC+$mt;

		$req = $bd->prepare('UPDATE  caisse SET montantCaisse=?');
		$req->execute(array($a));

			header('location:entreecaisse.php');
		}
 ?>
							  