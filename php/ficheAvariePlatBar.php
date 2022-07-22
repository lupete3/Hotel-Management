
<?php
    require_once ('security_brmn.php');
    require_once('bd_cnx.php');
    $dateJ=date('Y-m-d');
    $poste=isset($_SESSION['profil']['agent5'])?$_SESSION['profil']['agent5']['libPv']:'';


        $req = $bd->query("SELECT * FROM avarieplat as A INNER JOIN plat as B ON B.idPlat=A.idPlat WHERE  A.datePlatAv LIKE '%$dateJ%' AND A.postePvPlat='$poste'");

        $req1 = $bd->query("SELECT SUM(qtePlatAv*puPlat) AS total FROM avarieplat as A INNER JOIN plat as B ON B.idPlat=A.idPlat WHERE  A.datePlatAv LIKE '%$dateJ%' AND A.postePvPlat='$poste'");
        $don1=$req1->fetch(PDO::FETCH_ASSOC);
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
                        <h3 class="text-center text-uppercase" style="text-align:center; border: 1px solid black">Fiche Avarie PLAT/<?php echo $poste; ?>
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
                            <th>Plat</th> 
                            <th>Quantite </th>  
                            <th>Pu </th>  
                            <th>Motif </th>  
                            <th>PT</th>
                            <td>Observation</td>
                        </tr>
                        </thead>
                        <tbody>
                                <?php
                                    $num=1;
                                    
                                    while($don=$req->fetch()):
                                        ?>
                                <tr>
                                        <td><?php echo $num; ?></td>
                                        <td><?php echo $don['designPlat'] ?></td>
                                       <td><?php echo $don['qtePlatAv'] ?></td>
                                       <td><?php echo $don['puPlat'] ?></td>
                                        <td><?php echo $don['motifPvPlat'] ?></td>
                                       <td><?php echo ($don['qtePlatAv']*$don['puPlat']) ?></td>
                                        <td></td>
                                        
                                </tr>
                                <?php
                                $num++;
                                 endwhile;
                                ?>
                             <tr>
                                <td colspan="5"><strong><h4>Total</h4></strong></td>
                                <td><strong><h4><?php
                                    
                                        echo number_format($don1['total'],2).' $';
                                    
                                 ?></h4></strong>
                                 </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 spacer">
                   <p>Editeur : <strong><?php echo(isset($_SESSION['profil']['agent5'])?$_SESSION['profil']['agent5']['brm_name']:''); ?></strong></p> 
                </div>
                
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 offset-4 spacer">
                    <h class="text-center"><em>Fait à Uvira, le <?php echo date('d-m-Y').' à '.date("H:i"); ?></em> </h>
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
            $('#liste_cat').change(function(){
                var val= $('#liste_cat').val();
                $.ajax({
                type:"POST",
                url:"pages/get_boisson.php",
                data:'idBoiss='+val,
                success:function(data){
                  $("#list_boisson").html(data);
                }
            });
            });
        });
    </script>
            

    </body>
</html>
