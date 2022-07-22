<?php 
	require_once ('../security_eco.php');
	require_once('bd_cnx.php');
	$id =$_POST['id'];
	$a=$_POST['idBoiss'];
	$b=$_POST['idFour'];
	$accompte=$_POST['accompte'];
	$c=$_POST['qnteApprov'];
	$d=$_POST['puApprov'];
	$e = $c*$d;

	$req=$bd->prepare('SELECT * FROM approvboiss WHERE idApprovBoiss=?');
	$req->execute(array($id));
	$don=$req->fetch(PDO::FETCH_ASSOC);
	$qteApAv = $don['qnteApprov'];
	$idBois = $don['idBoiss'];
	//Recuperation de la quantite presente du produit
	$req=$bd->prepare('SELECT * FROM prodboiss WHERE idBoiss=?');
	$req->execute(array($idBois));
	$don=$req->fetch(PDO::FETCH_ASSOC);
	$nbre = $don['nbUniteBoiss'];
	$design = $don['designBoiss'];

	$qteSout = $don['qnteBoiss']-$qteApAv;
	$val=$nbre*$qteSout;
	//Modification qunatite produit
	$req=$bd->prepare('UPDATE prodboiss SET qnteBoiss=?,valUnitBoiss=? WHERE idBoiss=?');
	$req->execute(array($qteSout,$val,$idBois));
	//-------------------------------------------------------


	$req=$bd->prepare('SELECT * FROM prodboiss WHERE idBoiss=?');
	$req->execute(array($a));
	$don=$req->fetch(PDO::FETCH_ASSOC);
	$qte = $don['qnteBoiss'];
	$qte+=$c;
	$nbre = $don['nbUniteBoiss'];
	$val=$nbre*$qte;

	$reste= $e-$accompte;
    $modeP=(($reste===0)?'Cash':'Crédit');
							  
	$req=$bd->prepare('UPDATE prodboiss SET qnteBoiss=?, valUnitBoiss=? WHERE idBoiss=?');
	$req->execute(array($qte,$val,$a));

	$req=$bd->prepare('UPDATE approvBoiss SET idBoiss=?,idFour=?,qnteApprov=?,puApprov=?,ptApprov=?,accompte=?,modeAchat=?, reste=? WHERE idApprovBoiss=?'); 
	if ($req->execute(array($a,$b,$c,$d,$e,$accompte,$modeP,$reste,$id))){

		$req=$bd->query("SELECT idApprovBoiss FROM approvBoiss ORDER BY idApprovBoiss  DESC LIMIT 1");
	 	$don = $req->fetch(PDO::FETCH_ASSOC);
		$id=$don['idApprovBoiss'];
		$diff='BS';

		if($reste>0){

		$detteFour =$bd->prepare('UPDATE dettefour SET designProd=?,qteDette=?,puDette=?,ptDette=?,modePaieDette=?,	diffIndex=?,accompte=?,reste=?,idFour=? WHERE 	idOperation=?');
					        
		$detteFour->execute(array($design,$c,$d,$e,$modeP,$diff,$accompte,$reste,$b,$id));

	   }else {

	   	$detteFour =$bd->prepare("DELETE FROM dettefour  WHERE 	idOperation=?");
	   	$detteFour->execute(array($id));
	
	   }
		header('location:approvBoiss.php');
	}
		
 ?>