<?php
    require_once ('security_brmn.php');
    require_once('bd_cnx.php');
    $idPv=isset($_SESSION['profil']['agent5'])?$_SESSION['profil']['agent5']['idPv']:'';
    $point=isset($_SESSION['profil']['agent5'])?$_SESSION['profil']['agent5']['libPv']:'';
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
                        <h4 class="text-center text-uppercase" style="text-align:center; border: 1px solid black">Liste de transferts journalièrs <?php echo $point; ?> </h4>
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
                            <tr class="text-uppercase">
                                <th>N°</th>  
                                <th>Point de vente</th>  
                                <th>Boisson</th>  
                                <th>Qté</th> 
                                <th>PU</th>  
                                <th>PT</th>  
                                <th>OBSERVATION</th>
                            </tr>
                        </thead>
                        <tbody>
                                <?php
                              
                                $req = $bd->query("SELECT * FROM transfert AS A,pointvente AS B,stockpv AS C, prodboiss AS D WHERE C.idPv=B.idPv AND D.idBoiss=C.idBoiss AND B.idPv=A.idPv AND D.idBoiss=A.idStock AND A.dateTrans LIKE '%$dateJ%' AND A.emetteur='$point' ORDER BY A.idTrans DESC");
                                $num=1;
                                
                                while($don=$req->fetch()):
                                    ?>
                            <tr>
                                   <td><?php echo $num;  ?></td>
                                    <td><?php echo $don['libPv'] ?></td>
                                    <td><?php echo $don['designBoiss'] ?></td>
                                    <td><?php echo $don['qte'] ?></td>
                                    <td><?php echo $don['puBoiss'] ?></td>
                                    <td><?php echo $don['qte']*$don['puBoiss'] ?></td>
                                    <td></td>
                                    
                            </tr>
                            <?php
                            $num++;
                             endwhile;?>
                             <tr>
                                            <td colspan="5">Total</td>
                                            <td><strong>
                                                <?php 
                                                 $req1=$bd->query("SELECT SUM(A.qte*D.puBoiss) as total FROM transfert AS A,pointvente AS B,stockpv AS C, prodboiss AS D WHERE C.idPv=B.idPv AND D.idBoiss=C.idBoiss AND B.idPv=A.idPv AND D.idBoiss=A.idStock AND A.dateTrans LIKE '%$dateJ%' AND A.emetteur='$point'");
        
                                                $don=$req1->fetch(PDO::FETCH_ASSOC);
                                                echo number_format($don['total'],2).' $';
                                                 ?>
                                                 </strong>
                                            </td>
                                            <td></td>
                            </tr>
                            
                        </tbody>
                    </table>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 spacer">
                   <p>Editeur : <strong><?php echo(isset($_SESSION['profil']['agent5'])?$_SESSION['profil']['agent5']['brm_name']:''); ?></strong></p> 
                </div>
                
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 offset-4 spacer">
                    <h class="text-center"><em>Fait à Uvira, le <?php $madate= date('d-m-Y H:i:s'); 
                            list($annee,$mois,$jour,$h,$m,$s)=sscanf($madate,"%d-%d-%d %d:%d:%d"); 
                            $h+=2; 
                            $timestamp=mktime($h,$m,$s,$mois,$annee,$jour); 
                            $new_date=date('d-m-Y à H:i:s',$timestamp); 
                            echo $new_date; 
                        ?></em> </h>
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
             