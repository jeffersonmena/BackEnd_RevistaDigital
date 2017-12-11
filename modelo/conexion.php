<?php
$host='localhost';
$usuario='root';
$clave='';
$bd='revista';

$conexion= new mysqli($host,$usuario,$clave,$bd);

 if(mysqli_connect_errno())
 {
	 echo "existe un error en la conexion".mysqli_connect_errno();
 }
else
{
 // echo 'conexios establecida a la base de datos';	
}




?>




