<?php 
	require_once ('../security_recept.php'); 
	require_once('bd_cnx.php');
	

	$id =$_POST['id'];
	$chambre = $_POST['chambre'];

	$a='Busy';
	$b = 'Occupée';

	$c='Hors usage';
	$d = 'Nettoyage';


	$req = $bd->prepare("SELECT * FROM booking WHERE id_booking=?");
	$req->execute(array($id));
	$don= $req->fetch(PDO::FETCH_ASSOC);
	$numRoom=$don['num_chambre'];
	$date_in=$don['date_in'];
	$date_out=$don['date_out'];
					        
	$chambreOccup = $bd->prepare("SELECT * FROM booking AS A INNER JOIN rooms AS B ON B.id_room = A.num_chambre WHERE B.id_room =? AND A.date_in = ? AND A.date_out=? AND A.date_in BETWEEN ? AND? AND A.date_out BETWEEN ? AND ? ");
	$chambreOccup->execute(array($numRoom,$date_in,$date_out,$date_in,$date_out,$date_in,$date_out));
	$chambreTrouv = $chambreOccup->fetch(PDO::FETCH_ASSOC);

	if ( $chambre == $numRoom ) { 
		header('location:listReservCh.php');
	}elseif ($chambreOccup->fetch(PDO::FETCH_ASSOC)) {
		header('location:listReservCh.php?msg=0');
	}else{
		$add = $bd->prepare('UPDATE booking SET num_chambre = ? WHERE id_booking = ?');
		$add->execute(array($chambre,$id));

		$add = $bd->prepare('UPDATE booking_historique  SET num_chambre = ? WHERE id_booking = ?');
		$add->execute(array($chambre,$id));

		$req1 = $bd->prepare('UPDATE rooms SET statut=?,motif=? WHERE id_room=?');
		$req1->execute(array($a,$b,$chambre));

		$req1 = $bd->prepare('UPDATE rooms SET statut=?,motif=? WHERE id_room=?');
		$req1->execute(array($c,$d,$numRoom));

		header('location:listReservCh.php?msg=3');
		
	}

		
 ?>
							  