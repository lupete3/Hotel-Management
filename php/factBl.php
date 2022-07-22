<?php
    require_once ('security_recept.php'); 
    require_once('bd_cnx.php');
    if (isset($_GET['id_client'])) {
        $id=$_GET['id_client'];
        $req=$bd->query("SET NAMES 'utf8'");
        $etat='wait';
        $req=$bd->prepare('SELECT * FROM blanchisserie as A INNER JOIN vetement as B ON A.idVetement=B.idVetement WHERE A.id_client=? AND  A.etatBl=?');
        $req->execute(array($id,$etat));
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
    </head>
    
    <body id="">
        
        <div class="col-lg-12" style="border : 1px solid gray; border-radius:20px; margin-bottom:10px; " >
            <div class="row" style="margin-bottom:5px; margin-top:10px; " >
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                    <center>
                        <p style= " margin-left:0px;">
                            <img src="../docs/emoticones/log1.png"  alt="logo" style="width:40%;">
                        </p>
                    </center>        
                </div>
                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                    <center>
                        
                        <p style="font-weight:bold; font-family:Century Gothic; font-size:1.1em;" >
                            Id.Nat : 01-83-N19972W / N° RCCM : CD/KIN/RCCM/17-B-00575<br> 
                            Tél : (+243) 975280986,
                            <span>E-mail :  
                                <a href="#" style="text-decoration:underline">baharibeach2017hotel@gmail.com</a> 
                            </span><br>
                            <span class="">Site : www.baharibeachhotel.com</span><br>
                            Adresse : Q. Kavimvira/Kilomoni 1, Avenue de la place, Uvira – Sud-Kivu/ RDC
                            
                        </p>

                    </center>        
                </div>
                
            </div>
        

            <div class="row" style="margin-bottom:10px;  " >
                
                
            </div>
        </div>
        
            <div class="row" style="margin-bottom:10px;  " >
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                    <p style="font-family:Century Gothic; font-size:1.5em; text-align:center; font-weight:bold;">
                        Facture N° : <?php 
                            $req1=$bd->prepare('SELECT * FROM blanchisserie AS A INNER JOIN client AS B ON B.id_client=A.id_client AND B.id_client=?');
                            $req1->execute(array($id));
                            $don=$req1->fetch();
                            $idBl=$don['idBl'];
                            echo  $idBl;
                         ?>
                    </p>
                    
                    <p style="font-family:Century Gothic; font-size:1.3em; margin-left:20px; ">
                        Date : <?php echo date('d-m-Y'); ?>
                        <br>
                        <span>Heure : <?php $madate= date('H:i'); 
                                  list($h,$m)=sscanf($madate,"%d:%d"); 
                                  $h+=2; 
                                  $timestamp=mktime($h,$m); 
                                  $new_date=date('H:i',$timestamp); 
                                  echo $new_date; 
                              ?></span>
                         <br>
 
                        Client : <?php 
                            
                        echo($don['nom_client']); ?>
                       
                        <span style="margin-left : 30px;">Editeur : <?php echo(isset($_SESSION['profil']['agent4'])?$_SESSION['profil']['agent4']['user_name']:''); ?></span>

                    </p>
                    
                    
                   

                    <div class="container">
                        <div class="row spacer" style="margin-bottom:20px; " >
                               
                                    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8 offset-2">
                                       <p style="font-family:Century Gothic; font-size:1.5em; text-align:center;">
                        SERVICE : <strong class="text-uppercase">Blanchisserie</strong>
                    </p>
                                    </div>
                                
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>N°</th>
                                            <th>Désignation</th>
                                            <th>Qté</th>
                                            <th>PU</th>
                                            <th>TP</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        $num=1;
                                            while($don=$req->fetch(PDO::FETCH_ASSOC)){
                                                ?>
                                        <tr>
                                            <td><?php echo $num; ?></td>
                                            <td><?php echo $don['designation'] ?></td>
                                            <td><?php echo $don['nbreBl'] ?></td>
                                            <td><?php echo $don['prix'] ?></td>
                                            <td><?php echo $don['ptBl'].' $'; ?></td>
                                        </tr>
                                                <?php
                                                $num++;
                                            }
                                         ?>
                                    </tbody>
                                </table>
                            </div>

                        </div>
                        
                    <div class="row" style="margin-bottom: 1em">
                        <div class="col-lg-6 col-md-6 col-sm-6" style="border-right: 1px solid black">
                            <p class="text-center" style="font-family:Century Gothic; font-size:1em; margin-left:5px; ">
                                Montant HT : <?php 
                                $req1=$bd->prepare('SELECT SUM(A.ptBl) as total, SUM(B.prix) as totPu, SUM(A.nbreBl) as totQte FROM blanchisserie as A INNER JOIN vetement as B ON A.idVetement=B.idVetement WHERE A.id_client=? AND  A.etatBl=?');
                                $req1->execute(array($id,$etat));
                                $don=$req1->fetch();
                                $tva=$don['total']*0.16;
                                echo $don['total']-$tva.' $';

                             ?> 
                                <br>
                                <span>TVA : +<?php echo $tva.' $'; ?>(16%)</span>
                                 <br>
                                <span><strong>Total : <?php echo $don['total'].' $';?></strong></span>
                                <br>
                                <span><strong>Payé : <?php if (isset($_POST['accompte'])) {
                                    echo $_POST['accompte'].' $';
                                } ?></strong></span><br>
                                <span><strong>Mode : <?php if (isset($_POST['typePaie'])) {
                                    echo $_POST['typePaie'];
                                } ?></strong></span>
                            </p>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-6" style="border-left: 1px solid black">
                            <?php 
                                        $franc=$bd->query("SELECT * FROM devise WHERE idDevise=1");
                                        $fc = $franc->fetch(PDO::FETCH_ASSOC);
                                        $devise=$fc['devise'];
                                        $taux=$fc['taux'];
                                     ?>
                            <p class="text-center" style="font-family:Century Gothic; font-size:1em; margin-left:5px; ">
                                Montant HT : <?php 
                                $req1=$bd->prepare('SELECT SUM(A.ptBl) as total, SUM(B.prix) as totPu, SUM(A.nbreBl) as totQte FROM blanchisserie as A INNER JOIN vetement as B ON A.idVetement=B.idVetement WHERE A.id_client=? AND  A.etatBl=?');
                                $req1->execute(array($id,$etat));
                                $don=$req1->fetch();
                                $tva=$don['total']*0.16;
                                echo ($don['total']-$tva)*$taux.'Fc';

                             ?> 
                                <br>
                                <span>TVA : +<?php echo $tva*$taux.'Fc'; ?>(16%)</span>
                                 <br>
                                <span><strong>Total : <?php echo $don['total']*$taux.'Fc'; ?></strong></span>
                                <br>
                                <span><strong>Payé : <?php if (isset($_POST['accompte'])) {
                                    echo $_POST['accompte']*$taux.'Fc';
                                } ?></strong></span><br>
                                <span><strong>Mode : <?php if (isset($_POST['typePaie'])) {
                                    echo $_POST['typePaie'];
                                } ?></strong></span>
                            </p>
                        </div>
                    </div>
                        

                        <div class="row">
                            <div class="col-md-7 col-sm-3 col-xs-3 cacher">
                                <form  method="POST" action="" class="was-validated">
                                <div class="input-group">
                                  
                                
                                    <input type="number" class="form-control btn-lg" required="" name="accompte" placeholder="Accompte" >
                                    <select name="typePaie" id="" class="form-control btn-lg" required="">
                                        <option selected="" disabled="" value="">Paiement</option>
                                        <option value="Mobile money">Mobile money</option>
                                        <option value="Chèque">Chèque</option>
                                        <option value="Carte bancaire">Carte bancaire</option>
                                        <option value="Espèces">Espèces</option>
                                        <option value="Crédit">Crédit</option>
                                    </select>
                                    <div class="input-group-append">
                                        <button type="submit"   class="btn btn-danger btn-lg d-inline" data-toggle="tooltip" title="Cliquer pour imprimer la facture de la table séléctionnée">Valider</button>
                                    </div>
                                </div>
                                </form>
                            
                            </div>
                        </div>
                            <div class="row">
                                <div class="col-md-6 valider">
                                    <form  method="POST" action="validerfactBl.php" class="was-validated">

                                        <div class="input-group">
                                          
                                            <input type="hidden" name="id" value="<?php echo  $id ; ?>" >
                                        <input type="hidden" name="idBl" value="<?php echo  $idBl ; ?>" >
                                        <input type="hidden" name="totQte" value="<?php echo  $don['totQte'] ; ?>" >
                                        <input type="hidden" name="totPu" value="<?php echo  $don['totPu'] ; ?>" >
                                        <input type="hidden" name="totGen" value="<?php echo  $don['total'] ; ?>" >
                                            <input type="hidden" name="accompte" value="<?php if(isset($_POST['accompte'])) echo  $_POST['accompte'] ; ?>" >
                                            <input type="hidden" name="typePaie" value="<?php if(isset($_POST['typePaie'])) echo  $_POST['typePaie'] ; ?>" >
                                            
                                            <button type="submit" class="btn btn-danger  pull-right"> Retour</button>

                                        </div>
                                    </form>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 offset-2">
                                <button type="button" class="btn btn-primary print pull-right"><span class="fa fa-print"></span> Imprimer</button>
                            </div>
                            
                            </div>
                            
                        
                    </div>
                    
                </div>
                
                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8" style=""></div>   
            </div>
        
        <style>
            th,td{font-size: 1.5em;}
        </style>
        

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
             