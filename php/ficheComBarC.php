<?php
    require_once ('security_cpt.php');
    require_once('bd_cnx.php');
      $dateJ=date('Y-m-d');
      $statut='Validé';

      $req = $bd->query("SELECT C.designBoiss,A.qteCom,C.nbUniteBoiss,C.puBoiss,date_format(A.dateCom, '%d-%m-%Y à %T ') as dateCom  FROM commande AS A ,catboiss AS B , prodboiss AS C WHERE A.idBoiss=C.idBoiss AND C.idCatBoiss=B.idCatBoiss AND dateCom LIKE '%$dateJ%' ");

      $req1=$bd->query("SELECT SUM(C.nbUniteBoiss*C.puBoiss*A.qteCom) as total FROM commande AS A ,catboiss AS B , prodboiss AS C WHERE A.idBoiss=C.idBoiss AND C.idCatBoiss=B.idCatBoiss AND dateCom LIKE '%$dateJ%'");

      if (isset($_GET['save'])) {
        $in=$_GET['dateIn'];
        $out=$_GET['dateOut'];
        $pointvente=$_GET['pdv'];

         $req = $bd->prepare("SELECT C.designBoiss,A.qteCom,C.nbUniteBoiss,C.puBoiss,date_format(A.dateCom, '%d-%m-%Y à %T ') as dateCom  FROM commande AS A ,catboiss AS B , prodboiss AS C WHERE A.idBoiss=C.idBoiss AND C.idCatBoiss=B.idCatBoiss AND dateCom BETWEEN ? AND ? AND statutCom='$statut' AND idPv='$pointvente'");
         $req->execute(array($in,$out));
        $req1=$bd->prepare("SELECT SUM(C.nbUniteBoiss*C.puBoiss*A.qteCom) as total FROM commande AS A ,catboiss AS B , prodboiss AS C WHERE A.idBoiss=C.idBoiss AND C.idCatBoiss=B.idCatBoiss AND dateCom BETWEEN ? AND ? AND statutCom='$statut' AND idPv='$pointvente'");
        $req1->execute(array($in,$out));
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
                        <h4 class="text-center text-uppercase" style="text-align:center; border: 1px solid black">Liste de commandes journalières <?php if(isset($_GET['save'])){
                            $pdv=$_GET['pdv'];
                            $res=$bd->query("SELECT * FROM pointvente WHERE idPv='$pdv'");
                            $don=$res->fetch(PDO::FETCH_ASSOC);
                            echo $don['libPv'];
                        } ?> </h4>
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
        <div class="container">
            <div class="row spacer" >

                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr class="text-uppercase">
                                <th>N°</th>   
                                <th>Catégorie</th>
                                <th>Boisson</th>  
                                <th>Stock</th>  
                                <th>PU</th>  
                                <th>PT</th>  
                                <th>Date</th>  
                                <th>OBSERVATION</th>
                            </tr>
                        </thead>
                        <tbody>
                                <?php
                              
                                
                                $num=1;
                                
                                while($don=$req->fetch()):
                                    ?>
                            <tr>
                                   <td><?php echo $num;  ?></td>
                                    <td><?php echo $don['designBoiss'] ?></td>
                                    <td><?php echo $don['qteCom'] ?></td>
                                    <td><?php echo $don['nbUniteBoiss'] ?></td>
                                    <td><?php echo $don['puBoiss'] ?></td>
                                    <td><?php echo $don['qteCom']*$don['nbUniteBoiss']*$don['puBoiss'] ?></td>
                                    <td><?php echo $don['dateCom'] ?></td>

                                    
                            </tr>
                            <?php
                            $num++;
                             endwhile;?>
                             <tr>
                                            <td colspan="5">Total</td>
                                            <td><strong>
                                                <?php 
        
                                                $don=$req1->fetch(PDO::FETCH_ASSOC);
                                                echo number_format($don['total'],2).' $';
                                                 ?>
                                                 </strong>
                                            </td>
                                            <td></td>
                            </tr>
                            
                        </tbody>
                    </table>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 spacer">
                   <p>Editeur : <strong><?php echo(isset($_SESSION['profil']['agent5'])?$_SESSION['profil']['agent5']['user_name']:''); ?></strong></p> 
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
             