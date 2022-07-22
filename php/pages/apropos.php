<?php 
	//require_once ('../security_eco.php');
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
	*{
		font-family:century gothic;
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
	.propos{
		width:15%;
		height:25%;
		transition: 8s ease;
	}
	.propos:hover{
		width:15%;
		height:25%;
		transform:scale(2.5);
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
		<!--================================CONTENU ========================================== -->

	<div class="container-fluid spacer">
		<div >
		<div class="modal-dialog modal-xl" role="document">
			<div class="modal-content ">
				<div class="modal-header bg-primary">
					<h4 class="modal-title text-center text-white" id="exampleModalLabel">APROPOS</h4>
					<button type="button" class="close text-white" data-dismiss="modal" aria-label="close">
						<span aria-hidden="false">&times;</span>
					</button>
						
				</div>
				<div class="modal-body bg-light">
					<div class="row">
						<div class="col-md-4">
							<img src="fichiers/apropos/STC.jpg" style="width:100%; height: 92%" class="float-right">
						</div>
						<div class="col-md-8 ">
							<h3 style=" color: blue"><strong>Hotel Management System Version 1.0</strong></h3><br>
							<h5><strong>Développé par</strong> </h5>
							<ul style=" font-size: 16px; list-style:none">
								<li><strong><img src="fichiers/apropos/nas.jpg" alt="" class="img rounded-circle d-inline propos" style="height:100px;"> Ir. Omar NASIBU :</strong> Chef de projet <br>
									<blockquote class="text-justify">Analyste programmeur et logisticien, bilingue (français, anglais), possédant une d’expérience dans le domaine des hautes technologies (recherche et développement). Aptitudes démontrées à travailler au sein d’équipes multidisciplinaires œuvrant dans un contexte national et international. Dévoué et passionné d’informatiques, aime relever de nouveaux défis.</blockquote>
								</li>
							</ul>
						</div>
					</div><br>
					<div class="row">
						 <div class="col-md">
						 	<ul style="list-style:none">
						 		<li><strong><img src="fichiers/apropos/placide.jpg" alt="" class="img rounded-circle d-inline propos" style="height:100px; margin-right: 10px: "> Ir. Placide LUPETE :</strong> Analyste – Développeur <br>
						 			<blockquote class="text-justify">Passionné des nouvelles technologies ; Développement des applications Android avec Android Studio, Développement des applications Web, Bloggeur, youtubeur, contributeur de Google Map</blockquote>
						 		</li>
						 		<li><strong><img src="fichiers/apropos/alpha.jpg" alt="" class="img rounded-circle d-inline propos" style="height:100px">Ir. Alpha CIMUSA :</strong> Design – Développeur</li>
						 	</ul>
						 </div>
						 <div class="col-md">
						 	<ul style="list-style:none">
						 		<li><strong><img src="fichiers/apropos/jm.png" alt="" class="img rounded-circle d-inline propos" style="height:100px; width:100px"> Ir. Josaphat MURHABAZI :</strong> Analyste – Développeur <br>
						 			<blockquote class="text-justify">Apte dans l'analyse, la modélisation et le développement des applications web <strong><em>(web development)</em></strong> et doté d'un bon sens d'écoute, communication et d'esprit d'équipe.</blockquote>

						 		</li>
								<li><strong><img src="fichiers/apropos/chris.png" alt="" class="img rounded-circle d-inline propos" style="height:100px"> Ir. Christian CIBULI :</strong> Analyste – Développeur<br>
						 			<blockquote class="text-justify"> Aptitude dans l'analyse et un developpeur web  <strong><em>(web development)</em></strong>, ayant bon sens de communication</blockquote> </li>
						 	</ul>
						 </div>
					</div>
				</div>
				<div class="modal-footer">
					<div class="row">
						<div class="col-md-12">
							<p class="text-justify" style="font-size: 20px">
								<strong>Attention :</strong> Veuillez ne pas distribuer ce programme informatique sans l'autorisation de son propriétaire. La reproduction ou la distribution non autorisée de ce programme, ou toute partie de celle-ci, peut entraîner des sanctions civiles et pénales sévères, et sera poursuivi dans toute la mesure du possible en vertu de la loi.
							</p>
						</div>
					</div>
				</div>
								
			</div>
		</div>			
	</div>
	</div>
	

	<script src="bootstrap/js/popper.min.js"></script>
	<script src="bootstrap/js/jquery-3.4.1.min.js"></script>
	<script src="bootstrap/js/bootstrap.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function() {
			$('#editBtn').modal('show');
			$('.editBtn').on('click', function(){

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
		});
	</script>
</body>
</html>