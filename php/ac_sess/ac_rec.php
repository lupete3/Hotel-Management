<?php 
    require_once ('../security_recept.php');
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
    <style type="text/css">
        .spacer{margin-top:20px;}
        legend{font-family: century gothic; font-size: 1.2em;}  
    </style>
    
    <body id="">
        <header id="head" style="background-color: #b90112;"> 
            <div class="row"> 
                <div class="col-lg-2  col-md-2  col-sm-2  col-xs-3">
                    <p><img src="../../docs/img/bbh_logos11.png" alt="logo BBH" style=""></p><br>
                </div>

                <div class="col-lg-7 col-md-7 col-sm-7 col-xs-6" id="div_lgos">
                    <div class="col-lg-12">
                        <h3 style="font-size: 2em; color:whitesmoke; text-align:center; margin-top:10px; font-family: Century gothic;">Hotel Management System 

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
                            <?php echo ' '. strtoupper($_SESSION['profil']['agent4']['user_name']).'<span style="padding-left:10px;">/</span>'.$_SESSION['profil']['agent4']['user_function']; ?>
                        </span>
                    </div>
                </div>
            </div>
        </header>
        
        <div id="sect1" class="row spacer">
            <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"></div>
            <div class="col-lg-12" style="background-color:; padding:1%;">
                
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <h1 style="text-align:center; font-family: century gothic" class="text-uppercase">Menu Front Office <?php echo realpath('index.php'); ?></h1>
                </div>
                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"></div>
                <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10" 
                     style="background-color:white; border:2px solid #b90112; padding: 10px; border-radius:50px; box-shadow: 0px 10px 20px;" >
                        
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3" style="">

                            <center>
                                 <a href="../pages/tableau_de_bord.php"><img src="../../docs/emoticones/new/tdb3.png" width="40%" alt="Front Office" > </a>
                            </center>
                            <legend style=" text-align:center">Tableau de bord</legend>
                        </div>                    

                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3" style="">

                             <center>
                                 <a href="../pages/reservation.php"><img src="../../docs/emoticones/new/book.png" width="40%" alt="Front Office" > </a>
                            </center>
                            <legend style=" text-align:center">Réservation</legend>
                        </div> 
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3" style="">
    
                             <center>
                                 <a href="../pages/client.php"><img src="../../docs/emoticones/new/client.png" width="40%" alt="Client" > </a>
                            </center>
                             <legend style=" text-align:center">Client</legend>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3" style=" ">

                                <center>
                                     <a href="../checkin_checkout.php"><img src="../../docs/emoticones/new/checkin2.png" alt="Cuisine" width="40%"  > </a>
                                </center>
                                <legend style=" text-align:center">Check-in & Check-out</legend>
                        </div>                    
                    
                </div>   
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    
                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3" style="">
                        
                         <center>
                             <a href="../pages/blanchisserie.php"><img src="../../docs/emoticones/oooo1.png" width="32%" alt="Blanchisserie" > </a>
                        </center>
                        <legend style=" text-align:center">Blanchisserie</legend>
                    </div> 
                    
                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3" style="">
                        
                         <center>
                             <a href="../pages/locSalle.php"><img src="../../docs/emoticones/new/autre%20service.png" width="40%" alt="Salle et autres services" > </a>
                        </center>
                        <legend style=" text-align:center">Location Salle</legend>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3" style=" ">
                        
                        <center title="">
                             <a href="../pages/sauna.php" style="">
                                <img src="../../docs/emoticones/icon%20Gymnastics.png" width="40%" alt="Sauna-Gym-Piscine" > </a>
                        </center>
                        <legend style=" text-align:center; ">Sauna-Gym-Piscine et autres Services</legend>
                    </div> 
                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3" style="">
                        <center>
                                <a href="../pages/organisation.php"><img src="../../docs/emoticones/new/rec2.png" width="40%" alt="Gestion organisations" > </a>
                        </center>
                        <legend style=" text-align:center;">Gestion des organisations</legend>
                    </div> 
                    
                </div>  
                
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    
                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3" style="">
                        
                         <center>
                             <a href="../rec_fichefac.php"><img src="../../docs/emoticones/icon%20facturation.png" width="40%" alt="Facture" > </a>
                        </center>
                        <legend style=" text-align:center">Facture / Transaction</legend>
                    </div> 
                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 " style="">
                        <center>
                                <a href="../pages/vetement.php"><img src="../../docs/MAJ/vetement.png" width="40%" alt="Gestion depenses" > </a>
                        </center>
                        <legend style=" text-align:center;">Gestion vetêments</legend>
                    </div> 
                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 " style="">
                        <center>
                                <a href="../pages/depensePdv.php"><img src="../../docs/emoticones/icon-accounting.png" width="40%" alt="Gestion depenses" > </a>
                        </center>
                        <legend style=" text-align:center;">Gestion depenses</legend>
                    </div> 
                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 " style="">
                        <center>
                                <a href="../menuR.php"><img src="../../docs/emoticones/new/report1.png" width="40%" alt="Gestion depenses" > </a>
                        </center>
                        <legend style=" text-align:center;">Rapports</legend>
                    </div>  
                    
                    
               </div>
               <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                     
                     <div class="col-lg-4 col-md-4 col-sm-4 offset-4" style=""> 
                        <center title="">
                             <a href="../pages/comDivRec.php" style="" >
                                <img src="../../docs/emoticones/task7.png" width="40%" alt="Réquisition" > </a>
                        </center>
                        <legend style="color:black; text-align:center;">Réquisition </legend>
                    </div>     
               </div>


                
                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"></div>
                
                
               
            </div>
             <div class="col-lg-12" style="text-align:center; padding-top: 20px; font-family: century gothic; font-size: 1.5em;">
                   Copyright &copy;<script>document.write(new Date().getFullYear());</script> Tous droits réservés | Ce modèle est fait par <a style="color:darkblue" href="https://softech-rdc.com" target="_blank">Soft Tech Corporation</a><br>
                    <br>
                    
                        <a style="color:darkblue" href="../pages/apropos.php" target="_blank"><button class="btn-lg btn btn-danger ">A propos de nous</button></a>
                </div>


            <div class="col-lg-1 col-md-1 col-sm-1 col-sx-1"></div>
            
        </div>
        </div>
        

            <script src="../bootstrap/js/jquery.min.js"></script>
            <script src="../bootstrap/js/bootstrap.min.js"></script>

    </body>
</html>