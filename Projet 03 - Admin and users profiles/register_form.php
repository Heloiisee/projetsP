<?php

@include 'config.php';

if(isset($_POST['submit'])){
    $name = mysqli_real_escape_string($conn,$_POST['name']);
    $email = mysqli_real_escape_string($conn,$_POST['email']);
    $pass = md5($_POST['password']);
    $cpass = md5($_POST['cpassword']);
    $user_type = $_POST['user_type'];

    $sql = "SELECT * FROM `user_form` WHERE email = '$email' && password = '$pass' ;";
    $result = mysqli_query($conn, $sql);
    
    if(mysqli_num_rows($result) > 0){
        $error[] = 'Utilisateur existe déjà !';
    }else{
        if($pass != $cpass){
            $error[] = 'Le mot de passe ne correspond pas !';
        }else{
            $insert = "INSERT INTO user_form(name, email, password, user_type) VALUES('$name', '$email','$pass', '$user_type');";
            mysqli_query($conn, $insert);
            header('location:login_form.php');
        }
    }
}
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Inscription</title>
</head>
<body>
    <div class="form-container">
        <form action="" method="post">
            <h3>Inscription</h3>
            <?php
                if(isset($error)){
                    foreach($error as $err){
                        echo '<span class="error-msg">'.$err.'</span>';
                    }
                };
            ?>
            <input type="text" name="name" id="" required placeholder="Entrez votre nom">
            <input type="email" name="email" id="" required placeholder="Entrez votre email">
            <input type="password" name="password" id="" required placeholder="Entrez votre mot de passe">
            <input type="password" name="cpassword" id="" required placeholder="Confirmez votre mot de passe">
            <select name="user_type" id="">
                <option value="user">User</option>
                <option value="admin">Admin</option>
            </select>
            <input type="submit" name="submit" value="Inscription" class="form-btn">
        <p>Déjà un compte ? <a href="login_form.php">Connectez-vous !</a></p>
        </form>
    </div>
    
</body>
</html>