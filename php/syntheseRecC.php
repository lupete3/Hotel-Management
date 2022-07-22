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
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="padding-top:70px;">
                        <h2 class="text-center" style="text-align:center; border: 1px solid black">Synthèse de la Réception du <?php echo date('d-m-Y') ?> </h2>
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
        
        <div class="container" style="margin-top:20px;">
            <div class="row spacer" >

                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <table class="table table-bordered table-striped table-sm">
                        <thead>
                            <tr>
                                <th>Libellé</th>        
                                <th>N° Chambre   </th>
                                <th>Nom Client</th>
                                <th>Cash</th>
                                <th>Crédit</th>
                                <th>Organisation</th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr>
                                <td colspan="6"><h6>CHECK OUT</h6></td>
                            </tr>
                        <?php
                        
                            $req = $bd->query("SELECT * FROM booking_historique AS A, client AS B, rooms AS C , organisation AS D WHERE B.id_client = A.id_client AND C.id_room=A.num_chambre AND D.idOrg = B.idOrg AND A.statut_booking='CheckOut' AND date_out='$dateJ' ORDER BY A.id_booking DESC");
                        ?>
                            <?php 
                                while ($don=$req->fetch(PDO::FETCH_ASSOC)) {
                                    ?>
                                    <tr>
                                        <td></td>
                                        <td><?php echo $don['room_code'] ?></td>
                                        <td><?php echo $don['nom_client'] ?></td>
                                        <td><?php echo $don['accompte'] ?></td>
                                        <td><?php echo $don['reste_apayer'] ?></td>
                                        <td><?php echo $don['nomOrg'] ?></td>
                                    </tr>

                                    <?php
                                }
                             ?>
                             <tr>
                                 <td colspan="6"><h6>CHECK IN</h6></td>
                             </tr>
                             <?php
                                    $req = $bd->query("SELECT A.accompte,C.room_code,B.nom_client,A.reste_apayer,D.nomOrg FROM booking AS A, client AS B, rooms AS C , organisation AS D WHERE B.id_client = A.id_client AND C.id_room=A.num_chambre AND D.idOrg = B.idOrg AND A.statut_booking='CheckIn' AND A.date_in='$dateJ'");
                                ?>
                                    <?php 
                                        while ($don=$req->fetch(PDO::FETCH_ASSOC)) {
                                            ?>
                                            <tr>
                                                <td></td>
                                                <td><?php echo $don['room_code'] ?></td>
                                                <td><?php echo $don['nom_client'] ?></td>
                                                <td><?php echo $don['accompte'] ?></td>
                                                <td><?php echo $don['reste_apayer'] ?></td>
                                                <td><?php echo $don['nomOrg'] ?></td>
                                            </tr>

                                            <?php
                                        }
                                     ?>
                                <tr>
                                    <td colspan="6"><h6>EN COURS</h6></td>
                                </tr>
                                <?php
                                    $req = $bd->query("SELECT * FROM booking AS A, client AS B, rooms AS C , organisation AS D WHERE B.id_client = A.id_client AND C.id_room=A.num_chambre AND D.idOrg = B.idOrg AND A.statut_booking='CheckIn' AND '$dateJ' BETWEEN date_in AND date_out");
                                ?>
                                    <?php 
                                        while ($don=$req->fetch(PDO::FETCH_ASSOC)) {
                                            ?>
                                            <tr>
                                                <td></td>
                                                <td><?php echo $don['room_code'] ?></td>
                                                <td><?php echo $don['nom_client'] ?></td>
                                                <td><?php echo $don['accompte'] ?></td>
                                                <td><?php echo $don['reste_apayer'] ?></td>
                                                <td><?php echo $don['nomOrg'] ?></td>
                                            </tr>

                                            <?php
                                        }
                                     ?>
                        </tbody>
                    </table>
                </div>
                
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 spacer">
                    <h6 class="text-right">Fait à Uvira, le <?php echo date('d-m-Y').' à '.date('H:i') ?>  </h6>
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
             