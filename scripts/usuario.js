	$(document).on("ready", init); //funciones cargadas al abrir el documento
	function init()
	{
		listarUsuarios();
		limpiar();

		$('#VerFormUsuario').hide();
		//alert ('abriendo página');
		$('form#FormRegUsuario').submit (guardarUsuario);
		$('#btnNuevo').click(mostrarformulario);
		$('#CancelarU').click(cancelarUsuario);

function cancelarUsuario(){

	listarUsuarios();
	
	$('#VerFormUsuario').hide();
	$('#VerlistaUsuario').show();
		$('#mensaje').html(r);
}
		

		function mostrarformulario(){

			$('#VerFormUsuario').show();
			$('#VerlistaUsuario').hide();
		}

		function guardarUsuario(e)
		{
	//para no recargar la pagina en el url 
	e.preventDefault();
	$.post('controlador/ControladorUsuario.php?op=guardar', $('#FormRegUsuario').serialize(), function(r){

		listarUsuarios()
		limpiar();
		$('#VerFormUsuario').hide();
		$('#VerlistaUsuario').show();
		$('#mensaje').html(r);

		//alert (r);
	});
}
function limpiar(){
		$('#txtIdUsuario').val('');
		$('#txtNombre').val('');
		$('#txtLogin').val('');
		$('#txtClave').val('');
		$('#CboEstado').val('A');
}

function listarUsuarios(){

	$.post('controlador/ControladorUsuario.php?op=listar',  function(r){

		$('#ListaUsuarios').html(r);
	//alert (r);
});

}

	} //Cierra llave de la funcion init

	function eliminarUsuario(idusuario)
	{

		$.post('controlador/ControladorUsuario.php?op=eliminar',{idusuario:idusuario}, function(r){

			//alert(r)

	
		});
	}

	function editarUsuario(idusuario,nombre,login,clave,estado)
	{

		$('#VerFormUsuario').show();
		$('#VerlistaUsuario').hide();

		//pasar datos a los campos
		$('#txtIdUsuario').val(idusuario);
		$('#txtNombre').val(nombre);
		$('#txtLogin').val(login);
		$('#txtClave').val(clave);
		$('#CboEstado').val(estado);

		$('#BtnGuardar').val('Actualizar');
	}



	