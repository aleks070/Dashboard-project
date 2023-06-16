<!DOCTYPE html>
<html>
<head>
	<title>SIGN UP</title>
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
                      value="<?php echo $_GET['uname']; ?>"><br>
          <?php }else{ ?>
               <input type="text" 
                      name="uname" 
                      placeholder="Identifiant"><br>
          <?php }?>

          <label>Nom</label>
          <?php if (isset($_GET['l_name'])) { ?>
               <input type="text" 
                      name="l_name" 
                      placeholder="Nom"
                      value="<?php echo $_GET['l_name']; ?>"><br>
          <?php }else{ ?>
               <input type="text" 
                      name="l_name" 
                      placeholder="Nom"><br>
          <?php }?>

          <label>Prénom</label>
          <?php if (isset($_GET['f_name'])) { ?>
               <input type="text" 
                      name="f_name" 
                      placeholder="Prénom"
                      value="<?php echo $_GET['f_name']; ?>"><br>
          <?php }else{ ?>
               <input type="text" 
                      name="f_name" 
                      placeholder="Prénom"><br>
          <?php }?>

          <label>Date de naissance</label>
          <?php if (isset($_GET['birth'])) { ?>
               <input type="text" 
                      name="birth" 
                      placeholder="Date (JJ/MM/AAAA)"
                      value="<?php echo $_GET['birth']; ?>"><br>
          <?php }else{ ?>
               <input type="date" 
                      name="birth" 
                      placeholder="Date"><br>
          <?php }?>

          <label>Email</label>
          <?php if (isset($_GET['mail'])) { ?>
               <input type="text" 
                      name="mail" 
                      placeholder="Email"
                      value="<?php echo $_GET['mail']; ?>"><br>
          <?php }else{ ?>
               <input type="text" 
                      name="mail" 
                      placeholder="Email"><br>
          <?php }?>

          <label>Numéro de téléphone</label>
          <?php if (isset($_GET['tel'])) { ?>
               <input type="text" 
                      name="tel" 
                      placeholder="Numéro de téléphone"
                      value="<?php echo $_GET['tel']; ?>"><br>
          <?php }else{ ?>
               <input type="text" 
                      name="tel" 
                      placeholder="Numéro de téléphone"><br>
          <?php }?>

          <label>Fonction</label>
          <?php if (isset($_GET['fonc'])) { ?>
               <input type="text" 
                      name="fonc" 
                      placeholder="Fonction"
                      value="<?php echo $_GET['fonc']; ?>"><br>
          <?php }else{ ?>
               <input type="text" 
                      name="fonc" 
                      placeholder="Fonction"><br>
          <?php }?>          

     	<label>Mot de passe</label>
     	<input type="password" 
                 name="password" 
                 placeholder="Mot de passe"><br>

          <label>Confirmer le mot de passe</label>
          <input type="password" 
                 name="re_password" 
                 placeholder="Confirmer le mot de passe"><br>

     	<button type="submit">Sign Up</button>
          <a href="index.php" class="ca">Already have an account?</a>
     </form>
</body>
</html>
