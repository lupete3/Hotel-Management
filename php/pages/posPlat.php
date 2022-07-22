<?php 
	require_once ('../security_brmn.php'); 
	require_once('bd_cnx.php');
	$point=isset($_SESSION['profil']['agent5'])?$_SESSION['profil']['agent5']['idPv']:'';


	$id =$_POST['idPlat'];
	$a=$_POST['tableId'];
	$o=$_POST['idServeur'];
	$c=htmlspecialchars($_POST['nbrePlat']);

	$req=$bd->prepare("SELECT * FROM plat WHERE idPlat=?");
	$req->execute(array($id));
	$don=$req->fetch(PDO::FETCH_ASSOC);
	$design =$don['designPlat'];
	$pu =$don['puPlat'];
	$etat='wait';
	$pt=$pu*$c;
	$product='P';


	$req=$bd->prepare("INSERT INTO panier(designation,qtePanier,idTable,puPanier,ptPanier,etatPanier,id_serveur,product,idPv)VALUES(?,?,?,?,?,?,?,?,?)");
	$req->execute(array($design,$c,$a,$pu,$pt,$etat,$o,$product,$point));

		$req = $bd->prepare("SELECT * FROM configcuisine WHERE idPlat = ?");
		$req->execute(array($id));


		while($don=$req->fetch()):

			$idNour = $don['idStockCuis'];
			$qteSortie = $don['qteSortie'] * $c;

			$req1 = $bd->prepare("SELECT * FROM stockcuisine WHERE idStockCuis = ?");
			$req1->execute(array($idNour));

			$don1 = $req1->fetch();
			if (($don1['qtStockCuis'] - $qteSortie) < 0) {
				$qnteExist = 0;
			}else{
				$qnteExist = $don1['qtStockCuis'] - $qteSortie;
			}        			

			$req2 = $bd->prepare("UPDATE stockcuisine SET qtStockCuis = ? WHERE idStockCuis = ?");
			$req2->execute(array($qnteExist,$idNour));

		endwhile;

	
	header('location:venteRestaurant.php?msg=1');

		
 ?>