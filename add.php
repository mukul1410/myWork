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
setcookie('service',$shipper);
setcookie('zone',$zone);
$rows=$_POST['rows'];
while($rows)
{
  $show="<tr id='".$rows."' >
  <td><input  type='text' alt='".$rows."' class='input' id='weight' aria-required='true'  placeholder='Weight in kg' /></td>
  <td><input  type='text' alt='".$rows."' class='input' id='rate' aria-required='true'  placeholder='Rate in INR' /></td>
  <td><input  type='text' alt='".$rows."' class='input' id='perkg' aria-required='true'  placeholder='Per Kg in 0 or 1' /></td>
</tr>
";
$rows--;
$ans=$ans.$show;
}
$script=" <script src='addJs.js'></script>";

echo $ans."</table>".$script;


?>

