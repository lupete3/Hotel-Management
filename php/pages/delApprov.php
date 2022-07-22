<?php 
	require_once('bd_cnx.php');
	$id = $_POST['id'];
	$del = $bd->prepare('DELETE FROM approvboiss WHERE idApprovBoiss=?');
	$del->execute(array($id));
	header('location:approvBoiss.php');
 ?>