<?php
      require_once ('security_admin.php');
      require_once ('bd_cnx.php'); 
       
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
                        <h1 id="h1_bbh_title" style="font-size: 60px; font-family: century gothic; font-weight: bold; margin-top: 2px; margin-left: 10px; color: #b90112; padding-top: 3px;
                            text-shadow: 8px 8px 2px white; text-shadow: 0 0 10px white, 0 0 10px white,0 0 10px white;">Bahari Beach Hotel</h1></marquee> 
                </div>
                
                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2" >
                   
                        <center style="padding-top: 30px;">
                             <a href="admin.php" title="Cliquer pour retourner à la page précedente"><img src="../docs/emoticones/icone%20deconnexxion.png" width="50%" alt="Front Office" > </a>
                        </center>
                       
                </div>

            </div>

        </header>
        
         <div id="sect1" class="row">
            <div class="col-lg-1"></div>
            <div class="col-lg-10" style="padding:1%;">
                <div class="row" style="text-align:center;">
                    <div class="col-md-12 text-center text-uppercase">
                        <h1 style="color:black;  " class="text-center">Rapport comptabilité </h1>
                    </div>
                </div>
                 
                <div class="container" style="background-color:white; padding: 30px; border-radius:0px 200px 0px 200px; border : 2px solid #b90112" >                   

                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">


                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3" style="">
                            <center>
                                 <a href="economatA.php" title="Cliquer pour ajouter une Catégorie"><img src="../docs/emoticones/task5.jpg" width="40%" alt="Fiche Boisson" > </a>
                            </center>
                            <legend style="color:black; text-align:center;">Economat</legend>
                        </div> 

                       <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3" style="">
                            <center>
                                 <a href="receptionA.php"><img src="../docs/emoticones/task6.png" width="40%" alt="Ajout nourriture" > </a>
                            </center>
                            <legend style="color:black; text-align:center;">Réception & Autres</legend>
                        </div>   

                       <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3" style="">
                            <center>
                                 <a href="restaurantA.php">
                                     <img src="../docs/emoticones/new/restaur.png" width="40%" alt="Ajout nourriture" > </a>
                            </center>
                            <legend style="color:black; text-align:center;">Points de vente</legend>
                        </div>   
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3" style=" ">
                            <center>
                                 <a href="situationFinA.php" target="_blank" ><img src="../docs/MAJ/form4.jpg" width="40%" alt="" > </a>
                            </center>
                            <legend style="color:black;  text-align:center;">Situation financière</legend>
                        </div> 

                    </div>  

                
                    
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3" style="">

                            <center>
                                 <a href="tresorerieA.php"><img src="../docs/emoticones/srt.jpg" width="40%" alt="" > </a>
                            </center>
                            <legend style="color:black; text-align:center;">Trésorerie</legend>
                        </div> 

                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3" style="">

                            <center>
                                 <a href="depenseA.php"><img src="../docs/emoticones/srt5.jpg" width="40%" alt="" > </a>
                            </center>
                            <legend style="color:black; text-align:center;">Dépense</legend>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3" style="">

                            <center>
                                 <a href="pages/activiteJournaliereA.php"><img src="../docs/MAJ/form7.png" width="40%" alt="" > </a>
                            </center>
                            <legend style="color:black; text-align:center;">Activité journalière</legend>
                        </div> 
                         <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3" style="">

                            <center>
                                 <a href="ventilationA.php" target="_blank"><img src="../docs/MAJ/form6.png" width="40%" alt="" > </a>
                            </center>
                            <legend style="color:black; text-align:center;">Ventilation journalière</legend>
                        </div>                     

                                          

                    </div>

                </div>
              
                <div class="col-lg-12" style="text-align:center; font-family:century gothic; font-size: 1.5em;">
                    Copyright &copy;<script>document.write(new Date().getFullYear());</script> Tous droits réservés | Ce modèle est fait par 
                <a style="color:darkblue; font-family: century gothic; font-size: 1em;" href="https://softech-rdc.com" target="_blank">Soft Tech Corporation</a>
            </div>
                
            </div>
            
            <div class="col-lg-1"></div>
            
        </div>
        
            <script src="bootstrap/js/jquery.js"></script>
            <script src="bootstrap/js/bootstrap.min.js"></script>

            </body>
    </html>
             