<?php 
	require_once ('../security_recept.php'); 
	require_once('bd_cnx.php');
	

	$id =$_POST['id'];
	$mt = $_POST['mEntreBanque'];
	$motif = $_POST['motifEntreBanque'];
	$mtC = $_POST['mtBanque'];
	
	$add = $bd->prepare('UPDATE entreebanque SET montantEntreeBanque = ?, motifEntreeBanque =? WHERE idEntreeBanque= ?');
	$add->execute(array($mt,$motif,$id));


	if ($add) {
			$req = $bd->query('SELECT montantBanque FROM banque');
			$don=$req->fetch(PDO::FETCH_ASSOC);
			$a=$don['montantBanque']-$mtC+$mt;

			$req = $bd->prepare('UPDATE  banque SET montantBanque=?');
			$req->execute(array($a));
			header('location:entreeBanque.php');
		}
 ?>
							  