<?php
	session_start();
?>
<!doctype html>
<html>
<head>
<title>Nouveau</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" href="sariaka.css" type="text/css" media="screen" />
</head>
<body>
	<div class='d10'>
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
<br>
<h2>Créer un compte</h2>
	<div class="fond">

  	<form method="GET" action="enregistrement.php" autocomplet="off" id="form">
      <p>
      Civilité:<select name="fonction">
        <option value="M.">Monsieur</option>
        <option value="Mme">Madame</option>
        <option value="Mlle">Mademoiselle</option>
    </select>
    </p>
  		<p>Nom: <input type="text" name="n" id="name" placeholder="Nom" />
        <span class="error"></span>
  		Prénom: <input type="text" name="p" id="firstname" placeholder="Prénom" />
        <span class="error"></span>
      </p>
  		<p>
  		Téléphone: <input type="text" name="num" id="num" placeholder="Numero">
      <span class="error"></span>
  		</p>
  		<p>
        Ville: <input type="text" name="ville" id="ville" placeholder="Ville"/>
        <span class="error"></span>
  		Code postal: <input type="number" name="cp" id="cp" placeholder="codepostal" />
        <span class="error"></span>
  		</p>
  		<p>
  		Date de naissance : <input type="date" name="naissance" id="naissance"/>
      <span class="error"></span>
  	</p>
    <hr>
  	<p>
  		Adresse e-mail: <input type="text" name="mail" id="mail" placeholder="adresse@mail.com" />
      <span class="error"></span>
  	</p>
  	<p>
  		Mot de passe: <input type="password" name="mdp1" id="mdp1" placeholder="Mots de pass" />
      <span class="error"></span>
  		Confirmer votre Mot de passe :<input type="password" name="mdp2" id="mdp2" placeholder="Confirmer" />
      <span class="error"></span>
  	</p>
  	<p class='compte'>
  		<input type="submit" value="Je crée mon compte">
  	</p>
  </form>
  </div>
</div>
<script type="text/javascript" src="formulaire.js"></script>
</body>
</html>
