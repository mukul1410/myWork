<html>
<head>
<style>
select,input,table,#pages p,label
{
  	font-family:"Myriad Pro", "Trebuchet MS", sans-serif;
		
}

#form div
{
	padding:15px;
}

#info div
{
	float:left;
	padding-right:45px;
}

#addBtn
{
	position:absolute;
	top:500px;
}
#editBtn
{
	position:absolute;
	top:400px;
}
.btn
{
	background-color:#336699;
	border:1px #336699 solid;
	font-family:"Myriad Pro", "Trebuchet MS", sans-serif;
	font-size:17px;
	cursor:pointer;
	color:white;
	width:100px;
	height:30px;
	border-radius:5px 5px 5px 5px;
}
.btn:hover
{
		background-color:#104E8B;
		border-color:#104E8B;
		cursor:pointer;
		color:white;
}	
#pages a
{
	padding:6px;
	color:green;
	text-decoration:none;
}

#pages a:hover
{
	
	color:#336699;
	text-decoration:underline;
}
#error
{
	position:absolute;
	top:10px;
	left:300px;
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
<script src="jquery.cookie.js" ></script>
<script>
$(document).ready(function()
{
	$('#sideBar,#afterAdd').hide();
	$.cookie('counter1','0');
	$.cookie('counter2','0');
$('#form').submit(function()
	{
		$('#afterAdd').hide();
		var sid=$('#sid').val();
		var zone=$('#zid').val();
	
		$.cookie('sid',sid);
		$.cookie('zid',zone);
		var formData="shipper="+sid+"&zone="+zone+'&startWt=0.5';
		$.post('details2.php',formData,processData);
		function processData(data)
		{
			
			$('#results').html(data);
			$('#sideBar').show();
			//alert(data);
			/*if(data.indexOf('<table')==-1)
			{
			
			
			$('#pages,#editBtn').hide();
			$('#addBtn').show();
			}
			else	if(data.indexOf('<table')!=-1)
			{
			
			
			}*/
		}
		return false;
	});//end submit	
	
	$('#pages a').click(function()
	{
			var startWt=$(this).attr('id');
			var sid=$('#sid').val();
			var zone=$('#zid').val();
			var formData="shipper="+sid+"&zone="+zone+'&startWt='+startWt;
		
			$.post('details2.php',formData,processData);
			function processData(data)
			{
				$('#results').html(data);
			
			}
			return false;
			
	});	
	
	
	$('#editBtn').click(function()
	{
		var query=$.cookie('query');
		query=decodeURIComponent(query);
		
		var formData="query="+query;
		$.post('query.php',formData,processData);
		function processData(data)
		{
				alert('Updated Successfully');
		}
	});//end edit click
	
	$('#addBtn').click(function()
	{
		
		var sid=$('#sid').val();
		var zone=$('#zid').val();
		var rows=$('#rows').val();
		var formData="shipper="+sid+"&zone="+zone+'&rows='+rows;
		$.post('add.php',formData,processData);
		
		function processData(data)
		{
			
			$('#sideBar').hide();
			$('#afterAdd').show();
			$('#results').html(data);
		}
		
	});//end add click
	
	$('#dropDown').change(function()
	{
	
		var sid=$('#sid').val();
		var zone=$('#zid').val();
		var rows=$('#rows').val();
		var formData="shipper="+sid+"&zone="+zone+'&rows='+rows;
		$.post('add.php',formData,processData);
		function processData(data)
		{
			$('#results').html(data);
		
		}
		
	});//end dropDown change
	
	$('#sid').change(function()
	{
		var val=$(this).val();
		var formData="serviceId="+val;
		$.post('zone.php',formData,processData);
		function processData(data)
		{
			$('#zone').html(data);
		}//end processData
	});//end sid change
	
	$('#addBtn2').click(function()
	{
		alert("Inserted Successfully");
	});//end addBtn2 click
	
	$('#homeLink').click(function()
			{
				$('#qlinks,#qlinks img').animate({top:'-10px'},400);
				return false;
			});//end homeLink click
			
			$(document).click(function()
			{
				$('#qlinks,#qlinks img').animate({top:'-250px'},400);
				
			});//end anywhere click
	
});//end ready		
</script> 
</head>
<body>
<div id="form">
<form action="details2.php"  method="POST" id="form">
<div><?php
require_once("config.php");
$sql="select * from services s,shippers sh where sh.id=s.shipper_id";
$query1=mysql_query($sql);
$ans="<select name='shipper' id='sid'><option  value='-1'>Select Service</option>";
while($row=mysql_fetch_array($query1))
{
	$name=$row['plan'];
	$id=$row['id'];
	$show="<option value='".$id."'>".$name."</option>";
	$ans.=$show;
}

$ans.="</select></div>";
echo $ans;
?>
<div id="zone"></div>

<div>
<input type="submit" value="submit"/>
</div>
</form>
</div>
<div id="info">
<div id="results">
</div>

<div id="sideBar">
<div id="editBtn">
<button id="editButton" class='btn'>UPDATE</button>
</div>
<div id="addBtn">
<button id="addButton" class='btn'>ADD</button>
</div>
<div id="pages">
<p>Select weight range:</p>
<a href='#' id='0.5'>0.5 - 7.0</a>
 <a href='#' id='7.5'>7.5 - 14.5</a>
 <a href='#' id='15'>15-24</a>
 <a href='#' id='25'>25-40</a>
 <a href='#' id='40'>40-54</a>
 <a href='#' id='55'>55-69</a>
 <a href='#' id='70'>70+</a>
</div>
</div>
<div id="afterAdd">
<div id="dropDown">
<label for="name" class="label">No. of rows to be inserted</label>
<select name="rows" id="rows">
<option value="4">4</option>
<option value="5">5</option>
<option value="6">6</option>
<option value="7">7</option>
<option value="8">8</option>
<option value="9">9</option>
<option value="10">10</option>
<option value="11">11</option>
<option value="12">12</option>
<option value="13">13</option>
<option value="14">14</option>
</select>
</div>
<div id="addBtn2">
<button id="addButton" class='btn'>ADD</button>
</div>
</div>

<div id="homeLink">

<a href="#"><img src="img/list.png" width="70px" height="80px" /></a>	
</div>
</div>
<div id="qlinks">
		<a href="form.php"><img src="img/shipping2.png"  width="130px" height="150px"  title="Shipping Calculator"/></a>
		<a href="addIn.php"><img src="img/add2.ico"  width="130px" height="150px" title="Add Shipping Data" /></a>
</div>
		
</body>
</html>
