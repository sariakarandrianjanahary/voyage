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
  //initialisation des variable
  $d=$_GET['d'];
  $c=$_GET['c'];

  if ($d!="" && $c!=""){ //si le nom du département est entrée avec le confort
  require('bd.php');
    $bdd=getBD();
    $rep =$bdd->query("select * from hotel where commune='$d' and confort='$c'");
			$nb=$rep->rowCount();

			if($nb <= 0){
				echo "<h3>Nous n'avons pas trouvé d'hôtel qui correspond à votre recherche</h3> " ;
				echo "<meta http-equiv='refresh' content='3; URL=index.php'/>";//mila avadika boutton retour
			}else{
				echo "<div class='d3'>"; //affiche le nombre des résulats obtenue
					echo "<h3> Nous avons trouvé ".$nb." Hôtels dans le département de ".$d." pour le confort ".$c." étoiles :</h3>";
				echo "</div>";
    		echo "<div class='liste'>";
      		while ($hotel = $rep->fetch()) { // parcours de la table hotel pour afficher les noms et les sites
        		echo "<lu class='mus'>";
        		echo "<li class='nom'>".$hotel['nomH']."</li>";
        		echo "<li class='adresse'>".$hotel['adresse']." ".$hotel['cp']." ".$hotel['commune']."</li>";
        		echo "<div class='bouton'>";
          	echo "<p><a href='".$hotel['url']."'>Reserver</a></p>";
        		echo "</div>";
        		echo "</lu>";
						echo "<hr>";
      		}
      	$rep ->closeCursor();
    	echo "</div>";
		}


  }elseif ($d!="" && $c=="") { // y a que le nom du département qui a été renseigné
    require('bd.php');
    $bdd=getBD();
    $sql =$bdd->query("select * from hotel where commune='$d'");
			$nb1=$sql->rowCount();
					echo "<div class='d3'>";
					echo "<h3>Nous avons trouvé ".$nb1." Hôtels dans le département de ".$d." : </h3>";
					echo "</div>";
    				echo "<div class='liste'>";
      					while ($hotel = $sql->fetch()) { // parcours de la table hotel pour afficher les noms et les sites
        					echo "<lu class='mus'>";
        						echo "<li class='nom'>".$hotel['nomH']."</li>";
        						echo "<li class='adresse'>".$hotel['adresse']." ".$hotel['cp']." ".$hotel['commune']."</li>";
        					echo "<div class='bouton'>";
          						echo "<p><a href='".$hotel['url']."'>Reserver</a></p>";
        					echo "</div>";
        					echo "</lu>";
									echo "<hr>";
      					}
      					$sql ->closeCursor();
      			echo "</div>";
  }else{
    echo "<meta http-equiv='refresh' content='1; URL=index.php'/>";
  }
   ?>

</body>
</html>
