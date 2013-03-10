
//busca caracteres que no sean espacio en blanco en una cadena  
function vacio(q) {  
        for ( i = 0; i < q.length; i++ ) {  
                if ( q.charAt(i) != " " ) {  
                        return true  
                }  
        }  
        return false  
}  
  
//valida que el campo no este vacio y no tenga solo espacios en blanco  
function valida(F,tmpSession) {            
        if( vacio(F.email.value) == false ) {  
				$('#msg').html("<font style='font-style:normal; color:#FF6; font-size:13px; margin-top:-20px; height:50px; margin-left:55px;'>You must specify an email. Please retry.</font>");
                return false  
        } 
		else
		{
			F.submitButton.click();
		}
          
}  


