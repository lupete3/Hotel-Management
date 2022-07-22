<?php 
	//require_once ('../security_eco.php');
	require_once('bd_cnx.php');
	$idPanier=$_POST['idPanier'];
	$id =$_POST['idPlat'];
	$a=$_POST['tableId'];
	$o=$_POST['idServeur'];
	$c=htmlspecialchars($_POST['qteSort']);
	$d=1;
	
	$req=$bd->prepare("SELECT * FROM plat WHERE idPlat=?");
	$req->execute(array($id));
	$don=$req->fetch(PDO::FETCH_ASSOC);
	$design =$don['designPlat'];
	$pu =$don['puPlat'];
	$etat='wait';
	$pt=$pu*$c;
	$product='P';

	

	$req=$bd->prepare("UPDATE panier SET designation=?,qtePanier=?,puPanier=?,ptPanier=?,id_serveur=?,idTable=? WHERE idPanier=?");
	$req->execute(array($design,$c,$pu,$pt,$o,$a,$idPanier));
	
	header('location:venteRestaurant.php?msg=4');

		
 ?>