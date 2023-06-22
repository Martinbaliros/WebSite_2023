<?php
session_start();
if (!isset($_SESSION['firstname'])){
    header('Location: '.'http://localhost/LIFEPAL/');
}


?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="icon" href="images/ifm.png" type="image/x-icon">
    <title>Profil</title>
    <link rel="stylesheet" type="text/css" href="css/profil.css">
</head>
<body>


<header class="h1">
    <div class="ifm">
        <h1>IFM</h1>
    </div>
    <div class="logoifm">
        <img src="images/IFM_logo.png" alt="logo IFM" width="50">
    </div>
    <label class="login"><a href="login.php">se connecter</a></label>
</header>


<header class="h2">




    <div class="container">
        <!-- <img src="images/house.png" alt="logo" class="logo"> -->
        <nav>
            <ul>
                <li><a href="accueil.html">Accueil</a></li>
                <li><a href="#">Suivi</a></li>
                <li><a href="page_vente.html">LifePal</a></li>
                <li><a href="ifm.html">À propos de nous</a></li>
                <li><a href="reseaux.html">Contact</a></li>
            </ul>
        </nav>
    </div>

</header>
<div class="container">
    <div class="box1">
        <div class="text_area">
           <p> Nom Prénom :</p>
            <?php
            if(isset($_SESSION['firstname']) and isset($_SESSION['lastname'])) {
                echo $_SESSION['firstname'] . " " . $_SESSION['lastname'];
            }
            ?>

        </div>
        <div class="text_area">
            <p>Numéro de sécurité sociale :</p>
            <p>694200768688726</p>

        </div>
        <div class="text_area">
            <p>Adresse email :</p>
            <?php
            if(isset($_SESSION['email'])){
            echo $_SESSION['email'];
            }
            ?>

        </div>
        <div class="text_area">
            <p>Téléphone :</p>

        </div>
        <div class="text_area">
            <p>Date de naissance :</p>

        </div>
        <div class="categories">
            <div class="my-form-button_deco">
                <form method="POST">
                    <input class="button_deco" type="submit" value="Se Déconnecter" name="formsend2" id="formsend2">
                </form>
            </div>
        </div>
    </div>

    <div class="box2">
        <div class="categories">
            <div class="my-form">
                <h2>
                    Ancien mot de passe
                </h2>
                <form method="POST">

                    <input type="password" name="oldpassword" id="oldpassword">

                <br>
                <h2>
                    Nouveau mot de passe
                </h2>


                    <input type="password" name="newpassword" id="newpassword">


        <div class="categories">
            <div class="my-form-button">

                    <input class="button" type="submit" name="formsend" id="formsend">
                </form>
            </div>
        </div>
    </div>
        </div>
    </div>

</div>
</body>
</html>

<?php

if(isset($_POST['formsend2'])) {
    session_destroy();
    header('Location: '.'http://localhost/LIFEPAL/index.php');

}
if(isset($_POST['formsend'])){
    extract($_POST);
    $newpassword=$_POST['newpassword'];
    $oldpassword=$_POST['oldpassword'];

    include 'database.php';
    global $db;
    $oldpassworddata = $db->query("SELECT Password FROM lifepal.personne WHERE id_personne=1");


    $db->query("UPDATE lifepal.personne SET Password=$newpassword WHERE id_personne=1");

}
?>