<?php
@include 'config.php';
session_start();

if(!isset($_SESSION['user_name'])){
    header('location:login_form.php');
}
?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Page Utilisateur</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <div class="content">
            <h3>Salut, <span>Utilisateur</span></h3>
            <h1>Bienvenue <span><?php echo $_SESSION['user_name']?></span></h1>
            <p>Ceci est la page d'un utilisateur</p>
            <a href="login_form.php" class="btn">Connexion</a>
            <a href="register_form.php" class="btn">Inscription</a>
            <a href="logout.php" class="btn">Deconnexion</a>
        </div>
    </div>
</body>
</html>
