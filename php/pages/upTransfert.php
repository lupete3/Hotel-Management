<?php 
	require_once('../security_brmn.php');
	require_once('bd_cnx.php');
	$id =$_POST['id'];
	$point=isset($_SESSION['profil']['agent5'])?$_SESSION['profil']['agent5']['idPv']:'';

							
	$req=$bd->prepare('SELECT * FROM transfert WHERE idTrans=?');
	$req->execute(array($id));
	$don=$req->fetch(PDO::FETCH_ASSOC);
	$qte=$don['qte'];
	$idPv=$don['idPv'];
	$idBoiss=$don['idstock'];
	

	$req1=$bd->prepare("SELECT * FROM stockpv WHERE idPv=? AND idBoiss=?");
	$req1->execute(array($idPv,$idBoiss));
	$don1=$req1->fetch(PDO::FETCH_ASSOC);
	$qteAnc=$don1['qtStock']-$qte;
	

	$res=$bd->prepare("UPDATE stockpv SET qtStock=? WHERE idPv=? AND idBoiss=?");
	$res->execute(array($qteAnc,$idPv,$idBoiss));
	
	$req1=$bd->prepare("SELECT * FROM stockpv WHERE idPv=? AND idBoiss=?");
	$req1->execute(array($point,$idBoiss));
	$don1=$req1->fetch(PDO::FETCH_ASSOC);
	$qteAnc=$don1['qtStock']+$qte;

	$req=$bd->prepare("UPDATE stockpv SET qtStock=? WHERE idPv=? AND idBoiss=?");
	$req->execute(array($qteAnc,$point,$idBoiss));	

	$req = $bd->prepare("DELETE FROM transfert WHERE idTrans= ?");
	$req->execute(array($id)); 
	header('location:transfert.php');
		
 ?>
							  