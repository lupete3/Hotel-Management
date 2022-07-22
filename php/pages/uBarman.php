<?php 
	require_once('../security_admin.php');
	require_once('bd_cnx.php');
	$id =$_POST['id'];
	$a=$_POST['pdv'];
	$b=$_POST['brm_name'];
	$c=$_POST['brm_sex'];
	$d=$_POST['brm_phone'];
	$e=$_POST['brm_email'];
	$f=$_POST['mdp_brm'];
													
	
	$req1 = $bd->prepare('UPDATE barman SET idPv=?,brm_name=?,brm_sex=?,brm_phone=?,brm_email=?,mdp_brm=?  WHERE id_brm=?');
	$req1->execute(array($a,$b,$c,$d,$e,$f,$id));
	header('location:barman.php');
		
 ?>
							  