<?php 
	require_once ('security_recept.php');
    require_once('bd_cnx.php');
	$id =$_POST['id'];
	$idBl=$_POST['idBl'];
	
	$accompte=$_POST['accompte'];
	$totQte=$_POST['totQte'];
	$totPu=$_POST['totPu'];
	$totGen=$_POST['totGen'];
	$reste = $totGen - $accompte;
	$typePaie =$_POST['typePaie'];

	$etat='wait';
	$etat2='close';
	$modePaie=(($reste==0)?'Cash':'Crédit');
	$etatFact=(($modePaie=='Cash')?'close':'wait');
    
	$req1 = $bd->prepare('UPDATE blanchisserie SET modePaie=?,etatBl=? WHERE id_client=? AND etatBl=? ');
	$req1->execute(array($modePaie,$etat2,$id,$etat));

	$design='Blanchisserie'.' ('.date('d-m-Y').')';

	$diff='BL';
	$facturation =$bd->prepare('INSERT INTO facturation(designActivite,qteFact,puFact,ptFact,modePaieFact,idOperation,diffIndex,accompte,reste,id_client,type,montantPaye,etatFact)VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?)');
					        
	$facturation->execute(array($design,$totQte,$totPu,$totGen,$modePaie,$idBl,$diff,$accompte,$reste,$id,$typePaie,$accompte,$etatFact));
	
	header('location:pages/blanchisserie.php');
	
		
 ?>