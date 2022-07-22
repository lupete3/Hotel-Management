<?php 
	require_once ('../security_cpt.php'); 
	require_once('bd_cnx.php');
	$id =$_POST['id'];
	$a=$_POST['reste'];
	
	if ($a==0) {
		$req1 = $bd->prepare('DELETE FROM dettefour WHERE idFour=?');
		$req1->execute(array($id));
		header('location:nosDettes.php');
	}else{

		$req=$bd->prepare("SELECT COUNT(*) AS nbre FROM dettefour AS A INNER JOIN four AS B ON B.idFour=A.idFour WHERE modePaieDette='Crédit' AND B.idFour=?");
        $req->execute(array($id));
        $don=$req->fetch(PDO::FETCH_ASSOC);
        $c='Crédit';
        $mt=$a/$don['nbre'];

		$req1 = $bd->prepare('UPDATE dettefour SET reste=?  WHERE idFour=?');
		$req1->execute(array($mt,$id));
		header('location:nosDettes.php');
	}

		
 ?>
							  