<?php
	require_once ('../security_admin.php');
	require_once("bd_cnx.php");
	$id=$_POST['id'];
    $st='Validé';

    $req=$bd->prepare("SELECT * FROM commandenour WHERE idComNour=?");
    $req->execute(array($id));
    $don=$req->fetch(PDO::FETCH_ASSOC);
    $qteDem =$don['qteComNour'];
    $idPv =$don['idPv'];
    $idNour =$don['idNour'];

    $req=$bd->prepare('SELECT * FROM prodnour WHERE idNour=?');
	$req->execute(array($idNour));
	$don=$req->fetch(PDO::FETCH_ASSOC);
	$qte = $don['qnteNour'];
	
	$nbre = $don['nbUniteNour'];
	$val=$nbre*$qte;
	if ($qteDem<=$qte) {
		$qte-=$qteDem;
		$req=$bd->prepare('UPDATE prodnour SET qnteNour=?, valUnitNour=? WHERE idNour=?');
		$req->execute(array($qte,$val,$idNour));

		$req=$bd->prepare("INSERT INTO sortienour(qnteSortNour,idNour,idPv,idComNour)VALUES(?,?,?,?)");
		$req->execute(array($qteDem,$idNour,$idPv,$id));

		$req=$bd->prepare('UPDATE commandenour SET statutComNour=?  WHERE idComNour=? AND idPv=?');

			if ($req->execute(array($st,$id,$idPv))){
				$req=$bd->prepare('SELECT * FROM stockcuisine WHERE idNour=?');
				$req->execute(array($idNour));
				$don=$req->fetch(PDO::FETCH_ASSOC);
				$qte = $don['qtStockCuis'];
				$qte+=($nbre*$qteDem);

				$req=$bd->prepare('UPDATE stockcuisine SET qtStockCuis=?  WHERE idNour=?');
				$req->execute(array($qte,$idNour));
				header('location:comListNourA.php?msg=1');
			}
		}else{
			header('location:comListNourA.php?msg=2');
	}
?>