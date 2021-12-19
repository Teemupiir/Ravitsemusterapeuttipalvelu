
<?php include('includes/head.php') ?>



<div id="txtHaku">
<h4> Tee juuri sinun tarpeisiisi soveltuva haku ja varaa aika haluamallesi ravitsemusterapeutille</h4>
</div>

<div class="container">
  
<div> Hae terapeuttia nimellä </div> 
  <div class="row tbNameSearch">
    
    <div class="col">
    <form action="/action_page.php" method="get">
    <input list="browsers" name="browser" placeholder="Kuka tahansa">
    <datalist id="browsers">
    <!-- valuet tuodaan tietokannasta JOSKUS (nameID etu+suku) -->
      <option value="Maija Meikäläinen">
      <option value="Jasmin Qvik">
      <option value="Matti Meikäläinen">
  </datalist>
  </form>
    </div>
    
    <div class="col">
    </div>
    <div class="col tbcitySearch">
    <form action="/action_page.php" method="get">
    <input list="browsers" name="browser" placeholder="Mikä tahansa">
    <datalist id="Kaupungit">
    <option value="Helsinki">
      <option value="Kuopio">
      <option value="Iisalmi">
  </datalist>
  </form>
    </div>
  </div>


  <?php include('includes/osaamisalueet.php') ?>
  <button class="btnHaku" id="btnHaku"> Tee haku </button> 


<div id="divAsiantuntijat">
<!-- <section> -->
  <div class="container py-3">
    <div class="card">
      <div class="row ">
        <div class="col-md-4">
            <img src="Pictures/eevipeltola1.jpeg" class="w-100">
          </div>
          <div class="col-md-8 px-3">
            <div class="card-block px-3">
              <h4 class="card-title">Eevi Peltola</h4>
              <p class="card-text">Consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </p>
              <p class="card-text">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
              <a href="#" class="btn btn-primary" id="ajanvarausbtn1" value="1">Varaa aika</a>

   


              <div class="container">
                <div class="row">
                  <div class="col-sm">
                    
              <div id="ajanvarausTxt1">
              <div style="text-align: left;" id="datepicker1">
              </div>
              </div>
                  </div>
                  <div class="col-sm">
                  <form class="frmVaraus" id="frmVaraus">

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
                            <input class="form-check-input" type="checkbox" value="" id="cbxAika1" checked>
                            <label class="form-check-label" for="invalidCheck2">
                              10:30 - 11:30
                            </label>
                          </div>
                  </div>
                  <div style="border-style:solid; border-radius: 10px; border-width: 1px; margin-top: 5px;">
                          <div class="form-check" style="margin-left: 10px;">
                            <input class="form-check-input" type="checkbox" value="" id="cbxAika1" checked>
                            <label class="form-check-label" for="invalidCheck2">
                              12:00 - 13:00
                            </label>
                          </div>
                  </div>
                  <div style="border-style:solid; border-radius: 10px; border-width: 1px; margin-top: 5px;">
                          <div class="form-check" style="margin-left: 10px;">
                            <input class="form-check-input" type="checkbox" value="" id="cbxAika1" checked>
                            <label class="form-check-label" for="invalidCheck2">
                              13:00-14:00
                            </label>
                          </div>
                  </div>
                  <div style="border-style:solid; border-radius: 10px; border-width: 1px; margin-top: 5px;">
                          <div class="form-check" style="margin-left: 10px;">
                            <input class="form-check-input" type="checkbox" value="" id="cbxAika1" checked>
                            <label class="form-check-label" for="invalidCheck2">
                              14:00-15:00
                            </label>
                          </div>
                  </div>
                  
                  <button id="btnTeeVaraus">Tee varaus</button>
                  </form>
                  </div>
                  
                </div>
                
              </div>
              
              
            </div>
          </div> 

        </div>
      </div>
    </div>
  
<!-- </section> -->

<!-- <section> -->
  <div class="container py-3">
    <div class="card">
      <div class="row ">
        <div class="col-md-4">
            <img src="Pictures/jasminqvick1.jpg" class="w-100">
          </div>
          <div class="col-md-8 px-3">
            <div class="card-block px-3">
              <h4 class="card-title">Jasmin Qvick</h4>
              <p class="card-text">Consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </p>
              <p class="card-text">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
              <a href="#" class="btn btn-primary" id="ajanvarausbtn2"value="2">Varaa aika</a>
              <div id="ajanvarausTxt2">
              <div style="text-align: left;" id="datepicker2"></div>
              </div>
              
            
            </div>
          </div>

        </div>
      </div>
    
  </div>
<!-- </section> -->

<!-- <section> -->
  <div class="container py-3">
    <div class="card">
      <div class="row ">
        <div class="col-md-4">
            <img src="Pictures/reettaeerikäinen1.png" class="w-100">
          </div>
          <div class="col-md-8 px-3">
            <div class="card-block px-3">
              <h4 class="card-title">Reetta Eerikäinen</h4>
              <p class="card-text">Consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </p>
              <p class="card-text">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
              <a href="#" class="btn btn-primary" id=ajanvarausbtn3 value="3">Varaa aika</a>
              <div id="ajanvarausTxt3">
              <div style="text-align: left;" id="datepicker3"></div>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>
<!-- </section> -->
</div>





</div>

<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
$("#btnHaku").click(function() {
  $("#divAsiantuntijat").show();
});
document.getElementById("ajanvarausbtn1").onclick = function(e) {
  console.log("jep1");
  e.preventDefault();
  ajanvarausFunction1()
};
document.getElementById("ajanvarausbtn2").onclick = function(e) {
  console.log("jep2");
  e.preventDefault();
  ajanvarausFunction2()
};
document.getElementById("ajanvarausbtn3").onclick = function(e) {
  console.log("jep3");
  e.preventDefault();
  ajanvarausFunction3()
};

//TEKSTIDIVIT
function ajanvarausFunction1(){
  console.log("heo1");
  document.getElementById("ajanvarausTxt1").style.display="block";
  document.getElementById("frmVaraus").style.display="block";
  
}
function ajanvarausFunction2(){
  console.log("heo2");
  document.getElementById("ajanvarausTxt2").style.display="block";
}
function ajanvarausFunction3(){
  console.log("heo3");
  document.getElementById("ajanvarausTxt3").style.display="block";
}
</script>
<script src="Pictures/datepicker-fi.js"></script>

<script>
$( function() {
  $( '#datepicker1, #datepicker2, #datepicker3' ).datepicker($.extend({
    minDate: new Date()
  },
  $.datepicker.regional['fi']
  ));
} );

</script>
