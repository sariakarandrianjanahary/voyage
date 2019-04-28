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
<div class="d1">
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
</br>
 <?php
 if (isset($_SESSION['client'])){
 $e=$_SESSION['client']['email'];

  require('bd.php');
   $bdd=getBD();
      $req = $bdd->query("select musee.nomM , musee.url_photo from musee , personne , favoris
      where favoris.email=personne.email and musee.id_m=favoris.id_m and favoris.email='$e'" );
      echo "<div class='d6'>";
        while($musee = $req->fetch()){
            echo "<ul class='mus'>";
            echo "<br>";
            echo "<li class='nom'>".$musee['nomM']."</li>";
            echo "<li><img class='imagetableau' src='".$musee['url_photo']."'/></li>";
            echo "</ul>";
            echo "<div class='bouton'>";
                echo "<p><a href='".$musee['site']."'>visiter</a></p>";
            echo "</div>";
        }
      $req ->closeCursor();
    echo "</div>";
}
 ?>
</div>
</body>
</html>
