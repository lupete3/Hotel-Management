<?php 
	require_once ('../security_admin.php'); 
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
	<link rel="stylesheet" type="text/css" href="bootstrap/DataTables/media/css/jquery.dataTables.min.css">
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
					<a class="nav-link" href="../ac_sess/ac_cpt.php"><button type="button" class="btn btn-outline-light connexion"><h3>Retour</h3></button><span class="sr-only">(current)</span></a>
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
	      			<h3>LISTES DES CREANCIERS</h3>
	      		</div>
	      		<div class="col-md-4">
	      			<h3>
	      				Total des dettes: <strong><span class="badge badge-danger btn-lg">
	      					<?php 
	      					$req = $bd->query("SELECT SUM(reste) as total FROM facturation AS A ,client AS B,organisation AS C WHERE B.id_client=A.id_client AND C.idOrg=B.idOrg AND modePaieFact='Crédit' AND etatFact='wait' AND type='Crédit'");
		                    $don=$req->fetch(PDO::FETCH_ASSOC);
		                    echo number_format($don['total'],2).'$';
	      				 ?>
	      				</span></strong>
	      			</h3>
	      		</div>
	      		<div class="col-md-3 pull-right">
                    <button type="button" class="btn btn-primary print pull-right"><span class="fa fa-print"></span> Imprimer</button>
                    
                </div>
	      		
	      	</div>
	          
            

	          <div class="row spacer">
	          	 <div class="col-12">
	 				<table id="tab" class="display table table-bordered table-striped table-sm">
		          	<thead>
		          		<tr style="font-weight:bold" class="btn-danger">
                            <th>N°</th>
                            <th>Nom client</th>  
                            <th>Tel</th>
                            <th>Email</th>
                            <th>Designation</th>   
                            <th>Date</th>  
		          			<th>Action</th>
		          		</tr>
		          	</thead>
		          	<tbody>
		          		<?php 
                            
		                    $req = $bd->query("SELECT * FROM facturation AS A ,client AS B,organisation AS C WHERE B.id_client=A.id_client AND C.idOrg=B.idOrg AND modePaieFact='Crédit' AND type='Crédit' AND etatFact='wait' GROUP BY B.id_client");
		                
		          			while ($don=$req->fetch(PDO::FETCH_ASSOC)) {
		          				?>
								<tr>
	                               <td><?php echo $don['idFact']; ?></td>
	                               <td><?php echo $don['nom_client'] ;?></td>
	                               <td><?php echo $don['telClient']; ?></td>
	                               <td><?php echo $don['email']; ?></td>
	                               <td><?php echo $don['nomOrg']; ?></td>
	                               <td><?php echo $don['dateFact']; ?></td>
	                               <td>
										<a href="../paiementDette.php?id=<?php echo $don['id_client'];?>&idFac=<?php echo $don['idFact'];?>" data-toggle="tooltip" title="Cliquer pour visualiser cette créance">
										<button type="button" class="btn btn-danger editBtn" ><span class="fa fa-print"></span>
										</button>
									</a>
										
									</button>
	                               </td>                                

								</tr>
		          			<?php
		          			}
		          		 ?>
						
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
		  		$('#client').val(data[2]);
		  		$('#chambre').val(data[3]);
		  		$('#dateIn').val(data[4]);
		  		$('#dateOut').val(data[5]);
		  		$('#accompte').val(data[8]);
		  		$('#reduction').val(data[9]);
		  	});
		  	$('#tab').DataTable({
		  		pagingTpe:'full_numbers',
		  		lengthMenu:[5,10,20,50,100,200,500],
		  		pageLength:[10],
		  		language:{
		  			url:"bootstrap/DataTables/media/French.json"
		  		}
		  	});
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