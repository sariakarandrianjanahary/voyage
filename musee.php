<?php
	session_start();
?>
<html>
<head>
<title>hotel</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" href="sariaka.css" type="text/css" media="screen" />
</head>
<body>
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
$dep=$_GET['d'];

 if ($dep==""){//au moins un vide
    echo "<meta http-equiv='refresh' content='1; URL=index.php'/>"; //renvoi vers la page d'Acceuil
 }else {
	   require('bd.php'); //connexion au serveur
     $bdd=getBD();
	    $rep = $bdd->query("select * from musee where nomD='$dep' "); // on lance la requête jointurs
				$nb=$rep->rowCount();
				if ($nb > 0){
					echo "<div class='d3'>"; //affiche le nombre des résulats obtenue
						echo "<h3> Nous avons trouvé ".$nb." musées dans le département de ".$dep." :</h3>";
					echo "</div>";

					echo "<div class='liste'>";
          while($musee = $rep->fetch()) { // parcours de la table musee pour afficher les résultats
           echo "<ul class='mus'>";
					 	echo "<br>";
            echo "<li class='nom'>".$musee['nomM']."</li>";
						echo "<li class='adresse'>Adresse : ".$musee['adr']."</li>";
            echo "<li><img class='imagetableau' src='".$musee['url_photo']."'/></li>";
            echo "</ul>";
            echo "<div class='ajouter'>";
						 if(isset($_SESSION['client'])){
							 ?>
								<form methode='GET' action='ajouter.php'>
									<input type='hidden' name='id_musee' value='<?php echo "".$musee['id_m']."";?>'>
									<input type='submit' value='Ajouter dans mes favoris'>
						 	</form>
							<?php
						}
            echo "</div>";
            echo "<div class='bouton'>";
                echo "<p><a href='".$musee['site']."'>visiter</a></p>";
            echo "</div>";
						echo "<br>";
						echo "<hr>";
          }
       $rep ->closeCursor();
			 echo "</div>";
		 }else{
			 echo "<h3>Nous n'avons pas trouvé de musée qui correspond à votre recherche</h3> " ;
			 echo "<meta http-equiv='refresh' content='3; URL=index.php'/>";//
		 }
  }
 ?>

</body>
</html>
