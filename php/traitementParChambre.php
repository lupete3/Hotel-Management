<?php
        require_once ('security_recept.php');
        require_once ('bd_cnx.php'); 
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
        
        <div class="container spacer" style="">
            <div class="row" style="margin-bottom:0px; margin-top:30px; " >
                <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
                    <p style= " margin-left:0px;">
                        <img src="../docs/emoticones/log1.PNG"  alt="logo" style="width:50%;">
                    </p> 
                </div>
                 
                <div class="col-lg-7 col-md-7 col-sm-7 col-xs-7" style="">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style=""> 
                                <p style="font-weight:bold; font-family:Century Gothic; font-size:0.7em;" >
                                    Id.Nat : 01-83-N19972W / N° RCCM : CD/KIN/RCCM/17-B-00575<br> 
                                    Tél : (+243) 975280986,
                                    <span>E-mail :  
                                        <a href="#" style="text-decoration:underline">baharibeach2017hotel@gmail.com</a> 
                                    </span><br>
                                    <span class="">Site : www.baharibeachhotel.com</span><br>
                                    Adresse : Avenue De la plage, Kilomoni 1 Q. Kamvivira - Uvira – Sud-Kivu / RD Congo

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
                  <h4 class="text-center text-uppercase" style="border:1px solid black">Situation des traitements divisés par chambre </h4>
                </div>
                
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="">
                    <div class="row">
                        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8"  style="" >
                            
                        </div>

                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4" style="">
                            <p>Date édition : <?php echo date('d-m-Y');?> <br>
                                Heure : <?php $madate= date('H:i'); 
                                  list($h,$m)=sscanf($madate,"%d:%d"); 
                                  $h+=2; 
                                  $timestamp=mktime($h,$m); 
                                  $new_date=date('H:i',$timestamp); 
                                  echo $new_date; 
                              ?>
                                <br>
                                
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="padding:20px;">
                    <table class="table table-bordered table-striped table-sm">
                      <thead>
                        <tr class="">
                          <th scope="col">Chambre</th>
                          <th scope="col">Traitement</th>
                          <th scope="col">Nom</th>
                          <th scope="col">Agence/Société</th>
                          <th scope="col">PAX</th>
                          <th scope="col">Total débité<br> ( USD )</th>
                          <th scope="col">Tarif / Jour</th>

                        </tr>
                      </thead>
                      

                      <tbody>
                      <?php

                         $req = $bd->query("SELECT * FROM facturation AS A,client AS B,rooms AS C, booking AS D, organisation AS E WHERE B.id_client=A.id_client AND C.id_room=D.num_chambre AND B.id_client=D.id_client AND E.idOrg=B.idOrg AND D.statut_booking='CheckIn' and A.dateFact  LIKE '%$dateJ%'");
    
                      
                                while ($result=$req->fetch(PDO::FETCH_ASSOC)) {
                                ?>
                                <tr>
                                    <td><?php echo $result['room_code'] ?></td>
                                    <td><?php echo $result['designActivite'] ?></td>
                                    <td><?php echo $result['nom_client'] ?></td>
                                    <td><?php echo $result['nomOrg'] ?></td>
                                    <td><?php echo $result['nbre_adult'] ?></td>
                                    <td><?php echo $result['reste']?></td>
                                    <td><?php echo $result['room_prix'] ?></td>
                                </tr>

                                <?php
                                }
                             ?>
                          
                        <tr>
                          <?php
                          $req = $bd->query("SELECT COUNT(*) as total,SUM(reste) as totRest,SUM(nbre_adult) as totAdult FROM facturation AS A,client AS B,rooms AS C, booking AS D, organisation AS E WHERE B.id_client=A.id_client AND C.id_room=D.num_chambre AND B.id_client=D.id_client AND E.idOrg=B.idOrg AND D.statut_booking='CheckIn' and A.dateFact  LIKE '%$dateJ%'");
                          $result=$req->fetch(PDO::FETCH_ASSOC)
                          ?>
                          <td colspan="4">Tot. Chambre: <strong><?php echo $result['total'] ?></strong></td>
                          <td><strong><?php echo $result['totAdult'] ?></strong></td>
                          <td> <strong><?php echo $result['totRest'] ?></strong></td>
                          <td></td>
                        </tr>
                          
                      </tbody>
                    </table>
                     
                </div>
                
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
             