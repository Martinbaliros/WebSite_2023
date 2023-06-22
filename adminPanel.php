<?php

include 'database.php';
global $db;



?>

<!DOCTYPE html>
<html>

<head>
    <title>LifePal Admin</title>
    <link rel="stylesheet" href="css/adminpanel.css">

</head>

<body>
<div class=menu>
    <?php

    $page= basename($_SERVER['PHP_SELF']);

    if ($page=="adminPanel.php") {

        ?>

        <li><a href="./adminPanel.php?onglet=Utilisateurs" id="données" <?php if($page == "./adminPanel.php?onglet=Utilisateurs") {echo 'class="selected"';}?>>Utilisateurs</a></li>

        <li><a href="./adminPanel.php?onglet=Montres" id="données" <?php if($page == "./adminPanel.php?onglet=Montres.php") {echo 'class="selected"';}?>>Montres</a></li>

        <li><a href="./adminPanel.php?onglet=FAQ" id="données" <?php if($page == "./adminPanel.php?onglet=FAQ") {echo 'class="selected"';}?>>FAQ</a></li>

        <li><a href="./adminPanel.php?onglet=Hôpitaux" <?php if($page == "tipsEcologiques.php") {echo 'class="selected"';}?>>Hôpitaux</a></li>

        <li><a href="./adminPanel.php?onglet=Lieux" <?php if($page == "./adminPanel.php?onglet=LieuxVente") {echo 'class="selected"';}?>>Lieux</a></li>

        <?php

    }
    ?>
</div>
<section>
    <div class="liens">

        <a href="./accueil.html">Accueil </a>

        <p>></p>

        <a href="">Panel Admin</a>

    </div>

    <?php

    if (isset($_GET['onglet'])&& $_GET['onglet']=='Utilisateurs') {

    ?>

    <h1>Liste des utilisateurs</h1>

    <table>

        <tr>

            <th>idUtilisateur</th>

            <th>Nom</th>

            <th>Prenom</th>

            <th>Email</th>

            <th>Tel</th>

            <th>Date d'inscription</th>

            <th>Désactiver</th>

        </tr>

        <?php


        $sqlquery="SELECT * FROM lifepal.personne";
        $resultstatement = $db->prepare($sqlquery);
        $resultstatement->execute();
        $results = $resultstatement->fetchAll();


        foreach ($results as $result) {
            ?>
            <tr>
                <td><?php echo $result['id_personne']; ?></td>

                <td><?php echo $result['prenomPersonne']; ?></td>

                <td><?php echo $result['nomPersonne']; ?></td>

                <td><?php echo $result['Email']; ?></td>

                <td><?php echo $result['Telephone']; ?></td>

                <td><?php echo $result['date']; ?></td>

            </tr>




            <?php



        }}
        if (isset($_GET['onglet'])&& $_GET['onglet']=='Montres') {

            ?>

            <h1>Liste des Montres</h1>

            <table>

                <tr>

                    <th>Numéro de série</th>

                    <th>Prenom Utilisateur</th>

                    <th>Nom Utilisateur</th>

                    <th>Date d'achat</th>

                    <th>Etat</th>


                </tr>

                <?php


                $sqlquerymontre="SELECT * FROM lifepal.bracelet";
                $resultstatementmontre = $db->prepare($sqlquerymontre);
                $resultstatementmontre->execute();
                $resultsmontre = $resultstatementmontre->fetchAll();

                foreach ($resultsmontre as $resultmontre) {


                    ?>
                    <tr>
                        <td><?php echo $resultmontre['id_Bracelet']; ?></td>

                        <td><?php
                            $sqlqueryidper="SELECT * FROM lifepal.personne WHERE id_personne = ".$resultmontre['id_personne'];
                            $resultstatementidper = $db->prepare($sqlqueryidper);
                            $resultstatementidper->execute();
                            $resultsidper = $resultstatementidper->fetchAll();

                            foreach ($resultsidper as $resultidper) {


                            echo $resultidper['prenomPersonne']; }?></td>

                        <td><?php
                            foreach ($resultsidper as $resultidper) {
                            echo $resultidper['nomPersonne']; }?></td>

                        <td><?php echo $resultmontre['date_of_purchase']; ?></td>

                        <td><?php echo $resultmontre['état']; ?></td>




                    </tr>

                    <?php

                }

                ?>

            </table>

            <?php

        }
        ?>



        <?php

        if (isset($_GET['onglet'])&& $_GET['onglet']=='FAQ') {

        ?>

        <h1>FAQ</h1>

        <table>

            <tr>

                <th>Questions</th>

                <th>Réponses</th>

                <th>Supprimer</th>

            </tr>

            <?php


            $result = $db->query("SELECT * FROM utilisateur");

            while ($row = $result->fetch_object()) {

                if($row->role == 1) continue;

                ?> <tr>

                    <td><?php echo $row->question; ?></td>

                    <td><?php echo $row->reponse; ?></td>


                    <td><input type="button" value="<?php if($row->banni) {echo 'activer" onclick="reactiverCompte('.$row->idUtilisateur.')';} else {echo 'désactiver" onclick="desactiverCompte('.$row->idUtilisateur.')';} ?>"></td>

                </tr>

                <?php
            }
            }
            ?>

        </table>
        <?php

        if (isset($_GET['onglet'])&& $_GET['onglet']=='Hôpitaux') {

        ?>
            <h1>Hôpitaux</h1>

        <table>

            <tr>

                <th>idHôpital</th>

                <th>Nom</th>

                <th>Numéro de rue</th>

                <th>Nom de rue</th>

                <th>Ville</th>

                <th>Code Postal</th>

                <th>Pays</th>

                <th>Téléphone</th>
            </tr>



            <?php


            $sqlqueryhop="SELECT * FROM lifepal.hopitaux";
            $resultstatementhop = $db->prepare($sqlqueryhop);
            $resultstatementhop->execute();
            $resultshop = $resultstatementhop->fetchAll();


            foreach ($resultshop as $resulthop) {
                ?>
                <tr>
                    <td><?php echo $resulthop['id_hopital']; ?></td>

                    <td><?php echo $resulthop['nomhopital']; ?></td>

                    <td><?php echo $resulthop['numerorue']; ?></td>

                    <td><?php echo $resulthop['nomrue']; ?></td>

                    <td><?php echo $resulthop['ville']; ?></td>

                    <td><?php echo $resulthop['codepostal']; ?></td>

                    <td><?php echo $resulthop['pays']; ?></td>

                    <td><?php echo $resulthop['numeroTel']; ?></td>

                </tr>




                <?php
            }
        }
        if (isset($_GET['onglet'])&& $_GET['onglet']=='Lieux') {

        ?>

        <h1>Lieux de vente</h1>

        <table>

            <tr>

                <th>idAdresse</th>

                <th>Numéro de rue</th>

                <th>Nom de rue</th>

                <th>Ville</th>

                <th>Code Postale</th>

                <th>Pays</th>
            </tr>

            <?php



            $result = $db->query("SELECT * FROM utilisateur");

            while ($row = $result->fetch_object()) {

                if($row->role == 1) continue;

                ?> <tr>

                    <td><?php echo $row->idAdresse; ?></td>

                    <td><?php echo $row->numRue; ?></td>

                    <td><?php echo $row->nomRue; ?></td>

                    <td><?php echo $row->Ville; ?></td>

                    <td><?php echo $row->codePostale; ?></td>

                    <td><?php echo $row->pays; ?></td>


                    <td><input type="button" value="<?php if($row->banni) {echo 'activer" onclick="reactiverCompte('.$row->idUtilisateur.')';} else {echo 'désactiver" onclick="desactiverCompte('.$row->idUtilisateur.')';} ?>"></td>

                </tr>

                <?php
            }
            }
            ?>
</section>
</body>



