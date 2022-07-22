<?php 
	require_once ('../security_admin.php');  
	require_once('bd_cnx.php');
	$id =$_POST['id'];
	$a=$_POST['designation'];
    $b=$_POST['zone'];
    
    $req1 = $bd->prepare('UPDATE tablepv SET designTable=?,zone=?  WHERE idTable=?');
	$req1->execute(array($a,$b,$id));
	header('location:table.php');
	

		
 ?>
							  