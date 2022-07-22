<?php
          require_once ('security_cpt.php');
          require_once('bd_cnx.php');
          $dateJ = date('Y-m-d');


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
            <div class="row" style="margin-bottom:0px; margin-top:30px; " >
                <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
                    <p style= " margin-left:0px;">
                        <img src="../docs/emoticones/log1.PNG"  alt="logo" style="width:50%;">
                    </p> 
                </div>
                 
                <div class="col-lg-7 col-md-7 col-sm-7 col-xs-7" style="">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="border-bottom:5px double gray"> 
                                <p style="font-weight:bold; font-family:Century Gothic; font-size:0.7em;" >
                                    Id.Nat : 01-83-N19972W / N° RCCM : CD/KIN/RCCM/17-B-00575<br> 
                                    Tél : (+243) 975280986,
                                    <span>E-mail :  
                                        <a href="#" style="text-decoration:underline">baharibeach2017hotel@gmail.com</a> 
                                    </span><br>
                                    <span class="">Site : www.baharibeachhotel.com</span><br>
                                    Adresse : 555, De la plage, Kilomoni 1 Q. Kamvivira - Uvira – Sud-Kivu / RD Congo

                                    <span style=""></span>
                                    <br> Banque : TRUST MERCHANT BANK (TMB)
                                     <br> Intitulé du Compte : BAHARI BEACH HOTEL
                                    <br> Numéro du Compte : 1275-3017155-00-95 USD
                                </p>
                            </div>
                        </div>
                        
                    </div>   
            </div>
        </div>

            <div class="row " style="margin-top:0px;" >
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <h4 class="text-center" style="text-decoration:underline;">VENTILATION  </h4>
                </div>
                
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="">
                    <div class="row">
                        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8"  style="" >
                            
                        </div>

                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4" style="">
                            <p>Date édition : <?php echo date('d-m-Y').' à '.date("H:i"); ?>
                                <br>
                                Point de vente : </p>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="padding:20px;">
                    <table class="table table-bordered table-striped table-sm">
                      <thead>
                        <tr class="">
                          <th scope="col">N° Bon</th>
                          <th scope="col">N° Fact.</th>
                          <th scope="col">Cash</th>
                          <th scope="col">Crédit</th>
                          <th scope="col">Service</th>
                          <th scope="col">Boisson</th>
                          <th scope="col">Droit de BCH</th>
                          <th scope="col">Piscine</th>
                          <th scope="col">Cigarette</th>
                          <th scope="col"> Massage</th>
                          <th scope="col">Gymna</th>
                          <th scope="col">Sauna</th>
                          <th scope="col">Divers</th>
                          <th scope="col">Couver TS</th>
                          <th scope="col">N° CH</th>
                          <th scope="col">Nom du client</th>
                        </tr>
                      </thead>
                        
                      <tbody>
                        <?php

                         $req1=$bd->query("SELECT A.idOperation,A.idFact,A.accompte,A.reste,A.designActivite,D.room_code,B.nom_client  FROM facturation as A, client AS B ,booking AS C,rooms AS D
                        WHERE  B.id_client=A.id_client AND  C.num_chambre=D.id_room AND C.id_client=B.id_client AND A.dateFact LIKE '%$dateJ%'");
                           


                         while ($don=$req1->fetch(PDO::FETCH_ASSOC)) { ?>
                         
                         <tr>
                          <td><?php echo $don['idOperation']; ?></td>
                          <td><?php echo $don['idFact']; ?></td>   
                          <td><?php echo number_format($don['accompte']); ?></td>
                          <td><?php echo number_format($don['reste']); ?></td>
                          <td><?php echo $don['designActivite']; ?></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td><?php echo $don['room_code']; ?></td>
                          <td><?php echo $don['nom_client']; ?></td>
                        </tr>
                      <?php 
                       }

                        ?>
                        

                        <tr>
                        <?php

                        $req1=$bd->query("SELECT SUM(A.accompte) as total,SUM(A.reste) as totalCredit FROM facturation as A, client AS B ,booking AS C,rooms AS D
                        WHERE  B.id_client=A.id_client AND  C.num_chambre=D.id_room AND C.id_client=B.id_client AND A.dateFact LIKE '%$dateJ%'");
                        $don=$req1->fetch(PDO::FETCH_ASSOC); 





                         ?>


                          <td colspan="2">TOTAL</td>
                          <td><strong><?php echo number_format($don['total'],2); ?></strong></td>
                          <td><strong><?php echo number_format($don['totalCredit'],2); ?></strong></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                        </tr>
                          
                      </tbody>
                    </table>
                </div>
            </div> 

            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="border:1px solid black">
                  <div class="col-lg-4" style="border:1px solid black">TOTAL CASH : <strong><?php echo number_format($don['total'],2).' $'; ?></strong></div>
                  <div class="col-lg-3">TOTAL CREDIT : <strong><?php echo number_format($don['totalCredit'],2).' $'; ?></strong></div>
                  <div class="col-lg-4">Nom & Signature du Caissier</div>
                </div>         

            <div class="row" style="padding:10px">
                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 offset-9">
                        <button type="button" class="btn btn-primary print pull-right"><span class="fa fa-print"></span> Imprimer</button>
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
             