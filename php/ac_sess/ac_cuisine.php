<?php 
      require_once ('../security_cuis.php'); 
      require_once ('../bd_cnx.php'); 
      
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Bahari Beach Hotel</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initialscale=1.0"> 
        <meta charset="utf-8" />
        <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css" />
        <link rel="stylesheet" href="../../bootstrap/css/bootstrap-theme.css.map" />
        <link rel="stylesheet" href="../../bootstrap/css/bootstrap-theme.min.css" />
        <link rel="stylesheet" href="../../bootstrap/css/bootstrap-theme.min.css.map" />
        <link rel="stylesheet" href="../../bootstrap/css/bootstrap.css" />
        <link rel="stylesheet" href="../../bootstrap/css/bootstrap.css.map" />
        <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css.map" />
        <link rel="stylesheet" href="../../bootstrap/css/font-awesome.min.css" />
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,700' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Dosis:400,700' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="" />
    </head>
    
    <body id="">
        <header id="head" style="background-color: #b90112;"> 
            <div class="row"> 
                
                <div class="col-lg-2  col-md-2  col-sm-2  col-xs-3">
                    <p><img src="../../docs/img/bbh_logos11.png" alt="logo BBH" style=""></p><br>
                </div>

                <div class="col-lg-7 col-md-7 col-sm-7 col-xs-6" id="div_lgos">
                    <div class="col-lg-12">
                        <h3 style="font-size: 2.5em; color:whitesmoke; text-align:center; margin-top:10px; font-family: Century gothic;">Hotel Management System 

                            <span style="color:whitesmoke; margin-left:20px; font-family:Century gothic; font-size: 0.6em; "> 
                                Date : <?php echo date("d-m-Y"); ?>
                                Heure : <?php echo date("H:i"); ?> 
                            </span>   
                        </h3>

                    </div>

                    <marquee behavior="alternate" >
                        <h1 id="h1_bbh_title" style="font-size: 60px; font-family: century gothic; font-weight: bold; margin-top: 2px; margin-left: 10px; color: #b90112; padding-top: 3px;text-shadow: 8px 8px 2px white; text-shadow: 0 0 10px white, 0 0 10px white,0 0 10px white;">Bahari Beach Hotel</h1></marquee> 
                </div>
                
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3" >
                   <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 offset-8">
                        <center style="padding-top: 10px;">
                             <a href="../logout.php" title="cliquer pour vous déconnecter"><img src="../../docs/emoticones/exit%20circular.png" width="100%" alt="Front Office" > </a>
                        </center>
                    </div>

                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: 20px;">
                        <span style="text-align: center; color: whitesmoke; font-size: 1.5em;
                                font-family: century gothic"> User : 
                            <?php echo ' '. strtoupper($_SESSION['profil']['agent7']['user_name']).'<span style="padding-left:10px;">/</span>'.$_SESSION['profil']['agent7']['user_function']; ?>
                        </span>
                    </div>
                </div>

            </div>
        </header>

        <div id="sect1" class="row" style=" background-color:white; padding-top:20px;">
            
            <div class="col-lg-12"><h1 style="text-align:center; font-family: century gothic">Espace Cuisine</h1></div>
            
            <div class="col-lg-1"></div>
            <div class="col-lg-10" style="margin-top:30px; padding:10px; border: 2px solid #b90112; background-color:white; border-radius:50px;">
                
                
                <div class="row" style=" padding: 20px;" > 
                    <div class="col-lg-12">                  
                        <div class="col-lg-3 col-sm-3 col-md-3" style=""> 
                            <center title="">
                                 <a href="../req_cuisine.php" style="" >
                                    <img src="../../docs/emoticones/task7.png" width="40%" alt="Réquisition" > </a>
                            </center>
                            <legend style="color:black; text-align:center; border-bottom: 1px solid #b90112">Réquisition </legend>
                        </div>                    
                        
                        
                        <div class="col-lg-3 col-sm-3 col-md-3" style="">
                             <center >
                                 <a href="../pages/avarieNourCuis.php" >
                                    <img src="../../docs/emoticones/new/avariealiment.png" width="40%" alt="nourriture" > </a>
                            </center>
                            <legend style="color:black; text-align:center; border-bottom: 1px solid #b90112">Signaler un Avarié</legend>
                        </div>

                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 " style="">
                            <center>
                                    <a href="../pages/stockCuisine.php">
                                        <img src="../../docs/emoticones/appnour.jpg" width="40%" alt="Gestion depenses" > </a>
                            </center>
                            <legend style="color:black; text-align:center; border-bottom: 1px solid #b90112">Gestion nourriture</legend>
                        </div> 
                         
                        
                    
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3" style="">
                            <center>
                                <a href="../rap_cuisine.php"><img src="../../docs/emoticones/new/tg.png" width="40%" alt="Rapport" > </a>
                            </center>
                            <legend style="color:black;  text-align:center; border-bottom: 1px solid #b90112">Rapport</legend>
                        </div>                     
                    </div>
                </div>
            </div>
            
            <div class="col-lg-1"></div>
            
        </div>

        <div style="text-align:center; padding-top: 20px; color:black; font-size: 1.5em; font-family: century gothic">
                    Copyright &copy;<script>document.write(new Date().getFullYear());</script> Tous droits réservés | Ce modèle est fait par <a style="color:darkblue" href="https://softech-rdc.com" target="_blank">Soft Tech Corporation</a><br>
                    <br>
                    
                        <a style="color:darkblue" href="../pages/apropos.php" target="_blank"><button class="btn-lg btn btn-danger ">A propos de nous</button></a>
                    
                </div>
        
            <style type="text/css">
                legend{font-family: century gothic; font-size: 1.5em;}    
            </style>       

            <script src="bootstrap/js/jquery.js"></script>
            <script src="bootstrap/js/bootstrap.min.js"></script>

            </body>
    </html>
             