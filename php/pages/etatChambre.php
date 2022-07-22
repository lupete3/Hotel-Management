<?php 
	require_once ('../security_hskp.php');;
	require_once('bd_cnx.php');
	if (isset($_POST['id'])) {
		$id =$_POST['id'];
		$a='Disponible';
		$b='prete';
	    $req1 = $bd->prepare('UPDATE rooms SET statut=?,motif=? WHERE id_room=?');
		$req1->execute(array($a,$b,$id));
		header('location:houseKeeping.php');
	}elseif (isset($_POST['idD']) AND isset($_POST['motif'])) {
		$id =$_POST['idD'];
		$c='Hors usage';
		$motif=$_POST['motif'];

	    $req1 = $bd->prepare('UPDATE rooms SET statut=?,motif=? WHERE id_room=?');
		$req1->execute(array($c,$motif,$id));
		header('location:houseKeeping.php');
	}
		
 ?>
							  