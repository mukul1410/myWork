$(document).ready(function()
{
  $.cookie('counter','0');
	var pwt=0;
	var counter=0;
	var query='';
	$('.input').blur(function()
	{
			var sid=$.cookie('sid');
			var zone=$.cookie('zid');
			var q2=" AND service_id="+sid+" AND zone='"+zone+"'";		
			var id=$(this).attr('name');
			id='#'+id;
			var column=$(this).attr('id');
			var selector=id+' '+column;
			var value=$(this).val();
			if(value==0 && column!='per_kg')
			alert("Shipment is not free!");
			else
			{
			var weight=$(this).attr('alt');
			query=query+'update zone_rates2 set '+column+'='+value+' where weight='+weight+q2+';';
			$.cookie('query',query);
			if(pwt!=weight)
			{
			counter++;
			$.cookie('counter',counter);	
			pwt=weight;
			}
			/*var formData='column='+column+'&value='+value+'&weight='+weight;
			
			$.post('update2.php',formData,processData);
			function processData(data)
			{
				
			}*/
			}
	});
	
		
		
});
