<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

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
        $pass = hash("sha256",$pass);

        
		//$sql = "SELECT * FROM users WHERE user_name='$uname' AND password='$pass'";
		$sql = "SELECT * FROM personne WHERE personne.identifiant='$uname' AND personne.mdp='$pass'";

		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) === 1) {
			$row = mysqli_fetch_assoc($result);
            if ($row['identifiant'] === $uname && $row['mdp'] === $pass) {    
		$_SESSION['identifiant'] = $row['identifiant'];
		$_SESSION['nom'] = $row['nom'];
		$_SESSION['prenom'] = $row['prenom'];
		$_SESSION['prs_id'] = $row['prs_id'];
		var_dump($_SESSION);
            	header("Location: home.php");
		        exit();
            }else{
				header("Location: index.php?error=Incorect User name or password");
		        exit();
			}
		}else{
			header("Location: index.php?error=Incorect User name or password");
	        exit();
		}
	}
	
}else{
	header("Location: index.php");
	exit();
}

