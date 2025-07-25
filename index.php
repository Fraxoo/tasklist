<?php

session_start();



$user = "root";
$pass = "root";

try {
    $bdd = new PDO('mysql:host=127.0.0.1;port=3306;dbname=app-database', $user, $pass);
} catch (Exception $e) {

    die('Erreur : ' . $e->getMessage());
}

$addtask = $_POST["addtask"];

if (isset($addtask)) {

    $insertask = $bdd->prepare('INSERT INTO task(task,acount_id) VALUES (:task,:acount_id)');
    $insertask->execute([
        'task' => $addtask,
        'acount_id' => $_SESSION['id']
    ]);
}
if (isset($_POST['check'])) {
foreach ($_POST['check'] as $checkid) {
$del = $bdd->prepare('DELETE FROM task WHERE id = :id AND acount_id = :acount_id');
$del->execute([
   'id' => $checkid,
   'acount_id' => $_SESSION['id']
]);
}
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

    <?php if (!isset($_SESSION['id'])): ?>
        <div class="connect">
            <a href="inscription.php">S'inscrire</a>
            <a href="connexion.php">Se connecter</a>
        </div>
    <?php else : ?>



        <div class="utilisateur">
            <p>Bonjour <?= $_SESSION['nom']; ?></p>
        </div>
        <div class="deco">
            <a href="deconnexion.php">Se Deconnecter</a>
        </div>

    <?php endif ?>

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

        <?php foreach ($taches as $tache): ?>

            <?php if ($_SESSION['id'] == $tache['acount_id']) : ?>

                <form action="/" method="post">


                        <div class="list">

                            <input type="checkbox" name="check[]" value=<?php echo $tache['id']?>>
                            <?php echo $tache['task'] . "\n" ?>
                        </div>

                
            <?php endif ?>

        <?php endforeach; ?>


        <div class="delete">
            <button type="submit">Suprimer tache</button>
        </div>


        </form>
    </div>




    





</body>

</html>