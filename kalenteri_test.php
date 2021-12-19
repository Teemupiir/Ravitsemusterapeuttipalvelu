<?php

require_once "config.php";
include('includes/head.php');


// määritellään muuttujat
$tpid = $pvm = $klo = "";



if($_SERVER["REQUEST_METHOD"] == "POST"){
  // TERAPEUTIN KALENTERI tauluun vievä osio
  for ($i = 0; $i < count($_POST['aika']); $i++) {

    $sql = "INSERT INTO terapeutin_kalenteri (kalenteri_fk,tp_fk) VALUES ((SELECT kalenteri_id FROM kalenteri WHERE kalenteri_pvm = ? AND kalenteri_kellonaika = ?), ?)";

    if($stmt = mysqli_prepare($link, $sql)){
      mysqli_stmt_bind_param($stmt, "sss", $pvm, $klo, $tpid);
      
      //  parameterit
      $tpid = $_POST['tpid'];
      $pvm = $_POST['pvm'];
      $klo = $_POST['aika'][$i];

      if(mysqli_stmt_execute($stmt)){
          echo "Records inserted successfully.";
      } else{
          echo "ERROR: Could not execute query: $sql. " . mysqli_error($link);
      }
  } else{
      echo "ERROR: Could not prepare query: $sql. " . mysqli_error($link);
  }
}
}
  // Sulje yhteys
  mysqli_close($link);
?>
<h3 style="margin-top:35px">Olet varaamassa aikaa terapeutille Vaihda Id. Valitse kalenterista sopiva päivä ja kellonaika.</h3>
<form method="post">
  <div class="form-group">
      <label>Anna terapeutin id</label>
      <input type="text" name="tpid" class="form-control" value="<?php echo $tpid; ?>">
  </div>  
  <div class="form-group">
    <label>Anna päivämäärä muotoa vvv-kk-pp</label>
    <input type="text" id="datepicker" name="pvm" value="<?php echo $pvm; ?>">       
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
    </div><div style="border-style:solid; border-radius: 10px; border-width: 1px; margin-top: 5px;">
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
    </div><div style="border-style:solid; border-radius: 10px; border-width: 1px; margin-top: 5px;">
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

  </div>
    <div class="col-md-4">
        <input type="submit" class="btn btn-info btnKirjaudu" value="Paina tästä">
    </div>
  </div>
</form>


<p id="teksti">P&aumliv&aumlm&auml&aumlr&auml ei valittu</p>
    
  <input type="text" id="datepicker" name="pvm" value="<?php echo $tpid; ?>">
  <script src="
  https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<script>
$(document).ready(function () {
  $("#datepicker").change(function() {
      var date = $('#datepicker').datepicker({ format: 'yyyy-mm-dd' }).val();
      console.log(date);
      $("#teksti").text("Valittu päivämäärä: " + date);
  });
});
</script>

<script>
$('#datepicker').datepicker({
  minDate: new Date(1995, 12 , 1), 
      maxDate: new Date(2022, 11, 31),
      dateFormat: 'yy-mm-dd',
  onSelect: function(dateText, inst) {
    var value = $("input[name='pvm']").val(dateText)[0].value;
    var res = value.replace(/\//g, "-");
  console.log(res);
  }
});
</script>

</body>
</html>