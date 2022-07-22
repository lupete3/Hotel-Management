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
					<h4 class="modal-title" id="exampleModalLabel">MODIFICATION ENTREE</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="close">
						<span aria-hidden="true">&times;</span>
					</button>
						
				</div>
				<form action="upApprovDivCuis.php" method="POST" class="was-validated">
					<div class="modal-body">
						<input type="hidden" name="id" id="id" required="" autocomplete="off"><br>
						<select id="select" class="form-control" name="idDiv" required="">
                                <option selected="" disabled="" value="">Sélectionner produit ! </option>          
                                <?php 
                                    $select_id = $bd->query('SELECT * FROM diverscuisine');
                                    while($selec_id = $select_id->fetch()){
                                ?>
                                <option value=" <?php echo $selec_id['idDivCuis']  ?>">
                                <?php echo $selec_id['designDivCuis'];  ?>
                                </option>
                                 <?php  }  ?>

                        </select><br>
                        <select id="select1" class="form-control" name="idFour" required="">
                                <option selected="" disabled="" value="">Sélectionner produit ! </option>          
                                <?php 
                                    $select_id = $bd->query('SELECT * FROM four');
                                    while($selec_id = $select_id->fetch()){
                                ?>
                                <option value=" <?php echo $selec_id['idFour']  ?>">
                                <?php echo $selec_id['nomFour'];  ?>
                                </option>
                                 <?php  }  ?>

                        </select><br>
                       
		           		<input type="text" name="qnteApprovDiv" id="qte" class="form-control" placeholder="Quantité entrée" required="" autocomplete="off"><br>
		           		<div class="input-group mb-4">	           			
		           			<input type="text" name="puApprovDiv" id="pu" class="form-control" placeholder="Prix unitaire" required="" autocomplete="off">
		           			<div class="input-group-append">
		           				<span class="input-group-text fa fa-usd" id="basic-addon2"></span>
		           			</div>
		           		</div>
		           		<div class="input-group mb-4">	           			
		           			<input type="text" name="accompte" id="acc" class="form-control" placeholder="Accompte" required="" autocomplete="off">
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
		          <h3 class="title">AJOUTER DIVERS</span></h3>
		          	<?php 
		          		if (isset($_POST['save'])) {
							  $a=$_POST['qnteApprovDiv'];
							  $b=$_POST['puApprovDiv'];
							  $d=$_POST['idDiv'];
							  $four=$_POST['idFour'];
							  $accompte=$_POST['accompte'];
							  $e = $a*$b;

							  $req=$bd->prepare('SELECT * FROM diverscuisine WHERE idDivCuis=?');
							  $req->execute(array($d));
							  $don=$req->fetch(PDO::FETCH_ASSOC);
							  $qte = $don['qteDivCuis'];
							  $design = $don['designDivCuis'];
							  $qte+=$a;
							  
							  $req=$bd->prepare('UPDATE diverscuisine SET qteDivCuis=?,prixDivCuis=? WHERE idDivCuis=?');
							  $req->execute(array($qte,$b,$d));

							  $reste= $e-$accompte;
                              $modeP=(($reste===0)?'Cash':'Crédit');
                              $diff='SD';

							  $req=$bd->prepare('INSERT INTO approvcuisine(idDivCuis,qteSortie,puApprovDiv,ptApprovDiv,accompte,modepaie,reste,idFour) VALUES(?,?,?,?,?,?,?,?)');
							  
							 if ($req->execute(array($d,$a,$b,$e,$accompte,$modeP,$reste,$four))) {

							 $req=$bd->query("SELECT idApprovCuis FROM approvcuisine ORDER BY idApprovCuis  DESC LIMIT 1");
	 						 $don = $req->fetch(PDO::FETCH_ASSOC);
							 $id=$don['idApprovCuis'];

							if($reste>0){

							$detteFour =$bd->prepare('INSERT INTO dettefour(designProd,	qteDette,puDette,ptDette,modePaieDette,	idOperation,	diffIndex,accompte,reste,idFour)VALUES(?,?,?,?,?,?,?,?,?,?)');
					        
							$detteFour->execute(array($design,$a,$b,$e,$modeP,$id,$diff,$accompte,$reste,$four));

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
		          
		           <form action="" method="POST" class="spacer was-validated" >
		           		<select id="select" class="form-control" name="idDiv" required="">
                                <option selected="" disabled="" value="">Sélectionner produit ! </option>          
                                <?php 
                                    $select_id = $bd->query('SELECT * FROM diverscuisine');
                                    while($selec_id = $select_id->fetch()){
                                ?>
                                <option value=" <?php echo $selec_id['idDivCuis']  ?>">
                                <?php echo $selec_id['designDivCuis'];  ?>
                                </option>
                                 <?php  }  ?>

                        </select><br>
                        <select id="select" class="form-control" name="idFour" required="">
                                <option selected="" disabled="" value="">Sélectionner le fournisseur ! </option>          
                                <?php 
                                    $select_id = $bd->query('SELECT * FROM four');
                                    while($selec_id = $select_id->fetch()){
                                ?>
                                <option value=" <?php echo $selec_id['idFour']  ?>">
                                <?php echo $selec_id['nomFour'];  ?>
                                </option>
                                 <?php  }  ?>

                        </select><br>
                       
		           		<input type="text" name="qnteApprovDiv" class="form-control" placeholder="Quantité entrée" required="" autocomplete="off"><br>
		           		<div class="input-group mb-4">	           			
		           			<input type="text" name="puApprovDiv" class="form-control" placeholder="Prix unitaire achat" required="" autocomplete="off">
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
	          <h3 class="title">LISTE DES ENTREES</span></h3>
	          <div class="row spacer">
	          	 <div class="col-12">
	 				<table id="tab" class="display table table-bordered table-striped table">
		          	<thead>
		          		<tr style="font-weight:bold" class="btn-danger">
		          			<th>N°</th>  
                            <th>Produit</th>  
                            <th>Date</th>  
                            <th>Qte entrée</th>  
                            <th>PU</th>  
                            <th>PT</th>
                            <th>Accompte</th>
                            <th>Nom Fournisseur</th>  
		          			<td>Action</td>
		          		</tr>
		          	</thead>
		          	<tbody>
		          		<?php
		          			$limit=10;
							$page = isset($_GET['page'])?$_GET['page']:1;
							$start = ($page-1)*$limit;

							$req = $bd->query("SELECT date_format(A.dateSortie,'%e-%m-%Y à %T') as dateSortie,A.idApprovCuis,A.qteSortie,A.puApprovDiv,A.ptApprovDiv,B.designDivCuis,A.accompte,C.nomFour FROM approvcuisine as A ,diverscuisine as B, four as C WHERE  B.idDivCuis=A.idDivCuis AND C.idFour=A.idFour ORDER BY A.idApprovCuis DESC LIMIT  $start,$limit");
							
							$res = $bd->query("SELECT COUNT(*) as total FROM approvcuisine as A ,diverscuisine as B, four as C WHERE  B.idDivCuis=A.idDivCuis AND C.idFour=A.idFour");

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
                                <td><?php echo $don['idApprovCuis'] ?></td>
                                <td><?php echo $don['designDivCuis'] ?></td>
                                <td><?php echo $don['dateSortie'] ?></td>
                                <td><?php echo $don['qteSortie'] ?></td>
                                <td><?php echo $don['puApprovDiv'] ?></td>
                                <td><?php echo $don['ptApprovDiv'] ?></td>
                                <td><?php echo $don['accompte'] ?></td>
                                <td><?php echo $don['nomFour'] ?></td>
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
	          	 <div class="col-6 offset-6">
	          	 	<nav aria-label="Page navigation example">
	          			<ul class="pagination pg-blue">
			    		<li class="page-item">
			    			<a  class="page-link" aria-label="Previous" href="approvDivCuis.php?page=<?php echo $prec;?>">
			    				<span aria-hidden="true">&laquo;</span>
			    				<span class="sr-only" ="true">Previous</span>
			    			</a>
			    		</li>
			    		<?php 
			    			for($i=1;$i<=$nbrePage;$i++) {
			    		?> 
			    		<li class="page-item <?php echo(($page==$i)?'active':'')?>"><a  class="page-link" href="approvDivCuis.php?page=<?php echo $i;?>"><?php echo $i;?></a></li>
			    		<?php
			    		}?>
			    		<li class="page-item">
			    			<a  class="page-link" aria-label="Next" href="approvDivCuis.php?page=<?php echo $suiv;?>">
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
		  		$('#acc').val(data[6]);
		  		$('#select1').val(data[6]);
		  	});
		});
	</script>
</body>
</html>