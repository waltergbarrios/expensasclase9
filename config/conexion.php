<?php
  $host = '127.0.0.1';
  $user = 'root';
  $pass = '';
  $db = 'expensas2';

$dsn = 'mysql:host=' . $host . ';dbname=' . $db;
$conexion = new PDO($dsn, $user, $pass, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
?>