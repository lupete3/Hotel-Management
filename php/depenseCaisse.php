<?php
    require_once ('security_cpt.php');
    require_once('bd_cnx.php');
     $dateJ=date('Y-m-d');

    $req = $bd->prepare("SELECT  agent,montantSortie,date_format(dateSortie,'%d-%m-%Y') as dateSortie,motifSortie FROM sortieCaisse WHERE  dateSortie LIKE '%$dateJ%'");
        $req->execute();
        $req1 = $bd->prepare("SELECT SUM(montantSortie) AS total FROM sortieCaisse WHERE dateSortie LIKE '%$dateJ%'");
        $req1->execute();
        $don1=$req1->fetch(PDO::FETCH_ASSOC);

    if (isset($_GET['save'])) {
        
        $in=$_GET['dateIn'];
        $out=$_GET['dateOut'];

        $req = $bd->prepare("SELECT  agent,montantSortie,date_format(dateSortie,'%d-%m-%Y') as dateSortie,motifSortie FROM sortieCaisse WHERE  dateSortie BETWEEN ? AND ? ");
        $req->execute(array($in,$out));
        $req1 = $bd->prepare("SELECT SUM(montantSortie) AS total FROM sortieCaisse WHERE dateSortie BETWEEN ? AND ? ");
        $req1->execute(array($in,$out));
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

                <!-------------------------------------------------------------------------
                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 ">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="">
                                <p style="font-weight:bold; font-family: Times new roman; font-size:1.2em;" >
                                    N° RCCM : CD/KIN/RCCM/17-B-00575<br> 
                                    Id.Nat : 01-83-N19972W <br> 
                                    Tél : (+243) 975280986<br>
                                    www.baharibeachhotel.com <br>
                                    <span>E-mail : 
                                        <a href="#" style="text-decoration:underline; margin-right:10px;">
                                            baharibeach2017hotel@yahoo.fr, 
                                        </a> 
                                        <a href="#" style="text-decoration:underline">baharibeach2017hotel@gmail.com</a> 
                                    </span>
                                </p>
                            </div>
                        </div>
                        
                    </div>
                --------------------------------------------------------------------------->
                
                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8" >
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="padding-top:70px;">
                        <h1 class="text-center text-uppercase" style="text-align:center">Fiche de depenses caisse
                         
                        </h1>
                        
                        <div class="cacher">
                            <form action="" method="GET">
                            
                                <div class="input-group">
                                    <div class="input-group-append">
                                        <span class="input-group-text">Date début</span>
                                    </div>
                                    <input type="date" name="dateIn" value="<?php echo(isset($_GET['dateIn'])?$_GET['dateIn']:'') ?>" class="form-control">
                                </div>
                                <br>
                                <div class="input-group">
                                    <div class="input-group-append">
                                        <span class="input-group-text">Date fin</span>
                                    </div>
                                    <input type="date" name="dateOut"value="<?php echo(isset($_GET['dateOut'])?$_GET['dateIn']:'') ?>" class="form-control"><br>
                                </div>
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
                            <tr>
                                <th>N°</th>
                                <th>Agent </th>  
                                <th>Motif </th>  
                                <th>Date</th>  
                                <th>Nom agent</th> 
                                <th>OBSERVATION</th>
                            </tr>
                        </thead>
                        <tbody>
                                <?php
                                
                                    $num=1;
                                    
                                    while($don=$req->fetch()):
                                        ?>
                                <tr>
                                        <td><?php echo $num; ?></td>
                                        <td><?php echo $don['agent'] ?></td>
                                        <td><?php echo $don['motifSortie'] ?></td>
                                        <td><?php echo $don['dateSortie'] ?></td>
                                        <td><?php echo $don['montantSortie'] ?></td>
                                        <td></td>
                                        
                                </tr>
                                <?php
                                $num++;
                                 endwhile;
                                                                ?>
                             <tr>
                                <td colspan="4"><strong><h4>Total</h4></strong></td>
                                <td><strong><h4><?php
                                    
                                        echo(isset($_GET['save'])?number_format($don1['total'],2).' $':number_format($don1['total'],2).' $');
                                    
                                 ?></h4></strong>
                                 </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 offset-8 spacer">
                    <h class="text-center"><em>Fait à Uvira, le <?php echo date('d-m-Y').' à '.date("H:i"); ?></em> </h><br>
                    Editeur : <?php echo(isset($_SESSION['profil']['agent1'])?$_SESSION['profil']['agent1']['user_name']:''); ?>
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
