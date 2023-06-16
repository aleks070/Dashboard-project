<?php 
session_start(); 
include "db_conn.php";

if (isset($_POST['uname']) && isset($_POST['password'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$uname = validate($_POST['uname']);
	$pass = validate($_POST['password']);

	if (empty($uname)) {
		header("Location: index.php?error=User Name is required");
	    exit();
	}else if(empty($pass)){
        header("Location: index.php?error=Password is required");
	    exit();
	}else{
		// hashing the password
        $pass = hash('sha256',$pass);

        
		//$sql = "SELECT * FROM personne p INNER JOIN mdp m ON p.prs_id = m.id WHERE p.identifiant='$uname' AND m.mot_de_passe='$pass'";
		$sql = "SELECT * FROM personne WHERE identifiant='$uname' AND mdp='$pass'";
		
		$result = mysqli_query($conn, $sql);


		if (mysqli_num_rows($result) === 1) {
			$row = mysqli_fetch_assoc($result);
            if ($row['identifiant'] === $uname && $row['mdp'] === $pass) {
            	$_SESSION['identifiant'] = $row['identifiant'];
            	$_SESSION['nom'] = $row['nom'];
            	$_SESSION['prenom'] = $row['prenom'];
            	$_SESSION['mdp'] = $row['mdp'];
            	$_SESSION['date_naissance'] = $row['date_naissance'];
            	$_SESSION['email'] = $row['name'];
            	$_SESSION['telephone'] = $row['telephone'];
            	$_SESSION['fonction'] = $row['fonction'];
            	header("Location: home.php");
		        exit();
            }else{
				header("Location: index.php?error=Identifiant ou mot de passe incorrect 2");
		        exit();
			}
		}else{
			header("Location: index.php?error=Identifiant ou mot de passe incorrect 1");
	        exit();
		}
	}
	
}else{
	header("Location: index.php");
	exit();
}
