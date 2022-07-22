<?php
	require_once ('../security_admin.php');
	require_once("bd_cnx.php");
	$id=$_POST['id'];
    $st='validé';

    $req=$bd->prepare('UPDATE etatbesoin SET etat=? WHERE idEtat=?');
    $req->execute(array($st,$id));
    
		header('location:comListReq.php?msg=1');
?>