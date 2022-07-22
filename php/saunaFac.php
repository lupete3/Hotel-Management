<?php
    require_once ('security_recept.php'); 
    require_once('bd_cnx.php');
    if (isset($_GET['id'])) {
        $id=$_GET['id'];
      //  $req=$bd->query("SET NAMES 'utf8'");
        $req=$bd->prepare('SELECT * FROM sauna,client WHERE sauna.id_client = client.id_client AND idSauna=? ');
        $req->execute(array($id));
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
            <div class="col-lg-12" style="border : 1px solid gray; border-radius:20px; margin-bottom:10px; " >
                <div class="row" style="margin-bottom:5px; margin-top:10px; " >
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <center>
                            <p style= " margin-left:0px;">
                                <img src="../docs/emoticones/log1.png"  alt="logo" style="width:40%;">
                            </p>
                        </center>        
                    </div>  
                </div>
            
                <div class="row" style="margin-bottom:10px;  " >
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <center>
                            
                            <p style="font-weight:bold; font-family:Century Gothic; font-size:2em;" >
                                Id.Nat : 01-83-N19972W / N° RCCM : CD/KIN/RCCM/17-B-00575<br> 
                                Tél : (+243) 975280986,
                                <span>E-mail :  
                                    <a href="#" style="text-decoration:underline">baharibeach2017hotel@gmail.com</a> 
                                </span><br>
                                <span class="">Site : www.baharibeachhotel.com</span><br>
                                Adresse : Q. Kavimvira/Kilomoni 1, Avenue de la place, Uvira – Sud-Kivu/ RDC
                                
                            </p>
                        </center>        
                    </div>
                    
                </div>
            </div>
        </div>
        
        <div class="container">
            <div class="row" style="margin-bottom:10px;  " >
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                    <p style="font-family:Century Gothic; font-size:2.3em; text-align:center; font-weight:bold;">
                        Facture N° : <?php 
                            $req1=$bd->prepare("SELECT idSauna,designSauna,puSauna,ptSauna,date_format(dateSauna,'%d-%m-%Y') AS dateSauna,modePaie,nom_client FROM sauna,client WHERE sauna.id_client = client.id_client AND idSauna=?");
                            $req1->execute(array($id));
                            $don=$req1->fetch();
                            echo($don['idSauna']);
                         ?>
                    </p>
                    <p style="font-family:Century Gothic; font-size:2.3em; text-align:center;">
                        SERVICE : <strong class="text-uppercase"><?php echo $don['designSauna'] ?></strong>
                    </p>
                    
                    <p style="font-family:Century Gothic; font-size:2.3em; margin-left:20px; ">
                        Date : <?php echo date('d-m-Y'); ?>
                        <br>
                        <span>Heure : <?php echo date('H:i'); ?></span>
                         <br>
 
                        Client : <?php 
                            
                        echo($don['nom_client']); ?>

                        <span style="margin-left : 30px;">Editeur : <?php echo(isset($_SESSION['profil']['agent4'])?$_SESSION['profil']['agent4']['user_name']:''); ?></span>
                    </p>
                    
                    
                    <p style="font-family:Century Gothic; font-size:2.7em; text-align:center; font-weight:bold;">
                        
                    </p>

                    <div class="container">
                        <div class="row spacer" style="margin-bottom:20px; " >

                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>N°</th>
                                           
                                            <th>Qté</th>
                                            <th>PU</th>
                                            <th>TP</th>
                                            <th>Mode</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        $num=1;
                                            while($don=$req->fetch(PDO::FETCH_ASSOC)){
                                                ?>
                                        <tr>
                                            <td><?php echo $num; ?></td>
                                            
                                            <td><?php echo $don['qteSauna'] ?></td>
                                            <td><?php echo $don['puSauna'] ?></td>
                                            <td><?php echo number_format($don['ptSauna'],2).' $'; ?></td>
                                            <td><?php echo $don['type']; ?></td>
                                        </tr>
                                                <?php
                                                $num++;
                                            }
                                         ?>
                                    </tbody>
                                </table>
                            </div>

                        </div>
                       
            <div class="row spacer" style="margin-bottom: 1em"> 
                <table class="container-fluid">
                    <tr class="">
                         <td class="text-center">
                            <p class="text-center" style="font-family:Century Gothic; font-size:1.2em; margin-left:5px; ">
                                Montant HT : <?php 
                                $req1=$bd->prepare('SELECT SUM(ptSauna) as total FROM sauna WHERE idSauna=? ');
                                $req1->execute(array($id));
                                $don=$req1->fetch();
                                $tva=$don['total']*0.16;
                                echo $don['total']-$tva.' $';

                             ?> 
                                <br>
                                <span>TVA : +<?php echo $tva.' $'; ?>(16%)</span>
                                 <br>
                                <span><strong>Total : <?php echo $don['total'].' $'; ?></strong></span>
                            </p>
                        </td>

                        <td class="text-center">
                            <?php 
                                        $franc=$bd->query("SELECT * FROM devise WHERE idDevise=1");
                                        $fc = $franc->fetch(PDO::FETCH_ASSOC);
                                        $devise=$fc['devise'];
                                        $taux=$fc['taux'];
                                     ?>
                            <p class="text-center" style="font-family:Century Gothic; font-size:1em; margin-left:5px; ">
                                Montant HT : <?php 
                                $req1=$bd->prepare('SELECT SUM(ptSauna) as total FROM sauna WHERE idSauna=? ');
                                $req1->execute(array($id));
                                $don=$req1->fetch();
                                $tva=$don['total']*0.16;
                                echo ($don['total']-$tva)*$taux.'Fc';

                             ?> 
                                <br>
                                <span>TVA : +<?php echo $tva*$taux.'Fc'; ?>(16%)</span>
                                 <br>
                                <span><strong>Total : <?php echo $don['total']*$taux.'Fc'; ?></strong></span>
                            </p>
                        </td>
                    </tr>
                </table>
            </div> 

            <div class="container-fluid">
                <div class="row">
                    <center style="width: 100%;">
                        <span class="title text-center" style="font-size:2em; font-family: century Gothic; font-weight: bold;" >
                                    Merci pour votre visite !</span><br> 

                        <p class="text-center" style="font-size:1.8em; font-family: century Gothic">
                                    Copyright &copy; Soft Tech Corporation
                                </p>
                    </center>
                    </div>
                 </div> 

                <div class="row">
                                
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 offset-3">
                        <button type="button" class="btn btn-primary print pull-right"><span class="fa fa-print"></span> Imprimer</button>
                    </div>
                </div>
             </div>
                    
        </div>

        </div>
    </div>
        
        <style>
            th,td{font-size: 2em;}
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
