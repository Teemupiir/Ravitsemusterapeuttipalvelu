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
 
// määritä parametrit tyhjiksi
$etunimi = $sukunimi = $kaupunki = $email = $esittely = "";
$user_id = $_SESSION['id'];
$tpid = $pvm = $klo = "";
      
        // hakulause
        $sql = "SELECT tp_id,tp_etunimi,tp_sukunimi,tp_paikkakunta,tp_email,tp_esittelyteksti FROM terapeutit WHERE users_fk = $user_id";
        if ($result = mysqli_query($link, $sql)) {

            // talleta haetut tiedot parametreihin
            while ($row = mysqli_fetch_assoc($result)) {
                $tpid = $row['tp_id'];
                $etunimi = $row['tp_etunimi'];
                $sukunimi = $row['tp_sukunimi'];
                $kaupunki = $row['tp_paikkakunta'];
                $email = $row['tp_email'];
                $esittely = $row['tp_esittelyteksti'];
            }
        
            // vapauta result
            mysqli_free_result($result);
        }
        if($_SERVER["REQUEST_METHOD"] == "POST"){
          // TERAPEUTIN KALENTERI tauluun vievä osio
          for ($i = 0; $i < count($_POST['aika']); $i++) {
        
            $sql = "INSERT INTO terapeutin_kalenteri (kalenteri_fk,tp_fk) VALUES ((SELECT kalenteri_id FROM kalenteri WHERE kalenteri_pvm = ? AND kalenteri_kellonaika = ?), ?)";
        
            if($stmt = mysqli_prepare($link, $sql)){
              mysqli_stmt_bind_param($stmt, "sss", $pvm, $klo, $tpid);
              
              // parametrit
              $tp_id = $tpid; 
              $pvm = $_POST['pvm'];
              $klo = $_POST['aika'][$i];
        
              if(mysqli_stmt_execute($stmt)){
                  echo "Vapautetut ajat tallennettu.";
              } else{
                  echo "ERROR: Could not execute query: $sql. " . mysqli_error($link);
              }
          } else{
              echo "ERROR: Could not prepare query: $sql. " . mysqli_error($link);
          }
        }
        }
       
          

?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Profiili</title>

    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="Pictures/datepicker-fi.js"></script>

    <script>
    $(function() {
        $('#datepicker').datepicker($.extend({
                minDate: new Date()
            },
            $.datepicker.regional['fi']
        ));
    });

    $(document).ready(function() {
        var f = document.forms['profiili'];
        for (var i = 0, fLen = f.length; i < fLen; i++) {
            f.elements[i].readOnly = true;
        }

        var readURL = function(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('.profile-pic').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        $(".file-upload").on('change', function() {
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
            for (var i = 0, fLen = f.length; i < fLen; i++) {
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
            for (var i = 0, fLen = f.length; i < fLen; i++) {
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
        if (t.style.display === "block") {
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
        if (v.style.display === "block") {
            v.style.display = "none";
        }
    }
    //poistettu käytöstä
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
        if (v.style.display === "block") {
            v.style.display = "none";
        }
    }

    function check(form) {
        us = form.tbxUusiSalasana.value;
        usu = form.tbxUusiSalasanaUudelleen.value;

        if (us != usu) {
            alert("\nSalasanat eivät täsmää! Kirjoita salasanat uudelleen.")
            return false;
        } else {
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

    <!-- Main jumbotron-->
    <div class="jumbotron">
        <div class="container">
            <div class="row">
                <div class="col-sm-12" style="padding-top: 30px;" id="divProfiili">
                    <div class="row">
                        <div class="col-sm-10">
                            <p style="font-weight: lighter;"> Tervetuloa henkilökohtaiseen asiantuntijaprofiiliisi!
                                <br>Tällä sivulla voit nähdä ja muokata tietoja palveluistasi ja henkilötiedoistasi,
                                jotka
                                välitetään asiakkaille. <br>
                                Muokataksesi profiilia, paina "Muokkaa profiilia" nappia, ja tee tarvittavat muutokset.
                                Tallenna muutokset painamalla "Tallenna".</p>
                        </div>
                        <div class="col-sm-2">
                            <button onclick="edit()" class="btn btn-info" id="btnEdit" type="button" href="#"
                                style="float: right;">
                                Muokkaa profiilia
                            </button>
                            <button onclick="edit()" class="btn btn-success" id="btnSave" type="button"
                                style="float: right; display: none; margin-top: 10px; margin-left: 10px;">Tallenna</button>
                            <button onclick="edit()" class="btn btn-danger" id="btnDiscard" type="button"
                                style="float: right; display: none; margin-top: 10px;">Peruuta</button>
                        </div>
                    </div>
                </div>

                <div class="col-sm-12" id="divProfiiliForm">
                    <form id="profiili" style="background-color: white; margin-top: 20px;">
                        <div class="form-row"
                            style="padding-top: 10px; padding-left: 10px; padding-right: 10px; padding-bottom: 10px;">
                            <div class="col-md-1">
                            </div>
                            <div id="profile-container" class="col-md-4">
                                <?php 
                    $kuva = "SELECT users_fk, imagename FROM uploadedimage WHERE users_fk='$user_id'";
                    $tulos = $link->query($kuva);
                    $kuvat= mysqli_fetch_all($tulos, MYSQLI_ASSOC);

                    mysqli_free_result($tulos);
                    foreach ($kuvat as $kuva){
                    $imgname = ($kuva['imagename']);
                    }
                    $folder='ladatutkuvat/'
                    ?>

                                <br>
                                <img class="profile-pic" src="<?php echo $folder.$imgname?>" width="200" height="200"
                                    style="box-shadow: 1px 1px 3px grey; border-radius: 10px;">
                                <div class="p-image" id="btnChangeImg" style="display: none;">

                                    <p class="fa fa-camera upload-button btn btn-info btn-sm" style="margin-top: 10px;">
                                        Vaihda profiilikuva</p>
                                    <input class="file-upload" type="file" accept="image/*" style="display: none;" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="validationDefault01">Etunimi</label>
                                <input type="text" class="form-control" id="tbxEtunimi" value="<?php echo $etunimi; ?>">
                                <div>
                                    <label for="validationDefault03">Sukunimi</label>
                                    <input type="text" class="form-control" id="tbxSukunimi"
                                        value="<?php echo $sukunimi; ?>">
                                </div>
                                <div>
                                    <label for="validationDefault03">Kaupunki</label>
                                    <input type="text" class="form-control" id="tbxKaupunki"
                                        value="<?php echo $kaupunki; ?>">
                                </div>
                                <div>
                                    <label for="exampleInputEmail1">Sähköpostiosoite</label>
                                    <input type="email" class="form-control" id="tbxSähköpostiosoite"
                                        value="<?php echo $email; ?>">
                                </div>
                            </div>
                        </div>
                        <div class="form-row" style=" padding-left: 10px; padding-right: 10px; padding-bottom: 10px;">
                            <div class="col-md-1">
                            </div>
                            <div class="col-md-10">
                                Profiiliteksti
                                <textarea id="taProfiiliteksti" rows="5"
                                    class="form-control"><?php echo $esittely; ?></textarea>
                            </div>
                        </div>
                      <br>
                      <br>
                      
                </form>
              </div>
        </div>

        <div class="col-sm-12" style="margin-top:50px;" id="ChangePwd">

            <form style="background-color: white;" onsubmit="return check(this)">
                <div class="form-row" style="padding-top: 10px; padding-bottom: 10px; padding-left: 10px;">
                    <div class="col-md-1">
                    </div>
                    <div id="divPwdOtsikko" class="col-sm-10">
                        <p style="font-weight: bold;">Uuden salasanan vaihto</p>
                        <div>
                            <a type="button" href="reset_password.php" class="btn btn-info btn-sm" id="btnChangePwd">
                                Vaihda tilisi salasana
                            </a>
                        </div>
                    </div>
                </div>
                <div class="form-row" id="divSalasananVaihto"
                    style="padding-top: 10px; padding-bottom: 10px; display: none;">

                    <div class="container">
                        <div class="row">
                            <div class="col-md-1">
                            </div>
                            <div class="col-md-10">
                                <div class="form-row" id="formPwd" onSubmit="return check(this)"
                                    style=" padding-right: 10px; padding-bottom: 10px;">

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="tbxUusiSalasana">Uusi salasana</label>
                                            <input type="password" class="form-control" id="tbxUusiSalasana" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="tbxUusiSalasanaUudelleen">Toista uusi salasana</label>
                                            <input type="password" class="form-control" id="tbxUusiSalasanaUudelleen"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <a href="terve_terapeutti.php" class="btn btn-danger"
                                            id="btnCancelPwd">Peruuta</a>

                                        <button class="btn btn-success" type="submit" id="btnChangePwd"
                                            style="float: right;">Vaihda salasana</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
<br>


        <div id="divOtsikko" class="col-sm-10" style="margin-top: 60px;">
            <p style="font-weight: lighter;">Tästä näet tarjoamiesi palveluiden mukaiset päivämäärät ja ajat.<br>
                Valitse kalenterista päivämäärä ja vapauta vapaat aikasi asiakkaiden varattaviksi.<br>"Tarkastele varauksia" -painikkeesta voit tarkastella Larate-palvelussa varattuja aikojasi.</p>
        </div>
        <div id="divKalenteri" class="col-sm-12" style="background-color: white;">
            <form method="post">
                <div class="form-group" style="margin-top: 10px;">
                <br>
                    <label>Anna päivämäärä muodossa vvvv-kk-pp tai valitse kalenterista:</label>
                    
                    <input type="text" style="float: right; width: 30%; border-style: solid; text-align: right;" id="datepicker" name="pvm" value="<?php echo $pvm; ?>">



                </div>
                <div class="form-group">
                    <div style="border-style:solid; border-radius: 10px; border-width: 1px; margin-top: 5px;">
                        <div class="form-check" style="margin-left: 10px;">
                            <input class="form-check-input" type="checkbox" name="aika[]" value="8:00 - 9:00">
                            <label class="form-check-label" for="invalidCheck2">
                                8:00 - 9:00
                            </label>
                        </div>
                    </div>
                    <div style="border-style:solid; border-radius: 10px; border-width: 1px; margin-top: 5px;">
                        <div class="form-check" style="margin-left: 10px;">
                            <input class="form-check-input" type="checkbox" name="aika[]" value="9:00 - 10:00">
                            <label class="form-check-label" for="invalidCheck2">
                                9:00 - 10:00
                            </label>
                        </div>
                    </div>
                    <div style="border-style:solid; border-radius: 10px; border-width: 1px; margin-top: 5px;">
                        <div class="form-check" style="margin-left: 10px;">
                            <input class="form-check-input" type="checkbox" name="aika[]" value="10:00 - 11:00">
                            <label class="form-check-label" for="invalidCheck2">
                                10:00 - 11:00
                            </label>
                        </div>
                    </div>
                    <div style="border-style:solid; border-radius: 10px; border-width: 1px; margin-top: 5px;">
                        <div class="form-check" style="margin-left: 10px;">
                            <input class="form-check-input" type="checkbox" name="aika[]" value="11:00 - 12:00">
                            <label class="form-check-label" for="invalidCheck2">
                                11:00 - 12:00
                            </label>
                        </div>
                    </div>
                    <div style="border-style:solid; border-radius: 10px; border-width: 1px; margin-top: 5px;">
                        <div class="form-check" style="margin-left: 10px;">
                            <input class="form-check-input" type="checkbox" name="aika[]" value="12:00 - 13:00">
                            <label class="form-check-label" for="invalidCheck2">
                                12:00 - 13:00
                            </label>
                        </div>
                    </div>
                    <div style="border-style:solid; border-radius: 10px; border-width: 1px; margin-top: 5px;">
                        <div class="form-check" style="margin-left: 10px;">
                            <input class="form-check-input" type="checkbox" name="aika[]" value="13:00 - 14:00">
                            <label class="form-check-label" for="invalidCheck2">
                                13:00 - 14:00
                            </label>
                        </div>
                    </div>
                    <div style="border-style:solid; border-radius: 10px; border-width: 1px; margin-top: 5px;">
                        <div class="form-check" style="margin-left: 10px;">
                            <input class="form-check-input" type="checkbox" name="aika[]" value="14:00 - 15:00">
                            <label class="form-check-label" for="invalidCheck2">
                                14:00 - 15:00
                            </label>
                        </div>
                    </div>
                    <div style="border-style:solid; border-radius: 10px; border-width: 1px; margin-top: 5px;">
                        <div class="form-check" style="margin-left: 10px;">
                            <input class="form-check-input" type="checkbox" name="aika[]" value="15:00 - 16:00">
                            <label class="form-check-label" for="invalidCheck2">
                                15:00 - 16:00
                            </label>
                        </div>
                    </div>
                </div>


                <div class="">
                    <input type="submit" class="btn btn-info btnKirjaudu" value="Tallenna kalenteriin">
                    <a class="btn btn-info btnKirjaudu" style="float:right;" href="asiakasvaraukset.php" role="button">Tarkastele varattuja aikoja</a> 
                </div>
                <br>
            </form>
        </div>

                  </div>
</main>
<div class="container">
        
    </div>
<?php include('includes/footer.php')?>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
</script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
    integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
</script>
<script src="
https://code.jquery.com/jquery-1.12.4.js
"></script>
<script src="
https://code.jquery.com/ui/1.12.1/jquery-ui.js
"></script>
<script src="C:\Users\jennitk\Documents\woh\31,32\datepicker-fi.js"></script>
<script>
$(document).ready(function() {
  
    $("#datepicker").change(function() {
        var date = $('#datepicker').datepicker({
            format: 'yyyy-mm-dd'
        }).val();
        console.log(date);
        $("#teksti").text("Valittu päivämäärä: " + date);
    });
});
</script>

<script>

$('#datepicker').datepicker({
    minDate: new Date(1995, 12, 1),
    maxDate: new Date(2022, 11, 31),
    dateFormat: 'yy-mm-dd',
    onSelect: function(dateText, inst) {
        var value = $("input[name='inputPvm']").val(dateText)[0].value;
        var res = value.replace(/\//g, "-");
        console.log(res);
    }
});
</script>
<script src="js/datepicker-fi.js"></script>
<?php 
      // sulje tietokantayhteys
      mysqli_close($link);
  ?>
</body>

</html>