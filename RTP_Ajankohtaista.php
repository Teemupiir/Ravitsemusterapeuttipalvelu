<!doctype html>
<html lang="en">

  <head>
    <title>Ajankohaista</title>  
  </head>

  <?php include('includes/head.php') ?>    
  
  <div class="jumbotron">
  <div class="container"> 
  
      <div>
        <h1 class="fontti"> Ajankohtaiset uutiset ja tapahtumat!</h1>
      </div>
    <br>
    <br>
    
     <div class="row">
        <div class="col-md-6">
          <div id="accordion">
            <div class="card">
              <div class="card-header">
                <h5 class="fontti">            
                  Uutiset  
                </h5>                             
              </div>
              <div class="card-body">            
                  <p class="card-text"><i> <?php echo date("d.m.Y"); ?></i><a class="nav-link active" onclick="javascript:ShowHide('ar1')" href="#ar1" style="color: #5bc0de;">Uusia terapeutteja taloon! <span class="badge badge-secondary">Tänään</span></a></p>     
                  
                  <p class="card-text"> <i> 18.3.2020</i><a class="nav-link active" onclick="javascript:ShowHide('ar2')" href="#ar2" style="color: #5bc0de;">Koronaviruksen vuoksi tarjoamme yhä enemmän palveluita verkossa</a></p>
                  <p class="card-text"> <i> 24.3.2020</i><a class="nav-link active" onclick="javascript:ShowHide('ar3')" href="#ar3" style="color: #5bc0de;">Sivustomme sai uuden ilmeen!</a></p>
              </div>
          
              <div class="card-footer text-muted">
                <p> Päivitetty <?php echo date('j', strtotime('-21 days')); ?> päivää sitten</p>
              </div>  
            </div><!--card-->
            <br>
            <div class="card">
              <div class="card-header">
                <h5 class="fontti">            
                  Tapahtumat  
                </h5>                         
              </div>
              <div class="card-body">            
                    <p class="card-text"><i> 3.5.2020</i><a class="nav-link active" onclick="javascript:ShowHide('ar4')" href="#ar4" style="color: #5bc0de;">Terapeuttimme järjestävät ilmaisen ravitsemusluennon! <span class="badge badge-secondary">Tulossa</span></a></p>     
                    
                    <p class="card-text"> <i> 28.6.2020</i><a class="nav-link active" onclick="javascript:ShowHide('ar5')" href="#ar5" style="color: #5bc0de;">Kesäpäivät Laratella!</a></p>
              </div>            
              <div class="card-footer text-muted">
                <p>Päivitetty <?php echo date('d', strtotime('-6 days')); ?> päivää sitten</p>
              </div> 
            </div><!--card-->
          </div><!--accordion-->
        </div><!--col md 6-->

        <div class="col-md-6">        
          <div class="artikkelit">
            <article id="ar1" style="display: none">
              <div class="card">
                <div class="card-body">
                  <h2>Uusia terapeutteja taloon!</h2>
                  <p>Saimme hiljattain uusia terapeutteja taloomme! <br>
                  Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas non augue ut erat faucibus elementum et ut augue. Integer et felis et augue laoreet venenatis sed vitae ante. 
                  Donec eu ex ac eros convallis iaculis nec a libero. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nulla volutpat tincidunt arcu id luctus. Mauris dictum pharetra lacus, eget aliquet ligula euismod eget. Donec mattis libero quis elit malesuada ornare. In congue dui egestas sapien pulvinar fermentum. Quisque malesuada purus placerat molestie mattis. Vestibulum nec orci egestas, posuere nibh ut, sollicitudin magna. Aliquam erat volutpat. Donec justo neque, viverra quis consectetur vel, pulvinar ut dolor.</p>
                </div>
              </div>
            </article>
            <article id="ar2" style="display: none">
              <div class="card">
                <div class="card-body">
                    <h2>Tarjoamme enemmän palveluita verkossa!</h2>
                    <p>Koronaviruksen vuoksi olemme siirtäneet palveluitamme verkkoon, josta asiakkaamme voivat edelleen saada apua ravitsemus ongelmiinsa verkon välityksellä. <br> 
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas non augue ut erat faucibus elementum et ut augue. Integer et felis et augue laoreet venenatis sed vitae ante. Donec eu ex ac eros convallis iaculis nec a libero. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nulla volutpat tincidunt arcu id luctus. Mauris dictum pharetra lacus, eget aliquet ligula euismod eget. Donec mattis libero quis elit malesuada ornare. In congue dui egestas sapien pulvinar fermentum. Quisque malesuada purus placerat molestie mattis. Vestibulum nec orci egestas, posuere nibh ut, sollicitudin magna. Aliquam erat volutpat. Donec justo neque, viverra quis consectetur vel, pulvinar ut dolor.</p>
                    </p>
                </div>
              </div>
            </article>
              <article id="ar3" style="display: none">
                <div class="card">
                  <div class="card-body">
                    <h2>Sivuston uusi ilme!</h2>
                      <p>Päivitimme sivustomme nykyaisempaan, käy tutustumassa! <br> 
                      Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas non augue ut erat faucibus elementum et ut augue. Integer et felis et augue laoreet venenatis sed vitae ante. Donec eu ex ac eros convallis iaculis nec a libero. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nulla volutpat tincidunt arcu id luctus. Mauris dictum pharetra lacus, eget aliquet ligula euismod eget. Donec mattis libero quis elit malesuada ornare. In congue dui egestas sapien pulvinar fermentum. Quisque malesuada purus placerat molestie mattis. Vestibulum nec orci egestas, posuere nibh ut, sollicitudin magna. Aliquam erat volutpat. Donec justo neque, viverra quis consectetur vel, pulvinar ut dolor.</p>
                      </p>
                  </div>
                </div>
              </article>
              <article id="ar4" style="display: none">
              <div class="card">
                <div class="card-body">
                    <h2>Ilmainen ravitsemusluento!</h2>
                    <p>Järjestämme 3.5.2020 Ravitsemusluennon, jossa kerromme ravitsemuksen pääpiirteistä ja muutamasta yksittäisestä palvelusta, mitä tarjoamme. <br>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas non augue ut erat faucibus elementum et ut augue. Integer et felis et augue laoreet venenatis sed vitae ante. Donec eu ex ac eros convallis iaculis nec a libero. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nulla volutpat tincidunt arcu id luctus. Mauris dictum pharetra lacus, eget aliquet ligula euismod eget. Donec mattis libero quis elit malesuada ornare. In congue dui egestas sapien pulvinar fermentum. Quisque malesuada purus placerat molestie mattis. Vestibulum nec orci egestas, posuere nibh ut, sollicitudin magna. Aliquam erat volutpat. Donec justo neque, viverra quis consectetur vel, pulvinar ut dolor.</p>
                </div>
              </div>
            </article>
            <article id="ar5" style="display: none">
              <div class="card">
                <div class="card-body">
                    <h2>Kesäpäivät Laratella!</h2>
                    <p>Pidämme kesän maukkaimman luennon Laratella 28.6.2020! Kokkaamme terveellisiä ja maukkaita kesäherkkuja erilaisten ravintotyyppien mukaisesti! <br> 
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas non augue ut erat faucibus elementum et ut augue. Integer et felis et augue laoreet venenatis sed vitae ante. Donec eu ex ac eros convallis iaculis nec a libero. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nulla volutpat tincidunt arcu id luctus. Mauris dictum pharetra lacus, eget aliquet ligula euismod eget. Donec mattis libero quis elit malesuada ornare. In congue dui egestas sapien pulvinar fermentum. Quisque malesuada purus placerat molestie mattis. Vestibulum nec orci egestas, posuere nibh ut, sollicitudin magna. Aliquam erat volutpat. Donec justo neque, viverra quis consectetur vel, pulvinar ut dolor.</p>
                    </p>
                </div>
              </div>
            </article>
          </div><!--artikkelit-->          
        </div><!--colmd6-->
    </div><!--row-->
   </div><!--container-->
     
     <br>
     <br>
   
    </div><!--container-->  
  </div><!--jumbotron-->
  

  <?php include('includes/footer.php')?>

  <script>      
      function ShowHide(divId)
      {
        if(document.getElementById(divId).style.display == 'none')
        {
        $("article").hide();
        document.getElementById(divId).style.display='block';
        }
        else
        {
        document.getElementById(divId).style.display = 'none';
        }
      }      
    </script> 

  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</html>
