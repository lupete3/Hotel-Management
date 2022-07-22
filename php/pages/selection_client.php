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
	      			<h3 class="text-center">RECHERCHER UN CLIENT A FACTURER
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
	          	 <div class="col-12">
	 				<table id="tab" class="display table table-bordered table-striped table">
		          	<thead>
		          		<tr style="font-weight:bold" class="btn-danger btn-lg">
		          			<th>N°</th>  
                            <th>Nom</th>  
                            <th>Nationalité</th>  
                            <th>Organisation</th>  
                            <th>Tél</th>
                            <th>N° Chambre</th>
                            <th>Date in</th>  
                            <th>Date out</th>   
                            <th>Facture</th>   
		          		</tr>
		          	</thead>
		          	<tbody>
		          		<?php
		          			

							$req = $bd->query("SELECT B.id_booking,date_format(B.date_booking,'%d-%m-%Y') AS date_booking,date_format(B.date_in,'%Y-%m-%d') AS date_in,date_format(B.date_out,'%Y-%m-%d') AS date_out,D.room_code, A.pays,C.nomOrg,A.telClient,A.id_client,A.nom_client FROM client AS A,booking AS B,organisation AS C,rooms AS D WHERE C.idOrg=A.idOrg AND B.id_client=A.id_client AND B.num_chambre=D.id_room");
							
							$res = $bd->query('SELECT COUNT(*) as total FROM client');
							$num=1;
							
		          			while($don=$req->fetch()):
		          				?>
		          		<tr class="btn-lg">
                                <td><?php echo $num; ?></td>
                                <td><?php echo $don['nom_client'] ?></td>
                                <td><?php echo $don['pays'] ?></td>
                                <td><?php echo $don['nomOrg'] ?></td>
                                <td><?php echo $don['telClient'] ?></td>
                                <td><strong><?php echo $don['room_code'] ?></strong></td>
                                <td><?php echo $don['date_in'] ?></td>
                                <td><?php echo $don['date_out'] ?></td>
                                <td>
                                	<a href="../facture_client.php?id=<?php echo $don['id_client'] ?>&idBook=<?php echo $don['id_booking'] ?>&in=<?php echo $don['date_in'] ?>&out=<?php echo $don['date_out'] ?>" target="_blank" ><button type="button" data-toggle="tooltip" title="Facture avec charge" class="btn btn-danger btn-lg"><span class="fa fa-print"></span>
										
									</button></a>
									<a href="../facture_client1.php?id=<?php echo $don['id_client'] ?>&idBook=<?php echo $don['id_booking'] ?>&in=<?php echo $don['date_in'] ?>&out=<?php echo $don['date_out'] ?>" target="_blank" ><button type="button" data-toggle="tooltip" title="Facture sans charge" class="btn btn-danger btn-lg"><span class="fa fa-print"></span>
										
									</button></a>
                                </td>
                                
								
						</tr>
		          		<?php
		          		$num++;
		          		 endwhile;?>
		          	</tbody>
		          </table>
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
		  	$('[data-toggle="tooltip"]').tooltip();
		});
	</script>
</body>
</html>