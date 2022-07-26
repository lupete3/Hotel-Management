<?php 
      require_once ('bd_cnx.php'); 
      require_once ('security_brmn.php'); 
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Bahari Beach Hotel</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initialscale=1.0"> 
        <meta charset="utf-8" />
        <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css" />
        <link rel="stylesheet" href="../bootstrap/css/bootstrap-theme.css.map" />
        <link rel="stylesheet" href="../bootstrap/css/bootstrap-theme.min.css" />
        <link rel="stylesheet" href="../bootstrap/css/bootstrap-theme.min.css.map" />
        <link rel="stylesheet" href="../bootstrap/css/bootstrap.css" />
        <link rel="stylesheet" href="../bootstrap/css/bootstrap.css.map" />
        <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css.map" />
        <link rel="stylesheet" href="../bootstrap/css/font-awesome.min.css" />
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,700' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Dosis:400,700' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="" />
    </head>
    
    <body id="">
        <header id="head" style="background-color: #b90112;"> 
            <div class="row"> 
                
                <div class="col-lg-2  col-md-2  col-sm-2  col-xs-3">
                    <p><img src="../docs/img/bbh_logos11.png" alt="logo BBH" style=""></p><br>
                    
                </div>
                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-7" id="div_lgos">
                    
                    <marquee behavior="alternate" >
                        <h1 id="h1_bbh_title" style="font-size: 60px; font-family: century gothic; font-weight: bold; margin-top: 2px; margin-left: 10px; color: #b90112; padding-top: 3px;text-shadow: 8px 8px 2px white; text-shadow: 0 0 10px white, 0 0 10px white,0 0 10px white;">Bahari Beach Hotel</h1></marquee>
                </div>
                
                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2" >
                   
                        <center style="padding-top: 30px;">
                             <a href="ac_sess/ac_bman.php" title="Cliquer pour retourner à la page précedente !"><img src="../docs/emoticones/icone%20deconnexxion.png" width="50%" alt="Front Office" > </a>
                        </center>
                       

                </div>

            </div>

        </header>

        <div id="sect1" class="row" style=" background-color:white; padding-top:20px;">
            
            <div class="col-lg-12"><h1 style="text-align:center">Rapports </h1></div>
            
            <div class="col-lg-1"></div>
            <div class="col-lg-10" style="margin-top:20px; padding:20px; border: 2px solid #b90112; background-color:white; border-radius:200px 0px 200px 0px; box-shadow: 0px 10px 20px;">
                
                
                <div class="row" style=" padding: 20px;" > 

                    <div class="col-lg-12">                  
                    
                    <div class="col-lg-3 col-md-3 col-sm-3">
                        
                        <center title="">
                             <a href="ficheAvarieBoissBar.php" target="_blank" style="" >
                                <img src="../docs/emoticones/new/avariealiment.png" width="40%" alt="Réquisition" > </a>
                        </center>
                        <legend style="color:black; text-align:center; border-bottom: 1px solid #b90112">
                            Avaries boissons  </legend>
                    </div>                    
                    
                    <div class="col-lg-3 col-md-3 col-sm-3 ">
                        
                        <center title="">
                             <a href="ficheComBar.php" target="_blank" style="">
                                <img src="../docs/emoticones/vin.jpg" width="40%" alt="Sauna-Gym-Piscine" > </a>
                        </center>
                        <legend style="color:black; text-align:center; border-bottom: 1px solid #b90112">Fiche des commandes</legend>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-3 ">
                        
                        <center title="">
                             <a href="ficheTransfert.php" target="_blank" style="">
                                <img src="../docs/MAJ/new1.png" width="40%" alt="Sauna-Gym-Piscine" > </a>
                        </center>
                        <legend style="color:black; text-align:center; border-bottom: 1px solid #b90112">Fiche de transferts</legend>
                    </div> 
                     <div class="col-lg-3 col-md-3 col-sm-3">
                        
                        <center title="">
                             <a href="ficheVentePlatJour.php" target="_blank" style="">
                                <img src="../docs/emoticones/new/restaur.png" width="40%" alt="Sauna-Gym-Piscine" > </a>
                        </center>
                        <legend style="color:black; text-align:center; border-bottom: 1px solid #b90112">Vente plat</legend>
                    </div>


    
                <div class="row" style=" padding: 20px;" > 

                    <div class="col-lg-12">  

                    <div class="col-lg-3 col-md-3 col-sm-3">
                        
                        <center title="">
                             <a href="ficheAvariePlatBar.php" target="_blank" style="">
                                <img src="../docs/emoticones/new/restaur.png" width="40%" alt="Sauna-Gym-Piscine" > </a>
                        </center>
                        <legend style="color:black; text-align:center; border-bottom: 1px solid #b90112">Fiche avarie plat</legend>
                    </div>  
                    <div class="col-lg-3 col-md-3 col-sm-3">
                        
                        <center title="">
                             <a href="fichestockBoissBar.php" target="_blank" style="">
                                <img src="../docs/emoticones/boiss2.png" width="40%" alt="Sauna-Gym-Piscine" > </a>
                        </center>
                        <legend style="color:black; text-align:center; border-bottom: 1px solid #b90112">Fiche de stock</legend>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-3">
                        
                        <center title="">
                             <a href="ficheTransfertRecu.php" target="_blank" style="">
                                <img src="../docs/MAJ/form4.jpg" width="40%" alt="Sauna-Gym-Piscine" > </a>
                        </center>
                        <legend style="color:black; text-align:center; border-bottom: 1px solid #b90112">Fiche transferts reçus</legend>
                    </div>                 
                    
                    <div class="col-lg-3 col-md-3 col-sm-3">
                        
                        <center title="">
                             <a href="ficheVentePdv.php" target="_blank" style="" >
                                <img src="../docs/MAJ/form7.png" width="40%" alt="Réquisition" > </a>
                        </center>
                        <legend style="color:black; text-align:center; border-bottom: 1px solid #b90112">
                            Fiche de vente   </legend>
                    </div>                    
                </div>
            </div>           
        </div>
    </div>
            
    <div class="col-lg-1"></div>
            
</div>

            
<div class="text-center col-lg-12" style=" color:black; font-size: 1.5em; margin-top: 20px; font-family: century gothic;">Copyright &copy;<script>document.write(new Date().getFullYear());</script>       Tous droits réservés | Ce modèle est fait par <a style="color:darkblue" href="https://softech-rdc.com" target="_blank">Soft Tech Corporation</a>
</div>

<style>
    legend{font-family: century gothic; font-size: 1.3em;}
    h1{font-family: century gothic;}
</style>

<script src="bootstrap/js/jquery.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>

    </body>
</html>
             