<!DOCTYPE html>
<html>
<head>
	<title>S'inscrire</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
     <form action="signup-check.php" method="post">
     	<h2>Créer un compte</h2>
     	<?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     	<?php } ?>

          <?php if (isset($_GET['success'])) { ?>
               <p class="success"><?php echo $_GET['success']; ?></p>
          <?php } ?>
          

          <label>Identifiant</label>
          <?php if (isset($_GET['uname'])) { ?>
               <input type="text" 
                      name="uname" 
                      placeholder="Identifiant"
                      value="<?php echo $_GET['uname']; ?>">
          <?php }else{ ?>
               <input type="text" 
                      name="uname" 
                      placeholder="Identifiant">
          <?php }?>

          <label>Nom</label>
          <?php if (isset($_GET['name'])) { ?>
               <input type="text" 
                    name="name" 
                    placeholder="Nom"
                    value="<?php echo $_GET['name']; ?>"><br>
          <?php } else { ?>
               <input type="text" 
                    name="name" 
                    placeholder="Nom"><br>
          <?php } ?>

          <label>Prénom</label>
          <?php if (isset($_GET['firstname'])) { ?>
               <input type="text" 
                    name="firstname" 
                    placeholder="Prénom"
                    value="<?php echo $_GET['firstname']; ?>">
          <?php } else { ?>
               <input type="text" 
                    name="firstname" 
                    placeholder="Prénom">
          <?php } ?>

          <label>Date de naissance</label>
          <?php if (isset($_GET['birth'])) { ?>
               <input type="date" 
                    name="birth" 
                    placeholder="Date de naissance"
                    value="<?php echo $_GET['birth']; ?>"><br>
          <?php } else { ?>
               <input type="date" 
                    name="birth" 
                    placeholder="Date de naissance"><br>
          <?php } ?>

          <label>Email</label>
          <?php if (isset($_GET['mail'])) { ?>
               <input type="text" 
                    name="mail" 
                    placeholder="Email"
                    value="<?php echo $_GET['mail']; ?>">
          <?php } else { ?>
               <input type="text" 
                    name="mail" 
                    placeholder="Email">
          <?php } ?>

          <label>Téléphone</label>
          <?php if (isset($_GET['tel'])) { ?>
               <input type="text" 
                    name="tel" 
                    placeholder="Téléphone"
                    value="<?php echo $_GET['tel']; ?>"><br>
          <?php } else { ?>
               <input type="text" 
                    name="tel" 
                    placeholder="Téléphone"><br>
          <?php } ?>

          <label>Rôle</label>
          <?php if (isset($_GET['fonc'])) { ?>
               <input type="text" 
                    name="fonc" 
                    placeholder="Rôle"
                    value="<?php echo $_GET['fonc']; ?>"><br>
          <?php } else { ?>
               <input type="text" 
                    name="fonc" 
                    placeholder="Rôle"><br>
          <?php } ?>


     	<label>Mot de passe</label>
     	<input type="password" 
                 name="password" 
                 placeholder="Mot de passe">

          <label>Confirmer le mot de passe</label>
          <input type="password" 
                 name="re_password" 
                 placeholder="Mot de passe"><br>

     	<button type="submit">S'inscrire</button>
          <a href="index.php" class="ca">Vous avez déjà un compte ?</a>
     </form>
</body>
</html>
