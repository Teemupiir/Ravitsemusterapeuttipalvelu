<?php 

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

    //yhdistetään tietokantaan ja lisätään header
require_once "config.php";
include('includes/head.php');

// määrittele muuttujat
$tpid = $pvm = $klo = "";

//haetaan terapeutin id napista
if(isset($_GET['id'])){
    $tpid = mysqli_real_escape_string($link, $_GET['id']);
    $select = "SELECT * FROM terapeutit WHERE users_fk=$tpid"; 
    $tulos = mysqli_query($link, $select);
    $tp = mysqli_fetch_assoc($tulos);
    mysqli_free_result($tulos); 
}
    // terapeutin vapaiden aikojen hakulause
    $id = $tp['tp_id']; 
    $sql = "SELECT CONCAT(DAY(kalenteri_pvm),'.',MONTH(kalenteri_pvm),'.',YEAR(kalenteri_pvm),' klo ',kalenteri_kellonaika) as aika,tpkalenteri_id FROM kalenteri left join terapeutin_kalenteri on kalenteri_id = kalenteri_fk WHERE tp_fk = $id";
    
    $result = mysqli_query($link, $sql);
    $kaikki = mysqli_query($link, $sql);
    
    //valmistellaan muuttujat
    $etunimi = $sukunimi = $osoite = $email = $puhnro = "";
    $etunimi_err = $sukunimi_err = $osoite_err = $email_err = $puhnro_err = "";

// kun asiakas painaa Vahvista ajanvaraus-painiketta
if(isset($_POST['teeVaraus'])){
   
  // Tarkistetaan input errorit ennen tietojen syöttämistä kantaan
  if(empty($etunimi_err) && empty($sukunimi_err) && empty($osoite_err) && empty($email_err) && empty($puhnro_err)){

    //haetaan syötetyt tiedot muuttujiin 
      $kalid=$_GET['id'];                   
      $etunimi = $_POST["etunimi"];
      $sukunimi = $_POST["sukunimi"];
      $osoite = $_POST["osoite"];
      $email = $_POST["email"];
      $puhnro = $_POST["puhnro"];

      // luodaan insert lause
      $sql = "INSERT INTO asiakasvaraukset (tpkalenteri_fk,as_etunimi,as_sukunimi,as_osoite,as_email,as_puhnro) VALUES (?, ?, ?, ?, ?, ?)";
       
      if($stmt = mysqli_prepare($link, $sql)){
          // sido muuttujat valmisteltuihin parametreihin
          mysqli_stmt_bind_param($stmt, "ssssss", $param_id, $param_etunimi, $param_sukunimi, $param_osoite, $param_email, $param_puhnro);
          
          // Syötetään parametrit        
          $param_id = $kalid;
            $param_etunimi = $etunimi;
          $param_sukunimi = $sukunimi;
          $param_osoite = $osoite;
          $param_email = $email;
          $param_puhnro = $puhnro;
          
          
          // katsotaan meneekö statement läpi
          if(mysqli_stmt_execute($stmt)){
              echo "Tallennettu. Mahtavaa!";
              
          } else{
              echo "Jotain meni vikaan.";
          }

          // Suljetaan statement
          mysqli_stmt_close($stmt);
          ?>

<script type="text/javascript">
//siirrytään "kiitos" -sivulle
window.location.href = 'kiitosvarauksesta.php';
</script>
<?php
      }
  }
}



?>
<body>
<!-- container -->
    <div class="container">
        <br>
        <br>
        <!-- row -->
        <div class="row"  style="height: 300px;">
            <!-- terapeutin tiedot -->
            <div class="col-8">
                <h3 style="margin-top:35px">Olet varaamassa aikaa terapeutille <?php echo $tp['tp_etunimi']; echo " " ;echo $tp['tp_sukunimi'] ?>.
                <br>
                <h5 style="font-weight: lighter; font-style: italic;"><?php echo $tp['tp_esittelyteksti'];?></h5>
                <br>    
                <h3 style="font-weight: lighter;">Sähköpostiosoite: <?php echo $tp['tp_email'];?></h3>
            </div>
            <!-- terapeutin kuva -->    
            <div class="col-3">
                <?php 
                //haetaan kuva tietokannasta 
                $id=$tp['users_fk'];
                $kuva = "SELECT users_fk, imagename FROM uploadedimage WHERE users_fk='$id'";
                $tulos = $link->query($kuva);
                $kuvat= mysqli_fetch_all($tulos, MYSQLI_ASSOC);

                mysqli_free_result($tulos);
                foreach ($kuvat as $kuva){
                $imgname = ($kuva['imagename']);
                }
                $folder='ladatutkuvat/'
                ?>
                <img class="card-img-top" style="width: 300px; height: 300px; background-repeat: no-repeat; " src="<?php echo $folder.$imgname?>">
                <?php 
                // Suljetaan tietokantayhteys
                mysqli_close($link);
                ?>
            </div>      
        </div>
         <!-- row -->    
        <div class="row">
             <!-- margin -->
            <div style="height:30px;margin-top:25px; margin-bottom:25px;"></div>
        </div>

         <!-- form, jossa kalenteri ja vapaat ajat -->    
        <form method="post">
            <!-- row -->
            <div class="row">
                <h3>Seuraavat vapaat ajat.</h3>
            </div>
            <!-- row -->        
            <div class="row">
                 <!-- margin -->
                <div style="height:10px;margin-top:10px; margin-bottom:10px;"></div>
            </div>
            <!-- row -->
            <div class="row">
                <div class="col-2"></div>
                    <!-- kalenteri -->
                    <div class="col-4">
                        <div style="text-align: left;" id="datepicker1"></div>
                    </div>
                <div class="col-1"></div>
                    <!-- ajat -->
                    <div class="form-group">
                        <?php while($rivi = mysqli_fetch_assoc($kaikki)){ ?>
                            <div style="border-style:solid; border-radius: 10px; border-width: 1px; margin-top: 5px;">
                                <div class="form-check" style="margin-left: 10px;">
                                    <input class="form-check-input" type="checkbox" name="kal_id[]" value="<?php echo $rivi['tpkalenteri_id'];?>">
                                    <label class="form-check-label" for="invalidCheck2">
                                        <?php echo $rivi['aika']; ?>
                                    </label>
                                </div>
                            </div>
                        <?php } ?>
                    <div class="col-3"></div>
                </div>
            </div>
        </form>  
   
        <!-- henkilötiedot -->
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div>
                <h3>Täytä henkilötietosi varataksesi ajan:</h3>
            </div>
            <br>
            <!-- etunimi -->
            <div class="form-group <?php echo (!empty($etunimi_err)) ? 'has-error' : ''; ?>">
              <label>Etunimi</label>
              <input type="text" name="etunimi" class="form-control" value="<?php echo $etunimi; ?>">
              <span class="help-block"><?php echo $etunimi_err; ?></span>
            </div>   
            <!-- sukunimi -->
            <div class="form-group <?php echo (!empty($sukunimi_err)) ? 'has-error' : ''; ?>">
                <label>Sukunimi</label>
                <input type="text" name="sukunimi" class="form-control" value="<?php echo $sukunimi; ?>">
                <span class="help-block"><?php echo $sukunimi_err; ?></span>
            </div>   
            <!--osoite-->
            <div class="form-group <?php echo (!empty($osoite_err)) ? 'has-error' : ''; ?>">
                <label>Osoite</label>
                <input type="text" name="osoite" class="form-control" value="<?php echo $osoite; ?>">
                <span class="help-block"><?php echo $osoite_err; ?></span>
            </div>   
            <!-- sposti -->
            <div class="form-group <?php echo (!empty($email_err)) ? 'has-error' : ''; ?>">
                <label>Email</label>
                <input type="text" name="email" class="form-control" value="<?php echo $email; ?>">
                <span class="help-block"><?php echo $email_err; ?></span>
            </div> 
            <!-- puhelinnumero -->
            <div class="form-group <?php echo (!empty($puhnro_err)) ? 'has-error' : ''; ?>">
                <label>Puhelinnumero</label>
                <input type="text" name="puhnro" class="form-control" value="<?php echo $puhnro; ?>">
                <span class="help-block"><?php echo $puhnro_err; ?></span>
            </div>   
            <!-- ajanvarauspainike-->
            <button name="teeVaraus" class="btn btn-info btnVaraa"> Vahvista ajanvaraus </button>
            <!-- margin -->
            <div class="row" style="height:50px;margin-top:25px; margin-bottom:50px;"></div>
        </form>    
    <!-- container -->    
    </div>


<!-- lisätään scriptit -->
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="Pictures/datepicker-fi.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="js/datepicker-fi.js"></script>

<script>
$(function() {
$('#datepicker1').datepicker($.extend({
minDate: new Date()
},
$.datepicker.regional['fi']
));
});
</script>

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
var value = $("input[name='pvm']").val(dateText)[0].value;
var res = value.replace(/\//g, "-");
console.log(res);
}
});
</script>
<?php

include('includes/footer.php');
    
?>
</body>