	function changeStatusInfoTienda()
		{
			if ( $('#ContInformacionTienda').css("display") == "none" )
				{					
					$('#ContInformacionTienda').slideDown('slow', function() {
    					$('#ContInformacionTienda').css("display","table");
  					});
					$('#ContDirecciones').css("display","none");
					$('#ContInformacionUsuario').css("display","none");
					$('#msgInformacionTienda').html("");
					$('#msgInformacionUsuario').html("");
					$('#msgDireccion1').html("");
					$('#msgDireccion2').html("");
				}
			else
			{
			$('#ContInformacionTienda').slideUp('slow', function() {
				$('#ContInformacionTienda').css("display","none");
				});
				$('#msgInformacionTienda').html("");
					$('#msgInformacionUsuario').html("");
					$('#msgDireccion1').html("");
					$('#msgDireccion2').html("");
			}
		}
		
		
		function changeStatusDirecciones()
		{
			if ( $('#ContDirecciones').css("display") == "none" )
				{
				$('#ContDirecciones').slideDown('slow', function() {
					$('#ContDirecciones').css("display","table");
					});
					$('#ContInformacionTienda').css("display","none");
					$('#ContInformacionUsuario').css("display","none");
					$('#msgInformacionTienda').html("");
					$('#msgInformacionUsuario').html("");
					$('#msgDireccion1').html("");
					$('#msgDireccion2').html("");
				}
			else
			{
			$('#ContDirecciones').slideUp('slow', function() {
				$('#ContDirecciones').css("display","none");
				});
			$('#msgInformacionTienda').html("");
					$('#msgInformacionUsuario').html("");
					$('#msgDireccion1').html("");
					$('#msgDireccion2').html("");
			}
		}
		
		function changeStatusInfoUsuario()
		{
			if ( $('#ContInformacionUsuario').css("display") == "none" )
				{
				$('#ContInformacionUsuario').slideDown('slow', function() {
					$('#ContInformacionUsuario').css("display","table");
					});
					$('#ContInformacionTienda').css("display","none");
					$('#ContDirecciones').css("display","none");
					$('#msgInformacionTienda').html("");
					$('#msgInformacionUsuario').html("");
					$('#msgDireccion1').html("");
					$('#msgDireccion2').html("");
				}
			else
			{
			$('#ContInformacionUsuario').slideUp('slow', function() {
				$('#ContInformacionUsuario').css("display","none");
				});
				$('#msgInformacionTienda').html("");
					$('#msgInformacionUsuario').html("");
					$('#msgDireccion1').html("");
					$('#msgDireccion2').html("");
			}
		}
		
		
		function changeIconInfoTienda()
		{
		$('#idInformacionTienda').css( 'cursor', 'pointer' );
		}
		
		function changeIconCatalogo()
		{
		$('#idAdminCatalogo').css( 'cursor', 'pointer' );
		}
		
		function changeIconDirecciones()
		{
		$('#idDirecciones').css( 'cursor', 'pointer' );
		}
		
		function changeIconInfoUsuario()
		{
		$('#idInformacionUsuario').css( 'cursor', 'pointer' );
		}
		
		function goToCatalogo()
		{
		
		
			window.location.href=  "catalogo.php";
			}
		
		
		