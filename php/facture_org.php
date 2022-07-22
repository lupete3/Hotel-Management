<?php
    require_once ('security_recept.php'); 
    require_once('bd_cnx.php');
    //Payer la facture
    

    if (isset($_GET['id'])) {
        $idCl=$_GET['id'];
        
        $req=$bd->query(" SET lc_time_names='fr_FR'");

        $req = $bd->query("SELECT B.nbre_enf,B.nbre_adult,C.tel, C.adresse,B.modePaie, B.id_booking,date_format(B.date_booking,'%d-%m-%Y %T') AS date_booking,date_format(B.date_in,'%d-%m-%Y ') AS date_in,date_format(B.date_out,'%d-%m-%Y ') AS date_out,D.room_code, A.pays,C.nomOrg,B.reduction,A.telClient,A.id_client,A.nom_client FROM client AS A,booking AS B,organisation AS C,rooms AS D WHERE C.idOrg=A.idOrg AND B.id_client=A.id_client AND B.num_chambre=D.id_room AND C.idOrg=$idCl");
        $don=$req->fetch(PDO::FETCH_ASSOC);
        //$in=$don['date_in'];    
        //$out=$don['date_out'];
        $in = $_GET['in'];
        $out = $_GET['out'];

        $req1=$bd->prepare("SELECT * FROM facturation as A, client AS B, organisation as C, booking AS D 
            WHERE B.id_client=A.id_client AND C.idOrg=B.idOrg AND D.id_client=B.id_client AND C.idOrg=? AND A.dateFact BETWEEN ? AND ?");
       $req1->execute(array($idCl,$in,$out));


        

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

        <script type="text/javascript" src="pages/js/angular.min.js"></script>
        <script type="text/javascript" src="pages/js/angular-animate.js"></script>
        <script type="text/javascript" src="pages/js/angular-route.js"></script>
    </head>
    
    <body id="" ng-app="">
        
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
                                    <br> Numéro du Compte : 1275-3017155-00-95 USD
                                </p>
                            </div>
                        </div>
                        
                    </div>   
            </div>
        </div>
        
        <div class="container" style="margin-bottom:20px; ">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 " style="border:1px solid gray; border-radius:20px;">
                    <div class="">
                        <p class="" style="font-size:1em; font-family:Century Gothic;">Facture N° : 
                            <br> Du : <?php echo date('d-m-Y').' à '.date("H:i");?> <br>
                            Editeur : <?php echo(isset($_SESSION['profil']['agent4'])?$_SESSION['profil']['agent4']['user_name']:''); ?></p>
                    </div>
                </div>

                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"></div>

                <div class="col-lg-7 col-md-7 col-sm-7 col-xs-7" style="border:1px solid gray; border-radius:20px;">
                    <p style="font-size:1em; font-family:Century Gothic;">Organisation : <strong><?php echo $don['nomOrg'] ?></strong>  <br>
                        Adresse : <?php echo $don['adresse'] ?> <br>
                        Téléphone : <?php echo $don['tel'] ?>
                    </p>

                </div>

            </div>
        </div>
        
        <div class="container" style="margin-bottom:20px; ">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 " style="border:1px solid gray; border-radius:20px;">
                    <div class="">
                        <p class="" style="font-size:1em; font-family:Century Gothic;">Chambre N° : 
                            <br> Nombre de personnes : <?php echo $don['nbre_enf']+$don['nbre_adult'] ?> <br>
                            Traitement : Hébergement + Petit déjeuner et piscine
                        </p>
                    </div>
                </div>

                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"></div>

                <div class="col-lg-7 col-md-7 col-sm-7 col-xs-7" style="border:1px solid gray; border-radius:20px;">
                    <p style="font-size:1em; font-family:Century Gothic;">Organisation : <strong><?php echo $don['nomOrg'] ?></strong> <br>
                        Période : <?php echo $don['date_in'].' au '.$don['date_out']; ?> <br>
                        Paiement : <?php if (isset($_POST['typePaie'])) {
                            echo $_POST['typePaie'];}
                            ?>
                    </p>

                </div>

            </div>
        </div>
        
        
        <div class="container">
            <div class="row spacer" style="margin-bottom:20px; " >

                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <table class="table table-bordered table-striped table-sm">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Client</th>
                                <th>Libellé</th>
                                <th>Pu</th>
                                <th>Qté</th>
                                <th>Montant TTC</th>
                                <th>Taux TVA</th>
                                <th>Chambre</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                while ($result=$req1->fetch(PDO::FETCH_ASSOC)) {
                                ?>
                                <tr>
                                    <td><?php echo $result['dateFact'] ?></td>
                                    <td><?php echo $result['nom_client'] ?></td>
                                    <td><?php echo $result['designActivite'] ?></td>
                                    <td><?php echo $result['puFact']-$don['reduction'] ?></td>
                                    <td><?php echo $result['qteFact'] ?></td>
                                    <td><?php echo $result['ptFact'] ?></td>
                                    <td><?php echo '16%'; ?></td>
                                    <td><?php echo $don['room_code'] ?></td>
                                </tr>

                                <?php
                                }
                             ?>
                        </tbody>
                    </table>
                </div>
                
            </div>
            
            <div class="container" style="margin-bottom:20px; ">
                <div class="row">
                    
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4" style="">
                        
                        <div class="row" style="border:1px solid gray;border-radius:10px; margin-bottom:20px">
                            <div class="col-lg-5 col-md-6 col-sm-6 col-xs-6">
                                <p style="font-size:1em; font-family:Century Gothic;">Taux TVA : <?php echo '16%'; ?> </p> 
                            </div>
                            
                            <div class="col-lg-4 col-md-3 col-sm-3 col-xs-3">
                                <p style="font-size:1em; font-family:Century Gothic;">Montant H.T. : 
                                    <?php 
                                        $req1=$bd->prepare('SELECT SUM(A.ptFact) as total,SUM(A.accompte) AS accompte,SUM(A.reste) as reste FROM facturation as A, client as B,organisation AS C,booking as D WHERE B.id_client=A.id_client AND C.idOrg=B.idOrg AND C.idOrg=? AND dateFact BETWEEN ? AND ? AND D.id_client=B.id_client');
                                        $req1->execute(array($idCl,$in,$out));
                                        $res = $req1->fetch(PDO::FETCH_ASSOC);
                                        $tva=($res['total']*0.16);
                                        echo $res['total']-$tva.'$';
                                     ?>
                                </p> 
                            </div>
  
                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3" >
                                <p style="font-size:1em; font-family:Century Gothic;">TVA : <?php echo $tva.'$'; ?> </p> 
                            </div>                           

                        </div>                        
                        
                    </div>
                    
                    <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"></div>
                    
                    <div class="col-lg-7 col-md-7 col-sm-7 col-xs-7 " style="border:1px solid gray; border-radius:20px;">
                        <div class="row">
                            <div class="col-md-6" style="border-right: 1px solid black">
                            <p style=" font-family:Century Gothic; font-size:1em;" >
                                <span style="font-weight:bold">Montant TTC : <?php echo number_format($res['total'],2).'$' ?></span><br> 
                                <span>Accompte : <?php echo number_format($res['accompte'],2).'$' ?> </span><br>
                                <br>
                                
                                <span style="font-weight:bold">Total Facture à payer : <?php $payer=$res['reste']; echo number_format($payer,2).'$'; ?></span><br> 
                                
                           
                            </p>
                            </div>

                            <div class="col-md-6" style="border-left: 1px solid black">
                            <p style=" font-family:Century Gothic; font-size:1em;" >
                                <?php 
                                        $franc=$bd->query("SELECT * FROM devise WHERE idDevise=1");
                                        $fc = $franc->fetch(PDO::FETCH_ASSOC);
                                        $devise=$fc['devise'];
                                        $taux=$fc['taux'];
                                     ?>
                                <span style="font-weight:bold">Montant TTC : <?php echo $res['total']*$taux.'Fc' ?></span><br> 
                                <span>Accompte : <?php echo $res['accompte']*$taux.'Fc' ?> </span><br>
                                <br>
                                
                                <span style="font-weight:bold">Total Facture à payer : <?php $payer=$res['reste']; echo $payer*$taux.'Fc'; ?></span><br> 
                                
                           
                            </p>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
               
            <div class="row">
              
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4" style="">
                             <p style="font-size:1em; font-family:Century Gothic;">Signature recéptioniste </p> 
                    </div>

                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4" style="">
                             <p style="font-size:1em; font-family:Century Gothic;">Signature Client </p> 
                    </div> 
            </div>
             
            <div class="row ">
                
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
               $('.cacher').hide();
               if(!window.print()){  
                 $('.cacher').show();

               }
            });
        });
    </script>
            

    </body>
</html>
             