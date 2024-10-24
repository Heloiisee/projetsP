<?php

session_start();

@include 'config.php';

if(isset($_POST['submit'])){
    $email = mysqli_real_escape_string($conn,$_POST['email']);
    $pass = md5($_POST['password']);
    

    $sql = "SELECT * FROM `user_form` WHERE email = '$email' && password = '$pass';";
    $result = mysqli_query($conn, $sql);
    
    if(mysqli_num_rows($result) > 0){
        $row = mysqli_fetch_array($result);

        if($row['user_type'] == 'admin'){

            $_SESSION['admin_name'] = $row['name'];
            header('Location:admin.php');
            exit;

        }elseif($row['user_type'] == 'user'){

            $_SESSION['user_name'] = $row['name'];
            header('Location:user.php');
            exit;
    }
}else {
        $error[] = 'Mot de passe ou email incorrect';
    }


}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Connexion</title>
</head>
<body>
    <div class="form-container">
        <form action="" method="post">
            <h3>Connexion</h3>
            <?php
                if(isset($error)){
                    foreach($error as $err){
                        echo '<span class="error-msg">'.$err.'</span>';
                    }
                };
            ?>
            <input type="email" name="email" id="" required placeholder="Entrez votre email">
            <input type="password" name="password" id="" required placeholder="Entrez votre mot de passe">
            <input type="submit" name="submit" value="Connexion" class="form-btn">
        <p>Vous n'avez pas un compte ? <a href="register_form.php">Inscrivez-vous !</a></p>
        </form>
    </div>
    
</body>
</html>