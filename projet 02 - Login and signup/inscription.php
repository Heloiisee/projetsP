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
                if(isset($_POST["submit"])){
                    $username = $_POST['username'];
                    $email = $_POST['email'];
                    $password = $_POST['password'];


                    $verify_query = mysqli_query($connexion, "SELECT Email FROM users WHERE Email='$email'");
                    if(mysqli_num_rows($verify_query) !=0 ) {
                         echo "<div class='message text-center p-2 border border-danger-subtle mb-1 text-danger rounded bg-danger-subtle'> 
                         <p> Cet email est déjà utilisé, Essayez-en un autre s'il vous plait ! </p> </div> <br>";

                         echo "<a href='javascript:self.history.back()'><button class='btn btn-custom-success'>Revenir en arrière</button>";
                    }
                    else{
                        mysqli_query($connexion, "INSERT INTO users(NomUser,Email,Motdepasse) VALUES('$username','$email','$password')") or die("Une erreur est survenue");
                         echo "<div class='message text-center p-2 border border-success-subtle mb-1 text-success rounded bg-success-subtle'> 
                         <p> Inscription réussite ! </p> 
                         </div> <br>";

                         echo "<a href='index.php'><button class='btn btn-custom-success'>Connexion</button>";
                    }
                    
                }else{
            ?>
            <header class="text-center fw-bold fs-1 p-3">Inscription</header>
            <form action="" method="post" class="">
                <div class="field input">
                    <label for="username" class="fw-bold ">Nom d'utilisateur</label>
                    <input class="form-control " type="text" name="username" id="username" autocomplete="off" required>
                </div>
                <div class="field input">
                    <label for="email"class="fw-bold ">E-Mail</label>
                    <input class="form-control " type="email" name="email" id="email" autocomplete="off" required>
                </div>
                <div class="field input">
                    <label for="password"class="fw-bold ">Mot de passe</label>
                    <input class="form-control " type="password" name="password" id="password" autocomplete="off" required>
                </div>
                <div class="field input">
                    <label for="password"class="fw-bold ">Confirmer votre mot de passe</label>
                    <input class="form-control " type="password" name="password" id="password" autocomplete="off" required>
                </div>
                <div class="field text-center pt-4">
                    <input class="btn btn-custom-success w-100" type="submit" name="submit" id="submit" value="Inscription" required>
                </div>
                <div class="links pt-2">
                    <p>Vous avez déjà un compte ? <a href="index.php">Connectez-vous maintenant !</a></p>
                </div>
                
            </form>
        </div>
        <?php } ?>
            
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>