<?php

session_start();

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

$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$mail = $_POST['mail'];
$password = $_POST['password'];

if(isset($nom,$prenom,$mail,$password)){
   $verifMail = $bdd->prepare("SELECT COUNT(*) FROM account WHERE mail = :mail");
    $verifMail->execute(['mail' => $mail]);
    $count = $verifMail->fetchColumn();

    if($count > 0){
        $used = "Adresse email déjà utilisée.";
    }else{
        if(isset($nom,$prenom,$mail,$password)){
            $ajoutcompte = $bdd->prepare("INSERT INTO account(nom,prenom,mail,password) VALUES(:nom,:prenom,:mail,:password)");
            $ajoutcompte->execute([
                'nom' => $nom,
                'prenom' => $prenom,
                'mail' => $mail,
                'password' => $password
            ]);
        }
    }

}



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

<div class="all">

        <div class="acceuil">
            <a  href="index.php">Acceuil</a>  
        </div>  

    <div class="square">

        <form action="inscription.php" method="post">

        <div class="inscription">
            <h2>INSCRIPTION</h2>
        </div>

        <div class="login">
            
            <div class="nom">
                <p>Nom</p>
                <input type="text" name="nom" placeholder="Nom:" required>
            </div>

            <div class="prenom">
                <p>Prénom</p>
                <input type="text" name="prenom" placeholder="Prénom" required>
            </div>

        </div>
        
        <div class="mail">
            <div class="used">
                <p>Adresse mail</p>
                <p class="red"><?=$used;?></p>
            </div>
            <input type="email" name="mail" placeholder="Votre mail:">
        </div>

        <div class="password">
            <p>Mot de passe</p>
            <input type="password" name="password" placeholder="Mot de Passe">
        </div>

        <div class="submit">
            <button type="submit">S'inscrire</button>
            
        </div>
        
        

        <div class="deja">
            <p>Vous avez deja un compte ? <a href="connexion.php">Se connecter</a></p>
        </div>

        </form>

    </div>

</div>

</body>
</html>