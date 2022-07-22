<?php 
	require_once ('../security_recept.php'); 
	require_once('bd_cnx.php');
	$id =$_POST['id'];
	$a=$_POST['nbreBl'];
	$b=$_POST['id_client'];
	$d=$_POST['idVetement'];
    $k=$_POST['id_type'];

	$req=$bd->prepare("SELECT * FROM vetement WHERE idVetement=? AND typeBl=?");
	$req->execute(array($d,$k));
	$don=$req->fetch(PDO::FETCH_ASSOC);
	$pu =$don['prix'];
	$pt=$pu*$a;


	if (isset($_POST['id_client']) AND isset($_POST['idVetement'])) {
		$req1 = $bd->prepare('UPDATE blanchisserie SET nbreBl=?,id_client=?,ptBl=?,idVetement=? WHERE idBl=?');
		$req1->execute(array($a,$b,$pt,$d,$id));
	   header('location:blanchisserie.php?msg=2');
	}elseif (isset($_POST['id_client'])) {
		$req1 = $bd->prepare('UPDATE blanchisserie SET nbreBl=?,id_client=?, ptBl=? WHERE idBl=?');
		$req1->execute(array($a,$b,$pt,$id));
		 header('location:blanchisserie.php?msg=2');
	}elseif (isset($_POST['idVetement'])) {
		$req1 = $bd->prepare('UPDATE blanchisserie SET nbreBl=?,idVetement=?,ptBl=? WHERE idBl=?');
		$req1->execute(array($a,$d,$pt,$id));
		 header('location:blanchisserie.php?msg=2');
	}else{
		$req1 = $bd->prepare('UPDATE blanchisserie SET nbreBl=? ,ptBl=? WHERE idBl=?');
	$req1->execute(array($a,$pt,$id));
	   header('location:blanchisserie.php?msg=2');
	}

	

		
 ?>
		