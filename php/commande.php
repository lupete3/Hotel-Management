<?php
    require_once ('security_brmn.php'); 
    require_once('bd_cnx.php');

    $c=isset($_SESSION['profil']['agent5'])?$_SESSION['profil']['agent5']['idPv']:'';
    $poste=isset($_SESSION['profil']['agent5'])?$_SESSION['profil']['agent5']['libPv']:'';
    if (isset($_GET['id'])) {
        $id=$_GET['id'];
        $req=$bd->query("SET NAMES 'utf8'");
        $etat='wait';
        
        $req=$bd->prepare('SELECT * FROM panier WHERE idPanier=? AND  etatPanier=?');
        $req->execute(array($id,$etat));
        $don=$req->fetch(PDO::FETCH_ASSOC);
    }
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
        <div class="container"> 
            <div class="container">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"  >
                    <div style="border : 1px solid gray; border-radius:20px; margin-bottom:10px; ">
                         <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <center>
                                    <p style= " margin-left:0px;">
                                        <img src="../docs/emoticones/log1.png"  alt="logo" style="width:40%;">
                                    </p>
                                </center>        
                        </div>  
                    </div>
            </div> 
        </div>
        
     <div class="container">
            <div class="row" style="margin-bottom:10px;  " >
                
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <p style="font-family:Century Gothic; font-size:3em; text-align:center; font-weight:bold;">
                        Bon de commande N° : <?php echo $id; ?>
                    </p>
                    
                    <p style="font-family:Century Gothic; font-size:3em; margin-left:20px; ">
                        Date : <?php echo date('d-m-Y'); ?> 
                        <br>
                        <span>Heure :<?php echo date('H:i'); ?></span>
                         <br>
                    </p>

                    <div class="container">
                        <div class="row spacer" style="margin-bottom:20px; " >

                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <table class="table table-bordered table-striped table-sm">
                                    <thead>
                                        <tr style="font-size:2.2em;">
                                            <th>N°</th>
                                            <th>Désignation </th>
                                            <th>Qté</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr style="font-size:2.2em;">
                                            <td><?php $num=1;echo $num;  ?></td>
                                            <td><?php echo $don['designation'] ?></td>
                                            <td><?php echo $don['qtePanier'] ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

  
                    </div>

                      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5 " style="">
                                <p class=""  style="font-size:1.8em;"><span style="font-weight: bold">Effectué par </span>  :<?php echo(isset($_SESSION['profil']['agent5'])?$_SESSION['profil']['agent5']['brm_name']:''); ?></p>
                                
                                 
                               
                            </div>

                            <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5 ">
                                <p class=""  style="font-size:1.8em;"> <span style="font-weight: bold">Serveur </span>:
                                    <?php 
                                        $req1=$bd->query('SELECT * FROM serveur AS A INNER JOIN panier AS B ON B.id_serveur=A.id_serveur');

                                        $don=$req1->fetch();
                                        echo($don['nom_serveur']);
                                     ?>
                                </p>
                            </div>
                        </div>

            <div style="text-align:center; color:black; font-size: 1.6em; font-family: century gothic">
                    Copyright &copy;<script>document.write(new Date().getFullYear());</script> Tous droits réservés | <a style="color:darkblue" href="https://softech-rdc.com" target="_blank">Soft Tech Corporation</a>
                </div>

                    <div class="row">
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 offset-9">
                            <button type="button" class="btn btn-primary print pull-right"><span class="fa fa-print"></span> Imprimer</button>
                        </div>
                    </div>
                </div>   
            </div>
               
        </div>
        
        <style>
            th,td{font-size: 1.5em;}
        </style>
        

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
            
        </div>
    </body>
</html>
             