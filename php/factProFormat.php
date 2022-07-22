<?php 
    require_once ('security_recept.php'); 
    require_once('bd_cnx.php');
     $req1 = $bd->query("SELECT * FROM facturationOrg as A,organisation as B WHERE B.idOrg=A.idOrg AND A.etat = 'wait' ORDER BY idFactOrg ");
     $don1=$req1->fetch(PDO::FETCH_ASSOC);
     $idOrg=$don1['idOrg'];

    $dateJ=date('Y-m-d');

    $req1 = $bd->query("SELECT date_format(A.dateDebut,'%e-%m-%Y') as dateDebut,A.typeLoc,date_format(A.dateFin,'%e-%m-%Y') as dateFin,B.nomOrg,B.adresse,A.idLoc FROM location AS A INNER JOIN organisation AS B ON B.idOrg=A.idOrg AND A.dateLoc LIKE '%$dateJ%' AND B.idOrg='$idOrg'");
    $don1=$req1->fetch(PDO::FETCH_ASSOC); 
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
            <div class="row" style="margin-bottom:20px; margin-top:30px; " >
                <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
                  
                            <p style= " margin-left:0px;">
                                <img src="../docs/emoticones/log1.PNG"  alt="logo" style="width:70%;">
                            </p>
                        
                </div>
                 
                
                <div class="col-lg-7 col-md-7 col-sm-7 col-xs-7" style="">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="border-bottom:5px double gray">
                                
                                <p style="font-weight:bold; font-family:Century Gothic; font-size:1em;" >
                                    Id.Nat : 01-83-N19972W / N° RCCM : CD/KIN/RCCM/17-B-00575<br> 
                                    Tél : (+243) 978 044 578, +245 859 440 001, +243 971 351 389
                                    <span><br>
                                    E-mail :  <a href="#" style="text-decoration:underline">baharibeach2017hotel@gmail.com</a> 
                                        
                                    </span><br>
                                    <span class="">Site : www.baharibeachhotel.com</span><br>
                                    Adresse : Q. Kavimvira/Kilomoni 1, Avenue de la place, Uvira – Sud-Kivu/ RDC

                                    <span style=""></span>
                                    <br> Banque : TRUST MERCHANT BANK (TMB)
                                     <br> Intitulé du Compte : BAHARI BEACH HOTEL
                                    <br> Numéro du Compte : 00017-22100-30171550001-19 USD
                                </p>
                            </div>
                        </div>
                        
                    </div>   
            </div>
        </div>
        
        
        
        <div class="container">
            
            <div class="row spacer" style="margin-top:20px; font-family:century gothic">
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                     <span style="font-weight:bold">NOM : <?php echo $don1['nomOrg'] ?></span> <br>
                     <span style="font-weight:bold">Adresse : <?php echo $don1['adresse'] ?> </span> <br>
                </div> 
                
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4"></div>
                    
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                     <span style="font-weight:bold">Uvira, le <?php echo date('d-m-Y') ?></span> <br><br>
                     <span style="font-weight:bold">Facture N° : <?php echo $don1['idLoc'] ?></span> <br>
                </div> 
            </div>
            
            <div class="" style="margin-top:20px; font-family:century gothic">
                <center>
                    <h1 style="font-weight:bold;" class="text-center;">FACTURE </h1>
                </center>
            </div>            
            
            <div class="" style="margin-top:20px; font-family:century gothic">
                <i>
                    <h4 style="text-decoration:underline; " class="text-center; "><?php echo $don1['typeLoc'] ?> du <?php echo $don1['dateDebut'] ?> au <?php echo $don1['dateFin'] ?>
                        
                    </h4>
                </i>
                
                
            </div>
                
             <div class="row spacer" >
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <table class="table table-bordered table-striped table-sm" style="font-family:century gothic">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>DESIGNATION</th>
                                <th>QUANTITE  </th>
                                <th>PRIX UNITAIRE</th>
                                <th>PRIX TOTAL</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                           


                            $req = $bd->query("SET lc_time_names='fr_FR'");
                            $req = $bd->query("SELECT A.idFactOrg,A.designation,A.detail,date_format(A.dateFactOrg,'%e-%m-%Y à %T') as dateFactOrg,A.designation,A.quantite,A.detail,A.pu,A.PT,B.nomOrg FROM facturationOrg as A,organisation as B WHERE B.idOrg=A.idOrg AND A.etat = 'wait' ");
                            
                            $res = $bd->query("SELECT SUM(PT) as total FROM facturationOrg as A,organisation as B WHERE B.idOrg=A.idOrg AND A.etat = 'wait'");
                            $i = 1;
                          
                            while($don=$req->fetch()):
                                
                                ?>
                        <tr>
                                <td><?php echo $i ?></td>
                                <td><?php echo $don['designation'] ?></td>
                                <td><?php echo $don['quantite'].' '.$don['detail'] ?></td>
                                <td><?php echo $don['pu']?></td>
                                <td><?php echo $don['PT']?></td>
                                
                        </tr>
                        <?php
                        $i++;
                         endwhile;?>
                            
                            <tr style="font-weight:bold">
                                <td colspan="4">TOTAL</td>
                                <td>
                                    <?php
                                    $don1 = $res->fetch();
                                    echo number_format($don1['total'],2).' $'; 
                                     ?>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            
            <div class="row">
               
                    
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 offset-8">
                    <h5 class="" style="font-weight:bold; text-decoration:underline; font-family:century gothic">SCEAU </h5>
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
            $('#type').on('change',function(){
                $('form').submit();
            });
        });
    </script>
            

    </body>
</html>
             