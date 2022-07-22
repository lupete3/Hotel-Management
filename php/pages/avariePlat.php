<?php 
	require_once ('../security_brmn.php'); 
	require_once('bd_cnx.php');
	$c=isset($_SESSION['profil']['agent5'])?$_SESSION['profil']['agent5']['libPv']:'';
	$dateJ=date('Y-m-d');

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
		font-family:century gothic;
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
					<h4 class="modal-title" id="exampleModalLabel">MODIFICATION AVARIE</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="close">
						<span aria-hidden="true">&times;</span>
					</button>
						
				</div>
				<form action="upAvariePlat.php" method="POST" class="was-validated">
					<div class="modal-body">
						<input type="hidden" name="id" id="id" required="" autocomplete="off"><br>
						
		           		
                        <div class="input-group mb-4">	           			
							<div class="input-group-append">
		           				<span class="input-group-text" id="basic-addon2">Sélectionner produit</span>
		           			</div>
		           			<select id="select" class="form-control" name="idPlat" required="">
		           				<option value="" selected="" disabled="">Sélectionner produit</option>
                                <?php 
                                    $select_id = $bd->query('SELECT * FROM plat');
                                    while($selec_id = $select_id->fetch()){
                                ?>
                                <option value=" <?php echo $selec_id['idPlat']  ?>">
                                <?php echo $selec_id['idPlat'].' '.$selec_id['designPlat'];  ?>
                                </option>
                                 <?php  }  ?>           
                        	</select>
		           		</div>
		           		<div class="input-group mb-4">	 
		           			<div class="input-group-append">
		           				<span class="input-group-text" id="basic-addon2">Quantite</span>
		           			</div>          			
		           			<input id="qnteAv" type="text" name="qteAv" class="form-control" placeholder="Quantite " required="" autocomplete="off">
		           			
		           		</div>
		           		<div class="input-group mb-4">	 
		           			<div class="input-group-append">
		           				<span class="input-group-text" id="basic-addon2">Motif</span>
		           			</div>          			
		           			<input id="motif" type="text" name="motif" class="form-control" placeholder="Quantite Demandée" required="" autocomplete="off">
		           			
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
		

		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<marquee behavior="alternate" >
                        <h1 id="h1_bbh_title" style="font-size: 60px; font-family: century gothic; font-weight: bold; margin-top: 2px; margin-left: 10px; color: #b90112; padding-top: 3px;text-shadow: 8px 8px 2px white; text-shadow: 0 0 10px white, 0 0 10px white,0 0 10px white;">Bahari Beach Hotel</h1></marquee>
			<ul class="navbar-nav ml-auto">
				<li class="nav-item active">
					<a class="nav-link" href="../avarieRestaurant.php"><button type="button" class="btn btn-outline-light connexion"><h3>Retour</h3></button><span class="sr-only">(current)</span></a>
				</li>
			</ul>
			
		</div>
	</nav>

		<!--================================CONTENU ========================================== -->

	<div class="container-fluid spacer">
		<div class="row">
			<div class="col-md-3">
		          <h3 class="title">AJOUTER AVARIE</span></h3>
		          <?php
		          		if (isset($_POST['save'])) {
		          			$a=$_POST['qnteAv'];
		          			$b=$_POST['motif'];
		          			$c=isset($_SESSION['profil']['agent5'])?$_SESSION['profil']['agent5']['libPv']:'';
							$d=$_POST['idPlat'];

		          			if (!empty($a) AND !empty($d) ) {
					            $req = $bd->prepare('INSERT INTO avarieplat (qtePlatAv,motifPvPlat,postePvPlat,
					            	idPlat) VALUES (?,?,?,?)');
					            $req->execute(array($a,$b,$c,$d));
					            if ($req) { ?>
					                    <div class="alert alert-success alert-dismissible" id="msg" role="alert">
										<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
										<h5>Avarie Ajoutée</h5>
									</div>
					                <?php 
					            }
					        }else{ ?>

					        	<div class="alert alert-success alert-dismissible" id="msg" role="alert">
									<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
									<h5>Certains champs sont vides</h5>
								</div>

					        <?php } }

		           ?>
		           <form action="" method="POST" class="spacer was-validated">

		           			<select id="liste_cat1" class="form-control" required="">
			           			<option selected="" value="" disabled="">Choisir une catégorie</option>
	                               <?php 
	                               		$select_id = $bd->query("SET NAMES 'UTF8'");
	                                   $select_id = $bd->query('SELECT * FROM catplat');
	                                   while($selec_id = $select_id->fetch()){
	                               ?>
	                               <option value=" <?php echo $selec_id['idCatPlat']  ?>">
	                               <?php echo $selec_id['designCatPlat'];?>
	                               </option>
	                                <?php  }  ?>           
	                        </select><br>
			           		<select name="idPlat" id="list_boisson1" class="form-control" required="">
							    <option value="" selected="" disabled="">Choisir un plat</option>
							</select><br>
		           		<div class="input-group mb-4">	           			
		           			<input type="text" name="qnteAv" class="form-control" placeholder="Quantite Avarie" required="" autocomplete="off"><br>
		           		</div>
		           		<div class="input-group mb-4">	           			
		           			<input type="text" name="motif" class="form-control" placeholder="Motif" required="" autocomplete="off"><br>
		           		</div>
						<button type="submit" class="btn btn-danger btn-block" name="save">Enregistrer</button>
		           </form>
		    </div>
	      <div class="col-md-9">
	          <h3 class="title">LISTE AVARIES DE PLATS</span></h3>
	          <div class="row spacer">
	          	 <div class="col-12">
	 				<table id="tab" class="display table table-bordered table-striped table">
		          	<thead>
		          		<tr style="font-weight:bold" class="btn-danger">
                            <th>N°</th>  
                            <th>Quantite </th>  
                            <th>Motif </th>  
                            <th>Date</th>
                            <th>Produit</th>
		          			<td>Action</td>
		          		</tr>
		          	</thead>
		          	<tbody>
		          		<?php
		          			$limit=4;
							$page = isset($_GET['page'])?$_GET['page']:1;
							$start = ($page-1)*$limit;



							$req = $bd->query("SET lc_time_names='fr_FR'");
							$req = $bd->query("SELECT A.idPlatAv,A.qtePlatAv,A.motifPvPlat,date_format(A.datePlatAv,'%e-%m-%Y à %T') as dateAv,A.postePvPlat, B.designPlat, B.idPlat FROM plat as B,avarieplat as A WHERE A.idPlat=B.idPlat AND A.postePvPlat LIKE '%$c%' AND A.datePlatAv LIKE '%$dateJ%' ORDER BY A.idPlatAv DESC LIMIT $start,$limit");
							
							$res = $bd->query("SELECT count(*) as total FROM plat as B,avarieplat as A WHERE A.idPlat=B.idPlat AND A.postePvPlat LIKE '%$c%' AND A.datePlatAv LIKE '%$dateJ%'");


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
                                <td><?php echo $don['idPlatAv'] ?></td>
                                <td><?php echo $don['qtePlatAv'] ?></td>
                                <td><?php echo $don['motifPvPlat'] ?></td>
                                <td><?php echo $don['dateAv'] ?></td>
                                <td><?php echo $don['designPlat'] ?></td>
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
	          	 <div class="col-3 offset-9">
	          	 	<nav aria-label="Page navigation example">
	          			<ul class="pagination pg-blue">
			    		<li class="page-item">
			    			<a  class="page-link" aria-label="Previous" href="avariePlat.php?page=<?php echo $prec;?>">
			    				<span aria-hidden="true">&laquo;</span>
			    				<span class="sr-only" ="true">Previous</span>
			    			</a>
			    		</li>
			    		<?php 
			    			for($i=1;$i<=$nbrePage;$i++) {
			    		?> 
			    		<li class="page-item <?php echo(($page==$i)?'active':'')?>"><a  class="page-link" href="avariePlat.php?page=<?php echo $i;?>"><?php echo $i;?></a></li>
			    		<?php
			    		}?>
			    		<li class="page-item">
			    			<a  class="page-link" aria-label="Next" href="avariePlat.php?page=<?php echo $suiv;?>">
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
		  		$('#qnteAv').val(data[1]);

		  		$('#motif').val(data[2]);
		  		$('#poste').val(data[4]);
		  	});
		  	$('#liste_cat1').change(function(){
                var val= $('#liste_cat1').val();
                $.ajax({
                type:"POST",
                url:"get_plat.php",
                data:'idBoiss='+val,
                success:function(data){
                  $("#list_boisson1").html(data);
                }
            	});
            });
		});
	</script>
</body>
</html>