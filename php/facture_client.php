<?php
    require_once ('security_recept.php'); 
    require_once('bd_cnx.php');
    //Payer la facture
    if (isset($_POST['payer'])) {
        $a = $_POST['accompte'];
        $type = $_POST['typePaie'];
        $b = $_POST['idFac'];
        $c = $_POST['id_client'];
        $d = $_POST['montantapayer'];
        
        $verif = $d - $a;

        if ($verif >= 0) {
            $reste = $verif;
            $etat=(($reste===0)?'Cash':'Crédit');
            $etatFact=(($etat=='Cash')?'close':'wait');
            $req = $bd->prepare("INSERT INTO facture (idFac,id_client,montantapayer,montantpaye,reste,etat,type) VALUES (?,?,?,?,?,?,?)");
            $don=$req->execute(array($b,$c,$d,$a,$reste,$etat,$type));
            header('location:pages/selection_client.php');

            $req1=$bd->prepare("UPDATE facturation SET etatFact=?,modePaieFact=?,type=? WHERE id_client=? AND etatFact='wait'");
            $req1->execute(array($etatFact,$etat,$type,$c));

            header('location:pages/selection_client.php');
        }elseif($verif < 0) {
            $reste = $d;
            $reste1 = $reste - $d;
            $etat=(($reste1===0)?'Cash':'Crédit');
            $etatFact=(($etat=='Cash')?'close':'wait');

            $req = $bd->prepare("INSERT INTO facture (idFac,id_client,montantapayer,montantpaye,reste,etat,type) VALUES (?,?,?,?,?,?,?)");
            $don=$req->execute(array($b,$c,$d,$d,$reste1,$etat));
            $req1=$bd->prepare("UPDATE facturation SET etatFact=?,modePaieFact=?,type=? WHERE id_client=? AND etatFact='wait'");
            $req1->execute(array($etatFact,$etat,$type,$c));
            header('location:pages/selection_client.php');
            
        }

        
    }

    if (isset($_GET['id']) and isset($_GET['idBook'])) {
        $idCl=$_GET['id'];
        $idBook=$_GET['idBook'];
        
        $req=$bd->query(" SET lc_time_names='fr_FR'");

        $req = $bd->query("SELECT B.nbre_enf,B.nbre_adult,A.telClient, A.residence,B.modePaie, B.id_booking,date_format(B.date_booking,'%d-%m-%Y %T') AS date_booking,date_format(B.date_in,'%d-%m-%Y ') AS date_in,date_format(B.date_out,'%d-%m-%Y ') AS date_out,B.reduction,D.room_code, A.pays,C.nomOrg,A.telClient,A.id_client,A.nom_client FROM client AS A,booking AS B,organisation AS C,rooms AS D WHERE C.idOrg=A.idOrg AND B.id_client=A.id_client AND B.num_chambre=D.id_room AND A.id_client=$idCl AND B.id_booking=$idBook");
        $don=$req->fetch(PDO::FETCH_ASSOC);
        //$in=$don['date_in'];    
        //$out=$don['date_out'];
        $in = $_GET['in'];
        $out = $_GET['out'];

        $req1=$bd->prepare("SELECT * FROM facturation as A, client AS B 
            WHERE B.id_client=A.id_client AND A.id_client=? AND A.dateFact BETWEEN ? AND ?");
       $req1->execute(array($idCl,$in,$out));


        $req4=$bd->prepare("SELECT * FROM facture AS A, client AS B WHERE B.id_client=A.id_client AND A.idFac=? ");
        $req4->execute(array($idBook));
        $fac = $req4->fetch(PDO::FETCH_ASSOC);


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

        <script type="text/javascript" src="pages/js/angular.min.js"></script>
        <script type="text/javascript" src="pages/js/angular-animate.js"></script>
        <script type="text/javascript" src="pages/js/angular-route.js"></script>
    </head>
    
    <body id="" ng-app="">
        
        <div class="container spacer" style="">
            <div class="row" style="margin-bottom:20px; margin-top:30px; " >
                <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
                  
                            <p style= " margin-left:0px;">
                                <img src="../docs/emoticones/log1.PNG"  alt="logo" style="width:70%;">
                            </p>
                        
                </div>
                 
                
                <div class="col-lg-7 col-md-7 col-sm-7 col-xs-7" style="">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="border-bottom:5px double gray">
                                
                                <p style="font-weight:bold; font-family:Century Gothic; font-size:1em;" >
                                    Id.Nat : 01-83-N19972W / N° RCCM : CD/KIN/RCCM/17-B-00575<br> 
                                    Tél : (+243) 975 280 986
                                    <span><br>
                                    E-mail :  <a href="#" style="text-decoration:underline">baharibeach2017hotel@gmail.com</a> 
                                        
                                    </span><br>
                                    <span class="">Site : www.baharibeachhotel.com</span><br>
                                    Adresse : Q. Kavimvira/Kilomoni 1, Avenue de la place, Uvira – Sud-Kivu/ RDC

                                    <span style=""></span>
                                    <br> Banque : TRUST MERCHANT BANK (TMB)
                                     <br> Intitulé du Compte : BAHARI BEACH HOTEL
                                    <br> Numéro du Compte : 00017-22100-30171550001-19 USD
                                </p>
                            </div>
                        </div>
                        
                    </div>   
            </div>
        </div>
        
        <div class="container" style="margin-bottom:20px; ">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 " style="border:1px solid gray; border-radius:20px;">
                    <div class="">
                        <p class="" style="font-size:1em; font-family:Century Gothic;">Facture N° : <?php echo $don['id_booking'];?> 
                            <br> Du :
                                <?php $madate= date('H:i'); 
                                  list($h,$m)=sscanf($madate,"%d:%d"); 
                                  $h+=2; 
                                  $timestamp=mktime($h,$m); 
                                  $new_date=date('H:i',$timestamp); 
                                  echo date('d-m-Y').' à '.$new_date; 
                              ?>
                             <br>
                            Editeur : <?php echo(isset($_SESSION['profil']['agent4'])?$_SESSION['profil']['agent4']['user_name']:''); ?></p>
                    </div>
                </div>

                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"></div>

                <div class="col-lg-7 col-md-7 col-sm-7 col-xs-7" style="border:1px solid gray; border-radius:20px;">
                    <p style="font-size:1em; font-family:Century Gothic;">Client : <strong><?php echo $don['nom_client'] ?></strong>  <br>
                        Adresse : <?php echo $don['residence'] ?> <br>
                        Téléphone : <?php echo $don['telClient'] ?>
                    </p>

                </div>

            </div>
        </div>
        
        <div class="container" style="margin-bottom:20px; ">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 " style="border:1px solid gray; border-radius:20px;">
                    <div class="">
                        <p class="" style="font-size:1em; font-family:Century Gothic;">Chambre N° : <?php echo $don['room_code'] ?> 
                            <br> Nombre de personnes : <?php echo $don['nbre_enf']+$don['nbre_adult'] ?> <br>
                            Traitement : Petit déjeuner et piscine
                        </p>
                    </div>
                </div>

                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"></div>

                <div class="col-lg-7 col-md-7 col-sm-7 col-xs-7" style="border:1px solid gray; border-radius:20px;">
                    <p style="font-size:1em; font-family:Century Gothic;">Organisation : <strong><?php echo $don['nomOrg'] ?></strong> <br>
                        Période : <?php echo $don['date_in'].' au '.$don['date_out']; ?> <br>
                        Paiement : <?php if (isset($_POST['typePaie'])) {
                            echo $_POST['typePaie'];}
                        ?>
                    </p>

                </div>

            </div>
        </div>
        
        
        <div class="container">
            <div class="row spacer" style="margin-bottom:20px; " >

                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Libellé</th>
                                <th>Pu</th>
                                <th>Qté</th>
                                <th>Montant TTC</th>
                                <th>Taux TVA</th>
                                <th>Chambre</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                while ($result=$req1->fetch(PDO::FETCH_ASSOC)) {
                                ?>
                                <tr>
                                    <td><?php echo $result['dateFact'] ?></td>
                                    <td><?php echo $result['designActivite'] ?></td>
                                    <td><?php echo(($result['diffIndex']=='BO')?$result['puFact']-$don['reduction']:'')?></td>
                                    <td><?php echo (($result['diffIndex']=='BO')?$result['qteFact']:'') ?></td>
                                    <td><?php echo $result['ptFact'] ?></td>
                                    <td><?php echo '16%'; ?></td>
                                    <td><?php echo $don['room_code'] ?></td>
                                </tr>

                                <?php
                                }
                             ?>
                        </tbody>
                    </table>
                </div>
                
            </div>
            
            <div class="container" style="margin-bottom:20px; ">
                <div class="row">
                    
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4" style="">
                        
                        <div class="row" style="border:1px solid gray;border-radius:10px; margin-bottom:20px">
                            <div class="col-lg-5 col-md-6 col-sm-6 col-xs-6">
                                <p style="font-size:1em; font-family:Century Gothic;">Taux TVA : <?php echo '16%'; ?> </p> 
                            </div>
                            
                            <div class="col-lg-4 col-md-3 col-sm-3 col-xs-3">
                                <p style="font-size:1em; font-family:Century Gothic;">Montant H.T. : 
                                    <?php 
                                        $req1=$bd->prepare('SELECT SUM(ptFact) as total,SUM(accompte) AS accompte,SUM(reste) as reste FROM facturation WHERE id_client=? AND dateFact BETWEEN ? AND ?');
                                        $req1->execute(array($idCl,$in,$out));
                                        $res = $req1->fetch(PDO::FETCH_ASSOC);
                                        $tva=($res['total']*0.16);
                                        echo $res['total']-$tva.'$';
                                     ?>
                                </p> 
                            </div>
  
                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3" >
                                <p style="font-size:1em; font-family:Century Gothic;">TVA : <?php echo $tva.'$'; ?> </p> 
                            </div>                           

                        </div>                        
                        
                    </div>
                    
                    <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"></div>
                    
                    <div class="col-lg-7 col-md-7 col-sm-7 col-xs-7 " style="border:1px solid gray; border-radius:20px;">
                        <div class="row">
                            <div class="col-md-6" style="border-right: 1px solid black">
                            <p style=" font-family:Century Gothic; font-size:1em;" >
                                <span style="font-weight:bold">Montant TTC : <?php echo number_format($res['total'],2).'$' ?></span><br> 
                                <span>Accompte : <?php echo number_format($res['accompte'],2).'$' ?> </span><br>
                                <br>
                                
                                <span style="font-weight:bold">Total Facture à payer : <?php $payer=$res['reste']; echo number_format($payer,2).'$'; ?></span><br> 
                                <span style="font-weight:bold">Montant payé : 
                                    <?php 
                                    echo (isset($_POST['accompte'])?number_format($_POST['accompte'],2).' $':'0.00 $');
                                 ?> </span><br>
                                <span style="font-weight:bold">Reste à payer : 
                                     <?php
                                        echo (isset($_POST['accompte'])?number_format($payer-$_POST['accompte'],2).' $':'0.00 $');
                                       ?>
                                </span><br>
                                
                                <span><strong>Mode : <?php if (isset($_POST['typePaie'])) {
                                    echo $_POST['typePaie'];
                                } ?></strong></span>
                           
                            </p>
                            </div>

                            <div class="col-md-6" style="border-left: 1px solid black">
                            <p style=" font-family:Century Gothic; font-size:1em;" >
                                <?php 
                                        $franc=$bd->query("SELECT * FROM devise WHERE idDevise=1");
                                        $fc = $franc->fetch(PDO::FETCH_ASSOC);
                                        $devise=$fc['devise'];
                                        $taux=$fc['taux'];
                                     ?>
                                <span style="font-weight:bold">Montant TTC : <?php echo $res['total']*$taux.' Fc' ?></span><br> 
                                <span>Accompte : <?php echo $res['accompte']*$taux.'Fc' ?> </span><br>
                                <br>
                                
                                <span style="font-weight:bold">Total Facture à payer : <?php $payer=$res['reste']; echo $payer*$taux.'Fc'; ?></span><br> 
                                <span style="font-weight:bold">Montant payé : 
                                    <?php 
                                    echo (isset($_POST['accompte'])?$_POST['accompte']*$taux.' Fc':'0Fc');
                                 ?> </span><br>
                                <span style="font-weight:bold">Reste à payer : 
                                     <?php
                                        echo (isset($_POST['accompte'])?($payer-$_POST['accompte'])*$taux.' Fc':'0Fc');
                                       ?>
                                </span><br>
                                
                                <span><strong>Mode : <?php if (isset($_POST['typePaie'])) {
                                    echo $_POST['typePaie'];
                                } ?></strong></span>
                           
                            </p>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
            
            
            
            
            <div class="row">
              
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4" style="">
                             <p style="font-size:1em; font-family:Century Gothic;">Signature recéptioniste </p> 
                    </div>

                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4" style="">
                             <p style="font-size:1em; font-family:Century Gothic;">Signature Client </p> 
                    </div> 
            </div>
            <div class="row">
                <div class="col-md-6 col-sm-6 offset-6 col-xs-6 offset-6 valider">
                    <form  method="POST" action="" class="was-validated">

                    <div class="input-group">
                                  
                                    
                        <input type="text" class="form-control " required="" name="accompte" placeholder="montant payé" >
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
            <div class="row ">
                <div class="col-lg-3 col-md-3 col-sm-3 col-xl-3 offset-6 cacher">
                    <form  method="POST" action="" class="was-validated">
                        <div class="input-group">
                            <input type="hidden" name="accompte" value="<?php if(isset($_POST['accompte'])) echo  $_POST['accompte'] ; ?>" >
                            <input type="hidden" name="typePaie" value="<?php if(isset($_POST['typePaie'])) echo  $_POST['typePaie'] ; ?>" >
                            <input type="hidden" class="form-control btn-lg" required="" name="idFac" placeholder="Facture" value="<?php echo $don['id_booking'];?>" >
                            <input type="hidden" class="form-control btn-lg" required="" name="id_client" placeholder="Accompte" value="<?php echo $don['id_client'];?>">
                            <input type="hidden" class="form-control btn-lg" required="" name="montantapayer" placeholder="Montant A Payer" value="<?php echo $payer;?>">
                            <div class="input-group-append">
                                <button type="submit" name="payer"  class="btn btn-danger btn-lg d-inline" data-toggle="tooltip" title="Cliquer pour valider le Paiement">Confirmer Paiement</button>
                            </div>
                        </div>
                                
                    </form>
                    <br>
                </div>
                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
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
               if(!window.print()){  
                 $('.cacher').show();

               }
            });
        });
    </script>
            

    </body>
</html>
             