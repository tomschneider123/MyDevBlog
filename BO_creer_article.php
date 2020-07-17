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

//$sql = "INSERT INTO utilisateurs(id,login,password,img-path) VALUES (1,'a','b','c') ";
$sql = "INSERT INTO `articles`(`titre`, `image`, `date_publication`, `auteur`, `contenu`, `extrait`) VALUES ('".$_POST['titre']."','".$_POST['image']."','".$_POST['date_publication']."','".$_POST['auteur']."','".$_POST['contenu']."','".$_POST['contenu']."')";

$stmt= $pdo->prepare($sql);
$stmt->execute();
//$stmt->execute([$_POST['login_user'], $_POST['password_user'], 'c:/images/moi.jpg']);
echo "<br>L'article intitulé :  ".$_POST['titre']." a été créé.";
echo "<br/>";
echo "<a href='BO_ajout_article.php'>Cliquez ici</a> pour revenir à la page de gestion des articles.";

?>

</html>