<?php 
session_start();

if (isset($_SESSION['personne.prs_id']) && isset($_SESSION['personne.identifiant'])) {

    include "db_conn.php";

if (isset($_POST['op']) && isset($_POST['np'])
    && isset($_POST['c_np'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$op = validate($_POST['op']);
	$np = validate($_POST['np']);
	$c_np = validate($_POST['c_np']);
    
    if(empty($op)){
      header("Location: change-password.php?error=Old Password is required");
	  exit();
    }else if(empty($np)){
      header("Location: change-password.php?error=New Password is required");
	  exit();
    }else if($np !== $c_np){
      header("Location: change-password.php?error=The confirmation password  does not match");
	  exit();
    }else {
    	// hashing the password
    	$op = hash("sha256",$op);
    	$np = hash("sha256",$np);
        $id = $_SESSION['personne.prs_id'];

        $sql = "SELECT mdp.mot_de_passe
                FROM mdp WHERE 
                mdp.id='$id' AND mdp.mot_de_passe='$op'";
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result) === 1){
        	
        	$sql_2 = "UPDATE mdp
        	          SET mdp.mot_de_passe='$np'
        	          WHERE mdp.id='$id'";
        	mysqli_query($conn, $sql_2);
        	header("Location: change-password.php?success=Your password has been changed successfully");
	        exit();

        }else {
        	header("Location: change-password.php?error=Incorrect password");
	        exit();
        }

    }

    
}else{
	header("Location: change-password.php");
	exit();
}

}else{
     header("Location: index.php");
     exit();
}