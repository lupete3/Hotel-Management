<?php 
	require_once ('../security_recept.php'); ;
	require_once('bd_cnx.php');
	if (isset($_POST['id'])) {
		$id =$_POST['id'];
		$a='Busy';
		$b='CheckIn';
		$c = 'Occupée';

		$req=$bd->prepare('SELECT * FROM booking WHERE id_booking=?');
		$req->execute(array($id));
		$don=$req->fetch(PDO::FETCH_ASSOC);
		$id_room = $don['num_chambre'];

		$req1 = $bd->prepare('UPDATE rooms SET statut=?,motif=? WHERE id_room=?');
		$req1->execute(array($a,$c,$id_room));
		
	    $req1 = $bd->prepare('UPDATE booking SET statut_booking=? WHERE id_booking=?');
		$req1->execute(array($b,$id));
		header('location:listReserv.php');
	}elseif (isset($_POST['idD'])) {
		$id =$_POST['idD'];
		$c='CheckOut';
		$d='Hors usage';
		$e = 'Nettoyage';
		$req=$bd->prepare('SELECT * FROM booking WHERE id_booking=?');
		$req->execute(array($id));
		$don=$req->fetch(PDO::FETCH_ASSOC);
		$id_room = $don['num_chambre'];

	    $req1 = $bd->prepare('UPDATE rooms SET statut=?,motif=? WHERE id_room=?');
		$req1->execute(array($d,$e,$id_room));
		
	    $req1 = $bd->prepare('UPDATE booking_historique SET statut_booking=? WHERE id_booking=?');
		$req1->execute(array($c,$id));

		$req1 = $bd->prepare('DELETE FROM booking WHERE id_booking=?');
		$req1->execute(array($id));
		header('location:listReservCh.php');


	}
 ?>
							