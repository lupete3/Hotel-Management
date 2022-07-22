<?php
    require_once ('security_cpt.php'); 
    require_once('bd_cnx.php');
    if (isset($_GET['idOrg'])) {
      
        $idOrg=$_GET['idOrg'];
        
         $req = $bd->prepare("SELECT * FROM location AS A ,organisation AS B, salle as C WHERE  B.idOrg=A.idOrg AND C.idSalle=A.idSalle AND A.modepaie='Credit' AND A.type='Crédit' AND A.idOrg=? ");
        $req->execute(array($idOrg));
        $req1 = $bd->prepare("SELECT * FROM location AS A ,organisation AS B, salle as C WHERE  B.idOrg=A.idOrg AND C.idSalle=A.idSalle AND A.modepaie='Credit' AND A.type='Crédit' AND A.idOrg=? ");
        $req1->execute(array($idOrg));
         $don1=$req1->fetch(PDO::FETCH_ASSOC);
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
        
        <div class="col-lg-4" style="border : 1px solid gray; border-radius:20px; margin-bottom:10px; " >
            <div class="row" style="margin-bottom:5px; margin-top:10px; " >
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <center>
                        <p style= " margin-left:0px;">
                            <img src="../docs/emoticones/log1.png"  alt="logo" style="width:40%;">
                        </p>
                    </center>        
                </div>
                
            </div>
        

            <div class="row" style="margin-bottom:10px;  " >
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <center>
                        
                        <p style="font-weight:bold; font-family:Century Gothic; font-size:1.1em;" >
                            Id.Nat : 01-83-N19972W / N° RCCM : CD/KIN/RCCM/17-B-00575<br> 
                            Tél : (+243) 975280986,
                            <span>E-mail :  
                                <a href="#" style="text-decoration:underline">baharibeach2017hotel@gmail.com</a> 
                            </span><br>
                            <span class="">Site : www.baharibeachhotel.com</span><br>
                            Adresse : 555, De la plage, Kilomoni 1 Q. Kamvivira - Uvira – Sud-Kivu / RD Congo
                            
                        </p>

                    </center>        
                </div>
                
            </div>
        </div>
        
            <div class="row" style="margin-bottom:10px;  " >
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">

                    <p style="font-family:Century Gothic; font-size:1.5em; text-align:center; font-weight:bold;">
                        Facture N° : <?php  echo $don1['idLoc'];?>
                    </p>
                    
                    <p style="font-family:Century Gothic; font-size:1.5em; margin-left:20px; ">
                        Date : <?php echo date('d-m-Y'); ?>
                        <br>
                        <span>Heure : <?php echo date('H:i'); ?></span>
                         <br>
 
                      Organisation : <?php
                           
                            echo $don1['nomOrg'];
                         ?><br>
                        Editeur : <?php echo(isset($_SESSION['profil']['agent1'])?$_SESSION['profil']['agent1']['user_name']:''); ?>
                    </p>
                    
                    
                    <p style="font-family:Century Gothic; font-size:1.7em; text-align:center; font-weight:bold;">
                        
                    </p>

                    <div class="container">
                        <div class="row spacer" style="margin-bottom:20px; " >

                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>N°</th>
                                            <th>Désignation</th>
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
                                            <td><?php echo $don['nomSalle'] ?></td>
                                            <td><?php echo $don['reste'] ?></td>
                                        </tr>
                                                <?php
                                                $num++;
                                            }
                                         ?>
                                    </tbody>
                                </table>
                            </div>

                        </div>
                        
                        <p class="text-center" style="font-family:Century Gothic; font-size:1.5em; margin-left:20px; ">
                            
                            Montant HT : <?php 
                            $req1=$bd->prepare("SELECT SUM(reste) as total FROM location AS A ,organisation AS B, salle as C WHERE  B.idOrg=A.idOrg AND C.idSalle=A.idSalle AND A.modepaie='Credit' AND A.type='Crédit' AND A.idOrg=?");
                            $req1->execute(array($idOrg));
                            $don=$req1->fetch();
                            $tva=$don['total']*0.16;
                            echo number_format($don['total']-$tva,2).' $';

                         ?> 
                            <br>
                            <span>TVA : +<?php echo $tva.' $'; ?>(16%)</span>
                             <br>
                            <span><strong>Total : <?php echo number_format($don['total'],2).' $'; ?></strong></span><br>
                            <?php if (isset($_POST['accompte'])): ?>
                                <span><strong>Payé : <?php echo number_format($_POST['accompte'],2).' $'; ?></strong></span><br></Bbr>
                                <span><strong>Reste : <?php  
                                $reste=$don['total']-$_POST['accompte'];
                                    echo number_format($reste,2).' $';
                                 ?>
                                    
                                </strong></span>
                            <?php endif ?>
                            
                        </p>
                        

                        <div class="row">
                            <div class="col-md-8 col-sm-8 col-xs-8 valider">
                                <form  method="POST" action="" class="was-validated">

                                <div class="input-group">                                    
                                    <input type="text" class="form-control btn-lg" required="" name="accompte" placeholder="Accompte" >
                                    <div class="input-group-append">
                                        <button type="submit"   class="btn btn-danger btn-lg d-inline" data-toggle="tooltip" title="Cliquer pour imprimer la facture de la table séléctionnée">Payer</button>
                                    </div>
                                </div>
                                </form>
                            
                            
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                <form  method="POST" action="pages/upDetteOrg.php">

                                <div class="input-group">
                                  
                                    <input type="hidden" name="id" value="<?php echo  $idOrg ; ?>" >
                                    <input type="hidden" name="reste" value="<?php echo(isset($reste)?$reste:'') ; ?>" >
                                    
                                    <div class="input-group-append">
                                        <button type="submit"   class="btn btn-danger btn-lg d-inline" data-toggle="tooltip" title="Cliquer pour imprimer la facture de la table séléctionnée">OK</button>
                                    </div>
                                </div>
                                </form>
                            </div>
                         </div><br>
                            <div class="row">
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 offset-6">
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
                $('.valider').hide();
                if (!window.print()) {
                    $('.valider').show();
                };
            });
        });
    </script>
            

    </body>
</html>
             