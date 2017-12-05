<?php

include('conexion.php');

class ModeloUsuario{

	public function __construct(){
}

public function registrar($nombre,$login,$clave,$estado)
{


global $conexion;

$consulta="insert into usuario(nombre,login,clave,estado) values ('$nombre','$login','$clave','$estado')";

$resultado=$conexion->query($consulta);
return $resultado;



}

public function	listar()
{

global $conexion;
$consulta="SELECT *, 
CASE WHEN estado='A' THEN 'Activo' ELSE 'De Baja' END as estado1
 FROM usuario";
$resultado= $conexion->query($consulta);
return	$resultado;

}

public function	eliminar($idusuario)
{

global $conexion;
$consulta="DELETE FROM usuario WHERE idusuario=$idusuario";
$resultado= $conexion->query($consulta);

return	$resultado;


}

public function actualizar($nombre,$login,$clave,$estado,$idusuario)
{
global $conexion;

$consulta="UPDATE usuario SET nombre='$nombre',login='$login',clave='$clave', estado='$estado' WHERE idusuario=$idusuario";

$resultado=$conexion->query($consulta);
return $resultado;



}

}

?>
