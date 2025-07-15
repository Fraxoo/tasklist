<?php


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style2.css">
    <title>tasklist</title>
</head>



<body>

<div class="square">

    <form action="index.php" method="post">

    <div class="inscription">
        <h2>INSCRIPTION</h2>
    </div>

    <div class="login">

        <div class="nom">
            <p>Nom</p>
            <input type="text" name="nom" placeholder="Nom:">
        </div>

        <div class="prenom">
            <p>Prénom</p>
            <input type="text" name="prenom" placeholder="Prénom">
        </div>

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
        <a href="connexion.php">S'inscrire</a>
    </div>

    <div class="deja">
        <p>Vous avez deja un compte ? <a href="connexion.php">Se connecter</a></p>
    </div>

    </form>

</div>



</body>
</html>