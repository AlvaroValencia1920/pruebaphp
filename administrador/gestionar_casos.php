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
                      <td style="width:300px;" align='center' valign = "middle"><?php echo utf8_encode(strtoupper($row['motivo']))?></td>    
                      <td style="width:400px;" align='center' valign = "middle"><?php echo utf8_encode(strtoupper($row['direccion']))?></td>      
                      <td style="width:150px;" align='center' valign = "middle"><?php echo utf8_encode(strtoupper($row['consecutivo']))?></td>    
                      <td style="width:30px;" align='center' valign = "middle"><?php echo utf8_encode(strtoupper($row['estado']))?></td>    
                      <td style="width:200px;" align='center' valign = "middle">
                      <?php if ($row["estado"] == 'Activo') {?>
           
                         <a href="#" class="btn btn-secondary btn_cancelar_caso" data-id="<?php echo $row["id"]; ?>" data-toggle="tooltip" data-placement="bottom" title="Cancelar Caso"><i class="fa fa-minus-circle"></i></a>
                      
                      <?php } 

                      if ($row["estado"] == 'Inactivo') {?>
                         
                         <a href="#" class="btn btn-success btn_activar_caso" data-id="<?php echo $row["id"]; ?>" data-toggle="tooltip" data-placement="bottom" title="Activar Caso"><i class="fa fa-check"></i></a>
                      
                      <?php } ?>
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

    initAprobar();
    limpiarBoton();
    initCancelar();

    function limpiarBoton() {
      $(".btn_limpiar_boton").click(function(e) {
        $(this)[0].blur();
      });
    }

    function initAprobar() {
      $(".btn_activar_caso").click(function(e) {
        e.preventDefault();
        var id = $(this).attr("data-id");
        var boton = $(this)[0];
        boton.blur();

        var agree = alertify.confirm('¿Esta seguro que desea activar el caso?', 
          function(){ 
            $.ajax({
              type: "POST",
              url: "aprobar_caso.php",
              data: 'id='+id,
              success: function(data){
                alertify.success(data, 1, cargarInfo);
              }
            });
          }, 
          function(){ 
            alertify.error('Cancelado')
          }
        );
      });
    }

    function initCancelar() {
      $(".btn_cancelar_caso").click(function(e) {
        e.preventDefault();
        var id = $(this).attr("data-id");
        var boton = $(this)[0];
        boton.blur();

        var agree = alertify.confirm('¿Esta seguro que desea cancelar este caso?', 
          function(){ 
            $.ajax({
              type: "POST",
              url: "reversar_caso.php",
              data: 'id='+id,
              success: function(data){
                alertify.success(data, 1, cargarInfo);
              }
            });
          }, 
          function(){ 
            alertify.error('Cancelado')
          }
        );
      });
    }

    function cargarInfo() {
        window.location = 'gestionar_casos.php';
    }
  </script>
</body>
</html>