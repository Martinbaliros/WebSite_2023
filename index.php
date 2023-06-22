<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="icon" href="images/ifm.png" type="image/x-icon">
    <title>Création d'un compte - IFM</title>
    <link rel="stylesheet" type="text/css" href="css/création_compte.css">
</head>
<body>
<div class="categories-image">
    <img src="images/ifm.png" alt="test">
</div>
<br>
<div class="container">
    <h2>Créer un compte</h2>
    <div class="center_input">
        <div class="my-form">


            <form method="POST">
                <label>Nom</label>
                <input type="text" name="lastname" id="lastname" >


        </div>
        <br>
        <div class="my-form">


                <label>Prénom</label>
                <input type="text" name="firstname" id="firstname">


        </div>
        <br>
        <div class="my-form">

                <label>Adresse e-mail</label>
                <input type="email" name="mail" id="mail">

        </div>
        <br>
        <div class="my-form">

                <label>Mot de passe</label>
                <input type="password" name="password" id="password">

        </div>
        <br>
        <div class="my-form">

                <label>Entrez le mot de passe à nouveau</label>
                <input type="password" name="cpassword" id="cpassword">

        </div>
        <br>
        <div class="rappel_mdp">
            <li>Le mot de passe doit avoir au moins 8  caractères</li>
        </div>

        <br>

        <div>

                <input class="button" type="submit"  name="formsend" id="formsend">
            </form>
            <?php

            session_start();


            if(isset($_POST['formsend'])){
                extract($_POST);

                if (empty($_POST['lastname'])) {
                    $error = 'Vous n\'avez pas indiqué votre nom.';
                }
                elseif (empty($_POST['firstname'])){
                    $error = 'Vous n\'avez pas indiqué votre prénom.';
                }
                elseif (empty($_POST['mail']) || !filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL)) {
                    $error = 'Veuillez saisir une adresse e-mail valide.';
                }
                elseif (empty($_POST['password'])){
                    $error = 'Veuillez saisir un mot de passe.';
                }
                elseif ($_POST['password']!=$_POST['cpassword']){
                    $error = 'Les mots de passe ne correspondent pas.';
                }


                else {



                    $option=['cost' => 12 ,];

                    $hashpass = password_hash($password, PASSWORD_BCRYPT, $option);
                    include 'database.php';
                    global $db;

                    $lastname=$_POST['lastname'];
                    $firstname=$_POST['firstname'];
                    $email=$_POST['mail'];
                    $password=$_POST['password'];

                    $_SESSION['lastname']=$lastname;
                    $_SESSION['firstname']=$firstname;
                    $_SESSION['email']=$mail;
                    $_SESSION['password']=$password;






                    $db->query("insert into lifepal.personne( nomPersonne, prenomPersonne, Email, Password) values('$lastname', '$firstname', '$email', '$hashpass')");
                    header('Location: '.'http://localhost/LIFEPAL/profil.php');
                    die();
                    /*$q = $db->prepare("INSERT INTO personne( nomPersonne, prenomPersonne, Email, Password) VALUES ($lastname,$firstname ,$mail ,$password ))");
                    $q->execute();
                    $q = $db->prepare("INSERT INTO lifepal.personne( nomPersonne, prenomPersonne, Email, Password) VALUES (:nomPersonne, :prenomPersonne, :Email, :Password))");
                    $q->execute([
                            'nomPersonne' => $lastname,
                            'prenomPersonne' => $firstname,
                            'Email' => $mail,
                            'Password' => $hashpass,
                    ]);*/
                }
            }
            if (isset($error)) {

                echo '<br><br> <font color="red">'.$error.'</font>';

            }

            ?>




        </div>
    </div>
</div>




</body>
</html>