<?php
	session_start();
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" href="sariaka.css" type="text/css" media="screen" />
<title>Formulaire d'authetification  </title>
</head>
<body>
<div class="d2">
	<div id="menu">
		<ul>
			<li class="r"><?php if(isset($_SESSION['client'])){
				echo "Bienvenue ".$_SESSION['client']['prenom'];
				echo "<ul>";
				echo "<li><a href='deconnexion.php'>Déconexion</a></li>" ;
				echo "<li><a href='panier.php'>Mes Favoris</a></li>" ;
				echo "</ul>";
			}else{
				echo "Me connecter";
				echo "<ul>";
				echo "<li><a href='nouveau.php'>Créer un compte</a></li>" ;
				echo "<li><a href='connexion.php'>Se connecter</a></li>" ;
				echo "</ul>";
			}
			?>
			</li>
		</ul>
	</div>
<a href="index.php"><img id="logo" src="image/logo.jpg"/></a>
<br></br>
  <h2>Authentification</h2>
  <div class="fond">
  	<center>
  		<p><form method="GET" action="connecter.php" autocomplet="off"></p>
  		<p>Email:<input type="text" name="email" value=""></p>
  		<p>  Mot de passe <input type="password" name="mdp" value=""></p>
  		<p align='center'><input type="submit" value="Connexion"></p>
			<br>
  		<p class="mp"><a href="nouveau.php"> Créer un compte </a></p>
			</form>
  	</center>
  </div>
</div>
</body>
</html>
