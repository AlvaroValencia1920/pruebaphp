<script src="../js/jquery.js"></script>
<?php include ('../includes/conexion.php'); ?>
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header head_modal_hr">
        <h5 class="modal-title" id="exampleModalLabel">Prueba PHP</h5>
        <button class="close equis_white" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="alert alert-success" role="alert">
          <center>Seleccione para seguir ó salir de forma segura.</center>
        </div>
          <center><strong>¿Desea salir?</strong></center>
        </div>
      <div class="modal-footer">
        <button class="btn btn-danger" type="button" data-dismiss="modal">Cancelar</button>
        <a class="btn btn-success" href="../index.php">Salir</a>
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="crearSubdirector" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header head_modal_hr">
        <h5 class="modal-title" id="exampleModalLabel">Prueba PHP - Registrar Caso</h5>
        <button type="button" class="close equis_white" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body body-modal-aciis">
        <form method="POST" id="formulario_administrador" role="form">
          <div class="form-group">
            <label for="">Motivo:</label>
            <input class="form-control" type="text" name="motivo" id="motivo" required="">
          </div> 
          <div class="form-group">
            <label for="">Dirección:</label>
            <input class="form-control" type="text" name="direccion" id="direccion" required="">
          </div> 
          <div class="form-group text-right">
            <button style="font-size: 19px;" type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
            <input type="submit" style="font-size: 19px;" class="btn btn-success" name="GuardarRubro" value="Guardar">            
          </div>            
        </form>
      </div>
    </div>
  </div>
</div>


<script>


$(function(){
 $("#formulario_administrador").submit(function(){
 var url = "guardar_caso.php"; // El script a dónde se realizará la petición.
    $.ajax({
           type: "POST",
           url: url,
           data: $("#formulario_administrador").serialize(), // Adjuntar los campos del formulario enviado.
           success: function(data)
           {  
                if (data=="Caso Registrado Exitosamente") {

                  alertify.success(data, 1, function() {
                    window.location = 'gestionar_casos.php';
                  }); // Mostrar la respuestas del script PHP.

                }else{

                  alertify.error(data);

                }
              document.getElementById("formulario_administrador").reset();
           }
         });

    return false; // Evitar ejecutar el submit del formulario.
 });
  return false;
});
</script>