<?php 
	//require_once ('../security_eco.php');
	require_once('bd_cnx.php');
	$idBoiss=$_POST['idBoiss'];
	$qte =$_POST['qte'];
	$pu=$_POST['pu'];
	

	
	$req=$bd->prepare("SELECT * FROM prodboiss WHERE idBoiss=?");
	$req->execute(array($idBoiss));
	$don=$req->fetch(PDO::FETCH_ASSOC);
	$design =$don['designBoiss'];
	$stock =$don['qnteBoiss'];
	$etat='wait';
	$pt=$pu*$qte;

	$req=$bd->prepare('INSERT INTO etatbesoin(article,qte,pu,pt,stock,etat) VALUES (?,?,?,?,?,?)');
	$req->execute(array($design,$qte,$pu,$pt,$stock,$etat));
	
	header('location:etatBesoin.php?msg=1');

		
 ?>