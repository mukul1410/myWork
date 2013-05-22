<html>
<head></head>
<body>
<?php
require_once("config.php");
$sql="select * from countries";
$query1=mysql_query($sql);
$ans="<select ><option name='cid' value='-1'>Select Country</option>";
while($row=mysql_fetch_array($query1))
{
  $name=$row['name'];
	$id=$row['id'];
	$show="<option name='cid' value='".$id."'>".$name."</option>";
	$ans.=$show;
}

$ans.="</select>";
echo $ans;
?>
</body>
</html>
