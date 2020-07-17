<html>

<body>
        <header>
        <h1>Summer Code Camp de Tom Schneider !</h1>
        </header>
        <main class="accueil">
            <h2>Gestion des articles - Back Office</h2>

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
echo "<table border=1>
<tr><td>Titre</td><td>Image</td><td>Date de publication</td> <td>Auteur</td><td>Extrait</td></tr>";

            $articles = $pdo -> query("SELECT * FROM articles")->fetchall();
            foreach($articles as $article)
            {
                echo "<tr><td>".$article['titre']."</td><td>".$article['image']."</td><td>".$article['date_publication']."</td><td>".$article['auteur']."</td><td>".$article['extrait']."</td></tr>";
            }
            echo "</table>";
?>

<br/>

<form  
action = "BO_creer_article.php"
method = "post">

<table>
<tr> <td>Titre</td> <td><input type = "text"
name = "titre"/></td> </tr>
<tr> <td>Image</td> <td><input type = "text"
name = "image"/></td> </tr>
<tr> <td>Date de publication</td> <td><input type = "text"
name = "date_publication"/></td> </tr>
<tr> <td>Auteur</td> <td><input type = "text"
name = "auteur"/></td> </tr>
<tr> <td>Contenu</td> <td><input size = 100 type = "textarea"
name = "contenu"/></td> </tr>
<tr> <td></td> <td><input type = "submit"
value = "Créer"></td> </tr>
</table>

</form>

</main>
        <footer>
            <nav>
                <br/>
                <a href='BO_ajout_article.php'>Ajout d'article</a>
                <a href='BO_ajout_utilisateur.php'>Liste des utilisateurs</a>
                <a href="front.php">Le blog</a>
            </nav>
        </footer>
    </body>
</html>