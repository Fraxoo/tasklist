<?php

session_start();

$_SESSION['account'];

$user = "root";
$pass = "root";
try

{
$bdd = new PDO('mysql:host=127.0.0.1;port=3306;dbname=app-database', $user, $pass);
}

catch (Exception $e)

{

    die('Erreur : ' . $e->getMessage());

}

if (isset($_POST['mail'], $_POST['password'])) {

    $mail = $_POST['mail'];
    $password = $_POST['password'];

    $stmt = $bdd->prepare("SELECT id FROM account WHERE mail = :mail AND password = :password");
    $stmt->execute([
        'mail' => $mail,
        'password' => $password
    ]);

    $user = $stmt->fetch();

    if ($user) {
        echo "connexion reussi";
    } else {
        echo "Email ou mot de passe incorrect.";
    }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style3.css">
    <title>tasklist</title>
</head>



<body>

<div class="all">

    <div class="acceuil">
        <a  href="index.php">Acceuil</a>  
    </div>  
    
<div class="square">

    <form action="connexion.php" method="post">

    <div class="inscription">
        <h2>CONNEXION</h2>
    </div>

    <div class="login">

        

    </div>
    
    <div class="mail">
        <p>Adresse mail</p>
        <input type="email" name="mail" placeholder="Votre mail:">
    </div>

    <div class="password">
        <p>Mot de passe</p>
        <input type="password" name="password" placeholder="Mot de Passe">
    </div>

    <div class="submit">
        <button type="submit">Se Connecter</button>
    </div>

    <div class="deja">
        <p>Vous n'avez pas de compte ?  <a href="inscription.php">Creer un compte </a></p>
    </div>

    </form>

</div>

</div>

</body>
</html>