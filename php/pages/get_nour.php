<?php
require_once('bd_cnx.php');

if(!empty($_POST["idNour"])) {
  //$req = $bd->prepare('SELECT * FROM prodboiss');
  $req = $bd->prepare('SELECT * FROM prodnour WHERE idCatNour =?');
  $req->execute(array($_POST["idNour"]));
?>
  <option value="">Sélectionner la nouriture</option>
<?php
  while($don=$req->fetch(PDO::FETCH_ASSOC)) {
?>
  <option value="<?php echo $don["idNour"]; ?>"><?php echo $don["designNour"]; ?></option>
<?php

  }
}
?>