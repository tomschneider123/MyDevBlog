<html>
<?php

session_start();

function connect_to_database()
{
$servername = "localhost";
$username = "tom";
$password = "2020";
$databasename = "mydevblog";



try
{
    $pdo = new PDO("mysql:host=$servername;dbname=$databasename", $username, $password);
    $pdo->setattribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  //  echo "connected successfully";

    return $pdo;
}
catch (PDOException $e)
{
  echo "Connexion failed : ".$e->getMessage();
}
}
$pdo = connect_to_database();

$query = $pdo -> query("SELECT * FROM utilisateurs WHERE login = '" . $_POST['login'] . "' AND mot_de_passe = '" . $_POST['password']."'");
$user = $query -> fetch();

if($user)
{
  $_SESSION = $user['login'];
echo " <html>

<body>
        <header>
        <h1>Summer Code Camp de Tom Schneider !</h1>
        </header>";
        echo "Bienvenue ".$_SESSION;
  echo "</body> <footer>
  <nav>
      <br/>
      <a href='BO_ajout_article.php'>Ajout d'article</a>
      <a href='BO_ajout_utilisateur.php'>Liste des utilisateurs</a>
  </nav>
</footer> </html> ";
}

else
{
 echo " <html>

<body>
        <header>
        <h1>Summer Code Camp de Tom Schneider !</h1>
        </header>";
  echo "Votre compte n'a pas été reconnu, <a href='BO_connexion.php'>cliquez ici</a> pour revenir à la page de connexion";
  echo "</body> <footer>
  <nav>
      <br/>
      <a href=''>Ajout d'article</a>
      <a href=''>Liste des utilisateurs</a>
  </nav>
</footer> </html> ";
}




?>

</html>