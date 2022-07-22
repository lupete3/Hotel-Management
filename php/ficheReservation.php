<?php
    require_once ('security_recept.php');
    require_once ('bd_cnx.php');  
    $id=$_GET['id'];

    $req=$bd->query("SELECT id_booking,nombre_jour,id_client,nbre_adult,num_chambre,accompte,reduction,reste_apayer,date_format(date_in,'%e-%m-%Y') as date_in,date_format(date_out,'%e-%m-%Y') as date_out,date_format(date_booking,'%e-%m-%Y') as date_booking FROM booking_historique WHERE id_booking=$id");
    $don=$req->fetch(PDO::FETCH_ASSOC);

    $idCl=$don['id_client'];
    $idCh=$don['num_chambre'];


    $res=$bd->query("SELECT * FROM rooms as A INNER JOIN catChambre AS B ON B.idCatCh=B.idCatCh WHERE id_room=$idCh");
    $found=$res->fetch(PDO::FETCH_ASSOC);

    $req1=$bd->query("SELECT * FROM client WHERE id_client=$idCl");
    $don1=$req1->fetch(PDO::FETCH_ASSOC);
    $idOrg=$don1['idOrg'];

    $req2=$bd->query("SELECT * FROM organisation WHERE idOrg=$idOrg");
    $don2=$req2->fetch(PDO::FETCH_ASSOC);
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
                                    Adresse : Q. Kavimvira/Kilomoni 1, Avenue de la place, Uvira – Sud-Kivu/ RDC

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

        <div class="container">
            <div class="row " style="margin-top:10px;" >
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <h4 class="text-center" style=" border: 1px solid black">Fiche de Réservation N° <?php echo $don['id_booking'] ?>  </h4>
                </div>

                <div class="row">
                        <p class="text-center" style="margin-left:1em">Date Réservation : <strong><?php echo $don['date_booking']?></strong></p>

                </div>
            </div>
        </div>
             
        <div class="container">
            <div class="row" style="">
                <div class="col-md-5" style="border:1px solid grey; border-radius:20px; padding:20px">
                    <p>NOM DU CLIENT : <strong><?php echo $don1['nom_client'] ?></strong></p>
                    <p>No. PHONE : <strong><?php echo $don1['telClient'] ?></strong></p>
                    <p>ORGANISATION : <strong><?php echo $don2['nomOrg'] ?></strong></p>
                    <p>NOMBRE DE PERSONNES : <strong><?php echo $don['nbre_adult']; ?></strong></p>
                </div>

                <div class="col-md-2"></div>
                
                <div class="col-md-5" style="border:1px solid grey; border-radius:20px;  padding:20px">
                    <p>N° Chambre : <strong><?php echo $found['room_code']; ?></strong></p>
                    <p>Type Chambre : <strong><?php echo $found['designCatCh']; ?></strong></p>
                    <p>Prix Chambre: <strong><?php echo $found['room_prix'].' $'; ?></strong></p>
                    <p>Date In : <strong><?php echo $don['date_in']?></strong></p>
                    <p>Date Out : <strong><?php echo $don['date_out']; ?></strong></p>                    
                    <p>Nombre de jours : <strong><?php echo $don['nombre_jour']; ?></strong></p>
                    <p>Montant à payer : <strong><?php echo $don['reste_apayer'].' $'; ?></strong></p>
                </div>
            </div>
        </div>
        
        <div class="container" style="padding:1em;">
            <div class="row">
                <div class="col-lg-3 offset-9"><p class="">Signature </p></div>
            </div>
        </div>

        <div class="row" style="padding:10px; padding-right:15em">
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
             