<?php
    require_once ('security_cpt.php'); 
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
        
        <div class="container spacer" style="border-bottom:3px solid black;">
            <div class="row" style="border-bottom:1px solid black;margin-bottom:2px">
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                    <center>
                            <p style= "">
                                <img src="../docs/img/logooooo.png" width="100%;" alt="">
                            </p>
                        </center>
                </div>
                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8" >
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="padding-top:70px; font-family:century gothic"><strong><h3 class="text-center text-uppercase" style="text-align:center">Etat des clients présents du <?php echo  date('d/m/Y');  ?> </h3></strong>
                        
                    </div>
                    <div class="col-md-4 offset-8 pull-right">
                    </div><br>
                    <div class="col-md-4 offset-8">
                        <h5 class="text-right pull-right">Imprimé par <?php echo(isset($_SESSION['profil']['agent4'])?$_SESSION['profil']['agent4']['user_name']:''); ?></h5>
                    </div>
                
                </div>
                
                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"></div>      
            </div>
        </div>
        
        
        <div class="container">
            <div class="row spacer" >

                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <table class="table table-bordered table-striped table-sm">
                        
                        <thead>
                            <tr>
                                <th>No. Chambre</th>        
                                <th>Nbre PERS</th>        
                                <th>Nom Client</th>
                                <th colspan="2">
                                 Mode de paiement   
                                </th>
                                <th>Nbre jours</th>
                                <th>Date d'arrivé</th>
                                <th>Date de fin</th>
                                <th>Prise en charge</th>
                                <th>Observation</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th colspan="3"></th>
                                <th>Cash</th>
                                <th>Crédit</th>
                                <th colspan="5"></th>
                            </tr>
                        <?php

                        $req = $bd->query("SELECT A.nbre_adult, A.id_booking,A.modePaie, date_format(A.date_booking,'%d-%m-%Y %T') AS date_booking,date_format(A.date_in,'%d-%m-%Y ') AS date_in,date_format(A.date_out,'%d-%m-%Y ') AS date_out,B.id_client, C.room_code,A.nombre_jour, A.total_apayer, A.accompte, A.reduction, A.reste_apayer, A.statut_booking, B.id_client, B.nom_client ,D.nomOrg FROM booking AS A, client AS B, rooms AS C , organisation AS D WHERE B.id_client = A.id_client AND C.id_room=A.num_chambre AND D.idOrg = B.idOrg AND A.statut_booking='CheckIn' ORDER BY A.id_booking DESC");

                        //$req = $bd->query("SELECT A.id_booking,A.modePaie, date_format(A.date_booking,'%d-%m-%Y %T') AS date_booking,date_format(A.date_in,'%d-%m-%Y ') AS date_in,date_format(A.date_out,'%d-%m-%Y ') AS date_out, C.room_code,A.nombre_jour, A.total_apayer, A.accompte, A.reste_apayer, A.statut_booking, B.id_client, B.nom_client,D.nomOrg FROM booking AS A, client AS B, rooms AS C,organisation AS D WHERE B.id_client = A.id_client AND C.id_room=A.num_chambre AND  A.statut_booking='CheckIn'");
                        ?>
                            <?php 
                                while ($don=$req->fetch(PDO::FETCH_ASSOC)) {
                                    ?>
                                    <tr>
                                        <td><strong><?php echo $don['room_code'] ?></strong></td>
                                        <td><?php echo $don['nbre_adult'] ?></td>
                                        <td><?php echo $don['nom_client'] ?></td>
                                        <td><?php echo $don['accompte'] ?></td>
                                        <td><?php echo $don['reste_apayer'] ?></td>
                                        <td><?php echo $don['nombre_jour'] ?></td>
                                        <td><?php echo $don['date_in'] ?></td>
                                        <td><?php echo $don['date_out'] ?></td>
                                        <td><?php echo $don['nomOrg'] ?></td>
                                        <td></td>
                                    </tr>

                                    <?php
                                }
                             ?>
                             <tr>
                                <th colspan="2">Report nbre Ch.</th>
                                <th></th>
                                
                                <th>TOTAL CASH</th>
                                <th>TOTAL CREDIT</th>
                                <th></th>
                                <th>Arrivé du jour</th>
                                <th>Dép: du jour</th>
                                <th>PAX</th>
                                <th>TOTAL CA</th>
                                
                            </tr>
                            <tr>
                                <td colspan="2" class="text-center">
                                    <?php 
                                        $req1 = $bd->query("SELECT COUNT(*) as total FROM booking AS A, client AS B, rooms AS C , organisation AS D WHERE B.id_client = A.id_client AND C.id_room=A.num_chambre AND D.idOrg = B.idOrg AND A.statut_booking='CheckIn'");
                                        $don1 = $req1->fetch(PDO::FETCH_ASSOC);?>
                                      <strong><?php  $nbreCh=$don1['total']; echo $nbreCh; ?></strong>
                                </td>
                                <td></td>
                                <td>
                                    <?php 
                                        $req = $bd->query("SELECT SUM(accompte) as cash, SUM(reste_apayer) as credit FROM booking AS A, client AS B, rooms AS C , organisation AS D WHERE B.id_client = A.id_client AND C.id_room=A.num_chambre AND D.idOrg = B.idOrg AND A.statut_booking='CheckIn' ORDER BY A.id_booking DESC");
                                        $don = $req->fetch(PDO::FETCH_ASSOC);?>
                                      <strong>
                                        <?php  $cash=$don['cash']; 
                                                $credit=$don['credit']; 
                                        echo $cash; ?>
                                            
                                        </strong>
                                </td>
                                    
                                </td>
                                <td> <strong>
                                         <?php echo $credit ?>
                                     </strong></td>
                                <td></td>
                                <td>
                                    <?php 
                                        $req = $bd->query("SELECT COUNT(*) as total FROM booking AS A, client AS B, rooms AS C , organisation AS D WHERE B.id_client = A.id_client AND C.id_room=A.num_chambre AND D.idOrg = B.idOrg AND A.statut_booking='Encours'");
                                        $don = $req->fetch(PDO::FETCH_ASSOC);?>
                                      <strong><?php  echo $don['total'] ?></strong>
                                </td>
                                <td>
                                    <?php 
                                        $req = $bd->query("SELECT COUNT(*) as total FROM booking AS A, client AS B, rooms AS C , organisation AS D WHERE B.id_client = A.id_client AND C.id_room=A.num_chambre AND D.idOrg = B.idOrg AND A.date_out='$dateJ'");
                                        $don = $req->fetch(PDO::FETCH_ASSOC);?>
                                      <strong><?php  echo $don['total'] ?></strong>
                                </td>
                                <td><?php 
                                        $req = $bd->query("SELECT SUM(nbre_adult) as nbre FROM booking AS A, client AS B, rooms AS C , organisation AS D WHERE B.id_client = A.id_client AND C.id_room=A.num_chambre AND D.idOrg = B.idOrg ");
                                        $don = $req->fetch(PDO::FETCH_ASSOC);?>
                                      <strong><?php  echo $don['nbre'] ?></strong></td>
                                <td>
                                    <strong><?php echo $cash+$credit; ?></strong>
                                </td>
                            </tr>

                        </tbody>
                    </table>
                </div>
                
                <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5 offset-7 spacer">
                    <h6 class="text-center"><em>Fait à Uvira, le <?php $madate= date('d-m-Y H:i:s'); 
                            list($annee,$mois,$jour,$h,$m,$s)=sscanf($madate,"%d-%d-%d %d:%d:%d"); 
                            $h+=2; 
                            $timestamp=mktime($h,$m,$s,$mois,$annee,$jour); 
                            $new_date=date('d-m-Y à H:i:s',$timestamp); 
                            echo $new_date; 
                        ?></em></h6><br>
                    
                </div>
                
            </div>
            <div class="row">
                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 offset-9">
                        <button type="button" class="btn btn-primary print pull-right"><span class="fa fa-print"></span> Imprimer</button>
                    </div>
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
             