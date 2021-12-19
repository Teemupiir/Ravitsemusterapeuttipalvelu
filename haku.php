<!-- TÄMÄ ON TESTISIVU HAKUUN, HAKEEKO SE KYSELYLLÄ VALUET TIETOKANNASTA -->
 
<form name="search" method="post" action="hakuresult">
<table width="900" style="border:1;" class="srch">
<tr class="head"><td>Pro Price</td></tr>
<tr>
<td>
<input type="checkbox" value="vanhus" name="terapeutin_hyvinvointi[]">vanhus<br />
<input type="checkbox" value="urheilu" name="terapeutin_hyvinvointi[]">urheilu<br />
<input type="checkbox" value="vegaani" name="terapeutin_hyvinvointi[]">vegaani<br />
<td>
</tr>

<tr><td colspan="3" style="align: Right;">
<input type="submit" name="search" value="Search" /></td></tr>
</table>
</form>
</div>
<div id="media" class="group">
search.php
<? php
session_start();

if(isset($_REQUEST['search']))
{
    $pro_price = $_REQUEST['terapeutin_hyvinvointi'];

    foreach ($_REQUEST['terapeutin_hyvinvointi'] as $terapeutin_hyvinvointi) {
        $statearray[] = mysql_real_escape_string($terapeutin_hyvinvointi);
    }

    $states = implode ("','", $statearray);

    $sql = "SELECT * FROM terapeutin_hyvinvointi WHERE vanhus IN ('$states');

    $result = mysql_query($sql) or die(mysql_error());

  
    if (mysql_num_rows($result) == 0)
    {
        echo "Sorry, but we can not find an entry to match your query...<br><br>";
    }
    else
    {
        echo "<table border='1' width='900' class='srchrslt'>
        <tr class='head'>
        <td>terapeutin_hyvinvointi</td>
        </tr>";

        while($row = mysql_fetch_assoc( $result ))
        {              
            echo "<tr>";

            echo "<td>" . $row['terapeutin_hyvinvointi'] . " </td>";
            echo "</tr>";
        }
        echo "</table>";
    }

    mysqli_close($link);
}

?>