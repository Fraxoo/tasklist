<?php


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
    <a href="inscription.php">Se connecter</a>
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

    <div class="list">
        <input type="checkbox">
        <p>preparer le repas</p>
    </div>
    
</div>

</body>
</html>