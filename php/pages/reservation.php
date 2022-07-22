<?php 
	require_once ('../security_recept.php'); 
	require_once('bd_cnx.php');
	if (isset($_GET['client']) AND isset($_GET['chambre']) ) {
		$search=$bd->prepare('SELECT * FROM client AS A INNER JOIN organisation AS B ON B.idOrg=A.idOrg WHERE A.id_client=?');
		$search->execute(array($_GET['client']));
		$found = $search->fetch(PDO::FETCH_ASSOC);

		$search1=$bd->prepare('SELECT * FROM rooms as A INNER JOIN catChambre AS C ON C.idCatCh=.A.idCatCh WHERE A.id_room=?');
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
				<h3>NOUVELLE FICHE DE RESERVATION N°
					<?php 
							$req=$bd->query('SELECT count(id_booking) as total FROM booking');
							$don=$req->fetch(PDO::FETCH_ASSOC);
							$num=$don['total']+1;
							echo $num;
					 ?>
				</h3>
				
			</div>
			<div class="col-md-3 offset-1">
				<a href="listReserv.php"><button class="btn btn-danger btn-lg pull-right" type="button"><span class="fa fa-list"></span> Liste réservation</button></a>
			</div>
		</div><br>
		<div class="row">
			<div class="col-md-12 col-sm-12 col-lg-12 col-xl-12 text-center">
				<?php
		          		if (isset($_POST['save'])) {
							$book_date = date('Y-m-d');  
					        $client = $_POST['idClient'];
					        $numRoom = $_POST['roomNumber'];
					        $date_in = $_POST['datein_'];
					        $date_out = $_POST['dateout_'];
					        $enf = $_POST['nbreEnft'];
					        $adult = $_POST['nbreAdulte'];
					        $red = $_POST['reduction'];
					        $type = $_POST['typePaie'];


					        $chambreOccup = $bd->prepare("SELECT * FROM booking AS A INNER JOIN rooms AS B ON B.id_room = A.num_chambre WHERE B.id_room =? AND A.date_in = ? AND A.date_out=? AND A.date_in BETWEEN ? AND 
					        ? AND A.date_out BETWEEN ? AND ? ");
					            $chambreOccup->execute(array($numRoom,$date_in,$date_out,$date_in,$date_out,$date_in,$date_out));
					            $chambreTrouv = $chambreOccup->fetch(PDO::FETCH_ASSOC);
					        
					        $accompte = $_POST['accompteBooking'];
					        
					            $nj= (strtotime($date_out) - strtotime($date_in));
					        
					        $nbrjour = number_format($nj/86400 ,0);
					        
					            $pu_room = $bd->prepare('SELECT room_prix FROM rooms WHERE id_room =? ');
					            $pu_room->execute(array($numRoom));
					            $p_u = $pu_room->fetch(PDO::FETCH_ASSOC);
					            $prix_room=$p_u['room_prix'];
					        
					        $PT =  ($prix_room * $nbrjour)-($red*$nbrjour);
					        
					        $reste = $PT - $accompte;
					        $statut = 'Encours';
					        $statut_usage = 'Hors usage';
					        $roomExist = $bd->prepare('SELECT * FROM rooms WHERE id_room =?  AND statut = ?');
					        $roomExist->execute(array($numRoom,$statut_usage));

					        if ($chambreTrouv) { ?>
					        	<div class="alert alert-danger alert-dismissible" id="msg" role="alert">
									<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
									<h5>La Chambre est Occupée en cette date</h5>
								</div>
					        <?php }else if ($exist = $roomExist->fetch()) { ?>
					            <div class="alert alert-danger alert-dismissible" id="msg" role="alert">
									<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
									<h5>Cette chambre est hors usage</h5>
								</div>
					       <?php }else if ($date_in < $book_date || $date_out < $book_date || $date_out <= $date_in) { ?>
					            <div class="alert alert-danger alert-dismissible" id="msg" role="alert">
									<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
									<h5>La date est incorrecte</h5>
								</div>
					       <?php }else{
					       	$modePaie=(($reste==0)?'Cash':'Crédit');
					        $add = $bd->prepare('INSERT INTO booking (id_client, num_chambre, date_in, date_out, nombre_jour, total_apayer,accompte,reste_apayer,statut_booking,nbre_enf,nbre_adult,reduction,modePaie) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)');
					        $add->execute(array($client,$numRoom,$date_in,$date_out,$nbrjour,$PT,$accompte,$reste,$statut,$enf,$adult,$red,$modePaie));

					        $req=$bd->query("SELECT id_booking FROM booking ORDER BY id_booking  DESC LIMIT 1");
					        $don = $req->fetch(PDO::FETCH_ASSOC);
					        $idBook=$don['id_booking'];

					        $add2 = $bd->prepare('INSERT INTO booking_historique(id_booking,id_client, num_chambre, date_in, date_out, nombre_jour, total_apayer,accompte,reste_apayer,statut_booking,nbre_enf,nbre_adult,reduction,modePaie) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?)');
					        
					        $add2->execute(array($idBook,$client,$numRoom,$date_in,$date_out,$nbrjour,$PT,$accompte,$reste,$statut,$enf,$adult,$red,$modePaie));
					        $design='Logement'.' ('.$date_in.' '.$date_out.')';

					        $diff='BO';
					        $etatFact=(($modePaie=='Cash')?'close':'wait');
					        $facturation =$bd->prepare('INSERT INTO facturation(designActivite,qteFact,puFact,ptFact,modePaieFact,idOperation,diffIndex,accompte,reste,id_client,type,montantPaye,etatFact)VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?)');
					        
					        $facturation->execute(array($design,$nbrjour,$prix_room,$PT,$modePaie,$idBook,$diff,$accompte,$reste,$client,$type,$accompte,$etatFact));
					        if ($add) { ?>
					        	<div class="alert alert-success alert-dismissible" id="msg" role="alert">
									<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
									<h5>Réservation ajoutée</h5>
								</div>
					        <?php }else { ?>
					        	<div class="alert alert-danger alert-dismissible" id="msg" role="alert">
									<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
									<h5>Réservation non ajoutée</h5>
								</div>
					       <?php }
					                
					        }
						}							
		           ?>
			</div>
		</div>
			<div class="row">
				<div class="col-md-6">
					<form action=""method="GET" id="formChambre" class="was-validated">
						<div class="input-group">
							<div class="input-group-append">
								<span class="input-group-text">Sélectionnez un client</span>
							</div>
							<select id="client" class="form-control btn-lg" name="client" required="">
								<option value="" disabled="" selected=""> Sélectionnez un client</option>
	                                <?php
	                                	if (isset($_GET['client'])) {
	                                		$id=$_GET['client'];
	                                	 	$select_id = $bd->query("SELECT * FROM client WHERE id_client='$id' ORDER BY id_client DESC ");
	                                	 	$don=$select_id->fetch(PDO::FETCH_ASSOC);
	                                	 	?>
			                                <option value=" <?php echo $don['id_client']  ?>">
			                                     <?php echo $don['nom_client'];  ?>
			                                </option>
			                                <?php
	                                	 } 
	                                	$select_id = $bd->query('SELECT * FROM client ORDER BY id_client DESC');
	                                while($selec_id = $select_id->fetch()){
	                                   ?>
	                                <option value=" <?php echo $selec_id['id_client']  ?>">
	                                     <?php echo $selec_id['nom_client'];  ?>
	                                </option>
	                                <?php  }  ?>
							</select>
						</div><br>
						<select id="chambre" class="form-control btn-lg" name="chambre" required="">
                            <option value="" disabled="" selected="">Chambre </option>
                            <?php 
                            	
                                $select_id = $bd->query("SELECT * FROM rooms AS A INNER JOIN catChambre AS B ON B.idCatCh=A.idCatCh");
                                while($selec_id = $select_id->fetch()){ ?>
                            <option value=" <?php echo $selec_id['id_room'];  ?>">
                            <?php echo $selec_id['designCatCh'].' PU :  '.$selec_id['room_prix'].'$'.' N°'.$selec_id['room_code'];  ?>
                            </option>
                            <?php  }  ?>
                        </select><br>
					</form>
                    <form action="" method="POST" class="was-validated">
                        <input id="text" type="hidden" value="<?php echo(isset($found['id_client'])?$found['id_client']:'') ?>" class="form-control btn-lg" name="idClient" >
						<input id="text" type="hidden" value="<?php echo(isset($found1['id_room'])?$found1['id_room']:'') ?>" class="form-control btn-lg" name="roomNumber" >                                       
	                        
	                    <div class="input-group">
	                        <div class="input-group-append">
	                        	<span class="input-group-text">Date In</span>
	                        </div>
	                        <input id="text" type="date" required="" class="form-control btn-lg" name="datein_">
	                        <div class="input-group-append">
	                        	<span class="input-group-text">Date Out</span>
	                        </div>
	                        <input id="text" type="date" required="" class="form-control btn-lg" name="dateout_" >
	                    </div><br>
	                        <div class="input-group">
	                        	<div class="input-group-append">
	                        		 <span class="input-group-text">Nbre</span>
	                        	</div>
	                        	<select name="nbreAdulte" id="" class="form-control btn-lg" required="">
	                        		<option selected="" disabled="" value="">Adulte</option>
	                        		<option value="0">0</option>
	                        		<option value="1">1</option>
	                        		<option value="2">2</option>
	                        		<option value="3">3</option>
	                        		<option value="4">4</option>
	                        		<option value="5">5</option>
	                        	</select>
	                        	<select name="nbreEnft" id="" class="form-control btn-lg" required="">
	                        		<option selected="" disabled="" value="">Enfant</option>
	                        		<option value="0">0</option>
	                        		<option value="1">1</option>
	                        		<option value="2">2</option>
	                        		<option value="3">3</option>
	                        		<option value="4">4</option>
	                        		<option value="5">5</option>
	                        	</select>
	                        </div><br>
	                    <div class="input-group">
	                        <input id="text" type="number" required="" placeholder="Accompte" class="form-control btn-lg" name="accompteBooking" >
	                      	<div class="input-group-append">
			           			<span class="input-group-text fa fa-usd" id="basic-addon2"></span>
			           		</div>
	                    	<input id="text" type="number" required="" placeholder="Réduction" class="form-control btn-lg" name="reduction" >
		                    <div class="input-group-append">
				           		<span class="input-group-text fa fa-usd" id="basic-addon2"></span>
				           	</div>
	                    </div><br>
	                    <select name="typePaie" id="" class="form-control btn-lg" required="">
                            <option selected="" disabled="" value="">Sélectionner un mode de paiement</option>
                            <option value="Mobile money">Mobile money</option>
                            <option value="Chèque">Chèque</option>
                            <option value="Carte bancaire">Carte bancaire</option>
                            <option value="Espèces">Espèces</option>
                            <option value="Crédit">Crédit</option>
                        </select><br>
	                    <button type="submit" class="btn btn-danger btn-block btn-lg" name="save">Enregistrer</button>
                    </form>  
				</div>
				<div class="col-md-6">
					<div class="input-group">
						<div class="input-group-append">
							<span class="input-group-text" id="basic-addon2">Nom client</span>
						</div>
						<input type="text" disabled="" value="<?php echo(isset($found['nom_client'])?$found['nom_client']:'') ?>" class="form-control btn-lg" required="" autocomplete="off">
					</div><br>
					<div class="input-group">
						<div class="input-group-append">
							<span class="input-group-text" id="basic-addon2">Téléphone</span>
						</div>
						<input type="text" disabled="" value="<?php echo(isset($found['telClient'])?$found['telClient']:'') ?>" class="form-control btn-lg" required="" autocomplete="off">
					</div><br>
					<div class="input-group mb-4">	           			
							<div class="input-group-append">
		           				<span class="input-group-text" id="basic-addon2">Email</span>
		           			</div>
		           		<input type="text" disabled="" value="<?php echo(isset($found['email'])?$found['email']:'') ?>" class="form-control btn-lg" required="" autocomplete="off"><br>
		           	</div>
		           	<div class="input-group mb-4">	           			
							<div class="input-group-append">
		           				<span class="input-group-text" id="basic-addon2">Organisation</span>
		           			</div>
		           		<input type="text" disabled="" value="<?php echo(isset($found['nomOrg'])?$found['nomOrg']:'') ?>" class="form-control btn-lg" required="" autocomplete="off"><br>
		           	</div>
		           	<div class="input-group mb-4">	           			
							<div class="input-group-append">
		           				<span class="input-group-text" id="basic-addon2">Désignation chambre</span>
		           			</div>
		           		<input type="text" disabled="" value="<?php echo(isset($found1['designCatCh'])?$found1['designCatCh']:'') ?>" class="form-control btn-lg" required="" autocomplete="off"><br>
		           	</div>
		           	<div class="input-group mb-4">	           			
							<div class="input-group-append">
		           				<span class="input-group-text" id="basic-addon2">Prix chambre</span>
		           			</div>
		           			<input type="text" disabled="" value="<?php echo(isset($found1['room_prix'])?$found1['room_prix']:'') ?>" class="form-control btn-lg text-right" required="" autocomplete="off">
		           			<div class="input-group-append">
		           				<span class="input-group-text fa fa-usd" id="basic-addon2"></span>
		           			</div>
		           			
		           	</div>
		           	<div class="input-group">
		           		<div class="input-group-append">
		           				<span class="input-group-text" id="basic-addon2">N° chambre</span>
		           			</div>
		           			<input type="text" disabled="" value="<?php echo(isset($found1['room_code'])?$found1['room_code']:'') ?>" class="form-control btn-lg" required="" autocomplete="off"><br>
		           	</div>   	
				</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				
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