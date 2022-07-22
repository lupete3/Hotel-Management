<?php 
	require_once ('../security_recept.php'); 
	require_once('bd_cnx.php');
	$id =$_POST['id'];
	$a=$_POST['nom'];
    $b=$_POST['adresse'];
    $g=$_POST['contact'];
    $h=$_POST['sexe'];


    $req1 = $bd->prepare('UPDATE client SET nom_client=?,residence=?,telClient=?,sexe_client=?  WHERE id_client=?');
	$req1->execute(array($a,$b,$g,$h,$id));
	header('location:listClient.php');
	

		
 ?>
							  