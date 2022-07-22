<?php 
	require_once ('../security_cuis.php'); 
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
	<div class="modal fade" id="editBtn" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header bg-danger">
					<h4 class="modal-title" id="exampleModalLabel">MODIFICATION COMMANDE</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="close">
						<span aria-hidden="true">&times;</span>
					</button>
						
				</div>
							
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
					<a class="nav-link" href="../req_cuisine.php"><button type="button" class="btn btn-outline-light connexion"><h3>Retour</h3></button><span class="sr-only">(current)</span></a>
				</li>
			</ul>
			
		</div>
	</nav>

		<!--================================CONTENU ========================================== -->

	<div class="container-fluid spacer">
		<div class="row">
			
	      <div class="col-md-12">
	      		<div class="row">
	      			<div class="col-md-8">
				 		<h3 class="title">LISTE COMMANDES EN COURS
							<?php 
									$req=$bd->query("SELECT count(*) as total FROM commandenour as A,pointvente as B,prodNour as C WHERE A.idNour=C.idNour AND A.idPv=B.idPv AND A.statutComNour = 'Encours'");
									$don=$req->fetch(PDO::FETCH_ASSOC);
									$num=$don['total'];
								?>	<span class="badge badge-danger"><?php echo $num;?></span> 
							 
						</h3>
				
			</div>
			<div class="col-md-3 offset-1">
				<a href="comNour.php"><button class="btn btn-danger btn-lg pull-right" type="button"><span class="fa fa-list"></span> Passer commande</button></a>
			</div>
	      		
	      		</div>

	         
	          <div class="row spacer">
	          	 <div class="col-12">
	 				<table id="tab" class="display table table-bordered table-striped table">
		          	<thead>
		          		<tr style="font-weight:bold" class="btn-danger">
                            <th>N°</th>  
                            <th>Produit</th>
                            <th>Date</th>
                            <th>Quantité</th>  
                           
		          		
		          		</tr>
		          	</thead>
		          	<tbody>
		          		<?php
		          			$limit=4;
							$page = isset($_GET['page'])?$_GET['page']:1;
							$start = ($page-1)*$limit;



							$req = $bd->query("SET lc_time_names='fr_FR'");
							$req = $bd->query("SELECT A.idComNour,A.qteComNour,date_format(A.dateComNour,'%e-%m-%Y à %T') as dateComNour,designNour FROM commandenour as A,pointvente as B,prodNour as C WHERE A.idNour=C.idNour AND A.idPv=B.idPv AND A.statutComNour = 'Encours' ORDER BY idComNour DESC LIMIT $start,$limit");
							
							$res = $bd->query("SELECT count(*) as total FROM commandenour as A,pointvente as B,prodNour as C WHERE A.idNour=C.idNour AND A.idPv=B.idPv AND A.statutComNour = 'Encours'");


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
                                <td><?php echo $don['idComNour'] ?></td>
                                <td><?php echo $don['designNour'] ?></td>
                                <td><?php echo $don['dateComNour'] ?></td>
                                <td><?php echo $don['qteComNour'] ?></td>
                                
                                
								
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
			    			<a  class="page-link" aria-label="Previous" href="comNourEncours.php?page=<?php echo $prec;?>">
			    				<span aria-hidden="true">&laquo;</span>
			    				<span class="sr-only" ="true">Previous</span>
			    			</a>
			    		</li>
			    		<?php 
			    			for($i=1;$i<=$nbrePage;$i++) {
			    		?> 
			    		<li class="page-item <?php echo(($page==$i)?'active':'')?>"><a  class="page-link" href="comNourEncours.php?page=<?php echo $i;?>"><?php echo $i;?></a></li>
			    		<?php
			    		}?>
			    		<li class="page-item">
			    			<a  class="page-link" aria-label="Next" href="comNourEncours.php?page=<?php echo $suiv;?>">
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
			$('.editBtn').on('click', function(){
		  		$('#editBtn').modal('show');

		  		$tr =$(this).closest('tr');
		  		var data = $tr.children('td').map(function(){
		  			return $(this).text();
		  		}).get();
		  		console.log(data);

		  		$('#id').val(data[0]);
		  		$('#qteCom').val(data[1]);
		  	});
		  	$('#liste-cat').change(function(){
		  		var val= $('#liste-cat').val();
		  		$.ajax({
				type:"POST",
				url:"get_nourCuis.php",
				data:'idNour='+val,
				success:function(data){
				  $("#list_nour").html(data);
				}
			});
		  	});
		});
	</script>
</body>
</html>