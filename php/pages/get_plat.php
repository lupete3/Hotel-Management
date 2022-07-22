<?php
require_once('bd_cnx.php');

if(!empty($_POST["idBoiss"])) {
  //$req = $bd->prepare('SELECT * FROM prodboiss');
  $req = $bd->prepare('SELECT * FROM plat WHERE idCatPlat =?');
  $req->execute(array($_POST["idBoiss"]));
?>
  <option value="">Sélectionner un plat</option>
<?php
  while($don=$req->fetch(PDO::FETCH_ASSOC)) {
?>
  <option value="<?php echo $don["idPlat"]; ?>"><?php echo $don["designPlat"]; ?></option>
<?php

  }
}
?>