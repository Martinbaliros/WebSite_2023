<!DOCTYPE html>
<html>
  <head>
        <meta charset="UTF-8">
        <link rel="icon" href="images/ifm.png" type="image/x-icon">
        <title>Création d'un compte - IFM</title>
        <link rel="stylesheet" type="text/css" href="css/graphe.css">
        <script src="navbar.js" defer></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

     
  </head>
  <body>
      
    <nav class="navbar">
            <div class="brand-title"> 
                <img src="images/IFM_logo.png" alt="logo IFM" width="70">
                <div class="label-ifm">
                    <label>IFM</label>
                </div>
            </div>
            <a href="#" class="toggle-button">
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>
            </a>
            <div class="navbar-links">
              <ul>
                <li><a href="accueil.html">Accueil</a></li>
                <li><a href="#">Suivi</a></li>
                <li><a href="page_vente.html">LifePal</a></li>
                <li><a href="ifm.html">A propos de nous</a></li>
                <li><a href="reseaux.html">Contact</a></li>
              </ul>
            </div>
      </nav>
    <div class="box-container">
<?php

$page= basename($_SERVER['PHP_SELF']);

if ($page=="graphe.php") {

?>
<div class="box1">
    <a class= "lien1" href="./graphe.php?onglet=BPM" id="données" <?php if($page == "./graphe.php?onglet=BPM") {echo 'class="selected"';}?>>Suivi BPM</a>
</div>

<div class="box2">
    <a class= "lien1" href="./graphe.php?onglet=Air" id="données" <?php if($page == "./graphe.php?onglet=Air") {echo 'class="selected"';}?>>Qualité de l'air</a>
</div>

<div class="box3">
    <a class= "lien1" href="./graphe.php?onglet=Température" id="données" <?php if($page == "./graphe.php?onglet=Température") {echo 'class="selected"';}?>>Température</a>
</div>

<?php
}
?>




<?php

if (isset($_GET['onglet'])&& $_GET['onglet']=='BPM') {
?>
    
    <div class="graph">
      <?php
        $con = mysqli_connect("localhost","root","1234","ifm_database");
        if(!$con){
          echo "not connected";
        } else {
          echo "";
        }
      ?>

      <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
      <script type="text/javascript">
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {

          var data = google.visualization.arrayToDataTable([
            ['students', 'heure'],
          <?php
          $sql = "SELECT * FROM donnees";
          $fire = mysqli_query($con,$sql);
            while ($result = mysqli_fetch_assoc($fire)) {
              echo"['".$result['temps_donnee']."',".$result['valeur_donnee']."],";
            }

          ?>
          ]);

          var options = {
            title: 'Etat',
            curveType: 'function',
            legend: { position: 'bottom' }
          };

          var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

          chart.draw(data, options);
        }
      </script>
    
      <div id="curve_chart" style="width: 900px; height: 500px"></div>
    </div>

<?php
}
?>


    </div>

    
      <footer>
          <div class="footer-content">
              <h3>IFM</h3>

              <ul class="socials">
                  <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                  <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                  <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                  <li><a href="#"><i class="fa fa-twitter"></i></a></li>
              </ul>
          </div>
          <div class="footer-bottom">
              <p>Conditions générales d'utilisation</p>
              <p>Mentions légales</p>

          </div>
      </footer>  

  </body>
</html>

 


  