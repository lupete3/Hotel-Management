<?php 
	require_once('../security_cpt.php');
	require_once('bd_cnx.php');
	$id =$_POST['id'];
	$a=$_POST['reste'];
	$c='Cash';
	
	if ($a==0) {
		
		$req1 = $bd->prepare('UPDATE location SET reste=?,modepaie=? WHERE idOrg=?');
		$req1->execute(array($a,$c,$id));
		header('location:nosCreancesOrg.php');
	}else{

		$req=$bd->prepare("SELECT COUNT(*) AS nbre FROM location AS A INNER JOIN organisation AS B ON B.idOrg=A.idOrg WHERE modepaie ='Crédit' AND B.idOrg=? ");
        $req->execute(array($id));
        $don=$req->fetch(PDO::FETCH_ASSOC);
        $c='Crédit';
        $mt=$a/$don['nbre'];
        

		$req1 = $bd->prepare('UPDATE location SET reste=?,modepaie=?  WHERE idOrg=?');
		$req1->execute(array($mt,$c,$id));
		header('location:nosCreancesOrg.php');
	}

		
 ?>
							  