<?php 
session_start(); 
include "db_conn.php";

if (isset($_POST['uname']) && isset($_POST['password'])
    && isset($_POST['name']) && isset($_POST['re_password']) 
	&& isset($_POST['firstname']) && isset($_POST['birth']) 
	&& isset($_POST['mail']) && isset($_POST['tel']) 
	&& isset($_POST['fonc'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$uname = validate($_POST['uname']);
	$pass = validate($_POST['password']);

	$re_pass = validate($_POST['re_password']);
	$name = validate($_POST['name']);
	$firstname = validate($_POST['firstname']);

	$birth = validate($_POST['birth']);
	$mail = validate($_POST['mail']);
	$tel = validate($_POST['tel']);
	$fonc = validate($_POST['fonc']);

	$user_data = 'uname='. $uname. '&name='. $name. '&firstname';


	if (empty($uname)) {
		header("Location: signup.php?error=User Name is required&$user_data");
	    exit();
	}
	else if(empty($name)){
        header("Location: signup.php?error=Name is required&$user_data");
	    exit();
	}
	else if(empty($firstname)){
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
	else if(empty($tel)){
        header("Location: signup.php?error=Telephone is required&$user_data");
	    exit();
	}
	else if(empty($fonc)){
        header("Location: signup.php?error=The fonction (role) is required&$user_data");
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

	

	else if($pass !== $re_pass){
        header("Location: signup.php?error=The confirmation password  does not match&$user_data");
	    exit();
	}

	else{

		// hashing the password
        $pass = hash('sha256',$pass);

	    $sql = "SELECT * FROM personne WHERE identifiant='$uname' ";
		$result = mysqli_query($conn, $sql);
		echo($result);

		if (mysqli_num_rows($result) > 0) {
			header("Location: signup.php?error=The username is taken try another&$user_data");
	        exit();
		}else {

			// Insérer les données dans la table "personne" seule
			$sql2 = "INSERT INTO personne (identifiant, nom, prenom, mdp, date_naissance, email, telephone, fonction) VALUES ('$uname', '$name', '$firstname', '$pass', '$birth', '$mail', '$tel', '$fonc')";
			//$sql2 = "INSERT INTO personne(identifiant, nom, prenom, mdp, date_naissance, email, telephone, fonction) VALUES ('paul92', 'Dupont', 'Paul', '1234', '01/01/2000', 'paul92@gmail.com', '0601020304', 'adhérent')";

			$result2 = mysqli_query($conn, $sql2);
			

			//Débogage
			echo($result2);
			dd($result2);

			/*Essaie avec insertion de deux requettes, une dans table "personne" et l'autre dans table "mdp", (non réussi)

			// Insérer les données dans la table "personne"
			$sql_personne = "INSERT INTO personne (identifiant, nom, prenom, date_naissance, email, telephone, fonction) VALUES ('$uname', '$name', '$firstname', '$birth', '$mail', '$tel', '$fonc')";
			$result_personne = mysqli_query($conn, $sql_personne);

			//Récupérer l'ID de la personne nouvellement insérée
			$personne_id = mysqli_insert_id($conn);

			//Insérer le mot de passe dans la table "mdp"
			$sql_mdp = "INSERT INTO mdp (id, mot_de_passe) VALUES ('$personne_id', '$pass')";
			$result_mdp = mysqli_query($conn, $sql_mdp);

			en cas d'utilisation de la table "mdp" il faudra modifier la table personne actuelle pour enlever le champ mdp !!

			*/
			

			//if ($result_personne && $result_mdp) {
        	if ($result2) {
           	 	header("Location: signup.php?success=Votre compte a été créé avec succès !");
	         	exit();
        	//}else if (!$result_personne){
			//	header("Location: signup.php?error=Erreur insertion table personne&$user_data");
			// 	exit();
			//}else if (!$result_mdp){
			//	header("Location: signup.php?error=Erreur insertion table mdp&$user_data");
			//	exit();
		   	}else {
	           	header("Location: signup.php?error=Erreur inconnue est apparue&$user_data");
		        exit();
        	}
		}
	}
	
}else{
	header("Location: signup.php");
	exit();
}
