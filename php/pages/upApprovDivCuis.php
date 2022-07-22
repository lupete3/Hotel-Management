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

	$req=$bd->prepare('SELECT * FROM approvcuisine WHERE idApprovCuis=?');
	$req->execute(array($id));
	$don=$req->fetch(PDO::FETCH_ASSOC);
	$qteApDiv = $don['qteSortie'];
	$idDiv = $don['idDivCuis'];

	//Recuperation de la quantite presente du produit
	$req=$bd->prepare('SELECT * FROM diverscuisine WHERE idDivCuis=?');
	$req->execute(array($idDiv));
	$don=$req->fetch(PDO::FETCH_ASSOC);

	$qteSout = $don['qteDivCuis']-$qteApDiv;
	//Modification qunatite produit
	$req=$bd->prepare('UPDATE diverscuisine SET qteDivCuis=? WHERE idDivCuis=?');
	$req->execute(array($qteSout,$idDiv));
	//-------------------------------------------------------


	$req=$bd->prepare('SELECT * FROM diverscuisine WHERE idDivCuis=?');
	$req->execute(array($a));
	$don=$req->fetch(PDO::FETCH_ASSOC);
	$qte = $don['qteDivCuis'];
	$qte+=$b;
							  
	$req=$bd->prepare('UPDATE diverscuisine SET qteDivCuis=? WHERE idDivCuis=?');
	$req->execute(array($qte,$a));
     
    $reste= $d-$accompte;
    $modeP=(($reste===0)?'Cash':'Crédit');
	$req=$bd->prepare('UPDATE approvcuisine SET idDivCuis=?,qteSortie=?,puApprovDiv=?,ptApprovDiv=?,accompte=?,modepaie=?,reste=? WHERE idApprovCuis=?'); 
	if ($req->execute(array($a,$b,$c,$d,$accompte,$modeP,$reste,$id))){

			if($reste>0){

				$req=$bd->prepare('SELECT * FROM diverscuisine WHERE idDivCuis=?');
				$req->execute(array($d));
				$don=$req->fetch(PDO::FETCH_ASSOC);
				$qte = $don['qteDivCuis'];
				$design = $don['designDivCuis'];
				$diff='SD';

			    $detteFour =$bd->prepare('UPDATE  dettefour SET designProd=?,	qteDette=?,puDette=?,ptDette=?,modePaieDette=?,	diffIndex=?,accompte=?,reste=?,idFour=? WHERE  idOperation=?');
					        
			    $detteFour->execute(array($design,$b,$c,$d,$modeP,$diff,$accompte,$reste,$four,$id));

			}else {

	   	$detteFour =$bd->prepare("DELETE FROM dettefour  WHERE 	idOperation=?");
	   	$detteFour->execute(array($id));
	
	   }

	}

		header('location:approvDivCuis.php');
		
 ?>