<?php 
	require_once ('../security_brmn.php'); 
	require_once('bd_cnx.php');
	$idPv=isset($_SESSION['profil']['agent5'])?$_SESSION['profil']['agent5']['idPv']:'';
	$point=isset($_SESSION['profil']['agent5'])?$_SESSION['profil']['agent5']['libPv']:'';
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
					<h4 class="modal-title" id="exampleModalLabel">ANNULER TRANSFER</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="close">
						<span aria-hidden="true">&times;</span>
					</button>
						
				</div>
				<form action="upTransfert.php" method="POST" class="was-validated">
					<div class="modal-body">
						<input type="hidden" name="id" id="id" required="" autocomplete="off">
		           		<h5 class="text-center">Voulez-vous vraiment annuler ce transfert ?</h5>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-outline-secondary btn-block" data-dismiss="modal">Annuler</button>
						<button type="submit" class="btn btn-danger btn-block">Confirmer</button>
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
		          			$a=$_POST['qnte'];
		          			$b=$_POST['pdv'];
		          			$emetteur=isset($_SESSION['profil']['agent5'])?$_SESSION['profil']['agent5']['libPv']:'';
							$d=$_POST['idBoiss'];

							$req=$bd->query("SELECT * FROM stockpv WHERE idPv='$idPv' AND idStock='$d'");
							$don=$req->fetch(PDO::FETCH_ASSOC);

							$qtStock=$don['qtStock'];
							$idBoiss=$don['idBoiss'];

							if ($a<$qtStock) {
								$req1=$bd->prepare("SELECT * FROM stockpv WHERE idPv=? AND idBoiss=?");
					            $req1->execute(array($b,$idBoiss));
					            if ($don1=$req1->fetch(PDO::FETCH_ASSOC)) {
					            	$qte=$don1['qtStock']+$a;
					            	$req = $bd->prepare('INSERT INTO transfert(qte,idPv,emetteur,
					            	idstock) VALUES (?,?,?,?)');
					            	$req->execute(array($a,$b,$emetteur,$idBoiss));
						            if ($req) {
						            	$qtStock-=$a;
						            	$req=$bd->prepare("UPDATE stockpv SET qtStock=? WHERE idPv=? AND idBoiss=?");
						            	$req->execute(array($qtStock,$idPv,$idBoiss));

						            		
						            	$res=$bd->prepare("UPDATE stockpv SET qtStock=? WHERE idPv=? AND idBoiss=?");
						            	$res->execute(array($qte,$b,$idBoiss));	 
						            	?>
						                    <div class="alert alert-success alert-dismissible" id="msg" role="alert">
											<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
											<h5>Transfert effectué</h5>
										</div>
						               <?php
						            } 
						        }else{
						        	?>
					                <div class="alert alert-danger alert-dismissible" id="msg" role="alert">
										<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
										<h5>Produit pas disponible</h5>
									</div>
					                <?php

						        }
							}else{
								?>
					                <div class="alert alert-danger alert-dismissible" id="msg" role="alert">
										<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
										<h5>Quantité pas disponible</h5>
									</div>
					                <?php
							}
       
					    }
					     
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
		           			<input type="text" name="qnte" class="form-control" placeholder="Quantite bouteilles" required="" autocomplete="off"><br>
		           		</div>
		           		<select name="pdv" id="" class="form-control" required="">
		           			<option value="" selected="" disabled="">Choisir un point de vente</option>
		           			<?php 
                                $select_id = $bd->query('SELECT * FROM pointvente');
                                while($selec_id = $select_id->fetch()){
                                    ?>
                                <option value=" <?php echo $selec_id['idPv']  ?>">
                                     <?php echo $selec_id['libPv'];  ?>
                                </option>
                             <?php  }  ?>
		           		</select><br>
						<button type="submit" class="btn btn-danger btn-block" name="save">Transférer</button>
		           </form>
		    </div>
	      <div class="col-md-9">
	          <h3 class="title">LISTE DE TRANSFERTS EFFECTUES</span></h3>
	          <div class="row spacer">
	          	 <div class="col-12">
	 				<table id="tab" class="display table table-bordered table-striped table">
		          	<thead>
		          		<tr style="font-weight:bold" class="btn-danger">
                            <th>N°</th>  
                            <th>Récepteur</th>  
                            <th>Boisson</th>  
                            <th>Qté</th>
		          			<td>Action</td>
		          		</tr>
		          	</thead>
		          	<tbody>
		          		<?php
		          			$limit=8;
							$page = isset($_GET['page'])?$_GET['page']:1;
							$start = ($page-1)*$limit;



							$req = $bd->query("SET lc_time_names='fr_FR'");
							$req = $bd->query("SELECT * FROM transfert AS A,pointvente AS B,stockpv AS C, prodboiss AS D WHERE C.idPv=B.idPv AND D.idBoiss=C.idBoiss AND B.idPv=A.idPv AND D.idBoiss=A.idStock AND A.dateTrans LIKE '%$dateJ%' AND A.emetteur='$point' ORDER BY A.idTrans DESC LIMIT $start,$limit");
							
							$res = $bd->query("SELECT count(*) as total FROM transfert AS A,pointvente AS B,stockpv AS C, prodboiss AS D WHERE C.idPv=B.idPv AND D.idBoiss=C.idBoiss AND B.idPv=A.idPv AND D.idBoiss=A.idStock AND A.dateTrans LIKE '%$dateJ%' AND A.emetteur='$point'");


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
                                <td><?php echo $don['idTrans'] ?></td>
                                <td><?php echo $don['libPv'] ?></td>
                                <td><?php echo $don['designBoiss'] ?></td>
                                <td><?php echo $don['qte'] ?></td>
								<td>
									<button type="button" class="btn btn-danger editBtn"><span class="fa fa-trash"></span>
										
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
			    			<a  class="page-link" aria-label="Previous" href="transfert.php?page=<?php echo $prec;?>">
			    				<span aria-hidden="true">&laquo;</span>
			    				<span class="sr-only" ="true">Previous</span>
			    			</a>
			    		</li>
			    		<?php 
			    			for($i=1;$i<=$nbrePage;$i++) {
			    		?> 
			    		<li class="page-item <?php echo(($page==$i)?'active':'')?>"><a  class="page-link" href="transfert.php?page=<?php echo $i;?>"><?php echo $i;?></a></li>
			    		<?php
			    		}?>
			    		<li class="page-item">
			    			<a  class="page-link" aria-label="Next" href="transfert.php?page=<?php echo $suiv;?>">
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
		  	$('#liste-cat').change(function(){
                var val= $('#liste-cat').val();
                $.ajax({
                type:"POST",
                url:"get_boissPv.php",
                data:'idCat='+val,
                success:function(data){
                  $("#list_boisson").html(data);
                }
            	});
            });
		});
	</script>
</body>
</html>