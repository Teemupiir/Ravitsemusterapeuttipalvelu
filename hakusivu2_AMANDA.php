<?php 
include('includes/head.php');
include('haku/database_connection.php');
?>


<div id="txtHaku">
<h4> Tee juuri sinun tarpeisiisi soveltuva haku ja varaa aika haluamallesi ravitsemusterapeutille</h4>
</div>
    
    <div class="container">
        <div class="row">
        <div> </div>
        
            <div class="col-md-3">                				
			
                <div class="list-group">
					<h6>Sijainti </h6>
                    <div style="height: 250px; overflow-y: auto; overflow-x: hidden;">
					<?php

                    $query = "SELECT DISTINCT paikkakunta FROM kolmivelho  GROUP BY paikkakunta, tp_fk ORDER BY paikkakunta";
                    $statement = $connect->prepare($query);
                    $statement->execute();
                    $result = $statement->fetchAll();
                    foreach($result as $row)
                    {
                    ?>
                    <div class="list-group-item checkbox">
                        <label><input type="checkbox" class="common_selector brand" value="<?php echo $row['paikkakunta']; ?>"  > <?php echo $row['paikkakunta']; ?></label>
                    </div>
                    <?php
                    }

                    ?>
                    </div>
                </div>

            </div>

            <div class="col-md-3">
                <div class="list-group">
                <h6>Perusosaamisalueet</h6>
                <div style="height: 250px; overflow-y: auto; overflow-x: hidden;">
                    
                    <div class="list-group-item checkbox">
                        <label><input type="checkbox"  value="" checked> Arkiruokailu ja elintapaohjaus</label>
                    </div>
                    <div class="list-group-item checkbox">
                        <label><input type="checkbox"  value="" checked> Kasvisruokailijan ravitsemus</label>
                    </div>
                    <div class="list-group-item checkbox">
                        <label><input type="checkbox"  value="" checked> Keliakia ja allergiat</label>
                    </div>
                    <div class="list-group-item checkbox">
                        <label><input type="checkbox"  value="" checked> Laillistetun ravitsemusterapeutin pätevyys</label>
                    </div>
                    <div class="list-group-item checkbox">
                        <label><input type="checkbox"  value="" checked> Painonhallinta ja syömiskäyttäytyminen</label>
                    </div>
                    <div class="list-group-item checkbox">
                        <label><input type="checkbox"  value="" checked> Suolisto- ja vatsaongelmat</label>
                    </div>
                    <div class="list-group-item checkbox">
                        <label><input type="checkbox"  value="" checked> Sydän- ja verisuonitautien ravitsemushoito</label>
                    </div>
                    <div class="list-group-item checkbox">
                        <label><input type="checkbox"  value="" checked> Tyypin 2 diabeteksen ravitsemushoito</label>
                    </div>
                    
                </div>
                </div>
            </div>
                    <!-- fetchaukset, parametrit, tulostukset -->
            <div class="col-md-3">
                <div class="list-group">
                     <h6>Hyvinvointi</h6>
                     <div style="height: 250px; overflow-y: auto; overflow-x: hidden;">
                    <?php

                    $query = "SELECT DISTINCT(hyvinvointi) FROM kolmivelho WHERE hyvinvointi IS NOT NULL GROUP BY hyvinvointi, tp_fk ORDER BY hyvinvointi";
                    $statement = $connect->prepare($query);
                    $statement->execute();
                    $result = $statement->fetchAll();
                    $first = false;
                    foreach($result as $row)
                    {
                       if (!$first) {
                    ?>
                    <div class="list-group-item checkbox">
                        <label><input type="checkbox" class="common_selector ram" value="<?php echo $row['hyvinvointi']; ?>" > <?php echo $row['hyvinvointi']; ?></label>
                    </div>
                    <?php    
                        }
                    $first = false;
                    }

                    ?>
                </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="list-group">
                <h6>Sairaudet</h6>
                <div style="height: 250px; overflow-y: auto; overflow-x: hidden;">
                    <?php
                    $query = "SELECT DISTINCT(sairaudet) FROM kolmivelho WHERE sairaudet IS NOT NULL GROUP BY sairaudet, tp_fk ORDER BY sairaudet";
                    $statement = $connect->prepare($query);
                    $statement->execute();
                    $result = $statement->fetchAll();
                    $first = false;
                    foreach($result as $row)
                    {
                        if (!$first) {
                    ?>
                    <div class="list-group-item checkbox">
                        <label><input type="checkbox" class="common_selector storage" value="<?php echo $row['sairaudet']; ?>"  > <?php echo $row['sairaudet']; ?></label>
                    </div>
                    <?php
                        }
                    $first = false;
                    }
                    ?> 
                </div>
                </div>
            </div>

            </div>
                <div>
                    <br>
                    <div class="row filter_data">

                    </div>
                </div>  
        </div>
        
    </div>
    <br>
    <br>
<style>
#loading
{
	text-align:center; 
	background: url('loader.gif') no-repeat center; 
	height: 150px;
}
</style>

<script>
$(document).ready(function(){

    filter_data();

    function filter_data()
    {
        $('.filter_data').html('<div id="loading" style="" ></div>');
        var action = 'fetch_data';
        var brand = get_filter('brand'); 
        var ram = get_filter('ram');
        var storage = get_filter('storage');

        $.ajax({
            url:"haku/fetch_data.php",
            method:"POST",
            data:{action:action, brand:brand,ram:ram, storage:storage},
            success:function(data){
                $('.filter_data').html(data);
            }
        });
    }

    function get_filter(class_name)
    {
        var filter = [];
        $('.'+class_name+':checked').each(function(){
            filter.push($(this).val());
        });
        return filter;
    }

    $('.common_selector').click(function(){
        filter_data();
    });


});
</script>
<?php include('includes/footer.php');?>
</body>

</html>
