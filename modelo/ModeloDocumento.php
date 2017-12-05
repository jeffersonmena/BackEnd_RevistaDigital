<?php

include('conexion.php');

class ModeloDocumento{

	public function __construct(){
}

public function registrar($autor, $titulo, $palabrasclave, $fechapublicacion, $editorial, $resumen, $ruta, $idcategoria)
{

/*$var = explode("-", $fecha);
$fechaformato=$var[3].'-'.$var[2].'-'.$var[1];
$var1 = explode("-", $publicacion);
$fechaformatopub=$var1[3].'-'.$var1[2].'-'.$var1[1];*/

global $conexion;

$consulta="insert into documento (autor,titulo,palabrasclave,fechapublicacion, editorial, resumen, ruta ,idcategoria) VALUES ('$autor','$titulo','$palabrasclave','$fechapublicacion', '$editorial', '$resumen', '$ruta','$idcategoria')";

$resultado=$conexion->query($consulta);
return $resultado;
}
public function	listar()
{

global $conexion;
$consulta="SELECT * FROM documento";
$resultado= $conexion->query($consulta);
return	$resultado;

}

public function	eliminar($iddocumento)
{

global $conexion;
$consulta="DELETE FROM documento WHERE iddocumento=$iddocumento";
$resultado= $conexion->query($consulta);

return	$resultado;

}

public function actualizar($autor,$titulo,$palabrasclave,$fechapublicacion, $editorial, $resumen, $ruta, $idcategoria,$iddocumento)
{
global $conexion;

$consulta="UPDATE documento SET autor='$autor', titulo='$titulo', 
 palabrasclave='$palabrasclave', fechapublicacion='$fechapublicacion', editorial='$editorial', resumen='$resumen' WHERE iddocumento=$iddocumento";


$resultado=$conexion->query($consulta);
return $resultado;

}

public function	listarCategorias()
{

global $conexion;
$consulta="SELECT * FROM categoria";
$resultado= $conexion->query($consulta);
return	$resultado;


}



}

?>
