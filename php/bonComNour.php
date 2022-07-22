<?php
    require_once ('security_brmn.php'); 
    require_once('bd_cnx.php');
    if (isset($_GET['id'])) {
        $id=$_GET['id'];
        $req=$bd->query("SET NAMES 'utf8'");
        $etat='wait';
        
        $req=$bd->prepare("SELECT A.idComNour,A.qteComNour,date_format(A.dateComNour,'%e-%m-%Y à %T') as dateComNour,designNour FROM commandenour as A,pointvente as B,prodNour as C WHERE A.idNour=C.idNour AND A.idPv=B.idPv AND A.statutComNour = 'Encours' AND  idComNour=?");
        $req->execute(array($id));
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
        
        <div class="col-lg-4" style="border : 1px solid gray; border-radius:20px; margin-bottom:10px; " >
            <div class="row" style="margin-bottom:5px; margin-top:10px; " >
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <center>
                        <p style= " margin-left:0px;">
                            <img src="../docs/emoticones/log1.PNG"  alt="logo" style="width:40%;">
                        </p>
                    </center>        
                </div>
                
            </div>
        

            <div class="row" style="margin-bottom:10px;  " >
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <center>
                        
                        <p style="font-weight:bold; font-family:Century Gothic; font-size:1.1em;" >
                            Id.Nat : 01-83-N19972W / N° RCCM : CD/KIN/RCCM/17-B-00575<br> 
                            Tél : (+243) 975280986,
                            <span>E-mail :  
                                <a href="#" style="text-decoration:underline">baharibeach2017hotel@gmail.com</a> 
                            </span><br>
                            <span class="">Site : www.baharibeachhotel.com</span><br>
                            Adresse : 555, De la plage, Kilomoni 1 Q. Kamvivira - Uvira – Sud-Kivu / RD Congo
                            
                        </p>

                    </center>        
                </div>
                
            </div>
        </div>
        
            <div class="row" style="margin-bottom:10px;  " >
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">

                    <p style="font-family:Century Gothic; font-size:1.5em; text-align:center; font-weight:bold;">
                        Bon de commande nourriture N° : <?php echo $id; ?>
                    </p>
                    
                    <p style="font-family:Century Gothic; font-size:1.5em; margin-left:20px; ">
                        Date : <?php echo date('d-m-Y'); ?> 
                        <br>
                        <span>Heure :<?php echo date('H:i'); ?></span>
                         <br>
                         Editeur : <?php echo(isset($_SESSION['profil']['agent5'])?$_SESSION['profil']['agent5']['user_name']:''); ?>
                    </p>
                    
                    
                    <p style="font-family:Century Gothic; font-size:1.7em; text-align:center; font-weight:bold;">
                        SERVICE RESTAURANT
                    </p>

                    <div class="container">
                        <div class="row spacer" style="margin-bottom:20px; " >

                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <table class="table table-bordered table-striped table-sm">
                                    <thead>
                                        <tr>
                                            <th>N°</th>
                                            <th>Désignation </th>
                                            <th>Qté</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><?php $num=1;echo $num;  ?></td>
                                            <td><?php echo $don['designNour'] ?></td>
                                            <td><?php echo $don['qteComNour'] ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                        </div>
                        <div class="row">
              
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6" style="">
                                         <p style="font-size:1em; font-family:Century Gothic;">Signature chef restaurant </p> 
                                </div>

                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6" style="">
                                         <p style="font-size:1em; font-family:Century Gothic;">Signature econome </p> 
                                </div> 
                        </div>
                        <div class="row">
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 offset-9">
                                    <button type="button" class="btn btn-primary print pull-right"><span class="fa fa-print"></span> Imprimer</button>
                                </div>
                            </div>
                    </div>
                    
                </div>
                
                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8" style=""></div>   
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
            

    </body>
</html>
             