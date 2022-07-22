<?php 
	require_once ('../security_brmn.php'); 
	require_once('bd_cnx.php');
	$point=isset($_SESSION['profil']['agent5'])?$_SESSION['profil']['agent5']['idPv']:'';

	$id =$_POST['idSup'];
	$o=$_POST['idServeur'];
	$qteAvant=$_POST['qteAvant'];
	$c=htmlspecialchars($_POST['qteSort']);

	$req=$bd->prepare("SELECT * FROM panier WHERE idPanier=?");
	$req->execute(array($id));
	$don1=$req->fetch(PDO::FETCH_ASSOC);

	if ($don1['product']=='B') {
		$req=$bd->prepare("SELECT * FROM stockpv as A INNER JOIN prodboiss as B ON B.idBoiss=A.idBoiss WHERE designBoiss=? AND idPv=?");
		$req->execute(array($don1['designation'],$point));
		$don=$req->fetch(PDO::FETCH_ASSOC);
		$idBoiss=$don['idBoiss'];
		$qteStock=$don['qtStock']+$don1['qtePanier'];

		$req=$bd->prepare("UPDATE stockpv SET qtStock=? WHERE idBoiss=? AND idPv=?");
		$req->execute(array($qteStock,$idBoiss,$point));
		
		$req=$bd->prepare("DELETE FROM panier WHERE idPanier=?");
		$req->execute(array($id));
		header('location:venteRestaurant.php');
	}elseif ($don1['product']=='P') {

		$req = $bd->prepare("SELECT * FROM plat WHERE designPlat = ?");
		$req->execute(array($don1['designation']));
		$don=$req->fetch(PDO::FETCH_ASSOC);
		$idPlat=$don['idPlat'];

		$req = $bd->prepare("SELECT * FROM configcuisine WHERE idPlat = ?");
		$req->execute(array($idPlat));


		while($don=$req->fetch()):

			$idNour = $don['idStockCuis'];
			$qteSortie = $don['qteSortie'] * $don1['qtePanier'];

			$req1 = $bd->prepare("SELECT * FROM stockcuisine WHERE idStockCuis = ?");
			$req1->execute(array($idNour));

			$don = $req1->fetch(PDO::FETCH_ASSOC);

				$qnteExist = $don['qtStockCuis'] + $qteSortie;
			
			          			

			$req2 = $bd->prepare("UPDATE stockcuisine SET qtStockCuis = ? WHERE idStockCuis = ?");
			$req2->execute(array($qnteExist,$idNour));

		endwhile;

		$req=$bd->prepare("DELETE FROM panier WHERE idPanier=?");
		$req->execute(array($id));
		header('location:venteRestaurant.php');
	}	

		
 ?>