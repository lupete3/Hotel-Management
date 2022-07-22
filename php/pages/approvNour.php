<?php 
	require_once ('../security_eco.php');
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
					<h4 class="modal-title" id="exampleModalLabel">MODIFICATION ENTREE</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="close">
						<span aria-hidden="true">&times;</span>
					</button>
						
				</div>
				<form action="upApprovNour.php" method="POST" class="was-validated">
					<div class="modal-body">
						<input type="hidden" name="id" id="id" required="" autocomplete="off">
						<div class="input-group mb-4">	           			
							<div class="input-group-append">
		           				<span class="input-group-text" id="basic-addon2">Sélectionner produit</span>
		           			</div>
		           			<select id="select" class="form-control" name="idNour" required="">
		           				<option value="" selected="" disabled="">Sélectionner produit</option>
                                <?php 
                                    $select_id = $bd->query('SELECT * FROM prodnour');
                                    while($selec_id = $select_id->fetch()){
                                ?>
                                <option value=" <?php echo $selec_id['idNour']  ?>">
                                <?php echo $selec_id['designNour'];  ?>
                                </option>
                                 <?php  }  ?>           
                        	</select>
		           		</div>
		           		<div class="input-group mb-4">	           			
							<div class="input-group-append">
		           				<span class="input-group-text" id="basic-addon2">Sélectionner founrisseur</span>
		           			</div>
		           			<select id="select" class="form-control" name="idFour" required="">
\	                              <option value="" disabled="" selected="">Sélectionner founrisseur</option>              
	                           	<?php 
	                               	$select_id = $bd->query('SELECT * FROM four');
	                               	while($selec_id = $select_id->fetch()){
	                                   	?>
	                               	<option value=" <?php echo $selec_id['idFour']  ?>">
	                                    	<?php echo $selec_id['nomFour'];  ?>
	                               	</option>
	                            	<?php  }  
	                            ?>
	                        </select>
		           		</div>
                        <div class="input-group mb-4">
                        	<div class="input-group-append">
		           				<span class="input-group-text" id="basic-addon2">Quantité</span>
		           			</div>	           			
							<input type="text" name="qnteApprov" class="form-control" id="qte" required="" autocomplete="off"><br>
					    </div>
					    <div class="input-group mb-4">
					    	<div class="input-group-append">
		           				<span class="input-group-text" id="basic-addon2">PU</span>
		           			</div>	           			
								<input type="text" name="puApprov" class="form-control" id="pu" required="" autocomplete="off">
							<div class="input-group-append">
		           				<span class="input-group-text fa fa-usd" id="basic-addon2"></span>
		           			</div>
					    </div>	
					    <div class="input-group mb-4">
					    	<div class="input-group-append">
		           				<span class="input-group-text" id="basic-addon2">Accompte</span>
		           			</div>	           			
								<input type="text" name="accompte" class="form-control" id="acc" required="" autocomplete="off">
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
					<a class="nav-link" href="../ac_sess/ac_eco.php"><button type="button" class="btn btn-outline-light connexion"><h3>Retour</h3></button><span class="sr-only">(current)</span></a>
				</li>
			</ul>
			
		</div>
	</nav>

		<!--================================CONTENU ========================================== -->

	<div class="container-fluid spacer">
		<div class="row">
			<div class="col-md-3">
		          <h3 class="title">AJOUTER ENTREE</span></h3>
		          <?php

		          		if (isset($_POST['save'])) {
							  $a=$_POST['idNour'];
							  $b=$_POST['idFour'];
							  $c=$_POST['qnteApprov'];
							  $d=$_POST['puApprov'];
							  $e=$_POST['accompte'];
							  
							  $f = $c*$d;
							  $reste = $f - $e;
							  $mode = (($reste === 0)?'Cash':'Crédit');
							  $diff='SN';

							  $req=$bd->prepare('SELECT * FROM prodnour WHERE idNour=?');
							  $req->execute(array($a));
							  $don=$req->fetch(PDO::FETCH_ASSOC);
							  $qte = $don['qnteNour'];
							  $design = $don['designNour'];
							  $qte+=$c;
							  $nbre = $don['nbUniteNour'];
							  $val=$nbre*$qte;
							  
							  $req=$bd->prepare('UPDATE prodnour SET qnteNour=?, valUnitNour=?,puNour=? WHERE idNour=?');
							  $req->execute(array($qte,$val,$d,$a));

							      $req=$bd->prepare('INSERT INTO approvnour(idNour,idFour,qnteApprov,puApprov,accompte,ptApprov,modeAchat,reste) VALUES(?,?,?,?,?,?,?,?)');
							  
							      if ($req->execute(array($a,$b,$c,$d,$e,$f,$mode,$reste))) {


							      	$req=$bd->query("SELECT idApprovNour FROM approvnour ORDER BY idApprovNour  DESC LIMIT 1");
			 						 $don = $req->fetch(PDO::FETCH_ASSOC);
									 $id=$don['idApprovNour'];

									if($reste>0){

									$detteFour =$bd->prepare('INSERT INTO dettefour(designProd,	qteDette,puDette,ptDette,modePaieDette,	idOperation,	diffIndex,accompte,reste,idFour)VALUES(?,?,?,?,?,?,?,?,?,?)');
							        
									$detteFour->execute(array($design,$c,$d,$f,$mode,$id,$diff,$e,$reste,$b));

									} 

							            ?>
								<div class="alert alert-success alert-dismissible" id="msg" role="alert">
									<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
									<h4>Entrée ajoutée</h4>
								</div>
								<?php
							      }else{
							        ?>
									<div class="alert alert-danger alert-dismissible" id="msg" role="alert" class="spacer">
										<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
										<h4 class="text-center">Entrée non ajouté</h4>
									</div>
									<?php
							      }
							  }							
		           ?>
		           <form action="" method="POST" class="spacer">
		           		<select id="liste-cat1" class="form-control" required="">
			           			<option selected="" disabled="" value="">Sélectionner catégorie</option>
	                               <?php 
	                                   $select_id = $bd->query('SELECT * FROM catNour');
	                                   while($selec_id = $select_id->fetch()){
	                               ?>
	                               <option value=" <?php echo $selec_id['idCatNour']  ?>">
	                               <?php echo $selec_id['idCatNour'].' '.$selec_id['designCatNour'];?>
	                               </option>
	                                <?php  }  ?>           
	                        </select><br>
			           		<select name="idNour" id="list_nour" class="form-control" required="">
							    <option value="" disabled="" selected="">Sélectionner une nourriture</option>
							</select><br>
                        <select id="select" class="form-control" name="idFour" required="">
                            <option selected="" disabled="">Sélectionner fournisseur ! </option>
                                            
                           	<?php 
                               	$select_id = $bd->query('SELECT * FROM four');
                               	while($selec_id = $select_id->fetch()){
                                   	?>
                               	<option value=" <?php echo $selec_id['idFour']  ?>">
                                    	<?php echo $selec_id['idFour'].' '.$selec_id['nomFour'];  ?>
                               	</option>
                            	<?php  }  
                            ?>
                        </select><br>
		           		<input type="text" name="qnteApprov" class="form-control" placeholder="Quantité entrée" required="" autocomplete="off"><br>
		           		<div class="input-group mb-4">	           			
		           			<input type="text" name="puApprov" class="form-control" placeholder="Prix unitaire achat" required="" autocomplete="off">
		           			<div class="input-group-append">
		           				<span class="input-group-text fa fa-usd" id="basic-addon2"></span>
		           			</div>
		           		</div>
		           		<div class="input-group mb-4">	           			
		           			<input type="text" name="accompte" class="form-control" placeholder="Accompte" required="" autocomplete="off">
		           			<div class="input-group-append">
		           				<span class="input-group-text fa fa-usd" id="basic-addon2"></span>
		           			</div>
		           		</div>
						<button type="submit" class="btn btn-danger btn-block" name="save">Enregistrer</button>
		           </form>
		    </div>
	      <div class="col-md-9">
	          <h3 class="title">LISTE DES ENTREES NOURRITURES</span></h3>
	          <div class="row spacer">
	          	 <div class="col-12">
	 				<table id="tab" class="display table table-bordered table-striped table">
		          	<thead>
		          		<tr style="font-weight:bold" class="btn-danger">
		          			<th>N°</th>  
                            <th>Produit</th>  
                            <th>Fournisseur</th>  
                            <th>Qte entrée</th>  
                            <th>PU</th>  
                            <th>Accompte</th>  
		          			<td>Action</td>
		          		</tr>
		          	</thead>
		          	<tbody>
		          		<?php
		          			$limit=10;
							$page = isset($_GET['page'])?$_GET['page']:1;
							$start = ($page-1)*$limit;

							$req = $bd->query("SELECT * FROM approvnour as A,four as B,prodnour as C WHERE C.idNour=A.idNour AND B.idFour=A.idFour ORDER BY idApprovNour DESC LIMIT  $start,$limit");
							
							$res = $bd->query('SELECT COUNT(*) as total FROM approvnour as A,four as B,prodnour as C WHERE C.idNour=A.idNour AND B.idFour=A.idFour');

							$don1 = $res->fetch();
							$total = $don1['total'];
							$nbrePage=ceil($total/$limit);
							if ($page==1) {
								$prec = $page;
							}else {
								$prec = $page-1;
							}
							if ($page==$nbrePage) {
								$suiv=$nbrePage;	
							}
							else{
								$suiv = $page+1;
							}
		          			while($don=$req->fetch()):
		          				?>
		          		<tr>
                                <td><?php echo $don['idApprovNour'] ?></td>
                                <td><?php echo $don['designNour'] ?></td>
                                <td><?php echo $don['nomFour'] ?></td>
                                <td><?php echo $don['qnteApprov'] ?></td>
                                <td><?php echo $don['puApprov'] ?></td>
                                <td><?php echo $don['accompte'] ?></td>
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
	          	 <div class="col-8 offset-4">
	          	 	<nav aria-label="Page navigation example">
	          			<ul class="pagination pg-blue">
			    		<li class="page-item">
			    			<a  class="page-link" aria-label="Previous" href="approvNour.php?page=<?php echo $prec;?>">
			    				<span aria-hidden="true">&laquo;</span>
			    				<span class="sr-only" ="true">Previous</span>
			    			</a>
			    		</li>
			    		<?php 
			    			for($i=1;$i<=$nbrePage;$i++) {
			    		?> 
			    		<li class="page-item <?php echo(($page==$i)?'active':'')?>"><a  class="page-link" href="approvNour.php?page=<?php echo $i;?>"><?php echo $i;?></a></li>
			    		<?php
			    		}?>
			    		<li class="page-item">
			    			<a  class="page-link" aria-label="Next" href="approvNour.php?page=<?php echo $suiv;?>">
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
		  		$('#qte').val(data[3]);
		  		$('#pu').val(data[4]);
		  		$('#acc').val(data[5]);
		  	});
		  	$('#liste-cat1').change(function(){
		  		var val= $('#liste-cat1').val();
		  		$.ajax({
				type:"POST",
				url:"get_nour.php",
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