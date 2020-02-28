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
    <?php include ('comunes/navbar.php'); include ('../includes/conexion.php'); ?>

    <div id="content-wrapper">

      <div class="container-fluid">

        <div class="row">
           <div class="col-lg-12">
              <h1 class="text-center">Gestionar Casos</h1>
           </div>
        </div>

        <br>

        <div class="row">
           <div class="col-lg-12">
              <div class="form-group text-center">
              <a style="font-size: 21px;" class="btn btn-large btn-primary" href="#" data-toggle="modal" data-target="#crearSubdirector"><i class="far fa-plus-square"></i> Registrar Caso</a>
            </div>
           </div>
        </div>

        <?php 
        $consulta = "SELECT * FROM `casos`";
        $query = mysqli_query($conexion,$consulta);
        $cantidad = mysqli_num_rows($query);

        if ($cantidad>0) { ?>

          <div class="row">
            <div class="col-lg-12 text-centerssss">
                <table class="table table-bordered table-hover table-responsive">
                  <thead class="thead-dark">
                    <tr>
                      <th class="text-center">#</th>
                      <th class="text-center">Motivo</th>
                      <th class="text-center">Dirección</th>
                      <th class="text-center">Consecutivo</th>
                      <th class="text-center">Estado</th>
                      <th class="text-center">Acciones</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                    $count = 0;
                    while ($row = mysqli_fetch_array($query)) {
                    $count++; 
                    ?>
                    <tr> 
                      <td style="width:30px;" align='center' valign = "middle"><?php echo $count; ?></td> 
                      <td style="width:200px;" align='center' valign = "middle"><?php echo utf8_encode(strtoupper($row['motivo']))?></td>    
                      <td style="width:400px;" align='center' valign = "middle"><?php echo utf8_encode(strtoupper($row['direccion']))?></td>      
                      <td style="width:300px;" align='center' valign = "middle"><?php echo utf8_encode(strtoupper($row['consecutivo']))?></td>    
                      <td style="width:200px;" align='center' valign = "middle">
                      <a class="btn btn-primary" href="editarUsuario.php?usuario_id=<?php echo $row['usuario_id']; ?>"><i class="fas fa-edit"></i></a>
                      <a class="btn btn-danger btn_eliminar text-white" data-id="<?php echo $row['usuario_id']; ?>"><i class="fas fa-trash"></i></a>
                      </td>    
                      </tr>
                      <?php } ?> 
                  </tbody>
                </table>
            </div>
          </div>
          
        <?php } else { ?>
          <br>
          <div class="row">
            <div class="col-lg-12 text-center">
              <h5>No Existen Registros de Subdirectores</h5>
            </div>
          </div>
        <?php } ?>

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
      function confirmSubmitPER(id_pre){
        var agree=alertify.confirm('¿Esta Seguro Que Desea Borrar Este Registro?', 
          function(){ 
            var url = "elim_usuario.php";
                $.ajax({
                    url: url,
                    data: {
                        id: id_pre
                    },
                    method: "GET",
                    dataType: "JSON",
                    success: function(response) {
                        if(response.exito && response.exito == true) {
                            alertify.success(response.msg, 1, function() {
                              window.location = 'gestionar_usuario.php';
                            });
                                                    
                        } else {
                            alertify.error(response.msg);
                        }
                    },
                    error: function(xhr) { console.log(xhr.responseText); }
                });

          }, 
          function(){ 
            alertify.error('Cancelado')
        }
      );

        return agree;
    }

    $(".btn_eliminar").click(function(event) {
        event.preventDefault();
        confirmSubmitPER( $(this).attr("data-id") );
    });
    </script>
</body>
</html>