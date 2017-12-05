<?php

include('conexion.php');

class ModeloCategoria{

	public function __construct(){
}

public function registrar($nombrecategoria,$descripcioncategoria)
{


global $conexion;

$consulta="insert into categoria (nombrecategoria,descripcioncategoria) values('$nombrecategoria','$descripcioncategoria')";

$resultado=$conexion->query($consulta);
return $resultado;



}

public function	listar()
{

global $conexion;
$consulta="SELECT *  FROM categoria";
$resultado= $conexion->query($consulta);
return	$resultado;

}

public function	eliminar($idcategoria)
{

global $conexion;

$consulta="DELETE FROM categoria WHERE idcategoria =$idcategoria";
$resultado= $conexion->query($consulta);

return	$resultado;


}

public function actualizar($nombrecategoria,$descripcioncategoria,$idcategoria)
{
global $conexion;

$consulta= "UPDATE categoria SET nombrecategoria='$nombrecategoria', descripcioncategoria='$descripcioncategoria' WHERE idcategoria=$idcategoria";


$resultado=$conexion->query($consulta);
return $resultado;


}

}

?>
