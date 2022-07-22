<?php
	require_once ('../security_admin.php');
	require_once("bd_cnx.php");
	$id=$_POST['id'];
    $st='Validé';

    $req=$bd->prepare("SELECT * FROM commande WHERE idCom=?");
    $req->execute(array($id));
    $don=$req->fetch(PDO::FETCH_ASSOC);

    $qteDem =$don['qteCom'];
    $idPv =$don['idPv'];
    $idBoiss =$don['idBoiss'];

    $req=$bd->prepare('SELECT * FROM stockpv WHERE idBoiss=? AND idpv=?');
	$req->execute(array($idBoiss,$idPv));
	if($don=$req->fetch(PDO::FETCH_ASSOC)){
		$req=$bd->prepare('SELECT * FROM prodboiss WHERE idBoiss=?');
		$req->execute(array($idBoiss));
		$don=$req->fetch(PDO::FETCH_ASSOC);
		$qte = $don['qnteBoiss'];
		if ($qteDem<=$qte) {
			$qte-=$qteDem;
			$nbre = $don['nbUniteBoiss'];
			$val=$nbre*$qte;

			$req=$bd->prepare('UPDATE prodboiss SET qnteBoiss=?, valUnitBoiss=? WHERE idBoiss=?');
			$req->execute(array($qte,$val,$idBoiss));

			$req=$bd->prepare("INSERT INTO sortieboiss(qnteSort,idBoiss,idPv,idCom)VALUES(?,?,?,?)");
			$req->execute(array($qteDem,$idBoiss,$idPv,$id));

			$req=$bd->prepare('SELECT * FROM stockpv WHERE idBoiss=? AND idpv=?');
			$req->execute(array($idBoiss,$idPv));
			$don=$req->fetch(PDO::FETCH_ASSOC);
			$qte = $don['qtStock'];

			$qtePiecePv=$qteDem*$nbre; 
			$qte+=$qtePiecePv;

			$req=$bd->prepare("UPDATE stockpv SET qtStock=? WHERE idBoiss=? AND idpv=?");
			$req->execute(array($qte,$idBoiss,$idPv));

		    $req=$bd->prepare('UPDATE commande SET statutCom=?  WHERE idCom=? AND idPv=?');

			if ($req->execute(array($st,$id,$idPv))){
				header('location:comListBoissA.php?msg=1');
			}
		}else{
			header('location:comListBoissA.php?msg=2');
		}	
	}else{
		header('location:comListBoissA.php?msg=3');
	}
	
    
?>