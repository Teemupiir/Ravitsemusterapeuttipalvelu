<?php
// käynnistä sessio
session_start();

// Tarkista onko käyttäjä kirjautuneena sisään, jos ei: ohjaa kirjautumissivulle
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: kirjaudu.php");
    exit;
}

// luo tietokantayhteys
require_once "config.php";

// tarkista pikahaulla onko käyttäjä jo antanut tietonsa profiilia varten
  $user_fk = $_SESSION['id'];
  $haku = "SELECT count(*) as luku from terapeutit WHERE users_fk = $user_fk";
  $tulos = $link->query($haku);
  $hakutulos = mysqli_fetch_all($tulos, MYSQLI_ASSOC);
  mysqli_free_result($tulos);
// otetaan ensin luku ulos
foreach ($hakutulos as $ht){
  $luku = ($ht['luku']);
}
// mikäli luku on isompi kuin 0, ohjataan suoraan profiilisivulle
if ($luku>0){
    header("location:terve_terapeutti.php");
    exit;
}

 
// määritä parametrit tyhjiksi
$etunimi = $sukunimi = $kaupunki = $email = $esittely = "";
$etunimi_err = $sukunimi_err = $kaupunki_err = $email_err = $esittely_err = "";


// Kaavakkeen tietojen käsittely napin painalluksen jälkeen
if($_SERVER["REQUEST_METHOD"] == "POST"){

    // Tarkista tiedot virheiden varalle ennen tietokantaan viemistä
    if(empty($etunimi_err) && empty($sukunimi_err) && empty($kaupunki_err) && empty($email_err) && empty($esittely_err)){

        $etunimi = $_POST["etunimi"];
        $sukunimi = $_POST["sukunimi"];
        $kaupunki = $_POST["kaupunki"];
        $email = $_POST["email"];
        $esittely = $_POST["esittely"];
        
        // valmistele hakulause
        $sql = "INSERT INTO terapeutit (users_fk,tp_etunimi,tp_sukunimi,tp_paikkakunta,tp_email,tp_esittelyteksti) VALUES (?, ?, ?, ?, ?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Sido parametrit
            mysqli_stmt_bind_param($stmt, "ssssss", $param_id, $param_etunimi, $param_sukunimi, $param_kaupunki, $param_email, $param_esittely);
            
            // Valmistele parametrit
            $param_id = $_SESSION['id'];
            $param_etunimi = $etunimi;
            $param_sukunimi = $sukunimi;
            $param_kaupunki = $kaupunki;
            $param_email = $email;
            $param_esittely = $esittely;
            
            
            // koeta ajaa kysely
            if(mysqli_stmt_execute($stmt)){
             //  echo "Tallennettu. Mahtavaa!";
            } else{
             //  echo "Jotain meni vikaan.";
            }

            // sulje statement
            mysqli_stmt_close($stmt);
        }
    }
}
    
    // sulje tietokantayhteys
    mysqli_close($link);
?>  

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   
    <title>Tervetuloa</title>
   <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css"> -->
    <style type="text/css">
        body{ font: 14px sans-serif; text-align: center; }
    </style>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="Pictures/datepicker-fi.js"></script>
    
    <script>
    $( function() {
        $( '#datepicker' ).datepicker($.extend({
          minDate: new Date()
        },
        $.datepicker.regional['fi']
        ));
    } );

    $(document).ready(function() {
    var f = document.forms['profiili'];
    for(var i=0,fLen=f.length;i<fLen;i++){
      f.elements[i].readOnly = false; //false jos muokkaaprofiilia nappula poistettu
    }

    var readURL = function(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('.profile-pic').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
      }
    }

    $(".file-upload").on('change', function(){
      readURL(this);
    });

    $(".upload-button").on('click', function() {
      $(".file-upload").click();
      });
    });

  
    
    function freeTimes() {
      var v = document.getElementById("btnVapauta");
      var t = document.getElementById("btnTarkista");

      if (v.style.display === "none") {
        v.style.display = "block";
        
      } else {
        v.style.display = "none";
      }
      if (t.style.display === "block"){
        t.style.display = "none";
      }
    }

    function reservations() {
      var t = document.getElementById("btnTarkista");
      var v = document.getElementById("btnVapauta");

      if (t.style.display === "none") {
        t.style.display = "block";
        
      } else {
        t.style.display = "none";
      }
      if (v.style.display === "block"){
        v.style.display = "none";
      }
    }

    function changePwd() {
      var div = document.getElementById("divSalasananVaihto");
      var pro = document.getElementById("divProfiili");
      var prf = document.getElementById("divProfiiliForm");
      var btn = document.getElementById("btnChangePwd");
      var hed = document.getElementById("divOtsikko");
      var cal = document.getElementById("divKalenteri");

      if (div.style.display === "none") {
        div.style.display = "block";
        pro.style.display = "none";
        prf.style.display = "none";
        btn.style.display = "none";
        hed.style.display = "none";
        cal.style.display = "none";
        
      } else {
        div.style.display = "none";
        pro.style.display = "block";
        prf.style.display = "block";
        btn.style.display = "block";
        hed.style.display = "block";
        cal.style.display = "block";
      }
      if (v.style.display === "block"){
        v.style.display = "none";
      }
    }

    function check(form){
      us = form.tbxUusiSalasana.value;
      usu = form.tbxUusiSalasanaUudelleen.value;

    if (us != usu){
      alert ("\nSalasanat eivät täsmää! Kirjoita salasanat uudelleen.")
      return false;
    }
    else{
      return true;
      }
    }
    </script>

  </head>
<main role="main">
<body>

<nav class="navbar navbar-expand-md navbar-dark" style="background-color: #5A9089;">
  
  <div class="nav-item">
    <a class="navbar-brand">
    <img src="Pictures\whitelogo_Larate.png" style=" height: 30px; width: 100 px; display: inline-block;">        
    </a>
  </div>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarsExampleDefault">  
    <ul class="navbar-nav mr-auto">
    </ul>    
</nav>

    <div class="jumbotron" >
        <div class="container">

        <div class="page-header">
        
        <h1 style="text-align: center;">Hei, </h1>
        </div>
            <div class="row">
                <div class="col-sm-12" style="padding-top: 30px;" id="divProfiili">
                    <div class="col-sm-12">
                      <h5 style="text-align: center;"> ja tervetuloa henkilökohtaiseen asiantuntijaprofiiliisi! <br>Tällä sivulla voit täyttää tietoja palveluistasi ja henkilötiedoistasi, jotka
                        välitetään asiakkaille. <br> Täytettyäsi tiedot, paina "Tallenna tiedot".<br> Paina "Jatka" viimeistelläksesi profiilisi.</h5>
                    </div>
                   
                </div>
                </div>

            <div class="col-sm-12" id="divProfiiliForm"> <br><br>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" id="profiili" style="background-color: white; margin-top: 20px;">
                <div class="form-row" style="padding-top: 10px; padding-left: 10px; padding-right: 10px; padding-bottom: 10px;">
                    <div class="col-md-1">
                    </div>
                <div class="col-md-10">  
                <br><br>                  
                     <div class="form-group <?php echo (!empty($etunimi_err)) ? 'has-error' : ''; ?>">
                        <label>Etunimi</label>
                        <input type="text" name="etunimi" class="form-control" value="<?php echo $etunimi; ?>">
                        <span class="help-block"><?php echo $etunimi_err; ?></span>
                    </div>    
                    <div class="form-group <?php echo (!empty($sukunimi_err)) ? 'has-error' : ''; ?>">
                        <label>Sukunimi</label>
                        <input type="text" name="sukunimi" class="form-control" value="<?php echo $sukunimi; ?>">
                        <span class="help-block"><?php echo $sukunimi_err; ?></span>
                    </div>   
                    <div class="form-group <?php echo (!empty($kaupunki_err)) ? 'has-error' : ''; ?>">
                        <label>Kaupunki</label>
                        <input type="text" name="kaupunki" class="form-control" value="<?php echo $kaupunki; ?>">
                        <span class="help-block"><?php echo $kaupunki_err; ?></span>
                    </div>   
                    <div class="form-group <?php echo (!empty($email_err)) ? 'has-error' : ''; ?>">
                        <label>Email</label>
                        <input type="text" name="email" class="form-control" value="<?php echo $email; ?>">
                        <span class="help-block"><?php echo $email_err; ?></span>
                    </div>                                         
                </div>
              </div>
              <div class="form-row" style=" padding-left: 10px; padding-right: 10px; padding-bottom: 10px;">
                <div class="col-md-1">
                </div>
                <div class="col-md-10">
                    <div class="form-group <?php echo (!empty($esittely_err)) ? 'has-error' : ''; ?>">
                        <label>Esittely</label>
                        <textarea type="text" rows="5" name="esittely" class="form-control" value="<?php echo $esittely; ?>" placeholder="Kerro hieman tarjoamistasi palveluista. Mainitse myös esim. millä kielellä palvelet."><?php  echo $esittely;?></textarea>
                        <span class="help-block"><?php echo $esittely_err; ?></span>
                    </div> 
                </div>
              </div> 
              <div class="form-row" style=" padding-left: 10px; padding-right: 10px; padding-bottom: 10px;">
                <div class="col-md-10">
                </div>
                <div class="col-md-1">
              <div style="padding-top:20px" class="form-group">
                        <input type="submit" class="btn btn-info" value="Tallenna tiedot"> 
                      
                    </div> 
                    </div> 
                    </div> 
            </form>
            <br>
          <br>
            <div class="container">
        <div class="row">
        <div class="col-sm-10"></div>
        <div class="col-sm-2">
        <a class="btn btn-success btn-lg"  style=" min-width: 110px; max-width:100%"
        href="lisaakuva.php" role="button">Jatka</a></div>
        </div>
        </div>           
            
            </div>              
            </div>           
          </div> 
                  </div>
                </div>
            </div>
          </div>
        </div> <!--container--> 
        
      </div>
     
    </div> <!--jumbotron-->
    </div>

  </main>
    <footer class="footerRTP2">
      <div class="container" style="margin-top:80px; ">
      
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
  
     <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  
  </body>
</html>