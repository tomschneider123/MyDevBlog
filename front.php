<!DOCTYPE html>
<html>

<body>
        <header>
        <h1>Summer Code Camp de Tom Schneider !</h1>
        </header>

<main class="accueil">
            <h2>MyDevBlog Project - Front Office</h2>
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

echo "<table border=1>";

            $articles = $pdo -> query("SELECT * FROM `articles` ORDER BY date_publication DESC LIMIT 5")->fetchall();
            foreach($articles as $article)
            {
             echo "<tr>";
             echo $article['titre']."<br>";
             echo "<img src=".$article['image']." width='200' height='200'>";  
             echo "publie le : ".$article['date_publication']." par ".$article['auteur']."<br>";
             echo $article['contenu']."</tr><br><br><br><br><br>";
            }
            echo "</table>";

?>
</main>
        <footer>
            <nav>
                <br/>
                <a href="BO_connexion.php">Ajout d'article</a>
                <a href="BO_connexion.php">Liste des utilisateurs</a>
            </nav>
        </footer>
    </body>
</html>