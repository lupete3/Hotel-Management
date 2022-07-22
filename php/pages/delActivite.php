<?php 
	require_once ('../security_recept.php'); 
	require_once('bd_cnx.php');

	if (isset($_POST['idSup'])) {
			$id = $_POST['idSup'];

			$req = $bd->prepare("DELETE FROM facturationOrg WHERE idFactOrg = ?");
			$req->execute(array($id));
			if ($req) {
				header('Location:factureLocSalle.php');
			}else{
				header('Location:factureLocSalle.php');
			}
		}
?>