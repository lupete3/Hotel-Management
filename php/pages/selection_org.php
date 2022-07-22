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
	<meta name="viewport" content="width=devidev-width, initial-scale=1">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link rel="stylesheet" type="text/css" href="bootstrap/font-awesome-4.3.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="bootstrap/DataTables/media/css/jquery.dataTables.min.css">
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
	      <div class="col-md-12">
	      	<div class="row">
	      		<div class="col-md-12">
	      			<h3 class="text-center">RECHERCHER UNE ORGANISATION A FACTURER
			          <?php 
		                    $count = $bd->query('SELECT  COUNT(*) AS nbre FROM client AS A,booking AS B,organisation AS C WHERE C.idOrg=A.idOrg AND B.id_client=A.id_client');
		                    $nbre=$count->fetch(PDO::FETCH_ASSOC);
		                           ?>
		                    <span class="badge badge-secondary badge-pill">
		                    <?php echo $nbre['nbre']; ?>
		                    </span> 
			          </h3>
	      		</div>
	      	</div>
	          
	          <div class="row spacer">
	          	 <div class="col-6 offset-3">
	 				<form action="../facture_org.php" method="GET" class="spacer was-validated" target="_blank">
		           		<select id="select" class="form-control" name="id" required="">
                            <option value="" selected="" disabled="">Sélectionner organisation </option>
                                            
                            <?php 
                                $select_id = $bd->query('SELECT * FROM client AS A,booking AS B,organisation AS C,rooms AS D WHERE C.idOrg=A.idOrg AND B.id_client=A.id_client AND B.num_chambre=D.id_room GROUP BY C.idOrg');
                                while($selec_id = $select_id->fetch()){
                                    ?>
                                <option value=" <?php echo $selec_id['idOrg']  ?>">
                                     <?php echo $selec_id['nomOrg'].' '.$selec_id['adresse'].' '.$selec_id['emailOrg'];  ?>
                                </option>
                             <?php  }  ?>
                        </select><br>
		           		<div class="input-group mb-4">
		           			<div class="input-group-append">
		           				<span class="input-group-text"> Date d'arrivé</span>
		           			</div>	           			
		           			<input type="date" name="in" class="form-control" placeholder="Stock initial" required="" autocomplete="off">
		           			
		           		</div>	
		           		<div class="input-group mb-4">
		           		<div class="input-group-append">
		           				<span class="input-group-text"> Date de départ</span>
		           			</div>	           			
		           			<input type="date" name="out" class="form-control" placeholder="Prix unitaire" required="" autocomplete="off">
		           			
		           		</div>
						<button type="submit" class="btn btn-danger btn-block" name="save">Enregistrer</button>
		           </form>
		          		
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
	<script src="bootstrap/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="bootstrap/DataTables/media/js/jquery.js"></script>
	<script type="text/javascript" src="bootstrap/DataTables/media/js/jquery.dataTables.min.js"></script>
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
		  		$('#pu').val(data[2]);
		  		$('#pu1').val(data[5]);
		  		$('#pu2').val(data[3]);
		  	});
		  	$('#tab').DataTable({
		  		pagingTpe:'full_numbers',
		  		lengthMenu:[5,10,20,50,100,200,500],
		  		pageLength:[10],
		  		language:{
		  			url:"bootstrap/DataTables/media/French.json"
		  		}
		  	});
		});
	</script>
</body>
</html>