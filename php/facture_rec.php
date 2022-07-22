<?php
    require_once ('security_recept.php'); 
    require_once('bd_cnx.php');
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
        
        <div class="container" style="margin-bottom:20px; ">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 " style="border:1px solid gray; border-radius:20px;">
                    <div class="">
                        <p class="" style="font-size:1em; font-family:Century Gothic;">Facture N° : 
                            <br> Du : </p>
                    </div>
                </div>

                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"></div>

                <div class="col-lg-7 col-md-7 col-sm-7 col-xs-7" style="border:1px solid gray; border-radius:20px;">
                    <p style="font-size:1em; font-family:Century Gothic;">Organisation :  <br>
                        Adresse : <br>
                        Téléphone :
                    </p>

                </div>

            </div>
        </div>
        
        <div class="container" style="margin-bottom:20px; ">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 " style="border:1px solid gray; border-radius:20px;">
                    <div class="">
                        <p class="" style="font-size:1em; font-family:Century Gothic;">Chambre N° : 
                            <br> Nombre de personne : <br>
                            Traitement :
                        </p>
                    </div>
                </div>

                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"></div>

                <div class="col-lg-7 col-md-7 col-sm-7 col-xs-7" style="border:1px solid gray; border-radius:20px;">
                    <p style="font-size:1em; font-family:Century Gothic;">Client :  <br>
                        Période : <br>
                        Paiement :
                    </p>

                </div>

            </div>
        </div>
        
        
        <div class="container">
            <div class="row spacer" style="margin-bottom:20px; " >

                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Libellé</th>
                                <th>Qté</th>
                                <th>Montant TTC</th>
                                <th>Taux TVA</th>
                                <th>Chambre</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
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
            
            <div class="container" style="margin-bottom:20px; ">
                <div class="row">
                    
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6" style="">
                        
                        <div class="row" style="border:1px solid gray;border-radius:10px; margin-bottom:20px">
                            <div class="col-lg-5 col-md-6 col-sm-6 col-xs-6">
                                <p style="font-size:1em; font-family:Century Gothic;">Taux TVA : </p> 
                            </div>
                            
                            <div class="col-lg-4 col-md-3 col-sm-3 col-xs-3">
                                <p style="font-size:1em; font-family:Century Gothic;">Montant H.T. : </p> 
                            </div>
  
                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3" >
                                <p style="font-size:1em; font-family:Century Gothic;">TVA : </p> 
                            </div>                           

                        </div>
                        
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3" style="">
                            <p style="font-size:1em; font-family:Century Gothic;">Signature  </p> 
                        </div>
                        
                    </div>
                    
                    <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"></div>
                    
                    <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5 " style="border:1px solid gray; border-radius:20px;">
                        <div class="">
                            <p style=" font-family:Century Gothic; font-size:1em;" >
                                <span style="font-weight:bold">Montant TTC :</span><br> 
                                <span>Accompte : </span><br>
                                <span>Remise : </span>
                                <br><br>
                                
                                <span style="font-weight:bold">Total Facture à payer :</span><br> 
                                <span style="font-weight:bold">Montant payé : </span><br>
                           
                            </p>

                        </div>
                    </div>

                </div>
            </div>
            
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <span>E-mail : <a href="#" style="text-decoration:underline; margin-right:10px;">
                                baharibeach2017hotel@yahoo.fr, </a> <a href="#" style="text-decoration:underline">
                                baharibeach2017hotel@gmail.com</a> </span>
            
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
        });
    </script>
            

    </body>
</html>
             