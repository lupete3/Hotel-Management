<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login Hotel Management System</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="Login_v12/images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="Login_v12/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="Login_v12/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="Login_v12/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="Login_v12/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="Login_v12/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="Login_v12/vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="Login_v12/css/util.css">
	<link rel="stylesheet" type="text/css" href="Login_v12/css/main.css">
<!--===============================================================================================-->


</head>
<body>
	
	<div class="limiter">
		<div class="container-login100" style="background-image: url('Login_v12/images/img-01.jpg');">
			<div class="wrap-login100 p-t-10 p-b-0">
				<form class="login100-form validate-form was-validated" action="php/cnx_cnx.php" method="post">
					<div class="login150-form-avatar">
                        
						  <img src="docs/img/bbh_logo2.png" alt="AVATAR" style="margin-left:40px;">
                        
					</div>

					<span class="login100-form-title p-t-20 p-b-45"; style="font-family: century gothic">
						Connectez-vous ici !
					</span>

					<div class="wrap-input100 validate-input m-b-10" data-validate = "Username is required">
						<input class="input100" type="text" name="username" placeholder="Nom d'utilisateur" required="" autocomplete="off">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-user"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input m-b-10" data-validate = "Password is required">
						<input class="input100" type="password" name="pass" placeholder="Mot de passe" required="" autocomplete="off">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input m-b-10" data-validate = "Category is required">
						<select class="form-control " name="funct" style="border-radius: 50px; height: 50px; padding-left: 50px; font-weight: bold; color: grey; font-size: bold;" required="">
							<option selected="" disabled="" value="">Fonction</option>
							<option value="admin">Admin</option>
							<option value="comptable">Comptable</option>
							<option value="econome">Econome</option>
							<option value="controleur">Contrôleur</option>
							<option value="receptionniste">Réceptionniste</option>
							<option value="cuisinier">Chef Cuisinier</option>
							<option value="house_keeping">Houser Keeper</option>
						</select>
					</div>

					<div class="container-login100-form-btn p-t-10">
						<button class="login100-form-btn" type="submit" name="log_in">
							S'identifier
						</button>
					</div>
       
				</form>
				<div class="container-login100-form-btn p-t-5">
					<a href="connexion.php">
						<button class="login100-form-btn" type="button" name="log_i">
							Points de vente
					</button>
					</a>
				</div>
                
	            <div class="row" style="padding-top: 50px; text-align: center; color:white;">
	               
	                Copyright &copy;<script>document.write(new Date().getFullYear());</script> Tous droits réservés | Ce modèle est fait par : <a href="https://softech-rdc.com" target="_blank" style=" font-size: 20px; font-weight: bold; color: whitesmoke; text-align: center; width: 100%;">Soft Tech Corporation</a>
	                       
	            </div>

			</div>
 
		</div>
        


	</div>
	


	
<!--===============================================================================================-->	
	<script src="Login_v12/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="Login_v12/vendor/bootstrap/js/popper.js"></script>
	<script src="Login_v12/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="Login_v12/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="Login_v12/js/main.js"></script>

</body>
</html>