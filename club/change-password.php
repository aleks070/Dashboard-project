<?php 
session_start();

if (isset($_SESSION['prs_id']) && isset($_SESSION['identifiant'])) {

?>
<!DOCTYPE html>
<html>
<head>
	<title>Changement mot de passe</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <form action="change-p.php" method="post">
     	<h2>Changer le mot de passe</h2>
     	<?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     	<?php } ?>

     	<?php if (isset($_GET['success'])) { ?>
            <p class="success"><?php echo $_GET['success']; ?></p>
        <?php } ?>

     	<label>Ancien mot de passe</label>
     	<input type="password" 
     	       name="op" 
     	       placeholder="Mot de passe">
     	       <br>

     	<label>Nouveau mot de passe</label>
     	<input type="password" 
     	       name="np" 
     	       placeholder="Mot de passe">
     	       <br>

     	<label>Confirmer le mot de passe</label>
     	<input type="password" 
     	       name="c_np" 
     	       placeholder="Mot de passe">
     	       <br>

     	<button type="submit">CHANGER</button>
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
