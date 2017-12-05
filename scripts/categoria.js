	$(document).on("ready", init); //funciones cargadas al abrir el documento
	function init()
	{
		listarCategorias();
		limpiar();
 		
		$('#VerFormCategoria').hide();
		//alert ('abriendo página');
		$('form#FormRegCategoria').submit (guardarCategoria);
		$('#btnNuevoCat').click(mostrarformulario);
		$('#CancelarCat').click(cancelarCategoria);
		
function cancelarCategoria(){

	listarCategorias();
	
	$('#VerFormCategoria').hide();
	$('#VerlistaCategoria').show();
		$('#mensaje').html(r);
}
	


		function mostrarformulario(){

			$('#VerFormCategoria').show();
			$('#VerlistaCategoria').hide();
		}

		function guardarCategoria(e)
		{
	//para no recargar la pagina en el url 
	e.preventDefault();
	$.post('controlador/ControladorCategoria.php?op=guardar', $('#FormRegCategoria').serialize(), function(r){
		listarCategorias()
		limpiar();
		$('#VerFormCategoria').hide();
		$('#VerlistaCategoria').show();
		$('#mensaje').html(r);

		//alert (r);
	});
}
function limpiar(){
		$('#txtIdCategoria').val('');
		$('#txtNombre').val('');
		$('#txtDescripcion').val('');
		
}

function listarCategorias(){

	$.post('controlador/ControladorCategoria.php?op=listar',  function(r){

		$('#ListaCategoria').html(r);
	//alert (r);
});

}

	} //Cierra llave de la funcion init

	function eliminarCategoria(idcategoria)

	{


		$.post('controlador/ControladorCategoria.php?op=eliminar',{idcategoria:idcategoria}, function(r){

			//alert(r)

	
		


		});
	}

	function editarCategoria(idcategoria,nombrecategoria,descripcioncategoria)
	{

		$('#VerFormCategoria').show();
		$('#VerlistaCategoria').hide();

		//pasar datos a los campos
		$('#txtIdCategoria').val(idcategoria);
		$('#txtNombre').val(nombrecategoria);
		$('#txtDescripcion').val(descripcioncategoria);

		$('#BtnGuardar').val('Actualizar');
	}



	