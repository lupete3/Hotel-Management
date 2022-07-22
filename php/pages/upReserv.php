<?php 
	require_once ('../security_recept.php'); 
	require_once('bd_cnx.php');
	

	$id =$_POST['id'];
	$book_date = date('Y-m-d');  
	$date_out = $_POST['dateout_'];
	$accompte = $_POST['accompteBooking'];

	$req = $bd->prepare("SELECT * FROM booking WHERE id_booking=?");
	$req->execute(array($id));

	$don= $req->fetch(PDO::FETCH_ASSOC);
	$numRoom=$don['num_chambre'];
	$date_in=$don['date_in'];
	$reduction=$don['reduction'];
	$accompte2=$don['accompte'];
					        
	$nj= (strtotime($date_out) - strtotime($date_in));
					        
	$nbrjour = number_format($nj/86400 ,0);
					        
	$pu_room = $bd->prepare('SELECT room_prix FROM rooms WHERE id_room =? ');
	$pu_room->execute(array($numRoom));
	$p_u = $pu_room->fetch(PDO::FETCH_ASSOC);
					        
	$PT =  ($p_u['room_prix'] * $nbrjour) - ($reduction * $nbrjour);
	$pu = $p_u['room_prix'];
	$totAccompte = $accompte2 + $accompte;
					        
	$reste = $PT - $totAccompte;
	$modePaie=(($reste===0)?'Cash':'Crédit');

	$chambreOccup = $bd->prepare("SELECT * FROM booking AS A INNER JOIN rooms AS B ON B.id_room = A.num_chambre WHERE  A.date_out=? AND A.date_in = ? OR ? BETWEEN  A.date_in AND A.date_out AND B.id_room = ? ");
	$chambreOccup->execute(array($date_out,$date_out,$date_out,$numRoom));
	

	if ( $date_out < $book_date ) { 
		header('location:listReservCh.php?msg=1');
	}elseif ($chambreOccup->fetch(PDO::FETCH_ASSOC)) {
		header('location:listReservCh.php?msg=0');
	}else{
		$add = $bd->prepare('UPDATE booking SET date_out = ?, nombre_jour = ?, total_apayer = ?, accompte = ?, reste_apayer = ?,modePaie = ? WHERE id_booking = ?');
		$add->execute(array($date_out,$nbrjour,$PT,$totAccompte,$reste,$modePaie,$id));
		$add = $bd->prepare('UPDATE booking_historique SET date_out = ?, nombre_jour = ?, total_apayer = ?, accompte = ?, reste_apayer = ?, modePaie = ? WHERE id_booking = ?');
		$add->execute(array($date_out,$nbrjour,$PT,$totAccompte,$reste,$modePaie,$id));

		$diff='BO';
		
        $design='Logement'.' ('.$date_in.' '.$date_out.')';
        $facturation =$bd->prepare('UPDATE facturation SET designActivite = ?,qteFact = ?,ptFact = ?,modePaieFact = ?,accompte = ?,reste = ? WHERE idOperation = ? AND diffIndex =? ');
					        
		$facturation->execute(array($design,$nbrjour,$PT,$modePaie,$accompte,$reste,$id,$diff));


		if ($add) {
			header('location:listReservCh.php?msg=2');
		}
	}

		
 ?>
							  