<?php
    require_once ('security_recept.php');
    require_once ('bd_cnx.php'); 
    $dateJ=date('Y-m-d');

    //USAGE DE DEVISE
    $franc=$bd->query("SELECT * FROM devise WHERE idDevise=1");
    $fc = $franc->fetch(PDO::FETCH_ASSOC);
    $devise=$fc['devise'];
    $taux=$fc['taux'];

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
                        <h2 class="text-center" style="text-align:center;border:1px solid black">GRAND LIVRE DE RECEPTION </h2>
                    </div>
                </div>
                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"></div>      
            </div>
        </div>
        
        <div class="container" style="margin-top:20px;">
            <div class="row spacer" >

                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                    <table class="table table-bordered table-striped table-sm">
                        <thead>
                            <tr>
                                <th colspan="8" class="text-center" style="">
                                   <h4> JOURNAL DES RECETTES DU <?php echo date('d-m-Y')?></h4>
                                </th>
                            </tr>
                            <tr>
                                <th>N°</th>
                                <th>LIBELLES</th>
                                <th colspan="2" class="text-center">CASH</th>
                                <th colspan="2" class="text-center">MOBILE MONEY</th>
                                <th colspan="2" class="text-center">CREDIT CARD/CHEQUE</th>
                            </tr>

                            <tr>
                                <th></th>
                                <th></th>
                                <th>Dévise(USD)</th>
                                <th>C/V en CDF</th>
                                <th>Dévise(USD)</th>
                                <th>C/V en CDF</th>
                                <th>Dévise(USD)</th>
                                <th>C/V en CDF</th>
                            </tr>
                           
                        </thead>
                        <tbody>
                             
                            <tr>
                                <td></td>
                                <td><strong>NOTES PAYEES CLIENTS LOGES</strong></td>
                                <td colspan="6"></td>
                            </tr>
                            <?php
                                $req = $bd->query("SELECT SUM(montantPaye) As total FROM facture  WHERE montantPaye>0 AND dateFacture LIKE '%$dateJ%' AND type ='Espèces'");
                      
                                $result=$req->fetch(PDO::FETCH_ASSOC);
                                $recept=$result['total'];
                                $cashusd=$result['total'];

                                ?>
                            <tr>
                                <td></td>
                                <td></td>
                                <td class="text-right"><?php echo (isset($recept)?number_format($recept,2):'0.00') ?></td>
                                <td class="text-right"><?php echo (isset($recept)?$recept*$taux:'0.00') ?></td>
                                <?php
                                $req = $bd->query("SELECT SUM(montantPaye) As total FROM facture  WHERE montantPaye>0 AND dateFacture LIKE '%$dateJ%' AND type ='Mobile money'");
                      
                                $result=$req->fetch(PDO::FETCH_ASSOC);
                                $recept=$result['total'];
                                $mobileusd=$result['total'];

                                ?>
                                <td class="text-right"><?php echo (isset($recept)?number_format($recept,2):'0.00') ?></td>
                                <td class="text-right"><?php echo (isset($recept)?$recept*$taux:'0.00') ?></td>
                                <?php
                                $req = $bd->query("SELECT SUM(montantPaye) As total FROM facture  WHERE montantPaye>0 AND dateFacture LIKE '%$dateJ%' AND type ='Carte bancaire'");
                                $req1 = $bd->query("SELECT SUM(montantPaye) As total FROM facture  WHERE montantPaye>0 AND dateFacture LIKE '%$dateJ%' AND type ='Chèque'");
                      
                                $result=$req->fetch(PDO::FETCH_ASSOC);
                                $result1=$req1->fetch(PDO::FETCH_ASSOC);
                                $recept=$result['total']+$result1['total'];
                                $cardusd=$recept;

                                ?>
                                <td class="text-right"><?php echo (isset($recept)?number_format($recept,2):'0.00') ?></td>
                                <td class="text-right"><?php echo (isset($recept)?$recept*$taux:'0.00') ?></td>
                                
                            </tr>
                            <tr>
                                <td></td>
                                <td><strong>RECETTES PAR SERVICE</strong></td>
                                <td colspan="6"></td>
                            </tr>
                            <?php
                                $req = $bd->query("SELECT SUM(A.montantPaye) As total,A.designActivite,A.accompte,A.idOperation FROM facturation AS A,client AS B,organisation AS E WHERE B.id_client=A.id_client  AND E.idOrg=B.idOrg AND A. dateFact like '%$dateJ%' AND A.montantPaye>0 AND A.diffIndex='RE' AND type = 'Espèces'");
                      
                                $result=$req->fetch(PDO::FETCH_ASSOC);
                                $resto=$result['total'];

                                ?>
                                <tr>
                                    <td>1</td>
                                    <td> <?php echo 'Restaurant' ?></td>
                                    <td class="text-right"><?php echo (isset($resto)?number_format($resto,2):'0.00') ?>
                                    </td>
                                    <td class="text-right"><?php echo (isset($resto)?$resto*$taux:'0.00') ?></td>
                                    <?php
                                        $req = $bd->query("SELECT SUM(A.montantPaye) As total,A.designActivite,A.accompte,A.idOperation FROM facturation AS A,client AS B,organisation AS E WHERE B.id_client=A.id_client  AND E.idOrg=B.idOrg AND A. dateFact like '%$dateJ%' AND A.montantPaye>0 AND A.diffIndex='RE' AND type = 'Mobile money'");
                              
                                        $result=$req->fetch(PDO::FETCH_ASSOC);
                                        $resto1=$result['total'];

                                    ?>
                                    <td class="text-right"><?php echo (isset($resto1)?number_format($resto1,2):'0.00') ?>
                                    </td>
                                    <td class="text-right"><?php echo (isset($resto1)?$resto1*$taux:'0.00') ?></td>

                                    <?php
                                        $req = $bd->query("SELECT SUM(A.montantPaye) As total,A.designActivite,A.accompte,A.idOperation FROM facturation AS A,client AS B,organisation AS E WHERE B.id_client=A.id_client  AND E.idOrg=B.idOrg AND A. dateFact like '%$dateJ%' AND A.montantPaye>0 AND A.diffIndex='RE' AND type = 'Carte bancaire'");
                                        $req1 = $bd->query("SELECT SUM(A.montantPaye) As total,A.designActivite,A.accompte,A.idOperation FROM facturation AS A,client AS B,organisation AS E WHERE B.id_client=A.id_client  AND E.idOrg=B.idOrg AND A. dateFact like '%$dateJ%' AND A.montantPaye>0 AND A.diffIndex='RE' AND type = 'Chèque'");
                              
                                        $result=$req->fetch(PDO::FETCH_ASSOC);
                                        $result1=$req1->fetch(PDO::FETCH_ASSOC);
                                        $resto2=$result['total']+$result1['total'];

                                    ?>
                                    <td class="text-right"><?php echo (isset($resto2)?number_format($resto2,2):'0.00') ?>
                                    </td>
                                    <td class="text-right"><?php echo (isset($resto2)?$resto2*$taux:'0.00') ?></td>
                                </tr>
                                <?php
                                $req = $bd->query("SELECT SUM(A.montantPaye) As total,A.designActivite,A.accompte,A.idOperation FROM facturation AS   A,client AS B,organisation AS E WHERE B.id_client=A.id_client  AND E.idOrg=B.idOrg AND A. dateFact like '%$dateJ%' AND A.montantPaye>0 AND A.diffIndex='BO' AND type = 'Espèces'");
                      
                                $result=$req->fetch(PDO::FETCH_ASSOC);
                                $book=$result['total'];

                                ?>
                                <tr>
                                    <td>2</td>
                                    <td> <?php echo 'Réception' ?></td>
                                    <td class="text-right"><?php echo (isset($book)?number_format($book,2):'0.00') ?>
                                    </td>
                                    <td class="text-right"><?php echo (isset($book)?$book*$taux:'0.00') ?></td>
                                    <?php
                                        $req = $bd->query("SELECT SUM(A.montantPaye) As total,A.designActivite,A.accompte,A.idOperation FROM facturation AS A,client AS B,organisation AS E WHERE B.id_client=A.id_client  AND E.idOrg=B.idOrg AND A. dateFact like '%$dateJ%' AND A.montantPaye>0 AND A.diffIndex='BO' AND type = 'Mobile money'");
                              
                                        $result=$req->fetch(PDO::FETCH_ASSOC);
                                        $book1=$result['total'];

                                    ?>
                                    <td class="text-right"><?php echo (isset($book1)?number_format($book1,2):'0.00') ?>
                                    </td>
                                    <td class="text-right"><?php echo (isset($book1)?$book1*$taux:'0.00') ?></td>

                                    <?php
                                        $req = $bd->query("SELECT SUM(A.montantPaye) As total,A.designActivite,A.accompte,A.idOperation FROM facturation AS A,client AS B,organisation AS E WHERE B.id_client=A.id_client  AND E.idOrg=B.idOrg AND A. dateFact like '%$dateJ%' AND A.montantPaye>0 AND A.diffIndex='BO' AND type = 'Carte bancaire'");
                                        $req1 = $bd->query("SELECT SUM(A.montantPaye) As total,A.designActivite,A.accompte,A.idOperation FROM facturation AS A,client AS B,organisation AS E WHERE B.id_client=A.id_client  AND E.idOrg=B.idOrg AND A. dateFact like '%$dateJ%' AND A.montantPaye>0 AND A.diffIndex='BO' AND type = 'Chèque'");
                              
                                        $result=$req->fetch(PDO::FETCH_ASSOC);
                                        $result1=$req1->fetch(PDO::FETCH_ASSOC);
                                        $book2=$result['total']+$result1['total'];

                                    ?>
                                    <td class="text-right"><?php echo (isset($book2)?number_format($book2,2):'0.00') ?>
                                    </td>
                                    <td class="text-right"><?php echo (isset($book2)?$book2*$taux:'0.00') ?></td>
                                </tr>

                                 <?php
                                $req = $bd->query("SELECT SUM(A.montantPaye) As total,A.designActivite,A.accompte,A.idOperation FROM facturation AS   A,client AS B,organisation AS E WHERE B.id_client=A.id_client  AND E.idOrg=B.idOrg AND A. dateFact like '%$dateJ%' AND A.montantPaye>0 AND A.diffIndex='SA' AND type = 'Espèces'");

                                
                      
                                $result=$req->fetch(PDO::FETCH_ASSOC);
                                $autres=$result['total'];


                                ?>
                                <tr>
                                    <td>3</td>
                                    <td> <?php echo 'Autres Services' ?></td>
                                    <td class="text-right"><?php echo (isset($autres)?number_format($autres,2):'0.00') ?>
                                    </td>
                                    <td class="text-right"><?php echo (isset($autres)?$autres*$taux:'0.00') ?></td>
                                    <?php
                                        $req = $bd->query("SELECT SUM(A.montantPaye) As total,A.designActivite,A.accompte,A.idOperation FROM facturation AS A,client AS B,organisation AS E WHERE B.id_client=A.id_client  AND E.idOrg=B.idOrg AND A. dateFact like '%$dateJ%' AND A.montantPaye>0 AND A.diffIndex='SA' AND type = 'Mobile money'");
                              
                                        $result=$req->fetch(PDO::FETCH_ASSOC);
                                        $autres1=$result['total'];

                                    ?>
                                    <td class="text-right"><?php echo (isset($autres1)?number_format($autres1,2):'0.00') ?>
                                    </td>
                                    <td class="text-right"><?php echo (isset($autres1)?$autres1*$taux:'0.00') ?></td>

                                    <?php
                                        $req = $bd->query("SELECT SUM(A.montantPaye) As total,A.designActivite,A.accompte,A.idOperation FROM facturation AS A,client AS B,organisation AS E WHERE B.id_client=A.id_client  AND E.idOrg=B.idOrg AND A. dateFact like '%$dateJ%' AND A.montantPaye>0 AND A.diffIndex='SA' AND type = 'Carte bancaire'");
                                        $req1 = $bd->query("SELECT SUM(A.montantPaye) As total,A.designActivite,A.accompte,A.idOperation FROM facturation AS A,client AS B,organisation AS E WHERE B.id_client=A.id_client  AND E.idOrg=B.idOrg AND A. dateFact like '%$dateJ%' AND A.montantPaye>0 AND A.diffIndex='SA' AND type ='Chèque'");
                              
                                        $result=$req->fetch(PDO::FETCH_ASSOC);
                                        $result1=$req1->fetch(PDO::FETCH_ASSOC);
                                        $autres2=$result['total']+$result1['total'];

                                    ?>
                                    <td class="text-right"><?php echo (isset($autres2)?number_format($autres2,2):'0.00') ?>
                                    </td>
                                    <td class="text-right"><?php echo (isset($autres2)?$autres2*$taux:'0.00') ?></td>
                                </tr>

                                <?php
                                $req = $bd->query("SELECT SUM(A.montantPaye) As total,A.designActivite,A.accompte,A.idOperation FROM facturation AS   A,client AS B,organisation AS E WHERE B.id_client=A.id_client  AND E.idOrg=B.idOrg AND A. dateFact like '%$dateJ%' AND A.montantPaye>0 AND A.diffIndex='BL' AND type = 'Espèces'");

    
                      
                                $result=$req->fetch(PDO::FETCH_ASSOC);
                                $blanch=$result['total'];

                                ?>
                                
                                <tr>
                                    <td>4</td>
                                    <td><?php echo 'Blanchisserie' ?></td>
                                    <td class="text-right"><?php echo (isset($blanch)?number_format($blanch,2):'0.00') ?>
                                    </td>
                                    <td class="text-right"><?php echo (isset($blanch)?$blanch*$taux:'0.00') ?></td>
                                    <?php
                                        $req = $bd->query("SELECT SUM(A.montantPaye) As total,A.designActivite,A.accompte,A.idOperation FROM facturation AS A,client AS B,organisation AS E WHERE B.id_client=A.id_client  AND E.idOrg=B.idOrg AND A. dateFact like '%$dateJ%' AND A.montantPaye>0 AND A.diffIndex='BL' AND type = 'Mobile money'");
                              
                                        $result=$req->fetch(PDO::FETCH_ASSOC);
                                        $blanch1=$result['total'];

                                    ?>
                                    <td class="text-right"><?php echo (isset($blanch1)?number_format($blanch1,2):'0.00') ?>
                                    </td>
                                    <td class="text-right"><?php echo (isset($blanch1)?$blanch1*$taux:'0.00') ?></td>

                                    <?php
                                        $req = $bd->query("SELECT SUM(A.montantPaye) As total,A.designActivite,A.accompte,A.idOperation FROM facturation AS A,client AS B,organisation AS E WHERE B.id_client=A.id_client  AND E.idOrg=B.idOrg AND A. dateFact like '%$dateJ%' AND A.montantPaye>0 AND A.diffIndex='BL' AND type = 'Carte bancaire'");
                                        $req1 = $bd->query("SELECT SUM(A.montantPaye) As total,A.designActivite,A.accompte,A.idOperation FROM facturation AS A,client AS B,organisation AS E WHERE B.id_client=A.id_client  AND E.idOrg=B.idOrg AND A. dateFact like '%$dateJ%' AND A.montantPaye>0 AND A.diffIndex='BL' AND type = 'Chèque'");
                              
                                        $result=$req->fetch(PDO::FETCH_ASSOC);
                                        $result1=$req1->fetch(PDO::FETCH_ASSOC);
                                        $blanch2=$result['total']+$result1['total'];

                                    ?>
                                    <td class="text-right"><?php echo (isset($blanch2)?number_format($blanch2,2):'0.00') ?>
                                    </td>
                                    <td class="text-right"><?php echo (isset($blanch2)?$blanch2*$taux:'0.00') ?></td>
                                </tr>

                                 <?php
                                    $req = $bd->query("SELECT SUM(accompte) As total ,idLoc FROM location WHERE dateLoc LIKE '%$dateJ%' AND accompte>0 AND type = 'Espèces'");
                          
                                    $result=$req->fetch(PDO::FETCH_ASSOC);
                                    $t_salle=$result['total'];

                                  ?>
                                <tr>
                                    <td>5</td>
                                    <td>Location salle</td>
                                    <td class="text-right"><?php echo (isset($t_salle)?$t_salle:'0.00') ?></td>
                                    <td class="text-right"><?php echo (isset($t_salle)?$t_salle*$taux:'0.00')?></td>

                                    <?php
                                        $req = $bd->query("SELECT SUM(accompte) As total ,idLoc FROM location WHERE dateLoc LIKE '%$dateJ%' AND accompte>0 AND type = 'Mobile money'");
                              
                                        $result=$req->fetch(PDO::FETCH_ASSOC);
                                        $t_salle1=$result['total'];

                                      ?>

                                    <td class="text-right"><?php echo (isset($t_salle1)?$t_salle1:'0.00') ?></td>
                                    <td class="text-right"><?php echo (isset($t_salle1)?$t_salle1*$taux:'0.00')?></td>

                                    <?php
                                        $req = $bd->query("SELECT SUM(accompte) As total ,idLoc FROM location WHERE dateLoc LIKE '%$dateJ%' AND accompte>0 AND type = 'Carte bancaire' OR type='Chèque'");
                              
                                        $result=$req->fetch(PDO::FETCH_ASSOC);
                                        $t_salle2=$result['total'];

                                      ?>
                                    <td class="text-right"><?php echo (isset($t_salle2)?$t_salle2:'0.00') ?></td>
                                    <td class="text-right"><?php echo (isset($t_salle2)?$t_salle2*$taux:'0.00')?></td>
                               
                                </tr>
                              
                          

                            <tr>
                                <td colspan="2">TOTAUX </td>
                                <td class="text-right"><strong><?php  echo number_format($resto+
                               $book+$autres+$blanch+$t_salle+$cashusd,2).' $' ?></strong></td>
                                <td class="text-right"><strong><?php  echo ($resto+
                               $book+$autres+$blanch+$t_salle+$cashusd)*$taux.' Fc' ?></strong></td>

                                <td class="text-right"><strong><?php  echo number_format($resto1+
                               $book1+$autres1+$blanch1+$t_salle1+$mobileusd,2).' $' ?></strong></td>
                                <td class="text-right"><strong><?php  echo ($resto1+
                               $book1+$autres1+$blanch1+$t_salle1+$mobileusd)*$taux.' Fc' ?></strong></td>

                                <td class="text-right"><strong><?php  echo number_format($resto2+
                               $book2+$autres2+$blanch2+$t_salle2+$cardusd,2).' $' ?></strong></td>
                                <td class="text-right"><strong><?php  echo ($resto2+
                               $book2+$autres2+$blanch2+$t_salle2+$cardusd)*$taux.' Fc' ?></strong></td>
                            
                            
                            </tr>

                            <tr>
                                <td colspan="4">Arrêter la recette de ce jour à la somme de : <strong><?php  echo number_format($resto+$book+$autres+$blanch+$t_salle+$cashusd,2) .'$'; ?></td>

                                <td colspan="4"><span style="text-align: center">RECEPTION </span> 
                                    <br>Nom : <?php echo ' '. strtoupper($_SESSION['profil']['agent4']['user_name']) ?> 
                                    <br>Signature : </td>
                            </tr>

                            <tr>
                                <td colspan="8">Contrôle de fonds de caisse  et des déposits (Observations)</td>
                            </tr>

                            <tr>
                                <td colspan="5">Recette Réception du :  <?php echo date('d-m-Y');?><br>
                                Montant global en lettres :
                                </td>

                                <td colspan="3"><span style="text-decoration: underline">Visa caisse principale </span><span style="margin-left: 20px; text-decoration: underline">Pour acquit </span> 
                                    <br>Nom :
                                    <br>Signature : </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 spacer">
                    <p class="text-right">Fait à Uvira, le <?php $madate= date('d-m-Y H:i:s'); 
                            list($annee,$mois,$jour,$h,$m,$s)=sscanf($madate,"%d-%d-%d %d:%d:%d"); 
                            $h+=2; 
                            $timestamp=mktime($h,$m,$s,$mois,$annee,$jour); 
                            $new_date=date('d-m-Y à H:i:s',$timestamp); 
                            echo $new_date; 
                        ?></p>
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
             