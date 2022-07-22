<?php 
	require_once ('../security_eco.php');
	require_once('bd_cnx.php');
	 $id=$_POST['id'];
	 $a=$_POST['idCatNour'];
	 $b=$_POST['designNour'];
	 $c=$_POST['qnteNour'];
	 $d=$_POST['nbUniteNour'];
	 $e=$_POST['unite'];
	 $f=$c*$d;

		$req1 = $bd->prepare('UPDATE prodnour SET idCatNour=?,qnteNour=?,designNour=?,nbUniteNour=?,unite=?,valUnitNour=? WHERE idNour=?');
		$req1->execute(array($a,$c,$b,$d,$e,$f,$id));
		header('location:produitNour.php');
 ?>
							  