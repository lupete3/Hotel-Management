<?php
    require_once ('security_admin.php'); 
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
                    <h4 class="text-center" style="text-decoration:underline;">Liste des clients partis  </h4>
                </div>
                
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 offset-2"  style="" >
                            <div class="cacher">
                            <form action="" method="POST">
                                
                                <input type="date" name="dateIn" value="" class="form-control"><br>
                                <input type="date" name="dateOut"value="" class="form-control"><br>
                                <div class="row">
                                    <div class="col-md-6 text-center">
                                        <button type="submit" class="btn btn-danger" name="save">Visualiser</button><br>
                                    </div>
                                </div>
                            </form>
                        </div>
                        </div>

                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4" style="">
                            <p>Date édition : <?php echo date('d-m-Y');?>
                                <br>
                                Heure édition : <?php echo date("H:i");?> </p>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="padding:20px;">
                    <table class="table table-bordered table-striped table-sm">
                      <thead>
                        <tr class="">
                          <th scope="col">N° rés<br>Date rés. <br>Heure</th>
                          <th scope="col">Nom<br>Prénom<br>Phone<br>Email</th>
                          <th scope="col">Arivée<br>Départ</th>
                          <th scope="col">Ch.<br>Tot. Ch.</th>
                          <th scope="col">Ad<br>En<br>No</th>
                          <th scope="col">Groupe<br>Agence qui paye<br>Agence qui réserve<br>Voucher Agence</th>
                          <th scope="col">Traitement<br>Convention<br>Date Option</th>
                          <th scope="col">Montant<br>Taxe Sej.<br>Remise</th>
                          <th scope="col">Suppléments</th>
                          <th scope="col"> Commentaires</th>
                          <th scope="col">Arrhes<br>Accomptes</th>

                        </tr>
                      </thead>
                        
                      <tbody>
                        <?php 
                        if (isset($_POST['save'])) {

                          $date_in = $_POST['dateIn'];
                          $date_out = $_POST['dateOut'];

                        $req = $bd->prepare("SELECT A.id_booking, date_format(A.date_booking,'%d-%m-%Y %T') AS date_booking,date_format(A.date_in,'%d-%m-%Y ') AS date_in,date_format(A.date_out,'%d-%m-%Y ') AS date_out,B.id_client, C.room_code,A.nombre_jour, A.total_apayer, A.accompte, A.reduction, A.reste_apayer,A.nbre_adult, A.statut_booking, D.nomOrg, B.id_client, B.nom_client, B.telClient FROM booking_historique AS A, client AS B, rooms AS C, organisation AS D WHERE B.id_client = A.id_client AND C.id_room=A.num_chambre AND D.idOrg = B.idOrg AND A.statut_booking=? AND A.date_booking BETWEEN ? AND ? "); 
                        $req->execute(array('CheckOut',$date_in,$date_out));

                    while($don=$req->fetch()):
                      ?>
                  <tr>
                    <td><?php echo $don['id_booking'].' '.$don['date_booking'] ?></td>
                    <td><?php echo $don['nom_client'].' '.$don['telClient'] ?></td>
                    <td><?php echo $don['date_in'].' '.$don['date_out'] ?></td>
                    <td><strong><?php echo $don['room_code'] ?></strong></td>
                    <td><?php echo $don['nbre_adult'] ?></td>
                    <td><?php echo $don['nomOrg'] ?></td>
                    <td>Chambre + petit déjeuner</td>
                    <td><?php echo $don['total_apayer'] * 16/100; ?></td>
                    <td></td>
                    <td></td>
                    <td><?php echo $don['accompte'] ?></td>
                  </tr>

                  <?php endwhile;
                    }
                  ?>
                          
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
                $('.cacher').hide();
                if (!window.print()) {
                    $('.cacher').show();
                }
            });
        });
    </script>
            

    </body>
</html>
             