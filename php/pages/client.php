<?php 
	require_once ('../security_recept.php'); 
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
					<h4 class="modal-title" id="exampleModalLabel">MODIFICATION IDENTITE CLIENT</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="close">
						<span aria-hidden="true">&times;</span>
					</button>
						
				</div>
				<form action="upClient.php" method="POST" class="was-validated">
					<div class="modal-body">
						<input type="hidden" name="id" id="id" required="" autocomplete="off"><br>
						<div class="input-group mb-4">	           			
							<div class="input-group-append">
		           			<span class="input-group-text" id="basic-addon2">Nom </span>
		           			</div>
		           			<input type="text" name="nom" class="form-control btn-lg" id="lib" required="" autocomplete="off"><br>
		           		</div><br>
		           		
		           		<div class="input-group mb-4">	           			
							<div class="input-group-append">
		           				<span class="input-group-text" id="basic-addon2">Sexe</span>
		           			</div><select name="sexe" class="form-control btn-lg" id='pu' required="">
		           			<option value="" disabled="" selected="">Sexe</option>
		           			<option value="Masculin" >Masculin</option>
		           			<option value="Feminin" >Feminin</option>
		           		</select>
		           			<br>
		           		</div>
		           		<div class="input-group mb-4">	           			
							<div class="input-group-append">
		           				<span class="input-group-text" id="basic-addon2">Adresse</span>
		           			</div>
		           			<input type="text" name="adresse" class="form-control btn-lg" id="pu2" required="" autocomplete="off"><br>
		           		</div>
		           		<div class="input-group mb-4">	           			
							<div class="input-group-append">
		           				<span class="input-group-text" id="basic-addon2">Numero de telephone</span>
		           			</div>
		           			<input type="text" name="contact" class="form-control btn-lg" id="pu1"  autocomplete="off"><br>
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
					<a class="nav-link" href="../ac_sess/ac_rec.php"><button type="button" class="btn btn-outline-light connexion"><h3>Retour</h3></button><span class="sr-only">(current)</span></a>
				</li>
			</ul>
			
		</div>
	</nav>

		<!--================================CONTENU ========================================== -->

	<div class="container spacer">
		<div class="row">

			<div class="col-md-4">
				<h3>NOUVEAU CLIENT</h3> 

				<?php
		          		if (isset($_POST['save'])) {
							  $a=$_POST['nom'];
							  $b=$_POST['sexe'];
							  $c=$_POST['etatCivil'];
							  $d=$_POST['profession'];
							  $e=$_POST['pays'];
							  $f=$_POST['nomOrg'];
							  $g=$_POST['residence'];
							  $h=$_POST['destination'];
							  $i=$_POST['piece'];
							  $j=$_POST['numPiece'];
							  $k=$_POST['lieuDel'];
							  $l=$_POST['dateDel'];
							  $m=$_POST['telClient'];
							  $n=$_POST['email'];

							  $o=$_FILES['photo']['name'];
							  $p=$_POST['provenance'];
							  $r_tmp=$_FILES['photo']['tmp_name'];
        					  move_uploaded_file($r_tmp,"fichiers/photos/$o");

        					
							  $req=$bd->prepare('SELECT * FROM client WHERE nom_client=? AND sexe_client = ? AND etatCivil = ? ');
							  $req->execute(array($a,$b,$c));
							  if ($don=$req->fetch(PDO::FETCH_ASSOC)) {
							      ?>
								<div class="alert alert-danger alert-dismissible" id="msg" role="alert">
									<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
									<h5>Client existe déjà</h5>
								</div>
								<?php
							  }else{
							  	$req = $bd->prepare('INSERT INTO client(nom_client, sexe_client, etatCivil, profession, pays, idOrg, residence, destination, piece, numPiece, lieuDel, dateDel, telClient, email,photo,provenance) 
                            VALUES 
                                (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)') ;
        
            				$req->execute(array(
                                $a,$b,$c,$d,$e,$f,$g,$h,$i,$j,$k,$l,$m,$n,$o,$p));
							  	if ($req) {
							            ?>
								<div class="alert alert-success alert-dismissible" id="msg" role="alert">
									<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
									<h5 class="text-center">Client ajouté avec succès</h5>
								</div>
								<?php
							      }else{
							        ?>
									<div class="alert alert-danger alert-dismissible" id="msg" role="alert" class="spacer">
										<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
										<h5 class="text-center">Client non ajoutée</h5>
									</div>
									<?php
							      }

							  }
							  
							      
							  }							
		           ?>
			</div>
			<div class="col-md-2 offset-6">
				<a href="listClient.php"><button class="btn btn-danger btn-lg pull-4" type="button"><span class="fa fa-list"></span> Liste client</button></a>
			</div>
		</div><br>
		<form action="" method="POST" enctype="multipart/form-data" class="was-validated">
			<div class="row">
				<div class="col-md-4">
						<input type="text" name="nom" class="form-control btn-lg" placeholder="Nom Client" required="" autocomplete="off"><br>
						<select name="sexe" class="form-control btn-lg" required="">
		           			<option selected="" disabled="" value="">Sexe</option>
		           			<option value="Masculin" >Masculin</option>
		           			<option value="Feminin" >Feminin</option>
		           		</select><br>
		           		<select name="etatCivil" class="form-control btn-lg" required="">
		           			<option selected="" disabled="" value="">Etat Civil</option>
		           			<option value="Célibataire" >Célibataire</option>
		           			<option value="Marié" >Marié</option>
		           			<option value="Veuf(ve)" >Veuf(ve)</option>
		           			<option value="Divorcé" >Divorcé</option>
		           		</select><br>
		           		<input type="email" name="email" class="form-control btn-lg" placeholder="example@gmail.com"  autocomplete="off"><br>
		           		<input type="text" name="telClient" class="form-control btn-lg" placeholder="Téléphone"  autocomplete="off"><br>
		           		
				</div>
				<div class="col-md-4">
					<input type="text" name="provenance" class="form-control btn-lg" placeholder="Provenance" required="" autocomplete="off"><br>
					<input type="text" name="destination" class="form-control btn-lg" placeholder="Destination" required="" autocomplete="off"><br>
					<input type="text" name="profession" class="form-control btn-lg" placeholder="Profession" required="" autocomplete="off"><br>
							           		<input type="text" name="residence" class="form-control btn-lg" placeholder="Résidence client" required="" autocomplete="off"><br>

					<select name="pays" class="form-control btn-lg" required="">
		           			<option value="" selected="" disabled="">Pays </option>
		           			<option value="France" >France </option>

							<option value="Afghanistan">Afghanistan </option>
							<option value="Afrique_Centrale">Afrique_Centrale </option>
							<option value="Afrique_du_sud">Afrique_du_Sud </option>
							<option value="Albanie">Albanie </option>
							<option value="Algerie">Algerie </option>
							<option value="Allemagne">Allemagne </option>
							<option value="Andorre">Andorre </option>
							<option value="Angola">Angola </option>
							<option value="Anguilla">Anguilla </option>
							<option value="Arabie_Saoudite">Arabie_Saoudite </option>
							<option value="Argentine">Argentine </option>
							<option value="Armenie">Armenie </option>
							<option value="Australie">Australie </option>
							<option value="Autriche">Autriche </option>
							<option value="Azerbaidjan">Azerbaidjan </option>

							<option value="Bahamas">Bahamas </option>
							<option value="Bangladesh">Bangladesh </option>
							<option value="Barbade">Barbade </option>
							<option value="Bahrein">Bahrein </option>
							<option value="Belgique">Belgique </option>
							<option value="Belize">Belize </option>
							<option value="Benin">Benin </option>
							<option value="Bermudes">Bermudes </option>
							<option value="Bielorussie">Bielorussie </option>
							<option value="Bolivie">Bolivie </option>
							<option value="Botswana">Botswana </option>
							<option value="Bhoutan">Bhoutan </option>
							<option value="Boznie_Herzegovine">Boznie_Herzegovine </option>
							<option value="Bresil">Bresil </option>
							<option value="Brunei">Brunei </option>
							<option value="Bulgarie">Bulgarie </option>
							<option value="Burkina_Faso">Burkina_Faso </option>
							<option value="Burundi">Burundi </option>

							<option value="Caiman">Caiman </option>
							<option value="Cambodge">Cambodge </option>
							<option value="Cameroun">Cameroun </option>
							<option value="Canada">Canada </option>
							<option value="Canaries">Canaries </option>
							<option value="Cap_vert">Cap_Vert </option>
							<option value="Chili">Chili </option>
							<option value="Chine">Chine </option>
							<option value="Chypre">Chypre </option>
							<option value="Colombie">Colombie </option>
							<option value="Comores">Colombie </option>
							<option value="Congo">Congo </option>
							<option value="Congo_democratique">Congo_democratique </option>
							<option value="Cook">Cook </option>
							<option value="Coree_du_Nord">Coree_du_Nord </option>
							<option value="Coree_du_Sud">Coree_du_Sud </option>
							<option value="Costa_Rica">Costa_Rica </option>
							<option value="Cote_d_Ivoire">Côte_d_Ivoire </option>
							<option value="Croatie">Croatie </option>
							<option value="Cuba">Cuba </option>

							<option value="Danemark">Danemark </option>
							<option value="Djibouti">Djibouti </option>
							<option value="Dominique">Dominique </option>

							<option value="Egypte">Egypte </option>
							<option value="Emirats_Arabes_Unis">Emirats_Arabes_Unis </option>
							<option value="Equateur">Equateur </option>
							<option value="Erythree">Erythree </option>
							<option value="Espagne">Espagne </option>
							<option value="Estonie">Estonie </option>
							<option value="Etats_Unis">Etats_Unis </option>
							<option value="Ethiopie">Ethiopie </option>

							<option value="Falkland">Falkland </option>
							<option value="Feroe">Feroe </option>
							<option value="Fidji">Fidji </option>
							<option value="Finlande">Finlande </option>
							<option value="France">France </option>

							<option value="Gabon">Gabon </option>
							<option value="Gambie">Gambie </option>
							<option value="Georgie">Georgie </option>
							<option value="Ghana">Ghana </option>
							<option value="Gibraltar">Gibraltar </option>
							<option value="Grece">Grece </option>
							<option value="Grenade">Grenade </option>
							<option value="Groenland">Groenland </option>
							<option value="Guadeloupe">Guadeloupe </option>
							<option value="Guam">Guam </option>
							<option value="Guatemala">Guatemala</option>
							<option value="Guernesey">Guernesey </option>
							<option value="Guinee">Guinee </option>
							<option value="Guinee_Bissau">Guinee_Bissau </option>
							<option value="Guinee equatoriale">Guinee_Equatoriale </option>
							<option value="Guyana">Guyana </option>
							<option value="Guyane_Francaise ">Guyane_Francaise </option>

							<option value="Haiti">Haiti </option>
							<option value="Hawaii">Hawaii </option>
							<option value="Honduras">Honduras </option>
							<option value="Hong_Kong">Hong_Kong </option>
							<option value="Hongrie">Hongrie </option>

							<option value="Inde">Inde </option>
							<option value="Indonesie">Indonesie </option>
							<option value="Iran">Iran </option>
							<option value="Iraq">Iraq </option>
							<option value="Irlande">Irlande </option>
							<option value="Islande">Islande </option>
							<option value="Israel">Israel </option>
							<option value="Italie">italie </option>

							<option value="Jamaique">Jamaique </option>
							<option value="Jan Mayen">Jan Mayen </option>
							<option value="Japon">Japon </option>
							<option value="Jersey">Jersey </option>
							<option value="Jordanie">Jordanie </option>

							<option value="Kazakhstan">Kazakhstan </option>
							<option value="Kenya">Kenya </option>
							<option value="Kirghizstan">Kirghizistan </option>
							<option value="Kiribati">Kiribati </option>
							<option value="Koweit">Koweit </option>

							<option value="Laos">Laos </option>
							<option value="Lesotho">Lesotho </option>
							<option value="Lettonie">Lettonie </option>
							<option value="Liban">Liban </option>
							<option value="Liberia">Liberia </option>
							<option value="Liechtenstein">Liechtenstein </option>
							<option value="Lituanie">Lituanie </option>
							<option value="Luxembourg">Luxembourg </option>
							<option value="Lybie">Lybie </option>

							<option value="Macao">Macao </option>
							<option value="Macedoine">Macedoine </option>
							<option value="Madagascar">Madagascar </option>
							<option value="Madère">Madère </option>
							<option value="Malaisie">Malaisie </option>
							<option value="Malawi">Malawi </option>
							<option value="Maldives">Maldives </option>
							<option value="Mali">Mali </option>
							<option value="Malte">Malte </option>
							<option value="Man">Man </option>
							<option value="Mariannes du Nord">Mariannes du Nord </option>
							<option value="Maroc">Maroc </option>
							<option value="Marshall">Marshall </option>
							<option value="Martinique">Martinique </option>
							<option value="Maurice">Maurice </option>
							<option value="Mauritanie">Mauritanie </option>
							<option value="Mayotte">Mayotte </option>
							<option value="Mexique">Mexique </option>
							<option value="Micronesie">Micronesie </option>
							<option value="Midway">Midway </option>
							<option value="Moldavie">Moldavie </option>
							<option value="Monaco">Monaco </option>
							<option value="Mongolie">Mongolie </option>
							<option value="Montserrat">Montserrat </option>
							<option value="Mozambique">Mozambique </option>

							<option value="Namibie">Namibie </option>
							<option value="Nauru">Nauru </option>
							<option value="Nepal">Nepal </option>
							<option value="Nicaragua">Nicaragua </option>
							<option value="Niger">Niger </option>
							<option value="Nigeria">Nigeria </option>
							<option value="Niue">Niue </option>
							<option value="Norfolk">Norfolk </option>
							<option value="Norvege">Norvege </option>
							<option value="Nouvelle_Caledonie">Nouvelle_Caledonie </option>
							<option value="Nouvelle_Zelande">Nouvelle_Zelande </option>

							<option value="Oman">Oman </option>
							<option value="Ouganda">Ouganda </option>
							<option value="Ouzbekistan">Ouzbekistan </option>

							<option value="Pakistan">Pakistan </option>
							<option value="Palau">Palau </option>
							<option value="Palestine">Palestine </option>
							<option value="Panama">Panama </option>
							<option value="Papouasie_Nouvelle_Guinee">Papouasie_Nouvelle_Guinee </option>
							<option value="Paraguay">Paraguay </option>
							<option value="Pays_Bas">Pays_Bas </option>
							<option value="Perou">Perou </option>
							<option value="Philippines">Philippines </option>
							<option value="Pologne">Pologne </option>
							<option value="Polynesie">Polynesie </option>
							<option value="Porto_Rico">Porto_Rico </option>
							<option value="Portugal">Portugal </option>

							<option value="Qatar">Qatar </option>

							<option value="Republique_Dominicaine">Republique_Dominicaine </option>
							<option value="Republique_Tcheque">Republique_Tcheque </option>
							<option value="Reunion">Reunion </option>
							<option value="Roumanie">Roumanie </option>
							<option value="Royaume_Uni">Royaume_Uni </option>
							<option value="Russie">Russie </option>
							<option value="Rwanda">Rwanda </option>

							<option value="Sahara Occidental">Sahara Occidental </option>
							<option value="Sainte_Lucie">Sainte_Lucie </option>
							<option value="Saint_Marin">Saint_Marin </option>
							<option value="Salomon">Salomon </option>
							<option value="Salvador">Salvador </option>
							<option value="Samoa_Occidentales">Samoa_Occidentales</option>
							<option value="Samoa_Americaine">Samoa_Americaine </option>
							<option value="Sao_Tome_et_Principe">Sao_Tome_et_Principe </option>
							<option value="Senegal">Senegal </option>
							<option value="Seychelles">Seychelles </option>
							<option value="Sierra Leone">Sierra Leone </option>
							<option value="Singapour">Singapour </option>
							<option value="Slovaquie">Slovaquie </option>
							<option value="Slovenie">Slovenie</option>
							<option value="Somalie">Somalie </option>
							<option value="Soudan">Soudan </option>
							<option value="Sri_Lanka">Sri_Lanka </option>
							<option value="Suede">Suede </option>
							<option value="Suisse">Suisse </option>
							<option value="Surinam">Surinam </option>
							<option value="Swaziland">Swaziland </option>
							<option value="Syrie">Syrie </option>

							<option value="Tadjikistan">Tadjikistan </option>
							<option value="Taiwan">Taiwan </option>
							<option value="Tonga">Tonga </option>
							<option value="Tanzanie">Tanzanie </option>
							<option value="Tchad">Tchad </option>
							<option value="Thailande">Thailande </option>
							<option value="Tibet">Tibet </option>
							<option value="Timor_Oriental">Timor_Oriental </option>
							<option value="Togo">Togo </option>
							<option value="Trinite_et_Tobago">Trinite_et_Tobago </option>
							<option value="Tristan da cunha">Tristan de cuncha </option>
							<option value="Tunisie">Tunisie </option>
							<option value="Turkmenistan">Turmenistan </option>
							<option value="Turquie">Turquie </option>

							<option value="Ukraine">Ukraine </option>
							<option value="Uruguay">Uruguay </option>

							<option value="Vanuatu">Vanuatu </option>
							<option value="Vatican">Vatican </option>
							<option value="Venezuela">Venezuela </option>
							<option value="Vierges_Americaines">Vierges_Americaines </option>
							<option value="Vierges_Britanniques">Vierges_Britanniques </option>
							<option value="Vietnam">Vietnam </option>

							<option value="Wake">Wake </option>
							<option value="Wallis et Futuma">Wallis et Futuma </option>

							<option value="Yemen">Yemen </option>
							<option value="Yougoslavie">Yougoslavie </option>

							<option value="Zambie">Zambie </option>
							<option value="Zimbabwe">Zimbabwe </option>
		           	</select><br>
				</div>
				<div class="col-md-4">

					<div class="input-group mb-4">
						<select name="piece" class="form-control btn-lg">
			           		<option value="" >Pièce d'identité</option>
			           		<option value="Carte d'électeur" >Carte d'électeur</option>
			           		<option value="Permis de conduire" >Permis de conduire nationale</option>
			           		<option value="Passport" >Passport</option>
			           		<option value="Autre" >Autre</option>
			           	</select>
			           	<input type="text" name="numPiece" class="form-control btn-lg" placeholder="N° Pièce" required="" autocomplete="off"><br>
					</div>
					
					<input type="text" name="lieuDel" class="form-control btn-lg" placeholder="Lieu de délivrance" required="" autocomplete="off"><br>
					<div class="input-group">
						<div class="input-group-append">
							<span class="input-group-text" id="basic-addon2">Date délivrance</span>
						</div>
						<input type="date" name="dateDel" class="form-control btn-lg" required="" autocomplete="off">
					</div><br>
					<div class="input-group mb-4">	           			
							<div class="input-group-append">
		           				<span class="input-group-text" id="basic-addon2">Photo document</span>
		           			</div>
		           		<input type="file" name="photo" class="form-control btn-lg" required="" autocomplete="off"><br>
		           	</div>
		           	<select id="select" class="form-control" name="nomOrg">
                            <option selected="" disabled="">Organisation</option>
                                <?php 
                                $select_id = $bd->query('SELECT * FROM organisation');
                                while($selec_id = $select_id->fetch()){
                                                    ?>
                                <option value=" <?php echo $selec_id['idOrg']  ?>">
                                     <?php echo $selec_id['nomOrg'];  ?>
                                </option>
                                <?php  }  ?>
						</select><br>
				</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<button type="submit" class="btn btn-danger btn-block btn-lg" name="save">Enregistrer</button>
			</div>
		</div>
		</form>
		
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
		});
	</script>
</body>
</html>