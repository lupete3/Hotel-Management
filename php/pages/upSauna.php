<?php 
	require_once ('../security_cpt.php'); 
	require_once('bd_cnx.php');
	$id =$_POST['id'];
	$a=$_POST['client'];
	$accompte=$_POST['accompte'];
	$b=$_POST['activite'];
	$c=$_POST['pu'];
	$d=$_POST['mode'];
	$qte = 1;
	$nbrjour=$qte;
	$pt = $c *$nbrjour ;
	$reste=$pt-$accompte;
						  
	$req=$bd->prepare('UPDATE sauna SET designSauna = ?,qteSauna = ?,puSauna = ?,ptSauna = ?,modePaie = ?,id_client = ?,accompte = ? WHERE idSauna = ?');
	if ($req->execute(array($b,$qte,$c,$pt,$d,$a,$accompte,$id)))


	    $design='Sauna'.' ('.date('d-m-Y').')';
	    $diff='SA';
		
      
        $facturation =$bd->prepare('UPDATE facturation SET designActivite = ?,qteFact = ?,puFact = ?,ptFact = ?,accompte = ?,reste = ?,id_client = ? WHERE idOperation = ? AND diffIndex =? ');
					        
		$facturation->execute(array($design,$nbrjour,$c,$pt,$accompte,$reste,$a,$id,$diff));


		header('location:sauna.php');
		
 ?>