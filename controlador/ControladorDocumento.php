
<?php
$metodo= $_GET['op'];
require('../modelo/ModeloDocumento.php');
$objDocumento=new ModeloDocumento();
switch ($metodo) {
	case 'guardar';
	$iddocumento=$_POST['txtIdDocumento'];
	$autor=$_POST['txtAutor'];
	$titulo=$_POST['txtTitulo'];
	$palabrasclave=$_POST['txtPalabras'];
	$fechapublicacion=$_POST['txtPublicacion'];
	$editorial=$_POST['txtEditorial'];
	$resumen=$_POST['txtResumen'];
	//$ruta=$_POST['txtRuta'];
	$idcategoria=$_POST['cboDocumento'];
	$documento=$_FILES['archivo']['tmp_name'];
	$ruta=$_FILES['archivo']['name'];

	move_uploaded_file($documento, '../files/'.$ruta);
	//echo $publicacion;

	if(empty($iddocumento)){
		$varRegistrar=$objDocumento->registrar($autor,$titulo,$palabrasclave,$fechapublicacion,$editorial, $resumen, $ruta, $idcategoria);

		if ($varRegistrar)
		{

			echo 'Se ha registrado Exitosamente';
		}
		else
		{
			echo 'Error al registrar el documento';

		}
	}
	else
	{
		$varActualizar=$objDocumento->actualizar($autor,$titulo,$palabrasclave,$fechapublicacion, $editorial, $resumen, $ruta, $idcategoria, $iddocumento);

		if ($varActualizar)
		{

			echo 'Actualizacion Exitosa';
		}
		else
		{
			echo 'Error al actualizar';

		}

	}

	break;

	case 'listar':
	$varListar=$objDocumento->listar();

	echo '<table class="table table-bordered">
	<thead>
		<tr>
			<th>#</th>			
			<th>Autor </th>
			<th>Titulo </th>
			<th>Fecha de Publicación</th>
			<th>Tipo de Documento</th>
			<th>Opciones</th>
		</tr>
	</thead>
	<tbody>';

		$oper=1;

		while ( $reg= $varListar->fetch_object())

		{

			echo '<tr>

			<th scope="row">'.$oper.'</th>
			<td class="col-sm-3">'.$reg->autor.'</td>
			<td class="col-sm-3">'.$reg->titulo.'</td>
			<td>'.$reg->fechapublicacion.'</td>
			<td>'.$reg->idcategoria.'</td>
			<td>
			<button class="btn btn-warning btn-xs" type="button" id="btnEditar" OnClick="editarDocumento('.$reg->iddocumento.',\''.$reg->autor.'\',\''.$reg->titulo.'\',\''.$reg->palabrasclave.'\',\''.$reg->fechapublicacion.'\',\''.$reg->editorial.'\',\''.$reg->resumen.'\',\''.$reg->ruta.'\',\''.$reg->idcategoria.',\')"> Editar </button>

				<button class="btn btn-danger btn-xs" type="button" id="btnEliminar" OnClick="eliminarDocumento('.$reg->iddocumento.')"> eliminar </button>
			</td>
		</tr>';
		$oper++;
	}
	echo '</tbody
</table>';
break;

case 'eliminar':

$iddocumento= $_POST['iddocumento'];
$varEliminar=$objDocumento->eliminar($iddocumento);
if($varEliminar)
{
	echo 'Se ha eliminado exitosamente';
}
else
{
	echo 'Error al eliminar el documento';
}
break;
case 'listarCategorias':

$varListarCat=$objDocumento->listarCategorias();

while($reg=$varListarCat->fetch_object())
{


	echo'<option value="'.$reg->idcategoria.'">'.$reg->nombrecategoria.'</option>';
}

break;
}

?>
