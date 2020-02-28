<?php 
include ('../includes/conexion.php');
session_start();
if(isset($_SESSION['id']) and $_SESSION['rol']==3){
$nombreCompleto = $_SESSION['nombre_completo'];
$documento = $_SESSION['documento'];
$rol = $_SESSION['rol'];
$idusuario = $_SESSION['id'];  
}else{
session_destroy();
header('Location: ../index.php'); 
}
?>

<style>
.bienvenida{ 
width: 580px; 
height: 490px;
margin-top:-3.5%; 
margin-bottom:-2%;   
}

@media (max-width: 992px) {
.bienvenida{ 
width: 310px; 
height: 210px;
margin-top:35%; 
margin-bottom:-2%;   
  }
}

.logo{
width: 100px; 
margin-left: 1px;
cursor: pointer !important;   
}

@media (max-width: 768px) {
  .logo{ 
  width: 240px;
  margin-top: -13px;
  cursor: pointer !important;     
  }
}
@media (max-width: 992px) {
  .logo{ 
  padding-top: 3px !important;
  width: 120px;
  margin-top: -12px;
  cursor: pointer !important;   
  }
}
</style>
<nav class="navbar navbar-expand navbar-dark bg-dark static-top">

<a class="navbar-brand mr-1" href="index.php">Prueba PHP</a>

<button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
  <i class="fas fa-bars"></i>
</button>

<!-- Navbar Search -->
<form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0"></form>

<!-- Navbar -->
<ul class="navbar-nav ml-auto ml-md-0">
  <li class="nav-item dropdown no-arrow">
    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      <i class="fas fa-user-circle fa-fw"></i>
    </a>
    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
      <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">Cerrar Sesión - <?php echo utf8_encode(ucwords(strtolower($nombreCompleto))); ?></a>
    </div>
  </li>
</ul>

</nav>