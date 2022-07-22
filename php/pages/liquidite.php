<?php 
	require_once ('../security_cpt.php'); 
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
					<h4 class="modal-title" id="exampleModalLabel">MODIFICATION DEVISE</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="close">
						<span aria-hidden="true">&times;</span>
					</button>
						
				</div>
				<form action="upDevise.php" method="POST" class="was-validated">
					<div class="modal-body">
						<input type="hidden" name="id" id="id" required="" autocomplete="off"><br>
						<div class="input-group mb-4">	           			
							<div class="input-group-append">
		           				<span class="input-group-text" id="basic-addon2">Nom Devise</span>
		           			</div>
		           			<input type="text" name="designation" class="form-control" id="lib" required="" autocomplete="off"><br>
		           		</div>		           		
						<div class="input-group mb-4">	           			
							<div class="input-group-append">
		           				<span class="input-group-text" id="basic-addon2">Taux de Change</span>
		           			</div>
		           			<input type="text" name="taux" class="form-control" id="taux" required="" autocomplete="off"><br>
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
					<a class="nav-link" href="../ac_sess/ac_cpt.php"><button type="button" class="btn btn-outline-light connexion"><h3>Retour</h3></button><span class="sr-only">(current)</span></a>
				</li>
			</ul>
			
		</div>
	</nav>

		<!--================================CONTENU ========================================== -->

	<div class="container spacer">
		<div class="row">
			<div class="col-md-5">
		        <div class="card card primary">
	          		<div class="card-header bg-info">
	          			<h3 class="card-text text-center">DISPONIBLE EN CAISSE</h3>
	          		</div>
	          		<img src="../../docs/MAJ/coffre_fort.jpg" class="card-img-top" height="300px" alt="card-img">

	          		<div class="card-body">
	          			<h1 class="text-center">
	          				<?php $req = $bd->query('SELECT montantCaisse FROM caisse');
						        	$don=$req->fetch(PDO::FETCH_ASSOC); 
						 echo number_format($don['montantCaisse'],2).' $'; 
						 ?>
	          				
	          			</h1>
	          		</div>
	          	</div>
		          
		    </div>
            
            <div class="col-md-2"></div>
            
	        <div class="col-md-5">
	          	<div class="card card primary">
	          		<div class="card-header bg-success">
	          			<h3 class="card-text text-center">DISPONIBLE EN BANQUE</h3>
	          		</div>
	          		<img src="../../docs/MAJ/bque.jpg" class="card-img-top" height="300px" alt="card-img">
	          		<div class="card-body">
	          			<h1 class="text-center">
	          				<?php $req = $bd->query('SELECT montantBanque FROM banque');
						        	$don=$req->fetch(PDO::FETCH_ASSOC); 
						 echo number_format($don['montantBanque'],2).' $'; 
						 ?>
	          				
	          			</h1>
	          			
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
		  		$('#lib').val(data[1]);
		  		$('#taux').val(data[2]);
		  	});
		});
	</script>
</body>
</html>