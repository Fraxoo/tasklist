<?php
session_start();

$_SESSION['login'];

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

$addtask = $_POST["addtask"];

if(isset($addtask)){

$insertask = $bdd->prepare('INSERT INTO task(task) VALUES (:task)');
$insertask->execute([
    'task' => $addtask
]);
}

$tasks = $bdd->query('SELECT * FROM task');
$tasks->execute();
$taches = $tasks->fetchAll();


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>tasklist</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Luckiest+Guy&display=swap" rel="stylesheet">
</head>



<body>

<div class="connect">
    <a href="inscription.php">S'inscrire</a>
    <a href="connexion.php">Se connecter</a>
</div>

<div class="main">
    <div class="matodo">
        <p>Ma</p>
        <h1>To do list</h1>
    </div>

    <div class="add">
        <form action="/" method="post">
            <input type="text" name="addtask" placeholder="Ajoutez une tache :" required>
            <button type="submit">Ajoutez</button>
        </form>
    </div>

    <?php foreach($taches as $tache):?>

    <div class="taches">

        <div class="list">
            <input type="checkbox">
            <?php echo $tache['task']."\n"?>
        </div>
        
        <?php endforeach;?>

    </div>

</div>

</body>
</html>