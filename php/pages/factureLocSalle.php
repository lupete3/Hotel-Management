<?php 
	require_once ('../security_recept.php'); 
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
	
	#h1_bbh_title{
		font-family: Buxton Sketch;
		font-size:4em; 
		font-weight: bold; margin-top: 2px; 
		margin-left: 10px; color: white; 
		padding-top: 3px;
    }
</style>
<body>
	<!--================================MODAL DE CONNEXION ========================================== -->
	<div class="modal fade" id="editBtn" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header bg-danger">
					<h4 class="modal-title" id="exampleModalLabel">MODIFICATION COMMANDE</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="close">
						<span aria-hidden="true">&times;</span>
					</button>
						
				</div>
				<form action="upComDivRec.php" method="POST" class="was-validated">
					<div class="modal-body">
						<input type="hidden" name="id" id="id" required="" autocomplete="off"><br>
						
		           		
                        <div class="input-group mb-4">	           			
							<div class="input-group-append">
		           				<span class="input-group-text" id="basic-addon2">Sélectionner produit</span>
		           			</div>
		           			<select id="select" class="form-control" name="idBoiss" required="">
		           				<option selected="" disabled="" value="">Sélectionner produit</option>
                                <?php 
                                    $select_id = $bd->query('SELECT * FROM stockdivers');
                                    while($selec_id = $select_id->fetch()){
                                ?>
                                <option value=" <?php echo $selec_id['idDiv']  ?>">
                                <?php echo $selec_id['designation'];  ?>
                                </option>
                                 <?php  }  ?>           
                        	</select>
		           		</div>
		           		<div class="input-group mb-4">	 
		           			<div class="input-group-append">
		           				<span class="input-group-text" id="basic-addon2">Quantite</span>
		           			</div>          			
		           			<input id="qteCom" type="text" name="qteComDiv" class="form-control" placeholder="Quantite Demandée" required="" autocomplete="off">
		           			
		           		</div>
					    		           		
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-outline-secondary btn-block" data-dismiss="modal">Annuler</button>
						<button type="submit" class="btn btn-danger btn-block">Modifier</button>
						<button type="button" class="btn btn-danger supBtn"><span class="fa fa-trash"></span>	
									</button>
					</div>
				</form>				
			</div>
		</div>			
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
					<a class="nav-link" href="../rec_fichefac.php"><button type="button" class="btn btn-outline-light connexion"><h3>Retour</h3></button><span class="sr-only">(current)</span></a>
				</li>
			</ul>
			
		</div>
	</nav>

		<!--================================CONTENU ========================================== -->

	<div class="container-fluid spacer">
		<div class="row">
			<div class="col-md-3">
		          <h3 class="title">AJOUTER ACTIVITE</span></h3>
		          <?php
		          		if (isset($_POST['save'])) {
		          			$a=$_POST['idOrg'];
		          			$b=$_POST['activite'];
		          			$c=$_POST['qte'];
		          			$d=$_POST['pu'];
		          			$e=$_POST['detail'];
		          			$etat='wait';
		          			
							
		          			$req=$bd->query("SELECT * FROM facturationOrg WHERE designation='Salle de conférence' AND etat='wait'");
		          			if($don=$req->fetch(PDO::FETCH_ASSOC)) {
		          				$qte=$don['quantite'];
		          				$pt=$c*$d*$qte;
		          			}else{
		          				$pt=$c*$d;
		          			}
		          			

					        $req = $bd->prepare('INSERT INTO facturationOrg (idOrg,designation,quantite,pu,detail,etat,PT) VALUES(?,?,?,?,?,?,?)');
					        $req->execute(array($a,$b,$c,$d,$e,$etat,$pt));
					            if ($req) { ?>
					                <div class="alert alert-success alert-dismissible" id="msg" role="alert">
										<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
										<h5>Activité ajoutée</h5>
									</div>
					                <?php 
					            }
					         }
		           ?>
		           <form action="" method="POST" class="spacer was-validated">

		           		<select id="liste-cat" class="form-control" name="idOrg" required="">
		           			<option selected="" disabled="" value="">Sélectionner organisation</option>
                               <?php 
                                   $select_id = $bd->query('SELECT * FROM organisation');
                                   while($selec_id = $select_id->fetch()){
                               ?>
                               <option value=" <?php echo $selec_id['idOrg']  ?>">
                               <?php echo $selec_id['nomOrg'];?>
                               </option>
                                <?php  }  ?>           
                        </select><br>
                        <select name="activite" id="" class="form-control" required="">
                        	<option value="" disabled="" selected="">Choisir une activité</option>
                        	<option value="Salle de conférence">Salle de conférence</option>
                        	<option value="Buffet ou repas + sucre">Buffet ou repas +sucre</option>
                        	<option value="Pause-café">Pause-café</option>
                        	<option value="Eau sur table">Eau sur table</option>
                        </select><br>
		           		<div class="input-group mb-4">
		           			<input type="text" name="qte" class="form-control" placeholder="Quantite Demandée" required="" autocomplete="off">
		           			<select name="detail" id="" class="form-control" required="">
	                        	<option value="" disabled="" selected="">Détail</option>
	                        	<option value="jour(s)">jour(s)</option>
	                        	<option value="prs">prs</option>
	                        	<option value="Bouteille(s)">Bouteille(s)</option>
	                        </select><br>
		           		</div>

		           		<div class="input-group mb-4">	           			
		           			<input type="text" name="pu" class="form-control" placeholder="Prix unitaire" required="" autocomplete="off">
		           		</div>
						<button type="submit" class="btn btn-danger btn-block" name="save">AJOUTER</button>
		           </form>
		    </div>
	      <div class="col-md-9">
	      	<div class="row">
	      		<div class="col-md-7">
	      			<h3 class="title"> ACTIVITES EN ATTENTES</span></h3>
	      		</div>
	      		<div class="col-md-4 offset-1">
				<a href="../factProFormat.php"><button class="btn btn-danger btn-lg pull-right" type="button"><span class="fa fa-print"></span> Imprimer facture à envoyer</button></a>
			</div>


	      	</div>
	          
	          <div class="row spacer">
	          	 <div class="col-12">
	 				<table id="tab" class="display table table-bordered table-striped table">
		          	<thead>
		          		<tr style="font-weight:bold" class="btn-danger">
                            <th>N°</th>
                             <th>Designation</th>  
                            <th>Quantité</th>  
                            <th>Prix unitaire</th>  
                            <th>Prix total</th>  
		          			<td>Action</td>
		          		</tr>
		          	</thead>
		          	<tbody>
		          		<?php
		          			$limit=5;
							$page = isset($_GET['page'])?$_GET['page']:1;
							$start = ($page-1)*$limit;


							$req = $bd->query("SET lc_time_names='fr_FR'");
							$req = $bd->query("SELECT A.idFactOrg,A.designation,A.detail,date_format(A.dateFactOrg,'%e-%m-%Y à %T') as dateFactOrg,A.designation,A.quantite,A.detail,A.pu,A.PT,B.nomOrg FROM facturationOrg as A,organisation as B WHERE B.idOrg=A.idOrg AND A.etat = 'wait' ORDER BY idFactOrg LIMIT $start,$limit");
							
							$res = $bd->query("SELECT count(*) as total FROM facturationOrg as A,organisation as B WHERE B.idOrg=A.idOrg AND A.etat = 'wait' ORDER BY idFactOrg");

							


							$don1 = $res->fetch();
							$total = $don1['total'];
							$nbrePage=ceil($total/$limit);
							if ($page==1) {
								$prec = $page;
							}else {
								$prec = $page-1;
							}
							if ($page==$nbrePage) {
								$suiv =$nbrePage;	
							}
							else{
								$suiv = $page+1;
							}
		          			while($don=$req->fetch()):
		          				
		          				?>
		          		<tr>
                                <td><?php echo $don['idFactOrg'] ?></td>
                                <td><?php echo $don['designation'] ?></td>
                                <td><?php echo $don['quantite'].' '.$don['detail'] ?></td>
                                <td><?php echo $don['pu']?></td>
                                <td><?php echo $don['PT']?></td>
								<td>
									
									

									<button type="button" class="btn btn-danger supBtn"><span class="fa fa-trash"></span>	
									</button>
									
								</td>
						</tr>
		          		<?php endwhile;?>
		          	</tbody>
		          </table>
	          	 </div>
	          </div>
	          <div class="row">
	          	 <div class="col-3 offset-9">
	          	 	<nav aria-label="Page navigation example">
	          			<ul class="pagination pg-blue">
			    		<li class="page-item">
			    			<a  class="page-link" aria-label="Previous" href="factureLocSalle.php?page=<?php echo $prec;?>">
			    				<span aria-hidden="true">&laquo;</span>
			    				<span class="sr-only" ="true">Previous</span>
			    			</a>
			    		</li>
			    		<?php 
			    			for($i=1;$i<=$nbrePage;$i++) {
			    		?> 
			    		<li class="page-item <?php echo(($page==$i)?'active':'')?>"><a  class="page-link" href="factureLocSalle.php?page=<?php echo $i;?>"><?php echo $i;?></a></li>
			    		<?php
			    		}?>
			    		<li class="page-item">
			    			<a  class="page-link" aria-label="Next" href="factureLocSalle.php?page=<?php echo $suiv;?>">
			    				<span aria-hidden="true">&raquo;</span>
			    				<span class="sr-only" ="true">Previous</span>
			    			</a>
			    		</li>
			    	</ul>
	          		</nav>
	          	 </div>
	          </div>
	    </div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-7 offset-1">
				
			</div>
		</div>


	<div class="modal fade" id="supBtn" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header bg-danger">
						<h4 class="modal-title" id="exampleModalLabel">ANNULER L'ACTIVITE</h4>
						<button type="button" class="close" data-dismiss="modal" aria-label="close">
							<span aria-hidden="true">&times;</span>
						</button>
							
					</div>
					<form action="delActivite.php" method="POST">
						<div class="modal-body">
							<input type="hidden" name="idSup" id="idSup" required="" autocomplete="off">
			           		<div class="input-group mb-4">	 
			           			<h4>Voulez-vous annuler cette activité ?</h4>
			           		</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-outline-secondary btn-block" data-dismiss="modal">Annuler</button>
							<button type="submit" class="btn btn-danger btn-block">Confirmer</button>
						</div>
					</form>				
				</div>
			</div>			
	</div>
	

	<script src="bootstrap/js/popper.min.js"></script>
	<script src="bootstrap/js/jquery-3.4.1.min.js"></script>
	<script src="js/ajax1.min.js"></script>
	<script src="js/ajax.min.js"></script>
	<script src="bootstrap/js/bootstrap.min.js"></script>
	<script type="text/javascript">
		function getBoisson(val) {
			$.ajax({
				type:"POST",
				url:"get_boisson.php",
				data:'idBoiss='+val,
				success:function(data){
				  $("#list_boisson").html(data);
				}
			});
		}
	</script>
	<script type="text/javascript">
		$(document).ready(function() {
			
		  	$('.supBtn').on('click', function(){
		  		$('#supBtn').modal('show');

		  		$tr =$(this).closest('tr');
		  		var data = $tr.children('td').map(function(){
		  			return $(this).text();
		  		}).get();
		  		console.log(data);

		  		$('#idSup').val(data[0]);
		  	});
		  	$('#liste-cat').change(function(){
		  		var val= $('#liste-cat').val();
		  		$.ajax({
				type:"POST",
				url:"get_boisson.php",
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