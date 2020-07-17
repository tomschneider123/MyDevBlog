<html>

<body>
        <header>
        <h1>Summer Code Camp de Tom Schneider !</h1>
        </header>
        <main class="accueil">
            <h2>Gestion des utilisateurs - Back Office</h2>

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
<tr><td>Nom d'utilisateur</td><td>Login</td><td>Supression</td></tr>";
            $users = $pdo -> query("SELECT * FROM utilisateurs")->fetchall();
            foreach($users as $user)
            {
                $str = "<form   action = 'BO_supprimer_utilisateur.php'  method = 'post'><input type = 'hidden' name = 'login' value = '".$user['login']."'/> <input type = 'submit' value = 'Supprimer'>  </form>"; 
                echo "<tr><td>".$user['nom']."</td><td>".$user['login']."</td><td> ".$str." </td></tr>";
            }
            echo "</table>";
?>

<br/>

<form  
action = "BO_creer_utilisateur.php"
method = "post">

<table>
<tr> <td>Nom d'utilisateur</td> <td><input type = "text"
name = "nom"/></td> </tr>
<tr> <td>login</td> <td><input type = "text"
name = "login"/></td> </tr>
<tr> <td>password</td> <td><input type = "password"
name = "mot_de_passe"/></td> </tr>
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