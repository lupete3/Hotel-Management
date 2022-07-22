<?php
require_once('bd_cnx.php');

if(!empty($_POST["idBoiss"])) {
  //$req = $bd->prepare('SELECT * FROM prodboiss');
  $req = $bd->prepare('SELECT * FROM prodboiss WHERE idCatBoiss =?');
  $req->execute(array($_POST["idBoiss"]));
?>
  <option value="">Sélectionner la boisson</option>
<?php
  while($don=$req->fetch(PDO::FETCH_ASSOC)) {
?>
  <option value="<?php echo $don["idBoiss"]; ?>"><?php echo $don["designBoiss"]; ?></option>
<?php

  }
}
?>