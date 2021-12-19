<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Profiili</title>

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
      f.elements[i].readOnly = true;
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

    function edit() {
      var x = document.getElementById("btnChangeImg");
      var s = document.getElementById("btnSave");
      var d = document.getElementById("btnDiscard");
      var e = document.getElementById("btnEdit");
      var o = document.getElementById("divOtsikko");
      var k = document.getElementById("divKalenteri");
      var p = document.getElementById("ChangePwd");
      

      if (s.style.display === "none") {
        var f = document.forms['profiili'];
          for(var i=0,fLen=f.length;i<fLen;i++){
          f.elements[i].readOnly = false;
        }
        s.style.display = "block";
        d.style.display = "block";
        e.style.display = "none";
        o.style.display = "none";
        k.style.display = "none";
        p.style.display = "none";
        
      } else {
        d.style.display = "none";
        s.style.display = "none";
        e.style.display = "block";
        o.style.display = "block";
        k.style.display = "block";
        p.style.display = "block";
        var f = document.forms['profiili'];
          for(var i=0,fLen=f.length;i<fLen;i++){
          f.elements[i].readOnly = true;
        }
      }
      if (x.style.display === "none") {
        x.style.display = "block";
      } else {
        x.style.display = "none";
      }
      
      
    }
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
    
       <a class="btn btn-light float-right" href="index.php" type="button" aria-haspopup="true" aria-expanded="false">
      Kirjaudu ulos</a>
</nav>

    <!-- Main jumbotron -->
    <div class="jumbotron" >
        <div class="container">
            <div class="row">
                <div class="col-sm-12" style="padding-top: 30px;" id="divProfiili">
                  <div class="row">
                    <div class="col-sm-10">
                      <p style="font-weight: lighter;"> Tervetuloa henkilökohtaiseen asiantuntijaprofiiliisi! <br>Tällä sivulla voit nähdä ja muokata tietoja palveluistasi ja henkilötiedoistasi, jotka
                        välitetään asiakkaille. <br>
                        Muokataksesi profiilia, paina "Muokkaa profiilia" nappia, ja tee tarvittavat muutokset. 
                        Tallenna muutokset painamalla "Tallenna".</p>
                    </div>
                    <div class="col-sm-2">
                      <button onclick="edit()" class="btn btn-info" id="btnEdit" type="button" href="#" style="float: right;">
                      Muokkaa profiilia
                    </button>
                    <button onclick="edit()" class="btn btn-success" id="btnSave" type="button" style="float: right; display: none; margin-top: 10px; margin-left: 10px;">Tallenna</button>
                    <button onclick="edit()" class="btn btn-danger" id="btnDiscard" type="button" style="float: right; display: none; margin-top: 10px;">Peruuta</button>
                  </div>
                  </div>
                </div>
            
                <div class="col-sm-12" id="divProfiiliForm">
                <form id="profiili" style="background-color: white; margin-top: 20px;">
                    <div class="form-row" style="padding-top: 10px; padding-left: 10px; padding-right: 10px; padding-bottom: 10px;">
                    <div class="col-md-1">
                </div>
                  <div id="profile-container" class="col-md-4">
                      <img class="profile-pic" src="Pictures/noprofilepic.png" width="200" height="200" style="box-shadow: 1px 1px 3px grey; border-radius: 10px;">
                      <div class="p-image" id="btnChangeImg" style="display: none;">
                        
                        <p class="fa fa-camera upload-button btn btn-info btn-sm" style="margin-top: 10px;">Vaihda profiilikuva</p>
                          <input class="file-upload" type="file" accept="image/*" style="display: none;"/>
                      </div>
                  </div>
                <div class="col-md-6">
                  <label for="validationDefault01">Etunimi</label>
                  <input type="text" class="form-control" id="tbxEtunimi" required>
                  <div>
                    <label for="validationDefault03">Sukunimi</label>
                    <input type="text" class="form-control" id="tbxSukunimi" required>
                  </div>
                  <div>
                    <label for="validationDefault03">Kaupunki</label>
                    <input type="text" class="form-control" id="tbxKaupunki" required>
                  </div>
                  <div>
                    <label for="exampleInputEmail1">Sähköpostiosoite</label>
                    <input type="email" class="form-control" id="tbxSähköpostiosoite" required>
                  </div>
                </div>
              </div>
              <div class="form-row" style=" padding-left: 10px; padding-right: 10px; padding-bottom: 10px;">
                <div class="col-md-1">
                </div>
                <div class="col-md-10">
                    Profiiliteksti
                    <textarea id="taProfiiliteksti"rows="5" class="form-control" placeholder="Kerro hieman tarjoamistasi palveluista. Mainitse myös esim. millä kielellä palvelet."></textarea>
                </div>
              </div>

            <div class="form-row" style="padding-top: 10px; padding-left: 10px; padding-right: 10px; padding-bottom: 10px;">
              <div class="col-md-1">
              </div>
              <div class="col-md-10">
                <div class="accordion" id="accordionExample">
                    <div class="card">
                      <div class="card-header" id="headingOne">
                        <h2 class="mb-0">
                          <button class="btn btn-link dropdown-toggle" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            Osaamisalueet
                          </button>
                        </h2>
                      </div>
                  
                      <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                        <div class="card-body">
                          <?php include('includes/osaamisalueet.php') ?>
                        </div>
                      </div>
                    </div>
                </div>
              </form>
              </div>
            </div>  
          </div>

          <div class="col-sm-12" id="ChangePwd">
            
            <form style="background-color: white;" onsubmit="return check(this)" >
            <div class="form-row" style="padding-top: 10px; padding-bottom: 10px; padding-left: 10px;">
            <div class="col-md-1">
                    </div>
              <div id="divPwdOtsikko" class="col-sm-10">
                <p style="font-weight: bold;">Uuden salasanan vaihto</p>
                <div>
                  <button type="button" onclick="changePwd()" class="btn btn-info btn-sm" id="btnChangePwd">
                    Vaihda tilisi salasana
                  </button>
                </div>
              </div>
            </div>
              <div class="form-row" id="divSalasananVaihto" style="padding-top: 10px; padding-bottom: 10px; display: none;">
              
                <div class="container">
                  <div class="row">
                    <div class="col-md-1">
                    </div>
                    <div class="col-md-10">
                    <div class="form-row" id="formPwd" onSubmit = "return check(this)" style=" padding-right: 10px; padding-bottom: 10px;">
                      
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="tbxUusiSalasana">Uusi salasana</label>
                          <input type="password" class="form-control" id="tbxUusiSalasana" required>
                        </div> 
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="tbxUusiSalasanaUudelleen">Toista uusi salasana</label>
                          <input type="password" class="form-control" id="tbxUusiSalasanaUudelleen" required>
                        </div> 
                      </div>
                      <div class="col-md-12">
                      <a href="RTP_ProfiilinMuokkaus.php" class="btn btn-danger" id="btnCancelPwd">Peruuta</a>

                      <button class="btn btn-success" type="submit" id="btnChangePwd" style="float: right;">Vaihda salasana</button>
                      </div>
                    </div>
                    </div>
                  </div>
                </div>
              </div>
            </form>
          </div>
          
          <div id="divOtsikko" class="col-sm-10" style="margin-top: 60px;">
          <p style="font-weight: lighter;">Tästä näet tarjoamiesi palveluiden mukaiset päivämäärät ja ajat.<br> 
          Valitse kalenterista päivämäärä ja valitse haluatko 
          vapauttaa aikoja vai tarkastella varauksia.</p>
          </div>
            <div id="divKalenteri" class="col-sm-12">
              <form style="background-color: white; margin-top: 20px;">
            <div class="form-row" style="padding-top: 10px; padding-bottom: 10px;">
              
              <div class="container">
                <div class="row">
                <div class="col-md-1">
                </div>
                  <div class="col-md-5">
                    <div style="text-align: left;" id="datepicker"></div>
                    <div style="margin-top: 10px;">
                      <button type="button" onclick="freeTimes()" class="btn btn-info btn-sm" data-backdrop="static" data-target="#vapautaAikoja">
                        Vapauta aikoja
                      </button>
                      <button type="button" onclick="reservations()" class="btn btn-info btn-sm" data-backdrop="static" data-target="#varatutAjat">
                        Tarkastele varauksia
                      </button>
                    </div>
                  </div>
                  <div class="col-md-5" style="margin-top: 5px;">
                    <div class="container" id="btnVapauta" style="border-color: lightgray; border-radius: 3px; border-style:solid; border-width: 1px; display: none;">
                      Vapauta aikoja
                      <form>
                        <div class="form-group">
                         <div style="border-style:solid; border-radius: 10px; border-width: 1px; margin-top: 5px;">
                          <div class="form-check" style="margin-left: 10px;">
                            <input class="form-check-input" type="checkbox" value="" id="cbxAika1" checked>
                            <label class="form-check-label" for="invalidCheck2">
                              9:00 - 9:30
                            </label>
                          </div>
                         </div>
                         <div style="border-style:solid; border-radius: 10px; border-width: 1px; margin-top: 5px;">
                          <div class="form-check" style="margin-left: 10px;">
                            <input class="form-check-input" type="checkbox" value="" id="cbxAika2" checked>
                            <label class="form-check-label" for="invalidCheck2">
                              9:30 - 10:00
                            </label>
                          </div>
                         </div>
                         <div style="border-style:solid; border-radius: 10px; border-width: 1px; margin-top: 5px;">
                          <div class="form-check" style="margin-left: 10px;">
                            <input class="form-check-input" type="checkbox" value="" id="cbxAika3" checked>
                            <label class="form-check-label" for="invalidCheck2">
                              10:00 - 10:30
                            </label>
                          </div>
                         </div>
                         <div style="border-style:solid; border-radius: 10px; border-width: 1px; margin-top: 5px;">
                          <div class="form-check" style="margin-left: 10px;">
                            <input class="form-check-input" type="checkbox" value="" id="cbxAika4" checked>
                            <label class="form-check-label" for="invalidCheck2">
                              10:30 - 11:00
                            </label>
                          </div>
                         </div>
                         <div style="border-style:solid; border-radius: 10px; border-width: 1px; margin-top: 5px;">
                          <div class="form-check" style="margin-left: 10px;">
                            <input class="form-check-input" type="checkbox" value="" id="cbxAika5" checked>
                            <label class="form-check-label" for="invalidCheck2">
                              11:00 - 11:30
                            </label>
                          </div>
                         </div>
                        </div>
                      </form>
                    </div>
                    <div class="container" id="btnTarkista" style="border-color: lightgray; border-radius: 3px; border-style:solid; border-width: 1px; display: none;">
                      Terapeutin ajat
                      <div id="varattuAika">
                        <div class="btn-group">
                          <button type="button" class="btn btn-light dropdown-toggle" data-toggle="dropdown" data-display="static" aria-haspopup="true" aria-expanded="false">
                            <span id="pvm">19.2 </span><span id="klo">klo 10:30</span>
                          </button>
                          <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-left">
                            <div class="container">
                              <article>
                                Maarit Meikäläinen <br>
                                Keskustakatu 2 <br>
                                maarit.meikalainen@mail.com <br>
                                012345
                              </article>
                            </div>
                            
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
            </div>
          </div>
        </div>  
      </div>
    </div>
    </div>
    
    <div class="container" >
      <hr>
    </div>
  
  </main>
  
  <footer class="container">
    <div class="row">
      <div class="col-md-4" style="text-align: center;">
        <img src="Pictures\Black logo - no background.png" style=" height: 60px; width: 200 px; display: inline-block;">
      </div>
      <div class="col-md-4" style="text-align: center">
      </div>
      <div class="col-md-4" style="text-align: center;">
      </div>
      <div class="col-md-12" style="text-align: center; margin-top: 50px; margin-bottom: 20px;">
        <p>&copy; Ryhmä-R 2020</p>
      </div>
    
    </div>
  </footer>
     <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>