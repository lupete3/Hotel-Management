<?php
    //require_once ('security_recept.php'); 
    require_once('bd_cnx.php');
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
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="padding-top:70px;">
                        <h1 class="text-center text-uppercase" style="text-align:center; border: 1px solid black">Fiche reservation en cours <?php  ?> </h1>
                    </div>
                
                </div>
                
                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"></div>      
            </div>
        </div>
        
        
        <div class="container">
            <div class="row spacer" >

                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <table class="table table-bordered table-striped">
                        
                        <thead>
                            <tr>
                                <th>No. Chambre</th>        
                                <th>Nom Client</th>
                                <th>Mode paiement</th>
                                <th>Nbre Nuitée</th>
                                <th>Date d'arrivé</th>
                                <th>Date de fin</th>
                                <th>Prise en charge</th>
                                <th>Observation</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php

                        $req = $bd->query("SELECT A.id_booking,A.modePaie, date_format(A.date_booking,'%d-%m-%Y %T') AS date_booking,date_format(A.date_in,'%d-%m-%Y ') AS date_in,date_format(A.date_out,'%d-%m-%Y ') AS date_out,B.id_client, C.room_code,A.nombre_jour, A.total_apayer, A.accompte, A.reduction, A.reste_apayer, A.statut_booking, B.id_client, B.nom_client ,D.nomOrg FROM booking AS A, client AS B, rooms AS C , organisation AS D WHERE B.id_client = A.id_client AND C.id_room=A.num_chambre AND D.idOrg = B.idOrg AND A.statut_booking='Encours' ORDER BY A.id_booking DESC");
                        ?>
                            <?php 
                                while ($don=$req->fetch(PDO::FETCH_ASSOC)) {
                                    ?>
                                    <tr>
                                        <td><strong><?php echo $don['room_code'] ?></strong></td>
                                        <td><?php echo $don['nom_client'] ?></td>
                                        <td><?php echo $don['modePaie'] ?></td>
                                        <td><?php echo $don['nombre_jour'] ?></td>
                                        <td><?php echo $don['date_in'] ?></td>
                                        <td><?php echo $don['date_out'] ?></td>
                                        <td><?php echo $don['nomOrg'] ?></td>
                                        <td></td>
                                    </tr>

                                    <?php
                                }
                             ?>
                        </tbody>
                    </table>
                </div>
                <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5 offset-7 spacer">
                    <h5 class="text-center"><em>Fait à Uvira, le <?php $madate= date('d-m-Y H:i:s'); 
                            list($annee,$mois,$jour,$h,$m,$s)=sscanf($madate,"%d-%d-%d %d:%d:%d"); 
                            $h+=2; 
                            $timestamp=mktime($h,$m,$s,$mois,$annee,$jour); 
                            $new_date=date('d-m-Y à H:i:s',$timestamp); 
                            echo $new_date; 
                        ?></em></h5><br>
                    <h5 class="text-center">Editeur : <?php echo(isset($_SESSION['profil']['agent4'])?$_SESSION['profil']['agent4']['user_name']:''); ?></h5>
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
             