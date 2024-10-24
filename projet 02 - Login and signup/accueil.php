<?php 
  session_start();
  include("php/config.php");
  if(!isset($_SESSION['valid'])){
    header("Location: index.php");
    exit();
  }
?>



<!doctype html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Accueil</title>
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
            <ul class="navbar-nav ms-auto d-flex align-items-center">
              <li class="nav-item">
                <a class="nav-link fw-bold" aria-current="page" href="accueil.php">Accueil</a>
              </li>
              <div>
                <?php 
                $id = $_SESSION['id'];
                $query = mysqli_query($connexion,"SELECT * FROM users WHERE Id=$id");

                while($result = mysqli_fetch_assoc($query)){
                  $res_Nuser = $result['NomUser'];
                  $res_Email = $result['Email'];
                  $res_id = $result['Id'];

                }
                echo "<a class='nav-link align-items-center' href='edit.php'?Id=$res_id'>Changer de profil</a>";
                
                ?>
                <li class="nav-item">
                  <a class="nav-link btn-custom-success rounded" href="php/deconnexion.php">Déconnexion</a>
                </li>
              </div>
              

              
              
              </ul>
          </div>
        </div>
    </nav>
    <main>
        <div class="container pt-4">
            <div class="row">
                <div class="col-6">
                    <div class=" box p-3 mb-2 bg-light text-dark rounded-3">Bonjour <b><?php echo $res_Nuser ?></b>, Bienvenue !</div>
                </div>
                <div class="col-6">
                    <div class=" box p-3 mb-2 bg-light text-dark rounded-3">Votre mail est <b><?php echo $res_Email ?></b>.</div>
                </div>
            </div>
        </div>
        
            
        
        
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>