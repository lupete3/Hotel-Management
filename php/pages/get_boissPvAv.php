<?php
require_once('bd_cnx.php');
require_once ('../security_brmn.php'); 
$id=isset($_SESSION['profil']['agent5'])?$_SESSION['profil']['agent5']['idPv']:'';

if(!empty($_POST["idCat"])) {
  //$req = $bd->prepare('SELECT * FROM prodboiss');
  $req = $bd->prepare('SELECT A.idStock,B.designBoiss,A.qtStock FROM stockpv AS A,prodboiss AS B,catboiss AS C WHERE B.idBoiss=A.idBoiss AND C.idCatBoiss=B.idCatBoiss AND C.idCatBoiss =? AND A.idPv=? AND A.qtStock>0');
  $req->execute(array($_POST["idCat"],$id));
?>
  <option value="">Sélectionner une boisson</option>
<?php
  while($don=$req->fetch(PDO::FETCH_ASSOC)) {
?>
  <option value="<?php echo $don["idStock"]; ?>"><?php echo $don["designBoiss"].' Quantité restante-->'.$don['qtStock']; ?></option>
<?php

  }
}
?>