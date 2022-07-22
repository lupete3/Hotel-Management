<?php 
	require_once ('../security_eco.php'); 
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
		font-family: century gothic;
		font-size:4em; 
		font-weight: bold; margin-top: 2px; 
		margin-left: 10px; color: white; 
		padding-top: 3px;
    }
</style>
<body class="bg-light">
	<!--================================MODAL DE CONNEXION ========================================== -->
	
	<div class="modal fade" id="editBtn" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header bg-danger">
					<h4 class="modal-title" id="exampleModalLabel">SUPPRESSION COMMANDE</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="close">
						<span aria-hidden="true">&times;</span>
					</button>
						
				</div>
				<form action="supEtat.php" method="POST">
					<div class="modal-body">
						<input type="hidden" name="id" id="id" required="" autocomplete="off">
						<h4>Voulez-vous supprimer cette commande ?</h4>		           		
                    </div>
					<div class="modal-footer">
						<button type="button" class="btn btn-outline-secondary btn-block" data-dismiss="modal">Annuler</button>
						<button type="submit" class="btn btn-danger btn-block">Supprimer</button>
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

		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<marquee behavior="alternate" >
                        <h1 id="h1_bbh_title" style="font-size: 60px; font-family: century gothic; font-weight: bold; margin-top: 2px; margin-left: 10px; color: #b90112; padding-top: 3px;text-shadow: 8px 8px 2px white; text-shadow: 0 0 10px white, 0 0 10px white,0 0 10px white;">Bahari Beach Hotel</h1></marquee>
			<ul class="navbar-nav ml-auto">
				<li class="nav-item active">
					<a class="nav-link" href="../req_eco.php"><button type="button" class="btn btn-outline-light connexion"><h3>Retour</h3></button><span class="sr-only">(current)</span></a>
				</li>
			</ul>
			
		</div>
	</nav>

		<!--================================CONTENU ========================================== -->

	<div class="container-fluid spacer">
		<div class="row">
			<div class="col-md-4">
				<div class="row">
					<div class="col-md"><button type="button" data-toggle="tooltip" title="Formulaire de commande d'un plat" class="btn btn-danger btn-lg btn-block plat">Nourriture</button></div>
					<div class="col-md"><button type="button" class="btn btn-danger btn-lg btn-block boisson" data-toggle="tooltip" title="Formulaire de commande de boisson ">Boisson</button></div>
					<div class="col-md"><button type="button" class="btn btn-danger btn-lg btn-block divers" data-toggle="tooltip" title="Formulaire de produits divers de divers ">Divers</button></div>
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
										<h5>Commande ajoutée avec succès</h5>
									</div>
								<?php
									break;
							}
						 ?>
								
						<?php endif; ?>
					</div>
				</div>
		          
		          <div id="boisson">
		          	<form action="saveBoisson.php" method="POST" class="spacer was-validated">
		          			
		           		<select id="liste-cat" class="form-control" required="">
		           			<option selected="" disabled="" value="">Sélectionner catégorie</option>
                               <?php 
                                   $select_id = $bd->query('SELECT * FROM catBoiss');
                                   while($selec_id = $select_id->fetch()){
                               ?>
                               <option value=" <?php echo $selec_id['idCatBoiss']  ?>">
                               <?php echo $selec_id['idCatBoiss'].' '.$selec_id['designCatBoiss'];?>
                               </option>
                                <?php  }  ?>           
                        </select><br>
		           		<select name="idBoiss" id="list_boisson" class="form-control" required="">
						    <option value="" disabled="" selected="">Sélectionner la boisson</option>
						</select><br>
 
						<input type="text" name="qte" class="form-control btn-lg" placeholder="Quantité" required="" autocomplete="off"><br>
						<input type="text" name="pu" class="form-control btn-lg" placeholder="Prix Unitaire" required="" autocomplete="off"><br>
						<button type="submit" class="btn btn-danger btn-lg btn-block" data-toggle="tooltip" title="Cliquer pour ajouter une commande" name="save">AJOUTER</button>
		           </form>
		          </div>
		          <div id="plat">
		          		<form action="saveNour.php" method="POST" class="spacer was-validated">
		          			
			           		<select id="liste-cat1" class="form-control" required="">
			           			<option selected="" disabled="" value="">Sélectionner catégorie</option>
	                               <?php 
	                                   $select_id = $bd->query('SELECT * FROM catNour');
	                                   while($selec_id = $select_id->fetch()){
	                               ?>
	                               <option value=" <?php echo $selec_id['idCatNour']  ?>">
	                               <?php echo $selec_id['idCatNour'].' '.$selec_id['designCatNour'];?>
	                               </option>
	                                <?php  }  ?>           
	                        </select><br>
			           		<select name="idNour" id="list_nour" class="form-control" required="">
							    <option value="" disabled="" selected="">Sélectionner une nourriture</option>
							</select><br>

							<input type="text" name="qte" class="form-control btn-lg" placeholder="Quantité" required="" autocomplete="off"><br>
							<input type="text" name="pu" class="form-control btn-lg" placeholder="Prix Unitaire" required="" autocomplete="off"><br>
							<button type="submit" class="btn btn-danger btn-lg btn-block" data-toggle="tooltip" title="Cliquer pour ajouter une commande" name="save">AJOUTER</button>
			           </form>
		          </div>
		          <div id="divers">
		          		<form action="saveDiv.php" method="POST" class="spacer was-validated">
		          			
			           		<select id="liste-cat1" class="form-control" required="" name="idDiv">
			           			<option selected="" disabled="" value="">Sélectionner produit</option>
	                               <?php 
	                                   $select_id = $bd->query('SELECT * FROM stockdivers');
	                                   while($selec_id = $select_id->fetch()){
	                               ?>
	                               <option value=" <?php echo $selec_id['idDiv']  ?>">
	                               <?php echo $selec_id['designation'];?>
	                               </option>
	                                <?php  }  ?>           
	                        </select><br>
			           		

							<input type="text" name="qte" class="form-control btn-lg" placeholder="Quantité" required="" autocomplete="off"><br>
							<input type="text" name="pu" class="form-control btn-lg" placeholder="Prix Unitaire" required="" autocomplete="off"><br>
							<button type="submit" class="btn btn-danger btn-lg btn-block" data-toggle="tooltip" title="Cliquer pour ajouter une commande" name="save">AJOUTER</button>
			           </form>
		          </div>
		           
		    </div>
	      <div class="col-md-8">
	      	  <div class="row">
	      		<div class="col-md-7">
	      			<h3 class="title"> ETAT DE BESOINS EN ATTENTES</h3>
	      		</div>
	      		<div class="col-md-4 offset-1">
					<a href="../ficheComEco.php"><button class="btn btn-danger btn-lg pull-right" type="button"><span class="fa fa-print"></span> Etat de besoins</button></a>
				</div>


	      	</div>
	          
	          <div class="row spacer">
	          	 <div class="col-12">
	 				<table id="tab" class="display table table-bordered table-striped table">
		          	<thead>
		          		<tr style="font-weight:bold" class="btn-danger">
                            <th>N°</th>  
                            <th>Article </th>  
                            <th>Quantité </th>  
                            <th>PU</th>  
		          			<td>Action</td>
		          		</tr>
		          	</thead>
		          	<tbody>
		          		<?php
		          			$limit=4;
							$page = isset($_GET['page'])?$_GET['page']:1;
							$start = ($page-1)*$limit;



							$req = $bd->query("SET lc_time_names='fr_FR'");
							$req = $bd->query("SELECT * FROM etatbesoin WHERE etat='wait' ORDER BY idEtat DESC LIMIT $start,$limit");
							
							$res = $bd->query("SELECT count(*) as total FROM etatbesoin WHERE etat='wait'");


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
                                <td><?php echo $don['idEtat'] ?></td>
                                <td><?php echo $don['article'] ?></td>
                                <td><?php echo $don['qte'] ?></td>
                                <td><?php echo $don['pu'] ?></td>
								<td>
									
									<button type="button" class="btn btn-danger editBtn"><span class="fa fa-trash"></span>
										
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
			    			<a  class="page-link" aria-label="Previous" href="etatbesoin.php?page=<?php echo $prec;?>">
			    				<span aria-hidden="true">&laquo;</span>
			    				<span class="sr-only" ="true">Previous</span>
			    			</a>
			    		</li>
			    		<?php 
			    			for($i=1;$i<=$nbrePage;$i++) {
			    		?> 
			    		<li class="page-item <?php echo(($page==$i)?'active':'')?>"><a  class="page-link" href="etatbesoin.php?page=<?php echo $i;?>"><?php echo $i;?></a></li>
			    		<?php
			    		}?>
			    		<li class="page-item">
			    			<a  class="page-link" aria-label="Next" href="etatbesoin.php?page=<?php echo $suiv;?>">
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
		  		$('#qte').val(data[2]);
		  	});
		  	$('#plat').hide();
		  	$('#boisson').hide();
		  	$('#divers').hide();
		  	$('.plat').on('click',function(){
		  		$('#plat').show();
		  		$('#boisson').hide();
		  		$('#divers').hide();
		  	});
		  	$('.boisson').on('click',function(){
		  		$('#boisson').show();
		  		$('#plat').hide();
		  		$('#divers').hide();
		  	});
		  	$('.divers').on('click',function(){
		  		$('#divers').show();
		  		$('#plat').hide();
		  		$('#boisson').hide();
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
		  	$('#liste-cat1').change(function(){
		  		var val= $('#liste-cat1').val();
		  		$.ajax({
				type:"POST",
				url:"get_nour.php",
				data:'idNour='+val,
				success:function(data){
				  $("#list_nour").html(data);
				}
			});
		  	});
            
            $('[data-toggle="tooltip"]').tooltip();
		});
	</script>
</body>
</html>