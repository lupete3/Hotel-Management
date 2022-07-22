<?php 
	//require_once ('../security_admin.php'); 
	require_once('bd_cnx.php');
	$id =$_POST['idSup'];
						  
	$req=$bd->prepare('DELETE FROM etatbesoin WHERE idEtat=?');
	if ($req->execute(array($id)))
		header('location:comListReq.php');
		
 ?>