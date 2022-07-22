<?php
    require_once ('security_recept.php');
    require_once ('bd_cnx.php');  
    $id=$_GET['id'];
    //$req=$bd->query("SET NAMES 'utf8'");
    $req=$bd->query("SELECT idLoc,nbreJour,typeLoc,type,nbrePersonne,reduction,ptLoc,date_format(dateDebut,'%e-%m-%Y') as date_in,date_format(dateFin,'%e-%m-%Y') as date_out,nomSalle,nomOrg,prixSalle,adresse,tel,emailOrg FROM location AS A,salle as B,organisation AS C WHERE B.idSalle=A.idSalle AND C.idOrg=A.idOrg AND idLOc=$id");
    $don=$req->fetch(PDO::FETCH_ASSOC);

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
                                <img src="../docs/img/logooooo.png" width="100%;" alt="drapeau de la RDC">
                            </p>
                        </center>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 ">
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
                    <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1 "></div>
                    
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4" style="">
                        <p style="font-weight:bold; font-family: Times new roman; font-size:1.2em;" >Nom de l'organisation : <?php echo $don['nomOrg'] ?> <br>
                        Adresse : <?php echo $don['adresse'] ?> <br>
                        Phone No. : <?php echo $don['tel'] ?> </p><br>
                        Phone No. : <?php echo $don['emailOrg'] ?> </p><br>
                    </div>
            </div>
        </div>
        <div class="container">
            <div class="row spacer" >
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <h1 class="text-center" style="text-decoration:underline;">Facture N° <?php echo $don['idLoc'] ?> </h1>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 spacer">
                    <h3 class="text-center">Date début : <?php echo $don['date_in']; ?> Date de fin : <?php echo $don['date_out']; ?> </h3>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <table class="table table-bordered table-striped table-sm">
                        <thead>
                            <tr>
                                <th>Designation</th>
                                <th>Nombre de jours</th>
                                <th>Prix Unitaire</th>
                                <th>Reduction</th>
                                <th>Nbre de personnes</th>
                                <th>Prix Total</th>
                                 <th>Mode </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>

                                <td><?php echo $don['nomSalle']; ?></td>
                                <td><?php echo $don['nbreJour']; ?></td>
                                <td><?php echo $don['prixSalle'] ?></td>
                                
                                <td><?php echo $don['reduction'] ?></td>
                                <td><?php echo $don['nbrePersonne'] ?></td>
                                <td><?php echo number_format($don['ptLoc'],2).' $'; ?></td>
                                <td><?php echo $don['type']; ?></td>
                            </tr>
                        </tbody>
                    </table>
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
             