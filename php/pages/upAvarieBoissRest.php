<?php 
	require_once ('../security_brmn.php'); 
	require_once('bd_cnx.php');
	$id =$_POST['id'];
	$idPv=isset($_SESSION['profil']['agent5'])?$_SESSION['profil']['agent5']['idPv']:'';

	$req=$bd->prepare("SELECT * FROM avarieboiss WHERE idBoissAv=?");
	$req->execute(array($id));
	$don=$req->fetch(PDO::FETCH_ASSOC);
	$qteAv=$don['qteBoissAv'];
	$idBoiss=$don['idBoiss'];

	$req=$bd->prepare("SELECT * FROM stockpv AS A INNER JOIN pointvente AS B ON B.idPv=A.idPv WHERE idBoiss=? AND B.idPv=?");
	$req->execute(array($idBoiss,$idPv));
	$don=$req->fetch(PDO::FETCH_ASSOC);
	$qte=$don['qtStock']+$qteAv;	
	$req=$bd->prepare("UPDATE stockpv SET qtStock=? WHERE idBoiss=? AND idPv=?");
	$req->execute(array($qte,$idBoiss,$idPv));


	$req=$bd->prepare('DELETE FROM avarieboiss WHERE idBoissAv=?');
	$req->execute(array($id));
	header('location:avarieBoisRest.php');
		
 ?>