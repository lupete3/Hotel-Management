<?php 
	require_once ('../security_recept.php'); 
	require_once('bd_cnx.php');
	

	$id =$_POST['id'];
					        
		$add = $bd->prepare('DELETE FROM booking WHERE id_booking=?');
		$add->execute(array($id));

		if ($add) {
			$add=$bd->prepare("DELETE FROM booking_historique WHERE id_booking=?");
			$add->execute(array($id));
			header('location:listReserv.php');
		}
	}

		
 ?>
							  