
<?php
    require_once ('security_cpt.php');
    require_once('bd_cnx.php');

    if (isset($_GET['save'])) {
        $in=$_GET['dateIn'];
        $out=$_GET['dateOut'];
        $critere = 'B';

        /*$req = $bd->prepare("SELECT C.qnteSort,date_format(C.dateSort,'%e-%m-%Y à %T') as dateSort,A.libPv, B.designBoiss,B.puBoiss, B.idBoiss FROM sortieboiss as C,prodboiss as B,pointvente as A WHERE A.idPv=C.idPv AND  C.dateSort BETWEEN ? AND ? AND B.idBoiss=? AND A.idPv=?");
        $req->execute(array($in,$out,$idBoiss, $idPv));
        $req1 = $bd->prepare("SELECT SUM(qnteSort*puBoiss) AS total FROM sortieboiss as C,prodboiss as B,pointvente as A WHERE A.idPv=C.idPv AND  C.dateSort BETWEEN ? AND ? AND B.idBoiss=? AND A.idPv=?");
        $req1->execute(array($in,$out,$idBoiss,$idPv));
        $don1=$req1->fetch(PDO::FETCH_ASSOC);
        $req2=$bd->prepare('SELECT designBoiss FROM prodboiss WHERE idBoiss=?');
        $req2->execute(array($idBoiss));
        $don2=$req2->fetch(PDO::FETCH_ASSOC); */

        $req1 = $bd->prepare("SELECT SUM(qtePanier*puPanier) AS total FROM panier WHERE  datePanier BETWEEN ? AND ? AND product=?");
        $req1->execute(array($in,$out,$critere));
        $don1=$req1->fetch();

        $req = $bd->prepare("SELECT * FROM panier WHERE  datePanier BETWEEN ? AND ? AND product=? ");
        $req->execute(array($in,$out,$critere));
        


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
                        <h1 class="text-center text-uppercase" style="text-align:center; border: 1px solid black">Fiche Sortie boisson
                        
                        </h1>
                        
                        <div class="cacher">
                            <form action="" method="GET">
                                
                                <input type="date" name="dateIn" value="<?php echo(isset($_GET['dateIn'])?$_GET['dateIn']:'') ?>" class="form-control"><br>
                                <input type="date" name="dateOut"value="<?php echo(isset($_GET['dateOut'])?$_GET['dateIn']:'') ?>" class="form-control"><br>
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
                            <th>Date</th>
                            <th>Quantite </th>  
                            <th>Pu </th>
                            <th>PT </th>
                           
                        </tr>
                        </thead>
                        <tbody>
                                <?php
                                if (isset($_GET['save'])) {
                                
                                    $num=1;
                                    
                                    while($don=$req->fetch()):
                                        ?>
                                <tr>
                                        <td><?php echo $num; ?></td>
                                        <td><?php echo $don['designation'] ?></td>
                                        <td><?php echo $don['datePanier'] ?></td>
                                       <td><?php echo $don['qtePanier'] ?></td>
                                       <td><?php echo $don['puPanier'] ?></td>
                                       <td><?php echo ($don['qtePanier']*$don['puPanier']) ?></td>
                                        
                                        
                                </tr>
                                <?php
                                $num++;
                                 endwhile;
                                }
                                ?>
                             <tr>
                                <td colspan="5"><strong><h4>Total</h4></strong></td>
                                <td><strong><h4><?php
                                    
                                        echo(isset($_GET['save'])?$don1['total'].' $':'');
                                    
                                 ?></h4></strong>
                                 </td>
                            </tr>
                        </tbody>
                    </table>
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
