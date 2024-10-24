<?php 
  session_start();
  include("php/config.php");
  if(!isset($_SESSION['valid'])){
    header("Location: index.php");
    exit();
  }
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Changer de profil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid">
          <a class="navbar-brand fw-bold" href="accueil.php">Site.</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end p-1" id="navbarNavAltMarkup">
            <div class="navbar-nav ">
              <a class="nav-link fw-bold" aria-current="page" href="accueil.php">Accueil</a>
              <a class="nav-link fw-bold" href="#">Changer de profil</a>
              <a class="nav-link btn-custom-success rounded" href="php/deconnexion.php">Déconnexion</a>
            </div>
          </div>
        </div>
    </nav>
    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="box form-box shadow p-3 mb-5 bg-body-tertiary rounded p-4">

        <?php 
            if(isset($_POST['submit'])){
                $username = $_POST['username'];
                $email = $_POST['email'];

                $id = $_SESSION['id'];
                $edit_query = mysqli_query($connexion,"UPDATE users SET NomUser = '$username', Email ='$email' WHERE Id = $id") or die("Une erreur est survenue");
                if($edit_query){
                    echo "<div class='message text-center p-2 border border-success-subtle mb-1 text-success rounded bg-success-subtle'> 
                         <p> Profil modifié ! </p> 
                         </div> <br>";

                         echo "<a href='accueil.php'><button class='btn btn-custom-success'>Accueil</button>";
                }

            } else{

                $id = $_SESSION['id'];
                $query = mysqli_query($connexion,"SELECT * FROM users WHERE Id=$id");

                while($resultat = mysqli_fetch_assoc($query)){
                    $res_Nuser = $resultat['NomUser'];
                    $res_Email = $resultat['Email'];

                }
        
        ?>
            <header class="text-center fw-bold fs-1 p-3">Changer de profil</header>
            <form action="" method="post" class="">
                <div class="field input">
                    <label for="username" class="fw-bold ">Nom d'utilisateur</label>
                    <input class="form-control " type="text" name="username" id="username" value="<?php echo $res_Nuser ?>" autocomplete="off" required>
                </div>
                <div class="field input">
                    <label for="email"class="fw-bold ">E-Mail</label>
                    <input class="form-control " type="email" name="email" id="email" value="<?php echo $res_Email ?>" autocomplete="off" required>
                </div>
                <div class="field text-center pt-4">
                    <input class="btn btn-custom-success w-100" type="submit" name="submit" id="submit" value="Mise à jour" required>
                </div>
                
                
            </form>
        </div>
        <?php } ?>
    </div>

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>