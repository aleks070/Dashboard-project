<?php 
session_start(); 
include "db_conn.php";

if (isset($_POST['uname']) && isset($_POST['l_name']) && isset($_POST['f_name']) && isset($_POST['password'])
    && isset($_POST['birth']) && isset($_POST['mail']) && isset($_POST['tel']) && isset($_POST['re_password'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$uname = validate($_POST['uname']);
	$pass = validate($_POST['password']);

	$re_pass = validate($_POST['re_password']);
	$l_name = validate($_POST['l_name']);
	$f_name = validate($_POST['f_name']);

	$birth = validate($_POST['birth']);
	$mail = validate($_POST['mail']);
	$tel = validate($_POST['tel']);
	$fonc = validate($_POST['fonc']);


	$user_data = 'uname='. $uname. '&l_name='. $l_name. '&f_name';


	if (empty($uname)) {
		header("Location: signup.php?error=User Name(Identifiant) is required&$user_data");
	    exit();
	}
	else if(empty($l_name)){
        header("Location: signup.php?error=Last Name is required&$user_data");
	    exit();
	}
	else if(empty($f_name)){
		header("Location: signup.php?error=First Name is required&$user_data");
		exit();
	}
	else if(empty($birth)){
		header("Location: signup.php?error=Date of Birth is required&$user_data");
		exit();
	}
	else if(empty($mail)){
		header("Location: signup.php?error=Email is required&$user_data");
		exit();
	}
	else if(empty($pass)){
        header("Location: signup.php?error=Password is required&$user_data");
	    exit();
	}
	else if(empty($re_pass)){
        header("Location: signup.php?error=Re Password is required&$user_data");
	    exit();
	}

	else if(empty($tel)){
        header("Location: signup.php?error=Telephone is required&$user_data");
	    exit();
	}

	else if(empty($fonc)){
        header("Location: signup.php?error=The fonction (role) is required&$user_data");
	    exit();
	}

	else if($pass !== $re_pass){
        header("Location: signup.php?error=The confirmation password  does not match&$user_data");
	    exit();
	}

	else{

		// hashing the password
        $pass = hash("sha256",$pass);

	    //$sql = "SELECT * FROM users WHERE user_name='$uname' ";
		$sql = "SELECT * FROM personne WHERE identifiant='$uname'";
		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) > 0) {
			header("Location: signup.php?error=The username is taken try another&$user_data");
	        exit();
		}else {
           //$sql2 = "INSERT INTO users(user_name, password, name) VALUES('$uname', '$pass', '$name')";
		   $sql2 = "INSERT INTO personne(identifiant, nom, prenom, mdp, date_naissance, email, telephone, fonction) VALUES ('$uname', '$l_name', '$f_name', '$pass', '$birth', '$mail', '$tel', '$fonc')";
           //$sql3 = "INSERT INTO mdp(mot_de_passe) VALUES('$pass')";  
		   //$query = $sql2 . ";" . $sql3;

		   $result2 = mysqli_query($conn, $sql2);
           if ($result2) {
           		header("Location: signup.php?success=Votre compte à été crée avec succès");
	        	exit();
           }else {
				header("Location: signup.php?error=unknown error occurred: " . mysqli_error($conn) . "&$user_data");
	           	//header("Location: signup.php?error=unknown error occurred&$user_data");
		        exit();
           }
			/*$sql2 = "INSERT INTO personne(identifiant, nom, prenom, date_naissance, email, telephone, fonction) VALUES ('$uname', '$l_name', '$f_name', '$birth', '$mail', '$tel', '$fonc')";
			$sql3 = "INSERT INTO mdp(mot_de_passe) VALUES('$pass')";

			// Début de la transaction
			mysqli_begin_transaction($conn);

			try {
				// Exécution de la première requête
				$result2 = mysqli_query($conn, $sql2);
				if (!$result2) {
					throw new Exception(mysqli_error($conn));
				}

				// Exécution de la deuxième requête
				$result3 = mysqli_query($conn, $sql3);
				if (!$result3) {
					throw new Exception(mysqli_error($conn));
				}

				// Validation de la transaction
				mysqli_commit($conn);

				header("Location: signup.php?success=Votre compte a été créé avec succès");
				exit();
			} catch (Exception $e) {
				// En cas d'erreur, annulation de la transaction
				mysqli_rollback($conn);

				header("Location: signup.php?error=Une erreur inconnue s'est produite: " . $e->getMessage() . "&$user_data");
				exit();
			}*/
		}
	}
	
}else{
	header("Location: signup.php");
	exit();
}
