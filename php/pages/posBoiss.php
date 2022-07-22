<?php 
	require_once ('../security_brmn.php'); 
	require_once('bd_cnx.php');
	$point=isset($_SESSION['profil']['agent5'])?$_SESSION['profil']['agent5']['idPv']:'';

	
	$id =$_POST['idStock'];
	$a=$_POST['tableId'];
	$o=$_POST['idServeur'];
	$c=htmlspecialchars($_POST['qteSort']);
	
	$req=$bd->prepare("SELECT * FROM stockpv WHERE idBoiss=? AND idPv=?");
	$req->execute(array($id,$point));
	$don=$req->fetch(PDO::FETCH_ASSOC);
	$idBoiss=$don['idBoiss'];
	$qteStock=$don['qtStock'];
	$idstock=$don['idstock'];
	

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
		$qteStock-=$c;
		$req=$bd->prepare("UPDATE stockpv SET qtStock=? WHERE idstock=? AND idPv=?");
		$req->execute(array($qteStock,$idstock,$point));		

		$req=$bd->prepare("INSERT INTO panier(designation,qtePanier,idTable,puPanier,ptPanier,etatPanier,id_serveur,product,idPv)VALUES(?,?,?,?,?,?,?,?,?)");
		$req->execute(array($design,$c,$a,$pu,$pt,$etat,$o,$product,$point));
		
		header('location:venteRestaurant.php?msg=3');
	}

	

		
 ?>