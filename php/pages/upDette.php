<?php 
	require_once('../security_cpt.php');
	require_once('bd_cnx.php');
	$id =$_POST['id'];
	$a=$_POST['reste'];
	$c='Cash';
	
	if ($a==0) {
		$etatFact='close';
		$req1 = $bd->prepare('UPDATE facturation SET reste=?,modePaieFact=?,etatFact=? WHERE id_client=?');
		$req1->execute(array($a,$c,$etatFact,$id));
		header('location:nosCreances.php');
	}else{

		$req=$bd->prepare("SELECT COUNT(*) AS nbre FROM facturation AS A INNER JOIN client AS B ON B.id_client=A.id_client WHERE modePaieFact='Crédit' AND B.id_client=? AND etatFact='wait' ");
        $req->execute(array($id));
        $don=$req->fetch(PDO::FETCH_ASSOC);
        $c='Crédit';
        $mt=$a/$don['nbre'];
        $etatFact='wait';

		$req1 = $bd->prepare('UPDATE facturation SET reste=?,modePaieFact=?,,etatFact=? WHERE id_client=?');
		$req1->execute(array($mt,$c,$etatFact,$id));
		header('location:nosCreances.php');
	}

		
 ?>
							  