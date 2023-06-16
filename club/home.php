<?php 
session_start();

if (isset($_SESSION['prs_id']) && isset($_SESSION['identifiant'])) {

?>
<!DOCTYPE html>
<html>
<head>
	<title>Accueil</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
     <h1>Bonjour, <?php echo $_SESSION['firstname']; echo $_SESSION['name']; ?></h1>
     <nav class="home-nav">
     	<a href="change-password.php">Changer le mot de passe</a>
        <a href="logout.php">Se déconnecter</a>
     </nav>
     
</body>
</html>

<?php 
}else{
     header("Location: index.php");
     exit();
}
?>