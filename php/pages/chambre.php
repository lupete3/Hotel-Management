<?php 
	require_once('../security_admin.php');
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
					<h4 class="modal-title" id="exampleModalLabel">MODIFICATION CHAMBRE</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="close">
						<span aria-hidden="true">&times;</span>
					</button>
						
				</div>
				<form action="upChambre.php" method="POST" class="was-validated">
					<div class="modal-body">
						<input type="hidden" name="id" id="id" required="" autocomplete="off"><br>
		           		<div class="input-group mb-4">	           			
		           			<input type="text" id="prix" name="room_prix" class="form-control" placeholder="Prix chambre" required="" autocomplete="off">
		           			<div class="input-group-append">
		           				<span class="input-group-text fa fa-usd" id="basic-addon2"></span>
		           			</div>
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
					<a class="nav-link" href="../admin.php"><button type="button" class="btn btn-outline-light connexion"><h3>Retour</h3></button><span class="sr-only">(current)</span></a>
				</li>
			</ul>
			
		</div>
	</nav>

		<!--================================CONTENU ========================================== -->

	<div class="container-fluid spacer">
		<div class="row">
			<div class="col-md-3">
		          <h3 class="title">AJOUTER CHAMBRE</span></h3>
		          <?php
		          		if (isset($_POST['save'])) {
							  $a=$_POST['room_categorie'];
							  $b=$_POST['room_type'];
							  $c=$_POST['room_vue'];
							  $d=$_POST['room_code'];
							  $e=$_POST['room_prix'];
							  $f=$_POST['niveau'];
							  $g=$_POST['autre_info'];
							  $h='Disponible';
							  $i='prete';

							  $req=$bd->prepare('SELECT * FROM rooms WHERE room_categorie=? AND room_vue=? AND room_type=?');
							  $req->execute(array($a,$b,$c));
							  if ($don=$req->fetch(PDO::FETCH_ASSOC)) {
							      ?>
								<div class="alert alert-danger alert-dismissible" id="msg" role="alert">
									<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
									<h6>Cette chambre existe déjà</h6>
								</div>
								<?php
							  }else{
							      $req=$bd->prepare('INSERT INTO rooms (idCatCh,room_type,idVue,room_code,niveau,room_prix,autre_info,statut,motif) VALUES(?,?,?,?,?,?,?,?,?)');
							  
							      if ($req->execute(array($a,$b,$c,$d,$e,$f,$g,$h,$i))) {
							            ?>
								<div class="alert alert-success alert-dismissible" id="msg" role="alert">
									<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
									<h4>Chambre ajoutée</h4>
								</div>
								<?php
							      }else{
							        ?>
									<div class="alert alert-danger alert-dismissible" id="msg" role="alert" class="spacer">
										<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
										<h4 class="text-center">Chambre non ajoutée</h4>
									</div>
									<?php
							      }
							    }
							  }							
		           ?>
		           <form action="" method="POST" class="spacer was-validated">
		           		<input type="text" name="room_code" class="form-control" placeholder="Numéro chambre" required="" autocomplete="off"><br>
		           		<select id="select" class="form-control" name="room_categorie" required="">
                            <option value="" selected="" disabled="">Sélectionner catégorie </option>
							<?php 
	                            $select_id = $bd->query('SELECT * FROM catChambre');
	                            while($selec_id = $select_id->fetch()){
	                               ?>
	                               <option value=" <?php echo $selec_id['idCatCh']  ?>">
	                               <?php echo $selec_id['designCatCh'];?>
	                               </option>
	                        <?php  }  ?>     			           			
                                      
                        </select><br>
                        <select name="room_vue" id="" class="form-control">
                        	<option value="" selected="" disabled="">Sélectionner vue </option>
                        	<?php 
	                            $select_id = $bd->query('SET NAMES UTF8');
	                            $select_id = $bd->query('SELECT * FROM vueChambre');
	                            while($selec_id = $select_id->fetch()){
	                               ?>
	                               <option value=" <?php echo $selec_id['idVue']  ?>">
	                               <?php echo $selec_id['designVue'];?>
	                               </option>
	                        <?php  }  ?> 
                        </select><br>
                        <select name="room_type" id="" class="form-control">
                        	<option value="Chambre a un lit">Chambre à un lit</option>
                        	<option value="Chambre a deux lits">Chambre à deux lits</option>
                        </select><br>
		           		
		           		<div class="input-group mb-4">	           			
		           			<input type="text" name="room_prix" class="form-control" placeholder="Prix chambre" required="" autocomplete="off">
		           			<div class="input-group-append">
		           				<span class="input-group-text fa fa-usd" id="basic-addon2"></span>
		           			</div>
		           		</div>
		           		<select name="niveau" id="" class="form-control">
		           			<option selected="" disabled="" value="">Sélectionner niveau</option>
		           			<option value="1">1</option>
		           			<option value="2">2</option>
		           			<option value="3">3</option>
		           			<option value="4">4</option>
		           		</select><br>	
		           		<input type="text" name="autre_info" class="form-control" placeholder="Autre à préciser"><br>
						<button type="submit" class="btn btn-danger btn-block" name="save">Enregistrer</button>
		           </form>
		    </div>
	      <div class="col-md-9">
	          <h3 class="title">LISTE DES CHAMBRES</span></h3>
	          <div class="row spacer">
	          	 <div class="col-12">
	 				<table id="tab" class="display table table-bordered table-striped table">
		          	<thead>
		          		<tr style="font-weight:bold" class="btn-danger">
		          			<th>N°</th>   
                            <th>Type</th>
                            <th>Categorie</th>  
                            <th>vue</th>  
                            <th>Niveau</th>  
                            <th>Code</th>
                            <th>Prix($)</th>
                            <th>Statut</th>  
		          			<td>Action</td>
		          		</tr>
		          	</thead>
		          	<tbody>
		          		<?php
		          			$limit=6;
							$page = isset($_GET['page'])?$_GET['page']:1;
							$start = ($page-1)*$limit;

							$req = $bd->query("SET NAMES UTF8");
							$req = $bd->query("SELECT * FROM rooms as A,vueChambre as B,catChambre AS C WHERE B.idVue=A.idVue AND C.idCatCh=.A.idCatCh LIMIT $start,$limit");
							
							$res = $bd->query("SELECT COUNT(*) AS total FROM rooms as A,vueChambre as B,catChambre AS C WHERE B.idVue=A.idVue AND C.idCatCh=.A.idCatCh");

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
                                <td><?php echo $don['id_room'] ?></td>
                                <td><?php echo $don['room_type'] ?></td>
                                <td><?php echo $don['designCatCh'] ?></td>
                                <td><?php echo $don['designVue'] ?></td>
                                <td><?php echo $don['niveau'] ?></td>
                                <td><?php echo $don['room_code'] ?></td>
                                <td><?php echo $don['room_prix'] ?></td>
                                
                                <td><?php echo $don['statut'] ?></td>
								<td>
									<button type="button" class="btn btn-danger editBtn"><span class="fa fa-pencil"></span>
										
									</button>
								</td>
						</tr>
		          		<?php endwhile;?>
		          	</tbody>
		          </table>
	          	 </div>
	          </div>
	          <div class="row">
	          	 <div class="col-3 offset-6">
	          	 	<nav aria-label="Page navigation example">
	          			<ul class="pagination pg-blue">
			    		<li class="page-item">
			    			<a  class="page-link" aria-label="Previous" href="chambre.php?page=<?php echo $prec;?>">
			    				<span aria-hidden="true">&laquo;</span>
			    				<span class="sr-only" ="true">Previous</span>
			    			</a>
			    		</li>
			    		<?php 
			    			for($i=1;$i<=$nbrePage;$i++) {
			    		?> 
			    		<li class="page-item <?php echo(($page==$i)?'active':'')?>"><a  class="page-link" href="chambre.php?page=<?php echo $i;?>"><?php echo $i;?></a></li>
			    		<?php
			    		}?>
			    		<li class="page-item">
			    			<a  class="page-link" aria-label="Next" href="chambre.php?page=<?php echo $suiv;?>">
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
		  		$('#num').val(data[5]);
		  		$('#prix').val(data[6]);
		  		
		  	});
		});
	</script>
</body>
</html>