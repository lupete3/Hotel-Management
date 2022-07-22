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
		font-size:3em; 
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
					<h4 class="modal-title" id="exampleModalLabel">MODIFICATION DIVERS CUISINE</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="close">
						<span aria-hidden="true">&times;</span>
					</button>
						
				</div>
				<form action="upDivCuis.php" method="POST" class="was-validated">
					<div class="modal-body">
						<input type="hidden" name="id" id="id" required="" autocomplete="off"><br>
						<div class="input-group mb-4">	           			
		           			<input type="text" name="designation" id="des" class="form-control" placeholder="Designation Divers" required="" autocomplete="off">
		           			<div class="input-group-append">
		           				<span class="input-group-text fa fa-gift" id="basic-addon2"></span>
		           			</div>
		           		</div>	
		           		<input type="text" name="qnteDiv" id="qte" class="form-control" placeholder="Quantité " required="" autocomplete="off"><br>
		           		<div class="input-group mb-4">	           			
			           		<div class="input-group-append">
			           			<span class="input-group-text"> Unité</span>
			           		</div>
			           			<select class="form-control" name="unite" id="list" required>
									<option value="" disabled="" selected=""> Unité</option>
									<option value=botte>botte</option>
									<option value=boule>boule</option>
									<option value=bouteilles>bouteilles</option>
									<option value=carton>carton</option>
									<option value=cl>litres</option>
									<option value=pieces>pieces</option>
									<option value=poignet>poignet</option>
									<option value=sachet>sachet</option>
									<option value=verre>verre</option>        
								</select>  
							</select>
		           		</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-outline-secondary btn-block" data-dismiss="modal">Annuler</button>
						<button type="submit" class="btn btn-danger btn-block">Modifier</button>
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
					<a class="nav-link" href="../ac_sess/ac_eco.php"><button type="button" class="btn btn-outline-light connexion"><h3>Retour</h3></button><span class="sr-only">(current)</span></a>
				</li>
			</ul>
			
		</div>
	</nav>

		<!--================================CONTENU ========================================== -->

	<div class="container-fluid spacer">
		<div class="row">
			<div class="col-md-3">
		          <h3 class="title">AJOUTER DIVERS</span></h3>
		          <?php
		          		if (isset($_POST['save'])) {

							  $a=$_POST['qnteDiv'];
							  $b=$_POST['designation'];
							  $c=$_POST['unite'];
							 

							  $req=$bd->prepare('SELECT * FROM diverscuisine WHERE designDivCuis=?');
							  $req->execute(array($b));
							  if ($don=$req->fetch(PDO::FETCH_ASSOC)) {
							      ?>
								<div class="alert alert-danger alert-dismissible" id="msg" role="alert">
									<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
									<h6>Cette nouriture existe déjà</h6>
								</div>
								<?php
							  }else{

							      $req=$bd->prepare('INSERT INTO  diverscuisine (qteDivCuis,designDivCuis,unite) VALUES(?,?,?)');
							  
							      if ($req->execute(array($a,$b))) {
							            ?>
								<div class="alert alert-success alert-dismissible" id="msg" role="alert">
									<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
									<h4>Produit enregistré</h4>
								</div>
								<?php
							      }else{
							        ?>
									<div class="alert alert-danger alert-dismissible" id="msg" role="alert" class="spacer">
										<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
										<h4 class="text-center">Produit non enregistré</h4>
									</div>
									<?php
							      }
							    }
							  }							
		           ?>
		           <form action="" method="POST" class="spacer was-validated">
		           		<div class="input-group mb-4">	           			
		           			<input type="text" name="designation" class="form-control" placeholder="Designation Divers" required="" autocomplete="off">
		           			<div class="input-group-append">
		           				<span class="input-group-text fa fa-gift" id="basic-addon2"></span>
		           			</div>
		           		</div>	
		           		<input type="text" name="qnteDiv" class="form-control" placeholder="Quantité " required="" autocomplete="off"><br>
		           		<div class="input-group mb-4">	           			
			           		<div class="input-group-append">
			           			<span class="input-group-text"> Unité</span>
			           		</div>
			           			<select class="form-control" name="unite" id="list" required>
									<option value="" disabled="" selected=""> Unité</option>
									<option value=botte>botte</option>
									<option value=boule>boule</option>
									<option value=bouteilles>bouteilles</option>
									<option value=carton>carton</option>
									<option value=cl>litres</option>
									<option value=pieces>pieces</option>
									<option value=poignet>poignet</option>
									<option value=sachet>sachet</option>
									<option value=verre>verre</option>        
								</select>  
							</select>
		           		</div>
		           		
						<button type="submit" class="btn btn-danger btn-block" name="save">Enregistrer</button>
		           </form>
		    </div>
	      <div class="col-md-9">
	          <h3 class="title">LISTE DES PRODUITS CONNEXE CUISINE</span></h3>
	          <div class="row spacer">
	          	 <div class="col-12">
	 				<table id="tab" class="display table table-bordered table-striped table-sm">
		          	<thead>
		          		<tr style="font-weight:bold" class="btn-danger">
		          			<th>N°</th>   
                            <th>Designation</th>
                            <th>Quantité</th>  
                            <th>Prix</th>
                            <th>Unité</th>
		          			<td>Action</td>
		          		</tr>
		          	</thead>
		          	<tbody>
		          		<?php
		          			$limit=100;
							$page = isset($_GET['page'])?$_GET['page']:1;
							$start = ($page-1)*$limit;

							$req = $bd->query("SELECT * FROM diverscuisine LIMIT $start,$limit");
							
							$res = $bd->query('SELECT COUNT(*) AS total FROM diverscuisine ');

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
                                <td><?php echo $don['idDivCuis'] ?></td>
                                <td><?php echo $don['designDivCuis'] ?></td>
                                <td><?php echo $don['qteDivCuis'] ?></td>
                                <td><?php echo $don['prixDivCuis'] ?></td>
                                <td><?php echo $don['unite'] ?></td>
                              

								<td>
									<button type="button" class="btn btn-danger editBtn"><span class="fa fa-pencil"></span>
										
									</button>
									<button type="button" class="btn btn-danger delBtn"><span class="fa fa-trash"></span>
								</td>
						</tr>
		          		<?php endwhile;?>
		          	</tbody>
		          </table>
	          	 </div>
	          </div>
	          <div class="row">
	          	 <div class="col-6 offset-6">
	          	 	<nav aria-label="Page navigation example">
	          			<ul class="pagination pg-blue">
			    		<li class="page-item">
			    			<a  class="page-link" aria-label="Previous" href="stockDivCuis.php?page=<?php echo $prec;?>">
			    				<span aria-hidden="true">&laquo;</span>
			    				<span class="sr-only" ="true">Previous</span>
			    			</a>
			    		</li>
			    		<?php 
			    			for($i=1;$i<=$nbrePage;$i++) {
			    		?> 
			    		<li class="page-item <?php echo(($page==$i)?'active':'')?>"><a  class="page-link" href="stockDivCuis.php?page=<?php echo $i;?>"><?php echo $i;?></a></li>
			    		<?php
			    		}?>
			    		<li class="page-item">
			    			<a  class="page-link" aria-label="Next" href="stockDivCuis.php?page=<?php echo $suiv;?>">
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
				<div class="modal fade" id="delBtn" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header bg-danger">
					<h4 class="modal-title" id="exampleModalLabel">SUPPRIMER UN PRODUIT</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="close">
						<span aria-hidden="true">&times;</span>
					</button>
						
				</div>
				<form action="delProdCuis.php" method="POST">
					<div class="modal-body">
						<input type="hidden" name="idSup" id="idDel" required="" autocomplete="off"><br>
		           		<div class="input-group mb-4">	 
		           			<h4 class="text-center">Voulez-vous supprimer cette nourriture ?</h4>
		           			
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
			</div>
		</div>
	</div>
	

	<script src="bootstrap/js/popper.min.js"></script>
	<script src="bootstrap/js/jquery-3.4.1.min.js"></script>
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
		  		$('#des').val(data[1]);
		  		$('#qte').val(data[2]);
		  		$('#pu').val(data[3]);
		  	});
		  	$('.delBtn').on('click', function(){
		  		$('#delBtn').modal('show');

		  		$tr =$(this).closest('tr');
		  		var data = $tr.children('td').map(function(){
		  			return $(this).text();
		  		}).get();
		  		console.log(data);

		  		$('#idDel').val(data[0]);
		  	});
		});
	</script>
</body>
</html>