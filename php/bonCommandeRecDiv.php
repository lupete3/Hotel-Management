<?php
    require_once ('security_recept.php'); 
    require_once('bd_cnx.php');
        $req=$bd->query("SET NAMES 'utf8'");
        $etat='commande';
        $c=isset($_SESSION['profil']['agent4'])?$_SESSION['profil']['agent4']['user_function']:'';
        
        $req=$bd->query("SELECT A.idComDiv,A.qteComDiv,date_format(A.dateComDiv,'%e-%m-%Y à %T') as dateComDiv,B.designation,B.pu FROM comDivers as A,stockdivers as B WHERE B.idDiv=A.idDiv AND A.statutComDiv = 'commande' AND poste='$c'");
        $req1=$bd->query("SELECT SUM(qteComDiv*pu) as total FROM comDivers as A,stockdivers as B WHERE B.idDiv=A.idDiv AND A.statutComDiv = 'commande' AND poste='$c'");
        

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
                        Bon de commande Réception
                    </p>
                    
                    <p style="font-family:Century Gothic; font-size:1.5em; margin-left:20px; ">
                        Date : <?php echo date('d-m-Y'); ?> 
                        <br>
                        <span>Heure :<?php echo date('H:i'); ?></span>
                         <br>
                    </p>
                    
                    
                    <p style="font-family:Century Gothic; font-size:1.7em; text-align:center; font-weight:bold;">
                    </p>

                    <div class="container">
                        <div class="row spacer" style="margin-bottom:20px; " >

                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <table class="table table-bordered table-striped table-sm">
                                    <thead>
                                        <tr>
                                            <th>N°</th>
                                            <th>Désignation </th>
                                            <th>Qte</th>
                                            <th>PU</th>
                                            <th>PT</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            $num=1;
                                            while ($don=$req->fetch(PDO::FETCH_ASSOC)) {
                                                ?>
                                                <tr>
                                                    <td><?php echo $num;  ?></td>
                                                    <td><?php echo $don['designation'] ?></td>
                                                    <td class="text-right"><?php echo $don['qteComDiv'] ?></td>
                                                    <td class="text-right"><?php echo $don['pu'] ?></td>
                                                    <td class="text-right"><?php echo $don['qteComDiv']*$don['pu'] ?></td>
                                                </tr>
                                                <?php
                                                $num++;
                                            }
                                         ?>
                                        <tr>
                                            <td colspan="4">Total</td>
                                            <td class="text-right">
                                            <strong>
                                                <?php

                                                    $don=$req1->fetch(PDO::FETCH_ASSOC);
                                                    echo number_format($don['total'],2).' $';
                                                 ?>
                                            </strong>
                                                
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
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
                                    $req=$bd->query("UPDATE comDivers SET statutComDiv='Encours' WHERE statutComDiv='commande'"); 
                                    header('location:pages/comDivRec.php');
                            endif ?>
                                <div class="col-lg-6">
                                    <button type="button" class="btn btn-primary print pull-right"><span class="fa fa-print"></span> Imprimer</button>
                                </div>
                            </div>
                    </div>
                            
                        <div class="row">
              
                    <div class="col-lg-12" style="">
                             <p style="font-size:1em; font-family:Century Gothic;">Signature réceptioniste</p> 
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
        $('.print').on('click',function(){
               $('.printR').hide();
               if(!window.print()){  
                 $('.printR').show();

               }
            });
    </script>
            

    </body>
</html>
             