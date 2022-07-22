<?php 
	//require_once('securityA.php');
	require_once('bd_cnx.php');
	$id=$_POST['id'];
	$b=$_POST['idPlat'];
	$c=$_POST['nbrePlat'];
	$d=$_POST['modePaie'];
		        			
	$req=$bd->prepare('SELECT * FROM plat WHERE idPlat=?');
	$req->execute(array($b));
	$don=$req->fetch(PDO::FETCH_ASSOC);
	$pu=$don['puPlat'];
	$e=$pu*$c;
	$tva=$e*0.16;
						  
	$req=$bd->prepare('UPDATE sortiepvnour SET nbrePlat=?,idPlat=?,modePaie=?,ptPlat=?,tva=? WHERE idSortNour=?');
	if ($req->execute(array($c,$b,$d,$e,$tva,$id)))
		header('location:ventePvPlat.php');
		
 ?>