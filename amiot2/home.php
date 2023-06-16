<?php 
session_start();

if (isset($_SESSION['personne.prs_id']) && isset($_SESSION['personne.identifiant'])) {

?>
<!DOCTYPE html>
<html>
<head>
	<title>HOME</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
     <h1>Bienvenue, <?php echo $_SESSION['personne.nom'];echo $_SESSION['personne.prenom']; ?></h1>
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