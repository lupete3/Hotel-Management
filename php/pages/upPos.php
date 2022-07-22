<?php 
	//require_once('securityCirc.php');
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
		font-family: Buxton Sketch;
		font-size:4em; 
		font-weight: bold; margin-top: 2px; 
		margin-left: 10px; color: white; 
		padding-top: 3px;
    }
</style>
<body ng-app="">
	<!--================================MODAL DE CONNEXION ========================================== -->

	<nav class="navbar navbar-expand-lg navbar-dark bg-danger">
		<a class="navbar-brand" href="#"><img src="fichiers/photos/bbh_logos.png" class="bbh">
		</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		</button>

		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<marquee behavior="alternate" scrollamount="5"><h1 id="h1_bbh_title">Bahari Beach Hotel</h1></marquee> 
			<ul class="navbar-nav ml-auto">
				<li class="nav-item active">
					<a class="nav-link" href="venteRestaurant.php"><button type="button" class="btn btn-outline-light connexion"><h3>Retour</h3></button><span class="sr-only">(current)</span></a>
				</li>
			</ul>
			
		</div>
	</nav>

		<!--================================CONTENU ========================================== -->

	<div class="container-fluid spacer">
		<div class="row">
			<div class="col-md-8 offset-2">
				<div class="row">
					<div class="col-md-12">
						<h4 class="text-center">MODIFICATION COMMANDE TABLE</h4>
					</div>
				</div>
		          	<?php if (isset($_GET['id'])){
		          	$id=$_GET['id'];
					$req=$bd->prepare("SELECT * FROM panier WHERE idPanier=?");
					$req->execute(array($id));
					$don=$req->fetch(PDO::FETCH_ASSOC);
					$product =$don['product'];
					$qte=$don['qtePanier'];
					$idTable=$don['idTable'];
					if ($product==='B') {
						?>
						<div id="boisson">
				          	<form action="upPosBoiss.php" method="POST" class="spacer">
				          		<input type="hidden" value="<?php echo $id; ?>" class="form-control" name="idPanier">
		          			<input type="hidden" value="<?php echo $idTable; ?>" class="form-control" name="tableId">
		          			<input type="hidden" value="<?php echo $qte; ?>" class="form-control" name="qteAvant">
								<div class="input-group">
					           			<div class="input-group-append">
					           				<span class="input-group-text">Choisir serveur</span>
					           			</div>
					           			<select name="idServeur" id="table" class="form-control btn-lg" required="">
				      	  					<?php 
			                                   $select_id = $bd->query('SELECT * FROM serveur');
			                                   while($selec_id = $select_id->fetch()){
				                               ?>
				                               <option value=" <?php echo $selec_id['id_serveur']  ?>">
				                               <?php echo $selec_id['nom_serveur'];?>
				                               </option>
				                                <?php  }  ?> 
					      	  			</select>
					           		</div><br>
				           		<select id="liste_cat" class="form-control btn-lg" required="">
				           			<option selected="" disabled="">Sélectionner catégorie</option>
		                               <?php 
		                                   $select_id = $bd->query('SELECT * FROM catBoiss');
		                                   while($selec_id = $select_id->fetch()){
		                               ?>
		                               <option value=" <?php echo $selec_id['idCatBoiss']  ?>">
		                               <?php echo $selec_id['designCatBoiss'];?>
		                               </option>
		                                <?php  }  ?>           
		                        </select><br>
				           		<select name="idStock" id="list_boisson" required="" class="form-control btn-lg">
								    <option value="">Sélectionner une boisson</option>
								</select><br>
								<div class="input-group">
					           			<div class="input-group-append">
					           				<span class="input-group-text">Quantité</span>
					           			</div>
					           				<input type="number" value="<?php echo $qte; ?>" name="qteSort" class="form-control btn-lg" placeholder="Quantité" required="" autocomplete="off"><br>

					           	</div><br>
								<button type="submit" class="btn btn-danger btn-lg btn-block" data-toggle="tooltip" title="Cliquer pour ajouter une commande" name="save">MODIFIER</button>
				           </form>
				          </div>
						<?php
					}else{
						?>
						<div id="plat">
		          		<form action="upPosPlat.php" method="POST" class="spacer">
		          			<input type="hidden" value="<?php echo $id; ?>" class="form-control" name="idPanier">
		          			<input type="hidden" value="<?php echo $idTable; ?>" class="form-control" name="tableId">
		          			<div class="input-group">
			           			<div class="input-group-append">
			           				<span class="input-group-text">Choisir serveur</span>
			           			</div>
			           			<select name="idServeur" id="table" class="form-control btn-lg" required="">
		      	  					<?php 
	                                   $select_id = $bd->query('SELECT * FROM serveur');
	                                   while($selec_id = $select_id->fetch()){
		                               ?>
		                               <option value=" <?php echo $selec_id['id_serveur']  ?>">
		                               <?php echo $selec_id['nom_serveur'];?>
		                               </option>
		                                <?php  }  ?> 
			      	  			</select>
			           		</div><br>
	                        <select id="liste-cat" class="form-control btn-lg" name="idPlat" required="">
			           			<option selected="" disabled="">Sélectionner Plat</option>
	                               <?php 
	                                   $select_id = $bd->query('SELECT * FROM plat');
	                                   while($selec_id = $select_id->fetch()){
	                               ?>
	                               <option value=" <?php echo $selec_id['idPlat']  ?>">
	                               <?php echo $selec_id['designPlat'];?>
	                               </option>
	                                <?php  }  ?>           
	                        </select><br>
	                        <div class="input-group">
					           	<div class="input-group-append">
					           		<span class="input-group-text">Quantité</span>
					           	</div>
					           		<input type="number" value="<?php echo $qte; ?>" name="qteSort" class="form-control btn-lg" placeholder="Quantité" required="" autocomplete="off"><br>

					           	</div><br>
			           		
							<button type="submit" class="btn btn-danger btn-block btn-lg" data-toggle="tooltip" title="Cliquer pour ajouter une commande" name="save">MODIFIER</button>
			           </form>
		          </div>
						<?php
					}
		          	}
		          	?>	
		          
		          <!--------------------------->
		          
		           
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
		  		$('#qte').val(data[4]);
		  	});
		  	$('.impBtn').on('click', function(){
		  		$('#editBtn').modal('show');

		  		$tr =$(this).closest('tr');
		  		var data = $tr.children('td').map(function(){
		  			return $(this).text();
		  		}).get();
		  		console.log(data);

		  		$('#id').val(data[0]);
		  	});
		  	$('#liste_cat').change(function(){
                var val= $('#liste_cat').val();
                $.ajax({
                type:"POST",
                url:"get_boissPv.php",
                data:'idCat='+val,
                success:function(data){
                  $("#list_boisson").html(data);
                }
            	});
            });
            $('[data-toggle="tooltip"]').tooltip();
		  	
		});
	</script>
</body>
</html>