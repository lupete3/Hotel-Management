<?php 

include ('bd_cnx.php');
session_start();

if(isset($_POST['log_in'])){
	$user = htmlentities(trim(strtolower($_POST['username'])));
	$pwd = htmlentities(trim($_POST['pass']));
	$pdv = htmlentities(trim($_POST['pdv']));

	$res = $bd->prepare("SELECT * FROM barman as A INNER JOIN pointvente AS B ON B.idPv=A.idPv WHERE brm_name=? AND mdp_brm=? AND B.idPv=? ");
	$res->execute(array($user,$pwd,$pdv));

		if($don=$res->fetch(PDO::FETCH_ASSOC)) {

			$_SESSION['profil']['agent5']=$don;
								
				header('location:ac_sess/ac_bman.php');
		} else {
				  	header('location:../connexion.php');
		}
} 

 ?>