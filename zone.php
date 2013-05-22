<?php
require_once('config.php');
$serviceId=$_POST['serviceId'];
if($serviceId==-1)
{
echo "<div id='error'><p style='color:red'>Select the service first</p></div>";
}
else
{
$sql="select distinct(cz.zone) from country_zones cz,services s where s.id='".$serviceId."' AND s.shipper_id=cz.shipper_id";
$query1=mysql_query($sql);
$ans="<div><select name='zone' id='zid'><option  value='-1'>Select Zone</option>";
while($row=mysql_fetch_array($query1))
{
  $name=$row['zone'];
	
	$show="<option value='".$name."'>".$name."</option>";
	$ans.=$show;
}

$ans.="</select></div>";
echo $ans;
}
?>
