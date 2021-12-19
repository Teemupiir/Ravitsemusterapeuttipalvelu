<?php

// lisää config file
require_once "config.php";

//yhdistä tietokanta
$dbhost = "localhost";
 $dbuser = "root";
 $dbpass = "";
 $db = "rtp_db";
 $port="3307";

 $conn = new mysqli($dbhost, $dbuser, $dbpass,$db,$port) or die("Connect failed: %s\n". $conn -> error);

// valitse taulu, hae tieto
$sql = "SELECT users_fk, tp_etunimi, tp_sukunimi, tp_paikkakunta, tp_esittelyteksti FROM terapeutit";
 $result = $conn->query($sql);
 $terapeutit= mysqli_fetch_all($result, MYSQLI_ASSOC);

 mysqli_free_result($result);

 //sulje tietokantayhteys
 $conn->close();

?>
<?php include('includes/head.php') ?>
 
<style>
.carousel-control-prev-icon 
{ 
  background-image:url("data:image/svg+xml;charset=utf8,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='%235bc0de' viewBox='0 0 8 8'%3E%3Cpath d='M5.25 0l-4 4 4 4 1.5-1.5-2.5-2.5 2.5-2.5-1.5-1.5z'/%3E%3C/svg%3E"); 
}
.carousel-control-next-icon 
{
  background-image: url("data:image/svg+xml;charset=utf8,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='%235bc0de' viewBox='0 0 8 8'%3E%3Cpath d='M2.75 0l-1.5 1.5 2.5 2.5-2.5 2.5 1.5 1.5 4-4-4-4z'/%3E%3C/svg%3E");
}
</style>

   
  </div>
</nav>

<main role="main">

<div style="background-image: url('pictures/larate_etusivu-kokeilu2.jpg'); 
    width: 100%; 
    height: auto;
    background-repeat: no-repeat; 
    padding-bottom: 37%; 
    overflow: auto;
    background-size: cover;
    background-origin: content-box;">
</div>
    <div class="jumbotron" >
      <div class="container" style="padding-left: 10%; padding-right: 10%;">
    
     </div> 
      <div class="container text-wrap" >
        <h1 class="display-7" style="margin-top: 40px; word-wrap: break-word;"></h1>
        <h2 class="fonttiL" style="font-weight:lighter;">Onko sinulla tai läheiselläsi haasteita ruoansulatuksen tai erityisruokavalioiden kanssa?<br> 
          Etsitkö luotettavaa tietoa ruokailuun tai syömiseen liittyvissä kysymyksissä?<br>Me olemme ravitsemukseen koulutettu ammattikunta.
        </h2>
        <br>
        <p>
        <a class="btn btn-info btn-lg"  style=" min-width: 110px; max-width:100%"
        href="hakusivu2_AMANDA.php" role="button">Tee haku &raquo;</a></p>
      </div>

      <br>
      <br>
      <br>
      <br>

      <div class="content-box" id="contentbox_Carousel" style="padding-left: 15%; padding-right: 15%;">
        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                  <img style="background-color: white;" class="d-block w-100" alt="">
                  <div class="d-flex flex-row bd-highlight mb-3 d-flex d-flex justify-content-around">
                    <div class="card card-inverse card-primary text-center" style=" min-width: 150px; width: 30%; ">
                      <img class="card-img-top" style="width: 100%; height: auto; background-repeat: no-repeat;"
                      src="pictures/eevipeltola1.jpeg"
                          alt="Card image cap">
                      <div class="card-body">
                        <h4 class="card-title fontti" style="">Eevi Peltola</h4>
                        <h5 class="card-title fontti" style="">Kuopio</h5>
                        <div style="overflow: hidden; display: -webkit-box; -webkit-line-clamp: 5; -webkit-box-orient: vertical;">
                          <p class="card-text" id="teksti1">Moi! Olen Eevi Peltola. Palvelen Kuopion Saaristokaupungissa. Palvelen suomen- ja ruotsinkielellä. Olen opiskellut Itä-Suomen yliopistossa ravitsemustieteitä. Sivuaineekseni opiskelin     </p>
                        </div>
                        <br>
                        <a style="margin-top: 0px; margin-bottom: 0px; min-width: 110px; max-width:100%; float: bottom;" href="varaa_aika.php?id=76"  class="btn btn-info" class="align-text-bottom">Ajanvaraus</a>
                      </div>
                    </div>
                    <div class="card card-inverse card-primary text-center" style=" min-width: 150px; width: 30%; ">
                      <img class="card-img-top" style="width: 100%; height: auto; background-repeat: no-repeat; "
                      src="pictures/jasminqvick1.jpg"
                      alt="Card image cap">
                      <div class="card-body">
                        <h5 class="card-title fontti" >Jasmin Qvick</h5>
                        <h5 class="card-title fontti" >Kuopio</h5>
                        <div style="overflow: hidden; display: -webkit-box; -webkit-line-clamp: 5; -webkit-box-orient: vertical;">
                          <p class="card-text" id="teksti2">Hei! Palvelen Kuopion keskustassa. Olen erikoistunut hyvinvointiin. Palvelen suomeksi ja ruotsiksi. Olen opiskellut Itä-Suomen yuliopistossa, josta sainkin laillistetun revitsemusterapeutin pätevyyden. Opinnoissani keskityin itseäni eniten kiinnostavaan, eli kokonaisvaltaiseen hyvinvointiin</p>
                         
                        </div>
                          <br>
                          <a  style=" min-width: 110px; max-width:100%" href="varaa_aika.php?id=77"  class="btn btn-info" class="align-text-bottom">Ajanvaraus</a>
                      </div>
                    </div>
                    <div class="card card-inverse card-primary text-center" style=" min-width: 150px; width: 30%; ">
                      <img class="card-img-top"  style="width: 100%; height: auto; background-repeat: no-repeat; "
                      src="pictures/reettaeerikäinen1.png"
                      alt="Card image cap">
                      <div class="card-body">
                        <h5 class="card-title fontti" >Reetta Eerikäinen</h5>
                        <h5 class="card-title fontti" >Kuopio</h5>
                        <div style="overflow: hidden; display: -webkit-box; -webkit-line-clamp: 5; -webkit-box-orient: vertical;">
                          <p class="card-text" id="teksti3">Hei! Olen Reetta. Palvelen Kuopiossa. Olen erikoistunut kaikkiin sairauksiin. Palvelen suomeksi ja englanniksi. Pääaineopintojeni ohelle kerrytin paljon tietämystä sivuainepinnoillani, joissa keskityin</p>
                         
                        </div>
                          <br>
                          <a  style=" min-width: 110px; max-width:100%" href="varaa_aika.php?id=78"  class="btn btn-info" class="align-text-bottom">Ajanvaraus</a>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="carousel-item">
                  <img style="background-color:white" class="d-block w-100" alt="">
                  <div class="d-flex flex-row bd-highlight mb-3 d-flex d-flex justify-content-around">
                    <div class="card card-inverse card-primary text-center" style=" min-width: 150px; width: 30%; ">
                      <img class="card-img-top" style="width: 100%; height: auto; background-repeat: no-repeat; "
                      src="ladatutkuvat/pinapple.man.jpg"
                      alt="Card image cap">
                      <div class="card-body">
                        <h5 class="card-title fontti">Anssi Ananas</h5>
                        <h5 class="card-title fontti">Alavus</h5>
                        <div style="overflow: hidden; display: -webkit-box; -webkit-line-clamp: 5; -webkit-box-orient: vertical;">
                          <p class="card-text" id="teksti4">Hei, olen Anssi Ananas. Olen erikoistunut erityisesti allergioihin, sekä ikääntyneiden ravitsemukseen. Olen ollut alalla jo 45- vuotta, joten voin lämmöllä puhua itsestäni kokemuksen ammattilaisena. Palvelen suomeksi, englanniksi, afrikaansiksi sekä suomeruotsiksi tarvittaessa. Olen lämmimhenkinen ja otan uusia asiakkaiat mielelläni vastaan. Tervetuloa vastaanotolleni, niin laitetaan sinunkin ravitsemusasiat kuntoon.
</p>
                        </div>
                        <br>
                        <a  style="min-width: 110px; max-width:100%" href="varaa_aika.php?id=85"  class="btn btn-info" class="align-text-bottom">Ajanvaraus</a>
                      </div>
                    </div>
                    <div class="card card-inverse card-primary text-center" style="min-width: 150px; width: 30%; ">
                    <img class="card-img-top" style="width: 100%; height: auto; background-repeat: no-repeat; "
                    src="ladatutkuvat/apple_lady.jpg"
                    alt="Card image cap">
                      <div class="card-body">
                        <h5 class="card-title fontti" >Olga Omena</h5>
                        <h5 class="card-title fontti" >Oulu</h5>
                        <div style="overflow: hidden; display: -webkit-box; -webkit-line-clamp: 5; -webkit-box-orient: vertical;">
                          <p class="card-text" id="teksti5">Terve, olen Olga Omena. Kiinnostukseni kohteita ovat sairauksien hoitaminen oikealla ruokavaliolla, sekä sairastan itsekin keliakiaa, joten olen omakohtaisesti tutustunut viljattomaan ruokavalioon. Minulle tärkeää on asiakkaan kokonaisvaltainen hyvinvointi, ohjaan vapaa-ajallani liikuntaa, joten osaan antaa erityisiä vinkkejä kokonaisvaltaiseen hyvinvointiin. Olen valmistunut vuonna 2010 terveydtieteiden maisteriksi Kuopiosta. Palvelen suomeksi, englanniksi, afrikaansiksi sekä suomeruotsiksi tarvittaessa. Olen lämmimhenkinen ja otan uusia asiakkaita mielelläni vastaan. Tervetuloa vastaanotolleni, niin laitetaan sinunkin.</p>
                          
                        </div>
                        <br>
                        <a style="min-width: 110px; max-width:100%" href="varaa_aika.php?id=83"  class="btn btn-info" class="align-text-bottom">Ajanvaraus</a>
                      </div>
                    </div>
                    <div class="card card-inverse card-primary text-center" style="min-width: 150px; width: 30%; ">
                      <img class="card-img-top"  style="width: 100%; height: auto; background-repeat: no-repeat; "
                      src="ladatutkuvat/healthy_julie.jpg"
                      alt="Card image cap">
                      <div class="card-body">
                        <h5 class="card-title fontti" >Sini Smoothie</h5>
                        <h5 class="card-title fontti" >Suonenjoki</h5>
                        <div style="overflow: hidden; display: -webkit-box; -webkit-line-clamp: 5; -webkit-box-orient: vertical;">
                          <p class="card-text" id="teksti6">Moikka, olen Sini Smoothie. Olen erikoistunut erityisesti syömishäiriöhin, sekä lapsien ravitsemukseen. Olen ollut alalla 10 vuotta, joten voin lämmöllä puhua itsestäni kokemuksen ammattilaisena. Olen valmistunut vuonna 2010 terveydtieteiden maisteriksi Kuopiosta. Palvelen suomeksi, englanniksi, afrikaansiksi sekä suomeruotsiksi tarvittaessa. Olen lämmimhenkinen ja otan uusia asiakkaita mielelläni vastaan. Tervetuloa vastaanotolleni, niin laitetaan sinunkin ravitsemusasiat kuntoon.</p>
                          
                        </div>
                        
                        <br>
                        <a style="min-width: 110px; max-width:100%" href="varaa_aika.php?id=84"  class="btn btn-info" class="align-text-bottom">Ajanvaraus</a>
                      </div>
                    </div>
                  </div>
                </div>
            </div>
          <div>
            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"> </span>
            <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
            </a>
          </div>
        </div>
      </div>

      <br>
      <br>
      <br>
      <br>

      <div class="container">
        <h2 class="fontti" >Tutustu terapeutteihimme</h2>
        <h4 class="fonttiL" style="font-weight: lighter;">Palvelumme asiantuntevat ja laillistetut ravitsemusterapeutit ovat aina valmiita auttamaan juuri sinun tarpeitasi.</h4>
        <br>
        <p><a class="btn btn-info"  style="min-width: 110px; max-width:100%;" href="Asiantuntijat.php" role="button">Asiantuntijat &raquo;</a></p>
    
        <br>
        <br>

        <h2 class="fontti">Selaa palveluitamme</h2>
        <h4 class="fonttiL" style="font-weight: lighter;">Ravitsemusterapeutit taitavat ruokailun ja ravitsemusohjauksen lisäksi myös erityisosaamista vaativat tilanteet, kuten diabeteksen, 
          keliakian tai kilpaurheilun asettamat ravitsemukselliset erityisvaatimukset.
        </h4>
        <br>
        <p><a class="btn btn-info"  style="min-width: 110px; max-width:100%;" href="RTP_Palvelut.php" role="button">Palvelut &raquo;</a></p>
        <br>
        <br>
      </div> <!-- /container -->
    </div>
  </main>

  <?php include('includes/footer.php') ?>

    <!-- JavaScript -->
    <!-- jQuery ensin, sitten Popper.js, ja Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>