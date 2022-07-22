<?php 
	require_once ('../security_recept.php'); 
	require_once('bd_cnx.php');
	if (isset($_GET['client']) AND isset($_GET['chambre']) ) {
		$search=$bd->prepare('SELECT * FROM client AS A INNER JOIN organisation AS B ON B.idOrg=B.idOrg WHERE id_client=?');
		$search->execute(array($_GET['client']));
		$found = $search->fetch(PDO::FETCH_ASSOC);

		$search1=$bd->prepare('SELECT * FROM rooms WHERE id_room=?');
		$search1->execute(array($_GET['chambre']));
		$found1 = $search1->fetch(PDO::FETCH_ASSOC);
	}
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
					<h4 class="modal-title" id="exampleModalLabel">MODIFICATION IDENTITE CLIENT</h4>
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

		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<marquee behavior="alternate" >
                        <h1 id="h1_bbh_title" style="font-size: 60px; font-family: century gothic; font-weight: bold; margin-top: 2px; margin-left: 10px; color: #b90112; padding-top: 3px;text-shadow: 8px 8px 2px white; text-shadow: 0 0 10px white, 0 0 10px white,0 0 10px white;">Bahari Beach Hotel</h1></marquee>
			<ul class="navbar-nav ml-auto">
				<li class="nav-item active">
					<a class="nav-link" href="../ac_sess/ac_rec.php"><button type="button" class="btn btn-outline-light connexion"><h3>Retour</h3></button><span class="sr-only">(current)</span></a>
				</li>
			</ul>
			
		</div>
	</nav>

		<!--================================CONTENU ========================================== -->

	<div class="container spacer">
		<div class="row">

			<div class="col-md-8">
				<h3>NOUVELLE FICHE DE LOCATION SALLE N°
					<?php 
							$req=$bd->query('SELECT count(idLoc) as total FROM location');
							$don=$req->fetch(PDO::FETCH_ASSOC);
							$num=$don['total']+1;
							echo $num;
					 ?>
				</h3>
				
			</div>
			<div class="col-md-3 offset-1">
				<a href="listLocation.php"><button class="btn btn-danger btn-lg pull-right" type="button"><span class="fa fa-list"></span> Liste location salle</button></a>
			</div>
		</div><br>
		<div class="row">
			<div class="col-md-12 col-sm-12 col-lg-12 col-xl-12 text-center">
				<?php
		          		if (isset($_POST['save'])) {
		          			$dateJour = date('Y-m-d');
					        $org = $_POST['organisation'];
					        $salle = $_POST['salle'];
					        $accompte = $_POST['accompte'];
					        $dateDebut = $_POST['dateDebut'];
					        $dateFin = $_POST['dateFin'];
					        $typeLoc = $_POST['typeLoc'];
					        $nbPersonne = $_POST['nbPersonne'];
					        $reduction = $_POST['reduction'];
					        $typePaie = $_POST['typePaie'];
					        					        
					        $salleExist = $bd->prepare('SELECT * FROM location WHERE dateDebut =? || dateDebut = ? || dateFin = ? || dateFin = ? || dateDebut BETWEEN ? AND ? || dateFin BETWEEN ? AND ? AND idSalle = ? ');
					            $salleExist->execute(array($dateDebut,$dateFin,$dateDebut,$dateFin,$dateDebut,$dateFin,$dateDebut,$dateFin,$salle));
					            $salleTrouv = $salleExist->fetch(PDO::FETCH_ASSOC);

					        $nj= (strtotime($dateFin) - strtotime($dateDebut));
					        
					        $nbrjour = number_format($nj/86400 ,0);
					        if ($nbrjour <= 0) {
					        	$nbrjour = 1;
					        }else{
					        	$nbrjour = $nbrjour;
					        }
					        
					            $puSalle = $bd->prepare('SELECT prixSalle FROM salle WHERE idSalle =? ');
					            $puSalle->execute(array($salle));
					            $p_u = $puSalle->fetch(PDO::FETCH_ASSOC);
					        
					        $PT =  ($p_u['prixSalle'] * $nbrjour)-$reduction;
					        $reste= $PT-$accompte;
                             if ($reste==0) {
                             	     $modepaie='Cash';
                             }else if ($reste>0){  $modepaie='Credit';  }

					        if ($salleTrouv) { ?>
					        	<div class="alert alert-danger alert-dismissible" id="msg" role="alert">
									<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
									<h5>La Salle est Occupée en cette date</h5>
								</div>
					        <?php }else if ($dateDebut < $dateJour || $dateFin < $dateJour || $dateFin < $dateDebut) { ?>
					            <div class="alert alert-danger alert-dismissible" id="msg" role="alert">
									<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
									<h5>La date est incorrecte</h5>
								</div>
					       <?php }else{
					        $add = $bd->prepare('INSERT INTO location (idOrg,accompte,reste,idSalle,typeLoc, nbreJour,dateDebut,dateFin,nbrePersonne,reduction,ptLoc,modepaie,type) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)');
					  
					        $add->execute(array($org,$accompte,$reste,$salle,$typeLoc,$nbrjour,$dateDebut,$dateFin,$nbPersonne,$reduction,$PT,$modepaie,$typePaie));
					        if ($add) { ?>
					        	<div class="alert alert-success alert-dismissible" id="msg" role="alert">
									<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
									<h5>Location Ajoutée</h5>
								</div>
					        <?php }else{ ?>
					        		<div class="alert alert-danger alert-dismissible" id="msg" role="alert">
									<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
									<h5>Location Non Ajoutée</h5>
								</div>
					        <?php }

					        }
					                
						}							
		           ?>
			</div>
		</div>
			<div class="row">
				<form action="" method="POST" id="formChambre" class="was-validated">
					<div class="row">
						<div class="col-md-6">
							<select id="organisation" class="form-control btn-lg" required="" name="organisation">
								<option value="" disabled="" selected="">Choisir une organisation </option>
	                                <?php 
	                                	$select_id = $bd->query('SELECT * FROM organisation');
	                                while($selec_id = $select_id->fetch()){
	                                   ?>
	                                <option value=" <?php echo $selec_id['idOrg']  ?>">
	                                     <?php echo $selec_id['nomOrg'];  ?>
	                                </option>
	                                <?php  }  ?>
							</select><br>
							<select id="salle" class="form-control btn-lg" name="salle" required="">
	                            <option value="">Choisir une Salle </option>
	                            <?php 
	                            	
	                                $select_id = $bd->query("SELECT * FROM salle ");
	                                while($selec_id = $select_id->fetch()){ ?>
	                            <option value=" <?php echo $selec_id['idSalle'];  ?>">
	                            <?php echo $selec_id['nomSalle'];  ?>
	                            </option>
	                            <?php  }  ?>
	                        </select><br>
	                        <div class="input-group">
							<select id="typeLoc" class="form-control btn-lg" name="typeLoc" required="">
								
	                            <option value="">Type de location </option>
	                            <option value="Conference">Conférence </option>
	                            <option value="Atelier">Atelier </option>
	                        </select><br>
	                         <select name="typePaie" id="" class="form-control btn-lg" required="">
                                        <option selected="" disabled="" value="">Paiement</option>
                                        <option value="Mobile money">Mobile money</option>
                                        <option value="Chèque">Chèque</option>
                                        <option value="Carte bancaire">Carte bancaire</option>
                                        <option value="Espèces">Espèces</option>
                                        <option value="Crédit">Crédit</option>
                                    </select>
                              </div> <br>

	                        <input id="text" type="number" placeholder="Nombre des personnes" class="form-control btn-lg" name="nbPersonne" required="" > <br>
						</div>
						<div class="col-md-6">                        
	                        <div class="input-group">
	                        	<input id="text" type="number" placeholder="Reduction" class="form-control btn-lg" name="reduction" required=""> <br>
	                        	<input id="text" type="number" placeholder="Accompte" class="form-control btn-lg" name="accompte" required="">
	                        </div><br>
	                        <div class="input-group">
		                        <div class="input-group-append">
		                        	<span class="input-group-text">Date Debut</span>
		                        </div>
		                        <input id="text" type="date" class="form-control btn-lg" name="dateDebut"required="">
		                    </div><br>
	                        <div class="input-group">
		                        
		                        <div class="input-group-append">
		                        	<span class="input-group-text">Date Fin</span>
		                        </div>
		                        <input id="text" type="date" class="form-control btn-lg" name="dateFin" required="">
		                    </div><br>	
		                    <button type="submit" class="btn btn-danger btn-block btn-lg" name="save" required="">Enregistrer</button>
						</div>
					</div>
				
			</form>
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
		  		$('#lib').val(data[1]);
		  		$('#pu').val(data[2]);
		  		$('#pu1').val(data[5]);
		  		$('#pu2').val(data[3]);
		  	});
		  	$('#chambre').on('change',function(){
		  		$('#formChambre').submit();
		  	})
		});
	</script>
</body>
</html>