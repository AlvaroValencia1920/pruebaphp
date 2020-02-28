<!DOCTYPE html>
<html lang="es">
<head>
  <link rel="icon" type="img/png" href="img/favicoSENA.png"/>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <?php include ('comunes/titulo.php'); ?>
  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <!-- Page level plugin CSS-->
  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">
  <!--Style Personalizado-->
  <link href="css/style.css" rel="stylesheet">

  <link rel="stylesheet" type="text/css" href="css/animate.min.css">

  <link rel="stylesheet" href="css/alertify.min.css">

</head>

<body id="page-top">

  <?php include ('comunes/nav.php'); ?>

  <div id="wrapper">

    <!-- Sidebar -->
    <?php include ('comunes/navbar.php'); ?>

    <div id="content-wrapper">

      <div class="container-fluid">

        <div style="margin-top:4%;" class="row">
          <div class="col-lg-12">
              <h1 class="page-header text-center">Cambiar Contraseña</h1>
          </div>
        </div>

        <div class="row">
          <div class="col-lg-2">
                          
          </div>

          <div style="margin-top:4%;" class="col-lg-8">
           <form method="POST" id="formulario" role="form">
             <div class="form-group">
                <label>Contraseña Anterior:</label>
                <div class="form-group">
                 <input type="password" class="form-control" name="contrasenaAnterior" id="contrasenaAnterior" autofocus="" required>
                </div>             
             </div>
             <div class="form-group">
                <label>Nueva Contraseña:</label>
                <div class="form-group">
                 <input type="password" class="form-control" name="contrasenaNueva" id="contrasenaNueva" required>
                </div>             
             </div>
             <div class="form-group">
                 <label>Confirmar Nueva Contraseña:</label>
                 <div class="form-group">
                  <input type="password" class="form-control" name="contrasenaConfirmacion" id="contrasenaConfirmacion" required>
                 </div>             
             </div>        
             <input type="hidden" name="usuario" id="usuario" value="<?php echo $_SESSION['id']; ?>">
             <div class="form-group text-center">
              <input type="submit" class="btn btn-success text-center" name="btnRE" id="btnRE" Value="Cambiar">
             </div>
           </form>
          </div>
          <div class="col-lg-2">
              
          </div>        
        </div>

      </div>
      <!-- /.container-fluid -->

      <!-- Sticky Footer -->
      <?php include ('comunes/footer.php'); ?>

    </div>
    <!-- /.content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <?php include ('comunes/modales.php'); ?>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
  <!-- Page level plugin JavaScript-->
  <script src="vendor/chart.js/Chart.min.js"></script>
  <script src="vendor/datatables/jquery.dataTables.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.js"></script>
  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin.min.js"></script>
  <!-- Demo scripts for this page-->
  <script src="js/demo/datatables-demo.js"></script>
  <script src="js/demo/chart-area-demo.js"></script>
  <script type="text/javascript" src="js/alertify.js"></script>
  <script type="text/javascript" src="js/alertify.min.js"></script>
  <script>
      $(function(){
        $("#formulario").submit(function(){
        var url = "chagepass.php"; // El script a dónde se realizará la petición.
          $.ajax({
                 type: "POST",
                 url: url,
                 data: $("#formulario").serialize(), // Adjuntar los campos del formulario enviado.
                 success: function(data)
                 {
                    alertify.alert(data); // Mostrar la respuestas del script PHP.
                    document.getElementById("formulario").reset();
                 }
               });

          return false; // Evitar ejecutar el submit del formulario.
        });
        return false;
        });
    </script>
</body>
</html>