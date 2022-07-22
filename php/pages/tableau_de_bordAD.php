<?php  
      require_once ('../bd_cnx.php'); 
      require_once ('../security_admin.php'); 

	$req = $bd->query("SET NAMES 'UTF8'");

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
	

	<header id="head" style="background-color: #b90112;"> 
            <div class="row"> 
                <div class="col-lg-2  col-md-2  col-sm-2  col-xs-3">
                    <p><img src="../../docs/img/bbh_logos11.png" alt="logo BBH" style=""></p><br>
                </div>

                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-7" id="div_lgos">
                    
                    <marquee behavior="alternate" >
                        <h1 id="h1_bbh_title" style="font-size: 60px; font-family: century gothic; font-weight: bold; margin-top: 2px; margin-left: 10px; color: #b90112; padding-top: 3px;text-shadow: 8px 8px 2px white; text-shadow: 0 0 10px white, 0 0 10px white,0 0 10px white;">Bahari Beach Hotel</h1></marquee>

                        <h2 class="text-white text-center" style="font-weight: bold; border: 2px solid white">TABLEAU DE BORD DE RESERVATIONS</h2> 
                </div>
                
                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2" >
                   <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 offset-6">
                        <center style="padding-top: 10px; margin-top: 1em;">
                             <a href="../admin.php" title="cliquer pour retourner à la page précédente !"><img src="../../docs/emoticones/exit%20circular.png" width="100%" alt="Front Office" > </a>
                        </center>
                    </div>

                </div>
            </div>
        </header>

        <style>
            h3{font-family: century gothic; color:white; font-weight: bold;}
        </style>

		<!--================================CONTENU ========================================== -->

	<div class="container-fluid spacer">
		<div class="row">   
	      <div class="col-md-12">
	      	<div class="row">
	      		<div class="col-md-12">
	      			<h3 class="text-center border border-primary bg-primary">
	      				CHAMBRE STANDARD DE LUXE
	      				<?php 
                            $count = $bd->query('SELECT  COUNT(*) AS nbre FROM rooms AS A LEFT JOIN booking AS B ON  A.id_room = B.num_chambre LEFT JOIN client AS C ON C.id_client = B.id_client WHERE idCatCh=1');
                                    $nbre=$count->fetch(PDO::FETCH_ASSOC);
                           ?>
                           	<span class="badge badge-danger badge-pill">
                           		<?php echo $nbre['nbre']; ?>
                           		</span>
                           
	      			</h3>
	      			
                    <div class="row">
                    	
                    	<?php 

                        	$req = $bd->query("SELECT  id_room, num_chambre, nom_client, date_format(B.date_in,'%d-%m-%Y') as date_in, date_format(B.date_out,'%d-%m-%Y') as date_out, A.statut as statut, room_code, motif, B.statut_booking FROM rooms AS A LEFT JOIN booking AS B ON  A.id_room = B.num_chambre LEFT JOIN client AS C ON C.id_client = B.id_client WHERE A.idCatCh=1");
                        	while ($don=$req->fetch(PDO::FETCH_ASSOC)) :
                        		?>
                        	<div class="col-md-2" style="margin-top:8px">
                        		<div class="card" data-toggle="tooltip" title="<?php echo $don['motif'];?>">

                        			<div class="card-header"
                        			
										
                        			>
                        				<h6 class="card-title text-center"><?php echo 'Chambre '.$don['room_code'];  ?></h6>
                        			</div>
                        			<div class="card-body">
                        				<?php
                        					if ($don['statut_booking'] === 'CheckIn') { ?>
                        						<p class="text-center card-title"><strong><?php  echo $don['nom_client']; ?></strong></p>
                        						<p class="card-text text-center" style="font-size:0.8em"> <?php  echo $don['date_in'].' - '.$don['date_out']; ?></p>
                        					<?php }
                        				 ?>
                        				
                        			</div>
                        			<div class="card-footer text-center <?php 
											if ($don['statut']==='Disponible') {
												echo 'bg-success';
											}elseif ($don['statut'] === 'Busy') {
												echo 'bg-info';
											}else{
												echo 'bg-warning';
											}

										 ?>
                        			">
                        				<strong><?php  echo $don['statut']; ?></strong>
                        			</div>
                        		</div>
                        	</div>
                        		<?php
                        	endwhile;
                    	?>
                    	
                    </div>
	      		</div>
	      	</div><br>
	      	<div class="row">
	      		<div class="col-md-12">
	      			<h3 class="text-center border border-primary bg-primary">
	      				CHAMBRE TWIN OU A DEUX LITS
	      				<?php 
                            $count = $bd->query('SELECT  COUNT(*) AS nbre FROM rooms AS A LEFT JOIN booking AS B ON  A.id_room = B.num_chambre LEFT JOIN client AS C ON C.id_client = B.id_client WHERE idCatCh=2');
                                    $nbre=$count->fetch(PDO::FETCH_ASSOC);
                           ?>
                           	<span class="badge badge-danger badge-pill">
                           		<?php echo $nbre['nbre']; ?>
                           		</span>
                           
	      			</h3>
	      			
                    <div class="row">
                    	
                    	<?php 
                        	$req = $bd->query('SELECT * FROM rooms AS A LEFT JOIN booking AS B ON  A.id_room = B.num_chambre LEFT JOIN client AS C ON C.id_client = B.id_client WHERE A.idCatCh=2');
                        	while ($don=$req->fetch(PDO::FETCH_ASSOC)) :
                        		?>
                        	<div class="col-md-2" style="margin-top:8px">
                        		<div class="card" data-toggle="tooltip" title="<?php echo $don['motif'];?>">

                        			<div class="card-header"
                        			
										
                        			>
                        				<h6 class="card-title text-center"><?php echo 'Chambre '.$don['room_code'];  ?></h6>
                        			</div>
                        			<div class="card-body">
                        				<?php
                        					if ($don['statut_booking'] === 'CheckIn') { ?>
                        						<p class="text-center card-title"><strong><?php  echo $don['nom_client']; ?></strong></p>
                        						<p class="card-text text-center" style="font-size:0.8em"> <?php  echo $don['date_in'].' - '.$don['date_out']; ?></p>
                        					<?php }
                        				 ?>
                        			</div>
                        			<div class="card-footer text-center <?php 
											if ($don['statut']==='Disponible') {
												echo 'bg-success';
											}elseif ($don['statut'] === 'Busy') {
												echo 'bg-info';
											}else{
												echo 'bg-warning';
											}

										 ?>
                        			">
                        				<strong><?php  echo $don['statut']; ?></strong>
                        			</div>
                        		</div>
                        	</div>
                        		<?php
                        	endwhile;
                    	?>
                    	
                    </div>
	      		</div>
	      	</div><br>
	      	<div class="row">
	      		<div class="col-md-12">
	      			<h3 class="text-center border border-primary bg-primary">
	      				SUITE SEMI PRESIDENTIELLE
	      				<?php 
                            $count = $bd->query('SELECT  COUNT(*) AS nbre FROM rooms LEFT JOIN booking ON rooms.id_room = booking.num_chambre WHERE idCatCh=3');
                                    $nbre=$count->fetch(PDO::FETCH_ASSOC);
                           ?>
                           	<span class="badge badge-danger badge-pill">
                           		<?php echo $nbre['nbre']; ?>
                           		</span>
                           
	      			</h3>
	      			
                    <div class="row">
                    	
                    	<?php 
                        	$req = $bd->query('SELECT  * FROM rooms AS A LEFT JOIN booking AS B ON  A.id_room = B.num_chambre LEFT JOIN client AS C ON C.id_client = B.id_client WHERE idCatCh=3');
                        	while ($don=$req->fetch(PDO::FETCH_ASSOC)) :
                        		?>
                        	<div class="col-md-2" style="margin-top:8px">
                        		<div class="card" data-toggle="tooltip" title="<?php echo $don['motif'];?>">

                        			<div class="card-header"
                        			
										
                        			>
                        				<h6 class="card-title text-center"><?php echo 'Chambre '.$don['room_code'];  ?></h6>
                        			</div>
                        			<div class="card-body">
                        				<?php
                        					if ($don['statut_booking'] === 'CheckIn') { ?>
                        						<p class="text-center card-title"><strong><?php  echo $don['nom_client']; ?></strong></p>
                        						<p class="card-text text-center" style="font-size:0.8em"> <?php  echo $don['date_in'].' - '.$don['date_out']; ?></p>
                        					<?php }
                        				 ?>
                        			</div>
                        			<div class="card-footer text-center <?php 
											if ($don['statut']==='Disponible') {
												echo 'bg-success';
											}elseif ($don['statut'] === 'Busy') {
												echo 'bg-info';
											}else{
												echo 'bg-warning';
											}

										 ?>
                        			">
                        				<strong><?php  echo $don['statut']; ?></strong>
                        			</div>
                        		</div>
                        	</div>
                        		<?php
                        	endwhile;
                    	?>
                    	
                    </div>
	      		</div>
	      	</div><br>
	      	<div class="row">
	      		<div class="col-md-12">
	      			<h3 class="text-center border border-primary bg-primary">
	      				SUITE PRESIDENTIELLE
	      				<?php 
                            $count = $bd->query('SELECT  COUNT(*) AS nbre FROM rooms LEFT JOIN booking ON rooms.id_room = booking.num_chambre WHERE idCatCh=4');
                                    $nbre=$count->fetch(PDO::FETCH_ASSOC);
                           ?>
                           	<span class="badge badge-danger badge-pill">
                           		<?php echo $nbre['nbre']; ?>
                           		</span>
                           
	      			</h3>
	      			
                    <div class="row">
                    	
                    	<?php 
                        	$req = $bd->query('SELECT  * FROM rooms AS A LEFT JOIN booking AS B ON  A.id_room = B.num_chambre LEFT JOIN client AS C ON C.id_client = B.id_client WHERE idCatCh=4');
                        	while ($don=$req->fetch(PDO::FETCH_ASSOC)) :
                        		?>
                        	<div class="col-md-2" style="margin-top:8px">
                        		<div class="card" data-toggle="tooltip" title="<?php echo $don['motif'];?>">

                        			<div class="card-header"
                        			
										
                        			>
                        				<h6 class="card-title text-center"><?php echo 'Chambre '.$don['room_code'];  ?></h6>
                        			</div>
                        			<div class="card-body">
                        				<?php
                        					if ($don['statut_booking'] === 'CheckIn') { ?>
                        						<p class="text-center card-title"><strong><?php  echo $don['nom_client']; ?></strong></p>
                        						<p class="card-text text-center" style="font-size:0.8em"> <?php  echo $don['date_in'].' - '.$don['date_out']; ?></p>
                        					<?php }
                        				 ?>
                        			</div>
                        			<div class="card-footer text-center <?php 
											if ($don['statut']==='Disponible') {
												echo 'bg-success';
											}elseif ($don['statut'] === 'Busy') {
												echo 'bg-info';
											}else{
												echo 'bg-warning';
											}

										 ?>
                        			">
                        				<strong><?php  echo $don['statut']; ?></strong>
                        			</div>
                        		</div>
                        	</div>
                        		<?php
                        	endwhile;
                    	?>
                    	
                    </div>
	      		</div>
	      	</div><br>
	          
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
		  	$('.supBtn').on('click', function(){
		  		$('#supBtn').modal('show');

		  		$tr =$(this).closest('tr');
		  		var data = $tr.children('td').map(function(){
		  			return $(this).text();
		  		}).get();
		  		console.log(data);

		  		$('#idComNour').val(data[0]);
		  		$('#qteCom').val(data[1]);
		  	});
		  	$('[data-toggle="tooltip"]').tooltip();
		});
	</script>

	
</body>
</html>