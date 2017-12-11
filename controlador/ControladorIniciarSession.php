<?php 
// Start the session
include_once "conexion.php";
session_start();


$user=$_POST["Username"]
$pwd=$_POST["Password"]

$logueo= mysql_query("SELECT login, clave FROM usuario 
WHERE login = "$user" AND  clave = "$pwd"");
if($reg=mysql_fetch_array($logueo))
{
$_SESSION["login"]=$reg["login"];
$_SESSION["clave"]=$reg["clave"];

echo "<script>location.href="../usuario.php";</script>"
}
else
{
echo "<script>alert("usuario o clave incorrectos")</script>";
echo "<script>location.href="../login.php";</script>"
}








 ?>