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

$id = $_GET['id']
require_once "config.php";
include('includes/head.php');

// Define variables and initialize with empty values
$tpid = $pvm = $klo = "";

//katsotaan tuleeko id oikein
if(isset($_GET['id'])){
    $id = mysqli_real_escape_string($link, $_GET['id']);
    //$select = "SELECT * FROM terapeutit WHERE users_fk=$id";  testiä varten korvattu alla olevalla!
    $select = "SELECT * FROM terapeutit WHERE tp_id=$id";
    $tulos = mysqli_query($link, $select);
    $tp = mysqli_fetch_assoc($tulos);
    mysqli_free_result($tulos); 
}
    
    // terapeutin vapaiden aikojen hakulause
    $id = $tp['tp_id']; 
    $sql = "SELECT CONCAT(DAY(kalenteri_pvm),'.',MONTH(kalenteri_pvm),'.',YEAR(kalenteri_pvm),' klo ',kalenteri_kellonaika) as aika,tpkalenteri_id FROM kalenteri left join terapeutin_kalenteri on kalenteri_id = kalenteri_fk WHERE tp_fk = $id";
    
    $result = mysqli_query($link, $sql);
    
    $kaikki = mysqli_query($link, $sql);
        
    //näkyviin laitettu testi, jolla varmistetaan haun toimivuus
    echo "<table>";

    while($row = mysqli_fetch_assoc($result)){  
    echo "<tr><td>" . $row['aika'] . "</td><td>" . $row['tpkalenteri_id'] . "</td></tr>";  
    }

    echo "</table>";
    mysqli_free_result($result);

    $etunimi = $sukunimi = $osoite = $email = $puhnro = "";
    $etunimi_err = $sukunimi_err = $osoite_err = $email_err = $puhnro_err = "";

// kun asiakas painaa Vahvista ajanvaraus-painiketta
if(isset($_POST['teeVaraus'])){
  echo "toimii";
   
  if(empty($etunimi_err) && empty($sukunimi_err) && empty($osoite_err) && empty($email_err) && empty($puhnro_err)){
      $kal_fk = $val;
      $etunimi = $_POST["etunimi"];
      $sukunimi = $_POST["sukunimi"];
      $osoite = $_POST["osoite"];
      $email = $_POST["email"];
      $puhnro = $_POST["puhnro"];
      
      $sql = "INSERT INTO asiakasvaraukset (tpkalenteri_fk,as_etunimi,as_sukunimi,as_osoite,as_email,as_puhnro) VALUES (?, ?, ?, ?, ?, ?)";
       
      if($stmt = mysqli_prepare($link, $sql)){
          mysqli_stmt_bind_param($stmt, "ssssss", $param_id, $param_etunimi, $param_sukunimi, $param_osoite, $param_email, $param_puhnro);
          
          // parameterit
          $param_id = $_SESSION['id'];
          $param_etunimi = $etunimi;
          $param_sukunimi = $sukunimi;
          $param_osoite = $osoite;
          $param_email = $email;
          $param_puhnro = $puhnro;
          
          
          if(mysqli_stmt_execute($stmt)){
              echo "Tallennettu. Mahtavaa!" . $val;
          } else{
              echo "Something went wrong. Please try Again later.";
          }

          // Sulje statement
          mysqli_stmt_close($stmt);
      }
  }
}

    // Sulje tietokantayhteys
    mysqli_close($link);

?>

<div class="container">
<h3 style="margin-top:35px">Olet varaamassa aikaa terapeutille <?php echo $tp['tp_etunimi']; echo " " ;echo $tp['tp_sukunimi'] ?>.
 <br>Kalenterista näet vapaana olevat ajat.</h3>
  <div class="row">
    <div class="col-sm">
    <form method="post">
    <div style="text-align: left;" id="datepicker1">
    </div>
    </div>
    <div class="col-sm" style="margin-top:50px">

    <div class="col-sm-6">

<div class="form-group" style="margin-top:90px";>
<?php while($rivi = mysqli_fetch_assoc($kaikki)){ ?>
<div style="border-style:solid; border-radius: 10px; border-width: 1px; margin-top: 5px;">
        <div class="form-check" style="margin-left: 10px;">
            <input class="form-check-input" type="checkbox" name="kal_id[]" value="<?php echo $rivi['tpkalenteri_id'];?>" <?php $val=$rivi['tpkalenteri_id'];?> >
            <label class="form-check-label" for="invalidCheck2">
               <?php echo $rivi['aika']; ?>
            </label>
            <span class="help-block"><?php $kal_fk = IsChecked('kal_id', $val)? $val:''?></span>
        </div>
    </div>
<?php } ?>
                 
</div>
</div>
</div>
</div>



</form>
<div class="col-sm">

</div>
</div>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
<div class="container">
<div>
<p>Täytä henkilötietosi varataksesi ajan:</p>
</div>
<div class="form-group <?php echo (!empty($etunimi_err)) ? 'has-error' : ''; ?>">
          <label>Etunimi</label>
          <input type="text" name="etunimi" class="form-control" value="<?php echo $etunimi; ?>">
          <span class="help-block"><?php echo $etunimi_err; ?></span>
      </div>   
      <div class="form-group <?php echo (!empty($sukunimi_err)) ? 'has-error' : ''; ?>">
            <label>Sukunimi</label>
            <input type="text" name="sukunimi" class="form-control" value="<?php echo $sukunimi; ?>">
            <span class="help-block"><?php echo $sukunimi_err; ?></span>
        </div>   
        <div class="form-group <?php echo (!empty($osoite_err)) ? 'has-error' : ''; ?>">
            <label>Osoite</label>
            <input type="text" name="osoite" class="form-control" value="<?php echo $osoite; ?>">
            <span class="help-block"><?php echo $osoite_err; ?></span>
        </div>   
        <div class="form-group <?php echo (!empty($email_err)) ? 'has-error' : ''; ?>">
            <label>Email</label>
            <input type="text" name="email" class="form-control" value="<?php echo $email; ?>">
            <span class="help-block"><?php echo $email_err; ?></span>
        </div> 
        <div class="form-group <?php echo (!empty($puhnro_err)) ? 'has-error' : ''; ?>">
            <label>Kaupunki</label>
            <input type="text" name="puhnro" class="form-control" value="<?php echo $puhnro; ?>">
            <span class="help-block"><?php echo $puhnro_err; ?></span>
        </div>   
</div>
<button name="teeVaraus" class="btn btn-info btnVaraa"> Vahvista ajanvaraus </button>

</div>
</div>


<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="Pictures/datepicker-fi.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
</script>


<script>
$(function() {
$('#datepicker1').datepicker($.extend({
minDate: new Date()
},
$.datepicker.regional['fi']
));
});
</script>
<script src="
https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

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
