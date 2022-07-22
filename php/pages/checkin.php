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
<body>
	<!--================================MODAL DE CONNEXION ========================================== -->

	<div class="modal fade" id="activeBtn" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header bg-danger">
					<h4 class="modal-title" id="exampleModalLabel">MODIFICATION ETAT RESERVATION</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="close">
						<span aria-hidden="true">&times;</span>
					</button>
						
				</div>
				<form action="etatReservation.php" method="POST" class="was-validated">
					<div class="modal-body">
						<input type="hidden" name="id" id="idD" required="" autocomplete="off">
		           		<h4 class="text-center">Voulez-vous effectuer ce checkin ?</h4 class="text-center">      		
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-outline-secondary btn-block" data-dismiss="modal">Annuler</button>
						<button type="submit" class="btn btn-danger btn-block">CheckIn</button>
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
					<a class="nav-link" href="../checkin_checkout.php"><button type="button" class="btn btn-outline-light connexion"><h3>Retour</h3></button><span class="sr-only">(current)</span></a>
				</li>
			</ul>
			
		</div>
	</nav>

		<!--================================CONTENU ========================================== -->

	<div class="container-fluid spacer">
		<div class="row">
	      <div class="col-md-12">
	      	<div class="row">
	      		<div class="col-md-5">
	      			<h3>LISTE DES RESERVATIONS EN COURS
			          <?php 
		                    $count = $bd->query("SELECT  COUNT(*) AS nbre FROM booking WHERE statut_booking='Encours'");
		                    $nbre=$count->fetch(PDO::FETCH_ASSOC);
		                           ?>
		                    <span class="badge badge-danger badge-pill">
		                    <?php echo $nbre['nbre']; ?>
		                    </span> 
			          </h3>
	      		</div>
	      	</div>
	          
	          <div class="row spacer">
	          	 <div class="col-12">
	 				<table id="tab" class="display table table-bordered table-striped table">
		          	<thead>
		          		<tr style="font-weight:bold" class="btn-danger">
		          			<th>N°</th>   
                            <th>Date Reservation</th>
                            <th>Client</th>  
                            <th>Chambre</th>
                            <th>Entrée</th>  
                            <th>Sortie</th>  
                            <th>Nbr de nuité</th>  
                            <th>Tot à Payer</th>  
                            <th>Accompte</th>  
                            <th>Reduction</th>  
                            <th>Reste</th>  
		          			<td>Action</td>
		          		</tr>
		          	</thead>
		          	<tbody>
		          		<?php
		          			$limit=5;
							$page = isset($_GET['page'])?$_GET['page']:1;
							$start = ($page-1)*$limit;

							$req = $bd->query("SELECT A.id_booking, date_format(A.date_booking,'%d-%m-%Y %T') AS date_booking,date_format(A.date_in,'%d-%m-%Y ') AS date_in,date_format(A.date_out,'%d-%m-%Y ') AS date_out,B.id_client, C.room_code,A.nombre_jour, A.total_apayer, A.accompte, A.reduction, A.reste_apayer, A.statut_booking, B.id_client, B.nom_client FROM booking AS A, client AS B, rooms AS C WHERE B.id_client = A.id_client AND C.id_room=A.num_chambre AND A.statut_booking='Encours' ORDER BY A.id_booking DESC LIMIT $start,$limit");
							
							$res = $bd->query("SELECT COUNT(*) AS total FROM booking AS A, client AS B,rooms AS C WHERE A.id_client = B.id_client AND C.id_room=A.num_chambre AND A.statut_booking='Encours'");

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
                                <td><?php echo $don['id_booking'] ?></td>
                                <td><?php echo $don['date_booking'] ?></td>
                                <td><?php echo $don['nom_client'] ?></td>
                                <td><strong><?php echo $don['room_code'] ?></strong></td>
                                <td><?php echo $don['date_in'] ?></td>
                                <td><?php echo $don['date_out'] ?></td>
                                <td><?php echo $don['nombre_jour'] ?></td>
                                <td><?php echo $don['total_apayer'] ?></td>
                                <td><?php echo $don['accompte'] ?></td>
                                <td><?php echo $don['reduction'] ?></td>
                                <td><?php echo $don['reste_apayer'] ?></td>
                                
								<td>
										
									
									<button type="button" class="btn btn-danger activeBtn" data-toggle="tooltip" title="CheckIn"><span class="fa fa-check"></span>
									</button>
									
									<button type="button" class="btn btn-danger supBtn" data-toggle="tooltip" title="Appuyer pour annuler"><span class="fa fa-trash"></span>
										
									</button>
									<a href="../ficheReservation.php?id=<?php echo $don['id_booking'] ?>" data-toggle="tooltip" title="Appuyer pour visualiser la fiche de reservation" target="_blank"><button type="button" class="btn btn-danger"><span class="fa fa-print"></span>
										
									</button></a>
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
			    			<a  class="page-link" aria-label="Previous" href="listReserv.php?page=<?php echo $prec;?>">
			    				<span aria-hidden="true">&laquo;</span>
			    				<span class="sr-only" ="true">Previous</span>
			    			</a>
			    		</li>
			    		<?php 
			    			for($i=1;$i<=$nbrePage;$i++) {
			    		?> 
			    		<li class="page-item <?php echo(($page==$i)?'active':'')?>"><a  class="page-link" href="listReserv.php?page=<?php echo $i;?>"><?php echo $i;?></a></li>
			    		<?php
			    		}?>
			    		<li class="page-item">
			    			<a  class="page-link" aria-label="Next" href="listReserv.php?page=<?php echo $suiv;?>">
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
				<div class="modal fade" id="supBtn" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header bg-danger">
					<h4 class="modal-title" id="exampleModalLabel">ANNULATION RESERVATION</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="close">
						<span aria-hidden="true">&times;</span>
					</button>
						
				</div>
				<form action="cancelReserv.php" method="POST">
					<div class="modal-body">
						<input type="hidden" name="id" id="idSup" required="" autocomplete="off">
						<h5 class="text-center">Voulez-vous vraiment annuler cette reservation ?</h5>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-outline-secondary btn-block" data-dismiss="modal">Annuler</button>
						<button type="submit" class="btn btn-danger btn-block">Annuler</button>
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
		  	$('.supBtn').on('click', function(){
		  		$('#supBtn').modal('show');

		  		$tr =$(this).closest('tr');
		  		var data = $tr.children('td').map(function(){
		  			return $(this).text();
		  		}).get();
		  		console.log(data);

		  		$('#idSup').val(data[0]);
		  	});
		  	$('.activeBtn').on('click', function(){
		  		$('#activeBtn').modal('show');

		  		$tr =$(this).closest('tr');
		  		var data = $tr.children('td').map(function(){
		  			return $(this).text();
		  		}).get();
		  		console.log(data);

		  		$('#idD').val(data[0]);
		  	});
		  	$('[data-toggle="tooltip"]').tooltip();
		});
	</script>
</body>
</html>