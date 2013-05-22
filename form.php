<html>
<head>
<style>
select,input
{
  	font-family:"Myriad Pro", "Trebuchet MS", sans-serif;
}

#form div
{
	padding:15px;
}
#qlinks
		{
			position:absolute;
			top:-250px;
			height:200px;
			left:0px;
			width:100%;
			background-color:black;
		}
		
#qlinks img
		{
			padding-right:65px;
			padding-left:15px;
			padding-top:25px;
			cursor:pointer;
		}
		
		#homeLink
			{
				position:absolute;
				right:5px;
				top:10px;
				
			}
</style>
<script src="http://code.jquery.com/jquery-latest.min.js" ></script>
<script>
$(document).ready(function()
{
	$('#calci').hide();
	var isSubmitted=0;
	$('#form').submit(function()
	{
		isSubmitted=1;
		var cid=$('#cid').val();
		var wt=$('#wt').val();
		var formData="cid="+cid+"&weight="+wt;
		$.post('details.php',formData,processData);
		function processData(data)
		{
			$('#results').html(data);
			$('#calci').show();
		}
		return false;
		
		
	});	
	
	$('#cid').change(function()
	{
		if(isSubmitted==1)
		{
		var cid=$('#cid').val();
		var wt=$('#wt').val();
		var formData="cid="+cid+"&weight="+wt;
		$.post('details.php',formData,processData);
		function processData(data)
		{
			$('#results').html(data);
			$('#calci').show();
		}
		}
	});//end change
	
	$('#wt').keyup(function()
	{
		if(isSubmitted==1)
		{
		var cid=$('#cid').val();
		var wt=$('#wt').val();
		var formData="cid="+cid+"&weight="+wt;
		$.post('details.php',formData,processData);
		function processData(data)
		{
			$('#results').html(data);
			$('#calci').show();
		}
		}
	});//end keyup
	
	$('#fromVal').keyup(function()
	{	
	var ratio=($('#from').val())/($('#to').val());
	//alert(ratio);
	var fromVal=$('#fromVal').val();
	
	var toVal=fromVal/ratio;
	$('#toVal').val(toVal.toFixed(2));
	
	});
	
	$('#toVal').keyup(function()
	{	
	var ratio=($('#to').val())/($('#from').val());
	//alert(ratio);
	var fromVal=$('#toVal').val();
	
	var toVal=fromVal/ratio;
	$('#fromVal').val(toVal.toFixed(2));
	
	});
	
	$('#from').change(function()
	{	
	var ratio=($('#from').val())/($('#to').val());
	//alert(ratio);
	var fromVal=$('#fromVal').val();
	
	var toVal=fromVal/ratio;
	$('#toVal').val(toVal.toFixed(2));
	
	});
	
	$('#to').change(function()
	{	
	var ratio=($('#to').val())/($('#from').val());
	//alert(ratio);
	var fromVal=$('#toVal').val();
	
	var toVal=fromVal/ratio;
	$('#fromVal').val(toVal.toFixed(2));
	
	});
	
	$('#homeLink').click(function()
			{
				$('#qlinks,#qlinks img').animate({top:'-10px'},400);
				return false;
			});//end homeLink click
			
			$(document).click(function()
			{
				$('#qlinks,#qlinks img').animate({top:'-250px'},400);
				
			});//end anywhere click
	//end select*/
	
});//end ready
</script> 
</head>
<body>
<div id="form">
<form action="details.php"  method="POST" id="form">
<div><?php
require_once("config.php");
$sql="select * from countries";
$query1=mysql_query($sql);
$ans="<select name='cid' id='cid'><option  value='-1'>Select Country</option>";
while($row=mysql_fetch_array($query1))
{
	$name=$row['name'];
	$id=$row['id'];
	$show="<option value='".$id."'>".$name."</option>";
	$ans.=$show;
}

$ans.="</select>";
echo $ans;
?></div>
<div>
<input type="text" name="weight" class="required" id='wt'  aria-required="true" placeholder="Weight in KG" >Kg</input>
</div>
<div>
<input type="submit" value="submit"/>
</div>
</form>
</div>

<div id="results">
</div>

<div id="calci">
<h2>Currency Converter</h2>
<div><?php
error_reporting(0);
require_once("config.php");
$sql="select * from currencyrates";
$query1=mysql_query($sql);
$ans="<input class='select' type='text' id='fromVal'><select class='select' name='from' id='from'><option  value='72.913'>INR</option>";
while($row=mysql_fetch_array($query1))
{
	$name=$row['currency'];
	$rate=$row['rate'];
	$show="<option value='".$rate."'>".$name."</option>";
	$ans.=$show;
}

$ans.="</select></input>";
echo $ans;

?></div>
<div><?php
require_once("config.php");
$sql="select * from currencyrates";
$query1=mysql_query($sql);
$ans="<input  class='select' type='text' id='toVal'><select name='to' id='to' class='select'><option  value='1.3266'>USD</option>";
while($row=mysql_fetch_array($query1))
{
	$name=$row['currency'];
	$rate1=$row['rate'];
	$show="<option value='".$rate1."'>".$name."</option>";
	$ans.=$show;
}

$ans.="</select></input>";
echo $ans;
?></div>
</div>
</div>
<div id="homeLink">

<a href="#"><img src="img/list.png" width="70px" height="80px" /></a>	
</div>
</div>
<div id="qlinks">
		<a href="update.php"><img src="img/edit.png"  width="130px" height="150px"  title="Edit Shipping Details"/></a>
		<a href="addIn.php"><img src="img/add2.ico"  width="130px" height="150px" title="Add Shipping Data" /></a>
</div>
		
		<div id='infoSpace3'></div>
</body>
</html>
