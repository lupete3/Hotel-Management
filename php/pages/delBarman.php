<?php 
	require_once ('../security_admin.php'); 
	require_once('bd_cnx.php');

	if (isset($_POST['idSup'])) {
			$id = $_POST['idSup'];

			$req = $bd->prepare("DELETE FROM barman WHERE id_brm = ?");
			$req->execute(array($id));
			if ($req) {
				header('Location:barman.php');
			}else{
				header('Location:barman.php');
			}
		}
?>