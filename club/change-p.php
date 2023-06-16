<?php 
session_start();

if (isset($_SESSION['prs_id']) && isset($_SESSION['identifiant'])) {

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
    	$op = hash('sha256',$op);
    	$np = hash('sha256',$np);
        $id = $_SESSION['prs_id'];

        $sql = "SELECT mdp
                FROM personne WHERE 
                prs_id='$id' AND mdp='$op'";
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result) === 1){
        	
        	$sql_2 = "UPDATE personne
        	          SET mdp='$np'
        	          WHERE prs_id='$id'";
        	mysqli_query($conn, $sql_2);
        	header("Location: change-password.php?success=Votre mot de passe a été changé avec succès !");
	        exit();

        }else {
        	header("Location: change-password.php?error=Mot de passe incorrect");
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