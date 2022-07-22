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
	<script type="text/javascript" src="js/angular.min.js"></script>
	<script type="text/javascript" src="js/angular-animate.js"></script>
	<script type="text/javascript" src="js/angular-route.js"></script>
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
<body class="bg-light">
	<!--================================MODAL DE CONNEXION ========================================== -->
	

	<nav class="navbar navbar-expand-lg navbar-dark bg-danger">
		<a class="navbar-brand" href="#"><img src="fichiers/photos/bbh_logos.png" class="bbh">
		</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>


		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<marquee behavior="alternate" >
                        <h1 id="h1_bbh_title" style="font-size: 60px; font-family: century gothic; font-weight: bold; margin-top: 2px; margin-left: 10px; color: #b90112; padding-top: 3px;text-shadow: 8px 8px 2px white; text-shadow: 0 0 10px white, 0 0 10px white,0 0 10px white;">Bahari Beach Hotel</h1></marquee>
			<ul class="navbar-nav ml-auto">
				<li class="nav-item active">
					<a class="nav-link" href="../ac_sess/ac_rec.php"><button type="button" class="btn btn-outline-light connexion"><h3>Retour</h3></button><span class="sr-only">(current)</span></a>
				</li>
			</ul>
			
		</div>
	</nav>

		<!--================================CONTENU ========================================== -->
		<div class="modal fade" id="editBtn" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header bg-danger">
					<h4 class="modal-title" id="exampleModalLabel">MODIFICATION BLANCHISSERIE</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="close">
						<span aria-hidden="true">&times;</span>
					</button>
						
				</div>
				<form action="updateBlanchissement.php" method="POST" class="was-validated">
					<div class="modal-body">
						<input type="hidden" name="id" id="id" required="" autocomplete="off"><br>
						<div class="input-group spacer">
			           			<div class="input-group-append">
			           				<span class="input-group-text">Choisir un client</span>
			           			</div>
			           			<select name="id_client" id="table" class="form-control btn-lg" required="">
			           				<option value="" disabled="" selected="">Choisir un client</option>
		      	  					<?php 
	                                   $select_id = $bd->query('SELECT * FROM client');
	                                   while($selec_id = $select_id->fetch()){
		                               ?>
		                               <option value=" <?php echo $selec_id['id_client']  ?>">
		                               <?php echo $selec_id['nom_client'];?>
		                               </option>
		                                <?php  }  ?> 
			      	  			</select>
			           		</div><br>
			           		<div class="input-group">
			           			<div class="input-group-append">
			           				<span class="input-group-text">Type blanchissement</span>
			           			</div>
			           			<select id="id_type1" name="id_type" class="form-control btn-lg" required="">
		                                <option value="" selected="" disabled="">Type blanchissement</option>            
		                                <option value="Lessive / West clearing">Lessive / West clearing</option>
                                		<option value="Nettoyage a sec / Dry clearing">Nettoyage a sec / Dry clearing </option>
                                		<option value="Repassage / Pressing">Repassage / Pressing</option>             
		                        </select><br>
			           		</div><br>
			           		<div class="input-group">
			           			<div class="input-group-append">
			           				<span class="input-group-text">Choisir un vêtement</span>
			           			</div>
			           			<select id="id_vetement1" class="form-control btn-lg" name="idVetement" required="">
		                        </select>
			           		</div><br>
						<input type="text" name="nbreBl" id="nbreBl" class="form-control btn-lg" placeholder="Nombre de vêtements" required="" autocomplete="off" id="nbreBl"><br>
		           		         		
		           		         		
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-outline-secondary btn-block" data-dismiss="modal">Annuler</button>
						<button type="submit" class="btn btn-danger btn-block">Modifier</button>
					</div>
				</form>				
			</div>
		</div>			
	</div>

	<div class="container-fluid spacer">
		<div class="row">
			<div class="col-md-4">
				<div class="row">
					<div class="col-md"><button type="button" data-toggle="tooltip" title="Formulaire de ajout d'un vêtement" class="btn btn-danger btn-lg btn-block plat">Vêtements</button></div>
				</div>
				<div class="row">
					<div class="col-md-12 spacer">
						<?php if (isset($_GET['msg'])):?>
							<?php
							switch ($_GET['msg']) {
								case 1:
									?>
									<div class="alert alert-success alert-dismissible" id="msg" role="alert">
										<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
										<h5>Vêtement ajoutée avec succès</h5>
									</div>
								<?php
									break;
								
								case 2:
									?>
									<div class="alert alert-success alert-dismissible" id="msg" role="alert">
										<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
										<h5>Commande modifiée avec succès</h5>
									</div>
										
									<?php
									break;
								
							}
						 ?>
								
						<?php endif; ?>
					</div>
				</div>
		          
		          <div id="plat">
		          			
		          		<form action="saveBlanchisserie.php" method="POST" class="spacer was-validated">
		          		<div class="input-group spacer">
			           			<div class="input-group-append">
			           				<span class="input-group-text">Choisir un client</span>
			           			</div>
			           			<select name="id_client" id="table" class="form-control btn-lg" required="">
			           				<option value="" selected="" disabled="">Choisir un client</option>
		      	  					<?php 
	                                   $select_id = $bd->query('SELECT * FROM client');
	                                   while($selec_id = $select_id->fetch()){
		                               ?>
		                               <option value=" <?php echo $selec_id['id_client']  ?>">
		                               <?php echo $selec_id['nom_client'];?>
		                               </option>
		                                <?php  }  ?> 
			      	  			</select>
			           		</div><br>
			           		<div class="input-group">
			           			<div class="input-group-append">
			           				<span class="input-group-text">Type blanchissement</span>
			           			</div>
			           			<select id="id_type" name="id_type" class="form-control btn-lg" required="">
			           				<option value="" disabled="" selected="">Type blanchissement</option>

		                                <option value="Lessive / West clearing">Lessive / West clearing</option>
                                		<option value="Nettoyage a sec / Dry clearing">Nettoyage a sec / Dry clearing </option>
                                		<option value="Repassage / Pressing">Repassage / Pressing</option>            
		                        </select><br>
			           		</div><br>
			           		<div class="input-group">
			           			<div class="input-group-append">
			           				<span class="input-group-text">Choisir un vêtement</span>
			           		</div>
			           			<select id="id_vetement" class="form-control btn-lg" name="idVetement" required="">
		                        </select>
			           		</div><br>
						<input type="text" name="nbreBl" id="nbreBl" class="form-control btn-lg" placeholder="Nombre de vêtements" required="" autocomplete="off" id="nbreBl"><br>

						<button type="submit" class="btn btn-danger btn-lg btn-block" data-toggle="tooltip" title="Cliquer pour ajouter un vêtement" name="save">AJOUTER</button>
		           </form>
		          </div>
		           
		    </div>
	      <div class="col-md-8">
	      	  <div class="row">
	      	  	<div class="col-md-12"> 
	      	  		<form action="../factBl.php" method="GET" class="was-validated">
	      	  			<label for="table"><h4>Choisir un client à facturer</h4></label>
	      	  			<div class="input-group">
	      	  				<select name="id_client" id="table" class="form-control btn-lg" required="">
	      	  					<option selected="" value="" disabled="">Choisir un client à facturer</option>
		      	  					<?php 
	                                   $select_id = $bd->query("SELECT * FROM blanchisserie AS A INNER JOIN client AS B ON A.id_client=B.id_client WHERE A.etatBl='wait' GROUP BY B.id_client");
	                                   while($selec_id = $select_id->fetch()){
	                               ?>
	                               <option value=" <?php echo $selec_id['id_client']  ?>">
	                               <?php echo $selec_id['nom_client'];?>
	                               </option>
	                                <?php  }  ?> 
		      	  				</option>
		      	  			</select>
		      	  			<div class="input-group-append">
							    <button type="submit" class="btn btn-danger btn-lg d-inline" data-toggle="tooltip" title="Cliquer pour imprimer la facture de la table séléctionnée">Facturer</button>
							</div>
	      	  			</div>
	      	  		</form>
	      	  	</div>
	      	  </div>
	          <h4 class="spacer">Commande en cours
	          	<?php 
		          	$count = $bd->query("SELECT  COUNT(*) AS nbre FROM blanchisserie WHERE etatBl='wait' ");
                    $nbre=$count->fetch(PDO::FETCH_ASSOC);
                    ?>
                           	<span class="badge badge-danger badge-pill">
                           		<?php echo $nbre['nbre']; ?>
                           		</span>
	          </h4>
	          <div class="row">
	          	 <div class="col-md-12">
	 				<table id="tab" class="display table table-bordered table-striped table">
		          	<thead>
		          		<tr style="font-weight:bold" class="btn-danger">
                            <th>N°</th>    
                            <th>Vêtement</th>
                            <th>Qté</th>  
                            <th>PU</th>
                            <th>PT</th>
		          			<td>Action</td>
		          		</tr>
		          	</thead>
		          	<tbody>
		          		<?php
		          			$req = $bd->query("SELECT * FROM blanchisserie AS A INNER JOIN vetement AS B ON A.idVetement=B.idVetement WHERE etatBl='wait'  ORDER BY idBl DESC");
		          			while($don=$req->fetch()):
		          				
		          				?>
		          		<tr>
                                <td><?php echo $don['idBl']; ?></td>
                                <td><?php echo $don['designation'] ?></td>
                                <td><?php echo $don['nbreBl'] ?></td>
                                <td><?php echo $don['prix'] ?></td>
                                <td><?php echo $don['ptBl'] ?></td>
								<td>
									
										<button type="button" class="btn btn-danger editBtn" ><span class="fa fa-pencil"></span>
										</button>
									
																		
									
								</td>
						</tr>
		          		<?php
		          		 endwhile;?>
		          	</tbody>
		          	<tfoot>
		          		<tr>
		          			<th colspan="4"><h5>Total</h5></th>
		          			<th><h5><?php 
		          					$count = $bd->query("SELECT  SUM(ptBl) AS nbre FROM blanchisserie WHERE etatBl='wait' ");
                    				$nbre=$count->fetch(PDO::FETCH_ASSOC);
                           		echo $nbre['nbre'].' $'; ?></h5>
		          			</th>
		          		</tr>
		          	</tfoot>
		          </table>
		          
	          	 </div>
	          </div>
	    </div>
			</div>
		</div>
		
	</div>
	

	<script src="bootstrap/js/popper.min.js"></script>
	<script src="bootstrap/js/jquery-3.4.1.min.js"></script>
	<script src="js/ajax1.min.js"></script>
	<script src="js/ajax.min.js"></script>
	<script src="bootstrap/js/bootstrap.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function() {
			$('.editBtn').on('click', function(){
		  		$('#editBtn').modal('show');

		  		$tr =$(this).closest('tr');
		  		var data = $tr.children('td').map(function(){
		  			return $(this).text();
		  		}).get();
		  		console.log(data);

		  		$('#id').val(data[0]);
		  		$('#nbreBl').val(data[2]);
		  	
		  	});
		  	$('#plat').hide();
		  	$('#boisson').hide();
		  	$('.plat').on('click',function(){
		  		$('#plat').show();
		  		$('#boisson').hide();
		  	});
		  	$('.boisson').on('click',function(){
		  		$('#boisson').show();
		  		$('#plat').hide();
		  	});
            $('#id_type').change(function(){
		  		var val= $('#id_type').val();
		  		$.ajax({
				type:"POST",
				url:"get_type.php",
				data:'idType='+val,
				success:function(data){
				  $("#id_vetement").html(data);
				}
			});
		  	});

		  	$('#id_type1').change(function(){
		  		var val= $('#id_type1').val();
		  		$.ajax({
				type:"POST",
				url:"get_type.php",
				data:'idType='+val,
				success:function(data){
				  $("#id_vetement1").html(data);
				}
			});
		  	});
            $('[data-toggle="tooltip"]').tooltip();
		});
	</script>
</body>
</html>