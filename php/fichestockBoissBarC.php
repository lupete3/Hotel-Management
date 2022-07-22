<?php
    require_once ('security_cpt.php');
    require_once('bd_cnx.php');

    $req = $bd->query("SELECT * FROM prodboiss AS A, stockpv AS C,catboiss AS B WHERE B.idCatBoiss=A.idCatBoiss AND C.idBoiss=A.idBoiss AND C.qtStock >0 ORDER BY B.idCatBoiss");

    $req1 = $bd->query("SELECT SUM(qtStock*puBoiss) AS total FROM prodboiss AS A, stockpv AS C,catboiss AS B WHERE B.idCatBoiss=A.idCatBoiss AND C.idBoiss=A.idBoiss AND C.qtStock >0");
    $don1=$req1->fetch(PDO::FETCH_ASSOC);
    if (isset($_GET['save'])) {
        $point=$_GET['pdv'];
        $req = $bd->query("SELECT * FROM prodboiss AS A, stockpv AS C,catboiss AS B WHERE B.idCatBoiss=A.idCatBoiss AND C.idBoiss=A.idBoiss AND C.qtStock >0 AND C.idPv='$point' ORDER BY B.idCatBoiss");

    $req1 = $bd->query("SELECT SUM(qtStock*puBoiss) AS total FROM prodboiss AS A, stockpv AS C,catboiss AS B WHERE B.idCatBoiss=A.idCatBoiss AND C.idBoiss=A.idBoiss AND C.qtStock >0 AND C.idPv='$point'");
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
                        <h3 class="text-center text-uppercase" style="text-align:center; border: 1px solid black">Fiche de stock Boissons <?php if(isset($_GET['save'])){
                            $pdv=$_GET['pdv'];
                            $res=$bd->query("SELECT * FROM pointvente WHERE idPv='$pdv'");
                            $don=$res->fetch(PDO::FETCH_ASSOC);
                            echo $don['libPv'];
                        } ?> </h3>
                        <div class="cacher">
                            <form action="" method="GET">
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
        <div class="container">
            <div class="row spacer" >

                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <table class="table table-bordered table-striped table-sm">
                        <thead>
                            <tr>
                                <th>N°</th>
                                <th>CATEGORIE</th>
                                <th>DESIGNATION</th>
                                <th>BOUTEILLE</th>
                                <th>PU</th>
                                
                                <th>PT</th>
                                <th>OBSERVATION</th>
                            </tr>
                        </thead>
                        <tbody>
                                <?php
                                
                                $num=1;
                                
                                while($don=$req->fetch()):
                                    ?>
                            <tr>
                                    <td> <?php echo $num; ?></td>
                                    <td><?php echo $don['designCatBoiss'] ?></td>
                                    <td><?php echo $don['designBoiss'] ?></td>
                                    <td class="text-right"><?php echo $don['qtStock'] ?></td>
                                    <td class="text-right"><?php echo $don['puBoiss'] ?></td>
                                    <td class="text-right"><strong><?php echo ($don['qtStock']*$don['puBoiss']) ?></strong></td>
                                    <td></td>
                                    
                            </tr>
                            <?php
                            $num++;
                             endwhile;?>
                             <tr>
                                <td colspan="5"><h4><strong>Total</strong></h4></td>
                                <td class="text-right"><h4><strong><?php 
                                    
                                    echo number_format($don1['total'],2).' $';
                                 ?></strong></h4>
                                 </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 spacer">
                   <p>Editeur : <strong><?php echo(isset($_SESSION['profil']['agent5'])?$_SESSION['profil']['agent5']['user_name']:''); ?></strong></p> 
                </div>
                
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 offset-4 spacer">
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

    <script src="pages/bootstrap/js/popper.min.js"></script>
    <script src="pages/bootstrap/js/jquery-3.4.1.min.js"></script>
    <script src="pages/bootstrap/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function(){
            $('.print').on('click',function(){
                window.print();
            });
        });
    </script>
            

    </body>
</html>
             