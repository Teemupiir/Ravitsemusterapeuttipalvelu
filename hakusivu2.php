<head>
    <title>Haku</title>
</head>

<?php 
//index.php
include('includes/head.php');

include('haku/database_connection.php');
?>


<div id="txtHaku">
<h4> Tee juuri sinun tarpeisiisi soveltuva haku ja varaa aika haluamallesi ravitsemusterapeutille</h4>
</div>
    <!-- Page Content -->
    <div class="container">
        <div class="row">
            
        	
 
            
            <div class="col-md-3">                				
			
                <div class="list-group">
					<h6>Sijainti </h6>
                    <div style="height: 180px; overflow-y: auto; overflow-x: hidden;">
					<?php

                    $query = "SELECT DISTINCT(tp_paikkakunta) FROM terapeutit ORDER BY tp_paikkakunta";
                    $statement = $connect->prepare($query);
                    $statement->execute();
                    $result = $statement->fetchAll();
                    foreach($result as $row)
                    {
                    ?>
                    <div class="list-group-item checkbox">
                        <label><input type="checkbox" class="common_selector brand" value="<?php echo $row['tp_paikkakunta']; ?>"  > <?php echo $row['tp_paikkakunta']; ?></label>
                    </div>
                    <?php
                    }

                    ?>
                    </div>
                </div>

            </div>

        </div>

        <div class="col-md-12">
            <br>
              <div class="row filter_data">

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

        $.ajax({
            url:"haku/fetch_data.php",
            method:"POST",
            data:{action:action, brand:brand,},
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
