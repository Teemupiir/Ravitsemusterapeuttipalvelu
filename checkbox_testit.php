<?php
// yhteys tietokantaan
require_once "config.php";
session_start();

//funktio checkboxien valinnan tarkistamiseen
function IsChecked($chkname,$value)
    {
        if(!empty($_POST[$chkname]))
        {
            foreach($_POST[$chkname] as $chkval)
            {
                if($chkval == $value)
                {
                    return true;
                }
            }
        }
        return false;
    }

    $userid=$_SESSION['id'];
    $tpid="SELECT users_fk, tp_id FROM terapeutit WHERE users_fk='$userid'";
    $tulos = $link->query($tpid);
    $tp= mysqli_fetch_all($tulos, MYSQLI_ASSOC);
    
    mysqli_free_result($tulos);

    foreach ($tp as $terapeutti){
        $kayttajaid=$terapeutti['tp_id'];
    }

// kun nappia painetaan, lähtee tiedon vienti kantaan
if($_SERVER["REQUEST_METHOD"] == "POST"){


// Insert into lauseen alustus
    $sql = "INSERT INTO terapeutin_osaamiset (tp_fk, elintapa, kasvis, keliakia, laillistettu, painonhallinta, suolisto_vatsa, sydan_verisuoni, diabetes_tyyppi2) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
    
    if($stmt = mysqli_prepare($link, $sql)){
        // muuttujien sitominen alustettuun sql-lauseeseen
        mysqli_stmt_bind_param($stmt, "sssssssss", $tpid, $elintapa, $kasvis, $keliakia, $laill, $paino, $suoli, $sydan, $diab2);
        
        // parametrien arvottaminen

        $tpid =$kayttajaid;
        $elintapa = '1';
        $kasvis = '1';
        $keliakia = '1';
        $laill = '1';
        $paino = '1';
        $suoli = '1';
        $sydan = '1';
        $diab2 = '1';
        
        // ajetaan sql-kysely
        if(mysqli_stmt_execute($stmt)){
           // echo "Tiedot lisätty onnistuneesti.";
        } else{
           // echo "Virhe! Kysely ei onnistunut $sql. " . mysqli_error($link);
        }
    } else{
       // echo "Virhe! Kyselyn valmistelu ei onnistunut: $sql. " . mysqli_error($link);
    }
// sulje kysely
mysqli_stmt_close($stmt);
}

if($_SERVER["REQUEST_METHOD"] == "POST"){
    // TERAPEUTIN HYVINVOINTI tauluun vievä osio
    $sql = "INSERT INTO terapeutin_hyvinvointi (tp_fk, vanhus, urheilu, vegaani, kirurgiset, lapset, ryhmat, nutrigen, tyoterveys, ruokapalvelut, elintarvikkeet) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
 
    if($stmt = mysqli_prepare($link, $sql)){
        // muuttujien sitominen alustettuun sql-lauseeseen
        mysqli_stmt_bind_param($stmt, "sssssssssss", $tpid, $vanhus, $urheilu, $vegaani, $kirurg, $lapset, $ryhmat, $nutri, $tyot, $ruoka, $elint);
        
        // parametrien arvottaminen
       
        $tpid =$kayttajaid;
        $vanhus = IsChecked('tpHyvinvointi', 'A') ? '1' : '0';
        $urheilu = IsChecked('tpHyvinvointi', 'B') ? '1' : '0';
        $vegaani = IsChecked('tpHyvinvointi', 'C') ? '1' : '0';
        $kirurg = IsChecked('tpHyvinvointi', 'D') ? '1' : '0';
        $lapset = IsChecked('tpHyvinvointi', 'E') ? '1' : '0';
        $ryhmat = IsChecked('tpHyvinvointi', 'F') ? '1' : '0';
        $nutri = IsChecked('tpHyvinvointi', 'G') ? '1' : '0';
        $tyot = IsChecked('tpHyvinvointi', 'H') ? '1' : '0';
        $ruoka = IsChecked('tpHyvinvointi', 'I') ? '1' : '0';
        $elint = IsChecked('tpHyvinvointi', 'J') ? '1' : '0';

        // ajetaan sql-kysely
        if(mysqli_stmt_execute($stmt)){
          //  echo "Tiedot lisätty onnistuneesti.";
        } else{
          //  echo "Virhe! Kysely ei onnistunut $sql. " . mysqli_error($link);
        }
    } else{
       // echo "Virhe! Kyselyn valmistelu ei onnistunut: $sql. " . mysqli_error($link);
    }
 
// sulje kysely
mysqli_stmt_close($stmt);
}

if($_SERVER["REQUEST_METHOD"] == "POST"){
    // TERAPEUTIN SAIRAUDET tauluun vievä osio
    $sql = "INSERT INTO terapeutin_sairaudet (tp_fk, bulimia, diabetes_tyyppi1, allergia, fodmap, keuhko, lihavuus, munuais, neuro, psykiatriset, reuma, ruoansulatus, syopa, artynyt_suoli) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
 
    if($stmt = mysqli_prepare($link, $sql)){
        // muuttujien sitominen alustettuun sql-lauseeseen
        mysqli_stmt_bind_param($stmt, "ssssssssssssss", $tpid, $bulimia, $diabe1, $allergia, $fodmap, $keuhko, $lihavuus, $munuais, $neuro, $psyk, $reuma, $ruoansul, $syopa, $artysuoli);
        
        // parametrien arvottaminen
        $tpid =$kayttajaid;
        $bulimia = IsChecked('tpSairaudet', 'A') ? '1' : '0';
        $diabe1 = IsChecked('tpSairaudet', 'B') ? '1' : '0';
        $allergia = IsChecked('tpSairaudet', 'C') ? '1' : '0';
        $fodmap = IsChecked('tpSairaudet', 'D') ? '1' : '0';
        $keuhko = IsChecked('tpSairaudet', 'E') ? '1' : '0';
        $lihavuus = IsChecked('tpSairaudet', 'F') ? '1' : '0';
        $munuais = IsChecked('tpSairaudet', 'G') ? '1' : '0';
        $neuro = IsChecked('tpSairaudet', 'H') ? '1' : '0';
        $psyk = IsChecked('tpSairaudet', 'I') ? '1' : '0';
        $reuma = IsChecked('tpSairaudet', 'J') ? '1' : '0';
        $ruoansul = IsChecked('tpSairaudet', 'K') ? '1' : '0';
        $syopa = IsChecked('tpSairaudet', 'L') ? '1' : '0';
        $artysuoli = IsChecked('tpSairaudet', 'M') ? '1' : '0';

        // ajetaan sql-kysely
        if(mysqli_stmt_execute($stmt)){
         //   echo "Tiedot lisätty onnistuneesti.";
        } else{
          //  echo "Virhe! Kysely ei onnistunut $sql. " . mysqli_error($link);
        }
    } else{
     //   echo "Virhe! Kyselyn valmistelu ei onnistunut: $sql. " . mysqli_error($link);
    }
 
// sulje kysely
mysqli_stmt_close($stmt);
}
// sulje tietokanta-yhteys
mysqli_close($link);


?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Add Record Form</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" type="text/css" href="css/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    


</head>
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
      <!-- <a class="btn btn-light float-right" href="index.php" type="button" aria-haspopup="true" aria-expanded="false">
      Kirjaudu ulos</a> -->
</nav>
<div class="container">
<br>
<br>
<h5 style="text-align: center;" >Tällä sivulla voit tarkentaa osaamistasi.</h5>
<h5 style="text-align: center;">Valitse ne osa-alueet, joiden potilaita kykenet hoitamaan.</h5>
<h5 style="text-align: center;">Asiakkaat voivat etsiä terapeutteja osaamisen perusteella, joten</h5>
<h5 style="text-align: center;">kannattaa valita kaikki osa-alueet, jotka taidat.</h5>
<br> 
<div class="container" style="background-color: white;">
<br>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">


     <div class="row">
<div class="col-md-4">
        <hr>
        <p style="font-weight: bold;"> Koulutukseen kuuluvat osa-alueet</p>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" name="tpOsaamiset[]" value="A" checked required disabled>
            <label class="form-check-label" for="invalidCheck2">
            Arkiruokailu ja elintapaohjaus 
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" name="tpOsaamiset[]" value="B" checked required disabled>
            <label class="form-check-label" for="invalidCheck2">
            Kasvisruokailijan ravitsemus
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input"type="checkbox" name="tpOsaamiset[]" value="C" checked required  disabled>
            <label class="form-check-label" for="invalidCheck2">
            Keliakia ja allergiat
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" name="tpOsaamiset[]" value="D" checked required disabled>
            <label class="form-check-label" for="invalidCheck2">
            Laillistetun ravitsemusterapeutin pätevyys
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input"  type="checkbox" name="tpOsaamiset[]" value="E" checked required disabled>
            <label class="form-check-label" for="invalidCheck2">
            Painonhallinta ja syömiskäyttäytyminen
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input"type="checkbox" name="tpOsaamiset[]" value="F" checked required disabled>
            <label class="form-check-label" for="invalidCheck2">
            Suolisto- ja vatsaongelmat
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input"type="checkbox" name="tpOsaamiset[]" value="G" checked required disabled>
            <label class="form-check-label" for="invalidCheck2">
            Sydän- ja verisuonitautien ravitsemushoito
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input"type="checkbox" name="tpOsaamiset[]" value="H" checked required disabled>
            <label class="form-check-label" for="invalidCheck2">
            Tyypin 2 diabeteksen ravitsemushoito
            </label>
        </div>
        </div>

        <div class="col-md-4">
        <hr>
        <p style="font-weight: bold;"> Hyvinvointi</p>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" name="tpHyvinvointi[]" value="A">
            <label class="form-check-label" for="invalidCheck2">
            Ikääntyneiden ruokavalio
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" name="tpHyvinvointi[]" value="B">
            <label class="form-check-label" for="invalidCheck2">
            Urheiluravitsemus
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" name="tpHyvinvointi[]" value="C">
            <label class="form-check-label" for="invalidCheck2">
            Vegaaniravitsemus
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" name="tpHyvinvointi[]" value="D">
            <label class="form-check-label" for="invalidCheck2">
            Kirurgisten potilaiden ravitsemus
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" name="tpHyvinvointi[]" value="E">
            <label class="form-check-label" for="invalidCheck2">
            Lasten ja nuorten ravitsemus
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" name="tpHyvinvointi[]" value="F">
            <label class="form-check-label" for="invalidCheck2">
            Ryhmäohjaus
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" name="tpHyvinvointi[]" value="G">
            <label class="form-check-label" for="invalidCheck2">
            Nutrigenomiikka
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" name="tpHyvinvointi[]" value="H">
            <label class="form-check-label" for="invalidCheck2">
            Työterveyshuollon pätevyys
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" name="tpHyvinvointi[]" value="I">
            <label class="form-check-label" for="invalidCheck2">
            Ruokapalvelut
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" name="tpHyvinvointi[]" value="J">
            <label class="form-check-label" for="invalidCheck2">
            Terveysvaikutteiset elintarvikkeet
            </label>
        </div>
        </div>
        <div class="col-md-4">
        <hr>
        <p style="font-weight: bold;"> Sairaudet</p>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" name="tpSairaudet[]" value="A">
            <label class="form-check-label" for="invalidCheck2">
            Syömishäiriöt & tunnesyöminen
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" name="tpSairaudet[]" value="B">
            <label class="form-check-label" for="invalidCheck2">
            Tyypin 1 diabeteksen ravitsemushoito
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" name="tpSairaudet[]" value="C">
            <label class="form-check-label" for="invalidCheck2">
            Allergiat
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" name="tpSairaudet[]" value="D">
            <label class="form-check-label" for="invalidCheck2">
            FODMAP-ruokavalio
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" name="tpSairaudet[]" value="E">
            <label class="form-check-label" for="invalidCheck2">
            Keuhkosairauksien ravitsemushoito
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" name="tpSairaudet[]" value="F">
            <label class="form-check-label" for="invalidCheck2">
            Lihavuusleikkaukset
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" name="tpSairaudet[]" value="G">
            <label class="form-check-label" for="invalidCheck2">
            Munuaissairauksien ravitsemushoito
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" name="tpSairaudet[]" value="H">
            <label class="form-check-label" for="invalidCheck2">
            Neurologisten sairauksien hoito
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" name="tpSairaudet[]" value="I">
            <label class="form-check-label" for="invalidCheck2">
            Psykiatristen potilaiden ravitsemus
            </label>
        </div>
        
        <div class="form-check">
            <input class="form-check-input" type="checkbox" name="tpSairaudet[]" value="J">
            <label class="form-check-label" for="invalidCheck2">
            Reumasairaudet ja ravitsemus
            </label>
        </div>
        <div class="form-check">
        <input class="form-check-input" type="checkbox" name="tpSairaudet[]" value="K">
        <label class="form-check-label" for="invalidCheck2">
        Ruoansulatuskanavan sairauksien ravitsemushoito
        </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" name="tpSairaudet[]" value="L">
            <label class="form-check-label" for="invalidCheck2">
            Syöpä ja ravitsemus
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" name="tpSairaudet[]" value="M">
            <label class="form-check-label" for="invalidCheck2">
            Ärtyneen suolen oireyhtymän ravitsemushoito
            </label>
        </div>
        <br>
<br> 

<div class="row">
<div class="col-sm-7"></div>
<div class="col-md-2">
        <input type="submit" class="btn btn-info" value="Tallenna">
        <br><br>
</div>
</div>
<br>

    </div>
    </div>
    </div>

</div>

</div>
<br>
<br>

<br>
<br>
<div class="container">
<div class="row">
<div class="col-sm-1"></div>
<div class="col-sm-2">
<a class="btn btn-danger btn-lg"  style=" min-width: 110px; max-width:100%"
        href="lisaakuva.php" role="button">Palaa</a> </div>
        <div class="col-sm-6"></div>
        <div class="col-sm-2">
        <a class="btn btn-success btn-lg"  style=" min-width: 110px; max-width:100%"
        href="profiilivalmis.php" role="button">Jatka</a></div>
        </div>
        </div>
        </div>
<br>
<br>
</div>    
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
</body>
</html>