<?php
$metodo= $_GET['op'];
require('../modelo/ModeloUsuario.php');
$objUsuario=new ModeloUsuario();
switch ($metodo) {
	case 'guardar';
	$idusuario=$_POST ['txtIdUsuario'];
	$nombre=$_POST['txtNombre'];
	$login=$_POST['txtLogin'];
	$clave=$_POST['txtClave'];
	$estado=$_POST['cboEstado'];

	if(empty($idusuario)){
		$varRegistrar=$objUsuario->registrar($nombre,$login,$clave,$estado);

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
		$varActualizar=$objUsuario->actualizar($nombre,$login,$clave,$estado,$idusuario);

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
	$varListar=$objUsuario->listar();

	echo '<table class="table table-bordered">
	<thead>
		<tr>
			<th>#</th>
			<th>Nombre</th>
			<th>Login</th>
			<th>Clave </th>
			<th>Estado</th>
			
			<th>Opciones</th>
		</tr>
	</thead>
	<tbody>';

		$oper=1;

		while ( $reg= $varListar->fetch_object())

		{

			echo '<tr>

			<th scope="row">'.$oper.'</th>
			<td class="col-sm-5">'.$reg->nombre.'</td>
			<td>'.$reg->login.'</td>
			<td>'.$reg->clave.'</td>
			<td>'.$reg->estado1.'</td>
			<td>
			<button class="btn btn-warning btn-xs" type="button" id="btnEditar" OnClick="editarUsuario('.$reg->idusuario.',\''.$reg->nombre.'\',\''.$reg->login.'\',\''.$reg->clave.'\',\''.$reg->estado.'\')"> Editar </button>
				<button class="btn btn-danger btn-xs" type="button" id="btnEliminar" OnClick="eliminarUsuario('.$reg->idusuario.')"> eliminar </button>

			</td>

		</tr>';
		$oper++;
	}
	echo '</tbody
</table>';
break;

case 'eliminar':

$idusuario= $_POST['idusuario'];
$varEliminar=$objUsuario->eliminar($idusuario);
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
