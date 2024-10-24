<?php 
    session_start();

?>

<!doctype html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PHP - Page de connexion</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
  <body>
    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="box form-box shadow p-3 mb-5 bg-body-tertiary rounded-4 p-4">
            <?php 
                include("php/config.php");
                if(isset($_POST['submit'])){
                    $email = mysqli_real_escape_string($connexion,$_POST['email']);
                    $password = mysqli_real_escape_string($connexion,$_POST['password']);

                    $resultat = mysqli_query($connexion,"SELECT * FROM users WHERE Email='$email' AND Motdepasse= '$password'") or die("Erreur");
                    $row = mysqli_fetch_assoc($resultat);
                    
                    if(is_array($row) && !empty($row)){
                        $_SESSION['valid'] = $row['Email'];
                        $_SESSION['nomuser'] = $row['Username'];
                        $_SESSION['id'] = $row['Id'];


                    }else{
                        echo "<div class='message text-center p-2 border border-danger-subtle mb-1 text-danger rounded bg-danger-subtle' > 
                         <p>Mauvais nom d'utilisateur ou de mot de passe !</p> </div> <br>";

                         echo "<a href='index.php'><button class='btn btn-custom-success'>Revenir en arrière</button>";
                    }
                    if(isset($_SESSION['valid'])){
                        header("Location: accueil.php");
                    }
                }else{
            ?>
            <header class="text-center fw-bold fs-1 p-3">Connexion</header>
            <form action="" method="post">
                <div class="field input">
                    <label for="email" class="fw-bold ">Email</label>
                    <input class="form-control " type="text" name="email" id="email" required>
                </div>
                <div class="field input">
                    <label for="password"class="fw-bold ">Mot de passe</label>
                    <input class="form-control " type="password" name="password" id="password" required>
                </div>
                <div class="field text-center pt-4">
                    <input class="btn btn-custom-success w-100" type="submit" name="submit" id="submit" value="Connexion" required>
                </div>
                <div class="links pt-2">
                    <p>Vous n'avez pas de compte ? <a href="inscription.php">Inscrivez-vous maintenant !</a></p>
                </div>
                
            </form>
        </div>
        <?php } ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>