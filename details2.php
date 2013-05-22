<?php
//error_reporting(0);
$ans='<table border="0" cellspacing="0">
<tr>
  <td>Weight</td>
  <td>Rate</td>
  <td>Perkg</td>
 </tr>';
require_once("config.php");
$shipper=$_POST['shipper'];
$zone=$_POST['zone'];
$startWt=$_POST['startWt'];
$query="select * from zone_rates2 where service_id=".$shipper." AND zone='".$zone."' AND weight>=".$startWt." Limit 15";
$q2=mysql_query($query);
$counter=0;
while($row=mysql_fetch_array($q2))
{
  $counter++;
	$weight=$row['weight'];
	$rate=$row['rate'];
	$perKg=$row['per_kg'];
	$show="<tr id='".$counter."'>
  <td><input  type='text' name='".$counter."' class='input' id='weight'  alt='".$weight."'  value='". $weight."'/></td>
  <td><input type='text' name='".$counter."'  class='input' id='rate'  alt='".$weight."'  value='". $rate."'/></td>
  <td><input type='text'  name='".$counter."'  class='input' id='per_kg' alt='".$weight."'  value='". $perKg."'/></td>
</tr>
";

$ans=$ans.$show;
}
$script=" <script src='updateJs.js'></script>";
if($counter==0)
{
	echo "<p style='color:red;text-transform:uppercase;font-family:Myriad Pro, Trebuchet MS, sans-serif;' >No Data Available for this combination of Services and Zone</p>";
}
else
{
echo $ans."</table>".$script;
}

?>

