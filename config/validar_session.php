<?php
require_once 'conexion.php';

$usuario    = $_POST['usuario'];
$pass       = $_POST['pass'];
$pass_sha1  = md5($pass);


if (empty($usuario) || empty($pass)) {
    header("Location: ./login.php?msj=1");
    exit();
}

$sql = "SELECT * from usuarios where email='$usuario'";
$result = mysqli_query($conexion, $sql);

if ($row = mysqli_fetch_array($result)) {
    if ($row['pass'] == $pass_sha1) {
        session_start();
        $_SESSION['idUsuario'] = $row['idUsuarios'];
        header("Location:../home.php");   
    }
    else
    {
        header("Location: ../login.php?msj=2");
        exit();
    }
} else {
    header("Location: ../login.php?msj=2");
    exit();
}
