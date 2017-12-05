<?php
$metodo= $_GET['op'];
require('../modelo/ModeloCategoria.php');
$objCategoria=new ModeloCategoria();
switch ($metodo) {
	case 'guardar';
	$idcategoria=$_POST ['txtIdCategoria'];
	$nombrecategoria=$_POST['txtNombre'];
	$descripcioncategoria=$_POST['txtDescripcion'];
	
	if(empty($idcategoria)){
		$varRegistrar=$objCategoria->registrar($nombrecategoria,$descripcioncategoria);

		if ($varRegistrar)
		{

			echo 'Se ha registrado Exitosamente';
		}
		else
		{
			echo 'Error al registrar el usuario';

		}
	}
	else
	{
		$varActualizar=$objCategoria->actualizar($nombrecategoria,$descripcioncategoria,$idcategoria);

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
	$varListar=$objCategoria->listar();

	echo '<table class="table table-bordered">
	<thead>
		<tr>
			<th>#</th>
			<th>Nombre</th>
			<th>Descripcion</th>
			<th>Opciones</th>
		</tr>
	</thead>
	<tbody>';

		$oper=1;

		while ( $reg= $varListar->fetch_object())

		{

			echo '<tr>

			<th scope="row">'.$oper.'</th>
			<td class="col-sm-5">'.$reg->nombrecategoria.'</td>
			<td>'.$reg->descripcioncategoria.'</td>
			<td>
			<button class="btn btn-warning btn-xs" type="button" id="btnEditar" OnClick="editarCategoria('.$reg->idcategoria.',\''.$reg->nombrecategoria.'\',\''.$reg->descripcioncategoria.'\')"> Editar </button>
				<button class="btn btn-danger btn-xs" type="button" id="btnEliminar" OnClick="eliminarCategoria('.$reg->idcategoria.')"> eliminar </button>

			</td>

		</tr>';
		$oper++;
	}
	echo '</tbody
</table>';
break;

case 'eliminar':

$idcategoria= $_POST['idcategoria'];
$varEliminar=$objCategoria->eliminar($idcategoria);
if($varEliminar)
{
	echo 'Se ha eliminado exitosamente';
}
else
{
	echo 'Error al eliminar el usuario';
}


break;




}

?>
