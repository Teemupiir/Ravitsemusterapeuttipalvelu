<meta charset="utf-8">
<?php
include('database_connection.php');

if(isset($_POST["action"]))
{
	$query = "
	SELECT distinct tp_fk,users_fk,etunimi,sukunimi,esittely,paikkakunta, hyvinvointi, sairaudet FROM kolmivelho WHERE tp_fk>0
   ";

	if(isset($_POST["brand"]))
	{
		$brand_filter = implode("','", $_POST["brand"]);
		$query .= "
		 AND paikkakunta IS NOT NULL AND paikkakunta NOT IN ('') AND paikkakunta IN('".$brand_filter."')
		";
	}
	if(isset($_POST["ram"]))
	{
	 $ram_filter = implode("','", $_POST["ram"]);
	 $query .= "
	  AND hyvinvointi IS NOT NULL AND hyvinvointi NOT IN ('') AND hyvinvointi IN('".$ram_filter."')
	 ";
	}
	if(isset($_POST["storage"]))
	{
	$storage_filter = implode("','", $_POST["storage"]);
	$query .= "
	AND sairaudet IS NOT NULL AND sairaudet NOT IN ('') AND sairaudet IN('".$storage_filter."')
	";
	}

	$statement = $connect->prepare($query);
	$statement->execute();
	$result = $statement->fetchAll(PDO::FETCH_UNIQUE);
	$total_row = $statement->rowCount();

	$output = '';
	
	if($total_row > 0)
	{
		foreach($result as $row)
		{
			$id=$row['users_fk'];
			
			$query = $connect->query("SELECT users_fk, imagename FROM uploadedimage WHERE users_fk='$id'");
			$query->execute();
			
			while($rivi = $query->fetch(PDO::FETCH_ASSOC)){
				$tunniste = $rivi['users_fk'];
				$imgname = $rivi['imagename'];
				}
				
				$folder='ladatutkuvat/';
				

				$teksti=$row['esittely'];
				$täyteteksti= "";
				$x=strlen($teksti);
				$j=120-$x;
				for($i=0; $i<$j; $i++){
				$täyteteksti = $täyteteksti . "_";
				} 
			$output .= '
			<div class="col-sm-12">
				<div class="card" style="margin-top: 10px; margin-bottom: 10px;">
					<div class="row">
						<div class="col-md-3">
						
							<img style="height:250px; width:auto;" src=" '. $folder.$imgname .'" class="w-100">
						</div>
						<div class="col-md-8">
							<div style="position: relative; padding:16px; height:250px;">
                                <p style="font-weight: bold"><strong>'. $row['etunimi'] .' '. $row['sukunimi'] .'</strong></p>
								
								<p style="font-weight: bold">'. $row['paikkakunta'] .'</p>
								<div  style="overflow: hidden; display: -webkit-box; -webkit-line-clamp: 4; -webkit-box-orient: vertical;">
								<p>'. $row['esittely'] .'</p>
								
								

								</div>
								<div style="position: absolute; bottom: 0; margin-bottom: 15px;">
									<a style="margin-top: 0px; margin-bottom: 0px;" href="varaa_aika.php?id='.$row['users_fk'].'" class="btn btn-info" id="ajanvarausbtn1" value="1">Varaa aika</a>
								</div>
							</div>
							
						</div>
					</div>
				</div>
			</div>
			<br><br>
			';
		}
	}
	else
	{
		$output = '<div class="container" style="margin-top:50px;"><div class="row"><div class="col-2"></div><div class="col-8"><h3 style="text-align:center;">Hakua vastaavia terapeutteja ei löytynyt. <br>Tee uusi haku. </h3></div><div class="col-2"></div></div>';
	}
	echo $output;
}



?>