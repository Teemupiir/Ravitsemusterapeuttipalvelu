<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    
    <title>Palvelut</title>
  
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

    <!--Main eli sivun sisältöosio -->
<main role="main">
  <div class="jumbotron" style="padding-bottom: 80px;">
    <div class="container">
      <section style="margin-top: 50px;">
          <div class="center">
              <div>
                  <h1 class="fontti">Ruoka on tärkeä osa päivittäistä hyvinvointiamme</h1>
                  <br>
                  <h4 class="fonttiLI">Ravitsemusterapeutit taitavat ruokailun ja ravitsemusohjauksen lisäksi myös erikoisosaamista vaativat tilanteet, kuten diabeteksen, keliakian tai kilpaurheilun asettamat ravitsemukselliset erityisvaatimukset.</h4>
              </div>
          </div>
      </section>
      
      <br>
      <br>

      <div class="container">
        <div class="row">
          <div class="col-md-5" style="margin-bottom: 10px;">    
            <!-- Sidebar -->
            <div class="w3-bar-block w3-border-right" style="background-color: white; text-align: center; word-wrap: break-word;" >
              <div 
                class="card-header"><h4 class="fontti">Palvelut</h4>
              </div>
                <br>
                <h5 class="card-title fonttiL">Ravitsemusohjaus, <br> kaikkien terapeuttiemme tarjoama:</h5>
                  <a class="nav-link active"  style="color: #5bc0de;" onclick="javascript:ShowHide('ar1', 'Palvelutkuva1')" href="#ar1">Ruoanvalinta helpommaksi</a>
                  <a class="nav-link active" style="color: #5bc0de;" onclick="javascript:ShowHide('ar2', 'Palvelutkuva2')" href="#ar2">Energisempi arki</a>
                <br>
                <h5 class="card-title fonttiL">Erikoisosaamista vaativat palvelut:</h5> 
                  <a class="nav-link active" style="color: #5bc0de;" onclick="javascript:ShowHide('ar3', 'Palvelutkuva3')" href="#ar3">Liikkujan ravitsemus</a>
                  <a class="nav-link active" style="color: #5bc0de;" onclick="javascript:ShowHide('ar4', 'Palvelutkuva4')" href="#ar4">Ahdistava ruoka</a>
                  <a class="nav-link active" style="color: #5bc0de;" onclick="javascript:ShowHide('ar5', 'Palvelutkuva5')" href="#ar5">Vegaaniravitsemus</a>
                  <a class="nav-link active" style="color: #5bc0de;" onclick="javascript:ShowHide('ar6', 'Palvelutkuva6')" href="#ar6">Eettisesti ja ekologisesti kestävä ruokavalio</a>
                  <a class="nav-link active" style="color: #5bc0de;" onclick="javascript:ShowHide('ar7', 'Palvelutkuva7')" href="#ar7">Tyypin 1 diabetes</a>
                  <a class="nav-link active" style="color: #5bc0de;" onclick="javascript:ShowHide('ar8', 'Palvelutkuva8')" href="#ar8">Suolistosairaudet ja vatsaongelmat</a>
                  <a class="nav-link active" style="color: #5bc0de;" onclick="javascript:ShowHide('ar9', 'Palvelutkuva9')" href="#ar9">Lapsiperheen ravitsemus</a>
                  <a class="nav-link active" style="color: #5bc0de;" onclick="javascript:ShowHide('ar10', 'Palvelutkuva10')" href="#ar10">Etkö löydä etsimääsi?</a>
                  <a class="nav-link active" style="color: #5bc0de;" onclick="javascript:ShowHide('ar11', 'Palvelutkuva11')" href="#ar11">Hinnasto</a>
                <br>
            </div>
          </div>

          <div class="col-md-7">
            <div style="text-align: center;">
              <div class="card bg-light mb-8" style= "height: 100%;">
                <div class="artikkelit" style="padding: 5%">
                <article id="ar1" style="display: block">
                  <h2 class="fontti">Ruoanvalinta helpommaksi</h1>
                  <br>
                  <p >60 minuutin aika</p>
                  <br>
                  <p >Mitä kerätä ostoskoriin monipuolisen ruokavalion koostamiseksi? Milloin ruoanvalinnasta tuli näin vaikeaa? Ruoka herättää paljon kysymyksiä, joihin vastauksien löytäminen voi osoittautua yllättävän haastavaksi. Ravitsemusterapeutin työtä on ratkoa ravitsemuksen pulmia ja vastata syömiseen, ruokaan ja ravintoaineisiin liittyviin kysymyksiin.</p>
                </article>
                <article id="ar2" style="display: none">
                  <h2 class="fontti">Energisempi arki</h1>
                  <br>
                  <p >60 minuutin aika</p>
                  <br>
                  <p>Ruoasta saa energiaa, ravintoaineita ja mielihyvää – arjen ruokavalinnoilla on myös suuri merkitys terveydellesi. Ottamalla pieniä askelia kohti terveyttä edistävää ja ylläpitävää ruokavaliota, voit pienentää riskiäsi useisiin kansansairauksiin. Elintapojen muuttaminen ei ole helppoa, mutta sen aloittamista ei kannata lykätä, sillä pienikin muutos on askel oikeaan suuntaan.</p>
                </article>
                <article id="ar3" style="display: none">
                    <h2 class="fontti">Liikkujan ravitsemus</h1>
                    <br>
                    <p>60 minuutin aika</p>
                    <br>
                    <p >Tiesitkö, että urheilijan lautasmalli poikkeaa tavanomaisesta? Riittävä ravitsemus parantaa suorituskykyäsi, nopeuttaa palautumistasi ja ennaltaehkäisee loukkaantumisia.
                    Ateriarytmi, riittävä ravintoaineiden saanti ja hyvien välipalojen löytäminen on hyvä suunnitella henkilökohtaisesti. Urheiluravitsemuksen erikoistumisopinnot käynyt ravitsemusterapeutti osaa auttaa niin kuntoliikkujia, aktiiviurheilijoita kuin ammattilaisiakin – kysy myös ravitsemusluentoa urheiluseurallesi tai joukkueellesi!
                    </p>
                </article>
                <article id="ar4" style="display: none">
                    <h2 class="fontti">Ahdistava ruoka</h1>
                    <br>
                    <p >60 minuutin aika</p>
                    <br>
                    <p>Hallitseeko ruoka ajatuksiasi? Aiheuttaako syömisrutiineistasi poikkeaminen ahdistusta? Ruokailu on osa jokaista päivää ja sen ei pitäisi olla huolen ja kontrollin aihe. Ravitsemusterapeutti voi auttaa sinua niin ruokailutottumuksiin liittyvien haasteiden kuin syömisen psykologisen puolen kanssa. 
                    Oletko huolissasi läheisesi suhteesta syömiseen? Keskusteluajan varaaminen läheisellesi on osoitus välittämisestä.
                    </p>
                </article>
                <article id="ar5" style="display: none">
                    <h2 class="fontti">Vegaaniravitsemus</h1>
                    <br>
                    <p>60 minuutin aika</p>
                    <br>
                    <p >Haluaisitko ruveta syödä vegaanisesti tai oletko ollut vegaani jo pidemmän aikaa? Kaipaatko varmistusta ruokavaliosi riittävyyteen tai haluatko kysellä asioista tarkemmin? Onko läheisesi ruvennut vegaaniksi ja haluaisit esimerkiksi vanhempana hänen keskustelevan ruokavalioon liittyvistä asioista ravitsemusterapeutin kanssa? Vegaaniravitsemukseen erikoistuneet terapeuttimme osaavat auttaa sinua.</p>
                </article>
                <article id="ar6" style="display: none">
                    <h2 class="fontti">Eettisesti ja ekologisesti kestävä ruokavalio</h1>
                    <br>
                    <p>60 minuutin aika</p>
                    <br>
                    <p >Oletko kiinnostutunut ympäristön hyvinvoinnista tai haluatko ruokatottumuksillasi vaikuttaa ilmaston muutoksen ehkäisemiseen? Kiinnostaako sinua esimerkiksi planetaarinen ruokavalio? Ravitsemusterapeuttimme osaa auttaa sinua koostamaan ympäristöystävällisen ja ravitsemuksellisesti riittävän ruokavalion.</p>
                </article>
                <article id="ar7" style="display: none">
                    <h2 class="fontti">Tyypin 1 diabetes</h1>
                    <br>
                    <p >60 minuutin aika</p>
                    <br>
                    <p>Onko sinulla haasteita pitää verensokerisi hyvässä tasapainossa? Kaipaatko apua insuliinin ja ruokailun yhteensovittamisessa? Mietityttääkö sinua, miten oma ruokavaliosi vaikuttaa diabeteksen hoitotasapainoon? Muun muassa näihin asioihin voit saada apua diabetekseen erikoistuneelta ravitsemusterapeutilta!</p>
                </article>
                <article id="ar8" style="display: none">
                    <h2 class="fontti">Suolistosairaudet ja vatsaongelmat</h1>
                    <br>
                    <p >60 minuutin aika</p>
                    <br>
                    <p>Vatsavaivat voivat heikentää elämänlaatua merkittävästi, mutta lohduttavaa on, että ruokavaliolla voidaan usein vaikuttaa oireisiin. Kannattaa varata aika suoliston toimintaan erikoistuneen ravitsemusterapeutin vastaanotolle, mikäli kaipaat apua keliakian, ärtyvän suolen oireyhtymän (IBS) tai tulehduksellisten suolistosairauksien (IBD) ravitsemushoidossa. Voit myös tulla vastaanotolle ilman diagnoosia, mikäli vatsasi toiminta mietityttää ja haluat selvittää voisiko tilanne helpottaa ravitsemuksen keinoin.</p>
                </article>
                <article id="ar9" style="display: none">
                    <h2 class="fontti">Lapsiperheen ravitsemus</h1>
                    <br>
                    <p >60 minuutin aika</p>
                    <br>
                    <p>Kaipaisitteko vinkkejä perheenne ruokailuun? Haluaisitteko varmistaa lapsenne monipuolisen  ruokavalion tai keskustella muista lapsen ruokavalioon liittyvistä asioista? Lapsen ruokavalio heijastaa koko perheen ruokavaliota ja siksi sitä on paras tarkastella kokonaisuutena.</p>
                </article>
                <article id="ar10" style="display: none">
                    <h2 class="fontti">Etkö löydä etsimääsi?</h1>
                    <br>
                    <p >Ei se mitään, varaa <a href="hakusivu2.php">tästä</a> 60 min konsultointiaika ja kerro lomakkeelle mistä haluaisit keskustella. Ravitsemusterapeuttimme ottaa sinuun yhteyttä!</p>
                </article>
                <article id="ar11" style="display: none">
                    <h2 class="fontti">Hinnasto</h2>
                    <br>
                    <p style=" text-align: left">1. Yksilöohjaus <br> 
                    <ul style="text-align: left; list-style-type: circle;">
                      <li>60 min  - 99€</li>
                        <ul>
                        <li>RAVITSEMUSOHJAUS /PERUSKONSULTOINTI</li>
                        <li>energisempi arki</li>
                        </ul>
                    </ul>
                    <ul style="text-align: left; list-style-type: circle;">
                      <li>60 min - 119€</li>
                        <ul>
                        <li>RAVITSEMUSOHJAUS /ERIKOISTUMISTA VAATIVA OHJAUS</li>
                        <li>vegaani, urheilu…</li>
                        </ul>
                    </ul>
                    <ul style="text-align: left; list-style-type: circle;">
                      <li>45 min  - 79€</li>
                        <ul>
                        <li>JATKOKÄYNTI + välipuhelu (20min)</li> 
                        </ul>                
                    </ul>
                    <ul style="text-align: left; list-style-type: circle;">
                      <li>15 min - 0€</li>
                        <ul>
                        <li>KYSYMYS / LYHYT KONSULTOINTI PUHELIMITSE</li>  
                        </ul>               
                    </ul>
                    </p>   
                    <p style=" text-align: left; padding-top:30px;">2. Luennointi <br><br> 
                    Järjestämme luentoja laajasti aihealueittain. Luentomme ovat tarjousperusteisia, joten kerrothan meille luennon osallistujamäärän jne.<br><br> Ota yhteyttä meihin:

                    <div> </div>
                    <div class="row" style="padding-top: 20px;">
                      <div class="col-md-4" style="font-weight: lighter">  Reetta Eerikäinen <br>  reettaee@student.uef.fi </div> 	
                      <div class="col-md-4" style="font-weight: lighter">	Eevi Peltola <br> eevip@student.uef.fi </div>
                      <div class="col-md-4" style="font-weight: lighter">	Jasmin Qvick <br> jasminq@student.uef.fi </div>     
                    </div>       
                  </p>
                </article>
                </div>
                <div class="row" style="margin-bottom: 20px;">
                  <div class="col-sm-1"></div>
                    <div class="col-sm-10">
                      <div class="artikkelit" style="padding: 5%">
                              <article id="Palvelutkuva1" style="display: block">
                              <img style="width: 100%;"
                      src="Pictures/kuvapankki5.jpeg">
                                  </article>
                              <article id="Palvelutkuva2" style="display: none"><img style="width: 100%;"
                      src="Pictures/kuvapankki11.jpg">
                                  </article>
                              <article id="Palvelutkuva3" style="display: none"><img style="width: 100%;"
                      src="Pictures/kuvapankki2.jpg">
                              </article>
                              <article id="Palvelutkuva4" style="display: none">
                              <img style="width: 100%;"
                      src="Pictures/kuvapankki4.jpeg">
                                  </article>
                              <article id="Palvelutkuva5" style="display: none">
                              <img style="width: 100%;"
                      src="Pictures/kuvapankki7.jpg">
                                </article>
                              <article id="Palvelutkuva6" style="display: none">
                              <img  style="width: 100%;"
                      src="Pictures/kuvapankki3.jpg">
                                </article>
                              <article id="Palvelutkuva7" style="display: none">
                              <img  style="width: 100%;"
                      src="Pictures/kuvapankki10.jpg">
                              </article>
                              <article id="Palvelutkuva8" style="display: none">
                              <img style="width: 100%;"
                      src="Pictures/kuvapankki1.png">
                                </article>
                              <article id="Palvelutkuva9" style="display: none">
                              <img style="width: 100%;"
                      src="Pictures/kuvapankki6.jpeg">
                                </article>
                              <article id="Palvelutkuva10" style="display: none">
                              <img  style="width: 100%;"
                      src="Pictures/kuvapankki13.jpg">
                              </article>
                              <article id="Palvelutkuva11" style="display: none">
                              <img  style="width: 100%;"
                      src="Pictures/Color logo - no background.png">
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
    </div>
    <br>
    <br>
  </div> <!--container-->
  </div>
  </div>
  </main>

<?php include('includes/footer.php') ?>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>


</body>
</html>