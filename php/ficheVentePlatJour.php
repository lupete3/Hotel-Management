
<?php
    require_once ('security_brmn.php'); 
    require_once('bd_cnx.php');
    $point=isset($_SESSION['profil']['agent5'])?$_SESSION['profil']['agent5']['idPv']:'';
    $poste=isset($_SESSION['profil']['agent5'])?$_SESSION['profil']['agent5']['libPv']:'';

    $dateJ = date('Y-m-d');
    $req1=$bd->prepare("SELECT SUM(ptPanier) as total FROM panier AS A INNER JOIN pointvente AS B ON B.idPv=A.idPv WHERE A.datePanier LIKE '%$dateJ%' AND product='P' AND etatPanier='close' AND B.idPv='$point'");
    $req1->execute(array());
    $don1=$req1->fetch();
    

    $req2=$bd->query("SELECT * FROM panier AS A INNER JOIN pointvente AS B ON B.idPv=A.idPv WHERE A.datePanier LIKE '%$dateJ%' AND product='P' AND etatPanier='close' AND B.idPv='$point' ORDER BY  datePanier DESC ");

    $req3=$bd->prepare("SELECT SUM(ptPanier) as total FROM panier AS A INNER JOIN pointvente AS B ON B.idPv=A.idPv WHERE A.datePanier LIKE '%$dateJ%' AND product='P' AND etatPanier='close' AND B.idPv='$point' AND modePaie='Cash'");
    $req3->execute(array());
    $don3=$req3->fetch();

    $req4=$bd->prepare("SELECT SUM(ptPanier) as total FROM panier AS A INNER JOIN pointvente AS B ON B.idPv=A.idPv WHERE A.datePanier LIKE '%$dateJ%' AND product='P' AND etatPanier='close' AND B.idPv='$point' AND modePaie='Crédit'");
    $req4->execute(array());
    $don4=$req4->fetch();
    
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
        
        <div class="container spacer" style="border-bottom:3px solid black;">
            <div class="row" style="border-bottom:1px solid black;margin-bottom:2px">
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                    <center>
                            <p style= "">
                                <img src="../docs/img/logooooo.png" width="100%;" alt="">
                            </p>
                        </center>
                </div>
                
                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8" >
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="padding-top:70px;">
                        <h3 class="text-center text-uppercase" style="text-align:center; border: 1px solid black">Fiche de Vente plats/<?php echo $poste; ?>
                        
                        </h3>
                        
                        
                    </div>
                
                </div>
                
                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"></div>
                    
                    
            </div>
        </div>
        <div class="container spacer">
            <div class="row spacer">

                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <table class="table table-bordered table-striped spacer">
                        <thead>
                            <tr style="font-weight:bold" class="btn-danger">
                            <th>N°</th>
                            <th>Produit</th>
                            <th>Plat</th>
                            <th>Prix  </th>
                            <th>Prix Total </th>  
                            <th>Mode</th>  
                            
                        
                           
                        </tr>
                        </thead>
                        <tbody>
                                <?php
                        
                                
                                    $num=1;
                                     while($don2=$req2->fetch()):
                                ?>     
                                <tr>
                                       <td><?php echo $num; ?></td>
                                       <td><?php echo $don2['designation'] ?></td>
                                       <td><?php echo $don2['qtePanier'] ?></td>
                                       <td><?php echo $don2['puPanier'] ?></td>
                                       <td><?php echo $don2['ptPanier'] ?></td>
                                       <td><?php echo $don2['modePaie'] ?></td>
                                      
                                       
                                        
                                        
                                </tr>
                                <?php
                                $num++;
                                 endwhile;
                                
                                ?>
                            
                             <tr>
                                <td colspan="4"><strong><h5>Total</h5></strong></td>
                                <td><strong><h5><?php
                                    
                                 echo   number_format($don1['total'],2).' $';
                                    
                                 ?> 
                                </h5></strong>
                                 </td>
                                 <td><h5>
                                     Cash:
                                 <?php
                                    
                                 echo   number_format($don3['total'],2).' $';
                                    
                                 ?>
                                Crédit:
                                <?php
                                    
                                 echo   number_format($don4['total'],2).' $';
                                    
                                 ?>
                                 </h5></td>
                               
                            </tr>
                        </tbody>
                    </table>
                </div>
                </div>
                <div class="container">
                    <div class="row" style="">
                        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 ">
                         <p>Editeur : <strong><?php echo(isset($_SESSION['profil']['agent5'])?$_SESSION['profil']['agent5']['brm_name']:''); ?></strong></p> 
                         </div>
                         <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 spacer">
                           <p>Signature barman </p> 
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 spacer">
                           <p>Signature réceptionniste </p> 
                        </div>
                             <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5 spacer">
                            <h class="text-center"><em>Fait à Uvira, le 
                               <?php $madate= date('d-m-Y H:i:s'); 
                                    list($annee,$mois,$jour,$h,$m,$s)=sscanf($madate,"%d-%d-%d %d:%d:%d"); 
                                    $h+=2; 
                                    $timestamp=mktime($h,$m,$s,$mois,$annee,$jour); 
                                    $new_date=date('d-m-Y à H:i:s',$timestamp); 
                                    echo $new_date; 
                                ?>
                                    
                                </em> </h>
                        </div>
                        
                    
                        
                    </div>
                    <div class="row">
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 offset-9">
                            <button type="button" class="btn btn-primary print pull-right"><span class="fa fa-print"></span> Imprimer</button>
                        </div>
                    </div>

            </div>
        </div>

    <script src="pages/bootstrap/js/popper.min.js"></script>
    <script src="pages/bootstrap/js/jquery-3.4.1.min.js"></script>
    <script src="pages/bootstrap/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function(){
            $('.print').on('click',function(){
                $('.cacher').hide();
                if (!window.print()) {
                    $('.cacher').show();
                }
            });
        });
    </script>
            

    </body>
</html>
             
                
        