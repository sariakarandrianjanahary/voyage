<?php
session_start()
?>
<!doctype html>
<html>
<head>
<title>Ajout</title>

<?php
$id=$_GET['id_musee'];
$e=$_SESSION['client']['email'];

  require('bd.php');
    $bdd=getBD();
        $sql=("insert into favoris(id_m , email) values('$id','$e'); ");

    $bdd->query($sql);
    echo "<meta http-equiv='refresh' content='1; URL=panier.php'/>";

 ?>
</head>
</html>
