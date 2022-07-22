<?php 
	require_once ('../security_admin.php'); 
	require_once('bd_cnx.php');

	if (isset($_POST['idSup'])) {
			$id = $_POST['idSup'];

			$req = $bd->prepare("DELETE FROM commande WHERE idCom = ?");
			$req->execute(array($id));
			if ($req) {
				header('Location:comListBoissA.php');
			}else{
				header('Location:comListBoissA.php');
			}
		}
?>