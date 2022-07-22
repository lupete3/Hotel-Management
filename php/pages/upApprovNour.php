<?php 
	require_once ('../security_eco.php');
	require_once('bd_cnx.php');
	$id =$_POST['id'];
	$a=$_POST['idNour'];
	$b=$_POST['idFour'];
	$c=$_POST['qnteApprov'];
	$d=$_POST['puApprov'];
	$f= $_POST['accompte'];
	$e = $c*$d;

	$reste = $e - $f;
	$mode = (($reste == 0)?'Cash':'Crédit');
	$diff='SN';


	$req=$bd->prepare('SELECT * FROM approvnour WHERE idApprovNour=?');
	$req->execute(array($id));
	$don=$req->fetch(PDO::FETCH_ASSOC);
	$qteApAv = $don['qnteApprov'];
	$idNour = $don['idNour'];
	//Recuperation de la quantite presente du produit
	$req=$bd->prepare('SELECT * FROM prodnour WHERE idNour=?');
	$req->execute(array($idNour));
	$don=$req->fetch(PDO::FETCH_ASSOC);
	$nbre = $don['nbUniteNour'];

	$qteSout = $don['qnteNour']-$qteApAv;
	$val=$nbre*$qteSout;
	//Modification qunatite produit
	$req=$bd->prepare('UPDATE prodnour SET qnteNour=?,valUnitNour=? WHERE idNour=?');
	$req->execute(array($qteSout,$val,$idNour));
	//-------------------------------------------------------


	$req=$bd->prepare('SELECT * FROM prodnour WHERE idNour=?');
	$req->execute(array($a));
	$don=$req->fetch(PDO::FETCH_ASSOC);
	$qte = $don['qnteNour'];
	$qte+=$c;
	$nbre = $don['nbUniteNour'];
	$val=$nbre*$qte;
							  
	$req=$bd->prepare('UPDATE prodnour SET qnteNour=?, valUnitNour=? WHERE idNour=?');
	$req->execute(array($qte,$val,$a));

	$req=$bd->prepare('UPDATE approvnour SET idNour=?,idFour=?,qnteApprov=?,puApprov=?,ptApprov=?,modeAchat=?,accompte=?,reste=? WHERE idApprovNour=?'); 
	if ($req->execute(array($a,$b,$c,$d,$e,$mode,$f,$reste,$id))){

		if ($reste > 0) {
			$detteFour =$bd->prepare('UPDATE dettefour SET designProd = ?,	qteDette = ?,puDette = ?,ptDette = ?,modePaieDette = ?,diffIndex = ?,accompte = ?,reste = ?,idFour = ? WHERE idOperation = ? AND diffIndex = ?');
							        
			$detteFour->execute(array($design,$c,$d,$e,$mode,$diff,$f,$reste,$b,$id,$diff));

			header('location:approvNour.php');
		}else if ($reste <= 0){
			$detteFour =$bd->prepare('DELETE FROM dettefour WHERE idOperation = ? AND diffIndex = ? ');
							        
			$detteFour->execute(array($id,$diff));

			header('location:approvNour.php');
		}
	}else{
		header('location:approvNour.php');
	}
		
 ?>