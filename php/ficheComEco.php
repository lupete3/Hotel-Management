<?php
    
    require_once ('security_eco.php');
    require_once('bd_cnx.php');
    $req=$bd->query("SET NAMES 'utf8'");
        
    $req=$bd->query("SELECT * FROM etatbesoin WHERE etat='wait'");
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
                            <img src="../docs/img/logooooo.png" width="70%;" alt="">
                        </p>
                    </center>
                </div>

                <div class="col-md-9" style="padding-top: 3em;">
                        <h3 class="" style="font-family:century gothic; text-align: center; border:1px solid black">ETAT DE BESOINS ECONOMAT </h3>
                </div>
                
                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"></div>          
            </div>
        </div>

        <div class="container">
            <div class="row spacer" >

                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <table class="table table-bordered table-striped table-sm">
                        <thead>
                            <tr class="text-uppercase text-center" style="font-family: century gothic">
                                <th>N°</th>   
                                <th>ARTICLE</th>
                                <th>QUANTITE</th>  
                                <th>PU</th>  
                                <th>PT</th>
                                <th>STOCK</th>
                                <th>OBSERVATION</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        $num=1;
                            while($don=$req->fetch()):
                                
                                ?>
                        <tr>
                                <td><?php echo $num; ?></td>
                                <td><?php echo $don['article'] ?></td>
                                <td class="text-right"><?php echo $don['qte'] ?></td>
                                <td class="text-right"><?php echo $don['pu'] ?></td>
                                <td class="text-right"><?php echo $don['pt'] ?></td>
                                <td class="text-right"><?php echo $don['stock'] ?></td>
                                <td></td>
                        </tr>
                        <?php 
                        $num++;
                    endwhile;
                        ?>

                            <tr>
                                <td colspan="4" style="font-size: 1.3em; font-weight: bold;">TOTAL</td>
                                <td class="text-right">
                                    <h4>
                                        <strong>
                                           <?php
                                                $req=$bd->query("SELECT SUM(pt) as total FROM etatbesoin WHERE etat='wait'");
                                                $don=$req->fetch(PDO::FETCH_ASSOC);
                                                echo number_format($don['total'],2).' $';
     
                                            ?> 
                                        </strong>
                                    </h4>
                                 </td>
                                <td></td>
                                <td></td>                                                               
                            </tr> 

                            <tr>
                                <td colspan="4">MONTANT TOTAL DES ACHATS</td>
                                <td></td>                                                             
                            </tr>

                            <tr>
                                <td colspan="4">MONTANT RETOURNE A LA CAISSE</td>
                                <td></td>                                                            
                            </tr>   
                        </tbody>
                    </table>
                </div>
            </div>

                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 spacer">
                       <p class="" style="text-decoration: underline;">Signature du chef </p> 
                    </div>

                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 offset-4 spacer">
                       <p class="" style="text-decoration: underline; margin-bottom: 4em;">DIRECTEUR GENERAL </p> 
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-4 offset-8">
                        <h class="text-center">
                            <em>Fait à Uvira, le <?php $madate= date('d-m-Y H:i:s'); 
                            list($annee,$mois,$jour,$h,$m,$s)=sscanf($madate,"%d-%d-%d %d:%d:%d"); 
                            $h+=2; 
                            $timestamp=mktime($h,$m,$s,$mois,$annee,$jour); 
                            $new_date=date('d-m-Y à H:i:s',$timestamp); 
                            echo $new_date; 
                        ?></em>
                        </h>
                    </div>
                </div>

                <div class="container">
                        <div class="row">
                                <div class="col-lg-6 printR">
                                    <form action="" method="POST">
                                        <button type="submit" name="send" class="btn btn-danger pull-right"><span class="fa fa-send"></span> Envoyer</button>
                                    </form>
                                    
                                </div>
                                <?php if (isset($_POST['send'])): 
                                    ?>
                                <?php
                                    $req=$bd->query("UPDATE etatbesoin SET etat='encours' WHERE etat='wait'"); 
                                    header('location:pages/etatBesoin.php');
                            endif ?>
                                <div class="col-lg-6">
                                    <button type="button" class="btn btn-primary print pull-right"><span class="fa fa-print"></span> Imprimer</button>
                                </div>
                            </div>
                    </div>
                
        </div>


        <style type="text/css">
            td,th, h4 {font-family: century gothic; }
        </style>

    <script src="pages/bootstrap/js/popper.min.js"></script>
    <script src="pages/bootstrap/js/jquery-3.4.1.min.js"></script>
    <script src="pages/bootstrap/js/bootstrap.min.js"></script>
    <script>
        $('.print').on('click',function(){
               $('.printR').hide();
               if(!window.print()){  
                 $('.printR').show();

               }
            });
    </script>
            

    </body>
</html>
             