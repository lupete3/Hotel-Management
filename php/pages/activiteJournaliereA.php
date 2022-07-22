<?php 
	require_once('../security_admin.php'); 
	require_once('bd_cnx.php');
	

?>
<!DOCTYPE html>
<html>
<head>
	<title>Bahari Beach Hôtel</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=devidev-width, initial-scale=1">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link rel="stylesheet" type="text/css" href="bootstrap/font-awesome-4.3.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/style.css">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/print.css" media="print">
</head>
<style type="text/css">
	.spacer{
		margin-top:30px;
	}
	.bad{
		font-size:1.5em;
	}
	img:hover{
		cursor:pointer;
	}
	.modal-body img{
		height:400px;
	}
	.mCard{
		width: 170px;
		height: 170px;
	}
	.pagin{
		float:center;
	}
	.ceni{
		color:silver;
	}
	.bbh{
		width:100%;
		height:100%;
	}
	#h1_bbh_title{
		font-family:century gothic;
		font-size:3em; 
		font-weight: bold; margin-top: 2px; 
		margin-left: 10px; color: white; 
		padding-top: 3px;
    }
</style>
<body>
	<!--================================MODAL DE CONNEXION ========================================== -->
	<div class="modal fade" id="editBtn" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					
	</div>
	

	<nav class="navbar navbar-expand-lg navbar-dark bg-danger">
		<a class="navbar-brand" href="#"><img src="fichiers/photos/bbh_logos.png" class="bbh">
		</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		</button>

		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<marquee behavior="alternate" >
                        <h1 id="h1_bbh_title" style="font-size: 60px; font-family: century gothic; font-weight: bold; margin-top: 2px; margin-left: 10px; color: #b90112; padding-top: 3px;text-shadow: 8px 8px 2px white; text-shadow: 0 0 10px white, 0 0 10px white,0 0 10px white;">Bahari Beach Hotel</h1></marquee> 
			<ul class="navbar-nav ml-auto">
				<li class="nav-item active">
					<a class="nav-link" href="../rapportComptableA.php"><button type="button" class="btn btn-outline-light connexion"><h3>Retour</h3></button><span class="sr-only">(current)</span></a>
				</li>
			</ul>
			
		</div>
	</nav>

		<!--================================CONTENU ========================================== -->

	<div class="container-fluid spacer">
		<div class="row">
	      <div class="col-md-12">
	      	<div class="row">
	      		<div class="col-md-9">
	      			<h3 class="text-center">ACTIVITES JOURNALIERES AU BBH EN USD AU <?php echo date('d-M-Y') ?>
			          
			          </h3>

	      		</div>
	      		<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                        <button type="button" class="btn btn-primary print pull-right"><span class="fa fa-print"></span> Imprimer</button>
                    </div>
	      		
	      	</div>
	          
            

	          <div class="row spacer">
	          	 <div class="col-12">
	 				<table id="tab" class="display table table-bordered table-striped table">
		          	<thead>
		          		<tr style="font-weight:bold" class="btn-danger">
		          			<th></th>   
                            <th>Hébergement</th>
                            <th>Restauration</th>  
                            <th>Sauna</th>
                            
                            <th>Piscine</th>   
                            <th>Salle</th>  
                            <th>Blanchisserie</th>  
                            <th>Prise photo</th>    
		          			<th>Totaux</th>
		          		</tr>
		          	</thead>
		          	<tbody>
		          		<?php 
                            $log='BO';
                            $dateJ =date('Y-m-d');

		                    $req = $bd->prepare("SELECT SUM(accompte) as totalCash ,SUM(reste) as totalCredit From  facturation WHERE diffindex=? AND dateFact like '%$dateJ%'");
		                    $req->execute(array($log));
							$don=$req->fetch();
							$ptC=$don['totalCash'];
							$ptCre=$don['totalCredit'];


							 $log='Bl';
							$req1 = $bd->prepare("SELECT SUM(accompte) as totalCash ,SUM(reste) as totalCredit From  facturation WHERE diffindex=? AND dateFact like '%$dateJ%'  ");
		                    $req1->execute(array($log));
							$don1=$req1->fetch();
							$ptBlC=$don1['totalCash'];
							$ptBlR=$don1['totalCredit'];

							$log='SA';
							$req2 = $bd->prepare("SELECT SUM(accompte) as totalCash ,SUM(reste) as totalCredit From  facturation WHERE diffindex=? AND dateFact like '%$dateJ%'  ");
		                    $req2->execute(array($log));
							$don2=$req2->fetch();
							$ptSaC=$don2['totalCash'];
							$ptSaR=$don2['totalCredit'];

							$modepaie='Cash';
							$req3 = $bd->prepare("SELECT SUM(accompte) as totalCash  From  location WHERE modepaie=? AND dateLoc like '%$dateJ%' ");
		                    $req3->execute(array($modepaie));
							$don3=$req3->fetch();
							$ptSalC=$don3['totalCash'];


							$modepaie='Credit';
							$req4 = $bd->prepare("SELECT SUM(reste) as totalcd  From  location WHERE modepaie=? and dateLoc like '%$dateJ%'  ");
		                    $req4->execute(array($modepaie));
							$don4=$req4->fetch();
							$ptSalR=$don4['totalcd'];

							$design='Piscine';
							$req5 = $bd->prepare("SELECT SUM(reste) as totalCredit,SUM(accompte) as totalCash   From  sauna WHERE designSauna=? and dateSauna like '%$dateJ%' ");
		                    $req5->execute(array($design));
							$don5=$req5->fetch();
							$ptSauR=$don5['totalCredit'];
							$ptSauC=$don5['totalCash'];

							$design='Prise photo';
							$req7 = $bd->prepare("SELECT SUM(reste) as totalCredit,SUM(accompte) as totalCash   From  sauna WHERE designSauna=? and dateSauna like '%$dateJ%' ");
		                    $req7->execute(array($design));
							$don7=$req7->fetch();
							$ptphotoR=$don7['totalCredit'];
							$ptphotoC=$don7['totalCash'];
							
							$log1='RE';
                           

		                    $req6 = $bd->prepare("SELECT SUM(accompte) as totalCash ,SUM(reste) as totalCredit From  facturation WHERE diffindex=? and dateFact like '%$dateJ%' ");
		                    $req6->execute(array($log1));
							$don6=$req6->fetch();
							$cash=$don6['totalCash'];
							$credit=$don6['totalCredit'];




		                ?>
		          		
		          		<tr>
                                <th>Cash</th>
                                <td><?php  echo $ptC; ?></td>
                                <td><?php  echo $cash; ?></td>
                                <td><?php  echo $ptSaC; ?></td>
                           
                                <td><?php  echo $ptSauC; ?></td>
                                <td><?php  echo $ptSalC; ?></td>
                                <td><?php  echo $ptBlC; ?></td>
                                <td><?php  echo $ptphotoC; ?></td>
                                <th><?php  echo $ptphotoC+$ptBlC+$ptSauC+$ptSaC+$cash+$ptC+$ptSalC.' $'; ?></th>
                         
						</tr>
						<tr>
                                <th>Crédit</th>
                                <td><?php  echo $ptCre; ?></td>
                                <td><?php  echo $credit; ?></td>
                                <td><?php  echo $ptSaR; ?></td>
                               
                                <td><?php  echo $ptSauR; ?></td>
                                <td><?php  echo $ptSalR; ?></td>
                                <td><?php  echo $ptBlR; ?></td>
                                <td><?php  echo $ptphotoR; ?></td>
                                <th><?php  echo $ptphotoR+$ptBlR+$ptSauR+$ptSaR+$credit+$ptCre+$ptSalR.' $'; ?></th>
                         
						</tr>
						<tr>
                                <th>Totaux</th>
                                <th><?php  echo $ptC + $ptCre.' $'; ?></th>
                                
                                <th><?php  echo $cash+$credit.' $'; ?></th>
                                <th><?php  echo $ptSaC+$ptSaR.' $'; ?></th>
                                <th><?php  echo $ptSauC+$ptSauR.' $'; ?></th>
                                <th><?php  echo $ptSalC+$ptSalR.' $'; ?></th>
                                <th><?php  echo $ptBlC+$ptBlR.' $'; ?></th>
                                <th><?php  echo $ptphotoR+$ptphotoC.' $'; ?></th>
                                <th><?php  echo $ptC + $ptCre+$cash+$credit+$ptSaC+$ptSaR+$ptSauC+$ptSauR+$ptSalC+$ptSalR+$ptBlC+$ptBlR+$ptphotoR+$ptphotoC.' $';?></th>
                         
						</tr>
		          		
		          	</tbody>
		          </table>
	          	 </div>
	          </div>
	          <div class="row">
	          	 <div class="col-md-12">
	          	 	<h3 class="text-center">DEPENSES AU <?php echo date('d-M-Y') ?>
	          	 </div>
	          </div>
	          <div class="row">
	          	 <div class="col-md-12">
	          	 	<div class="col-12">
	 				<table id="tab" class="display table table-bordered table-striped table">
		          	<thead>
		          		<tr style="font-weight:bold" class="btn-danger">
		          			<th>N°</th>  
                            <th>Désignation</th>  
		          			<td>Montant($)</td>
		          		</tr>
		          	</thead>
		          	<tbody>
		          		<?php
		          			$limit=4;
							

							$req = $bd->prepare("SELECT * FROM sortiecaisse WHERE dateSortie LIKE '%$dateJ%'");
							$req->execute();
							$num=1;
							
		          			while($don=$req->fetch(PDO::FETCH_ASSOC)):
		          				?>
		          		<tr>
                                <td><?php echo $num; ?></td>
                                <td><?php echo $don['motifSortie'] ?></td>
                                <td><?php echo $don['montantSortie'] ?></td>
								
						</tr>
		          		<?php 
		          		$num++;
		          	endwhile;?>
		          	<tr>
		          		<th colspan="2">TOTAUX</th>
		          		<th><h3>
		          			<?php
		          			$req = $bd->query("SELECT SUM(montantSortie) as total FROM sortiecaisse WHERE dateSortie LIKE '%$dateJ%'"); 
		          			$don=$req->fetch(PDO::FETCH_ASSOC);
		          			echo $don['total'].' $';
		          		 ?>
		          		</h3></th>
		          	</tr>
		          	</tbody>
		          </table>
	          	 </div>
	          	 </div>
	          </div>
	    </div>
			</div>
		</div>
		
	</div>
	

	<script src="bootstrap/js/popper.min.js"></script>
	<script src="bootstrap/js/jquery-3.4.1.min.js"></script>
	<script src="bootstrap/js/bootstrap.min.js"></script>
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