<?php 
	 require_once ('../security_brmn.php'); 
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
					<h4 class="modal-title" id="exampleModalLabel">MODIFICATION COMMANDE</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="close">
						<span aria-hidden="true">&times;</span>
					</button>
						
				</div>
				<form action="putain.php" method="POST" class="was-validated">
					<div class="modal-body">
						<input type="hidden" name="id" id="id" required="" autocomplete="off"><br>
						
		           		
                        
		           		<div class="input-group mb-4">	 
		           			<div class="input-group-append">
		           				<span class="input-group-text" id="basic-addon2">Quantite</span>
		           			</div>          			
		           			<input id="qteCom" type="text" name="qteCom" class="form-control" placeholder="Quantite Demandée" required="" autocomplete="off">
		           			
		           		</div>
		           		<!--<div class="input-group mb-4">	 
		           			<div class="input-group-append">
		           				<span class="input-group-text" id="basic-addon2">Prix de vente</span>
		           			</div>          			
		           			<input id="prixdevente" type="text" name="prixdevente" class="form-control" placeholder="Prix de vente" required="" autocomplete="off">
		           			
		           		</div>-->
					    		           		
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
					<a class="nav-link" href="../ac_sess/ac_bman.php"><button type="button" class="btn btn-outline-light connexion"><h3>Retour</h3></button><span class="sr-only">(current)</span></a>
				</li>
			</ul>
			
		</div>
	</nav>

		<!--================================CONTENU ========================================== -->

	<div class="container-fluid spacer">
		<div class="row">
			<div class="col-md-3">
		          <h3 class="title">AJOUTER BOISSON</span></h3>
		          <?php
		          		if (isset($_POST['save'])) {
		          		
							$idboiss=$_POST['idBoiss'];



							$idpv=$_SESSION['profil']['agent5']['idPv'];

		          			if (!empty($idboiss) AND !empty($idpv)  ) {

		          				$req=$bd->prepare("SELECT * FROM stockPv WHERE idBoiss=? AND idPV=?");
    							$req->execute(array($idboiss,$idpv));
    							$don=$req->fetch(PDO::FETCH_ASSOC);
    							if ($don>0) { ?>
    								<div class="alert alert-danger alert-dismissible" id="msg" role="alert">
										<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
										<h6>Ce produit existe déjà en stock</h6>
									</div>


    							<?php }else{

    							
					            $req = $bd->prepare('INSERT INTO stockPv (idBoiss,idPV) VALUES (?,?)');
					            $req->execute(array($idboiss,$idpv));
					            if ($req) { ?>
					                    <div class="alert alert-success alert-dismissible" id="msg" role="alert">
										<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
										<h6>Produit enregistré en stock</h6>
									</div>
					                <?php 
					            } }
					        }else{ ?>

					        	<div class="alert alert-danger alert-dismissible" id="msg" role="alert">
									<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
									<h6>Certains champs sont vides</h6>
								</div>

					        <?php } }

		           ?>
		           <form action="" method="POST" class="spacer was-validated">

		           		<select id="liste-cat" class="form-control" required="">
		           			<option selected="" disabled="" value="">Sélectionner catégorie</option>
                               <?php 
                                   $select_id = $bd->query('SELECT * FROM catBoiss');
                                   while($selec_id = $select_id->fetch()){
                               ?>
                               <option value=" <?php echo $selec_id['idCatBoiss']  ?>">
                               <?php echo $selec_id['idCatBoiss'].' '.$selec_id['designCatBoiss'];?>
                               </option>
                                <?php  }  ?>           
                        </select><br>
		           		<select name="idBoiss" id="list_boisson" class="form-control" required="">
						    <option value="" disabled="" selected="">Sélectionner la boisson</option>
						</select><br>
		           		<div class="input-group mb-4">	           			
		           			
		           			
		           		</div>
						<button type="submit" class="btn btn-danger btn-block" name="save">Ajouter</button>
		           </form>
		    </div>
	      <div class="col-md-9">
	          <h3 class="title">LISTE DE BOISSONS DISPONIBLES</span></h3>
	          <div class="row spacer">
	          	 <div class="col-12">
	 				<table id="tab" class="display table table-bordered table-striped table">
		          	<thead>
		          		<tr style="font-weight:bold" class="btn-danger">
                            <th>N°</th>
                            <th>Catégorie</th>  
                            <th>Produit</th>
                            <th>Quantite </th>
                            <th>PU</th>
                            <!--<th>Prix de vente </th>
                            <th>Action </th>-->
		          		</tr>
		          	</thead>
		          	<tbody>
		          		<?php
		          			$limit=100;
							$page = isset($_GET['page'])?$_GET['page']:1;
							$start = ($page-1)*$limit;

                           $idpv=$_SESSION['profil']['agent5']['idPv'];

							
							$req = $bd->prepare("SELECT * FROM prodboiss AS A, stockpv AS C,catboiss AS B WHERE B.idCatBoiss=A.idCatBoiss AND C.idBoiss=A.idBoiss AND  C.idPV = ? ORDER BY B.idCatBoiss LIMIT $start,$limit");
							$req->execute(array($idpv));


							$res = $bd->query("SELECT count(*) as total FROM prodboiss AS A, stockpv AS C,catboiss AS B WHERE B.idCatBoiss=A.idCatBoiss AND C.idBoiss=A.idBoiss ORDER BY B.idCatBoiss AND  C.idPV= $idpv");
							
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
                                <td><?php echo $don['idstock'] ?></td>
                                <td><?php echo $don['designCatBoiss'] ?></td>
                                <td><?php echo $don['designBoiss'] ?></td>
                                <td><?php echo $don['qtStock'] ?></td>
                                <td><?php echo $don['puBoiss'] ?></td>
                                <!--<td><?php echo $don['prixdevente'] ?></td>
                                <td>
                                	<button type="button" class="btn btn-danger editBtn"><span class="fa fa-pencil"></span>
                                </td>-->
								
						</tr>
		          		<?php endwhile;?>
		          	</tbody>
		          </table>
	          	 </div>
	          </div>
	          <div class="row">
	          	 <div class="col-MD-6 offset-3">
	          	 	<nav aria-label="Page navigation example">
	          			<ul class="pagination pg-blue">
			    		<li class="page-item">
			    			<a  class="page-link" aria-label="Previous" href="stockPV.php?page=<?php echo $prec;?>">
			    				<span aria-hidden="true">&laquo;</span>
			    				<span class="sr-only" ="true">Previous</span>
			    			</a>
			    		</li>
			    		<?php 
			    			for($i=1;$i<=$nbrePage;$i++) {
			    		?> 
			    		<li class="page-item <?php echo(($page==$i)?'active':'')?>"><a  class="page-link" href="stockPV.php?page=<?php echo $i;?>"><?php echo $i;?></a></li>
			    		<?php
			    		}?>
			    		<li class="page-item">
			    			<a  class="page-link" aria-label="Next" href="stockPV.php?page=<?php echo $suiv;?>">
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
		  		$('#qteCom').val(data[3]);
		  	});
		  	$('#liste-cat').change(function(){
		  		var val= $('#liste-cat').val();
		  		$.ajax({
				type:"POST",
				url:"get_boisson.php",
				data:'idBoiss='+val,
				success:function(data){
				  $("#list_boisson").html(data);
				}
			});
		  	});
		});
	</script>
</body>
</html>