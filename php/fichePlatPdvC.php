
<?php
    require_once ('security_cpt.php'); 
    require_once('bd_cnx.php');

    $dateJ = date('Y-m-d');

    $req1=$bd->prepare("SELECT SUM(ptPanier) as total FROM panier WHERE datePanier LIKE '%$dateJ%' AND product='P' AND etatPanier='close'");
    $req1->execute(array());
    $don1=$req1->fetch();
    
    $req3=$bd->prepare("SELECT SUM(ptPanier) as total FROM panier WHERE datePanier LIKE '%$dateJ%' AND product='P' AND etatPanier='close' AND modePaie='Cash'");
    $req3->execute(array());
    $don3=$req3->fetch();

    $req4=$bd->prepare("SELECT SUM(ptPanier) as total FROM panier WHERE datePanier LIKE '%$dateJ%' AND product='P' AND etatPanier='close' AND modePaie='Crédit'");
    $req4->execute(array());
    $don4=$req4->fetch();

    $req2=$bd->query("SELECT designation,qtePanier,puPanier,ptPanier, modePaie,date_format(datePanier, '%d-%m-%Y à %T ') as datePanier FROM panier  WHERE datePanier LIKE '%$dateJ%' AND product='P' AND etatPanier='close' ORDER BY  datePanier DESC ");
    if (isset($_GET['save'])) {
        $in=$_GET['dateIn'];
        $out=$_GET['dateOut'];
        $pointvente=$_GET['pdv'];

         $req1 = $bd->prepare("SELECT SUM(ptPanier) as total FROM panier WHERE datePanier BETWEEN ? AND ? AND product='P' AND etatPanier='close' AND idPv='$pointvente'");
         $req1->execute(array($in,$out));
         $don1=$req1->fetch();

         $req3=$bd->prepare("SELECT SUM(ptPanier) as total FROM panier WHERE datePanier BETWEEN ? AND ? AND product='P' AND etatPanier='close' AND modePaie='Cash' AND idPv='$pointvente'");
        $req3->execute(array($in,$out));
        $don3=$req3->fetch();

        $req4=$bd->prepare("SELECT SUM(ptPanier) as total FROM panier WHERE datePanier BETWEEN ? AND ? AND product='P' AND etatPanier='close' AND modePaie='Crédit' AND idPv='$pointvente'");
        $req4->execute(array($in,$out));
        $don4=$req4->fetch();

        $req2=$bd->prepare("SELECT designation,qtePanier,puPanier,ptPanier, modePaie,date_format(datePanier, '%d-%m-%Y à %T ') as datePanier FROM panier  WHERE datePanier BETWEEN ? AND ? AND product='P' AND etatPanier='close' AND idPv='$pointvente' ORDER BY  datePanier DESC");
        $req2->execute(array($in,$out));
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
                        <h3 class="text-center text-uppercase" style="text-align:center; border: 1px solid black">Fiche de Vente plats <?php if(isset($_GET['save'])){
                            $pdv=$_GET['pdv'];
                            $req=$bd->query("SELECT * FROM pointvente WHERE idPv='$pdv'");
                            $don=$req->fetch(PDO::FETCH_ASSOC);
                            echo $don['libPv'];
                        } ?> 
                        
                        </h3>
                        <div class="cacher">
                            <form action="" method="GET">
                                <div class="input-group">
                                    <div class="input-group-append">
                                        <span class="input-group-text">Date début</span>
                                    </div>
                                    <input type="date" name="dateIn" value="<?php echo(isset($_GET['dateIn'])?$_GET['dateIn']:'') ?>" class="form-control">
                                    
                                </div><br>
                                <div class="input-group">
                                    <div class="input-group-append">
                                        <span class="input-group-text">Date de fin</span>
                                    </div>
                                        <input type="date" name="dateOut"value="<?php echo(isset($_GET['dateOut'])?$_GET['dateOut']:'') ?>" class="form-control">
                                </div><br>
                                <select name="pdv" id="" class="form-control" required="">
                                    <option value="" selected="" disabled="">Choisir un point de vente</option>
                                    <?php 
                                        $select_id = $bd->query('SELECT * FROM pointvente');
                                        while($selec_id = $select_id->fetch()){
                                            ?>
                                        <option value=" <?php echo $selec_id['idPv']  ?>">
                                             <?php echo $selec_id['libPv'];  ?>
                                        </option>
                                     <?php  }  ?>
                                </select><br>
                                <div class="row">
                                    <div class="col-md-6 text-center">
                                        <button type="submit" class="btn btn-danger" name="save">Visualiser</button><br>
                                    </div>
                                </div>
                            </form>
                        </div>
                        
                        
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
                            <th>Bouteilles</th>
                            <th>Prix  </th>
                            <th>Prix Total </th>  
                            <th>Mode</th>  
                            <th>Date vente</th>  
                            
                        
                           
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
                                       <td><?php echo $don2['datePanier'] ?></td>
                                      
                                       
                                        
                                        
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
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 offset-4 spacer">
                    <h class="text-center"><em>Fait à Uvira, le <?php $madate= date('d-m-Y H:i:s'); 
                            list($annee,$mois,$jour,$h,$m,$s)=sscanf($madate,"%d-%d-%d %d:%d:%d"); 
                            $h+=2; 
                            $timestamp=mktime($h,$m,$s,$mois,$annee,$jour); 
                            $new_date=date('d-m-Y à H:i:s',$timestamp); 
                            echo $new_date; 
                        ?></em> </h>
                </div>
                
            </div>
            <div class="row">
                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 offset-9">
                        <button type="button" class="btn btn-primary print pull-right"><span class="fa fa-print"></span> Imprimer</button>
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
             
                
        