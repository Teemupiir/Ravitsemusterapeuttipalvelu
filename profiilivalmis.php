<?php
  session_start();
  // Sisällytä config tiedosto
  require_once "config.php";


  //Yhdistä tietokantaan
  $dbhost = "localhost";
  $dbuser = "root";
  $dbpass = "";
  $db = "rtp_db";
  $port="3307";

  $conn = new mysqli($dbhost, $dbuser, $dbpass,$db,$port) or die("Connect failed: %s\n". $conn -> error);

  //id
  $terapeutinid=$_SESSION['id'];
  //valitse taulu, hae tieto
  $sql = "SELECT tp_etunimi, tp_sukunimi, tp_paikkakunta, tp_email, tp_esittelyteksti FROM terapeutit WHERE users_fk='$terapeutinid'";
  $result = $conn->query($sql);
  $terapeutit= mysqli_fetch_all($result, MYSQLI_ASSOC);

  mysqli_free_result($result);
  //Sulje yhteys 
?>

<!DOCTYPE html>
<html>
  <head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="css/bootstrap-responsive.css"> 
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

  </head>
  <!-- navbar -->
  <nav class="navbar navbar-expand-md navbar-dark" style="background-color: #5A9089;">

<div class="nav-item">
    <a class="navbar-brand">
        <img src="Pictures\whitelogo_Larate.png" style=" height: 30px; width: 100 px; display: inline-block;">

    </a>
</div>

<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault"
    aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
</button>

<div class="collapse navbar-collapse" id="navbarsExampleDefault">

    <ul class="navbar-nav mr-auto">
    </ul>

<a class="btn btn-light float-right" href="sessiondestroy.php" type="button" aria-haspopup="true" aria-expanded="false">
Kirjaudu ulos</a>
</nav>

  

  <body>

    <div class="jumbotron">
      <div class="container" style="text-align: center;">

        <br>
        <h2>Kiitos!</h2>
        <br>
        <h3>Olet täyttänyt nyt kaikki tarvittavat tiedot asiantuntijaprofiiliisi.
        <br>Voit muokata syöttämiäsi tietoja aina, kun kirjaudut profiiliisi.
        <br>
        Pääset kirjautumaan ulos sivun oikeasta yläkulmasta.
        <br>
        <br>Iloisia tapaamisia!
        <br>
        <br>

        <img style="height: 150px; width:auto;" src="pictures/lappaomena.png">

        <br>
        <br>
        <div class="container" style="background-color: white; text-align: center;">
        <br>
        <h5>Syöttämäsi tiedot:</h5>
        <br>
        <br>
        <?php foreach ($terapeutit as $terapeutti) { ?>
          <h5>etunimi: </h5>  <h5 style="font-weight: bold;"><?php echo htmlspecialchars($terapeutti['tp_etunimi']) ;?> </h5><br> 
          <h5>sukunimi: </h5><h5 style="font-weight: bold;"><?php echo htmlspecialchars($terapeutti['tp_sukunimi']) ;?> </h5><br> 
          <h5>paikkakunta: </h5> <h5 style="font-weight: bold;"><?php echo htmlspecialchars($terapeutti['tp_paikkakunta']) ;?> </h5><br> 
          <h5>email: </h5><h5 style="font-weight: bold;"><?php echo htmlspecialchars($terapeutti['tp_email']) ;?> </h5><br> 
          <h5>esittelyteksti: </h5> <h5 style="font-weight: bold;"><?php echo htmlspecialchars($terapeutti['tp_esittelyteksti']) ;?> </h5><br> 
        <?php } ?>
        <br>
        <?php 
        $id=$terapeutinid;


        $kuva = "SELECT users_fk, imagename FROM uploadedimage WHERE users_fk='$terapeutinid'";
        $tulos = $conn->query($kuva);
        $kuvat= mysqli_fetch_all($tulos, MYSQLI_ASSOC);

        mysqli_free_result($tulos);
        foreach ($kuvat as $kuva){
        $imgname = ($kuva['imagename']);
        }
        $folder='ladatutkuvat/'
        ?>

        <!-- kuva -->
        <img class="card-img-top" style="width: 350px; height: 350px; background-repeat: no-repeat; " src="<?php echo $folder.$imgname?>">

        <br>
        <br>
        <br>
        </div>
        <br>

        <br>
        <div class="container">
          <div class="row">
            <div class="col-sm-1"></div>
            <div class="col-sm-2">
            <a class="btn btn-danger btn-lg"  style=" min-width: 110px; max-width:100%" href="checkbox_testit.php" role="button">Palaa</a> 
            </div>
            <div class="col-sm-6"></div>
            <div class="col-sm-2">
            <a class="btn btn-success btn-lg"
            href="terve_terapeutti.php" role="button">Jatka</a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <br>
    <br>

    <!--footer -->
    <footer class="footerRTP2">
      <div class="container">
        <div class="row">
          <div class="col-md-4" style="text-align: center;">
              <img src="Pictures\Black logo - no background.png" style=" height: 60px; width: 200 px; display: inline-block;">
          </div>
          <div class="col-md-4" style="text-align: center">  </div>
          <div class="col-md-4" style="text-align: center;">  </div>
          <div class="col-md-12" style="text-align: center; margin-top: 50px; margin-bottom: 20px;">
            <p>&copy; Ryhmä-R 2020</p>
          </div>
        </div>
      </div>
    </footer>
    <?php $conn->close();?>
  </body>
</html>