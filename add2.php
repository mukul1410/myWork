<?php
//error_reporting(0);
require_once("config.php");
$service=$_POST['service'];
$zone=$_POST['zone'];
$wt=$_POST['weight'];
$rt=$_POST['rate'];
$pk=$_POST['perkg'];
$query="select * from zone_rates2 where service_id=".$service." AND zone='".$zone."' AND weight=".$wt;
$q2=mysql_query($query);
$row=mysql_fetch_array($q2);
if($row==NULL)
{
  
	++$_COOKIE['counter1'];
	$q3="insert into zone_rates2 values('".$service."','".$zone."','".$wt."','".$rt."','".$pk."')";
	$q4=mysql_query($q3);
	echo $q3.$_COOKIE['counter1'];
}

else
{
	
	$q5="Update zone_rates2 set rate='".$rt."'  where service_id=".$service." AND zone='".$zone."' AND weight=".$wt;
	$q4=mysql_query($q5);
	$q6="Update zone_rates2 set per_kg='".$pk."'  where service_id=".$service." AND zone='".$zone."' AND weight=".$wt;
	$q7=mysql_query($q6);
	echo $q5;
}
