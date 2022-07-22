<?php 
	require_once ('../security_eco.php');
	require_once('bd_cnx.php');
	$id =$_POST['id'];
	$a=$_POST['idDiv'];
	$b=$_POST['qnteApprovDiv'];
	$c=$_POST['puApprovDiv'];
	$four=$_POST['idFour'];
	$d = $c*$b;
	$accompte=$_POST['accompte'];

	$req=$bd->prepare('SELECT * FROM approvDiv WHERE idApprovDiv=?');
	$req->execute(array($id));
	$don=$req->fetch(PDO::FETCH_ASSOC);
	$qteApDiv = $don['qnteApprovDiv'];
	$idDiv = $don['idDiv'];

	//Recuperation de la quantite presente du produit
	$req=$bd->prepare('SELECT * FROM stockdivers WHERE idDiv=?');
	$req->execute(array($idDiv));
	$don=$req->fetch(PDO::FETCH_ASSOC);

	$qteSout = $don['qnteDiv']-$qteApDiv;
	//Modification qunatite produit
	$req=$bd->prepare('UPDATE stockdivers SET qnteDiv=? WHERE idDiv=?');
	$req->execute(array($qteSout,$idDiv));
	//-------------------------------------------------------


	$req=$bd->prepare('SELECT * FROM stockdivers WHERE idDiv=?');
	$req->execute(array($a));
	$don=$req->fetch(PDO::FETCH_ASSOC);
	$qte = $don['qnteDiv'];
	$qte+=$b;
							  
	$req=$bd->prepare('UPDATE stockdivers SET qnteDiv=? WHERE idDiv=?');
	$req->execute(array($qte,$a));
     
    $reste= $d-$accompte;
    $modeP=(($reste===0)?'Cash':'Crédit');

	$req=$bd->prepare('UPDATE approvdiv SET idDiv=?,qnteApprovDiv=?,puApprovDiv=?,ptApprovDiv=?,accompte=?,modepaie=?,reste=? WHERE idApprovDiv=?'); 
	if ($req->execute(array($a,$b,$c,$d,$accompte,$modeP,$reste,$id))){

			if($reste>0){

				$req=$bd->prepare('SELECT * FROM stockdivers WHERE idDiv=?');
				$req->execute(array($d));
				$don=$req->fetch(PDO::FETCH_ASSOC);
				$qte = $don['qnteDiv'];
				$design = $don['designation'];
				$diff='SD';

			    $detteFour =$bd->prepare('UPDATE  dettefour SET designProd=?,	qteDette=?,puDette=?,ptDette=?,modePaieDette=?,	diffIndex=?,accompte=?,reste=?,idFour=? WHERE  idOperation=?');
					        
			    $detteFour->execute(array($design,$b,$c,$d,$modeP,$diff,$accompte,$reste,$four,$id));

			}else {

	   	$detteFour =$bd->prepare("DELETE FROM dettefour  WHERE 	idOperation=?");
	   	$detteFour->execute(array($id));
	
	   }

	}

		header('location:approvDiv.php');
		
 ?>