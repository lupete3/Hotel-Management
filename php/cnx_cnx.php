<?php 

include ('bd_cnx.php');
session_start();

if(isset($_POST['log_in'])){
	$user = htmlentities(trim(strtolower($_POST['username'])));
	$pwd = htmlentities(trim($_POST['pass']));
	$funct = htmlentities(trim($_POST['funct']));

	//		/*

		if(isset($_POST['funct']) AND $_POST['funct'] == 'admin'){

			$query1 = $bd->prepare("SELECT * FROM admin_bbh WHERE nom_admin=? AND mdp_admin=? ");
			$query1->execute(array($user, $pwd ));

				if ($done=$query1->fetch(PDO::FETCH_ASSOC)) {

							$_SESSION['profile']['admin']=$done;
								
							header('location:admin.php');
				} else {
				  	header('location:../index.php');
				}
		} 
		elseif(isset($_POST['funct']) AND $_POST['funct'] == 'comptable') {

				$query2 = $bd->prepare("SELECT * FROM users WHERE user_name=? AND mdp_user=? AND user_function=? ");
				$query2->execute(array($user, $pwd, $funct ));

					if ($done2=$query2->fetch(PDO::FETCH_ASSOC)){
							$_SESSION['profil']['agent1']=$done2;
							header('location:ac_sess/ac_cpt.php');
							
						} else { header('location:../index.php'); }
        }  
         elseif (isset($_POST['funct']) AND $_POST['funct'] == 'econome') {
                $query2 = $bd->prepare("SELECT * FROM users WHERE user_name=? AND mdp_user=? AND user_function=? ");
				$query2->execute(array($user, $pwd, $funct ));

					if ($done2=$query2->fetch(PDO::FETCH_ASSOC)){
                        $_SESSION['profil']['agent2']=$done2;
                        header('location:ac_sess/ac_eco.php');
                    }else { header('location:../index.php'); }

         } elseif (isset($_POST['funct']) AND $_POST['funct'] == 'controleur') {
				$query2 = $bd->prepare("SELECT * FROM users WHERE user_name=? AND mdp_user=? AND user_function=? ");
				$query2->execute(array($user, $pwd, $funct ));

					if ($done2=$query2->fetch(PDO::FETCH_ASSOC)){
							$_SESSION['profil']['agent3']=$done2;
				            header('location:ac_sess/ac_ctrl.php');
							
						} else { header('location:../index.php'); }           

         } elseif (isset($_POST['funct']) AND $_POST['funct'] == 'receptionniste') {
 				$query2 = $bd->prepare("SELECT * FROM users WHERE user_name=? AND mdp_user=? AND user_function=? ");
				$query2->execute(array($user, $pwd, $funct ));

					if ($done2=$query2->fetch(PDO::FETCH_ASSOC)){
							$_SESSION['profil']['agent4']=$done2; 
				            header('location:ac_sess/ac_rec.php');
							
						} else { header('location:../index.php'); }                   

         }elseif (isset($_POST['funct']) AND $_POST['funct'] == 'house_keeping') {
 				$query2 = $bd->prepare("SELECT * FROM users WHERE user_name=? AND mdp_user=? AND user_function=? ");
				$query2->execute(array($user, $pwd, $funct ));

					if ($done2=$query2->fetch(PDO::FETCH_ASSOC)){
							$_SESSION['profil']['agent6']=$done2;
				            header('location:ac_sess/ac_hskp.php');
							
						} else { header('location:../index.php'); }                  

         }elseif (isset($_POST['funct']) AND $_POST['funct'] == 'cuisinier') {
 				$query2 = $bd->prepare("SELECT * FROM users WHERE user_name=? AND mdp_user=? AND user_function=? ");
				$query2->execute(array($user, $pwd, $funct ));

					if ($done2=$query2->fetch(PDO::FETCH_ASSOC)){
							$_SESSION['profil']['agent7']=$done2;
				            header('location:ac_sess/ac_cuisine.php');
							
						} else { header('location:../index.php'); }                

				}  
        } 

        else {
            header('location:../index.php');
				}

 ?>