<?php include('includes/head.php') ?>

<script>
  $('.collapse').on('hidden.bs.collapse', function (){
    $('.collapse').eq(0).collapse('show');
  })

  function check2(form){
    registerPwd1 = form.registerPwd1.value;
    registerPwd2 = form.registerPwd2.value;

    if (registerPwd1 != registerPwd2){
      alert ("\nSalasanat eivät täsmää! Kirjoita salasanat uudelleen.")
      return false;
    }
    else{
      return true;
    }
  }
</script>

<main role="main">

    <!-- Main jumbotron-->
    <div class="jumbotron" style="padding-bottom: 80px;">
        <div class="container">
            <div class="row">
                <div class="col" style="padding-top: 30px;">
                    <a class="btn btn-info" type="button" href="index.php">
                        Palaa etusivulle
                    </a>
                  </div>

                  <div class="col-sm-12">
          
        <div class="accordion" id="accordionExample" style="padding-top: 20px;">
            <div class="card">
              <div class="card-header" id="headingOne">
                <h2 class="mb-0">
                  <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne" >
                    Kirjaudu sisään
                  </button>
                </h2>
              </div>
          
              <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                <div class="card-body">
                    <form>
                        <div class="form-group">
                          <label for="exampleInputEmail1">Sähköpostiosoite</label>
                          <input type="email" class="form-control" id="tbxKirjautumisSähköposti" aria-describedby="emailHelp" required>
                          
                        </div>
                        <div class="form-group">
                          <label for="exampleInputPassword1">Salasana</label>
                          <input type="password" class="form-control" id="tbxKirjautumisSalasana" required>
                        </div>
                        <div class="form-group form-check">
                          
                        </div>
                        <a type="submit" class="btn btn-info" type="button" id="btnKirjauduSisään" href="RTP_ProfiilinMuokkaus.php">Kirjaudu</a>
                      </form>
                </div>
              </div>
            </div>
            <div class="card">
              <div class="card-header" id="headingTwo">
                <h2 class="mb-0">
                  <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                    Eikö sinulla ole tiliä? Luo uusi tili
                  </button>
                </h2>
              </div>
              <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                <div class="card-body">
                  <form onsubmit="return check2(this)">
                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                          <label for="validationDefault01">Etunimi</label>
                          <input type="text" class="form-control" id="tbxEtunimi" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="validationDefault02">Sukunimi</label>
                            <input type="text" class="form-control" id="tbxSukunimi" required>
                          </div>
                      </div>
                      <div class="form-row">
                          <div class="col-md-12 mb-3">
                            <label for="validationDefault03">Kaupunki</label>
                            <input type="text" class="form-control" id="tbxKaupunki" required>
                          </div>
                      </div>
                      <div class="form-row">
                          <div class="col-md-12 mb-3">
                        <label for="exampleInputEmail1">Sähköpostiosoite</label>
                        <input type="email" class="form-control" id="tbxSähköposti" required>
                          </div>
                      </div>
                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                        <label for="exampleInputPassword1">Salasana</label>
                        <input type="password" class="form-control" id="registerPwd1" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="exampleInputPassword1">Toista salasana</label>
                            <input type="password" class="form-control" id="registerPwd2" required>
                            </div>
                    </div>
                      <div class="form-group">
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" value="" id="cbxKäyttäjäehdot" required>
                          <label class="form-check-label" for="invalidCheck2">
                            Hyväksyn <a href="RTP_Kayttajaehdot.php">käyttäjäehdot</a>
                          </label>
                        </div>
                      </div>
                      <button class="btn btn-info" type="submit" id="btnLuoTili">Luo tili</button>
                  </form>
                </div>
              </div>
            </div>
        </div>
        </div>
    
        <div class="col">
          </div>
        </div>
        </div>
    </div>
  
    <div class="container">
      <hr>
    </div> <!-- /container -->
  </main>

  <footer class="container">
    <p>&copy; Ryhmä-R 2020</p>
  </footer>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>