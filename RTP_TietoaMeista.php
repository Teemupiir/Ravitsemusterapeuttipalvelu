<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Tietoa meistä</title>  
  
  <script>
      
      function ShowHide(divId, Palvelutkuva)
      
      {
        if(document.getElementById(divId).style.display == 'none')
        {
        $("article").hide();
        document.getElementById(divId).style.display='block';
      }

      if(document.getElementById(Palvelutkuva).style.display == 'none')
        {
        $("image").hide();
        document.getElementById(Palvelutkuva).style.display='block';
      }   
        
      }

    </script>
</head>

<?php include('includes/head.php') ?>

<main role="main">
  <div class="jumbotron" style="padding-bottom: 80px;">
    <div class="container">
      <section style="margin-top: 50px;">
        <div class="center">
            <div>
                <h1 class="fontti">Me olemme joukko laillistettuja ravitsemusterapeutteja, <br>jotka haluavat tukea hyvinvointiasi</h1>
                <br>
                <p class="lead"></p>
            </div>
        </div>
      </section>
    
      <br>
      <br>

      <div class="container">
        <div class="row">
          <div class="col-md-5" style="margin-bottom: 10px;">    
            <!-- Sidebar -->
            <div style="background-color: white; text-align: center;  word-wrap: break-word;">
              <div 
                class="card-header fontti"><h4>Tietoa meistä</h4>
              </div>
              <br>
              <a class="nav-link active" style="color: #5bc0de;" onclick="javascript:ShowHide('art1', 'Palvelutkuva1')" href="#art1">Miksi ravitsemusterapiaan?</a>
              <a class="nav-link active" style="color: #5bc0de;" onclick="javascript:ShowHide('art2', 'Palvelutkuva2')" href="#art2">Kenelle ravitsemusterapiaa?</a>
              <a class="nav-link active" style="color: #5bc0de;" onclick="javascript:ShowHide('art3', 'Palvelutkuva3')" href="#art3">Mistä löydän luotettavaa tietoa ravitsemuksesta?</a>
              <a class="nav-link active" style="color: #5bc0de;" onclick="javascript:ShowHide('art4', 'Palvelutkuva4')" href="#art4">Mitä ravitsemusterapia on?</a>
              <a class="nav-link active" style="color: #5bc0de;" onclick="javascript:ShowHide('art5', 'Palvelutkuva5')" href="#art5">Voiko terve hyötyä ravitsemusterapiasta?</a>
              <a class="nav-link active" style="color: #5bc0de;" onclick="javascript:ShowHide('art6', 'Palvelutkuva6')" href="#art6">Mitä palveluita tarjoamme?</a>
              <br>
            </div>
          </div>  

          <div class="col-md-7">
            <div style=" text-align: center;">
              <div class="card bg-light mb-8" style= "height: 100%;">
                <div class="artikkelit" style="padding: 5%">
                <article id="art1" style="display: block">
                    <h2 class="fontti" >Miksi ravitsemusterapiaan?</h1>
                    <br>
                    <h5 class="fonttiLI">Mitä ravitsemusterapia on?<br><br>
                      Miten laillistetut ravitsemusterapeutit eroavat muista ravitsemusalan toimijoista?
                  </h5><br>
                    <p >Ravitsemusterapia on yksilön ravitsemukseen keskittynyt tiede. Ravitsemusterapeutiksi voi kouluttautua vain Itä-Suomen yliopistossa. Laillistettujen ravitsemusterapeuttien toimintaa valvoo Valvira.</p>
                </article>
                <article id="art2" style="display: none">
                    <h2 class="fontti">Kenelle ravitsemusterapiaa?</h1>
                    <br>
                    <p >Ravitsemusterapia sopii kenelle tahansa terveydestään ja hyvinvoinnistaan kiinnostuneelle. Laillistetut ravitsemusterapeutit ovat päteviä terveydenhuollon ammattilaisia, ja ravitsemusterapiasta saatkin apua niin sairauksien hoitoon ja ennaltaehkäisyyn, kuin myös terveyden ja hyvinvoinnin edistämiseen. 
                    <br><br>
                    Voit tulla ravitsemusterapeutin vastaanotolle esimerkiksi mikäli sinua mietityttää nykyiset ruokailutottumuksesi ja ravintoaineiden riittävyys, olet ryhtymässä vegaaniksi, kärsit jatkuvista vatsavaivoista, tai sinulla on jokin ravitsemushoitoa vaativa sairaus.
                    <br><br>
                    Ravitsemusterapeutti voi muun muassa auttaa sinua kroonisten sairauksien, kuten sydän- ja verisuonitautien, keliakian, suolistosairauksien sekä allergioiden hoidossa. Voit myös hakea apua elintapasairauksien ennaltaehkäisyyn, painonhallintaan ja syömisen pulmatilanteisiin, kuten tunnesyömiseen tai syömishäiriöihin. 
                    Lisäksi ravitsemusterapiassa voidaan pohtia ja ratkoa syitä esimerkiksi väsymykseen, työkykyyn ja fyysiseen suorituskykyyn liittyvissä haasteissa.
                    <br><br>
                    Vastaanotolle voi tulla kaikissa elinkaaren vaiheissa, niin odottavat äidit, lapsiperheet, nuoret, aikuiset kuin ikääntyneet. Ohjaus suunnitellaan jokaiselle henkilökohtaisesti omien toiveiden ja tarpeiden mukaisesti. Ammattitaitoiset ravitsemusterapeuttimme ovat täällä sinua varten!
                    </p>
                </article>
                <article id="art3" style="display: none">
                    <h2 class="fontti">Mistä löydän luotettavaa tietoa ravitsemuksesta?</h1>
                    <br>
                    <p >Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                    </p>
                </article>
                <article id="art4" style="display: none">
                    <h2 class="fontti">Mitä ravitsemusterapia on?</h1>
                    <br>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                </article>
                <article id="art5" style="display: none">
                    <h2 class="fontti">Voiko terve hyötyä ravitsemusterapiasta?</h1>
                    <br>
                    <p>Voit tulla ravitsemusterapeutin vastaanotolle, vaikka sinulla ei olisi todettu mitään ravitsemushoitoa vaativaa sairautta! Terveyttä edistävät ruokailutottumukset ovat hyväksi meille kaikille. 
                        Niiden avulla voi pysyä terveenä ja säilyttää toimintakykysi mahdollisimman pitkään. 
                      <br><br>
                      Sairauksien ennaltaehkäisyn ja terveyden edistämisen lisäksi voit hyötyä ravitsemusterapiasta myös jos liikut paljon, noudatat kasvisruokavaliota, elät kiireistä elämää tai haluat varmistusta omille valinnoillesi.
                      <br>
                      <br>
                      Terveellisestä ravitsemuksesta liikkuu nykypäivänä monenlaista tietoa, ja on ymmärrettävää, että informaatiotulvassa on vaikea tietää ketä uskoa. Laillistetulta ravitsemusterapeutilta saat luotettavia vastauksia sinua askarruttaviin kysymyksiin!

                    </p>
                </article>
                <article id="art6" style="display: none">
                    <h2 class="fontti">Mitä palveluita tarjoamme?</h1>
                    <br>
                    
                    <li>Urheiluravitsemus</li>
                    <li >Ikääntyneen ruokavalio </li>
                    <li >Vegaaniravitsemus</li>
                    <li >Syömishäiriöt & tunnesyöminen</li>
                    <li >Tyypin 1 diabeteksen ravitsemushoito</li>
                    <li >Sekä paljon muuta!</li>
                  <br><br>
                  <a href="RTP_Palvelut.php"  style="color: #5bc0de;">Tutustu palveluihimme täältä!</a>
                </article>
                </div>
                <!--
                  grid kuvia varten
                    -->

                <div class="row" style="padding: 5%">
                <div class="col-sm-1"></div>
                <div class="col-sm-10">
  

                <div class="artikkelit" style="margin-bottom: 20px;">
                        <article id="Palvelutkuva1" style="display: block">
                        <img style="max-width: 100%;"
                src="Pictures/kuvapankki9.jpg">
                            </article>
                        <article id="Palvelutkuva2" style="display: none"><img style="max-width: 100%;"
                src="Pictures/kuvapankki8.jpg">
                            </article>
                        <article id="Palvelutkuva3" style="display: none"><img style="max-width: 100%;"
                src="Pictures/kuvapankki14.jpg">
                        </article>
                        <article id="Palvelutkuva4" style="display: none">
                        <img style="max-width: 100%;"
                src="Pictures/kuvapankki12.jpg">
                            </article>
                        <article id="Palvelutkuva5" style="display: none">
                        <img style="max-width: 100%;"
                src="Pictures/kuvapankki15.jpg">
                          </article>
                        <article id="Palvelutkuva6" style="display: none">
                        <img  style="max-width: 100%;"
                src="Pictures/kuvapankki13.jpg">
                          </article>
                      </div>

                </div>

                <div class="col-sm-2"></div>
                </div>
    
              </div>
            </div>
          </div>
        </div>
      </div>
    <div class="container">

    </div> <!--container-->

  </main>   

  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

  <?php include('includes/footer.php') ?>

</body>
</html>
