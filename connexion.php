<?php include'ponction.php' ?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link rel="stylesheet" href="connexion.css">
</head>
<body>
    <section>
        <h1>Connexion</h1>
        <form action="login.php" method="POST">
            <label>Adresse mail</label>
            <input type="email" name="email">
            <label >Mot de passe</label>
            <input type="password" name="pwd">
            <input type="submit" value="Connexion" name="connexion">
        </form>
    </section>
  
</body>
</html>