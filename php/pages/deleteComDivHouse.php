<?php 
	require_once ('../security_cuis.php'); 
	require_once('bd_cnx.php');

	if (isset($_POST['idSup'])) {
			$id = $_POST['idSup'];

			$req = $bd->prepare("DELETE FROM comdivers WHERE idComDiv = ?");
			$req->execute(array($id));
			if ($req) {
				header('Location:comDivHouse.php');
			}else{
				header('Location:comDivHouse.php');
			}
		}
?>