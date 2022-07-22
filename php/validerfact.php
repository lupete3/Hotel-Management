<?php 
	require_once ('security_brmn.php'); 
    require_once('bd_cnx.php');
	$id =$_POST['id'];
	$totQte =$_POST['totQte'];
	$totPu =$_POST['totPu'];
	$totGen =$_POST['totGen'];
	$client =$_POST['id_client'];
	$idPanier =$_POST['idPanier'];
	$accompte =$_POST['accompte'];
	$typePaie =$_POST['typePaie'];

	$reste = $totGen - $accompte;

	$modePaie=(($reste==0)?'Cash':'Crédit');
	$etatFact=(($modePaie=='Cash')?'close':'wait');

	$point=isset($_SESSION['profil']['agent5'])?$_SESSION['profil']['agent5']['idPv']:'';

	$res=$bd->query("SELECT * FROM pointvente WHERE idPv='$point'");
	$don=$res->fetch(PDO::FETCH_ASSOC);

	$design=$don['libPv'].' ('.date('d-m-Y').')';

	switch ($don['idPv']) {
		case 1:
			$diff='RE';
			break;
		case 2:
			$diff='TE';
			break;
		case 3:
			$diff='PB';
			break;
		case 4:
			$diff='NC';
			break;
	}

	
	$facturation =$bd->prepare('INSERT INTO facturation(designActivite,qteFact,puFact,ptFact,modePaieFact,idOperation,diffIndex,accompte,reste,id_client,type,montantPaye,etatFact)VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?)');
					        
	$facturation->execute(array($design,$totQte,$totPu,$totGen,$modePaie,$idPanier,$diff,$accompte,$reste,$client,$typePaie,$accompte,$etatFact));
	

	$etat='wait';
	$etat2='close';

	
	$req1 = $bd->prepare('UPDATE panier SET modePaie=?,etatPanier=? WHERE idTable=? AND etatPanier=? ');
	$req1->execute(array($modePaie,$etat2,$id,$etat));
	header('location:pages/venteRestaurant.php');
	
		
 ?>