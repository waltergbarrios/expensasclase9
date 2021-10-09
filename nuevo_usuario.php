<?php
require_once 'config/conexion.php';
/*session_start();
if (!isset($_SESSION['idUsuario'])) {
  header("Location: login.php");
}*/
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title>Dashboard Template · Bootstrap v5.0</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/dashboard/">

    

    <!-- Bootstrap core CSS -->
<link href="assets/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="dashboard.css" rel="stylesheet">
  </head>
  <body>
    
<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#">Expensas</a>
  <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <input class="form-control form-control-dark w-100" type="text" placeholder="Buscador" aria-label="Search">
  <div class="navbar-nav">
    <div class="nav-item text-nowrap">
      <a class="nav-link px-3" href="config/cerrar_session.php">Cerrar sesión</a>
    </div>
  </div>
</header>

<div class="container-fluid">
  <div class="row">
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="position-sticky pt-3">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">
              <span data-feather="home"></span>
              Panel de control
            </a>
          </li>
          <!--<li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="file"></span>
              Orders
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="shopping-cart"></span>
              Products
            </a>
          </li>-->
          <li class="nav-item">
            <a class="nav-link" href="usuarios.php">
              <span data-feather="users"></span>
              Usuarios
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="users"></span>
              Expensas
            </a>
          </li>
         
        </ul>

        
      </div>
    </nav>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h4">Nuevo usuario</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group me-2">
           
          </div>
          
        </div>
      
        
      </div>
      <div>

      <?php

      //si apreto el boton enviar
      if (isset($_POST['submit'])) {
        // Preparar script sql
        $stmt = $conexion->prepare("INSERT INTO usuarios (nya, usuario, contraseña, tipo_usuario) VALUES (?, ?, ?, ?)");
        
        // Establecer parámetros 
        $nya          = $_POST['nya'];
        $usuario      = $_POST['usuario'];
        $contraseña   = $_POST['contraseña'];
        $tipo_usuario = $_POST['tipo_usuario'];

        //ejecuta script de insercion
        $stmt->execute(array($nya, $usuario, sha1($contraseña), $tipo_usuario));
     
        // Cerrar conexiones
        $conexion = null;  

        //redirecciona a listado de usuarios
        header('Location: http://localhost/expensas/usuarios.php');
     }
      ?>
      <form method="post">
        <div class="form-group">
          <label for="nya">Nombre y Apellido</label>
          <input type="text" name="nya" id="nya" class="form-control">
        </div>
        <div class="form-group">
          <label for="usuario">Usuario</label>
          <input type="text" name="usuario" id="usuario" class="form-control">
        </div>
        <div class="form-group">
          <label for="contraseña">contraseña</label>
          <input type="password" name="contraseña" id="contraseña" class="form-control">
        </div>
        
				<div class="form-group">
					<label for="rol">Rol</label>
					
					<select name="tipo_usuario" class="form-control">
              <option value="ADMINISTRADOR" >Administrador</option>
              <option value="PROPIETARIO">Propietario</option>
          </select>
					
				</div>
        <div class="form-group">
        </br>
          <input type="submit" name="submit" class="btn btn-primary" value="Guardar">
          
        </div>
      </form>
      </div>

      
      <div>
        

      </div>
      <div>
      
      </div>

      


    </main>
  </div>
</div>


    <script src="assets/dist/js/bootstrap.bundle.min.js"></script>

      <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script><script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script><script src="dashboard.js"></script>
  </body>
</html>
