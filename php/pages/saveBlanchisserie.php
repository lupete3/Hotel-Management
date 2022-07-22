<?php 
	require_once ('../security_recept.php'); 
	require_once('bd_cnx.php');
	$idVet =$_POST['idVetement'];
	$a=$_POST['id_client'];
	$b=$_POST['id_type'];
	$accompte=0;
	$c=htmlspecialchars($_POST['nbreBl']);

	$req=$bd->prepare("SELECT * FROM vetement WHERE idVetement=? AND typeBl=?");
	$req->execute(array($idVet,$b));
	$don=$req->fetch(PDO::FETCH_ASSOC);
	$pu =$don['prix'];
	$etat='wait';
	$pt=$pu*$c;
	$reste = $pt - $accompte;

	$req=$bd->prepare("INSERT INTO blanchisserie(idVetement,id_client,ptBl,etatBl,nbreBl,accompte,reste)VALUES(?,?,?,?,?,?,?)");
	$req->execute(array($idVet,$a,$pt,$etat,$c,$accompte,$reste));
     
     $req=$bd->query("SELECT idBl FROM blanchisserie ORDER BY idBl  DESC LIMIT 1");
	 $don = $req->fetch(PDO::FETCH_ASSOC);
	$idBl=$don['idBl'];

	$design='Blanchisserie'.' ('.date('d-m-Y').')';
    $modePaie=(($reste==0)?'Cash':'Crédit');

	/*$diff='BL';
    $facturation =$bd->prepare('INSERT INTO facturation(designActivite,qteFact,puFact,ptFact,modePaieFact,idOperation,diffIndex,accompte,reste,id_client)VALUES(?,?,?,?,?,?,?,?,?,?)');
					        
	$facturation->execute(array($design,$c,$pu,$pt,$modePaie,$idBl,$diff,$accompte,$reste,$a));*/
	
	header('location:blanchisserie.php?msg=1');
		
 ?>