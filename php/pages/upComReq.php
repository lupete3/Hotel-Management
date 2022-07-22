<?php 
	require_once ('../security_admin.php'); 
	require_once('bd_cnx.php');
	$id =$_POST['id'];
	$b=$_POST['qteCom'];
	$c=$_POST['pu'];
	$d=$b*$c;
						  
	$req=$bd->prepare('UPDATE etatbesoin SET qte=?,pt=? WHERE idEtat=?');
	if ($req->execute(array($b,$d,$id)))
		header('location:comListReq.php');
		
 ?>