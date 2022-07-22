<?php
require_once('bd_cnx.php');

if(!empty($_POST["idNour"])) {
  //$req = $bd->prepare('SELECT * FROM prodboiss');
  $req = $bd->prepare('SELECT A.idStockCuis,B.designNour,A.qtStockCuis,A.idNour FROM stockcuisine AS A,prodnour AS B,catnour AS C WHERE B.idNour=A.idNour AND C.idCatNour=B.idCatNour AND C.idCatNour = ?');

  $req->execute(array($_POST["idNour"]));
?>
  <option value="">Sélectionner une nourriture</option>
<?php
  while($don=$req->fetch(PDO::FETCH_ASSOC)) {
?>
  <option value="<?php echo $don["idNour"]; ?>"><?php echo $don["designNour"].' Quantité restante-->'.$don['qtStockCuis']; ?></option>
<?php

  }
}
?>