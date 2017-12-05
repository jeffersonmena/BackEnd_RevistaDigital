	$(document).on("ready", init); //funciones cargadas al abrir el documento
	function init()
	{
		listarDocumento();
		limpiar();
		listarcategoriascbo();

		$('#VerFormDocumento').hide();

		//$(":file").filestyle({badge: false});
		//alert ('abriendo página');
		$('form#FormRegDocumento').submit (guardarDocumento);

		$('#btnNuevo').click(mostrarformulario);

		$('#Cancelar').click(cancelarDocumento);
		
function cancelarDocumento(){

	listarDocumento();
	
	$('#VerFormDocumento').hide();
	$('#VerlistaDocumento').show();
		$('#mensaje').html(r);
}
		
		

		function mostrarformulario(){

			$('#VerFormDocumento').show();
			$('#VerlistaDocumento').hide();
		}

		function guardarDocumento(e)
		{
	//para no recargar la pagina en el url 
			e.preventDefault();
			//conexion

			var formData= new FormData($("#FormRegDocumento")[0]);

			$.ajax({

				url:"controlador/ControladorDocumento.php?op=guardar" ,

				type: "POST",

				data: formData,
				contentType: false,
				processData: false,
				success : function(r){

					//alert (r);

				listarDocumento();
				limpiar();
				$('#VerFormDocumento').hide();
				$('#VerlistaDocumento').show();
				$('#mensaje').html(r);

							}
					});



	/*$.post('controlador/ControladorDocumento.php?op=guardar', $('#FormRegDocumento').serialize(), function(r){

	listarDocumento();
	limpiar();
	$('#VerFormDocumento').hide();
	$('#VerlistaDocumento').show();
	$('#mensaje').html(r);

		//alert (r)
	});;*/
	}

function limpiar(){

		$('#txtIdDocumento').val('');
		$('#txtAutor').val('');
		$('#txtTitulo').val('');
		$('#txtPalabras').val('');
		$('#txtPublicacion').val('');
		$('#txtEditorial').val('');
		$('#txtResumen').val('');
		$('#txtRuta').val('');
		$('#CboDocumento').val('');
	
}

function listarcategoriascbo(){

$.post('controlador/ControladorDocumento.php?op=listarCategorias',  function(r){

 
		$('#cboDocumento').html(r);

	});

}

function listarDocumento(){

	$.post('controlador/ControladorDocumento.php?op=listar',  function(r){

		$('#ListaDocumento').html(r);
	//alert (r);
});

}

	} //Cierra llave de la funcion init

	function eliminarDocumento(iddocumento)
	{


		$.post('controlador/ControladorDocumento.php?op=eliminar',{iddocumento:iddocumento}, function(r){

		
			//alert(r)


		});
	}

	function editarDocumento(iddocumento,autor,titulo,palabrasclave,fechapublicacion,editorial,resumen,ruta,idcategoria)
	{

		$('#VerFormDocumento').show();
		$('#VerlistaDocumento').hide();
		//pasar datos a los campos
		$('#txtIdDocumento').val(iddocumento);
		$('#txtAutor').val(autor);
		$('#txtTitulo').val(titulo);
		//$('#txtFecha').val(fecha);
		$('#txtPalabras').val(palabrasclave);
		alert(fechapublicacion);
		$('#txtPublicacion').val(fechapublicacion);
		$('#txtEditorial').val(editorial);
		$('#txtResumen').val(resumen);
		$('#txtRuta').val(ruta);
		$('#CboDocumento').val(idcategoria);
		$('#BtnGuardar').val('Actualizar');
	}

