<?php 
      require_once ('../security_eco.php');
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
                        <h3 style="font-size: 2.2em; color:whitesmoke; text-align:center; margin-top:10px; font-family: Century gothic;">Hotel Management System 

                            <span style="color:whitesmoke; margin-left:20px; font-family:Century gothic; font-size: 0.6em; "> 
                                Date : <?php echo date("d-m-Y"); ?>
                                Heure : <?php echo date("H:i"); ?> 
                            </span>   
                        </h3>

                    </div>

                    <marquee behavior="alternate" >
                        <h1 id="h1_bbh_title" style="font-size: 40px; font-family: century gothic; font-weight: bold; margin-top: 2px; margin-left: 10px; color: #b90112; padding-top: 3px;text-shadow: 8px 8px 2px white; text-shadow: 0 0 10px white, 0 0 10px white,0 0 10px white;">Bahari Beach Hotel</h1></marquee> 
                </div>
                
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3" >
                       <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 offset-8">
                            <center style="padding-top: 10px;">
                                 <a href="../logout.php" title="cliquer pour vous déconnecter">
                                    <img src="../../docs/emoticones/exit%20circular.png" width="100%" alt="Front Office" > 
                                </a>
                            </center>
                        </div>

                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: 20px;">
                            <span style="text-align: center; color: whitesmoke; font-size: 1.5em;
                                    font-family: century gothic"> User : 
                                <?php echo ' '. strtoupper($_SESSION['profil']['agent2']['user_name']).'<span style="padding-left:10px;">/</span>'.$_SESSION['profil']['agent2']['user_function']; ?>
                            </span>
                        </div>
                
                </div>

            </div>

        </header>
        
        <div id="sect1" class="row">
            <div class="col-lg-1"></div>
            <div class="col-lg-10" style="padding:1%;">
                <div class="row" style="text-align:center;">
                    <div class="col-md-12">
                        <h1 style="text-align:center; font-family: century gothic" class="text-center text-uppercase" >Espace Economat </h1>
                    </div>
                    
                </div>
                
                <div class="container" style="background-color:white; padding: 20px; border-radius:50px; border : 2px solid #b90112" >                   

                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3" style="">
                             <center>
                                 <a href="../pages/approvBoiss.php"><img src="../../docs/emoticones/b.jpeg" width="40%" alt="Boisson" > </a>
                            </center>
                            <legend style="color:black; text-align:center;">Achat Boisson</legend>
                        </div> 

                       <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3" style="">
                            <center>
                                 <a href="../pages/approvNour.php"><img src="../../docs/emoticones/al.png" width="40%" alt="Ajout nourriture" > </a>
                            </center>
                            <legend style="color:black; text-align:center;">Achat Nourriture</legend>
                        </div>   
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3" style="">

                            <center>
                                 <a href="../pages/approvDiv.php"><img src="../../docs/emoticones/pdiv.png" width="40%" alt="Approv Produit" > </a>
                            </center>
                            <legend style="color:black; text-align:center;">Achat Produits divers</legend>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3" style="">

                            <center>
                                 <a href="../pages/approvDivCuis.php"><img src="../../docs/emoticones/apdiv.png" width="40%" alt="Approv Produit" > </a>
                            </center>
                            <legend style="color:black; text-align:center;">Achat divers cusine</legend>
                        </div>
                         
                         


                    </div>  
                    
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3" style=" ">
                            <center>
                                 <a href="../listStock.php"><img src="../../docs/emoticones/stock1.png" width="40%" alt="Fiche de stock" > </a>
                            </center>
                            <legend style="color:black;  text-align:center;">Stock Général</legend>
                        </div>

                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3" style="">
                             <center>
                                 <a href="../gestion_commande.php"><img src="../../docs/emoticones/new/req2.png" width="40%" alt="Visualiser bon de commande" > </a>
                            </center>
                            <legend style="color:black; text-align:center;">Bon de Commande</legend>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3" style="">

                            <center>
                                 <a href="../req_eco.php"><img src="../../docs/emoticones/task7.png" width="40%" alt="Rapport" > </a>
                            </center>
                            <legend style="color:black;  text-align:center;">Réquisition</legend>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3" style="">

                            <center>
                                 <a href="../rapport.php"><img src="../../docs/emoticones/new/tg.png" width="40%" alt="Rapport" > </a>
                            </center>
                            <legend style="color:black;  text-align:center;">Rapport</legend>
                        </div>
                        
                        
                      
                    </div>
                    
                    
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3" style="">
                            <center>
                                 <a href="../pages/produitNour.php"><img src="../../docs/emoticones/nour.jpg" width="40%" alt="Ajout nourriture" > </a>
                            </center>
                            <legend style="color:black; text-align:center;">Gestion Nourriture</legend>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3" style="">
                             <center>
                                 <a href="../pages/produit.php"><img src="../../docs/emoticones/vin.jpg" width="40%" alt="Boisson" > </a>
                            </center>
                            <legend style="color:black; text-align:center;">Gestion Boisson</legend>
                        </div> 

                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3" style="">

                            <center>
                                 <a href="../pages/stockDivers.php"><img src="../../docs/emoticones/divers.png" width="40%" alt="Ajout produit" > </a>
                            </center>
                            <legend style="color:black; text-align:center;">Gestion produit divers</legend>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3" style="">

                            <center>
                                 <a href="../pages/stockDivCuis.php"><img src="../../docs/emoticones/cuit.png" width="40%" alt="Ajout produit" > </a>
                            </center>
                            <legend style="color:black; text-align:center;">Gestion divers cuisine</legend>
                        </div>
                                            

                    </div>
                 
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3" style="">
                            <center>
                                 <a href="../pages/categoriePlat.php"><img src="../../docs/emoticones/new/restaur.png" width="40%" alt="Valeur de stock" > </a>
                            </center>
                            <legend style="color:black; text-align:center;">Catégorie Plat</legend>
                        </div> 
                        
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3" style="">
                            <center>
                                 <a href="../pages/categorie.php" title="Cliquer pour ajouter une Catégorie"><img src="../../docs/emoticones/cat%20boiss.png" width="40%" alt="Ajout nourriture" > </a>
                            </center>
                            <legend style="color:black; text-align:center;">Catégorie Boisson</legend>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3" style=" ">
                            <center>
                                 <a href="../pages/plat.php"><img src="../../docs/emoticones/plat.png" width="40%" alt="Fiche de stock" > </a>
                            </center>
                            <legend style="color:black; text-align:center;">Gestion Plat</legend>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3" style=" ">
                            <center>
                                 <a href="../pages/categorieNour.php"><img src="../../docs/emoticones/noural.jpeg" width="40%" alt="Fiche de stock" > </a>
                            </center>
                            <legend style="color:black; text-align:center;">Catégorie nourriture</legend>
                        </div>
                         
                        
                    </div>
                    <div class="col-md-12 col-lg-12 col-sm-12">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6" style="">
                            <center>
                                    <a href="../pages/four.php"><img src="../../docs/emoticones/new/rec2.png" width="40%" alt="Gestion organisations" > </a>
                            </center>
                            <legend style=" text-align:center;">Gestion des fournisseurs</legend>
                        </div> 
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6" style="">
                            <center>
                                 <a href="../avarie.php"><img src="../../docs/emoticones/desactiv.png" width="40%" alt="Valeur de stock" > </a>
                            </center>
                            <legend style="color:black; text-align:center;">Signaler Produit Avarié</legend>
                        </div>  
                    </div>



                </div>
              
            <div style="text-align:center; padding-top: 20px; color:black; font-size: 1.5em; font-family: century gothic">
                    Copyright &copy;<script>document.write(new Date().getFullYear());</script> Tous droits réservés | Ce modèle est fait par <a style="color:darkblue" href="https://softech-rdc.com" target="_blank">Soft Tech Corporation</a><br>
                    <br>
                    
                        <a style="color:darkblue" href="../pages/apropos.php" target="_blank"><button class="btn-lg btn btn-danger ">A propos de nous</button></a>
                    
                </div>
                
            </div>
            
            <div class="col-lg-1"></div>
            
        </div>


            <style type="text/css">
                legend{font-family: century gothic; font-size: 1.5em;}    

            </style>
        
            <script src="bootstrap/js/jquery.js"></script>
            <script src="bootstrap/js/bootstrap.min.js"></script>

            </body>
    </html>
             