<?php
      require_once ('security_eco.php');
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
                        <h1 id="h1_bbh_title" style="font-size: 40px; font-family: century gothic; font-weight: bold; margin-top: 2px; margin-left: 10px; color: #b90112; padding-top: 3px; text-shadow: 8px 8px 2px white; 
                        text-shadow: 0 0 10px white, 0 0 10px white,0 0 10px white;">Bahari Beach Hotel</h1></marquee> 
                </div>
                
                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2" >
                   
                        <center style="padding-top: 30px;">
                             <a href="ac_sess/ac_eco.php" title="Cliquer pour retourner à la page précedente"><img src="../docs/emoticones/icone%20deconnexxion.png" width="50%" alt="Front Office" > </a>
                        </center>
                       
                </div>

            </div>

        </header>
        
        <div id="sect1" class="container">
            <div class="row">
                <div class="col-lg-12" style="padding:1%;">
                <div class="row" style="text-align:center;">
                    <div class="col-md-12 text-center text-uppercase">
                        <h1 style="color:black;  " class="text-center">Rapport Stocks </h1>
                    </div>
                </div>
                 
                <div class="container" style="background-color:white; padding: 20px; border-radius:50px; border : 2px solid #b90112" >                   

                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">


                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3" style="">
                            <center>
                                 <a href="ficheStockBoiss.php" target="_blank" title="Cliquer pour ajouter une Catégorie"><img src="../docs/emoticones/task5.jpg" width="40%" alt="Fiche Boisson" > </a>
                            </center>
                            <legend style="color:black; text-align:center;">Fiche Boisson</legend>
                        </div> 

                       <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3" style="">
                            <center>
                                 <a href="ficheStockNour.php" target="_blank"><img src="../docs/emoticones/task6.png" width="40%" alt="Ajout nourriture" > </a>
                            </center>
                            <legend style="color:black; text-align:center;">Fiche Nourriture</legend>
                        </div>   

                       <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3" style="">
                            <center>
                                 <a href="ficheStockDiv.php" target="_blank">
                                     <img src="../docs/emoticones/file.jpeg" width="40%" alt="Ajout nourriture" > </a>
                            </center>
                            <legend style="color:black; text-align:center;">Fiche Produis divers</legend>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3" style="">
                            <center>
                                 <a href="ficheStockDivCuis.php" target="_blank">
                                     <img src="../docs/emoticones/task7.png" width="40%" alt="Ajout nourriture" > </a>
                            </center>
                            <legend style="color:black; text-align:center;">Fiche Produis connexe</legend>
                        </div>


                    </div>  

                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3" style="">
                             <center>
                                 <a href="ficheApprovBoiss.php" target="_blank"><img src="../docs/emoticones/new/fichest.png" width="40%" alt="Boisson" > </a>
                            </center>
                            <legend style="color:black; text-align:center;">Approv. Boisson</legend>
                        </div>                 
                    
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3" style="">
                            <center>
                                 <a href="ficheApprovNour.php" target="_blank" title="Cliquer pour ajouter une Catégorie"><img src="../docs/emoticones/task2.jpg" width="40%" alt="Ajout nourriture" > </a>
                            </center>
                            <legend style="color:black; text-align:center;">Appov. Nourriture</legend>
                        </div>

                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3" style="">
                             <center>
                                 <a href="ficheApprovDiv.php" target="_blank"><img src="../docs/emoticones/fil.png" width="40%" alt="Boisson" > </a>
                            </center>
                            <legend style="color:black; text-align:center;">Approv. Produit Divers</legend>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3" style="">
                             <center>
                                 <a href="ficheApprovDivCuis.php" target="_blank"><img src="../docs/emoticones/f1.png" width="40%" alt="Boisson" > </a>
                            </center>
                            <legend style="color:black; text-align:center;">Approv. Produit connexe</legend>
                        </div>
                        

                    </div>
                    
                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3" style="">

                            <center>
                                 <a href="ficheSortieBoiss.php" target="_blank"><img src="../docs/emoticones/srt.jpg" width="40%" alt="" > </a>
                            </center>
                            <legend style="color:black; text-align:center;">Sortie Boisson</legend>
                        </div> 
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3" style="">

                            <center>
                                 <a href="ficheSortieNour.php" target="_blank"><img src="../docs/emoticones/srt5.jpg" width="40%" alt="" > </a>
                            </center>
                            <legend style="color:black; text-align:center;">Sortie Nourriture</legend>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3" style=" ">
                            <center>
                                 <a href="ficheSortieDiv.php" target="_blank"><img src="../docs/emoticones/fil1.jpeg" width="40%" alt="" > </a>
                            </center>
                            <legend style="color:black;  text-align:center;">Sortie produits divers</legend>
                        </div> 
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3" style=" ">
                            <center>
                                 <a href="ficheSortieDivCuis.php" target="_blank"><img src="../docs/emoticones/srt3.png" width="40%" alt="" > </a>
                            </center>
                            <legend style="color:black;  text-align:center;">Sortie produits connexe</legend>
                        </div>  
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                         

                    </div>
                    <div class="col-md-12 col-sm-12 col-md-lg-12">
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4" style="">

                            <center>
                                 <a href="ficheAvarieBoiss.php" target="_blank"><img src="../docs/emoticones/f2.png" width="40%" alt="Approv Produit" > </a>
                            </center>
                            <legend style="color:black; text-align:center;">boissons avariées</legend>
                        </div> 

                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4" style="">

                            <center>
                                 <a href="ficheAvarieNour.php" target="_blank"><img src="../docs/emoticones/f33.png" width="40%" alt="Ajout produit" > </a>
                            </center>
                            <legend style="color:black; text-align:center;">Nourritures avariées</legend>
                        </div>                    

                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4" style=" ">
                            <center>
                                 <a href="ficheAvarieDiv.php" target="_blank"><img src="../docs/emoticones/f44.png" width="40%" alt="Fiche de stock" > </a>
                            </center>
                            <legend style="color:black;  text-align:center;"> produits divers avariés</legend>
                        </div>
                    </div>

                </div>
              
                <div class="col-lg-12" style="text-align:center; font-family:century gothic; font-size: 1.5em;">
                    Copyright &copy;<script>document.write(new Date().getFullYear());</script> Tous droits réservés | Ce modèle est fait par 
                <a style="color:darkblue; font-family: century gothic; font-size: 1em;" href="https://softech-rdc.com" target="_blank">Soft Tech Corporation</a>
            </div>
                
            </div>
            </div>
            
            
        </div>
        
            <script src="bootstrap/js/jquery.js"></script>
            <script src="bootstrap/js/bootstrap.min.js"></script>

            </body>
    </html>
             