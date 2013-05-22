<?php
//error_reporting(0);
require_once('config.php');
$query=$_POST['query'];
$qArray=explode(';',$query);
$i=0;
while($qArray[$i]!=NULL)
{
echo $qArray[$i];
$query1=mysql_query($qArray[$i]);
$i++;
}
?>
