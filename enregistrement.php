<?php
	session_start();
?>
<!doctype html>
<html>
<head>
<title>Enregistrement</title>
<?php
// initialisation des variables
$n=$_GET['n'];
$p=$_GET['p'];
$num=$_GET['num'];
$cp=$_GET['cp'];
$ville=$_GET['ville'];
$naiss=$_GET['naissance'];
$mail=$_GET['mail'];
$mdp1=$_GET['mdp1'];
$mdp2=$_GET['mdp2'];
//(aucune des varables est vide ça renvoie vers les pages indexe
	if($n!="" && $p!="" && $num!="" && $cp!=""&& $ville!=""&& $naiss!="" && $mail!="" && $mdp1!="" && $mdp2!="" && $mdp1==$mdp2){
//connexion à la bd
		require('bd.php');
		$bdd=getBD();
//lancement de la requêtte
		$sql=("insert into personne(email ,nom, prenom , date_naissance , tel, cp, ville , mdp)
	     values('$mail','$n','$p','$naiss','$num','$cp','$ville','$mdp1');");
		//echo $sql;
		$bdd->query($sql);
		// tout est OK retours page acceuile
		echo "<meta http-equiv='refresh' content='1; URL=index.php'/>";
	}
	else {
	//renvoi à la page nouveau
	echo "<meta http-equiv='refresh' content='1; URL=nouveau.php'/>";
	}

?>
</head>
</html>
