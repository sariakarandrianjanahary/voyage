<?php
  session_start();

 ?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" href="sariaka.css" type="text/css" media="screen" />
<title>Acceuil </title>
</head>
<body>
  <div class='d1'>
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


<div class="d4">
      <center>
        <button class="tablink" onclick="openPage('Home', this , '#117A65')" >Hôtel</button>
        <button class="tablink" onclick="openPage('News', this , '#117A65')" id="defaultOpen" >Musée</button>
      </center>

      <center>
        <div id="Home" class="tabcontent">
          <div class="bleu">
            <form method="GET" action="hotel.php" autocomplet="off">

        <p>  Nom du département:<select name="d">
            <option value=''></option>
            <option value='PARIS'>PARIS </option>
            <option value='VINCENNES'>VINCENNES </option>
            <option value='VERSAILLES'>VERSAILLES </option>
            <option value='ROISSY CHARLES DE GAULLE'>ROISSY CHARLES DE GAULLE </option>
            <option value='CHILLY-MAZARIN'>CHILLY-MAZARIN </option>
            <option value='SURESNES'>SURESNES </option>
            <option value='IVRY-SUR-SEINE'>IVRY-SUR-SEINE</option>
            <option value='MEUDON-LA-FÔRET'>MEUDON-LA-FÔRET </option>
            <option value='SAINT-DENIS'>SAINT-DENIS </option>
            <option value='BOBIGNY'>BOBIGNY </option>
            <option value='GENNEVILLIERS'>GENNEVILLIERS </option>
            <option value='RUEIL-MALMAISON'>RUEIL-MALMAISON </option>
            <option value='LEVALLOIS-PERRET'>LEVALLOIS-PERRET </option>
            <option value="VILLEPINTE"> VILLEPINTE</option>
            <option value='ROISSY-EN-FRANCE'>ROISSY-EN-FRANCE</option>
            <option value='PARIS LA DÉFENSE'>PARIS LA DÉFENSE</option>
            <option value='ISSY-LES-MOULINEAUX'>ISSY-LES-MOULINEAUX</option>
            <option value='CERGY'>CERGY</option>
            <option value='BOULOGNE-BILLANCOURT'>BOULOGNE-BILLANCOURT</option>
            <option value='BOULOGNE'>BOULOGNE</option>
            <option value='ORLY'>ORLY </option>
            <option value='NOISY LE GRAND'>NOISY LE GRAND </option>
          </select>


          Confort:<select name="c">
            <option value=''></option>
            <option value='1'>1 étoiles </option>
            <option value='2'>2 étoiles</option>
            <option value='3'>3 étoiles </option>
            <option value='4'>4 étoiles</option>
            <option value='5'>5 étoiles</option>
          </select>
        </p>
        <br>
            <input type="submit" value="recherche">
          </form>
      </div>
    </div>
    </center>

    <center>
    <div id="News" class="tabcontent">
      <div class="bleu">
        <form method="GET" action="musee.php" autocomplet="off">
          Nom du département:<select name="d">
            <option value=''></option>
            <option value='PARIS'>PARIS </option>
            <option value="VAL D OISE">VAL D OISE</option>
            <option value='HAUTS DE SEINE'>HAUTS DE SEINE</option>
            <option value='VAL DE MARNE'>VAL DE MARNE</option>
            <option value='YVELINES'>YVELINES</option>
            <option value='SEINE ET MARNE'>SEINE ET MARNE</option>
            <option value='ESSONNE'>ESSONE</option>
            <option value='SEINE SAINT-DENIS'>SEINE SAINT-DENIS</option>
          </select>
          <br><br>
            <input type="submit" value="recherche">

        </form>
      </div>
    </div>
    </center>

    <script>
    function openPage(pageName,elmnt,color) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablink");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].style.backgroundColor = "";
        }
        document.getElementById(pageName).style.display = "block";
        elmnt.style.backgroundColor = color;

    }
    document.getElementById("defaultOpen").click();
    </script>

  </div>
</div>
<p class="p1">
Bienvenue !Paris : une ville mythique, à découvrir .On a beau l’avoir vue maintes fois en photo ou l’avoir déjà visitée et revisitée,
Paris ne cessera de vous impressionner. Si vous découvrez la ville Lumière pour
la première fois, apprêtez-vous à vivre des moments magiques. Ville connue dans
le monde entier, Paris séduit principalement par ses sites légendaires que nous
vous invitons à apprécier au gré de vos promenades dans la capitale.
La Tour Eiffel, les Champs-Élysées et l’Arc de Triomphe, le musée du Louvre,
Notre-Dame, le Panthéon sans oublier la place Vendôme ou encore les Tuileries
font partie de ces lieux incontournables à visiter dans la capitale.
</p>
<center>
  <br><hr width="60%" size="4" color="#0B5345"><br></center>
  <h2>Les coups de coeurs du moment</h2>
  <center>


        <p class="p1">Veuillez decouvrir ci-aprés nos plus beaux musées à visiter dans la région île-de-France
          et ausi les plus recommander  : </p>

          <?php
              require('bd.php'); //connexion au serveur
              $bdd=getBD();
     	        $r1 = $bdd->query("select count(*) , m.url_photo , m.nomM , m.site FROM musee as m , favoris as f
                  where f.id_m=m.id_m group by m.url_photo , m.nomM , m.site order by count(*) DESC LIMIT 0,3");
                  while($m = $r1->fetch()) {
                    echo "<table class='t1'>";
                    echo "<tr>";
                    echo "<td><a href='".$m['site']."'><img class='sary' src='".$m['url_photo']."'/></td>";
                    echo "</tr>";
                    echo "<tr>";
                    echo "<td class='td1'><a href='".$m['site']."'>".$m['nomM']."</a></td>";
                    echo "</tr>";
                    echo "</table>";
                  }
                $r1 ->closeCursor();
           ?>
         <br></br>
           <br><hr width="60%" size="4" color="#0B5345"><br>
  </center>

<div id="degrade">
  <p><img class="img1" src="image/logo.jpg"/></p>
  <div class="d8">
    <h4>INFOS :</h4></br>
      <p><a href="mailto:sarobidy.16@yahoo.fr">Contact</a></p></br>
      <p><a href="tel:+33650565906">0650565906</a></p>
  </div>
  <div class="d9">
    <h4>CONNECTER :</h4></br>
      <p><a href='nouveau.php'>Inscription</a></li></p></br>
      <p><a href='connexion.php'>Se connecter</a></li></p>
  </div>
</div>
</body>
</html>
