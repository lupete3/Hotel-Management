<?php
require_once('bd_cnx.php');

if(!empty($_POST["idType"])) {
  //$req = $bd->prepare('SELECT * FROM prodboiss');
  $req = $bd->prepare('SELECT * FROM vetement WHERE typeBl =?');
  $req->execute(array($_POST["idType"]));
?>
  <option value="">Sélectionner un vêtement</option>
<?php
  while($don=$req->fetch(PDO::FETCH_ASSOC)) {
?>
  <option value="<?php echo $don["idVetement"]; ?>"><?php echo $don["designation"]; ?></option>
<?php

  }
}
?>