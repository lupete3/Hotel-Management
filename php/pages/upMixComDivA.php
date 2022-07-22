<?php
	require_once ('../security_admin.php');
	require_once("bd_cnx.php");
	$id=$_POST['id'];
    $st='Validé';

    $req=$bd->prepare("SELECT * FROM comDivers WHERE idComDiv=?");
    $req->execute(array($id));
    $don=$req->fetch(PDO::FETCH_ASSOC);
    $qteDem =$don['qteComDiv'];
    $poste =$don['poste'];
    $idDiv =$don['idDiv'];

    $req=$bd->prepare('SELECT * FROM stockdivers WHERE idDiv=?');
	$req->execute(array($idDiv));
	$don=$req->fetch(PDO::FETCH_ASSOC);
	$qte = $don['qnteDiv'];
	$pu = $don['pu'];
	if ($qteDem<=$qte) {
		$qte-=$qteDem;
		$pt = $pu*$qte;

		$req=$bd->prepare('UPDATE stockdivers SET qnteDiv=? WHERE idDiv=?');
		$req->execute(array($qte,$idDiv));

		$req=$bd->prepare("INSERT INTO sortiediv(qteSortDiv,ptSortDiv,idDiv,poste)VALUES(?,?,?,?)");
		$req->execute(array($qteDem,$pt,$idDiv,$poste));

		$req=$bd->prepare('UPDATE comDivers SET statutComDiv=?  WHERE idComDiv=? AND poste=?');

			if ($req->execute(array($st,$id,$poste))){
				header('location:comListDivA.php?msg=1');
			}
		}else{
			header('location:comListDivA.php?msg=2');
	}
?>