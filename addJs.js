$(document).ready(function()
{
  
	var pwt=0;

	$('.input').keyup(function()
	{
			var cnt1=0;
			var cnt2=0;
			var service=$.cookie('service');
			var zone=$.cookie('zone');
			var row=$(this).attr('alt');
			var id='#'+row;
			var forWt=id+' #weight';
			var forRt=id+' #rate';
			var forPk=id+' #perkg';
			var weight=$(forWt).val();
			var rate=$(forRt).val();
			var perkg=$(forPk).val();
			var formData='service='+service+'&zone='+zone+'&weight='+weight+'&rate='+rate+'&perkg='+perkg;
			if(weight.length!=0 && rate.length!=0 && perkg.length!=0)
			{
				
				$.post('add2.php',formData,processData);
				function processData(data)
				{
					
					if(data.indexOf('insert')!=-1)
					{
						var cnt=$.cookie('counter1');
						
						cnt++;
						
						$.cookie('counter1',cnt);
					}
					else
					{
						var cnt=$.cookie('counter2');
						cnt++;
					
						$.cookie('counter2',cnt);
					}
					
				}
			}
	});
		
		
});
