<?php
class Database
{
  public function connectar()
  {
    try 
    {
      $conexion = new PDO('mysql:host=localhost;dbname=aventura_dinosapiens;charset=utf8', 'root', '');
      $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      return $conexion;
    } 
    catch (PDOException $muestraError) 
    {
      die("Error en la conexión a base de datos: " . $muestraError->getMessage());
    }
  }
}
?>