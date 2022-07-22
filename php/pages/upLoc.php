<?php 
	require_once ('../security_recept.php'); 
	require_once('bd_cnx.php');
	

	$id =$_POST['id'];
	$book_date = date('Y-m-d');  
	$dateJour = date('Y-m-d');
	$org = $_POST['organisation'];
	$salle = $_POST['salle'];
	$dateDebut = $_POST['dateDebut'];
	$dateFin = $_POST['dateFin'];
	$typeLoc = $_POST['typeLoc'];
	$reduction = $_POST['reduction'];

	$salleExist = $bd->prepare('SELECT * FROM location WHERE dateDebut =? || dateDebut = ? || dateFin = ? || dateFin = ? || dateDebut BETWEEN ? AND ? || dateFin BETWEEN ? AND ? AND idSalle = ? ');
	$salleExist->execute(array($dateDebut,$dateFin,$dateDebut,$dateFin,$dateDebut,$dateFin,$dateDebut,$dateFin,$salle));
	$salleTrouv = $salleExist->fetch(PDO::FETCH_ASSOC);

	$nj= (strtotime($dateFin) - strtotime($dateDebut));
					        
	$nbrjour = number_format($nj/86400 ,0);
					        
	$puSalle = $bd->prepare('SELECT prixSalle FROM salle WHERE idSalle =? ');
	$puSalle->execute(array($salle));
	$p_u = $puSalle->fetch(PDO::FETCH_ASSOC);
					        
	$PT =  ($p_u['prixSalle'] * $nbrjour)-$reduction;

	if ($salleTrouv) { 
		header('Location:listLocation.php?msg=1');

	 }else if ($dateDebut < $dateJour || $dateFin < $dateJour || $dateFin < $dateDebut) { 
				header('Location:listLocation.php');
			 }else{
				$add = $bd->prepare('UPDATE location SET idOrg = ? , idSalle = ?,typeLoc = ?, dateDebut = ? ,dateFin = ?, nbrejour = ?, reduction = ?, ptLoc = ? WHERE idLoc = ?');
				$add->execute(array($org,$salle,$typeLoc,$dateDebut,$dateFin,$nbrjour,$reduction,$PT,$id));
				if ($add) { 
					header('Location:listLocation.php');
				 }else{ 
				 	header('Location:listLocation.php');
					 }

				}
		
 ?>