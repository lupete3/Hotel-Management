<?php
	require_once ('../security_admin.php');
	require_once("bd_cnx.php");
	$id=$_POST['id'];
    $st='Validé';

    $req=$bd->prepare("SELECT * FROM comcuisine WHERE idComCuis=?");
    $req->execute(array($id));
    $don=$req->fetch(PDO::FETCH_ASSOC);
    $qteDem =$don['qteComDiv'];
    $idDiv =$don['idDivCuis'];

    $req=$bd->prepare('SELECT * FROM diverscuisine WHERE idDivCuis=?');
	$req->execute(array($idDiv));
	$don=$req->fetch(PDO::FETCH_ASSOC);
	$qte = $don['qteDivCuis'];
	$pu = $don['prixDivCuis'];
	if ($qteDem<=$qte) {
		$qte-=$qteDem;
		$pt = $pu*$qte;

		$req=$bd->prepare('UPDATE diverscuisine SET qteDivCuis=? WHERE idDivCuis=?');
		$req->execute(array($qte,$idDiv));

		$req=$bd->prepare("INSERT INTO sortiecuisine(qteSortie,ptSortDiv,idDivCuis)VALUES(?,?,?)");
		$req->execute(array($qteDem,$pt,$idDiv));

		$req=$bd->prepare('UPDATE comcuisine SET statutComDiv=?  WHERE idComCuis=?');

			if ($req->execute(array($st,$id))){
				header('location:comListDivCuisA.php?msg=1');
			}
		}else{
			header('location:comListDivCuisA.php?msg=2');
	}
?>