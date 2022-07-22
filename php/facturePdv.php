<?php
    require_once ('security_brmn.php'); 
    require_once('bd_cnx.php');
    $point=isset($_SESSION['profil']['agent5'])?$_SESSION['profil']['agent5']['idPv']:'';
     $dateJ=date('Y-m-d');
     $etat='wait';
    if (isset($_GET['tableId'])) { 
        $id=$_GET['tableId'];
        $req=$bd->query("SET NAMES 'utf8'");
        $etat='wait';
        
        $req=$bd->prepare('SELECT * FROM panier WHERE idTable=? AND  etatPanier=?  AND idPv=?');
        $req->execute(array($id,$etat,$point));
        
        $reqCli=$bd->prepare('SELECT * FROM panier WHERE idTable=? AND  etatPanier=? AND idPv=?');
        $reqCli->execute(array($id,$etat,$point));
        $donCli = $reqCli->fetch();
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
        <div class="container">
            <div class="col-lg-12" style="border : 1px solid gray; border-radius:20px; margin-bottom:10px; " >
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
                            
                            <p style="font-weight:bold; font-family:Century Gothic; font-size:2em;" >
                                Id.Nat : 01-83-N19972W / N° RCCM : CD/KIN/RCCM/17-B-00575<br> 
                                Tél : (+243) 975280986,
                                <span>E-mail :  
                                    <a href="#" style="text-decoration:underline">baharibeach2017hotel@gmail.com</a> 
                                </span><br>
                                Adresse : Q. Kavimvira/Kilomoni 1, Avenue de la place, Uvira – Sud-Kivu/ RDC
                                
                            </p>
                        </center>        
                    </div>
                    
                </div>
            </div>
        </div>
        
        <div class="container">
            <div class="row" style="margin-bottom:10px;  " >
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                    <p style="font-family:Century Gothic; font-size:2.3em; text-align:center; font-weight:bold;">
                        Facture N° : <?php 
                            $req1=$bd->prepare("SELECT * FROM serveur AS A INNER JOIN panier AS B ON B.id_serveur=A.id_serveur AND B.idTable=? AND  B.etatPanier=?");
                            $req1->execute(array($id,$etat));
                            $don=$req1->fetch();
                            echo($don['idPanier']);
                         ?>
                    </p>
                    
                    <p style="font-family:Century Gothic; font-size:2.3em; margin-left:20px; ">
                        Date : <?php echo date('d-m-Y'); ?>
                        <br>
                        <span>Heure : <?php echo date('H:i'); ?></span>
                         <br>
 
                        Servi(e) : <?php 
                            
                        echo($don['nom_serveur']); ?>
                       
                        <span style="margin-left : 30px;">Caissier(e) :<?php echo(isset($_SESSION['profil']['agent5'])?$_SESSION['profil']['agent5']['brm_name']:''); ?></span>
                        <br>
                        Client : <?php 
                            if (isset($_POST['id_client'])) {
                                $client=$bd->prepare("SELECT * FROM client WHERE id_client=?");
                                $client->execute(array($_POST['id_client']));
                                $found=$client->fetch(PDO::FETCH_ASSOC);
                                echo($found['nom_client']); 
                            }
                            
                    ?>
                    </p>
                    
                    
                    <p style="font-family:Century Gothic; font-size:2.3em; text-align:center; font-weight:bold;">
                        Table : <?php 
                            $req1=$bd->prepare('SELECT * FROM tablepv WHERE idTable=?');
                            $req1->execute(array($id));
                            $don=$req1->fetch();
                        echo($don['designTable']); ?>
                    </p>

                    <div class="container">
                        <div class="row spacer" style="margin-bottom:20px; " >

                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <table class="table table-bordered table-striped table-sm">
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
                                            <td><?php echo $don['qtePanier'] ?></td>
                                            <td><?php echo $don['puPanier'] ?></td>
                                            <td><?php echo $don['ptPanier'].' $'; ?></td>
                                        </tr>
                                                <?php
                                                $num++;
                                            }
                                         ?>
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    
                    <div class="row spacer" style="margin-bottom: 1.3em;">

                    	<table class="container-fluid">
                    		<tr class="">
                    			<td class="text-center">
									<p class="" style="font-family:Century Gothic; font-size:1.2em;">
	                                
	                                Montant HT : <?php 
	                                $req1=$bd->prepare('SELECT SUM(ptPanier) as total, SUM(puPanier) as totPu, SUM(qtePanier) as totQte FROM panier WHERE idTable=? AND  etatPanier=?');
	                                $req1->execute(array($id,$etat));
	                                $don=$req1->fetch();
	                                $tva=$don['total']*0.16;
	                                echo $don['total']-$tva.' $';

	                             ?> 
                                <br>
                                <span>TVA : +<?php echo $tva.' $'; ?>(16%)</span>
                                 <br>
                                <span><strong>Total : <?php echo $don['total'].' $'; ?></strong></span><br>
                                <span><strong>Payé : <?php if (isset($_POST['accompte'])) {
                                    echo $_POST['accompte'].' $';
                                } ?></strong></span><br>
                                <span><strong>Mode : <?php if (isset($_POST['typePaie'])) {
                                    echo $_POST['typePaie'];
                                } ?></strong></span>
                            </p>
                    		</td>

                    		<td class="text-center">
		                          <?php 
		                               $franc=$bd->query("SELECT * FROM devise WHERE idDevise=1");
		                                $fc = $franc->fetch(PDO::FETCH_ASSOC);
		                                $devise=$fc['devise'];
		                                $taux=$fc['taux'];
		                             ?>
		                            <p class="" style="font-family:Century Gothic; font-size:1.3em;">
		                                
		                                Montant HT : <?php 
		                                $req1=$bd->prepare('SELECT SUM(ptPanier) as total, SUM(puPanier) as totPu, SUM(qtePanier) as totQte FROM panier WHERE idTable=? AND  etatPanier=?');
		                                $req1->execute(array($id,$etat));
		                                $don=$req1->fetch();
		                                $tva=$don['total']*0.16;
		                                echo ($don['total']-$tva)*$taux.'Fc';

		                             ?> 
		                                <br>
		                                <span>TVA : +<?php echo $tva*$taux.'Fc'; ?>(16%)</span>
		                                 <br>
		                                <span><strong>Total : <?php echo $don['total']*$taux.'Fc'; ?></strong></span><br>
		                                <span><strong>Payé : <?php if (isset($_POST['accompte'])) {
		                                    echo $_POST['accompte']*$taux.'Fc';
		                                } ?></strong></span><br>
		                                <span><strong>Mode : <?php if (isset($_POST['typePaie'])) {
		                                    echo $_POST['typePaie'];
		                                } ?></strong></span>
		                            </p>
                    			</td>
                    		</tr>
                    	</table>
                    </div> 

                    <div class="container-fluid">
                    	<div class="row">
                    		<center style="width: 100%;">
	                    		<span class="title text-center" style="font-size:2em; font-family: century Gothic; font-weight: bold;" >
	                    			Merci pour votre visite !</span><br> 

	                    		<p class="text-center" style="font-size:1.8em; font-family: century Gothic">
	                    			Copyright &copy; Soft Tech Corporation
	                    		</p>
                    		</center>
                    	</div>
                    </div>                        

                        <div class="row">
                            <div class="col-md-12 col-sm-3 col-xs-3 valider">
                                <form  method="POST" action="" class="was-validated">

                                <div class="input-group">
                                    <select class="form-control"  name="id_client" required="">
                                            <option selected="" disabled="" value="">Choisir un client à facturer</option>
                                               <?php 
                                                   $select_id = $bd->query('SELECT * FROM client');
                                                   while($selec_id = $select_id->fetch()){
                                               ?>
                                               <option value=" <?php echo $selec_id['id_client']  ?>">
                                               <?php echo $selec_id['nom_client'];?>
                                               </option>
                                                <?php  }  ?>           
                                        </select>
                                    <input type="text" class="form-control " required="" name="accompte" placeholder="Accompte" >
                                    <select name="typePaie" id="" class="form-control" required="">
                                        <option selected="" disabled="" value="">Paiement</option>
                                        <option value="Mobile money">Mobile money</option>
                                        <option value="Chèque">Chèque</option>
                                        <option value="Carte bancaire">Carte bancaire</option>
                                        <option value="Espèces">Espèces</option>
                                        <option value="Crédit">Crédit</option>
                                    </select>
                                    <div class="input-group-append">
                                        <button type="submit"   class="btn btn-danger  d-inline" data-toggle="tooltip" title="Cliquer pour imprimer la facture de la table séléctionnée">Valider</button>
                                    </div>

                                </div>
                                </form><br>
                            <!--   Valider  -->
                            
                            </div>

                            
                        </div>
                        <div class="row">
                            <div class="col-md-3 valider">
                                <form  method="POST" action="validerfact.php" class="was-validated">

                                    <div class="input-group">
                                        
                                        <input type="hidden" name="id" value="<?php echo  $id ; ?>" >
                                        <input type="hidden" name="idPanier" value="<?php echo  $donCli['idPanier'] ; ?>" >
                                        <input type="hidden" name="totQte" value="<?php echo  $don['totQte'] ; ?>" >
                                        <input type="hidden" name="totPu" value="<?php echo  $don['totPu'] ; ?>" >
                                        <input type="hidden" name="totGen" value="<?php echo  $don['total'] ; ?>" >
                                        <input type="hidden" name="id_client" value="<?php if(isset($_POST['id_client'])) echo  $_POST['id_client'] ; ?>" >
                                        <input type="hidden" name="accompte" value="<?php if(isset($_POST['accompte'])) echo  $_POST['accompte'] ; ?>" >
                                        <input type="hidden" name="typePaie" value="<?php if(isset($_POST['typePaie'])) echo  $_POST['typePaie'] ; ?>" >

                                        
                                        
                                        <button type="submit" class="btn btn-danger  pull-right"> Confirmer</button> 

                                    </div>
                                </form>


                            </div>
                            <div class="col-md-3 valider">
                                <a href="pages/venteRestaurant.php"><button type="button" class="btn btn-danger">Retour</button></a>
                            </div>
                            <div class="col-md-3 offset-3">
                                <button type="button" class="btn btn-primary print pull-right"><span class="fa fa-print"></span> Imprimer</button>
                            </div>
                        </div>
                    </div>
                    
                </div>
                
                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8" style=""></div>   
            </div>
        </div>
        
        <style>
            th,td{font-size: 2em;}
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
             