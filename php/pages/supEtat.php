<?php 
	require_once ('../security_brmn.php'); 
	require_once('bd_cnx.php');

	if (isset($_POST['id'])) {
			$id = $_POST['id'];

			$req = $bd->prepare("DELETE FROM etatbesoin WHERE idEtat = ?");
			$req->execute(array($id));
			if ($req) {
				header('Location:etatBesoin.php');
			}else{
				header('Location:etatBesoin.php');
			}
		}
?>