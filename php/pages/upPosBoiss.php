<?php 
	//require_once ('../security_eco.php');
	require_once('bd_cnx.php');
	$idPanier =$_POST['idPanier'];
	$a=$_POST['tableId'];
	$id =$_POST['idStock'];
	$o=$_POST['idServeur'];
	$qteAvant=$_POST['qteAvant'];
	$c=htmlspecialchars($_POST['qteSort']);
	$d=1;

	
	$req=$bd->prepare("SELECT * FROM stockpv WHERE idStock=?");
	$req->execute(array($id));
	$don=$req->fetch(PDO::FETCH_ASSOC);
	$idBoiss=$don['idBoiss'];
	$qteStock=$don['qtStock']+$qteAvant;

	$req=$bd->prepare("UPDATE stockpv SET qtStock=? WHERE idStock=?");
	$req->execute(array($qteStock,$id));
	$qteStock-=$c;
	

	$req=$bd->prepare("SELECT * FROM prodboiss WHERE idBoiss=?");
	$req->execute(array($idBoiss));
	$don=$req->fetch(PDO::FETCH_ASSOC);
	$design =$don['designBoiss'];
	$pu =$don['puBoiss'];
	$etat='wait';
	$pt=$pu*$c;
	$product='B';
	if ($c>$qteStock) {
		header('location:venteRestaurant.php?msg=2');
	}else{
		$req=$bd->prepare("UPDATE stockpv SET qtStock=? WHERE idStock=?");
		$req->execute(array($qteStock,$id));

		

		$req=$bd->prepare("UPDATE panier SET designation=?,qtePanier=?,puPanier=?,ptPanier=?,id_serveur=?,idTable=? WHERE idPanier=?");
		$req->execute(array($design,$c,$pu,$pt,$o,$a,$idPanier));
		
		header('location:venteRestaurant.php?msg=4');
	}

	

		
 ?>