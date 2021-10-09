<?php
 //inicia codigo php
require_once 'config/conexion.php';
/*session_start();
if (!isset($_SESSION['idUsuario'])) {
  header("Location: login.php");
}*/

   
      
    //arma consulta sql
    $consultaSQL = "SELECT * from usuarios order by id desc";

    //prepara consulta sql
    $sentencia = $conexion->prepare($consultaSQL);

    //ejecuta consulta sql
    $sentencia->execute();

    //resultado lo convierte a arreglo
    $usuarios = $sentencia->fetchAll();

    //obtiene variable id enviado por get
    $id = $_GET['id'];

    //arma script sql para borrar
    $consultaSQL = "DELETE FROM usuarios WHERE id =" . $id;

    //prepara sentencia sql
    $sentencia = $conexion->prepare($consultaSQL);

    //ejecuta script sql
    $sentencia->execute();

    //redirecciona a listado de usuarios
    header('Location: http://localhost/expensas/usuarios.php');

    //fin codigo php
?>

