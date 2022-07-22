<?php 
      require_once ('bd_cnx.php'); 
      require_once ('security_eco.php'); 
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
                    <div class="col-lg-12" >
                        <h1 style="color:whitesmoke; text-align:center; margin-top:10px; font-family: century gothic;">
                            Hotel Management System  
                        </h1>
                    </div>
                    <marquee behavior="alternate" >
                        <h1 id="" style="font-size: 40px; font-family: century gothic; font-weight: bold; 
                             margin-top: 2px; margin-left: 10px; color: #b90112; padding-top: 3px; text-shadow: 8px 8px 2px white;
                            text-shadow: 0 0 10px white, 0 0 10px white,0 0 10px white;">Bahari Beach Hotel</h1></marquee> 
                </div>
                
                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2" >
                   
                        <center style="padding-top: 30px;">
                             <a href="ac_sess/ac_eco.php" title="Cliquer pour retourner à la page précedente"><img src="../docs/emoticones/icone%20deconnexxion.png" width="50%" alt="Front Office" > </a>
                        </center>
                </div>

            </div>

        </header>
        
        <div id="sect1" class="row" style=" background-color:white; padding-top:20px;">
            
            <div class="col-lg-12 text-center text-uppercase"><h1 style="text-align:center">Espace Stock</h1></div>
            
            <div class="col-lg-1"></div>
            <div class="col-lg-10" style="margin-top:30px; padding:10px; border: 2px solid #b90112; background-color:white; border-radius:150px 0px 150px 0px; box-shadow: 0px 10px 20px;">
                
                
                <div class="row" style=" padding: 20px;" > 

                    <div class="col-lg-12">                  
                    
                    <div class="col-lg-4" style="">
                        
                        <center title="">
                             <a href="pages/stockNour.php" style="" >
                                <img src="../docs/emoticones/new/cuis1.png" width="40%" alt="Réquisition" > </a>
                        </center>
                        <legend style="color:grey; text-align:center; border-bottom: 1px solid #b90112">Stock 
                            Nourriture </legend>
                    </div>                    
                    
                    <div class="col-lg-4" style="">
                        
                         <center >
                             <a href="pages/stockBoissDispo.php" >
                                <img src="../docs/emoticones/boiss2.png" width="40%" alt="nourriture" > </a>
                        </center>
                        <legend style="color:grey; text-align:center; border-bottom: 1px solid #b90112">Stock Boisson</legend>
                    </div>                    
                    
                    <div class="col-lg-4" style=" ">
                        
                        <center title="">
                             <a href="pages/stockDiversDispo.php" style="">
                                <img src="../docs/emoticones/cleaning.png" width="40%" alt="Sauna-Gym-Piscine" > </a>
                        </center>
                        <legend style="color:grey; text-align:center; border-bottom: 1px solid #b90112">Stock Divers</legend>
                    </div> 

                </div>

                  
                  
                    
                </div>
                
            </div>
            
            <div class="col-lg-1"></div>
            
        </div>
        
            <script src="bootstrap/js/jquery.js"></script>
            <script src="bootstrap/js/bootstrap.min.js"></script>

            </body>
    </html>
             