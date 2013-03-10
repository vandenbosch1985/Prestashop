function RemoveImage1()
{
	$('#fileToUpload1').css("display","table");
	$('#listaImg1').html("");
	$('#fileToUpload1').val("");
	$('#hasImage1').val(0);
	if ( $('#imgProduct1') !=null) 
		$('#imgProduct1').css("display","none");
}

function displayImageInput1()
{
	if ( $('#fileToUpload1').val() != "" )
	{
		$('#fileToUpload1').css("display","none");
		$('#hasImage1').val(true);
		$('#listaImg1').html( $('#fileToUpload1').val().replace('C:\\fakepath\\',"")+"<img src='img/disabled.gif' style='margin-right:5px;margin-left:5px;' onClick='RemoveImage1();'>" );
	}
	else
		$('#fileToUpload1').css("display","table");
}


/*************************************************************************************************************************/

function RemoveImage2()
{
	$('#fileToUpload2').css("display","table");
	$('#listaImg2').html("");
	$('#fileToUpload2').val("");
	$('#hasImage2').val(0);
	if ( $('#imgProduct2') !=null) 
		$('#imgProduct2').css("display","none");
}

function displayImageInput2()
{
	if ( $('#fileToUpload2').val() != "" )
	{
		$('#fileToUpload2').css("display","none");
		$('#hasImage2').val(true);
		$('#listaImg2').html( $('#fileToUpload2').val().replace('C:\\fakepath\\',"")+"<img src='img/disabled.gif' style='margin-right:5px;margin-left:5px;' onClick='RemoveImage2();'>" );
	}
	else
		$('#fileToUpload2').css("display","table");
}

/****************************************************************************************************************************/

function RemoveImage3()
{
	$('#fileToUpload3').css("display","table");
	$('#listaImg3').html("");
	$('#fileToUpload3').val("");
	$('#hasImage3').val(0);
	if ( $('#imgProduct3') !=null) 
		$('#imgProduct3').css("display","none");
}

function displayImageInput3()
{
	if ( $('#fileToUpload3').val() != "" )
	{
		$('#fileToUpload3').css("display","none");
		$('#hasImage3').val(true);
		$('#listaImg3').html( $('#fileToUpload3').val().replace('C:\\fakepath\\',"")+"<img src='img/disabled.gif' style='margin-right:5px;margin-left:5px;' onClick='RemoveImage3();'>" );
	}
	else
		$('#fileToUpload3').css("display","table");
}

/**********************************************************************************************************************************/

function RemoveImage4()
{
	$('#fileToUpload4').css("display","table");
	$('#listaImg4').html("");
	$('#fileToUpload4').val("");
	$('#hasImage4').val(0);
	if ( $('#imgProduct4') !=null) 
		$('#imgProduct4').css("display","none");
}

function displayImageInput4()
{
	if ( $('#fileToUpload4').val() != "" )
	{
		$('#fileToUpload4').css("display","none");
		$('#hasImage4').val(true);
		$('#listaImg4').html( $('#fileToUpload4').val().replace('C:\\fakepath\\',"")+"<img src='img/disabled.gif' style='margin-right:5px;margin-left:5px;' onClick='RemoveImage4();'>" );
	}
	else
		$('#fileToUpload4').css("display","table");
}

/***********************************************************************************************************************************/


function RemoveImage5()
{
	$('#fileToUpload5').css("display","table");
	$('#listaImg5').html("");
	$('#fileToUpload5').val("");
	$('#hasImage5').val(0);
	if ( $('#imgProduct5') !=null) 
		$('#imgProduct5').css("display","none");
}

function displayImageInput5()
{
	if ( $('#fileToUpload5').val() != "" )
	{
		$('#fileToUpload5').css("display","none");
		$('#hasImage5').val(true);
		$('#listaImg5').html( $('#fileToUpload5').val().replace('C:\\fakepath\\',"")+"<img src='img/disabled.gif' style='margin-right:5px;margin-left:5px;' onClick='RemoveImage5();'>" );
	}
	else
		$('#fileToUpload5').css("display","table");
}

/****************************************************************************************************************************************/

function show_checked1()
{	
	if ( $('input[name=checkfileToUpload1]').is(':checked')  )	
	{
		var $unique1 = $('input.unique');
		$unique1.removeAttr('checked');    	   
		$unique1.val('0');		
		$('input[name=checkfileToUpload1]').val('1');
	}
	else
		$('input[name=checkfileToUpload1]').val('0');
	
	
}

/****************************************************************************************************************************************/

function show_checked2()
{
	if ( $('input[name=checkfileToUpload2]').is(':checked')  )	
	{
		var $unique2 = $('input.unique');
		$unique2.removeAttr('checked');    	   
		$unique2.val('0');		
		$('input[name=checkfileToUpload2]').val('1');
	}
	else
		$('input[name=checkfileToUpload2]').val('0');
}

/****************************************************************************************************************************************/

function show_checked3()
{
	if ( $('input[name=checkfileToUpload3]').is(':checked')  )	
	{
		var $unique3 = $('input.unique');
		$unique3.removeAttr('checked');    	   
		$unique3.val('0');		
		$('input[name=checkfileToUpload3]').val('1');
	}
	else
		$('input[name=checkfileToUpload3]').val('0');
}

/****************************************************************************************************************************************/

function show_checked4()
{
	if ( $('input[name=checkfileToUpload4]').is(':checked')  )	
	{
		var $unique4 = $('input.unique');
		$unique4.removeAttr('checked');    	   
		$unique4.val('0');		
		$('input[name=checkfileToUpload4]').val('1');
	}
	else
		$('input[name=checkfileToUpload4]').val('0');
}

/****************************************************************************************************************************************/

function show_checked5()
{
	if ( $('input[name=checkfileToUpload5]').is(':checked')  )	
	{
		var $unique5 = $('input.unique');
		$unique5.removeAttr('checked');    	   
		$unique5.val('0');		
		$('input[name=checkfileToUpload5]').val('1');
	}
	else
		$('input[name=checkfileToUpload5]').val('0');
}
