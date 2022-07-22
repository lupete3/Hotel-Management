<?php
    require_once ('security_recept.php'); 
    require_once('bd_cnx.php');
    $dateJ=date('Y-m-d');

 ?>
<!DOCTYPE html>

<html>
    <head>
        <title>Bahari Beach Hôtel</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=devidev-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <link rel="stylesheet" type="text/css" href="pages/bootstrap/font-awesome-4.3.0/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="pages/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="pages/bootstrap/css/print.css" media="print">
    </head>
    
    <body id="">
        
        <div class="container spacer" style="">
            <div class="row" style="margin-bottom:0px; margin-top:30px; " >
                <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
                    <p style= " margin-left:0px;">
                        <img src="../docs/emoticones/log1.PNG"  alt="logo" style="width:50%;">
                    </p> 
                </div>
                 
                <div class="col-lg-7 col-md-7 col-sm-7 col-xs-7" style="">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style=""> 
                                <p style="font-weight:bold; font-family:Century Gothic; font-size:0.7em;" >
                                    Id.Nat : 01-83-N19972W / N° RCCM : CD/KIN/RCCM/17-B-00575<br> 
                                    Tél : (+243) 975280986,
                                    <span>E-mail :  
                                        <a href="#" style="text-decoration:underline">baharibeach2017hotel@gmail.com</a> 
                                    </span><br>
                                    <span class="">Site : www.baharibeachhotel.com</span><br>
                                    Adresse : Avenue De la plage, Kilomoni 1 Q. Kamvivira - Uvira – Sud-Kivu / RD Congo

                                    <span style=""></span>
                                    <br> Banque : TRUST MERCHANT BANK (TMB)
                                     <br> Intitulé du Compte : BAHARI BEACH HOTEL
                                    <br> Numéro du Compte : 1275-3017155-00-95 USD
                                </p>
                            </div>
                        </div>
                        
                    </div>   
            </div>
        </div>

            <div class="row " style="margin-top:0px; padding:10px;" >
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <center><h4 class="text-center text-uppercase" style=" border: 1px solid black; width: 60%">Prévisionnel d'occupation  </h4></center>  
                    
                </div>
                
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="">
                    <div class="row">
                        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8"  style="" >
                            
                        </div>

                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4" style="">
                            <p>Date édition : <?php echo date('d-m-Y');?>
                                <br>
                                Heure édition : <?php echo date("H:i");?> </p>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <table class="table table-bordered table-striped table-sm">
                      <thead>
                        <tr class="">
                          <th scope="col">Chambre</th>
                          <th scope="col">Client / Agence ou Société </th>
                          <th scope="col">PAX</th>
                          <th scope="col">Nationalité</th>
                          <th scope="col">Traitement</th>
                          <th scope="col">Date d'arrivée</th>
                          <th scope="col">Date de départ</th>
                          <th scope="col">A/R</th>
                          <th scope="col">D</th>
                          <th scope="col">Prix traitement</th>
                        </tr>
                      </thead>
                        
                      <tbody>
                        <?php
                            $req = $bd->query("SELECT * FROM booking AS A, client AS B, rooms AS C , organisation AS D WHERE B.id_client = A.id_client AND C.id_room=A.num_chambre AND D.idOrg = B.idOrg AND A.statut_booking='CheckIn'");
                                ?>
                                  <?php 
                                        while ($don=$req->fetch(PDO::FETCH_ASSOC)) {
                                            ?>
                                            <tr>
                                                <td><?php echo $don['room_code'] ?></td>
                                                <td><?php echo $don['nom_client'].' / '.$don['nomOrg']; ?></td>
                                                <td><?php echo $don['nbre_adult'] ?></td>
                                                <td><?php echo $don['pays'] ?></td>
                                                <td>Hébergement + petit déjeuner et piscine</td>
                                                <td><?php echo $don['date_in'] ?></td>
                                                <td><?php echo $don['date_out'] ?></td>
                                                  <?php if ($don['date_out']===$dateJ){ ?>

                                                  <td></td>
                                                    
                                                  <?php }else{
                                                    ?>
                                                    <td><?php echo(($don['statut_booking']==='Encours')?'A':'R'); ?></td>
                                                <?php
                                                  } ?>
                                                
                                                <td><?php echo(($don['date_out']===$dateJ)?'D':'');  ?></td>
                                                <td><?php echo $don['reste_apayer'] ?></td>
                                            </tr>

                                            <?php
                                        }
                                     ?>
                          
                      </tbody>
                    </table>
                     
                </div>
                
            </div>
        
            <div class="row">
                <div class="col-lg-4">
                    <div class="container">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="">
                            <table class="table table-bordered table-striped table-sm">
                              <thead>

                              </thead>

                              <tbody>
                                <tr>
                                  <td>Total chambres en arrivée</td>
                                  <td class="text-center">
                                    <?php 
                                        $req = $bd->query("SELECT COUNT(*) as total FROM booking AS A, client AS B, rooms AS C , organisation AS D WHERE B.id_client = A.id_client AND C.id_room=A.num_chambre AND D.idOrg = B.idOrg AND A.statut_booking='Encours'");
                                        $don = $req->fetch(PDO::FETCH_ASSOC);?>
                                      <strong><?php  echo $don['total'] ?></strong>
                                  </td>
                                </tr>
                                  
                                <tr>
                                  <td>Total chambres en départ(gg+1)</td>
                                  <td class="text-center">
                                    <?php 
                                        $req = $bd->query("SELECT COUNT(*) as total FROM booking AS A, client AS B, rooms AS C , organisation AS D WHERE B.id_client = A.id_client AND C.id_room=A.num_chambre AND D.idOrg = B.idOrg AND A.date_out='$dateJ'");
                                        $don = $req->fetch(PDO::FETCH_ASSOC);?>
                                      <strong><?php  echo $don['total'] ?></strong>
                                    </td>
                                </tr>
                                  
                                <tr>
                                  <td>Total de chambres louées (1)</td>
                                  <td class="text-center"><?php 
                                        $req1 = $bd->query("SELECT COUNT(*) as total FROM booking AS A, client AS B, rooms AS C , organisation AS D WHERE B.id_client = A.id_client AND C.id_room=A.num_chambre AND D.idOrg = B.idOrg AND A.statut_booking='CheckIn'");
                                        $don1 = $req1->fetch(PDO::FETCH_ASSOC);?>
                                      <strong><?php  $nbreCh=$don1['total']; echo $nbreCh; ?></strong>
                                    </td>
                                </tr>
                                  
                                <tr>
                                  <td>Total chiffre d'affaires traitement (2) **</td>
                                  <td class="text-center">
                                    <?php $req = $bd->query("SELECT SUM(reste_apayer)as total,AVG(reste_apayer) as totalMoy FROM booking AS A, client AS B, rooms AS C , organisation AS D WHERE B.id_client = A.id_client AND C.id_room=A.num_chambre AND D.idOrg = B.idOrg AND A.statut_booking='CheckIn'");
                                     $don = $req->fetch(PDO::FETCH_ASSOC);?>
                                      <strong><?php  echo $don['total'].' $' ?></strong>
                                  </td>
                                </tr>
                                  
                                <tr>
                                  <td>Prix moyen traitements(2/1) </td>
                                  <td class="text-center">
                                      <strong><?php  echo $don['totalMoy'].' $' ?></strong></td>
                                </tr>
                                  
                                <tr>
                                  <td>Taux d'occupation (prévisionnel) *** </td>
                                  <td>
                                    <?php $req = $bd->query("SELECT COUNT(*) as total FROM rooms");
                                     $don = $req->fetch(PDO::FETCH_ASSOC);?>
                                      <strong><?php  
                                        $pourc =($nbreCh/$don['total'])*100;
                                      echo sprintf("%.02f", $pourc).' %'; ?></strong>
                                  </td>
                                </tr>

                              </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-4">
                    <div class="container">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="">
                          <table class="table table-bordered table-striped table-sm">
                              <thead>

                              </thead>

                              <tbody>
                                <tr>
                                  <td>Total clients en arrivée</td>
                                  <td><?php 
                                        $req = $bd->query("SELECT COUNT(*) as total FROM booking AS A, client AS B, rooms AS C , organisation AS D WHERE B.id_client = A.id_client AND C.id_room=A.num_chambre AND D.idOrg = B.idOrg AND A.statut_booking='Encours'");
                                        $don = $req->fetch(PDO::FETCH_ASSOC);?>
                                      <strong><?php  echo $don['total'] ?></strong></td>
                                </tr>
                                  
                                <tr>
                                  <td>Total clients en départ(gg+1)</td>
                                  <td><?php 
                                        $req = $bd->query("SELECT COUNT(*) as total FROM booking AS A, client AS B, rooms AS C , organisation AS D WHERE B.id_client = A.id_client AND C.id_room=A.num_chambre AND D.idOrg = B.idOrg AND A.date_out='$dateJ'");
                                        $don = $req->fetch(PDO::FETCH_ASSOC);?>
                                      <strong><?php  echo $don['total'] ?></strong></td>
                                </tr>
                                  
                                <tr>
                                  <td>Total pax</td>
                                  <td><?php 
                                        $req = $bd->query("SELECT COUNT(nbre_adult) as total FROM booking AS A, client AS B, rooms AS C , organisation AS D WHERE B.id_client = A.id_client AND C.id_room=A.num_chambre AND D.idOrg = B.idOrg AND A.statut_booking='CheckIn'");
                                        $don = $req->fetch(PDO::FETCH_ASSOC);?>
                                      <strong><?php  echo $don['total'] ?></strong></td>
                                </tr>

                              </tbody>
                            </table>
                        </div>
                        
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <p style="font-size:0.7em">* = CA chambres occupées + CA chambres en arrivée - CA chambres en départ 
                                <br>** = Total colonne 'Montant traitement'
                                <br>*** = (Total de chambres louées/Total chambres) * 100
                                <br>A - Chambres en arrivée, D - Chambres en départ, R - Chambres occupées
                            </p>
                        </div>
                        
                    </div>
                </div>
                
                <div class="col-lg-4">
                    <div class="container">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="">
                          <table class="table table-bordered table-striped table-sm">
                              <thead>

                              </thead>

                              <tbody>
                                <tr>
                                  <td> CA chambres occupées</td>
                                  <td class="text-right"><?php $req = $bd->query("SELECT SUM(reste_apayer)as total,AVG(reste_apayer) as totalMoy FROM booking AS A, client AS B, rooms AS C , organisation AS D WHERE B.id_client = A.id_client AND C.id_room=A.num_chambre AND D.idOrg = B.idOrg AND A.statut_booking='CheckIn'");
                                     $don = $req->fetch(PDO::FETCH_ASSOC);?>
                                      <strong><?php $nbre1=$don['total']; echo $nbre1.' $' ?></strong></td>
                                </tr>
                                  
                                <tr>
                                  <td>Total chambres en arrivée</td>
                                  <td class="text-right"><?php 
                                        $req = $bd->query("SELECT SUM(reste_apayer) as total FROM booking AS A, client AS B, rooms AS C , organisation AS D WHERE B.id_client = A.id_client AND C.id_room=A.num_chambre AND D.idOrg = B.idOrg AND A.statut_booking='Encours'");
                                        $don = $req->fetch(PDO::FETCH_ASSOC);?>
                                      <strong><?php  $nbr2=$don['total']; echo (isset($nbre2)?$nbre2:' 0 $'); ?></strong></td>
                                </tr>
                                  
                                <tr>
                                  <td>CA prévisionnel minimum *</td>
                                    <?php 
                                        $req = $bd->query("SELECT SUM(reste_apayer) as total FROM booking AS A, client AS B, rooms AS C , organisation AS D WHERE B.id_client = A.id_client AND C.id_room=A.num_chambre AND D.idOrg = B.idOrg AND A.date_out='$dateJ'");
                                        $don = $req->fetch(PDO::FETCH_ASSOC);
                                        $nbre3=$don['total'];
                                        ?>
                                  <td class="text-right">
                                    <strong><?php echo $nbre1+$nbr2-$nbre3.' $';?></strong>
                                  </td>
                                </tr>

                              </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                
            </div>

            <div class="row" style="padding:10px">
                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 offset-9">
                        <button type="button" class="btn btn-primary print pull-right"><span class="fa fa-print"></span> Imprimer</button>
                    </div>
                </div>


    <script src="pages/bootstrap/js/popper.min.js"></script>
    <script src="pages/bootstrap/js/jquery-3.4.1.min.js"></script>
    <script src="pages/bootstrap/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function(){
            $('.print').on('click',function(){
                window.print();
            });
        });
    </script>
            

    </body>
</html>
             