<?php 
      require_once ('bd_cnx.php'); 
      require_once ('security_admin.php'); 
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
                             <a href="logout.php" title="cliquer pour vous déconnecter"><img src="../docs/emoticones/exit%20circular.png" width="100%" alt="Front Office" > </a>
                        </center>
                    </div>

                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: 20px;">
                        <span style="text-align: center; color: whitesmoke; font-size: 1.5em;
                                font-family: century gothic"> User : 
                            <?php echo ' '. strtoupper($_SESSION['profile']['admin']['nom_admin']).'<span style="padding-left:10px;">/</span>'.$_SESSION['profile']['admin']['user_funct']; ?>
                        </span>
                    </div>
                </div>
            </div>
        </header>
        
        <div id="sect1" class="row">
            <div class="col-lg-12 text-uppercase">
                <center>  
                    <h1 style="text-align:center; font-family:century gothic; border:2px solid #b90112; width:40%;box-shadow: 0px 10px 20px; border-radius: 30px;">Back-Office</h1>
                    </center> 
                </div>
            <div class="col-lg-12" style="background-color:white; padding:10px; ">

                <div class="col-lg-1"></div>

                

                <div class="col-lg-10" >
                    <div class="container" style="background-color:white; border:1px solid #b90112 ; padding: 40px; border-radius:200px 0px 200px 0px; box-shadow: 0px 10px 20px;">



                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"  > 

                                    
                        
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3" style="">
                            
                            <center>
                                 <a href="pages/table.php"><img src="../docs/emoticones/new/ter2.png" width="40%" alt="Front Office" > </a>
                            </center>
                            <legend style="color:black; text-align:center; border-bottom: 1px solid #b90112 ">Gestion Tables</legend>
                        </div>                    
                        
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3" style="">
                            
                             <center>
                                 <a href="pages/pdv.php"><img src="../docs/emoticones/new/pdv3.jpg" width="40%" alt="Front Office" > </a>
                            </center>
                            <legend style="color:black; text-align:center; border-bottom: 1px solid #b90112">G-Points de Vente</legend>
                        </div> 
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3" style="">

                             <center>
                                 <a href="pages/chambre.php">
                                     <img src="../docs/emoticones/new/resbook.png" width="40%" alt="Rooms" > </a>
                            </center>
                            <legend style="color:black; text-align:center; border-bottom:1px solid #b90112;">Rooms</legend>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3" style="">

                             <center>
                                 <a href="pages/materiel.php">
                                     <img src="../docs/emoticones/new/ctrl.png" width="40%" alt="Rooms" > </a>
                            </center>
                            <legend style="color:black; text-align:center; border-bottom:1px solid #b90112;">Matériels</legend>
                        </div>                   
                        
                        
                </div>
 

                    <div class="col-lg-12">
                    
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3" style="">
                            
                             <center>
                                 <a href="pages/serveur.php"><img src="../docs/emoticones/new/client.png" width="40%" alt="Rapport" > </a>
                            </center>
                            <legend style="color:black; text-align:center; border-bottom: 1px solid #b90112">Gestion serveurs</legend>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3" style="">
                            
                            <center>
                                 <a href="pages/salle.php"><img src="../docs/emoticones/new/pdv2.png" width="40%" alt="Front Office" > </a>
                            </center>
                            <legend style="color:black; text-align:center; border-bottom: 1px solid #b90112 ">Gestion Salles</legend>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3" style="">
                            <center>
                                 <a href="pages/comListReq.php"><img src="../docs/MAJ/form4.JPG" width="40%" alt="Front Office" > </a>
                            </center>
                            <legend style="color:black; text-align:center; border-bottom: 1px solid #b90112 ">Etats de besoin</legend>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3" style="">
                            
                            <center>
                                 <a href="pages/categorieEquip.php" target="_blank"><img src="../docs/MAJ/form6.png" width="40%" alt="Front Office" > </a>
                            </center>
                            <legend style="color:black; text-align:center; border-bottom: 1px solid #b90112 ">Catégorie matériels</legend>
                        </div>  
                        
                    </div>
                    <div class="col-md-12 col-lg-12">
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3" style="">
                            
                            <center>
                                 <a href="pages/historique_booking.php" target="_blank"><img src="../docs/MAJ/form3.jpg" width="40%" alt="Front Office" > </a>
                            </center>
                            <legend style="color:black; text-align:center; border-bottom: 1px solid #b90112 ">Historique Réservations</legend>
                        </div> 
                        
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3" style="">
                            <center>
                                 <a href="pages/users.php"><img src="../docs/emoticones/new/rec2.png" width="40%" alt="Front Office" > </a>
                            </center>
                            <legend style="color:black; text-align:center; border-bottom: 1px solid #b90112 ">Gestion des utilisateurs</legend>
                        </div>
                        
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3" style="">
                            
                            <center>
                                 <a href="pages/confNour.php"><img src="../docs/emoticones/new/restaur.png" width="40%" alt="Front Office" > </a>
                            </center>
                            <legend style="color:black; text-align:center; border-bottom: 1px solid #b90112 ">Configuration plats </legend>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3" style="">
                            
                            <center>
                                 <a href="rapportComptableA.php"><img src="../docs/emoticones/new/cpt.png" width="40%" alt="Comptabilité" > </a>
                            </center>
                            <legend style="color:black; text-align:center; border-bottom: 1px solid #b90112">Rapports généraux</legend> 
                    </div>

                    <div class="col-lg-12 col-md-12">                         
                         <div class="col-lg-3 col-md-3" style="">
                            <center>
                                 <a href="pages/barman.php"><img src="../docs/emoticones/barman.png" width="40%" alt="Front Office" > </a>
                            </center>
                            <legend style="color:black; text-align:center; border-bottom: 1px solid #b90112 ">Gestion barmen</legend>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3" style="">
                             <center>
                                 <a href="gestion_commandeA.php"><img src="../docs/emoticones/new/reqAd.png" width="40%" alt="Visualiser bon de commande" > </a>
                            </center>
                            <legend style="color:black; text-align:center; border-bottom: 1px solid #b90112 ">Bon de Commande</legend>
                        </div>
                        <div class="col-lg-3 col-md-3" style="">
                            <center>
                                 <a href="pages/tableau_de_bordAD.php"><img src="../docs/emoticones/new/tdb3.png" width="40%" alt="Front Office" > </a>
                            </center>
                            <legend style="color:black; text-align:center; border-bottom: 1px solid #b90112 ">Tableau de bord</legend>
                        </div>                        
                        
                    </div>          
                </div> 
            </div> 

        </div> 

        <div class="col-lg-1"></div>                 

    </div>
       
        <div class="col-lg-12" style="text-align:center; padding-top: 20px; font-family: century gothic; font-size: 1.5em;">

                    Copyright &copy;<script>document.write(new Date().getFullYear());</script> Tous droits réservés | Ce modèle est fait par <a style="color:darkblue" href="https://softech-rdc.com" target="_blank">Soft Tech Corporation</a><br>
                    <br>
                    
                        <a style="color:darkblue" href="pages/apropos.php" target="_blank"><button class="btn-lg btn btn-danger ">A propos de nous</button></a>
                    
        </div>

        

        <style type="text/css">
            legend{font-family: century gothic; font-size: 1.2em;}    
        </style>

    <script src="../bootstrap/js/jquery.js"></script>
    <script src="../bootstrap/js/bootstrap.min.js"></script>

    </body>
</html>