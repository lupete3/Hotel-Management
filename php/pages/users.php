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
					<h4 class="modal-title" id="exampleModalLabel">MODIFICATION UTILISATEUR</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="close">
						<span aria-hidden="true">&times;</span>
					</button>
						
				</div>
				<form action="uUsers.php" method="POST" class="was-validated">
					<div class="modal-body">
						<input type="hidden" name="id" class="form-control" id="id" required="" autocomplete="off"><br>
						<select name="user_function" id="" class="form-control" required="">
		           			<option value="" selected="" disabled="">Fonction</option>
		           			<option value="econome">Econome</option>
		           			<option value="comptable">Comptable</option>
		           			<option value="controleur">Controleur</option>
		           			<option value="receptionniste">Receptionniste</option>
		           			<option value="barman_resto">Barman_resto</option>
		           			<option value="house_keeping">House Keeping</option>
		           		</select><br>
		           		<input type="text" name="user_name" id="nom" class="form-control" placeholder="Nom utilisateur" required="" autocomplete="off" required=""><br>
		           		<select name="user_sex" class="form-control" required="">
		           			<option selected="" disabled="" value="">Sexe</option>
		           			<option value="M">M</option>
		           			<option value="F">F</option>
		           		</select>
		           		<br>
		           		<input type="text" name="user_address" id="adr" class="form-control" placeholder="Adresse" required="" autocomplete="off"><br>
		           		<input type="tel" name="user_phone" id="phone" class="form-control" placeholder="Phone" required="" autocomplete="off"><br>
		           		<input type="email" name="user_email" id="email" class="form-control" placeholder="email" required="" autocomplete="off"><br>
		           		<input type="password" name="mdp_user" id="mdp" class="form-control" placeholder="Mot de passe" required="" autocomplete="off"><br>
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
			<marquee behavior="alternate" scrollamount="5"><h1 id="h1_bbh_title">Bahari Beach Hotel</h1></marquee> 
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
		          <h3 class="title">AJOUTER UTILISATEUR</span></h3>
		          <?php
		          		if (isset($_POST['save'])) {
		          			$a=$_POST['user_function'];
		          			$b=$_POST['user_name'];
		          			$c=$_POST['user_sex'];
		          			$d=$_POST['user_phone'];
		          			$e=$_POST['user_email'];
		          			$f=$_POST['user_address'];
		          			$g=$_POST['mdp_user'];
							
		          			$req=$bd->prepare('SELECT * FROM users WHERE user_name=? AND user_function=?');
							$req->execute(array($b,$a));
							  if ($don=$req->fetch(PDO::FETCH_ASSOC)) {
							      ?>
								<div class="alert alert-danger alert-dismissible" id="msg" role="alert">
									<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
									<h6>Cet utilisateur existe déjà</h6>
								</div>
								<?php
							  }else{
					            $req = $bd->prepare('INSERT INTO users (user_function,user_name,user_sex,user_phone,user_email,user_address,mdp_user) VALUES (?,?,?,?,?,?,?)');
					            $req->execute(array($a,$b,$c,$d,$e,$f,$g));
					            if ($req) { ?>
					                    <div class="alert alert-success alert-dismissible" id="msg" role="alert">
										<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
										<h5>Utilisateur ajouté</h5>
									</div>
					                <?php 
					            }
					        }

					        }

		           ?>
		           <form action="" method="POST" class="was-validated">
		           		<select name="user_function" id="" class="form-control" required="">
		           			<option value="" selected="" disabled="">Agent</option>
		           			<option value="econome">Econome</option>
		           			<option value="comptable">Comptable</option>
		           			<option value="controleur">Controleur</option>
		           			<option value="receptionniste">Receptionniste</option>
		           			<option value="barman_resto">Barman_resto</option>
		           			<option value="house_keeping">House Keeping</option>
		           			<option value="cuisinier">Cuisinier</option>
		           		</select><br>
		           		<input type="text" name="user_name" class="form-control" placeholder="Nom utilisateur" required="" autocomplete="off"><br>
		           		<select name="user_sex" class="form-control" required="">
		           			<option valu="" selected="" disabled="">Sexe</option>
		           			<option value="M">M</option>
		           			<option value="F">F</option>
		           		</select>
		           		<br>
		           		<input type="text" name="user_address" class="form-control" placeholder="Adresse" required="" autocomplete="off"><br>
		           		<input type="tel" name="user_phone" class="form-control" placeholder="Phone" required="" autocomplete="off"><br>
		           		<input type="email" name="user_email" class="form-control" placeholder="email" required="" autocomplete="off"><br>
		           		<input type="password" name="mdp_user" class="form-control" placeholder="Mot de passe" required="" autocomplete="off"><br>
						<button type="submit" class="btn btn-danger btn-block" name="save">Enregistrer</button>
		           </form>
		    </div>
	      <div class="col-md-9">
	          <h3 class="title">LISTE DES UTILISATEURS</span></h3>
	          <div class="row">
	          	 <div class="col-12">
	 				<table id="tab" class="display table table-bordered table-striped table-sm">
		          	<thead>
		          		<tr style="font-weight:bold" class="btn-danger">
                            <th>N°</th>
                            <th>Fonction</th>  
                            <th>Nom</th>  
                            <th>Sexe</th>
                            <th>Date ajout</th>
                            <th>Phone </th>
                            <th>Email </th>
		          			<td>Action</td>
		          		</tr>
		          	</thead>
		          	<tbody>
		          		<?php
		          			$limit=10;
							$page = isset($_GET['page'])?$_GET['page']:1;
							$start = ($page-1)*$limit;



							$req = $bd->query("SET lc_time_names='fr_FR'");
							$req = $bd->query("SELECT * FROM users LIMIT $start,$limit");
							
							$res = $bd->query("SELECT count(*) as total FROM users ");


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
                                <td><?php echo $don['id_user'] ?></td>
                                <td><?php echo $don['user_function'] ?></td>
                                <td><?php echo $don['user_name'] ?></td>
                                <td class="text-uppercase"><?php echo $don['user_sex'] ?></td>
                                <td><?php echo $don['user_add_date'] ?></td>
                                <td><?php echo $don['user_phone'] ?></td>
                                <td><?php echo $don['user_email'] ?></td>
                              
								<td>
									<button type="button" class="btn btn-danger editBtn"><span class="fa fa-pencil"></span>
										
									</button>
									<button type="button" class="btn btn-danger supBtn"><span class="fa fa-trash"></span>
										
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
			    			<a  class="page-link" aria-label="Previous" href="users.php?page=<?php echo $prec;?>">
			    				<span aria-hidden="true">&laquo;</span>
			    				<span class="sr-only" ="true">Previous</span>
			    			</a>
			    		</li>
			    		<?php 
			    			for($i=1;$i<=$nbrePage;$i++) {
			    		?> 
			    		<li class="page-item <?php echo(($page==$i)?'active':'')?>"><a  class="page-link" href="users.php?page=<?php echo $i;?>"><?php echo $i;?></a></li>
			    		<?php
			    		}?>
			    		<li class="page-item">
			    			<a  class="page-link" aria-label="Next" href="users.php?page=<?php echo $suiv;?>">
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
				<div class="modal fade" id="supBtn" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header bg-danger">
							<h4 class="modal-title" id="exampleModalLabel">ANNULATION COMMANDE</h4>
							<button type="button" class="close" data-dismiss="modal" aria-label="close">
								<span aria-hidden="true">&times;</span>
							</button>
								
						</div>
						<form action="delUser.php" method="POST">
							<div class="modal-body">
								<input type="hidden" name="idSup" id="idDel" required="" autocomplete="off"><br>
				           		<div class="input-group mb-4">	 
				           			<h4 class="text-center">Voulez-vous supprimer cet utilisateur ?</h4>
				           			
				           		</div>
							    		           		
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-outline-secondary btn-block" data-dismiss="modal">Annuler</button>
								<button type="submit" class="btn btn-danger btn-block">Confirmer</button>
							</div>
						</form>				
					</div>
				</div>			
			</div>
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
		  		$('#nom').val(data[2]);
		  		$('#adr').val(data[5]);
		  		$('#phone').val(data[6]);
		  		$('#email').val(data[7]);
		  		$('#mdp').val(data[8]);
	  		});
	  		$('.supBtn').on('click', function(){
		  		$('#supBtn').modal('show');

		  		$tr =$(this).closest('tr');
		  		var data = $tr.children('td').map(function(){
		  			return $(this).text();
		  		}).get();
		  		console.log(data);

		  		$('#idDel').val(data[0]);
		  		
	  		});
		});
	</script>
</body>
</html>