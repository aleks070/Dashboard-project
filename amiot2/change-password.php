<?php 
session_start();

if (isset($_SESSION['personne.prs_id']) && isset($_SESSION['personne.identifiant'])) {

?>
<!DOCTYPE html>
<html>
<head>
	<title>Change Password</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <form action="change-p.php" method="post">
     	<h2>Changer votre mot de passe</h2>
     	<?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     	<?php } ?>

     	<?php if (isset($_GET['success'])) { ?>
            <p class="success"><?php echo $_GET['success']; ?></p>
        <?php } ?>

     	<label>Ancien mot de passe</label>
     	<input type="password" 
     	       name="op" 
     	       placeholder="Ancien mot de passe">
     	       <br>

     	<label>Nouveau mot de passe</label>
     	<input type="password" 
     	       name="np" 
     	       placeholder="Nouveau mot de passe">
     	       <br>

     	<label>Confirmer le mot de passe</label>
     	<input type="password" 
     	       name="c_np" 
     	       placeholder="Confirmer le mot de passe">
     	       <br>

     	<button type="submit">APPLIQUER</button>
          <a href="home.php" class="ca">HOME</a>
     </form>
</body>
</html>

<?php 
}else{
     header("Location: index.php");
     exit();
}
 ?>