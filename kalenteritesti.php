

<?php include('includes/head.php');?>


 <p id="teksti">P&aumliv&aumlm&auml&aumlr&auml ei valittu</p>
    
<input type="text" id="datepicker" name="inputPvm">
<script src="
https://code.jquery.com/jquery-1.12.4.js
"></script>
    <script src="
https://code.jquery.com/ui/1.12.1/jquery-ui.js
"></script>
<script src="C:\Users\jennitk\Documents\woh\31,32\datepicker-fi.js"></script>
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
      var value = $("input[name='inputPvm']").val(dateText)[0].value;
      var res = value.replace(/\//g, "-");
    console.log(res);
    }
});
</script>

</body>
</html>

