<?php 
	require_once ('../security_cuis.php'); 
	require_once('bd_cnx.php');

	if (isset($_POST['idSup'])) {
			$id = $_POST['idSup'];

			$req = $bd->prepare("DELETE FROM comCuisine WHERE idComCuis = ?");
			$req->execute(array($id));
			if ($req) {
				header('Location:comDivCuis.php');
			}else{
				header('Location:comDivCuis.php');
			}
		}
?>