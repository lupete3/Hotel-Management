<?php 
	require_once ('../security_admin.php');  
	require_once('bd_cnx.php');
	$id =$_POST['id'];
	$a=$_POST['nom'];
    $b=$_POST['adresse'];
    $g=$_POST['contact'];
    $h=$_POST['sexe'];


    $req1 = $bd->prepare('UPDATE serveur SET nom_serveur=?,adresse=?,telServeur=?,sexe_serveur=?  WHERE id_serveur=?');
	$req1->execute(array($a,$b,$g,$h,$id));
	header('location:listServeur.php');
	

		
 ?>
							  