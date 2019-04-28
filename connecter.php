<?php
	session_start();
?>
<!doctype html>
<html>
<head>
<title>authetification</title>
<?php
//initialisation des variables
$e=$_GET['email'];
$m=$_GET['mdp'];

if($e!="" && $m!=""){//si c'est pas vide (tout est OK)
  require('bd.php');
    $bdd=getBD();
     $rep=$bdd->query("select * from personne where email='$e' and mdp='$m'");
        while($personne = $rep->fetch()) {
          session_start();
						$session['client']=array();
						$_SESSION['client']['email']="".$personne['email']."";
           	$_SESSION['client']['prenom']="".$personne['prenom']."";
              $_SESSION['client'];
           echo "<meta http-equiv='refresh' content='1; URL=index.php'/>";
        }
        $rep ->closeCursor();
  }else{
    echo '<body onLoad="alert(\'Membre non reconnu...\')">';
    echo "<meta http-equiv='refresh' content='1; URL=connexion.php'/>";
  }

?>
</head>
</html>
